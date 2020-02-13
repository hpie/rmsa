<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('functions');
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
    }
    public function index(){
        $this->mViewData['title']=ABOUT_TITLE;
        $this->renderFront('front/about');
    }
}
?>