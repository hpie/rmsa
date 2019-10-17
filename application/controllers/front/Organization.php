<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=ORGANIZATION_TITLE;
        $this->renderFront('front/organization');
    }

}
?>