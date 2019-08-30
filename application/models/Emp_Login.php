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
                $this->db->query("UPDATE rmsa_employee_users SET rmsa_employee_login_active = 1 WHERE rmsa_user_id='".$emp_data['rmsa_user_id']."' ");
                $this->session->sessionEmployee($emp_data);
                return true;
            }
        }
        return false;
    }

    public function isEmployeeActive($rmsa_user_id){
        $check = $this->db->query("SELECT * FROM rmsa_employee_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_employee_login_active = 1");
        $issctive = $check->row_array();
        if($issctive['rmsa_employee_login_active']){
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