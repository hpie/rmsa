<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class TechLogin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (isset($_SESSION['st_rmsa_user_id']) OR isset($_SESSION['rm_rmsa_user_id']) OR isset($_SESSION['emp_rmsa_user_id'])) {
            redirect(HOME_LINK);
        }
        $this->load->helper('functions'); 
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->load->model('Tech_Login');        
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
        $method=$this->router->fetch_method();
        visitLog($method,"TechLogin");        
    }
    
    public function index() {
        if (isset($_SESSION['tech_rmsa_user_id'])) {
            if ($_SESSION['tech_rmsa_user_id'] > 0) {
                redirect(HOME_LINK);
            }
        }
        $_SESSION['invalid_login'] = 0;
        if (isset($_POST['username']) && isset($_POST['password'])) {     
            $result = $this->Tech_Login->tech_login_select($_POST['username'], $_POST['password']);
            if(isset($result['success'])){
                if($result['success']==1){
                    $_SESSION['email_notverify']=1;
                }
            }
            
            if ($result == true && !isset($result['success'])) {
                $userId=$_SESSION['user_id'];
                $userType=$_SESSION['usertype']; 
                log_message('info', "$userType id $userId logged into the system");
                redirect(HOME_LINK);
            }
            if ($result == false) {
                $_SESSION['invalid_login'] = 1;
            }
        }
        $this->mViewData['title'] = TEACHER_LOGIN_TITLE;
//        $_SESSION['token'] = bin2hex(random_bytes(24));
        $this->renderFront('front/techlogin');
    }

    public function teacherLogout() {
        
        $userId=$_SESSION['user_id'];
        $userType=$_SESSION['usertype']; 
        log_message('info', "$userType id $userId logged out");
        
        $res = $this->Tech_Login->update_logout_status($_SESSION['tech_rmsa_user_id']);
        sessionDestroy();
        if ($res) {
            redirect(TEACHER_LOGIN_LINK);
        }
    }
    public function isActiveEmployee() {
        if (($_SESSION['tech_rmsa_employee_login_active']) == 1) {
            $res = $this->Tech_Login->isEmployeeActive($_SESSION['tech_rmsa_user_id']);
            echo json_encode($res);
        }
    }

}

?>