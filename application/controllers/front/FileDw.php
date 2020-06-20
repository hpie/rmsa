<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileDw extends MY_Controller {

    public function __construct() {       
        parent::__construct();     
        $this->load->helper('functions');
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        sessionCheckEmployee();
        $this->load->model('File_upload');
        $this->load->model('Emp_Login');  
        $this->load->model('Employee_model');               
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
        $userId=$_SESSION['user_id'];
        $userType=$_SESSION['usertype']; 
        log_message('info', "$userType id $userId logged into the system");
    }
    public function index() {  
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']=EMPLOYEE_FILE_LIST_TITLE;
        $this->renderFront('front/filedw');
    }
    public function quiz_file_list() {       
        $this->mViewData['title']=EMPLOYEE_FILE_LIST_QUIZ_TITLE;
        $this->renderFront('front/quizfilelist');
    }
    public function quiz_list($rmsa_uploaded_file_id) {
        $this->mViewData['fileDetails']=$this->Employee_model->get_file($rmsa_uploaded_file_id);           
        $this->mViewData['rmsa_uploaded_file_id']=$rmsa_uploaded_file_id;
        $this->mViewData['title']=EMPLOYEE_QUIZ_LIST_TITLE;
        $this->renderFront('front/quizlist');
    }
    public function questions_list($quiz_id) {        
        $this->mViewData['quizDetails']=$this->Employee_model->get_quiz1_details($quiz_id);
//        print_r($this->mViewData['quizDetails']);die;
        $this->mViewData['quiz_id']=$quiz_id;
        $this->mViewData['title']=EMPLOYEE_QUESTIONS_LIST_TITLE;
        $this->renderFront('front/questionslist');
    }

    public function view_file($fileId){
        $this->mViewData['title']='- View File';
        $this->mViewData['fileId']=$fileId;
        $this->mViewData['file_data'] =$this->File_upload->getFileDetails($fileId);
        $this->renderFront('front/file_edit');
    }

    public function update_file($fileId){
        if($_REQUEST['uploaded_file_title']){
            $res = $this->File_upload->update_file($fileId,$_POST);
            if($res){
                $_SESSION['update_file']=1;
                $result['success']="success";
            }
        }
        $this->view_file($fileId);
    }
}
?>