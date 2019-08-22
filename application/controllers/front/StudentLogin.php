<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('login_model');
    }
    public function index(){            
        $_SESSION['invalid_login'] = 0;
        if (isset($_POST['username']) && isset($_POST['password'])) {
            $result = $this->login_model->login_select($_POST['username'], $_POST['password']);           
            if ($result == true) {
                redirect(HOME_LINK);               
            }
            if ($result == false) {
                $_SESSION['invalid_login'] = 1;
            }
        }
        $this->mViewData['title']=' - Student Login';
        $this->renderFront('front/studentlogin');       
    }
    public function studentLogout() {
        $this->session->sessionDestroy();
        redirect(STUDENT_LOGIN_LINK);
    }
    public function approveStudent(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->login_model->approve_student($_REQUEST['rmsa_user_id']);

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