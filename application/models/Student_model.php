<?php

class Student_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function student_details() {
        $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
        $data = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        $student_data = $data->row_array();
        if (isset($student_data)) {
            return $student_data;
        }
    }

    public function quiz_details($quiz_id) {
        $data = $this->db->query("SELECT * FROM quiz WHERE quiz_id = '" . $quiz_id . "'");
        $quiz_data = $data->row_array();
        if (isset($quiz_data)) {
            return $quiz_data;
        }
    }

    public function choice_details($question_id) {
        $data = $this->db->query("SELECT * FROM choices WHERE question_id='" . $question_id . "' AND choice_status='ACTIVE'");
        $choice_data = $data->result_array();
        if (isset($choice_data)) {
            return $choice_data;
        }
    }

    public function question_details($quiz_id, $question_id) {
        $data = $this->db->query("SELECT * FROM questions WHERE quiz_id =$quiz_id AND question_id=$question_id AND question_status='ACTIVE'");
        $question_data = $data->row_array();
//            print_r($question_data);die;
        if (isset($question_data)) {
            return $question_data;
        }
    }

     public function score_details($rmsa_quiz_student_mapping_id) {
        $data = $this->db->query("SELECT rqsm.*,ruf.*,qz.quiz_pass_score FROM rmsa_quiz_student_mapping rqsm
                INNER JOIN quiz qz
                ON qz.quiz_id=rqsm.quiz_id
                INNER JOIN rmsa_uploaded_files ruf
                ON ruf.rmsa_uploaded_file_id=qz.rmsa_uploaded_file_id
                WHERE rmsa_quiz_student_mapping_id=$rmsa_quiz_student_mapping_id");
        $question_data = $data->row_array();
        if (isset($question_data)) {
            return $question_data;
        }
    }
    
    public function check_question_choice_details($question_id, $choice) {
        $data = $this->db->query("SELECT COUNT(choice_id) AS count_id FROM choices WHERE question_id='" . $question_id . "' AND choice_status='ACTIVE' AND choice='$choice' AND is_correct=1");
        $question_data = $data->row_array();
        if (isset($question_data)) {
            return $question_data;
        }
    }

    public function add_score($quiz_student_score, $quiz_id) {
        $userId = $_SESSION['st_rmsa_user_id'];
        $post_data=array();
        $post_data['quiz_student_score']=$quiz_student_score;
        $post_data['quiz_id']=$quiz_id;
        $post_data['rmsa_user_id']=$userId;
        $this->db->insert('rmsa_quiz_student_mapping', $post_data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function question_details_all($quiz_id,$limit) {
        $data = $this->db->query("SELECT * FROM questions WHERE quiz_id =$quiz_id AND question_status='ACTIVE' ORDER BY RAND() LIMIT $limit");
        $question_data = $data->result_array();   
        
//        echo '<pre>';        print_r($question_data);die;
        
        if (isset($question_data)) {
            return $question_data;
        }
    }

    public function file_details($file_id) {
        $data = $this->db->query("SELECT ruf.*,qs.question_id,qz.quiz_id FROM rmsa_uploaded_files ruf
                    INNER JOIN quiz qz
                    ON qz.rmsa_uploaded_file_id=$file_id
                    INNER JOIN questions qs
                    ON qs.quiz_id=qz.quiz_id
                    WHERE ruf.rmsa_uploaded_file_id =$file_id AND qs.question_status='ACTIVE'");
        $file_data = $data->row_array();
        if (isset($file_data)) {
            return $file_data;
        }
    }

    public function check_current_password($current_password) {
        $current_password = md5($current_password);
        $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
        $check = $this->db->query("SELECT * FROM rmsa_student_users
                                       WHERE rmsa_user_id = '" . $rmsa_user_id . "'
                                       AND rmsa_user_email_password ='" . $current_password . "'");
        $row = $check->row_array();
        if (isset($row)) {
            if ($current_password == $row['rmsa_user_email_password']) {
                return true; //matched
            }
        }
        return false; //not matched
    }

    public function update_password($params) {
        $new_password = md5($params['rmsa_user_new_password']);
        $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
        $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_email_password = '" . $new_password . "'
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }

    public function update_profile($params) {
        $rmsa_user_id = $_SESSION['st_rmsa_user_id'];
        $first_name = $params['rmsa_user_first_name'];
        $middle_name = $params['rmsa_user_middle_name'];
        $last_name = $params['rmsa_user_last_name'];
        $nick_name = $params['rmsa_user_nick_name'];

        $result = $this->db->query("UPDATE rmsa_student_users
                              SET rmsa_user_first_name  = '" . $first_name . "',
                                  rmsa_user_middle_name = '" . $middle_name . "',  
                                  rmsa_user_last_name   = '" . $last_name . "',  
                                  rmsa_user_nick_name   = '" . $nick_name . "'  
                              WHERE rmsa_user_id = '" . $rmsa_user_id . "'");
        return $result; //return true/false
    }

    public function is_active($rmsa_user_id) {
        $check = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_id = '{$rmsa_user_id}' AND rmsa_student_login_active = 1");
        $issctive = $check->row_array();
        if ($issctive['rmsa_student_login_active']) {
            return array(
                'isactive' => true
            );
        } else {
            return array(
                'isactive' => false
            );
        }
    }

    public function update_logout_status($rmsa_user_id) {
        $query_res = $this->db->query("UPDATE rmsa_student_users SET rmsa_student_login_active = 0 WHERE rmsa_user_id='" . $rmsa_user_id . "' ");
        if ($query_res) {
            return true;
        }
    }

}

?>