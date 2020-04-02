<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('functions');

        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->load->model('Helper_model');
        $this->load->model('Emp_Login');
        $this->load->model('Rmsa_model');
       
        include APPPATH.'third_party/Pagination.php';        
        
        if (isset($_SESSION['user_id'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['usertype'],$_SESSION['user_id']);            
            if ($result) {                
                $token = $result['token'];
                if($_SESSION['tokencheck'] != $token) {
                    session_destroy(); 
                    redirect(HOME_LINK);
                }
            }
        }
    }
    public function student_videos($offset){        
//        include_once 'third_party/Pagination.class.php';        
        $limit=4;
        $offsets = !empty($offset)?(($offset-1)*$limit):0;        
        $rowCount = $this->Helper_model->count_total_videos();
//        echo $rowCount;die;
        // Initialize pagination class        
        $pagConfig = array(
            'pageUrl'=>STUDENT_VIDEO_LINK,
            'totalRows'=>$rowCount,
            'perPage'=>$limit,
            'offset'=>$offset
        );         
        $pagination =  new Pagination($pagConfig); 
        $videos = $this->Helper_model->load_videos($offsets,$limit);
        $this->mViewData['videos'] = $videos;
        $this->mViewData['pagination'] = $pagination;
        $this->mViewData['title']=STUDENT_VIDEOS_TITLE;
        $this->renderFront('front/videos');
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
    
    public function create_teacher(){    
        $_SESSION['exist_email'] = 0;
        if(isset($_POST['rmsa_user_first_name'])){            
            $res =  $this->Rmsa_model->register_teacher($_POST);            
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
        $this->mViewData['title']=RMSA_TEACHER_REGISTRATION_TITLE;
        $this->renderFront('front/teacherregistration');
    }
    
    public function create_student(){
        $_SESSION['exist_email'] = 0;
        if(isset($_POST['rmsa_user_first_name'])){
            reCaptchaResilt($_REQUEST['captcha_entered'],STUDENT_REGISTER_LINK);
//            sessionCheckToken($_POST);
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
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
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
//        echo '<pre>';print_r($most_rated);die;
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
        sessionCheckAll();        
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
            
    public function uploaded_content_reports2($month){
        $array=array();        
        for ($i = 1; $i <= (int)$month; $i++) {
            $row=array();
            $monthLabel = date("M-Y", strtotime("-$i months"));            
            $monthYear = date("m-Y", strtotime("-$i months"));
            $monthYear=explode('-', $monthYear);
            $count = $this->Helper_model->uploaded_content_reports2($monthYear[0],$monthYear[1]);
            $row['month']=$monthLabel;
            $row['count']=$count;
            array_push($array, $row); 
        }
        $this->mViewData['data'] = $array;
        $this->mViewData['label'] = "Last $month months Uploaded Cotent Reports";
        $this->mViewData['title']=REPORTS_2_UPLOADED_CONTENT_TITLE;
        $this->renderFront('front/upload_content_reports2');
    }
    public function student_registered_reports2($month){
        $array=array();        
        for ($i = 1; $i <= (int)$month; $i++) {
            $row=array();
            $monthLabel = date("M-Y", strtotime("-$i months"));            
            $monthYear = date("m-Y", strtotime("-$i months"));
            $monthYear=explode('-', $monthYear);
            $count = $this->Helper_model->student_registered_reports2($monthYear[0],$monthYear[1]);
            $row['month']=$monthLabel;
            $row['count']=$count;
            array_push($array, $row); 
        }
        $this->mViewData['data'] = $array;
        $this->mViewData['label'] = "Last $month months Students Registered Reports";
        $this->mViewData['title']=REPORTS_2_STUDENT_REGISTERED_TITLE;
        $this->renderFront('front/student_registered_reports2');
    }
    public function teacher_registered_reports2($month){
        $array=array();        
        for ($i = 1; $i <= (int)$month; $i++) {
            $row=array();
            $monthLabel = date("M-Y", strtotime("-$i months"));            
            $monthYear = date("m-Y", strtotime("-$i months"));
            $monthYear=explode('-', $monthYear);
            $count = $this->Helper_model->teacher_registered_reports2($monthYear[0],$monthYear[1]);
            $row['month']=$monthLabel;
            $row['count']=$count;
            array_push($array, $row); 
        }
        $this->mViewData['data'] = $array;
        $this->mViewData['label'] = "Last $month months Teachers Registered Reports";
        $this->mViewData['title']=REPORTS_2_TEACHER_REGISTERED_TITLE;
        $this->renderFront('front/teacher_registered_reports2');
    }
  
    public function employee_reports_2($month,$type){
        sessionCheckAll();        
        switch ($type){
            case 1 :
                self::uploaded_content_reports2($month);
                break;
            case 2 :
                self::student_registered_reports2($month);
                break;
            case 3 :
                self::teacher_registered_reports2($month);
                break;            
            default :
                self::uploaded_content_reports2($month);
                break;
        }
    }

}
