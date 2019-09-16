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

    public function post_review($params){

        $userId  = $_SESSION['st_rmsa_user_id'];
        $fileId  = $params['file_id'];
        $rating  = $params['rating'];
        $comment = trim($params['comment']);

        //check user has already rating for this post or not

        $check = $this->db->query("SELECT * FROM rmsa_file_reviews WHERE rmsa_file_rating IS NOT NULL AND rmsa_user_id = '".$userId."' AND rmsa_uploaded_file_id = '".$fileId."'");

        $check_record = $check->result_array();

        if(count($check_record)<=0){
            $result = $this->db->query("INSERT INTO rmsa_file_reviews(rmsa_user_id,rmsa_uploaded_file_id,rmsa_file_rating,rmsa_review_status)
                           VALUES('".$userId."','".$fileId."','".$rating."',1) ");

           $rmsa_review_id = $this->db->insert_id();


            if(!empty($comment)){
                //add comment for that
                $this->db->query("INSERT INTO rmsa_review_comments(rmsa_review_id,rmsa_review_text)
                                  VALUES('".$rmsa_review_id."','".$comment."')  ");
            }

            if(!$result){
                return Array(
                    'success' => false
                );
            }

            return Array(
                'success' => true
            );
        }
        else{

            $rmsa_review_id = $check_record[0]['rmsa_review_id'];
            //other wise they can only write comment for it.
            if(!empty($comment)){
                //add comment for that
                $this->db->query("INSERT INTO rmsa_review_comments(rmsa_review_id,rmsa_review_text)
                                  VALUES('".$rmsa_review_id."','".$comment."')  ");
            }

            return Array(
                'success' => true
            );

        }



    }
}