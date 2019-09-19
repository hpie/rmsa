<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('helper_model');
    }

    public function load_tehsil(){
        if($_REQUEST['districtId']){
            $tehsil = $this->helper_model->load_tehsil($_POST);
            echo json_encode($tehsil);
        }
    }
    public function load_school(){
        if($_REQUEST['subDistrictId']){
            $school = $this->helper_model->load_school($_POST);
            echo json_encode($school);
        }
    }

    public function post_review(){
        if($_REQUEST['file_id'] && $_REQUEST['rating']){
            $reviews = $this->helper_model->post_review($_POST);
            echo json_encode($reviews);
        }
    }

    public function display_review(){
        $review_comments = '';
        if($_REQUEST['file_id']) {

            $reviews = $this->helper_model->display_review($_REQUEST['file_id']);

            if (count($reviews)) {

                foreach ($reviews AS $key => $review) {
                    $star = '';

                    for ($i = 1; $i < $review['rmsa_file_rating']; $i++) {
                        $star .= ' <span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                    }

                    $comments = $this->helper_model->get_comments($review['rmsa_review_id']);
                    $all_comment = '';
                    if (count($comments)) {
                        foreach ($comments AS $key => $comment) {
                            $all_comment .= ' <p>' . $comment['rmsa_review_text'] . '</p>';
                        }
                    }
                    $review_comments .= '<div class="row">
                                            <div class="col-md-2">
                                                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>                   
                                            </div>
                                            <div class="col-md-10">     
                                                 <p>
                                                    <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>User</strong></a>                                            
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

    public  function view_review($fileId){

        $reviews_arr = Array();

        $reviews = $this->helper_model->display_review($fileId);

        if (count($reviews)) {
            foreach ($reviews AS $key1 => $review) {
                $reviews_arr [] = $review;

                $comments = $this->helper_model->get_comments($review['rmsa_review_id']);

                $comments_arr = Array();
                if (count($comments)) {
                    foreach ($comments AS $key => $comment) {
                        $comments_arr [] =  $comment['rmsa_review_text'];
                    }
                }
                $reviews_arr[$key1]['comments'] = $comments_arr;
            }
        }
        $get_title = $this->helper_model->get_file_title($fileId);
        $this->mViewData['file_title'] = $get_title[0]['uploaded_file_title'];
        $this->mViewData['review_comments'] = $reviews_arr;
        $this->mViewData['title']=' - File Reviews';
        $this->renderFront('front/file_reviews');
    }
}
