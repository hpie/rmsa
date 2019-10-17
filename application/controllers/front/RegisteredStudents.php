<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisteredStudents  extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=REGISTERED_STUDENT_TITLE;
        $this->renderFront('front/registeredstudents');
    }
}
?>