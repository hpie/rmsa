<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentRegistration extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->load->viewFront('front/studentregistration');
    }

}
?>