<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmpLogin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        include APPPATH . 'third_party/smtp_mail/smtp_send.php';
        $this->load->helper('functions');
        $_SESSION['securityToken2'] = $_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24));

        if (isset($_SESSION['st_rmsa_user_id']) OR isset($_SESSION['rm_rmsa_user_id']) OR isset($_SESSION['tech_rmsa_user_id'])) {
            redirect(HOME_LINK);
        }
        $this->load->model('Emp_Login');
        $this->load->model('Rmsa_model');
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
        $method = $this->router->fetch_method();
        visitLog($method, "EmpLogin");
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

            if (isset($result['success'])) {
                if ($result['success'] == 1) {
                    $_SESSION['email_notverify'] = 1;
                }
            }

            if ($result == true && !isset($result['success'])) {
                $userId = $_SESSION['user_id'];
                $userType = $_SESSION['usertype'];
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

        $userId = $_SESSION['user_id'];
        $userType = $_SESSION['usertype'];
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

    public function forget_password($user_type) {
        if (isset($_POST['username'])) {
            $_SESSION['email_not_exist'] = 0;
            $sendData = array();
            $sendData['success'] = 0;
            if ($user_type == 'rmsa') {
                $resEmailCheck = $this->Emp_Login->email_exist_check($_POST['username'], 'rmsa_coordinators');
                if ($resEmailCheck['success']) {
                    $sendData['success'] = 1;
                } else {
                    $_SESSION['email_not_exist'] = 1;
                }
            }
            if ($user_type == 'employee') {
                $resEmailCheck = $this->Emp_Login->email_exist_check($_POST['username'], 'rmsa_employee_users');
                if ($resEmailCheck['success']) {
                    $sendData['success'] = 1;
                } else {
                    $_SESSION['email_not_exist'] = 1;
                }
            }
            if ($user_type == 'teacher') {
                $resEmailCheck = $this->Emp_Login->email_exist_check($_POST['username'], 'rmsa_teacher_users');
                if ($resEmailCheck['success']) {
                    $sendData['success'] = 1;
                } else {
                    $_SESSION['email_not_exist'] = 1;
                }
            }
            if ($user_type == 'student') {
                $resEmailCheck = $this->Emp_Login->email_exist_check($_POST['username'], 'rmsa_student_users');
                if ($resEmailCheck['success']) {
                    $sendData['success'] = 1;
                } else {
                    $_SESSION['email_not_exist'] = 1;
                }
            }
            if ($sendData['success'] == 1) {               
                $chekReqValidity = $this->Emp_Login->check_forget_validity($user_type, $resEmailCheck['data']['rmsa_user_id'], date("Y-m-d"));
                if ($chekReqValidity) {
                    $link_code = forget_password_uuid($resEmailCheck['data']['rmsa_user_id'], $user_type, 'e');
                    $change_password_link = CHANGE_FORGET_PASSWORD_LINK . $link_code;
                    $data = array(
                        'username' => $_POST['username'],
                        'template' => 'forgetPasswordChangeTemplate.html',
                        'change_password_link' => $change_password_link
                    );
                    $sendmail = new SMTP_mail();
                    $resMail = $sendmail->sendForgetLink($_POST['username'], $data);
                    log_message('info', print_r($resMail, TRUE));
                    if ($resMail['success'] == 1) {                        
                        $params = array();
                        $params['rmsa_user_id'] = $resEmailCheck['data']['rmsa_user_id'];
                        $params['link_code'] = $link_code;
                        $params['user_type'] = $user_type;
                        $params['request_date'] = date("Y-m-d");
                        $this->Rmsa_model->user_forget_link($params);                        
                        
                        $_SESSION['forget_mail_sent']=1;
                        
                    } else {
                        $_SESSION['send_email_error'] = 1;
                        $send_email_error = 1;
                    }
                }else{
                    $_SESSION['forget_validity'] = 1;
                }
            }
        }
        $this->mViewData['user_type'] = $user_type;
        $this->mViewData['title'] = FORGET_PASSWORD_TITLE;
        $this->renderFront('front/forget_password');
    }
    public function forget_password_change($link_code){        
        $resCode=forget_password_uuid($link_code,'','d');
        $date=date("Y-m-d");
        $res=$this->Emp_Login->chek_forget_code_exist($resCode['rmsa_user_id'],$resCode['rmsa_user_type'],$link_code,$date);        
        $this->mViewData['success']=0;
        if($res){
            $this->mViewData['rmsa_user_id']=$resCode['rmsa_user_id'];
            $this->mViewData['rmsa_user_type']=$resCode['rmsa_user_type'];
            $this->mViewData['success']=1;
            $this->mViewData['title']=CHANGE_FORGET_PASSWORD_TITLE;
            $this->renderFront('front/change_forget_password');
        }else{
            $this->mViewData['success']=0;
            $this->renderSinglePage('front/forget_expierd');
        }                          
    }
    public function update_forget_password(){
        $_SESSION['update_forget_password']=0;
        if(isset($_POST['rmsa_user_new_password']) && $_POST['rmsa_user_new_password']!=''){                                      
            $res = $this->Emp_Login->update_forget_password($_POST);                    
            if($res){               
                $_SESSION['update_forget_password']=1; 
                $result['success']="success";                   
            }                            
            else{
                $result['success']="fail";
            }
            echo json_encode($result);die;            
        }       
    }
}

?>