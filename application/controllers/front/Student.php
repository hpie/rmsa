<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){        
        $this->session->sessionCheckStudent();
        parent::__construct();        
        $this->load->model('Student_model');
        $this->load->model('Emp_Login');        
        if (isset($_SESSION['user_id'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['usertype'],$_SESSION['user_id']);            
            if ($result) {                
                $token = $result['token'];
                if($_SESSION['tokencheck'] != $token) {
                    session_destroy(); 
                    redirect(HOME_LINK);
                }
            }
        }
    }
    public function update_profile(){
        $result=array();               
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){            
            if($this->Student_model->check_current_password($_POST['rmsa_user_current_password'])){                
                $res = $this->Student_model->update_password($_POST);                    
                if($res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";                   
                }                
            }
            else{
                $result['success']="fail";
            }
            echo json_encode($result);die;            
        }        
        if (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name']!=''){            
            $this->Student_model->update_profile($_POST);
            $_SESSION['updatedata']=1;
            $result['success']="success";
            echo json_encode($result);die;
        }        
        $this->mViewData['student_data'] =  $this->Student_model->student_details();
        $this->mViewData['title']=STUDENT_PROFILE_TITLE;        
        $this->renderFront('front/student_profile');
    }
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