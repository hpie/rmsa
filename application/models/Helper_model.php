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

    public function display_review($file_id){
        $comments = $this->db->query("SELECT fr.*,CONCAT(su.rmsa_user_first_name,' ',su.rmsa_user_last_name) AS username
                                      FROM rmsa_file_reviews fr
                                      INNER JOIN rmsa_student_users su ON su.rmsa_user_id = fr.rmsa_user_id
                                      WHERE fr.rmsa_uploaded_file_id = '".$file_id."'
                                      ORDER BY fr.rmsa_review_id DESC");

        return $comments->result_array();

    }

    public function get_comments($file_id){
        $comments = $this->db->query("SELECT * FROM  rmsa_review_comments WHERE rmsa_uploaded_file_id = '".$file_id."' AND comment_type = 1");
        return $comments->result_array();
    }

    public function get_file_title($fileId){
        $title = $this->db->query("SELECT uploaded_file_title FROM  rmsa_uploaded_files WHERE rmsa_uploaded_file_id = '".$fileId."'");
        return $title->result_array();
    }

    public function get_file_avg_rating($fileId){
        $avg_rating = $this->db->query("SELECT AVG(rmsa_file_rating) as overall_rating
                                           FROM rmsa_file_reviews
                                           WHERE rmsa_uploaded_file_id = '{$fileId}'
                                           AND rmsa_review_status = 1 GROUP BY rmsa_uploaded_file_id");
        $avg = $avg_rating->result_array();

        return current($avg);
    }

}