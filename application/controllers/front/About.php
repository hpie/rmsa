<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=ABOUT_TITLE;
        $this->renderFront('front/about');
    }
}
?>