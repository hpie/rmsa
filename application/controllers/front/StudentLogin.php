<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends MY_Controller{
    public function __construct(){
        if(isset($_SESSION['emp_rmsa_user_id'])){
            redirect(HOME_LINK);
        }
        parent::__construct();        
        $this->load->model('Login_model');
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

}
?>