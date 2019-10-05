<?php
class Emp_Login extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function emp_login_select($username, $password) {
        $password= md5($password); 
        $employee = $this->db->query("SELECT * FROM `rmsa_employee_users` WHERE rmsa_user_email_id = '$username'
                                      AND rmsa_user_email_password = '$password' AND rmsa_user_status = 'ACTIVE'");
        $emp_data = $employee->row_array();
        if (isset($emp_data)){            
            if ($username == $emp_data['rmsa_user_email_id'] && $password == $emp_data['rmsa_user_email_password']) {
                if($emp_data['rmsa_employee_login_active']==1){                    
                    return 2;
                }

                //Add or update Employee user log
                $has_already_log = $this->db->query("SELECT * FROM  rmsa_employee_users_log WHERE rmsa_user_id = '{$emp_data['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if(is_array($log)){                    //update
                    $date = date("Y-m-d h:i:s");
                    $this->db->query("UPDATE rmsa_employee_users_log SET last_login_dt = '{$date}',	is_logged_in = 1 WHERE rmsa_user_id = '{$emp_data['rmsa_user_id']}'");
                }else{
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_employee_users_log(rmsa_user_id,failed_password_attempt_count,is_logged_in)VALUES('".$emp_data['rmsa_user_id']."',0,1) ");
                }

                $this->db->query("UPDATE rmsa_employee_users SET rmsa_employee_login_active = 1 WHERE rmsa_user_id='".$emp_data['rmsa_user_id']."' ");
                $this->session->sessionEmployee($emp_data);
                return true;
            }
        }
        return false;
    }
    public function isEmployeeActive($rmsa_user_id){
        $check = $this->db->query("SELECT * FROM rmsa_employee_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_user_status = 'ACTIVE'");
        $issctive = $check->row_array();
        if($issctive['rmsa_user_status']=='ACTIVE'){
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
     public function update_logout_status($rmsa_user_id){
            $query_res=$this->db->query("UPDATE rmsa_employee_users SET rmsa_employee_login_active = 0 WHERE rmsa_user_id='".$rmsa_user_id."' ");
            if($query_res){
                return true;
            }
    }
}
?>