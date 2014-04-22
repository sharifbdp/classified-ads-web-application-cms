<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Area extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 2;

    public function __construct() {
        parent::__construct();
        $this->load->model('Locations');
        $this->load->model('Areas');
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

        $config['base_url'] = base_url() . 'area/index';
        $config['total_rows'] = $this->Areas->total_data();
        $config['per_page'] = 50;

        $this->pagination->initialize($config);

        $data['main_categorys'] = $this->Areas->get_all_data($config['per_page'], $this->uri->segment(3));
        $this->load->view('area/index', $data);
    }

    public function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Area Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('lid', 'Select Location', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('area/add');
        } else {
            $data['name'] = $this->input->post('name', TRUE);
            $data['lid'] = $this->input->post('lid', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $insert = $this->Areas->insert_data($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}' City/Area";
                $this->session->set_flashdata('item_name', $msg);
                redirect('area/index');
            } else {
                $this->load->view('area/add', $data);
            }
        }

        // success add data into database
    }

    public function edit($cid) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Area Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('lid', 'Select Location', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->Areas->get_data_by_id($cid);
            $this->load->view('area/edit', $data);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['lid'] = $this->input->post('lid', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Areas->update_data($data, $cid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}' City/Area";
                $this->session->set_flashdata('item_name', $msg);
                redirect('area/index');
            } else {
                $data['content'] = $this->Areas->get_data_by_id($cid);
                $data['error'] = 'Faild to update';
                $this->load->view('area/edit', $data);
            }
        }
    }

    public function delete($cid) {

        $content = $this->Areas->get_data_by_id($cid);
        $name = $content->name;
        $data['status'] = '13';
        $dels = $this->Areas->update_data($data, $cid);
        if ($dels) {
            $msg = "Successfully Delete '{$name}' City/Area";
            $this->session->set_flashdata('item_name', $msg);
        } else {
            $msg = "Error Delete '{$name}' City/Area";
            $this->session->set_flashdata('error_item_name', $msg);
        }

        redirect('area/index');
    }

    public function active($cid) {

        $data['status'] = '1';
        $content = $this->Areas->get_data_by_id($cid);
        $name = $content->name;
        $update = $this->Areas->update_data($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Active City/Area" . $name . " Succesfully");
            redirect('area/index');
        }
    }

    public function inactive($cid) {

        $data['status'] = '0';
        $content = $this->Areas->get_data_by_id($cid);
        $name = $content->name;
        $update = $this->Areas->update_data($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Inactive City/Area " . $name . " Succesfully");
            redirect('area/index');
        }
    }

}
