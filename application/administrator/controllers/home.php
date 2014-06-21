<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');

        if (!$this->session->userdata('admin_logged')) {
            redirect('login/index');
        }
    }

    public function index() {

        /*         * * check user status ** */

        $uid = $this->session->userdata('uid');
        $data['poweruser'] = $this->Userauth->powerUser($uid);

        /*         * * end check user status ** */

        $this->load->model('Users');

        $this->load->view('home/adminhome', $data);
    }

}