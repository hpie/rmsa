<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=' - Organization';
        $this->renderFront('front/organization');
    }

}
?>