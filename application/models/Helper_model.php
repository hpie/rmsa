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
    public function load_tehsil($params){
        $districtId = $params['districtId'];
        $tehsil = $this->db->query("SELECT * FROM rmsa_sub_districts WHERE rmsa_district_id = {$districtId} AND rmsa_sub_district_status = 'ACTIVE'");
        return $tehsil->result_array();
    }
    public function load_school($params){
        $subDistrictId = $params['subDistrictId'];
        $school = $this->db->query("SELECT * FROM rmsa_schools WHERE rmsa_sub_district_id = {$subDistrictId} AND rmsa_school_status = 'ACTIVE'");
        return $school->result_array();
    }

    public function register_student($params){

        $email_exist = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id = '".$params['rmsa_user_email_id']."' ");
        $res = $email_exist->row_array();

        if($res){
            return Array(
                'success' => false,
                'email_exist' => true
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
        else{
            unset($params['user_create_by']);
        }
        
        $result = $this->db->insert('rmsa_student_users',$params);
        $insert_id = $this->db->insert_id();// get last insert id
        if(!empty($insert_id)){

            return Array(
                'success' => true,
                'email_exist' => false,
                'email' => $params['rmsa_user_email_id'],
            );
//                return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }

    public function total_active_students(){
        $active = $this->db->query("SELECT count(*) AS online_student FROM  rmsa_student_users WHERE rmsa_student_login_active = 1");
        $online = $active->result_array();
        return current($online);
    }

    public function total_active_employee(){
        $active = $this->db->query("SELECT count(*) AS online_employee FROM  rmsa_employee_users WHERE rmsa_employee_login_active = 1");
        $online = $active->result_array();
        return current($online);
    }

    public function top_employee_with_most_uploaded_content(){
        $employee = $this->db->query("SELECT ruf.rmsa_employee_users_id, count(*) AS uploaded_count,
                                          CONCAT(eu.rmsa_user_first_name,' ',eu.rmsa_user_last_name) AS employee_name
                                          FROM `rmsa_uploaded_files`  ruf
                                          INNER JOIN rmsa_employee_users eu ON eu.rmsa_user_id = ruf.rmsa_employee_users_id
                                          GROUP BY rmsa_employee_users_id ORDER BY uploaded_count DESC LIMIT 10");
        $top_employee = $employee->result_array();
        return $top_employee;
    }
}