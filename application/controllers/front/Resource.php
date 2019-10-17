<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends MY_Controller{
    public function __construct(){
       // $this->session->sessionCheckStudent();
        parent::__construct();
        $this->load->model('Resource_model');
    }
    
    public function resources($uploaded_file_category){       
        $this->mViewData['uploaded_file_category'] = $uploaded_file_category;
        $this->mViewData['title']=STUDENT_RESOURCES_TITLE;
        $this->renderFront('front/student_resources.php');
    }

    public function file_viewcount(){
        if($_REQUEST['rmsa_uploaded_file_id']){
            $res = $this->Resource_model->file_viewcount($_REQUEST['rmsa_uploaded_file_id']);
            echo json_encode($res);
        }
    }

    public function post_review(){
        if($_REQUEST['file_id'] && $_REQUEST['rating']){
            $reviews = $this->Resource_model->post_review($_POST);
            echo json_encode($reviews);
        }
    }

    public function comment_reply(){
        if($_POST['comment_id'] && $_POST['comment_id'] !=''){
            $reply = $this->Resource_model->comment_reply($_POST);
            echo json_encode($reply);
        }
    }

    public function display_review(){
        $review_comments = '';
        if($_REQUEST['file_id']) {
            $limit = $_REQUEST['limit'];
            $comments = $this->Resource_model->get_comments($_REQUEST['file_id'],$limit);
            if (count($comments)) {
                $i = 0;
                foreach ($comments AS $key => $comment) {

                    $comment_username = $this->Resource_model->get_username($comment['rmsa_user_id'],$comment['rmsa_user_type']);

                    $review_comments .= '<div class="row">
                                    <div class="col-md-2">
                                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>                   
                                    </div>
                                    <div class="col-md-10">     
                                         <p>
                                            <a class="float-left" href="#"><strong>'.$comment_username.'</strong></a>
                                        </p>               
                                        <div class="clearfix"></div>
                                        ' . $comment['rmsa_file_comment'] . '           
                                    </div>
                                 </div>';
                    $i++;
                    if($i >= 10){
                     $base = BASE_URL;
                      $review_comments .= '<div class="pull-right"><a href='.$base.'/file-reviews/'.$_REQUEST['file_id'].'>View More</a></div>';
                    }


                }
            }
        }

        echo $review_comments;

    }

    public function display_rating(){
        $star = '';
        if($_REQUEST['file_id']) {
            $student_has_rating = $this->Resource_model->student_has_file_rating($_REQUEST['file_id']);
            $rating = '';
            if(is_array($student_has_rating)){

                $rating = $student_has_rating['rmsa_file_rating'];
                $star.='<div class="form-group">';
                for ($i = 1; $i <= 5; $i++) {

                    if($i > $rating){
                        $star .= '<i class="text-warning fa fa-star-o" style="color:#ffc000;font-size:24px;"></i>';
                    }
                    else{
                        $star .= '<i class="text-warning fa fa-star" style="color:#ffc000;font-size:24px;"></i>';
                    }
                }
                $star .='</div>';
            }
            else{
                $star .= '<div class="form-group review" onMouseOut="resetRating();">';
                for($i=1;$i<=5;$i++) {
                    $star .= '<i class="fa fa-star-o" style="color:#ffc000;font-size:24px;cursor:pointer;" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);"></i>';
                }
                $star .= '</div>';
            }
            $star.='<input type="hidden" name="review_rating" id="review_rating" value="'.$rating.'"/>';
        }
        echo $star;
    }

    public function get_comments_reply($commentId){
        $replies = array();
        $res = $this->Resource_model->get_comments_reply($commentId);

        foreach ($res as $key=> $reply){
            $replies [] = $reply;

            $reply_username = $this->Resource_model->get_username($reply['rmsa_user_id'],$reply['rmsa_user_type']);

            $replies [$key]['time'] = $this->time_elapsed_string($reply['comment_dt']);
            $replies [$key]['username'] =  $reply_username;
        }
        return $replies;
    }
    public  function view_review($fileId){
        $comments = $this->Resource_model->get_comments($fileId);
        $comments_arr = Array();
        if (count($comments)) {
            foreach ($comments AS $key => $comment) {

                $comment_username = $this->Resource_model->get_username($comment['rmsa_user_id'],$comment['rmsa_user_type']);

                $comments_arr [] =  $comment;
                $comments_arr [$key]['username'] =  $comment_username;
                $comments_arr [$key]['time'] =  $this->time_elapsed_string($comment['comment_dt']);
                $comments_arr [$key]['replies'] = $this->get_comments_reply($comment['rmsa_review_comment_id']);
            }
        }

        $get_title = $this->Resource_model->get_file_title($fileId);
        $avg       = $this->Resource_model->get_file_avg_rating($fileId);

        $data = array(
            'file_title' => $get_title[0]['uploaded_file_title'],
            'fileId' => $fileId,
            'comments'   => $comments_arr,
            'avg_rating' => $avg,
        );
        $this->mViewData['reviews'] = $data;
        $this->mViewData['title']=FILE_REVIEWS_TITLE;
        $this->renderFront('front/file_reviews');
    }

    function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

}