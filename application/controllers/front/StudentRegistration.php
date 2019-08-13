<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentRegistration extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){

        $this->load->model('register_model');

        $data = array(
            'distict' => $this->register_model->load_distict()
        );

        $this->renderFront('front/studentregistration',$data);
    }
    public function register(){
        //load the register model
        $this->load->model('register_model');

        $result =  $this->register_model->register_student();

        if($result){
//            TODO
//            register user date to session
            redirect(HOME_LINK);
        }
    }
}
?>