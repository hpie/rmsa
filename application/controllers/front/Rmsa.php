<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rmsa extends MY_Controller
{
    public function __construct(){
        parent::__construct();
        
        include APPPATH . 'third_party/smtp_mail/smtp_send.php'; 
        $this->load->helper('functions');

        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        sessionCheckRmsa();
        $this->load->model('Rmsa_model');
        $this->load->model('Helper_model');
        $this->load->model('Employee_model');
        $this->load->model('Emp_Login');

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
        visitLog($method,"Rmsa");
    }
    
    
    public function profile(){
        $result =  $this->Employee_model->rmsa_coordinators_details();
        $this->mViewData['result']= $result;
        $this->mViewData['title']= RMSA_MY_PROFILE_TITLE;
        $this->renderFront('front/rmsa_my_profile');
    }
     public function wrong_login_list(){     
        $this->mViewData['title']= RMSA_WRONG_LOGIN_LOG_TITLE;
        $this->renderFront('front/rmsa_wrong_login_log');
    }
    
    
    public function update_profile(){
        $result=array();               
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){            
            if($this->Rmsa_model->check_current_password($_POST['rmsa_user_current_password'])){                
                $res = $this->Rmsa_model->update_password($_POST);                    
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
        $this->mViewData['title']=RMSA_PROFILE_TITLE;        
        $this->renderFront('front/rmsa_profile');
    }    
    
    public function view_student(){    
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']= RMSAE_STUDENT_LIST_TITLE;
        $this->renderFront('front/rmsa_student');
    }
    public function view_employee(){
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']= RMSAE_EMPLOYEE_LIST_TITLE;
        $this->renderFront('front/rmsa_employee');
    }    
    public function view_teachers(){
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title']= RMSAE_TEACHERS_LIST_TITLE;
        $this->renderFront('front/rmsa_teachers');
    }                        
    
    
    public function create_employee(){
        $_SESSION['exist_email'] = 0;
        if(isset($_POST['rmsa_user_first_name'])){            
            $res =  $this->Rmsa_model->register_employee($_POST);            
            $result=array();
            $send_email_error=0;
            if($res['success'] == true){
                $_SESSION['registration'] = 1;
                $result['success']='success';
                $data = array(
                    'userName'=> $res['email'],
                    'password'=> $_POST['rmsa_user_email_password']
                );
                $sendmail = new SMTP_mail();
                $resMail = $sendmail->sendDetails($res['email'],$data); 
                 if ($resMail) {                      
                } else {
                    $_SESSION['send_email_error'] = 1;
                    $send_email_error=1;
                }
            }            
            if($res['email_exist'] == true){                
                $_SESSION['exist_email'] = 1;
                $result['success']='fail';
            }
            
            if($result['success']=='success' && $send_email_error==1){
                $_SESSION['registration'] = 1;
            }
            if($result['success']=='success' && $send_email_error==0){
                $_SESSION['registration'] = 2;
            }            
            echo json_encode($result);die;
        }
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['title']=RMSA_EMPLOYEE_REGISTRATION_TITLE;
        $this->renderFront('front/employeeregistration');
    }
    public function active_employee(){
        if(isset($_REQUEST['rmsa_user_id'])){
//            sessionCheckToken($_POST);
            $res = $this->Rmsa_model->active_employee($_REQUEST);
            if($res){
//               $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(                   
                    'suceess' => true
                );
            }
            
//            
//            $res = $this->Rmsa_model->active_employee($_REQUEST);
//            if($res){
//                $data = array(
//                    'suceess' => true
//                );
//            }
            echo json_encode($data);
        }
    }
    public function unblock_user(){
        if(isset($_REQUEST['rmsa_user_id'])){
//            sessionCheckToken($_POST);
            $res = $this->Rmsa_model->unblock_user($_REQUEST['rmsa_user_id'],$_REQUEST['table']);            
            if($res){  
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(                   
                    'suceess' => true
                );
            }
            else{
                $data = array(                    
                    'suceess' => false
                );
            }            
            echo json_encode($data);
        }
    }
    public function active_teacher(){
        if(isset($_REQUEST['rmsa_user_id'])){
//            sessionCheckToken($_POST);
            $res = $this->Rmsa_model->active_teacher($_REQUEST);
            if($res){
//               $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(                    
                    'suceess' => true
                );
            }
            
//            
//            $res = $this->Rmsa_model->active_employee($_REQUEST);
//            if($res){
//                $data = array(
//                    'suceess' => true
//                );
//            }
            echo json_encode($data);
        }
    }
    
    public function active_file(){
        if(isset($_REQUEST['rmsa_uploaded_file_id'])){
//            sessionCheckToken($_POST);
            $res = $this->Rmsa_model->active_file($_REQUEST);
            if($res){
//               $_SESSION['token'] = bin2hex(random_bytes(24));       
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
                $result['success']="notmatch";
            }
            echo json_encode($result);die;            
        }        
        if (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name']!=''){

            if(isset($_POST['rmsa_school_id'])){               
                $resCode = $this->Helper_model->load_school_code_byschoolid($_POST['rmsa_school_id']);
                $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];                               
            }
            else{            
                if(isset($_SESSION['emp_rmsa_user_id'])){            
                    $params['rmsa_school_id'] = $_SESSION['emp_rmsa_school_id'];
                    $resCode = $this->Helper_model->load_school_code_byschoolid($params['rmsa_school_id']);
                    $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];
                    $_POST['rmsa_block_id']=$resCode['rmsa_block_id'];                    
                }
                if(isset($_SESSION['tech_rmsa_user_id'])){
                    $params['rmsa_school_id'] = $_SESSION['tech_rmsa_school_id'];
                    $resCode = $this->Helper_model->load_school_code_byschoolid($params['rmsa_school_id']);
                    $_POST['rmsa_user_roll_number']=$resCode['rmsa_school_udise_code'].'-'.$_POST['rmsa_user_roll_number'];
                    $_POST['rmsa_block_id']=$resCode['rmsa_block_id'];
                }                
            }             
            $res=$this->Employee_model->update_profile($_POST,$stud_id);
            if(isset($res['success'])){   
                if($res['success'] == false){                
                    if(isset($res['email_exist'])){                           
                        $result['exist_email']=1;                                                                                   
                    }
                    if(isset($res['rollnumber_exist'])){                         
                        $result['rollnumber_exist']=1;                        
                    }
                    $result['success']="fail";                    
                }
            }
            if(!isset($res['success']) && $res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";
            }
            echo json_encode($result);die;
        }
        $student_result =  $this->Employee_model->student_details($stud_id);        
        $resCode = $this->Helper_model->load_school_code_byschoolid($student_result['rmsa_school_id']);
        $replaceStr=$resCode['rmsa_school_udise_code'].'-';
        $student_result['rmsa_user_roll_number']=str_replace($replaceStr,"",$student_result['rmsa_user_roll_number']);               
        
        $this->mViewData['student_data'] = $student_result;
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['blocksResult'] =  $this->Helper_model->load_blocks(array('districtId'=>$student_result['rmsa_district_id']));
        $this->mViewData['tehsilResult'] =  $this->Helper_model->load_tehsil(array('districtId'=>$student_result['rmsa_district_id']));
        $this->mViewData['schoolResult'] =  $this->Helper_model->load_school_byblock(array('rmsaBlockId'=>$student_result['rmsa_block_id']));
        $this->mViewData['title']=RMSA_STUDENT_PROFILE_TITLE;        
        $this->renderFront('front/rmsa_student_profile');
    }
    
     public function update_teacher_profile($emp_id){
//        echo $emp_id;die;
        $result=array();               
        if(isset($_POST['rmsa_user_new_password']) && $_POST['rmsa_user_new_password']!=''){                                      
            $res = $this->Employee_model->update_password_teacher($_POST,$emp_id);                    
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
            $res=$this->Employee_model->update_profile_teacher($_POST,$emp_id);
             if(isset($res['success'])){   
                if($res['success'] == false){                
                    if(isset($res['email_exist'])){                           
                        $result['exist_email']=1;                                                                                   
                    }
                    if(isset($res['rollnumber_exist'])){                         
                        $result['rollnumber_exist']=1;                        
                    }
                    $result['success']="fail";                    
                }
            }
            if(!isset($res['success']) && $res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";
            }
            echo json_encode($result);die;
        }        
        
        $employee_result =  $this->Employee_model->teacher_details($emp_id);        
        $this->mViewData['student_data'] = $employee_result;
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['blocksResult'] =  $this->Helper_model->load_blocks(array('districtId'=>$employee_result['rmsa_district_id']));
        $this->mViewData['tehsilResult'] =  $this->Helper_model->load_tehsil(array('districtId'=>$employee_result['rmsa_district_id']));
        $this->mViewData['schoolResult'] =  $this->Helper_model->load_school_byblock(array('rmsaBlockId'=>$employee_result['rmsa_block_id']));
        $this->mViewData['title']=RMSA_TEACHER_PROFILE_TITLE;
        $this->renderFront('front/rmsa_teacher_profile');
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
            $res=$this->Employee_model->update_profile_employee($_POST,$emp_id);
            if(isset($res['success'])){   
                if($res['success'] == false){                
                    if(isset($res['email_exist'])){                           
                        $result['exist_email']=1;                                                                                   
                    }
                    if(isset($res['rollnumber_exist'])){                         
                        $result['rollnumber_exist']=1;                        
                    }
                    $result['success']="fail";                    
                }
            }
            if(!isset($res['success']) && $res){
                    $_SESSION['updatedata']=1;
                    $result['success']="success";
            }
            echo json_encode($result);die;
        }

        $employee_result =  $this->Employee_model->employee_details($emp_id);
        $this->mViewData['student_data'] = $employee_result;
        $this->mViewData['distResult'] =  $this->Helper_model->load_distict();
        $this->mViewData['blocksResult'] =  $this->Helper_model->load_blocks(array('districtId'=>$employee_result['rmsa_district_id']));
        $this->mViewData['tehsilResult'] =  $this->Helper_model->load_tehsil(array('districtId'=>$employee_result['rmsa_district_id']));
        $this->mViewData['schoolResult'] =  $this->Helper_model->load_school_byblock(array('rmsaBlockId'=>$employee_result['rmsa_block_id']));
        $this->mViewData['title']=RMSA_EMPLOYEE_PROFILE_TITLE;
        $this->renderFront('front/rmsa_employee_profile');
    }
    
    public function active_student(){
        if(isset($_REQUEST['rmsa_user_id'])){
            
//            sessionCheckToken($_POST);
            $res = $this->Rmsa_model->active_student($_REQUEST);
            if($res){
//               $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(                    
                    'suceess' => true
                );
            }
            
//            
//            $res = $this->Rmsa_model->active_student($_REQUEST);
//            if($res){
//                $data = array(
//                    'suceess' => true
//                );
//            }
            echo json_encode($data);
        }
    }
       public function verify_email(){
        if(isset($_REQUEST['rmsa_user_id'])){            
            $res = $this->Rmsa_model->verify_email($_REQUEST);
            if($res){      
                $data = array(                    
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }
}