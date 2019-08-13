<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->renderFront('front/file_upload');
    }
}
?>