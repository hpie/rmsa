<?php
    class Register_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function register_student($params){

            $email_exist = $this->db->query("SELECT * FROM rmsa_student_users WHERE rmsa_user_email_id = '".$params['rmsa_user_email_id']."' ");
            $res = $email_exist->row_array();

            if($res){
                return Array(
                    'success' => false,
                    'email_exist' => true
                );
            }
            $result = $this->db->insert('rmsa_student_users',$params);
            $insert_id = $this->db->insert_id();// get last insert id
            if(!empty($insert_id)){

                return Array(
                    'success' => true
                );
//                return $insert_id;
            }
            return FALSE;
             //it will be return boolean value (true/false)
        }
    }
?>