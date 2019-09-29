<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){        
        $this->session->sessionCheckStudent();
        parent::__construct();        
        $this->load->model('Student_model');
    }
    public function update_profile(){
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){
            if($this->Student_model->check_current_password($_POST['rmsa_user_current_password'])){
                $res = $this->Student_model->update_password($_POST);
                if($res){
                    redirect(HOME_LINK);
                }
            }
        }
        elseif (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name']!=''){            
            $this->Student_model->update_profile($_POST);
        }
        $this->mViewData['student_data'] =  $this->Student_model->student_details();
        $this->mViewData['title']=' - Student Profile';
        $this->renderFront('front/student_profile');
    }

//    public function approve(){
//        if(isset($_REQUEST['rmsa_user_id'])){
//            $res = $this->Student_model->approve_student($_REQUEST['rmsa_user_id']);
//            if($res){
//                $data = array(
//                    'suceess' => true
//                );
//            }
//            echo json_encode($data);
//        }
//    }

    public function is_active(){
        if($_SESSION['st_rmsa_student_login_active']==1){
            $res = $this->Student_model->is_active($_SESSION['st_rmsa_user_id']);
            echo json_encode($res);
        }
    }
    public function logout() {
        $res = $this->Student_model->update_logout_status($_SESSION['st_rmsa_user_id']);
        $this->session->sessionDestroy();        
        if($res){
            redirect(STUDENT_LOGIN_LINK);
        }        
    }
}
?>