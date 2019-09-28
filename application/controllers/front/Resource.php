<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resource extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('resource_model');
    }

    public function resources(){
        $this->mViewData['title']=' - Student Resources';
        $this->renderFront('front/student_resources.php');
    }

    public function file_viewcount(){
        if($_REQUEST['rmsa_uploaded_file_id']){
            $res = $this->resource_model->file_viewcount($_REQUEST['rmsa_uploaded_file_id']);
            echo json_encode($res);
        }
    }

    public function post_review(){
        if($_REQUEST['file_id'] && $_REQUEST['rating']){
            $reviews = $this->resource_model->post_review($_POST);
            echo json_encode($reviews);
        }
    }

    public function display_review(){
        $review_comments = '';
        if($_REQUEST['file_id']) {

            $reviews = $this->resource_model->display_review($_REQUEST['file_id']);

            if (count($reviews)) {

                foreach ($reviews AS $key => $review) {
                    $star = '';

                    for ($i = 1; $i <= 5; $i++) {

                        if($i >= $review['rmsa_file_rating']){
                            $star .= '<span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                        }
                        else{
                            $star .= '<span class="float-right"><i class="text-warning fa fa-star-o"></i></span>';
                        }
                    }

                    $comments = $this->resource_model->get_comments($_REQUEST['file_id']);
                    $all_comment = '';
                    if (count($comments)) {
                        foreach ($comments AS $key => $comment) {
                            $all_comment .= ' <p>' . $comment['rmsa_file_comment'] . '</p>';
                        }
                    }
                    $review_comments .= '<div class="row">
                                            <div class="col-md-2">
                                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>                   
                                            </div>
                                            <div class="col-md-10">     
                                                 <p>
                                                    <a class="float-left" href="#"><strong>'.$review['username'].'</strong></a>                                            
                                                    ' . $star . '                    
                                                </p>               
                                                <div class="clearfix"></div>
                                                ' . $all_comment . '           
                                            </div>
                                         </div>';
                }

            }
        }

        echo $review_comments;

    }

    public function display_rating(){
        $star = '';
        if($_REQUEST['file_id']) {
            $student_has_rating = $this->resource_model->student_has_file_rating($_REQUEST['file_id']);
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

    public  function view_review($fileId){

        $reviews_arr = Array();

        $reviews = $this->resource_model->display_review($fileId);

        if (count($reviews)) {
            foreach ($reviews AS $key1 => $review) {
                $reviews_arr [] = $review;

                $comments = $this->resource_model->get_comments($fileId);

                $comments_arr = Array();
                if (count($comments)) {
                    foreach ($comments AS $key => $comment) {
                        $comments_arr [$comment['rmsa_review_comment_id']] =  $comment['rmsa_file_comment'];
                    }
                }
                $reviews_arr[$key1]['comments'] = $comments_arr;
            }
        }
        $get_title = $this->resource_model->get_file_title($fileId);
        $avg       = $this->resource_model->get_file_avg_rating($fileId);

        $data = array(
            'file_title' => $get_title[0]['uploaded_file_title'],
            'comments'   => $reviews_arr,
            'avg_rating' => $avg,
        );

        $this->mViewData['reviews'] = $data;
        $this->mViewData['title']=' - File Reviews';
        $this->renderFront('front/file_reviews');
    }

}