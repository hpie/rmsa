<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends MY_Controller {
    
    public function __construct() {
        $this->session->sessionCheckEmployee();
        parent::__construct();      
        $this->load->model('File_upload');
    }
    public function index() {
        $_SESSION['filepage']='index.php';
        $this->mViewData['result'] = $this->File_upload->getCategory(); 
        $this->mViewData['title'] =EMPLOYEE_FILE_UPLOAD_TITLE;
        $this->renderFront('front/file_upload');
    }
    public function childFileUpload($fileId) {
        $existFile= $this->File_upload->getExistFileId($fileId);         
        if(!empty($existFile)){            
            $_SESSION['filepage']='childindex.php';
            $this->mViewData['rmsa_uploaded_file_id']=$fileId;
            $this->mViewData['result']=$existFile;
            $this->mViewData['title'] =EMPLOYEE_FILE_UPLOAD_TITLE;
            $this->renderFront('front/file_upload_child');
        }else{
            $_SESSION['existParentFileHasvol']=1;
            redirect(EMPLOYEE_UPLOAD_FILE_LINK);
        }
    }
}

?>