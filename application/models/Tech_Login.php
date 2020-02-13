<?php

class Tech_Login extends CI_Model {

    function __construct() {
        $this->load->helper('functions'); 
        parent::__construct();
    }

    public function tech_login_select($username, $password) {
        $password = md5($password);
//        echo $password;die;
        $employee = $this->db->query("SELECT * FROM `rmsa_teacher_users` WHERE ( rmsa_user_email_id = '$username' OR rmsa_user_employee_code= '$username')
                                      AND rmsa_user_email_password = '$password' AND rmsa_user_status = 'ACTIVE' AND rmsa_user_locked_status=0");
        $emp_data = $employee->row_array();
        if (isset($emp_data)) {
            if (($username == $emp_data['rmsa_user_email_id'] || $username == $emp_data['rmsa_user_employee_code']) && $password == $emp_data['rmsa_user_email_password']) {
                //Add or update Employee user log
                $has_already_log = $this->db->query("SELECT * FROM  rmsa_teacher_users_log WHERE rmsa_user_id = '{$emp_data['rmsa_user_id']}'");

                $this->db->query("UPDATE rmsa_teacher_users SET rmsa_user_attempt =0,rmsa_user_locked_status=0 WHERE rmsa_user_id = '{$emp_data['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if (is_array($log)) {                    //update
                    $date = date("Y-m-d h:i:s");
                    $this->db->query("UPDATE rmsa_teacher_users_log SET last_login_dt = '{$date}', is_logged_in = 1 WHERE rmsa_user_id = '{$emp_data['rmsa_user_id']}'");
                } else {
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_teacher_users_log(rmsa_user_id,failed_password_attempt_count,is_logged_in)VALUES('" . $emp_data['rmsa_user_id'] . "',0,1) ");
                }
                $this->db->query("UPDATE rmsa_teacher_users SET rmsa_employee_login_active = 1 WHERE rmsa_user_id='" . $emp_data['rmsa_user_id'] . "' ");
                sessionTeacher($emp_data);

                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet .= "0123456789";
                $max = strlen($codeAlphabet); // edited
                for ($i = 0; $i < 10; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max - 1)];
                }
                
//                print_r($emp_data);die;
                $_SESSION['rmsa_teacher_id'] =$emp_data['rmsa_user_id'];
                $_SESSION['tokencheck'] = $token;
                $uid=$_SESSION['rmsa_teacher_id'];
                                                
                $result_token = $this->db->query("select count(*) as allcount from teacher_token");
                $row_token = $result_token->row_array();                
                if ($row_token['allcount'] > 0) {                    
                    $this->db->query("update teacher_token set token='$token' where rmsa_user_id='$uid'");
//                    mysqli_query($con, "update teacher_token set token='" . $token . "' where username='" . $uname . "'");
                } else {
                    $this->db->query("insert into teacher_token(rmsa_user_id,token) values('$uid','$token')");
                }
                return true;
            }
        } else {
            $get_user = $this->db->query("SELECT * FROM rmsa_teacher_users WHERE (rmsa_user_email_id = '$username' OR rmsa_user_employee_code= '$username') ");
            $check = $get_user->row_array();
            if (is_array($check)) {

                if ($check['rmsa_user_attempt'] == 0 || $check['rmsa_user_attempt'] == 1) {
                    $this->db->query("UPDATE rmsa_teacher_users SET rmsa_user_attempt =rmsa_user_attempt+1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                }
                if ($check['rmsa_user_attempt'] >= 2) {
                    $this->db->query("UPDATE rmsa_teacher_users SET rmsa_user_attempt =rmsa_user_attempt+1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                    $this->db->query("UPDATE rmsa_teacher_users SET rmsa_user_locked_status =1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                    $_SESSION['invalidAttempt'] = 1;
                }

                $has_already_log = $this->db->query("SELECT * FROM rmsa_teacher_users_log WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");

                $log = $has_already_log->row_array();

                if (is_array($log)) { //update
                    $this->db->query("UPDATE rmsa_teacher_users_log SET failed_password_attempt_count = failed_password_attempt_count + 1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                } else {
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_teacher_users_log(rmsa_user_id,failed_password_attempt_count)VALUES('" . $check['rmsa_user_id'] . "',1) ");
                }
            }
        }
        return false;
    }

    public function isEmployeeActive($rmsa_user_id) {
        $check = $this->db->query("SELECT * FROM rmsa_teacher_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_user_status = 'ACTIVE'");
        $issctive = $check->row_array();
        if ($issctive['rmsa_user_status'] == 'ACTIVE') {
            return array(
                'isactive' => true
            );
        } else {
            return array(
                'isactive' => false
            );
        }
    }

    public function update_logout_status($rmsa_user_id) {
        $query_res = $this->db->query("UPDATE rmsa_teacher_users SET rmsa_employee_login_active = 0 WHERE rmsa_user_id='" . $rmsa_user_id . "' ");
        if ($query_res) {
            return true;
        }
    }
    public function getTokenAndCheck($table,$rmsa_employee_id) {
        $table=$table.'_token';
        $result = $this->db->query("SELECT token FROM $table where rmsa_user_id='$rmsa_employee_id'");
        $data = $result->row_array();        
        if($data){
            return $data;
        }
        return false;
    }

}

?>