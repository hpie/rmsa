<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('functions');
        sessionCheckEmployee();
        $this->load->model('Employee_model');
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
    }

    public function create_quiz($rmsa_uploaded_file_id) {
        if (isset($_POST['submit'])) {
            $params = array();
            $params['rmsa_uploaded_file_id'] = $_POST['rmsa_uploaded_file_id'];
            $params['quiz_title'] = $_POST['quiz_title'];
            $params['quiz_min_questions'] = $_POST['quiz_min_questions'];
            $params['quiz_pass_score'] = $_POST['quiz_pass_score'];
            $res = $this->Employee_model->create_quiz($params);
            if ($res) {
                $_SESSION['quizAdd'] = 1;
                redirect(EMPLOYEE__QUIZ_RESOURCES_LIST_LINK);
            }
        }


        $this->mViewData['rmsa_uploaded_file_id'] = $rmsa_uploaded_file_id;
        $this->renderFront('front/createquiz');
    }

    public function add_quistions($quiz_id) {
        $resQuizQuestionsCount = $this->Employee_model->count_quiz_questions($quiz_id);        
        $resQuiz = $this->Employee_model->get_quiz($quiz_id);
        if (isset($_POST['submit'])) {
//            if(!empty($resQuizQuestionsCount)){
//                if($resQuiz['quiz_min_questions']==$resQuizQuestionsCount){
//                    $_SESSION['maxQuestionLimit']=1;
//                    redirect(EMPLOYEE__QUIZ_RESOURCES_LIST_LINK . $resQuiz['rmsa_uploaded_file_id']);
//                }
//            }
            $params = array();
            $params['question'] = $_POST['question'];
            $params['quiz_id'] = $quiz_id;
            $res = $this->Employee_model->add_quistions($params);
            if ($res) {
                foreach ($_POST['choice'] as $choice => $value) {                    
                    $params = array();
                    $params['choice'] = $value;
                    $params['question_id'] = $res;
                    if ($_POST['correct_choice'] == $choice+1) {
                        $params['is_correct'] = 1;
                    }
                    $this->Employee_model->add_choice($params);
                }
                $_SESSION['questionAdd'] = 1;
                redirect(EMPLOYEE__QUIZ_RESOURCES_LIST_LINK . $resQuiz['rmsa_uploaded_file_id']);
            }
        }
        $this->mViewData['quiz_id'] = $quiz_id;
        $this->renderFront('front/addquestion');
    }

    public function view_student() {
//        print_r($_SESSION['emp_rmsa_school_id']);die;
//        $_SESSION['token'] = bin2hex(random_bytes(24));       
        $this->mViewData['title'] = EMPLOYEE_STUDENT_LIST_TITLE;
        $this->renderFront('front/employee_student');
    }

    public function approve_student() {
        if (isset($_REQUEST['rmsa_user_id'])) {
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->approve_student($_REQUEST);
            if ($res) {
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }

    public function active_file() {
        if (isset($_REQUEST['rmsa_uploaded_file_id'])) {
//            sessionCheckToken($_POST);
            $res = $this->Employee_model->active_file($_REQUEST);
            if ($res) {
//                $_SESSION['token'] = bin2hex(random_bytes(24));       
                $data = array(
                    'suceess' => true
                );
            }
            echo json_encode($data);
        }
    }

    public function update_student_profile($stud_id) {
        $result = array();
        if (isset($_POST['rmsa_user_new_password']) && $_POST['rmsa_user_new_password'] != '') {
            $res = $this->Employee_model->update_password($_POST, $stud_id);
            if ($res) {
                $_SESSION['updatedata'] = 1;
                $result['success'] = "success";
            } else {
                $result['success'] = "fail";
            }
            echo json_encode($result);
            die;
        }
        if (isset($_POST['rmsa_user_first_name']) && $_POST['rmsa_user_first_name'] != '') {
            $this->Employee_model->update_profile($_POST, $stud_id);
            $_SESSION['updatedata'] = 1;
            $result['success'] = "success";
            echo json_encode($result);
            die;
        }
        $this->mViewData['student_data'] = $this->Employee_model->student_details($stud_id);
        $this->mViewData['title'] = EMPLOYEE_STUDENT_PROFILE_TITLE;
        $this->renderFront('front/employee_student_profile');
    }

}
