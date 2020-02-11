<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends MY_Controller{
    public function __construct(){
        if(isset($_SESSION['emp_rmsa_user_id']) OR isset($_SESSION['rm_rmsa_user_id'])){
            redirect(HOME_LINK);
        }
        parent::__construct();        
        $this->load->model('Login_model');
        $this->load->model('Emp_Login');        
        if (isset($_SESSION['username'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['username'],$_SESSION['user_id']);            
            if ($result) {                
                $token = $result['token'];
                if($_SESSION['tokencheck'] != $token) {
                    session_destroy(); 
                    redirect(HOME_LINK);
                }
            }
        }
    }
    public function index(){ 
        if(isset($_SESSION['st_rmsa_user_id'])){
            if($_SESSION['st_rmsa_user_id'] > 0){
                redirect(HOME_LINK);
            }
        }
        $_SESSION['invalid_login'] = 0;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $this->session->sessionCheckToken($_POST);
            $result = $this->Login_model->login_select($_POST['username'], $_POST['password']);           
            if ($result == true) {
                redirect(HOME_LINK);               
            }
            if ($result == false) {
                $_SESSION['invalid_login'] = 1;
            }
        }
        $this->mViewData['title']=STUDENT_LOGIN_TITLE;
        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->renderFront('front/studentlogin');       
    }

}
?>