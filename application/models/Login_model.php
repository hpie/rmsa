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
                $this->session->sessionAdmin($row);
                return true;
            }
        }
        return false;
    }
    public function approve_student($rmsa_user_id){
        $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = 'ACTIVE' WHERE rmsa_user_id='{$rmsa_user_id}'");

        if($query_res){
            return true;
        }

    }
  
}
?>