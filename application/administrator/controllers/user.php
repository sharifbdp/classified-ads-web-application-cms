<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 17;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Users');

        /*         * * check user status ** */
        $uid = $this->session->userdata('uid');
        $this->poweruser = $this->Userauth->powerUser($uid);

        /*         * * end check user status ** */
        
        // this is check module permission
        $this->modpermit = $this->Userauth->modulePermission($uid, $this->modid);
        

        if (!$this->session->userdata('admin_logged')) {
            redirect('login/index');
        }

        if (!$this->poweruser) {
            if (!$this->modpermit) {
                redirect('unauthorized/permission');
                //echo $this->modpermit;
            }
        }
    }

    public function index() {
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/user/index';
        $config['total_rows'] = $this->Users->totalUser();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['poweruser'] = $this->poweruser;

        $data['all_user'] = $this->Users->getAllUser($config['per_page'], $this->uri->segment(3));

        $this->load->view('user/index', $data);
    }

    public function edit($lid) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'User Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'Login ID/Email', 'trim|required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|trim|matches[password]');

        if ($this->form_validation->run() == FALSE) {

            $data['content'] = $this->Users->viewUser($lid);

            $this->load->view('user/edit', $data);
        } else {

            $data['name'] = $this->input->post('name');
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $data['last_login_date'] = date('Y-m-d H:i:s');

            // Update data into user table

            $update = $this->Users->updateData($lid, $data);

            if ($update) {

                $this->session->set_flashdata("name", "Edit admin user " . "'{$data['name']}'" . " Succesfully. Now you can login with the new login ID and Password");

                redirect('user/index');
            }
        }
    }

}