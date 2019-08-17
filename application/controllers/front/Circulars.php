<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circulars extends MY_Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=' - Circulars';
        $this->renderFront('front/circular');
    }

}
?>