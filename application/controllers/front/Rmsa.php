<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rmsa extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->session->sessionCheckRmsa();
        $this->load->model('Rmsa_model');
        $this->load->model('Helper_model');
        $this->load->model('Employee_model');
    }
    public function view_student(){       
        $this->mViewData['title']= RMSAE_STUDENT_LIST_TITLE;
        $this->renderFront('front/rmsa_student');
    }
    public function view_employee(){       
        $this->mViewData['title']= RMSAE_EMPLOYEE_LIST_TITLE;
        $this->renderFront('front/rmsa_employee');
    }    
    public function create_employee(){
        $_SESSION['exist_email'] = 0;
        if(isset($_POST['rmsa_user_first_name'])){
            $res =  $this->Rmsa_model->register_employee($_POST);            
            $result=array();
            if($res['success'] == true){
                $_SESSION['registration'] = 1;
                $result['success']='success';
                $this->load->config('email');
                $this->load->library('email');

                $from = $this->config->item('smtp_user');
                $to = $res['email'];                
                $subject = 'Welcome RMSA';
//                $message = 'Welcome to RMSA portal';

                $this->email->set_newline("\r\n");
                $this->email->from($from);
                
                $data = array(
                    'userName'=> $res['email'],
                    'password'=> $_POST['rmsa_user_email_password']
                );                
                $this->email->to($to);
                $this->email->subject($subject);
                $body = $this->load->view('front/mailtemplate.php',$data,TRUE);
                $this->email->message($body);
                if ($this->email->send()) {                   
                } else {
                    show_error($this->email->print_debugger());
                }
            }            
            if($res['email_exist'] == true){                
                $_SESSION['exist_email'] = 1;
                $result['success']='fail';
            }
            echo json_encode($result);die;
        }
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=RMSA_EMPLOYEE_REGISTRATION_TITLE;
        $this->renderFront('front/employeeregistration');
    }
    public function active_employee(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->Rmsa_model->active_employee($_REQUEST);
            if($res){
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
        $this->mViewData['title']=RMSA_STUDENT_PROFILE_TITLE;        
        $this->renderFront('front/rmsa_student_profile');
    }
    
    public function update_employee_profile($emp_id){
        $result=array();               
        if(isset($_POST['rmsa_user_new_password']) && $_POST['rmsa_user_new_password']!=''){                                      
            $res = $this->Employee_model->update_password_employee($_POST,$emp_id);                    
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
            $this->Employee_model->update_profile_employee($_POST,$emp_id);
            $_SESSION['updatedata']=1;
            $result['success']="success";
            echo json_encode($result);die;
        }       
        $this->mViewData['student_data'] = $this->Employee_model->employee_details($emp_id);
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=RMSA_EMPLOYEE_PROFILE_TITLE;        
        $this->renderFront('front/rmsa_employee_profile');
    }
    
    public function active_student(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->Rmsa_model->active_student($_REQUEST);
            if($res){
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
}