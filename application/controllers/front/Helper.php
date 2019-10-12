<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Helper_model');
    }

    public function load_tehsil(){
        if($_REQUEST['districtId']){
            $tehsil = $this->Helper_model->load_tehsil($_POST);
            echo json_encode($tehsil);
        }
    }
    public function load_school(){
        if($_REQUEST['subDistrictId']){
            $school = $this->Helper_model->load_school($_POST);
            echo json_encode($school);
        }
    }

//    public function create_student(){
//        $_SESSION['exist_email'] = 0;
//        if(isset($_POST['rmsa_user_first_name'])){
//            $res =  $this->Helper_model->register_student($_POST);
//
//            if($res['success'] == true){
//                redirect(HOME_LINK);
//            }
//
//            if($res['email_exist'] == true){
//                $_SESSION['exist_email'] = 1;
//            }
//        }
//        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
//        $this->mViewData['title']=' - Student Registration';
//        $this->renderFront('front/studentregistration');
//    }
    
    public function create_student(){
        $_SESSION['exist_email'] = 0;
        if(isset($_POST['rmsa_user_first_name'])){
            $res =  $this->Helper_model->register_student($_POST);
            $result=array();
            if($res['success'] == true){
                $_SESSION['registration'] = 1;
                $result['success']='success';

                $this->load->config('email');
                $this->load->library('email');

                $from = $this->config->item('smtp_user');
                $to = $res['email'];
                $subject = 'Welcome RMSA';
                $message = 'Welcome to RMSA portal';

                $this->email->set_newline("\r\n");
                $this->email->from($from);
                $this->email->to($to);
                $this->email->subject($subject);
                $this->email->message($message);

//                if ($this->email->send()) {
//                    echo 'Your Email has successfully been sent.';
//                } else {
//                    show_error($this->email->print_debugger());
//                }
            }            
            if($res['email_exist'] == true){                
                $_SESSION['exist_email'] = 1;
                $result['success']='fail';
            }
            echo json_encode($result);die;
        }
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=' - Student Registration';
        $this->renderFront('front/studentregistration');
    }

}
