<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->helper('functions'); 
        sessionCheckTeacher();
        $this->load->model('Employee_model');
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
    public function view_student(){
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']=TEACHER_STUDENT_LIST_TITLE;
        $this->renderFront('front/teacher_student');
    }
    public function approve_student(){
        if(isset($_REQUEST['rmsa_user_id'])){
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->approve_student($_REQUEST);
            if($res){
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'token'=>$_SESSION['token'],
                    'suceess' => true
                );
            }            
            echo json_encode($data);
        }
    }
    public function active_file(){
        if(isset($_REQUEST['rmsa_uploaded_file_id'])){
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->active_file($_REQUEST);
            if($res){
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'token'=>$_SESSION['token'],
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
    public function update_student_profile($stud_id){
        $result=array();               
        if(isset($_POST['rmsa_user_new_password']) && $_POST['rmsa_user_new_password']!=''){                                      
            $res = $this->Employee_model->update_password($_POST,$stud_id);                    
            if($res){
                $_SESSION['updatedata']=1;
                $result['success']="success";                   
            }                            
            else{
                $result['success']="fail";
            }
            echo json_encode($result);die;            
        }        
        if (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name']!=''){            
            $this->Employee_model->update_profile($_POST,$stud_id);
            $_SESSION['updatedata']=1;
            $result['success']="success";
            echo json_encode($result);die;
        }       
        $this->mViewData['student_data'] = $this->Employee_model->student_details($stud_id);
        $this->mViewData['title']=EMPLOYEE_STUDENT_PROFILE_TITLE;        
        $this->renderFront('front/employee_student_profile');
    }
}