<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 2;

    public function __construct() {
        parent::__construct();
        $this->load->model('Locations');
        $this->load->helper('form');
        $this->load->model('Userauth');

        /** check user status * */
        $uid = $this->session->userdata('uid');
        $this->poweruser = $this->Userauth->powerUser($uid);

        /** end check user status * */
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

        $config['base_url'] = base_url() . 'location/index';
        $config['total_rows'] = $this->Locations->total_data();
        $config['per_page'] = 50;

        $this->pagination->initialize($config);

        $data['main_categorys'] = $this->Locations->get_all_data($config['per_page'], $this->uri->segment(3));
        $this->load->view('location/index', $data);
    }

    public function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Location Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('location/add');
        } else {
            $data['name'] = $this->input->post('name', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $insert = $this->Locations->insert_data($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}' Location";
                $this->session->set_flashdata('item_name', $msg);
                redirect('location/index');
            } else {
                $this->load->view('location/add', $data);
            }
        }

        // success add data into database
    }

    public function edit($cid) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Location Name', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->Locations->get_data_by_id($cid);
            $this->load->view('location/edit', $data);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Locations->update_data($data, $cid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}' Location";
                $this->session->set_flashdata('item_name', $msg);
                redirect('location/index');
            } else {
                $data['content'] = $this->Locations->get_data_by_id($cid);
                $data['error'] = 'Faild to update';
                $this->load->view('location/edit', $data);
            }
        }
    }

    public function delete($cid) {

        $content = $this->Locations->get_data_by_id($cid);
        $name = $content->name;
        $data['status'] = '13';
        $dels = $this->Locations->update_data($data, $cid);
        if ($dels) {
            $msg = "Successfully Delete '{$name}' Location";
            $this->session->set_flashdata('item_name', $msg);
        } else {
            $msg = "Error Delete '{$name}' Location";
            $this->session->set_flashdata('error_item_name', $msg);
        }

        redirect('location/index');
    }

    public function active($cid) {

        $data['status'] = '1';
        $content = $this->Locations->get_data_by_id($cid);
        $name = $content->name;
        $update = $this->Locations->update_data($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Active Location" . $name . " Succesfully");
            redirect('location/index');
        }
    }

    public function inactive($cid) {

        $data['status'] = '0';
        $content = $this->Locations->get_data_by_id($cid);
        $name = $content->name;
        $update = $this->Locations->update_data($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Inactive Location " . $name . " Succesfully");
            redirect('location/index');
        }
    }

}
