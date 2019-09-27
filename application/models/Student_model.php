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

        public function approve_student($rmsa_user_id){
            $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = 'ACTIVE' WHERE rmsa_user_id='{$rmsa_user_id}'");

            if($query_res){
                return true;
            }

        }

        public function is_active($rmsa_user_id){
            $check = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_student_login_active = 1");
            $issctive = $check->row_array();
            if($issctive['rmsa_student_login_active']){
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

        public function file_viewcount($rmsa_uploaded_file_id){
            $query_res = $this->db->query("UPDATE  rmsa_uploaded_files SET uploaded_file_viewcount = uploaded_file_viewcount + 1 WHERE 	rmsa_uploaded_file_id='{$rmsa_uploaded_file_id}'");

            if($query_res){

                $view_check = $this->db->query("SELECT * FROM rmsa_user_file_views WHERE rmsa_user_id ='".$_SESSION['st_rmsa_user_id']."'
                                                AND rmsa_uploaded_file_id = '".$rmsa_uploaded_file_id."'");

                if(!is_array($view_check->row_array())){
                    //insert student view  file
                    $this->db->query("INSERT INTO  rmsa_user_file_views(rmsa_user_id,rmsa_uploaded_file_id)
                                  VALUES('".$_SESSION['st_rmsa_user_id']."',$rmsa_uploaded_file_id)");
                }
                return array(
                    'count_added' => true
                );
            }
        }

        public function post_review($params){

            $userId  = $_SESSION['st_rmsa_user_id'];
            $fileId  = $params['file_id'];
            $rating  = $params['rating'];
            $comment = trim($params['comment']);

            //check user has already rating for this post or not

            $check = $this->db->query("SELECT * FROM rmsa_file_reviews WHERE rmsa_file_rating IS NOT NULL AND rmsa_user_id = '".$userId."' AND rmsa_uploaded_file_id = '".$fileId."'");

            $check_record = $check->result_array();

            if(count($check_record)<=0){
              $this->db->query("INSERT INTO rmsa_file_reviews(rmsa_user_id,rmsa_uploaded_file_id,rmsa_file_rating,rmsa_review_status)
                           VALUES('".$userId."','".$fileId."','".$rating."',1) ");

            }
            if(!empty($comment)){
                //add comment for that

                $comments = array(
                    'fileId' => $fileId,
                    'comment'=> $comment
                );
                self::add_comments($comments);
            }

            return Array(
                'success' => true
            );

        }

        public function add_comments($comments = array()){
            $userId    = $_SESSION['st_rmsa_user_id'];
            $userType  = 1;
            $fileId    = $comments['fileId'];
            $comment   = $comments['comment'];
            $commentType = 1;

            $this->db->query("INSERT INTO rmsa_review_comments(rmsa_user_id,rmsa_user_type,rmsa_uploaded_file_id,rmsa_file_comment,comment_type)
                              VALUES('".$userId."','".$userType."','".$fileId."','".$comment."','".$commentType."') ");
        }






        public function student_has_file_rating($fileId){
            $check_rating = $this->db->query("SELECT * FROM rmsa_file_reviews
                                              WHERE rmsa_user_id = '".$_SESSION['st_rmsa_user_id']."'
                                              AND rmsa_uploaded_file_id='".$fileId."'");
            $res = $check_rating->result_array();
            return current($res);
        }

    }
?>