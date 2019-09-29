<?php

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function login_select($username, $password) {      
        $q = "SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id='$username' and rmsa_user_email_password='$password' AND rmsa_user_status='ACTIVE'";
        $query = $this->db->query($q);
        $row = $query->row_array(); 
        if (isset($row))
        {
            if (($username == $row['rmsa_user_email_id']) && ($password == $row['rmsa_user_email_password'])) {
                $this->db->query("UPDATE rmsa_student_users SET rmsa_student_login_active = 1 WHERE rmsa_user_id='".$row['rmsa_user_id']."' ");
                $this->session->sessionStudent($row);
                return true;
            }        
        return false;
    }
    }
  
}
?>