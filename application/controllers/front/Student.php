<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function update_profile(){
        $this->mViewData['title']=' - Student Profile';
        $this->renderFront('front/student_profile');
    }

}
?>