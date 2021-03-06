<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        
        include APPPATH . 'third_party/smtp_mail/smtp_send.php'; 
        
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
        $method=$this->router->fetch_method();
        visitLog($method,"Helper");
    }
    public function student_videos($offset){
//        echo '<pre>';print_r($_SESSION);die;
        $params=array();
        $params['youtube_video_title']='';
        $params['youtube_video_description']='';
        $params['youtube_video_recomendation']='';
        $params['youtube_video_class']='';
        $params['youtube_video_subject']='';
        $params['youtube_video_topic']='';
        $params['youtube_video_subtopic']='';
        $params['youtube_video_language']='';
        $params['youtube_video_instructor']='';        
        if(isset($_SESSION['video_search'])){            
            $params['youtube_video_title']=$_SESSION['video_search']['title'];
            $params['youtube_video_description']=$_SESSION['video_search']['title'];
            $params['youtube_video_recomendation']=$_SESSION['video_search']['recommendation'];
            $params['youtube_video_class']=$_SESSION['video_search']['class_value'];
            $params['youtube_video_subject']=$_SESSION['video_search']['subject'];
            $params['youtube_video_topic']=$_SESSION['video_search']['topic'];
            $params['youtube_video_subtopic']=$_SESSION['video_search']['sub_topic'];
            $params['youtube_video_language']=$_SESSION['video_search']['vide_language'];
            $params['youtube_video_instructor']=$_SESSION['video_search']['instructor'];
        }
//        include_once 'third_party/Pagination.class.php';        
        $limit=4;
        $offsets = !empty($offset)?(($offset-1)*$limit):0;        
        $rowCount = $this->Helper_model->count_total_videos($params);
        // Initialize pagination class        
        $pagConfig = array(
            'pageUrl'=>STUDENT_VIDEO_LINK,
            'totalRows'=>$rowCount,
            'perPage'=>$limit,
            'offset'=>$offset
        );         
        $pagination =  new Pagination($pagConfig); 
        $videos = $this->Helper_model->load_videos($offsets,$limit,$params);
        $this->mViewData['videos'] = $videos;
        $this->mViewData['pagination'] = $pagination;
        $this->mViewData['title']=STUDENT_VIDEOS_TITLE;
        $this->renderFront('front/videos');
    }
    public function video_lessons_search(){
        $result=array();        
        if(isset($_POST['clear_search'])){
            unset($_SESSION['video_search']);
        }
        else{
            $_SESSION['video_search']=$_POST;
        }
        $result['success']='success';
        echo json_encode($result);      
    }

    public function load_blocks(){
        if($_REQUEST['districtId']){
            $blocks = $this->Helper_model->load_blocks($_POST);
            echo json_encode($blocks);
        }
    }
    public function load_tehsil(){
        if($_REQUEST['districtId']){            
            $tehsil = $this->Helper_model->load_tehsil($_POST);
            $blocks = $this->Helper_model->load_blocks($_POST);
            $result=array();
            $result['tehsil']=$tehsil;
            $result['blocks']=$blocks;              
            echo json_encode($result);
        }
    }
    public function load_school(){
        if($_REQUEST['subDistrictId']){
            $school = $this->Helper_model->load_school($_POST);
            echo json_encode($school);
        }
    }
    public function load_school_byblock(){        
        if($_REQUEST['rmsaBlockId']){
            $school = $this->Helper_model->load_school_byblock($_POST);
            echo json_encode($school);
        }else{
            redirect(NOT_FOUND_404_LINK);
        }
    }
    
    public function load_school_code_byschool(){
        if($_REQUEST['schoolId']){
            $school = $this->Helper_model->load_school_code_byschool($_POST);
            echo json_encode($school);
        }
    }

    public function create_teacher(){    
        $_SESSION['exist_email'] = 0;
        if(isset($_POST['rmsa_user_first_name'])){            
            $res =  $this->Rmsa_model->register_teacher($_POST);            
            $result=array();
            $send_email_error=0;
            if($res['success'] == true){
                $_SESSION['registration'] = 1;
                $result['success']='success';  
                $link_code=gen_uuid($res['rmsa_user_id'],'e');               
                $email_active_link=STUDENT_ACTIVE_EMAIL_LINK.'teacher/'.$link_code;                               
                $result['success']='success';
                $data = array(
                    'username'=> $res['email'],
                    'password'=> $_POST['rmsa_user_email_password'],
                    'template'=> 'teacherRegistrationTemplate.html',
                    'activationlink'=>$email_active_link
                );
                $sendmail = new SMTP_mail();
                $resMail = $sendmail->sendRegistrationDetails($res['email'],$data); 
                log_message('info',print_r($resMail,TRUE));        
                if ($resMail['success']==1) {   
                    $params=array();
                    $params['rmsa_user_id']=$res['rmsa_user_id'];
                    $params['link_code']=$link_code;
                    $params['user_type']='teacher';                   
                    $this->Rmsa_model->user_email_link($params);
                } else {
                    $_SESSION['send_email_error'] = 1;
                    $send_email_error=1;
                }
            }            
            if($res['email_exist'] == true){                
                $_SESSION['exist_email'] = 1;
                $result['success']='fail';
            }
            
            
            if($result['success']=='success' && $send_email_error==1){
                $_SESSION['registration'] = 1;
            }
            if($result['success']=='success' && $send_email_error==0){
                $_SESSION['registration'] = 2;
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
            if(isset($_POST['rmsa_school_id'])){               
                $resCode = $this->Helper_model->load_school_code_byschoolid($_POST['rmsa_school_id']);
                $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];                
//                log_message('info',print_r($resCode,TRUE));                
            }
            else{            
                if(isset($_SESSION['emp_rmsa_user_id'])){            
                    $params['rmsa_school_id'] = $_SESSION['emp_rmsa_school_id'];
                    $resCode = $this->Helper_model->load_school_code_byschoolid($params['rmsa_school_id']);
                    $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];
                    $_POST['rmsa_block_id']=$resCode['rmsa_block_id'];                    
//                    log_message('info',print_r($resCode,TRUE));
                }
                if(isset($_SESSION['tech_rmsa_user_id'])){
                    $params['rmsa_school_id'] = $_SESSION['tech_rmsa_school_id'];
                    $resCode = $this->Helper_model->load_school_code_byschoolid($params['rmsa_school_id']);
                    $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];
                    $_POST['rmsa_block_id']=$resCode['rmsa_block_id'];
//                    log_message('info',print_r($resCode,TRUE));
                }                
            }            
            reCaptchaResilt($_REQUEST['captcha_entered'],STUDENT_REGISTER_LINK);
            $res =  $this->Helper_model->register_student($_POST);            
            $result=array();
            $send_email_error=0;
            if($res['success'] == true){                
                $result['success']='success'; 
                $link_code=gen_uuid($res['rmsa_user_id'],'e');  
                $email_active_link=STUDENT_ACTIVE_EMAIL_LINK.'student/'.$link_code;                               
                $result['success']='success';
                $data = array(
                    'username'=> $res['email'],
                    'password'=> $_POST['rmsa_user_email_password'],
                    'template'=> 'studentRegistrationTemplate.html',
                    'activationlink'=>$email_active_link
                );
                $sendmail = new SMTP_mail();
                $resMail = $sendmail->sendRegistrationDetails($res['email'],$data); 
                log_message('info',print_r($resMail,TRUE));        
                if ($resMail['success']==1) {  
                    $params=array();
                    $params['rmsa_user_id']=$res['rmsa_user_id'];
                    $params['link_code']=$link_code;
                    $params['user_type']='student';                   
                    $this->Rmsa_model->user_email_link($params);
                } else {
                    $_SESSION['send_email_error'] = 1;
                    $send_email_error=1;
                }
            }else{
                if(isset($res['email_exist'])){
                    if($res['email_exist'] == true){   
                        $_SESSION['exist_email'] = 1;
                        $result['exist_email']=1;                        
                    }                                    
                }
                if(isset($res['rollnumber_exist'])){
                    if($res['rollnumber_exist'] == true){   
                        $_SESSION['rollnumber_exist'] = 1; 
                        $result['rollnumber_exist']=1; 
                    }
                }
                $result['success']='fail';
            }
            
            if($result['success']=='success' && $send_email_error==1){
                $_SESSION['registration'] = 1;
            }
            if($result['success']=='success' && $send_email_error==0){
                $_SESSION['registration'] = 2;                 
            }                        
            echo json_encode($result);die;
        }        
        $this->mViewData['stream'] =  $this->Helper_model->load_stream();
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
    
    public function count_student_byschool(){               
        $this->mViewData['title']= COUNT_STUDENT_BYSCHOOL;
        $this->renderFront('front/schoolwise_total_student');
    }
    public function count_student_bydistrict(){               
        $this->mViewData['title']= COUNT_STUDENT_BYDIST;
        $this->renderFront('front/districtlwise_total_student');
    }
    public function count_student_byblock(){               
        $this->mViewData['title']= COUNT_STUDENT_BYBLOCK;
        $this->renderFront('front/blockwise_total_student');
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
            case 11 :
                self::count_student_byschool();
                break;
            case 12 :
                self::count_student_bydistrict();
                break;
            case 13 :
                self::count_student_byblock();
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
