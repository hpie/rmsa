<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
function reCaptchaResilt($captcha_entered,$redirect_url){
            if ($captcha_entered!=$_SESSION['rand_code']) {
                $_SESSION['captcha']=1;
                redirect($redirect_url);
            }
            return true;
}

function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function visitLog($method,$controller) {        
        if($method!="isActiveEmployee"){
            if(isset($_SESSION['user_id'])){            
                $userId=$_SESSION['user_id'];
                $userType=$_SESSION['usertype']; 
                log_message('info', "$userType id $userId visit the $controller controller and method name is $method");                        
            }
            else{
                log_message('info', "guest user visit the $controller controller and method name is $method");
            }
        }
}


 function sessionStudent($row) {
//        session_regenerate_id();
//        print_r($row);die;
        foreach ($row as $key => &$value) {            
            $_SESSION['st_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='student';
        return;
    }
    function sessionEmployee($row) {
//         session_regenerate_id();
        foreach ($row as $key => &$value) {
            $_SESSION['emp_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='employee';
        return;
    }
     function sessionTeacher($row) {
//         session_regenerate_id();
        foreach ($row as $key => &$value) {
            $_SESSION['tech_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='teacher';
        return;
    }

     function sessionRmsa($row) {
//        session_regenerate_id(); 
        foreach ($row as $key => &$value) {
            $_SESSION['rm_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='rmsa';
        return;
    }

    function sessionCheckAll() {
        if (!isset($_SESSION['user_id'])) {
            session_destroy();
            redirect(BASE_URL);
            return false;
        }        
        return true;
    }    
    function sessionCheckStudent() {
        if (!isset($_SESSION['st_rmsa_user_id'])) {
            redirect(STUDENT_LOGIN_LINK);
            return false;
        }        
        return true;
    }

     function sessionCheckEmployee() {
        if (!isset($_SESSION['emp_rmsa_user_id'])) {
            redirect(EMPLOYEE_LOGIN_LINK);
            return false;
        }
        return true;
    }
     function sessionCheckTeacher() {
        if (!isset($_SESSION['tech_rmsa_user_id'])) {
            redirect(EMPLOYEE_LOGIN_LINK);
            return false;
        }
        return true;
    }        
    function sessionCheckToken() {
    if (hash_equals($_SESSION['securityToken1'], $_SESSION['securityToken2'])) {
        return true;
    } else {
        session_destroy();
        redirect(BASE_URL);
    }
    return true;
}
    

    function sessionCheckRmsa() {
        if (!isset($_SESSION['rm_rmsa_user_id'])) {
            redirect(RMSA_LOGIN_LINK);
            return false;
        }
        return true;
    }
    
    function sessionDestroy() {
//        session_regenerate_id();
        session_destroy();
    }