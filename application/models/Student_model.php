<?php
    class Student_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }
        public function student_details(){
            $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
            $data = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_id = '".$rmsa_user_id."'");
            $student_data = $data->row_array();
            if(isset($student_data)){
                return $student_data;
            }
        }
        public function check_current_password($current_password){
            $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
            $check = $this->db->query("SELECT * FROM rmsa_student_users
                                       WHERE rmsa_user_id = '".$rmsa_user_id."'
                                       AND rmsa_user_email_password ='".$current_password."'");
            $row = $check->row_array();
            if (isset($row)){
                if($current_password == $row['rmsa_user_email_password']){
                    return true; //matched
                }
            }
            return false;//not matched
        }

        public function update_password($params){
            $new_password = $params['rmsa_user_new_password'];
            $rmsa_user_id = $_SESSION['st_rmsa_user_id'];

            $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_email_password = '".$new_password."'
                              WHERE rmsa_user_id = '".$rmsa_user_id."'");
            return $result;//return true/false

        }

        public function update_profile($params){
            $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
            $first_name   = $params['rmsa_user_first_name'];
            $middle_name  = $params['rmsa_user_middle_name'];
            $last_name    = $params['rmsa_user_last_name'];
            $nick_name    = $params['rmsa_user_nick_name'];

            $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_first_name  = '".$first_name."',
                                  rmsa_user_middle_name = '".$middle_name."',  
                                  rmsa_user_last_name   = '".$last_name."',  
                                  rmsa_user_nick_name   = '".$nick_name."'  
                              WHERE rmsa_user_id = '".$rmsa_user_id."'");
            return $result;//return true/false
        }
    }
?>