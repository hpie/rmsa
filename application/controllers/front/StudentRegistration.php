<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StudentRegistration extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('register_model');
    }
    public function index(){  
        if(isset($_POST['rmsa_user_first_name'])){                        
            $userId =  $this->register_model->register_student($_POST);
            if($userId){
                redirect(HOME_LINK);
            }
        }        
        $this->mViewData['distResult'] =  $this->register_model->load_distict();           
        $this->renderFront('front/studentregistration');
    }

    public function load_tehsil(){
        if($_REQUEST['districtId']){
            $tehsil = $this->register_model->load_tehsil($_POST);

            echo json_encode($tehsil);
        }

    }
}
?>  