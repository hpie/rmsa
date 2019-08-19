<?php

class Emp_Login extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function emp_login_select($username, $password) {

        $employee = $this->db->query("SELECT * FROM `rmsa_employee_users` WHERE rmsa_user_email_id = '$username'
                                      AND rmsa_user_email_password = '$password' AND rmsa_user_status = 'ACTIVE'");

        $emp_data = $employee->row_array();

        if (isset($emp_data)){
            if ($username == $emp_data['rmsa_user_email_id'] && $password == $emp_data['rmsa_user_email_password']) {
                $this->session->sessionAdmin($emp_data);
                return true;
            }
        }
        return false;
    }
}
?>