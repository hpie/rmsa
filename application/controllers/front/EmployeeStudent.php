<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeeStudent extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->mViewData['title']=' - EmployeeStudent';
        $this->renderFront('front/employee_student');
    }
}

?>