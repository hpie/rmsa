<?php

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    
    public function login_select($username, $password) {      
        $q = "SELECT * FROM users WHERE username='$username' and password='$password'";
        $query = $this->db->query($q);
        $row = $query->row_array(); 
//        print_r($row);die;
        if (isset($row))
        {
            if ($username == $row['username'] && $password == $row['password']) {               
                $this->session->sessionAdmin($row);
                return true;
            }
        }
        return false;
    }
    
  
}
?>