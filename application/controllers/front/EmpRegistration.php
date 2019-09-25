<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EmpRegistration extends MY_Controller{
    public function __construct(){
        if(isset($_SESSION['st_rmsa_user_id'])){
            redirect(HOME_LINK);
        }
        parent::__construct();
    }
    public function index(){
        $this->mViewData['title']=' - Employee Registration';
        $this->renderFront('front/empregistration');
    }
}

?>