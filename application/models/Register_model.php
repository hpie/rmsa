<?php
    class Register_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function register_student($params){
            $result = $this->db->insert('rmsa_student_users',$params);
            $insert_id = $this->db->insert_id();// get last insert id
            if(!empty($insert_id)){
                return $insert_id;
            }
            return FALSE;
             //it will be return boolean value (true/false)
        }
    }
?>