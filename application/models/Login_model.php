<?php

class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function validate(){

        $username = $this->security->xss_clean($this->input->post('student_username'));
        $password = $this->security->xss_clean($this->input->post('student_password'));

        //prep the query
        $this->db->where('username',$username);
        $this->db->where('password',$password);

        //run the query
        //NOTE: currently I used users tables for perform student login process
        $login_query = $this->db->get('users');
        $result      = $login_query->result_array();
        if(count($result)){
            // If there is a user, then create session data

            $data = array(
                'id' => $result[0]['id'],
                'username' => $result[0]['username'],
                'validated' => true
            );
            $this->session->set_userdata($data);

            return true;
        }

        //if the previous process is not validate then
        return false;
    }
}
?>