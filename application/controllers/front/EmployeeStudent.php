<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeStudent extends MY_Controller {

    public function __construct() {        
        $this->session->sessionCheckEmployee();
        parent::__construct(); 
        $this->load->model('Student_model');
    }
    public function index() {
        $this->mViewData['title']=' - EmployeeStudent';
        $this->renderFront('front/employee_student');
    }
    public function approve(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->Student_model->approve_student($_REQUEST['rmsa_user_id']);
            if($res){
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
}

?>