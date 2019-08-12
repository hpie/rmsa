<?php
    class Register_model extends CI_Model{
        function __construct(){
            parent::__construct();
        }

        public function register_student(){
//            TODO
//             Fetch all the information of the student
//            actual schema is require for perfom the student register
            $data = array(
                'username' => $_POST['nickname'],
                'first_name' =>$_POST['name']
            );

            $result = $this->db->insert('users',$data);
            $insert_id = $this->db->insert_id();// get last insert id

            return $result; //it will be return boolean value (true/false)

        }

    }
?>