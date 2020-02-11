<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Helper_model');
        $this->load->model('Emp_Login');        
        if (isset($_SESSION['username'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['username'],$_SESSION['user_id']);            
            if ($result) {                
                $token = $result['token'];
                if($_SESSION['tokencheck'] != $token) {
                    session_destroy(); 
                    redirect(HOME_LINK);
                }
            }
        }
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
            $this->session->sessionCheckToken($_POST);
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
//                echo 'hi';die;
                $_SESSION['exist_email'] = 1;
                $result['success']='fail';
            }
            echo json_encode($result);die;
        }
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=STUDENT_REGISTRATION_TITLE;
        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->renderFront('front/studentregistration');
    }
    public function total_active_students(){
        $active_student = $this->Helper_model->total_active_students();

        $this->mViewData['student'] = $active_student;
        $this->mViewData['title']=STUDENT_ACTIVE_TITLE;
        $this->renderFront('front/total_active_student');

        return $active_student;
    }
    public function total_active_employee(){
        $active_employee = $this->Helper_model->total_active_employee();

        $this->mViewData['employee'] = $active_employee;
        $this->mViewData['title']=EMPLOYEE_ACTIVE_TITLE;
        $this->renderFront('front/total_active_employee');

        return $active_employee;
    }
    public function top_employee_with_most_uploaded_content(){
        $top_employee = $this->Helper_model->top_employee_with_most_uploaded_content();

        $this->mViewData['data'] = $top_employee;
        $this->mViewData['title']=MOST_CONTENT_UPLOADED_EMPLOYEE_TITLE;
        $this->renderFront('front/most_content_uploaded_employee');
    }
    public function top_employee_with_most_rated_content(){
        $top_most_rated_employee = $this->Helper_model->top_employee_with_most_rated_content();

        $this->mViewData['data'] = $top_most_rated_employee;
        $this->mViewData['title']=MOST_CONTENT_RATED_EMPLOYEE_TITLE;
        $this->renderFront('front/most_rated_content_employee');

    }
    public function top_employee_with_most_viewed_content(){
        $top_most_viewed_employee = $this->Helper_model->top_employee_with_most_viewed_content();

        $this->mViewData['data'] = $top_most_viewed_employee;
        $this->mViewData['title']=MOST_CONTENT_VIEW_EMPLOYEE_TITLE;
        $this->renderFront('front/most_view_content_employee');
    }


    public function most_rated_content(){
        $most_rated = $this->Helper_model->most_rated_content();

        $this->mViewData['data'] = $most_rated;
        $this->mViewData['title']=MOST_RATED_CONTENT_TITLE;
        $this->renderFront('front/most_rated_content');

    }
    public function most_viewed_content(){
        $most_viewed = $this->Helper_model->most_viewed_content();

        $this->mViewData['data'] = $most_viewed;
        $this->mViewData['title']=MOST_VIEWED_CONTENT_TITLE;
        $this->renderFront('front/most_viewed_content');

    }
    public function most_active_student_by_content_read(){
        $most_active = $this->Helper_model->most_active_student_by_content_read();

        $this->mViewData['data'] = $most_active;
        $this->mViewData['title']=MOST_ACTIVE_STUDENT_BY_CONTENT_READ;
        $this->renderFront('front/most_active_student_by_content_read');
    }

    public function most_active_student_on_school(){
        $most_active_on_school = $this->Helper_model->most_active_student_on_school();

        $this->mViewData['data'] = $most_active_on_school;
        $this->mViewData['title']= MOST_ACTIVE_STUDENT_ON_SCHOOL_TITLE;
        $this->renderFront('front/most_active_student_on_school');
    }

    public function top_district_with_most_content(){
        $top_most_content_district = $this->Helper_model->top_district_with_most_content();

        $this->mViewData['data'] = $top_most_content_district;
        $this->mViewData['title']= TOP_DISTRICT_WITH_MOST_CONTENT;
        $this->renderFront('front/top_district_with_most_content');
    }
    public function employee_reports($type){
        switch ($type){
            case 1 :
                self::top_employee_with_most_uploaded_content();
                break;
            case 2 :
                self::top_employee_with_most_rated_content();
                break;
            case 3 :
                self::top_employee_with_most_viewed_content();
                break;
            case 4 :
                self::most_active_student_on_school();
                break;
            case 5 :
                self::top_district_with_most_content();
                break;
            case 6 :
                self::most_rated_content();
                break;
            case 7 :
                self::most_viewed_content();
                break;
            case 8 :
                self::most_active_student_by_content_read();
                break;
            case 9 :
                self::total_active_students();
                break;
            case 10 :
                self::total_active_employee();
                break;

            default :
                self::top_employee_with_most_uploaded_content();
                break;
        }
    }

}
