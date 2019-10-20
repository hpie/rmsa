<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RmsaResource extends MY_Controller {

    public function __construct() {
        $this->session->sessionCheckRmsa();
        parent::__construct();
    }
    public function index() {           
        $this->mViewData['title']=RMSA_FILE_LIST_TITLE;
        $this->renderFront('front/rmsa_resource');
    }    
}
?>