<?php

class Login_model extends CI_Model{
    function __construct(){
        $this->load->helper('functions'); 
        parent::__construct();
    }
    
    public function chek_code_exist($user_id,$link_code,$user_type) {       
        $q = "SELECT * FROM user_email_link WHERE rmsa_user_id=$user_id AND user_type='$user_type' AND link_code='$link_code' ";
        $query = $this->db->query($q);
        $row = $query->row_array(); 
        if (isset($row))
        {
            $table="rmsa_".$user_type."_users";
            $this->db->query("UPDATE $table SET rmsa_user_status='ACTIVE',rmsa_user_attempt=0,rmsa_user_locked_status=0,rmsa_user_email_verified_status=1 WHERE rmsa_user_id =$user_id ");
            $this->db->query("DELETE FROM user_email_link WHERE rmsa_user_id=$user_id AND user_type='$user_type' AND link_code='$link_code'");
            return true;
        }
        return false;
    }
        
    public function login_select($username, $password) {
        $password= md5($password);      
        $q = "SELECT * FROM rmsa_student_users WHERE (rmsa_user_email_id='$username' OR rmsa_user_roll_number='$username') and rmsa_user_email_password='$password' AND rmsa_user_status='ACTIVE' AND rmsa_user_locked_status=0";
        $query = $this->db->query($q);
        $row = $query->row_array(); 
        if (isset($row))
        {
            if ((($username == $row['rmsa_user_email_id']) || ($username == $row['rmsa_user_roll_number'])) && ($password == $row['rmsa_user_email_password'])) {

                //Add or update student user log
                
                $has_already_log = $this->db->query("SELECT * FROM rmsa_student_users_log WHERE rmsa_user_id = '{$row['rmsa_user_id']}'");

                $this->db->query("UPDATE rmsa_student_users SET rmsa_user_attempt =0,rmsa_user_locked_status=0 WHERE rmsa_user_id = '{$emp_data['rmsa_user_id']}'");
                
                $log = $has_already_log->row_array();
                
                if(is_array($log)){
                    $date = date("Y-m-d h:i:s");
                    $this->db->query("UPDATE rmsa_student_users_log SET last_login_dt = '{$date}',is_logged_in = 1 WHERE rmsa_user_id = '{$row['rmsa_user_id']}'");
                }else{
                    //insert new log for user
                    $this->db->query("INSERT INTO rmsa_student_users_log(rmsa_user_id,failed_password_attempt_count,is_logged_in)VALUES('".$row['rmsa_user_id']."',0,1) ");
                }
                $this->db->query("UPDATE rmsa_student_users SET rmsa_student_login_active = 1 WHERE rmsa_user_id='".$row['rmsa_user_id']."' ");
                sessionStudent($row);
                
                
                $token = "";
                $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
                $codeAlphabet .= "0123456789";
                $max = strlen($codeAlphabet); // edited
                for ($i = 0; $i < 10; $i++) {
                    $token .= $codeAlphabet[random_int(0, $max - 1)];
                }               
                $_SESSION['rmsa_student_id'] =$row['rmsa_user_id'];
                $_SESSION['tokencheck'] = $token;
                $uid=$_SESSION['rmsa_student_id'];
                                                
                $result_token = $this->db->query("select count(*) as allcount from student_token");
                $row_token = $result_token->row_array();                
                if ($row_token['allcount'] > 0) {                    
                    $this->db->query("update student_token set token='$token' where rmsa_user_id='$uid'");
//                    mysqli_query($con, "update student_token set token='" . $token . "' where rmsa_user_id='" . $uid . "'");
                } else {
                    $this->db->query("insert into student_token(rmsa_user_id,token) values('$uid','$token')");
                }
                
                
                
                return true;
            }
           return false;
        }
        else{
            
            $ipaddress=get_client_ip();
            $this->db->query("INSERT INTO wrong_login_log(username,password,ip_address,created_dt,user_type)VALUES('" . $username . "','" . $password . "','" . $ipaddress . "',now(),'Student') ");
            
            $get_user = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id = '$username' ");

            $check = $get_user->row_array();
            if(is_array($check)){
                
                 if($check['rmsa_user_attempt']==0 || $check['rmsa_user_attempt']==1){
                    $this->db->query("UPDATE rmsa_student_users SET rmsa_user_attempt =rmsa_user_attempt+1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                }
                if($check['rmsa_user_attempt']>=2){
                    $this->db->query("UPDATE rmsa_student_users SET rmsa_user_attempt =rmsa_user_attempt+1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                    $this->db->query("UPDATE rmsa_student_users SET rmsa_user_locked_status =1 WHERE rmsa_user_id = '{$check['rmsa_user_id']}'");
                    $_SESSION['invalidAttempt']=1;
                }
                
                
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


    public function getTokenAndCheck($rmsa_student_id) {
        $result = $this->db->query("SELECT token FROM student_token where rmsa_user_id='$rmsa_student_id'");
        $data = $result->row_array();
        if($data){
            return $data;
        }
        return false;
    }
  
}
?>