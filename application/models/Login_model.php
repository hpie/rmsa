<?php

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function login_select($username, $password) {      
        $q = "SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id='$username' and rmsa_user_email_password='$password'";
        $query = $this->db->query($q);
        $row = $query->row_array(); 
        if (isset($row))
        {
            if ($username == $row['rmsa_user_email_id'] && $password == $row['rmsa_user_email_password']) {
                $this->db->query("UPDATE rmsa_student_users SET rmsa_student_login_active = 1 WHERE rmsa_user_id='".$row['rmsa_user_id']."' ");
                $this->session->sessionStudent($row);
                return true;
            }        
        return false;
    }
    }
    public function approve_student($rmsa_user_id){
        $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = 'ACTIVE' WHERE rmsa_user_id='{$rmsa_user_id}'");

        if($query_res){
            return true;
        }

    }
    public function isStudentActive($rmsa_user_id){
        $check = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_student_login_active = 1");
        $issctive = $check->row_array();
        if($issctive['rmsa_student_login_active']){
            return array(
                'isactive' => true
            );
        }
        else{
            return array(
                'isactive' => false
            );
        }
    }
  
}
?>