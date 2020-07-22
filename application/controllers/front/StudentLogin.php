<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends MY_Controller{
    public function __construct(){               
        if(isset($_SESSION['emp_rmsa_user_id']) OR isset($_SESSION['rm_rmsa_user_id']) OR isset($_SESSION['tech_rmsa_user_id'])){
            redirect(HOME_LINK);
        }
        parent::__construct();  
        $this->load->helper('functions');         
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->load->model('Login_model');
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
        visitLog($method,"StudentLogin");
    }
    public function index(){ 
        if(isset($_SESSION['st_rmsa_user_id'])){
            if($_SESSION['st_rmsa_user_id'] > 0){
                redirect(HOME_LINK);
            }
        }
        $_SESSION['invalid_login'] = 0;
        if (isset($_POST['username']) && isset($_POST['password'])) {
//            reCaptchaResilt($_REQUEST['captcha_entered'],STUDENT_LOGIN_LINK);
            $result = $this->Login_model->login_select($_POST['username'], $_POST['password']);           
            if ($result == true) { 
                $userId=$_SESSION['user_id'];
                $userType=$_SESSION['usertype']; 
                log_message('info', "$userType id $userId logged into the system");
                redirect(HOME_LINK);               
            }
            if ($result == false) {
                $_SESSION['invalid_login'] = 1;
            }
        }
        $this->mViewData['title']=STUDENT_LOGIN_TITLE;
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->renderFront('front/studentlogin');       
    }
    public function verify_email($user_type,$link_code){        
        $user_id=gen_uuid($link_code,'d');      
        $res=$this->Login_model->chek_code_exist($user_id,$link_code,$user_type);        
        $this->mViewData['success']=0;
        if($res){
            $this->mViewData['success']=1;
        }       
        $this->renderSinglePage('front/thankyou');           
    }
}
?>