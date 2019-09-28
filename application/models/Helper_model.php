<?php
class Helper_model extends CI_Model
{
    function __construct(){
        parent::__construct();
    }

    public function load_distict(){
        $distict = $this->db->query("SELECT * FROM rmsa_districts WHERE rmsa_district_status='ACTIVE'");
        return $distict->result_array();
    }
    public function load_tehsil($params){
        $districtId = $params['districtId'];
        $tehsil = $this->db->query("SELECT * FROM rmsa_sub_districts WHERE rmsa_district_id = {$districtId} AND rmsa_sub_district_status = 'ACTIVE'");
        return $tehsil->result_array();
    }
    public function load_school($params){

        $subDistrictId = $params['subDistrictId'];
        $school = $this->db->query("SELECT * FROM rmsa_schools WHERE rmsa_sub_district_id = {$subDistrictId} AND rmsa_school_status = 'ACTIVE'");
        return $school->result_array();
    }
}