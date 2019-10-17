<?php
class Rmsa_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function approve_student($params){
        $query_res = $this->db->query("UPDATE  rmsa_coordinators SET rmsa_user_status = '{$params['user_status']}'
                                       WHERE rmsa_user_id='{$params['rmsa_user_id']}'");
        if($query_res){
            return true;
        }

    }
}