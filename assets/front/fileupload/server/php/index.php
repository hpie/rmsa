<?php
include 'conn.php';
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
class CustomUploadHandler extends UploadHandler {    
    protected function initialize() {         
        $this->db = new mysqli($this->options['db_host'], $this->options['db_user'], $this->options['db_pass'], $this->options['db_name']);                
        parent::initialize();
        $this->db->close();
    }
    protected function handle_form_data($file, $index) {                
        $file->uploaded_file_title = @$_REQUEST['uploaded_file_title'][$index];
        $file->uploaded_file_desc = @$_REQUEST['uploaded_file_desc'][$index];
        $file->uploaded_file_category = @$_REQUEST['uploaded_file_category'][$index];
        $file->uploaded_file_hasvol = @$_REQUEST['uploaded_file_hasvol'][$index];
        $file->rmsa_employee_users_id = @$_REQUEST['rmsa_employee_users_id'][$index]; 
        $file->uploaded_file_tag = @$_REQUEST['uploaded_file_tag'][$index];
        $file->uploaded_file_group = @$_REQUEST['uploaded_file_group'][$index];
        $file->uploaded_file_class = @$_REQUEST['uploaded_file_class'][$index];
        $file->uploaded_file_subject = @$_REQUEST['uploaded_file_subject'][$index];
    }
    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null, $content_range = null) {        
        $file = parent::handle_file_upload($uploaded_file, $name, $size, $type, $error, $index, $content_range);        
        $uploaded_file_title=$file->uploaded_file_title;
        $uploaded_file_type=$file->filetypeext;    
        $uploaded_file_category=$file->uploaded_file_category; 
        $uploaded_file_desc=$file->uploaded_file_desc;                 
        $uploaded_file_path=$file->path;  
        $uploaded_file_hasvol=$file->uploaded_file_hasvol;
        $uploaded_file_tag=$file->uploaded_file_tag;
        $uploaded_file_group=$file->uploaded_file_group;
        $rmsa_employee_users_id=$file->rmsa_employee_users_id;  
        $uploaded_file_class=$file->uploaded_file_class;  
        $uploaded_file_subject=$file->uploaded_file_subject;  
        if (empty($file->error)) {            
        $sql = "INSERT INTO ".$this->options['db_table']." (uploaded_file_title,uploaded_file_type,uploaded_file_group,uploaded_file_category,uploaded_file_desc,uploaded_file_tag,uploaded_file_path,uploaded_file_hasvol,rmsa_employee_users_id,uploaded_file_class,uploaded_file_subject)"
                ." VALUES ('$uploaded_file_title','$uploaded_file_type','$uploaded_file_group','$uploaded_file_category','$uploaded_file_desc','$uploaded_file_tag','$uploaded_file_path','$uploaded_file_hasvol','$rmsa_employee_users_id','$uploaded_file_class','$uploaded_file_subject')";                                               
	        
                $log  = "sql = '$sql' \n".PHP_EOL;               
                file_put_contents('../log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
        
                $query = $this->db->query($sql);
                
                $log  = "sql result for insert query $query".PHP_EOL;               
                file_put_contents('../log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
                
	        $file->id = $this->db->insert_id;                
        }        
        return $file;         
    }

//    protected function set_additional_file_properties($file) {
//        parent::set_additional_file_properties($file);
//        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//            $id=$file->id;
//        	$sql = "SELECT rmsa_uploaded_file_id, uploaded_file_type, uploaded_file_title, uploaded_file_desc FROM "
//        		.$this->options['db_table']." WHERE rmsa_uploaded_file_id='$id'";
//        	$query = $this->db->query($sql);
//	        while ($row = $query->fetch_assoc()) {                    
//	        	$file->id = $row['rmsa_uploaded_file_id'];
//        		$file->type = $row['uploaded_file_type'];
//        		$file->name = $row['uploaded_file_title'];
//        		$file->description = $row['uploaded_file_desc'];
//    		}
//        }
//    }
//    public function delete($print_response = true) {
//        $response = parent::delete(false);
//        foreach ($response as $name => $deleted) {
//            $id=$file->id;
//        	if ($deleted) {
//	        	$sql = "DELETE FROM ".$this->options['db_table']."  WHERE rmsa_uploaded_file_id='$id'";
//	        	$query = $this->db->query($sql);
//	 	        $query->bind_param('s', $file->id);
//		        $query->execute();
//        	}
//        } 
//        return $this->generate_response($response, $print_response);
//    }
}

$upload_handler = new CustomUploadHandler($options);
