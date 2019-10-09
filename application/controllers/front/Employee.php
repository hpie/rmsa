<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->session->sessionCheckEmployee();
        $this->load->model('Employee_model');
    }

    public function view_student(){
        $this->mViewData['title']=' - EmployeeStudent';
        $this->renderFront('front/employee_student');
    }

    public function approve_student(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->Employee_model->approve_student($_REQUEST);
            if($res){
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
}