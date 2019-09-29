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

                //Add or update student user log

                $has_already_log = $this->db->query("SELECT * FROM rmsa_student_users_log WHERE rmsa_user_id = '{$row['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if(is_array($log)){                    //update
                    $date = date("Y-m-d h:i:s");
                    $this->db->query("UPDATE rmsa_student_users_log SET last_login_dt = '{$date}',is_logged_in = 1 WHERE rmsa_user_id = '{$row['rmsa_user_id']}'");
                }else{
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_student_users_log(rmsa_user_id,failed_password_attempt_count,is_logged_in)VALUES('".$row['rmsa_user_id']."',0,1) ");
                }


                $this->db->query("UPDATE rmsa_student_users SET rmsa_student_login_active = 1 WHERE rmsa_user_id='".$row['rmsa_user_id']."' ");
                $this->session->sessionStudent($row);
                return true;
            }
           return false;
        }
        else{

            $get_user = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id = '$username' ");

            $check = $get_user->row_array();
            if(is_array($check)){
                $has_already_log = $this->db->query("SELECT * FROM rmsa_student_users_log WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if(is_array($log)){ //update
                    $this->db->query("UPDATE rmsa_student_users_log SET failed_password_attempt_count = failed_password_attempt_count + 1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                }else{
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_student_users_log(rmsa_user_id,failed_password_attempt_count)VALUES('".$check['rmsa_user_id']."',1) ");
                }
            }


        }
    }
  
}
?>