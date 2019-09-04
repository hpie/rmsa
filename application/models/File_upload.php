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
    public function getExistFileId($fileId) {
        $query = $this->db->query("SELECT * FROM `rmsa_uploaded_files` WHERE rmsa_uploaded_file_id = '$fileId' AND uploaded_file_hasvol='YES'");
        $row = $query->row_array();        
        if (isset($row) && !empty($row)){          
                return $row;
            }        
        return false;
    }
}
?>