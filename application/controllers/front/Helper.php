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
//                $message = 'Welcome to RMSA portal';

                $this->email->set_newline("\r\n");
                $this->email->from($from);
                
                $data = array(
                    'userName'=> $res['email'],
                    'password'=> $_POST['rmsa_user_email_password']
                );
                
                $this->email->to($to);
                $this->email->subject($subject);
                $body = $this->load->view('front/mailtemplate.php',$data,TRUE);
                $this->email->message($body);
                if ($this->email->send()) {                   
                } else {
                    show_error($this->email->print_debugger());
                }
            }            
            if($res['email_exist'] == true){                
                $_SESSION['exist_email'] = 1;
                $result['success']='fail';
            }
            echo json_encode($result);die;
        }
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=STUDENT_REGISTRATION_TITLE;
        $this->renderFront('front/studentregistration');
    }
    public function total_active_students(){
        $active_student = $this->Helper_model->total_active_students();
        return $active_student;
    }
    public function total_active_employee(){
        $active_employee = $this->Helper_model->total_active_employee();
        return $active_employee;
    }
    public function top_employee_with_most_uploaded_content(){
        $top_employee = $this->Helper_model->top_employee_with_most_uploaded_content();
        print_r($top_employee);
    }
    public function top_employee_with_most_rated_content(){
        $top_most_rated_employee = $this->Helper_model->top_employee_with_most_rated_content();
        print_r($top_most_rated_employee);
    }
    public function top_employee_with_most_viewed_content(){
        $top_most_viewed_employee = $this->Helper_model->top_employee_with_most_viewed_content();
        print_r($top_most_viewed_employee);
    }


    public function most_rated_content(){
        $most_rated = $this->Helper_model->most_rated_content();
        print_r($most_rated);
    }
    public function most_viewed_content(){
        $most_viewed = $this->Helper_model->most_viewed_content();
        print_r($most_viewed);
    }

}
