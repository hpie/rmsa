<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class RmsaResource extends MY_Controller {

    public function __construct() {        
        parent::__construct();
        $this->load->helper('functions');        
        sessionCheckRmsa();
        $this->load->model('Emp_Login'); 
        
        $_POST['token']=$_SESSION['tokenchekvalue'];
        sessionCheckToken($_POST);
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
    public function index() {
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']=RMSA_FILE_LIST_TITLE;
        $this->renderFront('front/rmsa_resource');
    }    
}
?>