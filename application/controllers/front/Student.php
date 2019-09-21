<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){        
        $this->session->sessionCheckStudent();
        parent::__construct();        
        $this->load->model('student_model');
    }    
    public function update_profile(){
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){
            if($this->student_model->check_current_password($_POST['rmsa_user_current_password'])){
                $res = $this->student_model->update_password($_POST);
                if($res){
                    redirect(HOME_LINK);
                }
            }
        }
        elseif (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name']!=''){            
            $this->student_model->update_profile($_POST);
        }
        $this->mViewData['student_data'] =  $this->student_model->student_details();
        $this->mViewData['title']=' - Student Profile';
        $this->renderFront('front/student_profile');
    }

    public function approve(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->student_model->approve_student($_REQUEST['rmsa_user_id']);
            if($res){
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }

    public function is_active(){
        if($_SESSION['st_rmsa_student_login_active']==1){
            $res = $this->student_model->is_active($_SESSION['st_rmsa_user_id']);
            echo json_encode($res);
        }
    }

    public function resources(){
        $this->mViewData['title']=' - Student Resources';
        $this->renderFront('front/student_resources.php');
    }

    public function file_viewcount(){
        if($_REQUEST['rmsa_uploaded_file_id']){
            $res = $this->student_model->file_viewcount($_REQUEST['rmsa_uploaded_file_id']);
            echo json_encode($res);
        }
    }

    public function post_review(){
        if($_REQUEST['file_id'] && $_REQUEST['rating']){
            $reviews = $this->student_model->post_review($_POST);
            echo json_encode($reviews);
        }
    }

    public function display_review(){
        $review_comments = '';
        if($_REQUEST['file_id']) {

            $reviews = $this->student_model->display_review($_REQUEST['file_id']);

            if (count($reviews)) {

                foreach ($reviews AS $key => $review) {
                    $star = '';

                    for ($i = 1; $i <= 5; $i++) {

                        if($i >= $review['rmsa_file_rating']){
                            $star .= ' <span class="float-right"><i class="text-warning fa fa-star"></i></span>';
                        }
                        else{
                            $star .= ' <span class="float-right"><i class="text-warning fa fa-star-o"></i></span>';
                        }
                    }

                    $comments = $this->student_model->get_comments($review['rmsa_review_id']);
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

        $reviews = $this->student_model->display_review($fileId);

        if (count($reviews)) {
            foreach ($reviews AS $key1 => $review) {
                $reviews_arr [] = $review;

                $comments = $this->student_model->get_comments($review['rmsa_review_id']);

                $comments_arr = Array();
                if (count($comments)) {
                    foreach ($comments AS $key => $comment) {
                        $comments_arr [] =  $comment['rmsa_review_text'];
                    }
                }
                $reviews_arr[$key1]['comments'] = $comments_arr;
            }
        }
        $get_title = $this->student_model->get_file_title($fileId);
        $this->mViewData['file_title'] = $get_title[0]['uploaded_file_title'];
        $this->mViewData['review_comments'] = $reviews_arr;
        $this->mViewData['title']=' - File Reviews';
        $this->renderFront('front/file_reviews');
    }


    public function logout() {
        $this->session->sessionDestroy();
        redirect(STUDENT_LOGIN_LINK);
    }
}
?>