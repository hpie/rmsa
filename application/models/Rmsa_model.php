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
    public function register_employee($params){

        $email_exist = $this->db->query("SELECT * FROM rmsa_employee_users WHERE rmsa_user_email_id = '".$params['rmsa_user_email_id']."' ");
        $res = $email_exist->row_array();

        if($res){
            return Array(
                'success' => false,
                'email_exist' => true
            );
        }

        $params['rmsa_user_email_password'] = md5($params['rmsa_user_email_password']);
        unset($params['rmsa_user_confirm_password']);
        unset($params['g-recaptcha-response']);

        if(isset($_SESSION['rm_rmsa_user_id'])){
            $params['created_by'] = $_SESSION['rm_rmsa_user_id'];                      
        }
        else{
            unset($params['created_by']);
        }
        
        $result = $this->db->insert('rmsa_employee_users',$params);
        $insert_id = $this->db->insert_id();// get last insert id
        if(!empty($insert_id)){

            return Array(
                'success' => true,
                'email_exist' => false,
                'email' => $params['rmsa_user_email_id'],
            );
//                return $insert_id;
        }
        return FALSE;
        //it will be return boolean value (true/false)
    }
}