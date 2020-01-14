<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }    
    public function index() {
        $this->mViewData['title']=HOME_TITLE;
        $this->renderFront('front/index');
    }
    public function index1() {
        redirect('home');
    }
}
