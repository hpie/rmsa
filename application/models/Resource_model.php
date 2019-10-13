<?php
class Resource_model extends CI_Model{
    function __construct(){
        parent::__construct();
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

    public function display_review($file_id){
        $comments = $this->db->query("SELECT fr.*,CONCAT(su.rmsa_user_first_name,' ',su.rmsa_user_last_name) AS username
                                      FROM rmsa_file_reviews fr
                                      INNER JOIN rmsa_student_users su ON su.rmsa_user_id = fr.rmsa_user_id
                                      WHERE fr.rmsa_uploaded_file_id = '".$file_id."'
                                      ORDER BY fr.rmsa_review_id DESC");

        return $comments->result_array();

    }

    public function get_comments($file_id ,$limit = ''){

        $limit_sql = '';
        if($limit != '')
            $limit_sql = "LIMIT ".$limit;
        $comments = $this->db->query("SELECT * FROM  rmsa_review_comments WHERE rmsa_uploaded_file_id = '".$file_id."' AND comment_type = 1 {$limit_sql}");
        return $comments->result_array();
    }

    public function get_comments_reply($commentId){
        $reply = $this->db->query("SELECT * FROM rmsa_review_comments WHERE reply_on = '{$commentId}' AND comment_type = 2");
        return $reply->result_array();
    }

    public function student_has_file_rating($fileId){
        $check_rating = $this->db->query("SELECT * FROM rmsa_file_reviews
                                              WHERE rmsa_user_id = '".$_SESSION['st_rmsa_user_id']."'
                                              AND rmsa_uploaded_file_id='".$fileId."'");
        $res = $check_rating->result_array();
        return current($res);
    }

    public function get_file_title($fileId){
        $title = $this->db->query("SELECT uploaded_file_title FROM  rmsa_uploaded_files WHERE rmsa_uploaded_file_id = '".$fileId."'");
        return $title->result_array();
    }
    public function get_file_avg_rating($fileId){
        $avg_rating = $this->db->query("SELECT AVG(rmsa_file_rating) as overall_rating
                                           FROM rmsa_file_reviews
                                           WHERE rmsa_uploaded_file_id = '{$fileId}'
                                           AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
        $avg = $avg_rating->result_array();

        return current($avg);
    }

    public function comment_reply($params){

        if(isset($_SESSION['st_rmsa_user_id'])){//student user
            $userId    = $_SESSION['st_rmsa_user_id'];
            $userType  = 1;
        }else if(isset($_SESSION['emp_rmsa_user_id'])){ // employee user
            $userId    = $_SESSION['emp_rmsa_user_id'];
            $userType  = 2;
        }

        $fileId       = $params['file_id'];
        $commentId    = $params['comment_id'];
        $reply        = $params['reply'];
        $commentType  = 2; //reply of the comments

        $this->db->query("INSERT INTO rmsa_review_comments(rmsa_user_id,rmsa_user_type,rmsa_uploaded_file_id,rmsa_file_comment,reply_on,comment_type)
                          VALUES('".$userId."','".$userType."','".$fileId."','".$reply."','".$commentId."','".$commentType."')  ");
        return Array(
            'success' => true
        );
    }

    public function get_username($userId,$userType){

        if($userType == 1){
            $user = $this->db->query("SELECT CONCAT(rmsa_user_first_name,' ',rmsa_user_last_name) AS username
                                      FROM  rmsa_student_users WHERE rmsa_user_id ='".$userId."' ");

        }

        if($userType == 2){
            $user = $this->db->query("SELECT CONCAT(rmsa_user_first_name,' ',rmsa_user_last_name) AS username
                                      FROM  rmsa_employee_users WHERE rmsa_user_id ='".$userId."' ");
        }

        $res = $user->result_array();

        return $res[0]['username'];

    }
}