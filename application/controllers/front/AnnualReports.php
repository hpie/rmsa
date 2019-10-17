<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AnnualReports extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=ANNUAL_REPORTS_TITLE;
        $this->renderFront('front/annualreports');
    }

}
?>