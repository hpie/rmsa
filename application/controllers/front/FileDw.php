<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FileDw extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->mViewData['title']=' - FileDw';
        $this->renderFront('front/filedw');
    }
}

?>