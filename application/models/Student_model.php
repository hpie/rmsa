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
                $result = $this->db->query("INSERT INTO rmsa_file_reviews(rmsa_user_id,rmsa_uploaded_file_id,rmsa_file_rating,rmsa_review_status)
                           VALUES('".$userId."','".$fileId."','".$rating."',1) ");

                $rmsa_review_id = $this->db->insert_id();


                if(!empty($comment)){
                    //add comment for that
                    $this->db->query("INSERT INTO rmsa_review_comments(rmsa_review_id,rmsa_review_text)
                                  VALUES('".$rmsa_review_id."','".$comment."')  ");
                }

                if(!$result){
                    return Array(
                        'success' => false
                    );
                }

                return Array(
                    'success' => true
                );
            }
            else{

                $rmsa_review_id = $check_record[0]['rmsa_review_id'];
                //other wise they can only write comment for it.
                if(!empty($comment)){
                    //add comment for that
                    $this->db->query("INSERT INTO rmsa_review_comments(rmsa_review_id,rmsa_review_text)
                                  VALUES('".$rmsa_review_id."','".$comment."')  ");
                }

                return Array(
                    'success' => true
                );

            }
        }

        public function display_review($file_id){
            $comments = $this->db->query("SELECT fr.*,CONCAT(su.rmsa_user_first_name,' ',su.rmsa_user_last_name) AS username
                                      FROM rmsa_file_reviews fr
                                      INNER JOIN rmsa_student_users su ON su.rmsa_user_id = fr.rmsa_user_id
                                      WHERE fr.rmsa_uploaded_file_id = '".$file_id."'
                                      ORDER BY fr.rmsa_review_id DESC");

            return $comments->result_array();

        }
        public function get_comments($review_id){
            $comments = $this->db->query("SELECT * FROM  rmsa_review_comments WHERE rmsa_review_id = '".$review_id."'");
            return $comments->result_array();
        }

        public function get_file_title($fileId){
            $title = $this->db->query("SELECT uploaded_file_title FROM  rmsa_uploaded_files WHERE rmsa_uploaded_file_id = '".$fileId."'");
            return $title->result_array();
        }

        public function student_has_file_rating($fileId){
            $check_rating = $this->db->query("SELECT * FROM rmsa_file_reviews
                                              WHERE rmsa_user_id = '".$_SESSION['st_rmsa_user_id']."'
                                              AND rmsa_uploaded_file_id='".$fileId."'");
            $res = $check_rating->result_array();
            return current($res);
        }
        public function get_file_avg_rating($fileId){
           $avg_rating = $this->db->query("SELECT AVG(rmsa_file_rating) as overall_rating
                                           FROM rmsa_file_reviews
                                           WHERE rmsa_uploaded_file_id = '{$fileId}'
                                           AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
           $avg = $avg_rating->result_array();

           return current($avg);
        }
    }
?>