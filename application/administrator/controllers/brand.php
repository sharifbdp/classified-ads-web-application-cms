<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Brand extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 2;

    public function __construct() {
        parent::__construct();
        $this->load->model('Categorys');
        $this->load->model('Ads');
        $this->load->model('Brands');
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

        $config['base_url'] = base_url() . 'brand/index';
        $config['total_rows'] = $this->Brands->total_data();
        $config['per_page'] = 50;

        $this->pagination->initialize($config);

        $data['main_categorys'] = $this->Brands->get_all_data($config['per_page'], $this->uri->segment(3));
        $this->load->view('brand/index', $data);
    }

    public function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Brand Name', 'required|xss_clean');
        $this->form_validation->set_rules('cid', 'Brand Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('brand/add');
        } else {
            $data['name'] = $this->input->post('name', TRUE);
            $data['cid'] = $this->input->post('cid', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $insert = $this->Brands->insert_data($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}' Brand";
                $this->session->set_flashdata('item_name', $msg);
                redirect('brand/index');
            } else {
                $this->load->view('brand/add', $data);
            }
        }

        // success add data into database
    }

    public function edit($cid) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Brand Name', 'required|xss_clean');
        $this->form_validation->set_rules('cid', 'Brand Category', 'required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->Brands->get_data_by_id($cid);
            $this->load->view('brand/edit', $data);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['cid'] = $this->input->post('cid', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Brands->update_data($data, $cid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}' Brand";
                $this->session->set_flashdata('item_name', $msg);
                redirect('brand/index');
            } else {
                $data['content'] = $this->Brands->get_data_by_id($cid);
                $data['error'] = 'Faild to update';
                $this->load->view('brand/edit', $data);
            }
        }
    }

    public function delete($cid) {

        $content = $this->Brands->get_data_by_id($cid);
        $name = $content->name;
        $data['status'] = '13';
        $dels = $this->Brands->update_data($data, $cid);
        if ($dels) {
            $msg = "Successfully Delete '{$name}' Brand";
            $this->session->set_flashdata('item_name', $msg);
        } else {
            $msg = "Error Delete '{$name}' Brand";
            $this->session->set_flashdata('error_item_name', $msg);
        }

        redirect('brand/index');
    }

    public function active($cid) {

        $data['status'] = '1';
        $content = $this->Brands->get_data_by_id($cid);
        $name = $content->name;
        $update = $this->Brands->update_data($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Active Brand" . $name . " Succesfully");
            redirect('brand/index');
        }
    }

    public function inactive($cid) {

        $data['status'] = '0';
        $content = $this->Brands->get_data_by_id($cid);
        $name = $content->name;
        $update = $this->Brands->update_data($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Inactive Brand " . $name . " Succesfully");
            redirect('brand/index');
        }
    }

}
