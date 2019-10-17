<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circulars extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=CIRCULARS_TITLE;
        $this->renderFront('front/circular');
    }

}
?>