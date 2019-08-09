<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->renderFront('front/studentlogin');
    }

}
?>