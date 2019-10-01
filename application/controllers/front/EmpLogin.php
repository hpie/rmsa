<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpLogin extends MY_Controller{
    public function __construct(){
        parent::__construct();
        if(isset($_SESSION['st_rmsa_user_id'])){
            redirect(HOME_LINK);
        }        
        $this->load->model('Emp_Login');
    }
    public function index(){
//        if(isset($_SESSION['emp_rmsa_user_id'])){
//            if($_SESSION['emp_rmsa_user_id'] > 0){
//                redirect(HOME_LINK);
//            }
//        }
        $_SESSION['invalid_login'] = 0;
        if(isset($_POST['username']) && isset($_POST['password'])){
           $result = $this->Emp_Login->Emp_Login_select($_POST['username'],$_POST['password']);
           if($result == 2 ){
               $_SESSION['another_login'] = 1;               
           }
           if($result == true){              
               redirect(HOME_LINK);
           }
           if ($result == false) {
            $_SESSION['invalid_login'] = 1;
           }           
        }
        $this->mViewData['title'] = ' - Employee Login';
        $this->renderFront('front/emplogin');
    }
    public function employeeLogout() {       
        $res = $this->Emp_Login->update_logout_status($_SESSION['emp_rmsa_user_id']);
        $this->session->sessionDestroy();        
        if($res){
            redirect(EMPLOYEE_LOGIN_LINK);
        }        
    }
    public function isActiveEmployee(){
        if(($_SESSION['emp_rmsa_employee_login_active']) == 1){
            $res = $this->Emp_Login->isEmployeeActive($_SESSION['emp_rmsa_user_id']);
            echo json_encode($res);
        }
    }
}
?>