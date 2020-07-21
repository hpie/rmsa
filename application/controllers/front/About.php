<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller{
    public function __construct(){
        parent::__construct();
        include APPPATH . 'third_party/smtp_mail/smtp_send.php';
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
        visitLog($method,"About");
        
    }
    public function index(){

        $sendmail = new SMTP_mail();
        $data = array(
            'Description'=> "This is a test email from Gyanshala"
        );
        $resMail = $sendmail->sendTestEmail("vasimlook@gmail.com",$data);         
        log_message('info',print_r($resMail,TRUE));        
        if ($resMail['success']==1) {            
            $this->mViewData['title']="Email Success";            
        } else {
            $this->mViewData['title']="Email Failed";
            $_SESSION['send_email_error'] = 1;
            $send_email_error=1;
        }
        
       // $this->mViewData['title']=ABOUT_TITLE;
        $this->renderFront('front/about');
    }
}
?>