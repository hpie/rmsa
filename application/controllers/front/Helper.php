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

    public  function view_review($fileId){

        $reviews_arr = Array();

        $reviews = $this->helper_model->display_review($fileId);

        if (count($reviews)) {
            foreach ($reviews AS $key1 => $review) {
                $reviews_arr [] = $review;

                $comments = $this->helper_model->get_comments($fileId);

                $comments_arr = Array();
                if (count($comments)) {
                    foreach ($comments AS $key => $comment) {
                        $comments_arr [] =  $comment['rmsa_file_comment'];
                    }
                }
                $reviews_arr[$key1]['comments'] = $comments_arr;
            }
        }
        $get_title = $this->helper_model->get_file_title($fileId);
        $avg       = $this->helper_model->get_file_avg_rating($fileId);

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
