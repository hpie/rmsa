<?php
class Helper_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }
    public function load_distict(){
        $distict = $this->db->query("SELECT * FROM rmsa_districts WHERE rmsa_district_status='ACTIVE'");
        return $distict->result_array();
    }
    public function load_stream(){
        $distict = $this->db->query("SELECT * FROM rmsa_categories WHERE category_type='STREAM_TYP' AND category_status='A' ");
        return $distict->result_array();
    }
    public function load_videos($offset,$limit,$params){
         $like_query='';
        foreach ($params as $key => $value){
            if(!empty($value) || $value!=""){
                $like_query.=" AND $key LIKE '%$value%' ";
            }
        }                
        $videos = $this->db->query("SELECT * FROM rmsa_youtube_video WHERE youtube_video_status='ACTIVE' $like_query ORDER BY created_dt DESC LIMIT $offset,$limit");
        return $videos->result_array();
    }
    public function count_total_videos($params){        
        $like_query='';
        foreach ($params as $key => $value){
            if(!empty($value) || $value!=""){
                $like_query.=" AND $key LIKE '%$value%' ";
            }
        }                
        $total = $this->db->query("SELECT count(rmsa_youtube_video_id) AS count_data FROM rmsa_youtube_video WHERE youtube_video_status='ACTIVE' $like_query");                      
        $total_videos = $total->row_array();          
        return $total_videos['count_data'];
    }
    public function load_blocks($params){
        $districtId = $params['districtId'];
        $blocks = $this->db->query("SELECT * FROM rmsa_blocks WHERE rmsa_district_id=$districtId AND rmsa_block_status='ACTIVE'");
        return $blocks->result_array();
    }
    public function load_tehsil($params){
        $districtId = $params['districtId'];
        $tehsil = $this->db->query("SELECT * FROM rmsa_sub_districts WHERE rmsa_district_id=$districtId AND rmsa_sub_district_status='ACTIVE'");
        return $tehsil->result_array();
    }

    public function load_school($params){
        $subDistrictId = $params['subDistrictId'];
        $school = $this->db->query("SELECT * FROM rmsa_schools WHERE rmsa_sub_district_id=$subDistrictId AND rmsa_school_status='ACTIVE'");
        return $school->result_array();
    }

    // changed for getting by block id
    public function load_school_byblock($params){
        $rmsaBlockId = $params['rmsaBlockId'];
        $school = $this->db->query("SELECT * FROM rmsa_schools WHERE rmsa_block_id=$rmsaBlockId AND rmsa_school_status='ACTIVE'");
        return $school->result_array();
    }
        
    public function load_school_code_byschool($params){
        $rmsaSchoolId = $params['schoolId'];
        $school = $this->db->query("SELECT rmsa_school_udise_code,rmsa_block_id  FROM rmsa_schools WHERE rmsa_school_id=$rmsaSchoolId AND rmsa_school_status='ACTIVE'");
        $res=$school->row_array();
        
        $str = $this->db->last_query();

        log_message('info',$str);
        log_message('info',print_r($res,TRUE)); 
        
        return $res;
    }
    public function load_school_code_byschoolid($rmsaSchoolId){        
        $school = $this->db->query("SELECT rmsa_school_udise_code,rmsa_block_id  FROM rmsa_schools WHERE rmsa_school_id=$rmsaSchoolId AND rmsa_school_status='ACTIVE'");
        $res=$school->row_array();
        
        $str = $this->db->last_query();

        log_message('info',$str);
        log_message('info',print_r($res,TRUE)); 
        
        return $res;
    }
    
    public function register_student($params){        
        $email_exist = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id='".$params['rmsa_user_email_id']."' ");
        $res = $email_exist->row_array();
        
        $rolnumber_exist = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_roll_number='".$params['rmsa_user_roll_number']."' ");
        $res1 = $rolnumber_exist->row_array();
        
        if($res){
            return Array(
                'success' => false,
                'email_exist' => true
            );
        }
        if($res1){
            return Array(
                'success' => false,
                'rollnumber_exist' => true
            );
        }

        $params['rmsa_user_email_password'] = md5($params['rmsa_user_email_password']);
        unset($params['rmsa_user_confirm_password']);
        unset($params['g-recaptcha-response']);

        if(isset($_SESSION['emp_rmsa_user_id'])){
            $params['user_create_by'] = $_SESSION['emp_rmsa_user_id'];
            $params['rmsa_school_id'] = $_SESSION['emp_rmsa_school_id'];
            $params['rmsa_sub_district_id'] = $_SESSION['emp_rmsa_sub_district_id'];
            $params['rmsa_district_id'] = $_SESSION['emp_rmsa_district_id'];
        }
        if(isset($_SESSION['tech_rmsa_user_id'])){
            $params['user_create_by'] = $_SESSION['tech_rmsa_user_id'];
            $params['rmsa_school_id'] = $_SESSION['tech_rmsa_school_id'];
            $params['rmsa_sub_district_id'] = $_SESSION['tech_rmsa_sub_district_id'];
            $params['rmsa_district_id'] = $_SESSION['tech_rmsa_district_id'];
        }
        else{
            unset($params['user_create_by']);
        }
        
        $result = $this->db->insert('rmsa_student_users',$params);
        $insert_id = $this->db->insert_id();// get last insert id
        if(!empty($insert_id)){
            return Array(
                'success' => true,
                'email_exist' => false,
                'rollnumber_exist' => false,
                'email' => $params['rmsa_user_email_id'],
                'rmsa_user_id'=>$insert_id
            );
//                return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }

    public function total_active_students(){
        $active = $this->db->query("SELECT count(*) AS online_student FROM  rmsa_student_users WHERE rmsa_student_login_active=1");
        $online = $active->result_array();
        return current($online);
    }

    public function total_active_employee(){
        $active = $this->db->query("SELECT count(*) AS online_employee FROM  rmsa_employee_users WHERE rmsa_employee_login_active=1");
        $online = $active->result_array();
        return current($online);
    }

    public function top_employee_with_most_uploaded_content(){
        $employee = $this->db->query("SELECT rst.rmsa_state_name,rd.rmsa_district_name,rs.rmsa_school_title, ruf.rmsa_employee_users_id, count(*) AS uploaded_count,
                                          eu.rmsa_user_employee_code,eu.rmsa_user_email_id,
                                          CONCAT(eu.rmsa_user_first_name,' ',eu.rmsa_user_last_name) AS employee_name
                                          FROM `rmsa_uploaded_files`  ruf
                                          INNER JOIN rmsa_employee_users eu ON eu.rmsa_user_id=ruf.rmsa_employee_users_id
                                          LEFT JOIN rmsa_schools rs ON rs.rmsa_school_id=eu.rmsa_school_id
                                          LEFT JOIN rmsa_districts rd ON rd.rmsa_district_id=rs.rmsa_district_id
                                          LEFT JOIN rmsa_states rst ON rst.rmsa_state_id=rd.rmsa_state_id
                                          GROUP BY rmsa_employee_users_id ORDER BY uploaded_count DESC LIMIT 10");
        $top_employee = $employee->result_array();
        return $top_employee;
    }

    public function most_rated_content(){
        $most_rated = $this->db->query("SELECT rfr.rmsa_uploaded_file_id, ruf.uploaded_file_title, AVG(rfr.rmsa_file_rating) AS overall_rating
                                      FROM rmsa_file_reviews rfr
                                      INNER JOIN rmsa_uploaded_files ruf ON ruf.rmsa_uploaded_file_id=rfr.rmsa_uploaded_file_id
                                      WHERE  rmsa_review_status=1
                                      GROUP BY rmsa_uploaded_file_id
                                      ORDER BY overall_rating DESC
                                      LIMIT 5");
        $most_rated_content = $most_rated->result_array();
        return $most_rated_content;
    }           
    
    public function top_employee_with_most_rated_content(){
        $most_rated_employee = $this->db->query("SELECT rst.rmsa_state_name,rd.rmsa_district_name,
                                                 rs.rmsa_school_title,rfr.rmsa_uploaded_file_id,
                                                 ruf.uploaded_file_title,
                                                 rmu.rmsa_user_employee_code,rmu.rmsa_user_email_id,
                                                 CONCAT(rmu.rmsa_user_first_name,' ',rmu.rmsa_user_last_name) AS employee_name,
                                                 AVG(rfr.rmsa_file_rating) AS overall_rating
                                                FROM rmsa_file_reviews rfr
                                                INNER JOIN rmsa_uploaded_files ruf ON ruf.rmsa_uploaded_file_id=rfr.rmsa_uploaded_file_id
                                                LEFT JOIN rmsa_employee_users rmu ON rmu.rmsa_user_id=ruf.rmsa_employee_users_id
                                                LEFT JOIN rmsa_schools rs ON rs.rmsa_school_id=rmu.rmsa_school_id
                                                LEFT JOIN rmsa_districts rd ON rd.rmsa_district_id=rs.rmsa_district_id
                                                LEFT JOIN rmsa_states rst ON rst.rmsa_state_id=rd.rmsa_state_id
                                                WHERE  rmsa_review_status=1
                                                GROUP BY rmsa_uploaded_file_id
                                                ORDER BY overall_rating DESC
                                                LIMIT 5");
        $most_rated_employee_ = $most_rated_employee->result_array();
        return $most_rated_employee_;
    }

    public function top_employee_with_most_viewed_content(){
        $most_viewed_employee = $this->db->query("SELECT rst.rmsa_state_name,rd.rmsa_district_name,
                                                 rs.rmsa_school_title, uploaded_file_title,uploaded_file_viewcount,
                                                 rmu.rmsa_user_employee_code,rmu.rmsa_user_email_id,CONCAT(rmu.rmsa_user_first_name,' ',rmu.rmsa_user_last_name) AS employee_name
                                                 FROM rmsa_uploaded_files ruf
                                                 LEFT JOIN rmsa_employee_users rmu ON rmu.rmsa_user_id=ruf.rmsa_employee_users_id
                                                 LEFT JOIN rmsa_schools rs ON rs.rmsa_school_id=rmu.rmsa_school_id
                                                 LEFT JOIN rmsa_districts rd ON rd.rmsa_district_id=rs.rmsa_district_id
                                                 LEFT JOIN rmsa_states rst ON rst.rmsa_state_id= rd.rmsa_state_id
                                                 ORDER BY uploaded_file_viewcount DESC
                                                 LIMIT 5");
        $most_viewed_employee_ = $most_viewed_employee->result_array();
        return $most_viewed_employee_;
    }

    public function most_viewed_content(){
        $most_viewed = $this->db->query("SELECT uploaded_file_title,uploaded_file_viewcount FROM rmsa_uploaded_files 
                                         ORDER BY uploaded_file_viewcount DESC
                                         LIMIT 5");
        $most_viewed_content = $most_viewed->result_array();
        return $most_viewed_content;
    }

    public function most_active_student_by_content_read(){
        $most_active = $this->db->query("SELECT ru.	rmsa_user_roll_number,ru.rmsa_user_email_id,rst.rmsa_state_name,rd.rmsa_district_name,rs.rmsa_school_title,
                                         CONCAT(ru.rmsa_user_first_name,' ',ru.rmsa_user_last_name) AS student_name,COUNT(*) most_active 
                                         FROM rmsa_user_file_views rf
                                         LEFT JOIN rmsa_student_users ru ON ru.rmsa_user_id=rf.rmsa_user_id
                                         LEFT JOIN rmsa_schools rs ON rs.rmsa_school_id=ru.rmsa_school_id
                                         LEFT JOIN rmsa_districts rd ON rd.rmsa_district_id=ru.rmsa_district_id
                                         LEFT JOIN rmsa_states rst ON rst.rmsa_state_id=rd.rmsa_state_id
                                         GROUP BY rf.rmsa_user_id
                                         ORDER BY most_active DESC
                                         LIMIT 5");
        $most_active_student = $most_active->result_array();
        return $most_active_student;
    }

    public function most_active_student_on_school(){
        $most_active_on_school = $this->db->query("SELECT rst.rmsa_state_name,rd.rmsa_district_name,
                                                   rs.rmsa_school_id,rs.rmsa_school_title,count(*) AS school_has_most_active
                                                   FROM rmsa_student_users ru
                                                   LEFT JOIN rmsa_schools rs ON rs.rmsa_school_id=ru.rmsa_school_id
                                                   LEFT JOIN rmsa_districts rd ON rd.rmsa_district_id=rs.rmsa_district_id
                                                   LEFT JOIN rmsa_states rst ON rst.rmsa_state_id=rd.rmsa_state_id
                                                   WHERE ru.rmsa_student_login_active=1
                                                   GROUP BY rs.rmsa_school_id
                                                   ORDER BY school_has_most_active DESC LIMIT 5");
        $most_active_student = $most_active_on_school->result_array();
        return $most_active_student;
    }

    public function top_district_with_most_content(){
        $top_most_content_district = $this->db->query("SELECT rst.rmsa_state_name,rd.rmsa_district_name,count(*) as uploaded_content 
                                                       FROM rmsa_uploaded_files ruf
                                                       LEFT JOIN rmsa_employee_users ru ON ru.rmsa_user_id=ruf.rmsa_employee_users_id
                                                       LEFT JOIN rmsa_districts rd ON rd.rmsa_district_id=ru.rmsa_district_id
                                                       LEFT JOIN rmsa_states rst ON rst.rmsa_state_id=rd.rmsa_state_id
                                                       GROUP BY rd.rmsa_district_id
                                                       ORDER BY uploaded_content DESC LIMIT 5");
        $districts = $top_most_content_district->result_array();
        return $districts;
    }

    
    
    
    
    public function uploaded_content_reports2($month,$year){        
        $active = $this->db->query("SELECT count(rmsa_uploaded_file_id) AS count_id FROM rmsa_uploaded_files WHERE MONTH(created_dt)=$month AND YEAR(created_dt)=$year");
        $res = $active->result_array();        
        return  $res[0]['count_id'];
    } 
    
    public function student_registered_reports2($month,$year){        
        $active = $this->db->query("SELECT count(rmsa_user_id) AS count_id FROM rmsa_student_users WHERE MONTH(created_dt)=$month AND YEAR(created_dt)=$year");
        $res = $active->result_array();        
        return  $res[0]['count_id'];
    }    
    public function teacher_registered_reports2($month,$year){        
        $active = $this->db->query("SELECT count(rmsa_user_id) AS count_id FROM rmsa_teacher_users WHERE MONTH(created_dt)=$month AND YEAR(created_dt)=$year");
        $res = $active->result_array();        
        return  $res[0]['count_id'];
    }    
        
}