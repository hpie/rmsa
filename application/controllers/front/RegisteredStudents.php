<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisteredStudents  extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Emp_Login');        
        if (isset($_SESSION['username'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['username']);            
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
        $this->mViewData['title']=REGISTERED_STUDENT_TITLE;
        $this->renderFront('front/registeredstudents');
    }
}
?>