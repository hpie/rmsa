<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){                
        parent::__construct();  
        $this->load->helper('functions');
        
        $_SESSION['securityToken2']=$_SESSION['securityToken1'];
        sessionCheckToken();
        $_SESSION['securityToken1'] = bin2hex(random_bytes(24)); 
        
        sessionCheckStudent();
        $this->load->model('Student_model');
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
        visitLog($method,"Student");
    }    
    public function exam($file_id){              
        $this->mViewData['result'] =  $this->Student_model->file_details($file_id);
        $this->mViewData['title']=STUDENT_EXAM_TITLE;        
        $this->renderFront('front/exam');
    }
    
    public function question_details_all($rmsa_uploaded_file_id,$quiz_id){
        $quiz_details = $this->Student_model->quiz_details($quiz_id);
        $_SESSION['questions']=$this->Student_model->question_details_all($quiz_id,$quiz_details['quiz_min_questions']);        
        redirect(BASE_URL.'/student-exam/'.$rmsa_uploaded_file_id.'/'.$quiz_id.'/'.$_SESSION['questions'][0]['question_id']);
    }
    
    public function studentExam($file_id,$quiz_id,$question_id){
        $question_details_all=$_SESSION['questions'];
        $i=0;        
        foreach ($question_details_all as $row){
            if($row['question_id']==$question_id){
                $i=1;
            }else{
                if($i==1){
                    $this->mViewData['next']=$row['question_id'];                    
                    break;
                }
                $i=0;                
            }
        }                
        $finish = 0;
        $total_question=sizeof($question_details_all);        
        if($question_id==$question_details_all[$total_question-1]['question_id']){
            $finish = 1;            
        }
        if($finish==1){
            $this->mViewData['next']=0;
        }        
        if(!isset($_SESSION['score'])){
            $_SESSION['score']=0;
        }
        if(isset($_POST['submit'])){            
            $correct=$this->Student_model->check_question_choice_details($_POST['question_id'],$_POST['choice']); 
            if($correct['count_id']==1){
                $_SESSION['score']=($_SESSION['score'])+1;                                                    
            }
            if($question_id==0){
                $add_score=$this->Student_model->add_score($_SESSION['score'],$quiz_id);
                $_SESSION['score']=0;
                redirect(STUDENT_SCORE_LINK.$add_score);
            }                
        }                         
        $this->mViewData['total']= $total_question;
        $this->mViewData['quizdetails'] =  $this->Student_model->quiz_details($quiz_id);
        $this->mViewData['questiondetails'] =  $this->Student_model->question_details($quiz_id,$question_id);        
        $this->mViewData['choicedetails'] =  $this->Student_model->choice_details($question_id);        
        $this->mViewData['title']=STUDENT_EXAM_START_TITLE;        
        $this->renderFront('front/examstart');
    }
    public function studentScore($rmsa_quiz_student_mapping_id){              
        $res=$this->Student_model->score_details($rmsa_quiz_student_mapping_id);   
        
        if($res['quiz_student_score']>=$res['quiz_pass_score']){
            $res['pass']=1;
        }else{
            $res['pass']=0;
        }
        
        $this->mViewData['result'] =  $res;        
        $this->mViewData['title']=STUDENT_SCORE_TITLE;        
        $this->renderFront('front/score');
    }
    
    public function update_profile(){
        $result=array();               
        if(isset($_POST['rmsa_user_current_password']) && $_POST['rmsa_user_current_password']!=''){            
            if($this->Student_model->check_current_password($_POST['rmsa_user_current_password'])){                
                $res = $this->Student_model->update_password($_POST);                    
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
            $this->Student_model->update_profile($_POST);
            $_SESSION['updatedata']=1;
            $result['success']="success";
            echo json_encode($result);die;
        }        
        $this->mViewData['student_data'] =  $this->Student_model->student_details();
        $this->mViewData['title']=STUDENT_PROFILE_TITLE;        
        $this->renderFront('front/student_profile');
    }
    public function is_active(){
        if($_SESSION['st_rmsa_student_login_active']==1){
            $res = $this->Student_model->is_active($_SESSION['st_rmsa_user_id']);
            echo json_encode($res);
        }
    }
    public function logout() {        
        $userId=$_SESSION['user_id'];
        $userType=$_SESSION['usertype']; 
        log_message('info', "$userType id $userId logged out");
        
        $res = $this->Student_model->update_logout_status($_SESSION['st_rmsa_user_id']);
        sessionDestroy();        
        if($res){
            redirect(STUDENT_LOGIN_LINK);
        }        
    }
}
?>