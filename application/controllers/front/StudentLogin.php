<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentLogin extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->renderFront('front/studentlogin');
    }

    public function process(){
        //load the login model
        $this->load->model('login_model');

        //validate the user can login
        $result = $this->login_model->validate();

        if(!$result){
            // if user did not validate, then show the login page again
            $this->index();
        }

        //if student did validate then send them to home page
        redirect('home');

    }

}
?>