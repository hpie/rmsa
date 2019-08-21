<?php
$options = array(
    'delete_type' => 'POST',
    'db_host' => 'localhost',
    'db_user' => 'root',
    'db_pass' => '',
    'db_name' => 'rmsa',
    'db_table' => 'rmsa_uploaded_files'
);
error_reporting(E_ALL | E_STRICT);
require('UploadHandler.php');
class CustomUploadHandler extends UploadHandler {
    protected function initialize() {
    	$this->db = new mysqli(
    		$this->options['db_host'],
    		$this->options['db_user'],
    		$this->options['db_pass'],
    		$this->options['db_name']
    	);
        parent::initialize();
        $this->db->close();
    }
    protected function handle_form_data($file, $index) {
    	$file->title = @$_REQUEST['title'][$index];
    	$file->description = @$_REQUEST['description'][$index];
    }
    protected function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null, $content_range = null) {            
        $file = parent::handle_file_upload($uploaded_file, $name, $size, $type, $error, $index, $content_range); 
        $filetype=$file->type;
        $filename=$file->name;
        $description=$file->description;
        $filepath=$file->path;
        
        if (empty($file->error)) {
		$sql = "INSERT INTO `".$this->options['db_table']."` (`uploaded_file_type`, `uploaded_file_title`, `uploaded_file_desc`,`uploaded_file_path`)"." VALUES ('$filetype','$filename','$description','$filepath')";                   
	        $query = $this->db->query($sql);                
	        $file->id = $this->db->insert_id;                  
        }
        return $file;
    }
//    protected function set_additional_file_properties($file) {
//        parent::set_additional_file_properties($file);
//        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
//            $id=$file->id;
//        	$sql = "SELECT `rmsa_uploaded_file_id`, `uploaded_file_type`, `uploaded_file_title`, `uploaded_file_desc` FROM `"
//        		.$this->options['db_table']."` WHERE `rmsa_uploaded_file_id`='$id'";
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
//	        	$sql = "DELETE FROM `".$this->options['db_table']."`  WHERE `rmsa_uploaded_file_id`='$id'";
//	        	$query = $this->db->query($sql);
//	 	        $query->bind_param('s', $file->id);
//		        $query->execute();
//        	}
//        } 
//        return $this->generate_response($response, $print_response);
//    }
}
$upload_handler = new CustomUploadHandler($options);
