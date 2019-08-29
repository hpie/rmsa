<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('student_model');
    }

    public function update_profile(){

        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){
            $res = $this->student_model->update_profile($_POST);
            if($res){
                redirect(HOME_LINK);
            }
        }
        $this->mViewData['title']=' - Student Profile';
        $this->renderFront('front/student_profile');
    }

}
?>