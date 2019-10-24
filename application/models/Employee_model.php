<?php

class Employee_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function approve_student($params) {
        $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
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

        $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_first_name  = '" . $first_name . "',
                                  rmsa_user_middle_name = '" . $middle_name . "',  
                                  rmsa_user_last_name   = '" . $last_name . "',  
                                  rmsa_user_nick_name   = '" . $nick_name . "'  
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

}
