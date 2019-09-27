<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){        
        $this->session->sessionCheckStudent();
        parent::__construct();        
        $this->load->model('student_model');
        $this->load->model('helper_model');
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

            $reviews = $this->helper_model->display_review($_REQUEST['file_id']);

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

                    $comments = $this->helper_model->get_comments($_REQUEST['file_id']);
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
            $student_has_rating = $this->student_model->student_has_file_rating($_REQUEST['file_id']);
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


    public function logout() {
        $this->session->sessionDestroy();
        redirect(STUDENT_LOGIN_LINK);
    }
}
?>