<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('functions');        
        $this->load->model('Emp_Login');
        $_SESSION['token'] = bin2hex(random_bytes(24));
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
    }    
    public function index() 
    {         
        $this->mViewData['title']=HOME_TITLE;
        $this->renderFront('front/index');
    }
    public function index1() {
        redirect('home');
    }
}
