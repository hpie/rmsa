<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RmsaResource extends MY_Controller {

    public function __construct() {
        $this->session->sessionCheckRmsa();
        parent::__construct();
        $this->load->model('Emp_Login');               
        if (isset($_SESSION['username'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['username']);            
            if ($result) {                
                $token = $result['token'];
                if($_SESSION['token'] != $token) {
                    session_destroy(); 
                    redirect(HOME_LINK);
                }
            }
        }
        
        if (isset($_SESSION['username'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['username']);            
            if ($result) {                
                $token = $result['token'];
                if($_SESSION['token'] != $token) {
                    session_destroy(); 
                    redirect(HOME_LINK);
                }
            }
        }
    }
    public function index() {
        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']=RMSA_FILE_LIST_TITLE;
        $this->renderFront('front/rmsa_resource');
    }    
}
?>