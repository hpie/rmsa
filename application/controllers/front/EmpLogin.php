<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmpLogin extends MY_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->helper('functions');        
        $_SESSION['securityToken2'] = $_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24));

        if (isset($_SESSION['st_rmsa_user_id']) OR isset($_SESSION['rm_rmsa_user_id']) OR isset($_SESSION['tech_rmsa_user_id'])) {
            redirect(HOME_LINK);
        }
        $this->load->model('Emp_Login');
        if (isset($_SESSION['user_id'])) {
            $result = $this->Emp_Login->getTokenAndCheck($_SESSION['usertype'], $_SESSION['user_id']);
            if ($result) {
                $token = $result['token'];
                if ($_SESSION['tokencheck'] != $token) {
                    session_destroy();
                    redirect(HOME_LINK);
                }
            }
        }  
        $method=$this->router->fetch_method();
        visitLog($method,"EmpLogin");
    }
    public function index() {                                            
        if (isset($_SESSION['emp_rmsa_user_id'])) {
            if ($_SESSION['emp_rmsa_user_id'] > 0) {
                redirect(HOME_LINK);
            }
        }
        $_SESSION['invalid_login'] = 0;
        if (isset($_POST['username']) && isset($_POST['password'])) {            
//            reCaptchaResilt($_REQUEST['captcha_entered'],EMPLOYEE_LOGIN_LINK);
            $result = $this->Emp_Login->Emp_Login_select($_POST['username'], $_POST['password']);
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
        $this->mViewData['title'] = EMPLOYEE_LOGIN_TITLE;
        $this->renderFront('front/emplogin');
    }

    public function employeeLogout() {         
        $res = $this->Emp_Login->update_logout_status($_SESSION['emp_rmsa_user_id']);
        
        $userId=$_SESSION['user_id'];
        $userType=$_SESSION['usertype']; 
        log_message('info', "$userType id $userId logged out");
        
        sessionDestroy();
        if ($res) {
            redirect(EMPLOYEE_LOGIN_LINK);
        }
    }

    public function isActiveEmployee() {
        if (($_SESSION['emp_rmsa_employee_login_active']) == 1) {
            $res = $this->Emp_Login->isEmployeeActive($_SESSION['emp_rmsa_user_id']);
            echo json_encode($res);
        }
    }

    public function recaptcha() {
        $num1 = rand(1, 9); //Generate First number between 1 and 9  
        $num2 = rand(1, 9); //Generate Second number between 1 and 9  
        $captcha_total = $num1 + $num2;
        $math = "$num1" . " + " . "$num2" . " =";
        $_SESSION['rand_code'] = $captcha_total;
        $font = 'assets/arial.ttf'; 
        $image = imagecreatetruecolor(120, 30); //Change the numbers to adjust the size of the image
        $black = imagecolorallocate($image, 0, 0, 0);
        $color = imagecolorallocate($image, 255, 255, 255);
        $white = imagecolorallocate($image, 0, 26, 26);
        imagefilledrectangle($image, 0, 0, 399, 99, $white);
        imagettftext($image, 20, 0, 20, 25, $color, $font, $math); //Change the numbers to adjust the font-size
        header("Content-type: image/png");
        imagepng($image);
    }

}

?>