<?php

class Employee_model extends CI_Model {

    function __construct() {        
        parent::__construct();
    }

    public function get_file($fileId){
        $title = $this->db->query("SELECT * FROM  rmsa_uploaded_files WHERE rmsa_uploaded_file_id = '".$fileId."'");
        return $title->result_array();
    }
     public function get_quiz_details($fileId){
        $title = $this->db->query("SELECT * FROM  quiz WHERE rmsa_uploaded_file_id = '".$fileId."'");
        return $title->row_array();
    }
     public function get_quiz1_details($quiz_id){
        $title = $this->db->query("SELECT * FROM  quiz WHERE quiz_id = '".$quiz_id."'");
        return $title->row_array();
    }
    public function update_quiz($params,$fileId) {        
        $query_res = $this->db->query("UPDATE quiz SET quiz_title = '{$params['quiz_title']}',
                                                        quiz_min_questions = '{$params['quiz_min_questions']}',
                                                        quiz_pass_score = '{$params['quiz_pass_score']}'    
                                       WHERE rmsa_uploaded_file_id='{$fileId}'");        
        if ($query_res) {
            return true;
        }
        return false;
    }
    
    public function approve_student($params) {
        $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
        if ($query_res) {
            return true;
        }
    }
    public function edit_question($params) {
        $query_res = $this->db->query("UPDATE  questions SET question = '{$params['question']}'
                                       WHERE question_id='{$params['question_id']}'");
        if ($query_res) {
            return true;
        }
    }
    public function active_question($params) {
        $query_res = $this->db->query("UPDATE  questions SET question_status = '{$params['question_status']}'
                                       WHERE question_id='{$params['question_id']}'");
        if ($query_res) {
            return true;
        }
    }
    public function delete_choice($question_id) {
        $query_res = $this->db->query("DELETE  FROM choices WHERE question_id='{$question_id}'");
        if ($query_res) {
            return true;
        }
    }
    public function active_quiz($params) {
        $query_res = $this->db->query("UPDATE  quiz SET quiz_status = '{$params['quiz_status']}'
                                       WHERE quiz_id='{$params['quiz_id']}'");
        if ($query_res) {
            return true;
        }
    }
    public function active_file($params) {
        $query_res = $this->db->query("UPDATE  rmsa_uploaded_files SET uploaded_file_status = '{$params['uploaded_file_status']}'
                                       WHERE rmsa_uploaded_file_id='{$params['rmsa_uploaded_file_id']}'");
        if ($query_res) {
            return true;
        }
    }
    public function check_current_password($current_password, $stud_id) {
        $current_password = md5($current_password);
        $rmsa_user_id = $stud_id;
        $check = $this->db->query("SELECT * FROM rmsa_student_users
                                   WHERE rmsa_user_id = '" . $rmsa_user_id . "'
                                   AND rmsa_user_email_password ='" . $current_password . "'");
        $row = $check->row_array();
        if (isset($row)) {
            if ($current_password == $row['rmsa_user_email_password']) {
                return true; //matched
            }
        }
        return false; //not matched
    }

    public function update_password($params, $stud_id) {
        $new_password = md5($params['rmsa_user_new_password']);
        $rmsa_user_id = $stud_id;
        $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_email_password = '" . $new_password . "'
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }

    public function update_profile($params, $stud_id) {
        $rmsa_user_id = $stud_id;
        $first_name = $params['rmsa_user_first_name'];
        $middle_name = $params['rmsa_user_middle_name'];
        $last_name = $params['rmsa_user_last_name'];
        $nick_name = $params['rmsa_user_nick_name'];
        $rmsa_user_roll_number = $params['rmsa_user_roll_number'];
        $rmsa_user_email_id = $params['rmsa_user_email_id'];
        $rmsa_user_DOB = $params['rmsa_user_DOB'];
        $rmsa_user_gender = $params['rmsa_user_gender'];
        $rmsa_user_father_name = $params['rmsa_user_father_name'];
        $rmsa_user_class = $params['rmsa_user_class'];

        $rmsa_district_id = $params['rmsa_district_id'];
        $rmsa_sub_district_id = $params['rmsa_sub_district_id'];
        $rmsa_school_id = $params['rmsa_school_id'];

        if(isset($_SESSION['emp_rmsa_user_id'])){
            $rmsa_district_id = $_SESSION['emp_rmsa_district_id'];
            $rmsa_sub_district_id = $_SESSION['emp_rmsa_sub_district_id'];
            $rmsa_school_id = $_SESSION['emp_rmsa_school_id'];
        }

        $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_first_name  = '" . $first_name . "',
                                  rmsa_user_middle_name = '" . $middle_name . "',  
                                  rmsa_user_last_name   = '" . $last_name . "',  
                                  rmsa_user_nick_name   = '" . $nick_name . "' , 
                                  rmsa_user_roll_number   = '" . $rmsa_user_roll_number . "' , 
                                  rmsa_user_email_id   = '" . $rmsa_user_email_id . "' , 
                                  rmsa_user_DOB   = '" . $rmsa_user_DOB . "' , 
                                  rmsa_user_gender   = '" . $rmsa_user_gender . "' , 
                                  rmsa_user_father_name   = '" . $rmsa_user_father_name . "' , 
                                  rmsa_user_class   = '" . $rmsa_user_class . "',                                  
                                  rmsa_district_id   = '" . $rmsa_district_id . "' , 
                                  rmsa_sub_district_id   = '" . $rmsa_sub_district_id . "', 
                                  rmsa_school_id   = '" . $rmsa_school_id . "'
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }

    public function student_details($stud_id) {
        $rmsa_user_id = $stud_id;
        $data = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        $student_data = $data->row_array();
        if (isset($student_data)) {
            return $student_data;
        }
    }

    
    public function update_password_teacher($params, $emp_id) {
        $new_password = md5($params['rmsa_user_new_password']);
        $rmsa_user_id = $emp_id;
        $result = $this->db->query("UPDATE rmsa_teacher_users
                          SET rmsa_user_email_password = '" . $new_password . "'
                          WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }
    public function update_profile_teacher($params, $emp_id) {
        $rmsa_user_id = $emp_id;
        $first_name = $params['rmsa_user_first_name'];
        $middle_name = $params['rmsa_user_middle_name'];
        $last_name = $params['rmsa_user_last_name'];
        $rmsa_user_employee_code = $params['rmsa_user_employee_code'];
        $rmsa_user_email_id = $params['rmsa_user_email_id'];
        $rmsa_user_DOB = $params['rmsa_user_DOB'];
        $rmsa_district_id = $params['rmsa_district_id'];
        $rmsa_sub_district_id = $params['rmsa_sub_district_id'];
        $rmsa_school_id = $params['rmsa_school_id'];
        $result = $this->db->query("UPDATE rmsa_teacher_users
                              SET rmsa_user_first_name  = '" . $first_name . "',
                                  rmsa_user_middle_name = '" . $middle_name . "',  
                                  rmsa_user_last_name   = '" . $last_name . "',  
                                  rmsa_user_employee_code   = '" . $rmsa_user_employee_code . "' , 
                                  rmsa_user_email_id   = '" . $rmsa_user_email_id . "', 
                                  rmsa_user_DOB   = '" . $rmsa_user_DOB . "', 
                                  rmsa_district_id   = '" . $rmsa_district_id . "', 
                                  rmsa_sub_district_id   = '" . $rmsa_sub_district_id . "', 
                                  rmsa_school_id   = '" . $rmsa_school_id . "' 
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }
    public function teacher_details($stud_id) {
        $rmsa_user_id = $stud_id;
        $data = $this->db->query("SELECT * FROM rmsa_teacher_users WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        $student_data = $data->row_array();
        if (isset($student_data)) {
            return $student_data;
        }
    }
    
    
    
    public function update_password_employee($params, $emp_id) {
        $new_password = md5($params['rmsa_user_new_password']);
        $rmsa_user_id = $emp_id;
        $result = $this->db->query("UPDATE rmsa_employee_users
                          SET rmsa_user_email_password = '" . $new_password . "'
                          WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }
    public function update_profile_employee($params, $emp_id) {
        $rmsa_user_id = $emp_id;
        $first_name = $params['rmsa_user_first_name'];
        $middle_name = $params['rmsa_user_middle_name'];
        $last_name = $params['rmsa_user_last_name'];
        $rmsa_user_employee_code = $params['rmsa_user_employee_code'];
        $rmsa_user_email_id = $params['rmsa_user_email_id'];
        $rmsa_user_DOB = $params['rmsa_user_DOB'];
        $rmsa_district_id = $params['rmsa_district_id'];
        $rmsa_sub_district_id = $params['rmsa_sub_district_id'];
        $rmsa_school_id = $params['rmsa_school_id'];

        $result = $this->db->query("UPDATE rmsa_employee_users
                              SET rmsa_user_first_name  = '" . $first_name . "',
                                  rmsa_user_middle_name = '" . $middle_name . "',  
                                  rmsa_user_last_name   = '" . $last_name . "',  
                                  rmsa_user_employee_code   = '" . $rmsa_user_employee_code . "' , 
                                  rmsa_user_email_id   = '" . $rmsa_user_email_id . "', 
                                  rmsa_user_DOB   = '" . $rmsa_user_DOB . "', 
                                  rmsa_district_id   = '" . $rmsa_district_id . "', 
                                  rmsa_sub_district_id   = '" . $rmsa_sub_district_id . "', 
                                  rmsa_school_id   = '" . $rmsa_school_id . "' 
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }
    public function employee_details($stud_id) {
        $rmsa_user_id = $stud_id;
        $data = $this->db->query("SELECT * FROM rmsa_employee_users WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        $student_data = $data->row_array();
        if (isset($student_data)) {
            return $student_data;
        }
    }
    
    
     public function create_quiz($params){                       
        if(isset($_SESSION['emp_rmsa_user_id'])){
            $params['created_by'] = $_SESSION['emp_rmsa_user_id'];            
            $params['rmsa_employee_users_id'] = (int)$_SESSION['emp_rmsa_user_id'];            
        }                
        $result = $this->db->insert('quiz',$params);
        $insert_id = $this->db->insert_id();// get last insert id
        if(!empty($insert_id)){
            return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }
    public function add_quistions($params){                                             
        $result = $this->db->insert('questions',$params);
        $insert_id = $this->db->insert_id();// get last insert id
        if(!empty($insert_id)){
            return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }
    public function add_choice($params){                                             
        $result = $this->db->insert('choices',$params);
        $insert_id = $this->db->insert_id();// get last insert id
        if(!empty($insert_id)){
            return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }
    
    public function get_question($question_id) {        
        $data = $this->db->query("SELECT qs.question,qz.* FROM questions qs
                                    LEFT JOIN quiz qz
                                    ON qz.quiz_id=qs.quiz_id                                    
                                    WHERE question_id ='$question_id'");
        $quiz_data = $data->row_array();
        if (isset($quiz_data)) {
            return $quiz_data;
        }
        return array();
    }
    public function get_choices($question_id) {        
        $data = $this->db->query("SELECT * FROM choices WHERE question_id ='$question_id'");
        $choice_data = $data->result_array();
        if (isset($choice_data)) {
            return $choice_data;
        }
        return array();
    }
    public function get_quiz($quiz_id) {        
        $data = $this->db->query("SELECT * FROM quiz WHERE quiz_id ='$quiz_id'");
        $quiz_data = $data->row_array();
        if (isset($quiz_data)) {
            return $quiz_data;
        }
        return array();
    }
    public function count_quiz_questions($quiz_id) {        
        $data = $this->db->query("SELECT COUNT(question_id) as question_count FROM questions WHERE quiz_id ='$quiz_id'");
        $quiz_data = $data->row_array();
        if (isset($quiz_data)) {
            return $quiz_data['question_count'];
        }
        return array();
    }

}
