<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class RmsaLogin extends MY_Controller{
    public function __construct(){
        parent::__construct();
        if(isset($_SESSION['emp_rmsa_user_id']) OR isset($_SESSION['st_rmsa_user_id']) OR isset($_SESSION['tech_rmsa_user_id'])){
            redirect(HOME_LINK);
        }  
        $this->load->helper('functions');

        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        $this->load->model('Rmsa_Login');
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
        visitLog($method,"RmsaLogin");
    }
    public function index(){
        if(isset($_SESSION['rm_rmsa_user_id'])){
            if($_SESSION['rm_rmsa_user_id'] > 0){
                redirect(HOME_LINK);
            }
        }
        $_SESSION['invalid_login'] = 0;
        if(isset($_POST['username']) && isset($_POST['password'])){
           $result = $this->Rmsa_Login->Rmsa_Login_select($_POST['username'],$_POST['password']);
           if($result == true){ 
            $userId=$_SESSION['user_id'];
            $userType=$_SESSION['usertype']; 
            log_message('info', "$userType id $userId logged into the system");
               redirect(HOME_LINK);
           }
           if ($result == false) {
            $_SESSION['invalid_login'] = 1;
           }           
        }
        $this->mViewData['title'] =RMSA_LOGIN_TITLE;
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->renderFront('front/rmsalogin');
    }
    public function rmsaLogout() {       
//        echo 'hi';die;
        
        $userId=$_SESSION['user_id'];
        $userType=$_SESSION['usertype']; 
        log_message('info', "$userType id $userId logged out");
        
        $res = $this->Rmsa_Login->update_logout_status($_SESSION['rm_rmsa_user_id']);
        sessionDestroy();        
        if($res){
            redirect(RMSA_LOGIN_LINK);
        }        
    }
    public function isActiveRmsa(){
        if(($_SESSION['rm_rmsa_rmsa_login_active']) == 1){
            $res = $this->Rmsa_Login->isRmsaActive($_SESSION['rm_rmsa_user_id']);
            echo json_encode($res);
        }
    }
}
?>