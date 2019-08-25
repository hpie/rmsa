<?php

class File_Upload extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    public function getCategory() {
        $query = $this->db->query("SELECT * FROM `rmsa_categories` WHERE category_status = 'A'");
        $data = $query->result_array();        
        if (isset($data) && !empty($data)){          
                return $data;
            }        
        return false;
    }
}
?>