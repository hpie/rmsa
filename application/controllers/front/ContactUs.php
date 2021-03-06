<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('functions');
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
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
        visitLog($method,"ContactUs");
    }
    public function index(){
        $this->mViewData['title']=CONTACT_US_TITLE;
        $this->renderFront('front/contactus');
    }

}
?>