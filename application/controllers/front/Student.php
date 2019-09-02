<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){
        parent::__construct();        
        $this->load->model('student_model');
    }
    
    public function update_profile(){
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){
            if($this->student_model->check_current_password($_POST['rmsa_user_current_password'])){
                $res = $this->student_model->update_password($_POST);
                if($res){
                    redirect(HOME_LINK);
                }
            }
        }
        elseif (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name']!=''){            
            $this->student_model->update_profile($_POST);
        }
        $this->mViewData['student_data'] =  $this->student_model->student_details();
        $this->mViewData['title']=' - Student Profile';
        $this->renderFront('front/student_profile');
    }
    public function resources(){
        $this->mViewData['title']=' - Student Resources ';
        $this->renderFront('front/student_resources.php');
    }
}
?>