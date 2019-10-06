<?php
class Employee_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }

    public function approve_student($rmsa_user_id){
        $query_res = $this->db->query("UPDATE  rmsa_student_users SET rmsa_user_status = 'ACTIVE' WHERE rmsa_user_id='{$rmsa_user_id}'");
        if($query_res){
            return true;
        }

    }
}