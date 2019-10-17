<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rmsa extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->session->sessionCheckRmsa();
        $this->load->model('Rmsa_model');
    }
    public function view_student(){       
        $this->mViewData['title']= RMSAE_STUDENT_LIST_TITLE;
        $this->renderFront('front/rmsa_student');
    }
    public function view_employee(){       
        $this->mViewData['title']= RMSAE_EMPLOYEE_LIST_TITLE;
        $this->renderFront('front/rmsa_employee');
    }
}