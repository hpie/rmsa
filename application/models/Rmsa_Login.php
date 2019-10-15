<?php
class Rmsa_Login extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function Rmsa_Login_select($username, $password) {
        $password= md5($password); 
        $rmsa = $this->db->query("SELECT * FROM `rmsa_rmsa_users` WHERE rmsa_user_email_id = '$username' AND rmsa_user_email_password = '$password' AND rmsa_user_status = 'ACTIVE'");
        $rmsa_data = $rmsa->row_array();
        if (isset($rmsa_data)){            
            if ($username == $rmsa_data['rmsa_user_email_id'] && $password == $rmsa_data['rmsa_user_email_password']) {
                $has_already_log = $this->db->query("SELECT * FROM  rmsa_rmsa_users_log WHERE rmsa_user_id = '{$rmsa_data['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if(is_array($log)){                    //update
                    $date = date("Y-m-d h:i:s");
                    $this->db->query("UPDATE rmsa_rmsa_users_log SET last_login_dt = '{$date}',	is_logged_in = 1 WHERE rmsa_user_id = '{$rmsa_data['rmsa_user_id']}'");
                }else{
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_rmsa_users_log(rmsa_user_id,failed_password_attempt_count,is_logged_in)VALUES('".$rmsa_data['rmsa_user_id']."',0,1) ");
                }
                $this->db->query("UPDATE rmsa_employee_users SET rmsa_employee_login_active = 1 WHERE rmsa_user_id='".$rmsa_data['rmsa_user_id']."' ");
                $this->session->sessionRmsa($rmsa_data);
                return true;
            }
        }
        else{
            $get_user = $this->db->query("SELECT * FROM rmsa_rmsa_users WHERE rmsa_user_email_id = '$username' ");

            $check = $get_user->row_array();
            if(is_array($check)){
                $has_already_log = $this->db->query("SELECT * FROM rmsa_rmsa_users_log WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if(is_array($log)){ //update
                    $this->db->query("UPDATE rmsa_rmsa_users_log SET failed_password_attempt_count = failed_password_attempt_count + 1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                }else{
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_rmsa_users_log(rmsa_user_id,failed_password_attempt_count)VALUES('".$check['rmsa_user_id']."',1) ");
                }
            }
        }
        return false;
    }
    public function isRmsaActive($rmsa_user_id){
        $check = $this->db->query("SELECT * FROM rmsa_rmsa_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_user_status = 'ACTIVE'");
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
            $query_res=$this->db->query("UPDATE rmsa_rmsa_users SET rmsa_rmsa_login_active = 0 WHERE rmsa_user_id='".$rmsa_user_id."' ");
            if($query_res){
                return true;
            }
    }
}
?>