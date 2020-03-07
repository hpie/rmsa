<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 function sessionStudent($row) {
        session_regenerate_id();
        foreach ($row as $key => &$value) {
            $_SESSION['st_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='student';
        return;
    }
    function sessionEmployee($row) {
         session_regenerate_id();
        foreach ($row as $key => &$value) {
            $_SESSION['emp_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='employee';
        return;
    }
     function sessionTeacher($row) {
         session_regenerate_id();
        foreach ($row as $key => &$value) {
            $_SESSION['tech_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='teacher';
        return;
    }

     function sessionRmsa($row) {
        session_regenerate_id(); 
        foreach ($row as $key => &$value) {
            $_SESSION['rm_' . $key] = $value;
        }
        $_SESSION['user_id']=$row['rmsa_user_id'];
        $_SESSION['usertype']='rmsa';
        return;
    }

    function sessionCheckAll() {
        if (!isset($_SESSION['user_id'])) {
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
        session_regenerate_id();
        session_destroy();
    }