<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=' - Contact Us';
        $this->renderFront('front/contactus');
    }

}
?>