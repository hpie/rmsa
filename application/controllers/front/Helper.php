<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Helper extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Helper_model');
    }

    public function load_tehsil(){
        if($_REQUEST['districtId']){
            $tehsil = $this->Helper_model->load_tehsil($_POST);
            echo json_encode($tehsil);
        }
    }
    public function load_school(){
        if($_REQUEST['subDistrictId']){
            $school = $this->Helper_model->load_school($_POST);
            echo json_encode($school);
        }
    }

}
