<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileDw extends MY_Controller {

    public function __construct() {       
        parent::__construct();     
        $this->load->helper('functions');
        sessionCheckEmployee();
        $this->load->model('File_upload');
        $this->load->model('Emp_Login');        
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
    public function index() {  
        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']=EMPLOYEE_FILE_LIST_TITLE;
        $this->renderFront('front/filedw');
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