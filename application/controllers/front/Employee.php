<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('functions');
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        sessionCheckEmployee();
        $this->load->model('Employee_model');
        $this->load->model('Student_model');
        $this->load->model('Emp_Login');
        $this->load->model('Helper_model');
        if (isset($_SESSION['user_id'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['usertype'], $_SESSION['user_id']);
            if ($result) {
                $token = $result['token'];
                if ($_SESSION['tokencheck'] != $token) {
                    session_destroy();
                    redirect(HOME_LINK);
                }
            }
        }
        $method=$this->router->fetch_method();
        visitLog($method,"Employee");
    }

    public function profile(){
        $result =  $this->Employee_model->rmsa_employee_details();
        $this->mViewData['result']= $result;
        $this->mViewData['title']= EMPLOYEE_MY_PROFILE_TITLE;
        $this->renderFront('front/emp_my_profile');
    }
    
    public function update_profile(){
        $result=array();               
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){            
            if($this->Employee_model->check_current_password_emp($_POST['rmsa_user_current_password'])){                
                $res = $this->Employee_model->update_password_emp($_POST);                    
                if($res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";                   
                }                
            }
            else{
                $result['success']="fail";
            }
            echo json_encode($result);die;            
        }        
        $this->mViewData['title']=EMPLOYEE_PROFILE_TITLE;        
        $this->renderFront('front/employee_profile');
    }
    
    public function edit_quiz($rmsa_uploaded_file_id) {
        if (isset($_POST['submit'])) {
            $params = array();             
            $params['quiz_title'] = $_POST['quiz_title'];
            $params['quiz_min_questions'] = $_POST['quiz_min_questions'];
            $params['quiz_pass_score'] = $_POST['quiz_pass_score'];
            $res = $this->Employee_model->update_quiz($params,$rmsa_uploaded_file_id);
            if ($res) {
                $_SESSION['quizEdit'] = 1;
                redirect(EMPLOYEE__QUIZ_RESOURCES_LIST_LINK);
            }
        }        
        $this->mViewData['quizDetails']=$this->Employee_model->get_quiz_details($rmsa_uploaded_file_id);  
//        print_r($this->mViewData['quizDetails']);die;
        $this->mViewData['fileDetails']=$this->Employee_model->get_file($rmsa_uploaded_file_id);           
        $this->mViewData['rmsa_uploaded_file_id'] = $rmsa_uploaded_file_id;
        $this->renderFront('front/editquiz');
    }
    
    
    public function create_quiz($rmsa_uploaded_file_id) {
        if (isset($_POST['submit'])) {
            $params = array();
            $params['rmsa_uploaded_file_id'] = $_POST['rmsa_uploaded_file_id'];
            $params['quiz_title'] = $_POST['quiz_title'];
            $params['quiz_min_questions'] = $_POST['quiz_min_questions'];
            $params['quiz_pass_score'] = $_POST['quiz_pass_score'];
            $res = $this->Employee_model->create_quiz($params);
            if ($res) {
                $_SESSION['quizAdd'] = 1;
                redirect(EMPLOYEE__QUIZ_RESOURCES_LIST_LINK);
            }
        }        
        $this->mViewData['fileDetails']=$this->Employee_model->get_file($rmsa_uploaded_file_id);           
        $this->mViewData['rmsa_uploaded_file_id'] = $rmsa_uploaded_file_id;
        $this->renderFront('front/createquiz');
    }

    public function edit_quistions($question_id) {        
        $resQuiz = $this->Employee_model->get_question($question_id);
        $resChoice = $this->Employee_model->get_choices($question_id);
        if (isset($_POST['submit'])) {           
            $params = array();
            $params['question'] = $_POST['question'];  
            $params['question_id'] = $question_id;
            $res = $this->Employee_model->edit_question($params);
            $this->Employee_model->delete_choice($question_id);
            if ($res) {                
//                print_r($_POST);die;
                foreach ($_POST['choice'] as $choice => $value) {                     
                    $params = array();
                    if($value=="None of the Above"){
                        $value=5;
                    }
                    $params['choice'] = $value;
                    $params['question_id'] = $question_id;
                    if ($_POST['correct_choice'] == $choice+1) {
                        $params['is_correct'] = 1;
                    }
                    $this->Employee_model->add_choice($params);
                }
                $_SESSION['questionEdit'] = 1;
                redirect(EMPLOYEE_QUESTION_LIST_LINK.$resQuiz['quiz_id']);
            }
        }
        $this->mViewData['choiceDetails']=$resChoice;
        $this->mViewData['quizDetails']=$resQuiz;
        $this->mViewData['question_id'] = $question_id;
        $this->renderFront('front/editquestion');
    }
    
    public function add_quistions($quiz_id) {
        $resQuiz = $this->Employee_model->get_quiz($quiz_id);
        if (isset($_POST['submit'])) {
            $params = array();
            $params['question'] = $_POST['question'];
            $params['quiz_id'] = $quiz_id;
            $res = $this->Employee_model->add_quistions($params);
            if ($res) {
                foreach ($_POST['choice'] as $choice => $value) {                    
                    $params = array();
                    if($value=="None of the Above"){
                        $value=5;
                    }
                    $params['choice'] = $value;
                    $params['question_id'] = $res;
                    if ($_POST['correct_choice'] == $choice+1) {
                        $params['is_correct'] = 1;
                    }
                    $this->Employee_model->add_choice($params);
                }
                $_SESSION['questionAdd'] = 1;
                redirect(EMPLOYEE_QUESTION_LIST_LINK.$quiz_id);
            }
        }
        $this->mViewData['quizDetails']=$resQuiz;
        $this->mViewData['quiz_id'] = $quiz_id;
        $this->renderFront('front/addquestion');
    }

    public function view_student() {
//        print_r($_SESSION['emp_rmsa_school_id']);die;
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title'] = EMPLOYEE_STUDENT_LIST_TITLE;
        $this->renderFront('front/employee_student');
    }

    public function approve_student() {
        if (isset($_REQUEST['rmsa_user_id'])) {
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->approve_student($_REQUEST);
            if ($res) {
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }

    public function view_videos() {     
        $this->mViewData['title'] = EMPLOYEE_VIDEO_LIST_TITLE;
        $this->renderFront('front/employee_videos');
    }
    public function active_video() {
        if (isset($_REQUEST['rmsa_youtube_video_id'])) {
            $res = $this->Employee_model->active_video($_REQUEST);
            if ($res) {     
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
    public function add_videos() {        
        if (isset($_POST['submit'])) {
            unset($_POST['submit']);
            unset($_POST['g-recaptcha-response']);
            $res = $this->Employee_model->add_video($_POST);
            if ($res) {
                $_SESSION['videoAdd'] = 1;
                redirect(EMPLOYEE_VIDEO_LIST_LINK);
            }
        }
        $this->mViewData['title'] = EMPLOYEE_ADD_VIDEO_TITLE;
        $this->renderFront('front/addvideo');
    }
    
    public function update_video($video_id) {        
        $result = $this->Employee_model->get_video($video_id);        
        if (isset($_POST['submit'])) {
            unset($_POST['submit']);
            unset($_POST['g-recaptcha-response']);
            $res = $this->Employee_model->edit_video($_POST,$video_id);            
            if ($res) {                                
                $_SESSION['videoEdit'] = 1;
                redirect(EMPLOYEE_VIDEO_LIST_LINK);
            }
        }
        $this->mViewData['result']=$result;
        $this->mViewData['title'] = EMPLOYEE_EDIT_VIDEO_TITLE;
        $this->renderFront('front/editvideo');
    }
    
    
    public function active_question() {
        if (isset($_REQUEST['question_id'])) {
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->active_question($_REQUEST);
            if ($res) {
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
    
    public function active_quiz() {
        if (isset($_REQUEST['quiz_id'])) {
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->active_quiz($_REQUEST);
            if ($res) {
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
    
    public function active_file() {
        if (isset($_REQUEST['rmsa_uploaded_file_id'])) {
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->active_file($_REQUEST);
            if ($res) {
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }

    public function update_student_profile($stud_id) {
        $result = array();
        if (isset($_POST['rmsa_user_new_password']) && $_POST['rmsa_user_new_password'] != '') {
            $res = $this->Employee_model->update_password($_POST, $stud_id);
            if ($res) {
                $_SESSION['updatedata'] = 1;
                $result['success'] = "success";
            }else{
                $result['success']="notmatch";
            }
            echo json_encode($result);
            die;
        }
        if (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name'] != '') {
            
             if(isset($_POST['rmsa_school_id'])){               
                $resCode = $this->Helper_model->load_school_code_byschoolid($_POST['rmsa_school_id']);
                $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];                               
            }
            else{            
                if(isset($_SESSION['emp_rmsa_user_id'])){            
                    $params['rmsa_school_id'] = $_SESSION['emp_rmsa_school_id'];
                    $resCode = $this->Helper_model->load_school_code_byschoolid($params['rmsa_school_id']);
                    $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];
                    $_POST['rmsa_block_id']=$resCode['rmsa_block_id'];                    
                }
                if(isset($_SESSION['tech_rmsa_user_id'])){
                    $params['rmsa_school_id'] = $_SESSION['tech_rmsa_school_id'];
                    $resCode = $this->Helper_model->load_school_code_byschoolid($params['rmsa_school_id']);
                    $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];
                    $_POST['rmsa_block_id']=$resCode['rmsa_block_id'];
                }                
            } 
            
            $res=$this->Employee_model->update_profile($_POST,$stud_id);
            if(isset($res['success'])){   
                if($res['success'] == false){                
                    if(isset($res['email_exist'])){                           
                        $result['exist_email']=1;                                                                                   
                    }
                    if(isset($res['rollnumber_exist'])){                         
                        $result['rollnumber_exist']=1;                        
                    }
                    $result['success']="fail";                    
                }
            }
            if(!isset($res['success']) && $res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";
            }
            echo json_encode($result);die;
        }

        
        $student_result =  $this->Employee_model->student_details($stud_id);        
        $resCode = $this->Helper_model->load_school_code_byschoolid($student_result['rmsa_school_id']);
        $replaceStr=$resCode['rmsa_school_udise_code'].'-';
        $student_result['rmsa_user_roll_number']=str_replace($replaceStr,"",$student_result['rmsa_user_roll_number']);  
                
        $this->mViewData['student_data'] = $student_result; 
        $this->mViewData['title'] = EMPLOYEE_STUDENT_PROFILE_TITLE;
        $this->renderFront('front/employee_student_profile');
    }
    
    
    public function attempted_quiz_list($student_id){
        $this->mViewData['student_id']=$student_id;
        $this->mViewData['title']=EMPLOYEE_STUDENT_ATTEMPTED_EXAM_TITLE;        
        $this->renderFront('front/emp_attempted_quizlis');
    }
    public function my_quiz_attempt_result($quiz_id,$student_id){
        $this->mViewData['student_id']=$student_id;
        $this->mViewData['result'] =  $this->Student_model->quiz_file_details($quiz_id);
        $this->mViewData['quiz_id']=$quiz_id;
        $this->mViewData['title']=EMPLOYEE_STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE;        
        $this->renderFront('front/emp_my_quiz_result');
    }

}
