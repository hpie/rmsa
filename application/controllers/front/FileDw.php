<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileDw extends MY_Controller {

    public function __construct() {
        $this->session->sessionCheckEmployee();
        parent::__construct();
    }
    public function index() {       
        $this->mViewData['title']=EMPLOYEE_FILE_LIST_TITLE;
        $this->renderFront('front/filedw');
    }
    
}
?>