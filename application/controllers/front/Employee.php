<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        $this->session->sessionCheckEmployee();
        $this->load->model('Employee_model');
    }

    public function view_student(){
        $this->mViewData['title']=EMPLOYEE_STUDENT_LIST_TITLE;
        $this->renderFront('front/employee_student');
    }
    public function approve_student(){
        if(isset($_REQUEST['rmsa_user_id'])){
            $res = $this->Employee_model->approve_student($_REQUEST);
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
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){            
            if($this->Employee_model->check_current_password($_POST['rmsa_user_current_password'],$stud_id)){                
                $res = $this->Employee_model->update_password($_POST,$stud_id);                    
                if($res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";                   
                }                
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