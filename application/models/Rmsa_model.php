<?php

class Rmsa_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function check_current_password($current_password) {
        $current_password = md5($current_password);
        $rmsa_user_id = $_SESSION['rm_rmsa_user_id'];
        $check = $this->db->query("SELECT * FROM rmsa_coordinators
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

    public function update_password($params) {
        $new_password = md5($params['rmsa_user_new_password']);
        $rmsa_user_id = $_SESSION['rm_rmsa_user_id'];
        $result = $this->db->query("UPDATE rmsa_coordinators
                              SET rmsa_user_email_password = '" . $new_password . "'
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }
    
    
    public function approve_student($params) {
        $query_res = $this->db->query("UPDATE  rmsa_coordinators SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
        if ($query_res) {
            return true;
        }
    }
     public function active_teacher($params) {
        $query_res = $this->db->query("UPDATE  rmsa_teacher_users SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
        if ($query_res) {
            return true;
        }
    }
    
    public function unblock_user($id,$table) {        
        $query_res = $this->db->query("UPDATE  $table SET rmsa_user_locked_status=0, rmsa_user_attempt=0
                                       WHERE rmsa_user_id='{$id}'");
        if ($query_res) {
            return true;
        }
    }
    
    
    public function active_employee($params) {
        $query_res = $this->db->query("UPDATE  rmsa_employee_users SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
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
    public function active_student($params) {
        $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
        if ($query_res) {
            return true;
        }
    }
    public function verify_email($params) {       
        $query_res = $this->db->query("UPDATE  {$params['table']} SET rmsa_user_email_verified_status = '{$params['rmsa_user_email_verified_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
        if ($query_res) {
            return true;
        }
    }

    public function register_teacher($params) {
        $email_exist = $this->db->query("SELECT * FROM rmsa_teacher_users WHERE rmsa_user_email_id = '" . $params['rmsa_user_email_id'] . "' ");
        $res = $email_exist->row_array();
        if ($res) {
            return Array(
                'success' => false,
                'email_exist' => true
            );
        }
        $params['rmsa_user_email_password'] = md5($params['rmsa_user_email_password']);
        unset($params['rmsa_user_confirm_password']);
        unset($params['g-recaptcha-response']);

        if (isset($_SESSION['rm_rmsa_user_id'])) {
            $params['created_by'] = $_SESSION['rm_rmsa_user_id'];
        } else {
            unset($params['created_by']);
        }

        $result = $this->db->insert('rmsa_teacher_users', $params);
        $insert_id = $this->db->insert_id(); // get last insert id
        if (!empty($insert_id)) {
            return Array(
                'success' => true,
                'email_exist' => false,
                'email' => $params['rmsa_user_email_id'],
                'rmsa_user_id'=>$insert_id
            );
//                return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }
    public function user_email_link($params) {
        $result = $this->db->insert('user_email_link', $params);
        $insert_id = $this->db->insert_id();
        if (!empty($insert_id)) {
            return true;
        }
        return false;
     }
     public function user_forget_link($params) {
        $result = $this->db->insert('user_forget_link', $params);
        $insert_id = $this->db->insert_id();
        if (!empty($insert_id)) {
            return true;
        }
        return false;
     }
    
    public function register_employee($params) {
        $email_exist = $this->db->query("SELECT * FROM rmsa_employee_users WHERE rmsa_user_email_id = '" . $params['rmsa_user_email_id'] . "' ");
        $res = $email_exist->row_array();

        if ($res) {
            return Array(
                'success' => false,
                'email_exist' => true
            );
        }

        $params['rmsa_user_email_password'] = md5($params['rmsa_user_email_password']);
        unset($params['rmsa_user_confirm_password']);
        unset($params['g-recaptcha-response']);

        if (isset($_SESSION['rm_rmsa_user_id'])) {
            $params['created_by'] = $_SESSION['rm_rmsa_user_id'];
        } else {
            unset($params['created_by']);
        }

        $result = $this->db->insert('rmsa_employee_users', $params);
        $insert_id = $this->db->insert_id(); // get last insert id
        if (!empty($insert_id)) {

            return Array(
                'success' => true,
                'email_exist' => false,
                'email' => $params['rmsa_user_email_id'],
                'rmsa_user_id'=>$insert_id
            );
//                return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }

}
