<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unauthorized extends CI_Controller {

public function permission(){
       $this->load->view('unauthorized/permission');
}



}

