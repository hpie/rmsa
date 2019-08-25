<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpLogin extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('emp_login');
    }
    public function index(){
        $_SESSION['invalid_login'] = 0;
        if(isset($_POST['username']) && isset($_POST['password'])){
           $result = $this->emp_login->emp_login_select($_POST['username'],$_POST['password']);
           if($result == true){
               redirect(HOME_LINK);
           }
            if ($result == false) {
                $_SESSION['invalid_login'] = 1;
            }
        }
        $this->mViewData['title']=' - Employee Login';
        $this->renderFront('front/emplogin');
    }
<<<<<<< HEAD
    public function employeeLogout() {
        $this->session->sessionDestroy();
        redirect(EMPLOYEE_LOGIN_LINK);
    }
=======

    public function employeeLogout() {
        unset($_SESSION['employee_session']);
        redirect(EMPLOYEE_LOGIN_LINK);
    }

>>>>>>> d43abd0d428ba7d06cd3a8a11bac94d097164eba
}
?>