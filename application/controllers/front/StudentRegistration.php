<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class StudentRegistration extends MY_Controller{
    public function __construct(){
        if(isset($_SESSION['emp_rmsa_user_id'])){
            redirect(HOME_LINK);
        }
        parent::__construct();
        $this->load->model('Register_model');
        $this->load->model('Helper_model');
    }
    public function index(){  
        if(isset($_POST['rmsa_user_first_name'])){                        
            $userId =  $this->Register_model->register_student($_POST);
            if($userId){
                redirect(HOME_LINK);
            }
        }        
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=' - Student Registration';
        $this->renderFront('front/studentregistration');
    }
}
?>  