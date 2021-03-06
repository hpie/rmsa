<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends MY_Controller
{
    public function __construct(){
        parent::__construct();
         include APPPATH . 'third_party/smtp_mail/smtp_send.php'; 
        $this->load->helper('functions'); 
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        sessionCheckTeacher();
        $this->load->model('Employee_model');
        $this->load->model('Emp_Login'); 
        $this->load->model('Student_model');
        $this->load->model('Tech_Login'); 
        
    
        
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
        $method=$this->router->fetch_method();
        visitLog($method,"Teacher");        
    }
    
    public function profile(){
        $result =  $this->Employee_model->rmsa_teacher_details();
        $this->mViewData['result']= $result;
        $this->mViewData['title']= TEACHER_MY_PROFILE_TITLE;
        $this->renderFront('front/tech_my_profile');
    }
    
    public function update_profile(){
        $result=array();               
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){            
            if($this->Tech_Login->check_current_password($_POST['rmsa_user_current_password'])){                
                $res = $this->Tech_Login->update_password($_POST);                    
                if($res){
                    
                    $email=$_SESSION['tech_rmsa_user_email_id'];                    
                    $data = array(
                        'username'=> $email,
                        'password'=> $_POST['rmsa_user_new_password'],
                        'template'=> 'teacherPassResetTemplate.html'
                    );
                    $sendmail = new SMTP_mail();
                    $resMail = $sendmail->sendResetPasswordDetails($email,$data);                     
                    log_message('info',print_r($resMail,TRUE)); 
                    
                    $_SESSION['updatedata']=1;
                    $result['success']="success";                   
                }                
            }
            else{
                $result['success']="fail";
            }
            echo json_encode($result);die;            
        }        
        $this->mViewData['title']=TEACHER_PROFILE_TITLE;        
        $this->renderFront('front/teacher_profile');
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
                
                $email=$this->Employee_model->get_user_details($stud_id,'rmsa_student_users');                
                $data = array(
                    'username'=> $email['rmsa_user_email_id'],
                    'password'=> $_POST['rmsa_user_new_password'],
                    'template'=> 'studentPassResetTemplate.html'
                );
                $sendmail = new SMTP_mail();
                $resMail = $sendmail->sendResetPasswordDetails($email['rmsa_user_email_id'],$data);                 
                log_message('info',print_r($resMail,TRUE)); 
                
                
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
    
    public function attempted_quiz_list($student_id){
        $this->mViewData['student_id']=$student_id;
        $this->mViewData['title']=TEACHER_STUDENT_ATTEMPTED_EXAM_TITLE;        
        $this->renderFront('front/tec_attempted_quizlis');
    }
    public function my_quiz_attempt_result($quiz_id,$student_id){       
        $this->mViewData['student_id']=$student_id;
        $this->mViewData['result'] =  $this->Student_model->quiz_file_details($quiz_id);                        
        $this->mViewData['quiz_id']=$quiz_id;
        $this->mViewData['title']=TEACHER_STUDENT_MY_QUIZATTEMPTED_RESULT_TITLE;        
        $this->renderFront('front/tec_my_quiz_result');
    }
}