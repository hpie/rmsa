<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisteredStudents  extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->viewFront('front/registeredstudents');
    }
}
?>