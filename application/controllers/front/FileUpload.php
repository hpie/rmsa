<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends MY_Controller {
    
    public function __construct() {
        $this->session->sessionCheckEmployee();
        parent::__construct();      
        $this->load->model('File_upload');
    }
    public function index() {
        $this->mViewData['result'] = $this->File_upload->getCategory(); 
        $this->mViewData['title'] = ' - File Upload';
        $this->renderFront('front/file_upload');
    }
}

?>