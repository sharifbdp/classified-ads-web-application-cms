<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 2;

    public function __construct() {
        parent::__construct();
        $this->load->model('Categorys');
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

        $config['base_url'] = base_url() . 'category/index';
        $config['total_rows'] = $this->Categorys->totalMainCategory();
        $config['per_page'] = 5;

        $this->pagination->initialize($config);

        $data['main_categorys'] = $this->Categorys->getMainCategory($config['per_page'], $this->uri->segment(3));
        $this->load->view('category/index', $data);
    }

    public function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Category Name', 'required|xss_clean');
        $this->form_validation->set_rules('alias', 'Category Alias', 'required|trim|xss_clean|is_unique[category.alias]');
        $this->form_validation->set_rules('parent_id', 'Category Parent/Child', 'required|xss_clean');
        $this->form_validation->set_rules('summary', 'Category summary', 'xss_clean');
        $this->form_validation->set_rules('serial', 'Category Serial', 'required');

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $data['category'] = $this->Categorys->getAllMainCategory();
            $this->load->view('category/add', $data);
        } else {
            $data['name'] = $this->input->post('name', TRUE);
            $data['alias'] = $this->input->post('alias', TRUE);
            $data['parent_id'] = $this->input->post('parent_id', TRUE);
            $data['summary'] = $this->input->post('summary', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $insert = $this->Categorys->insertCategory($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}' Category";
                $this->session->set_flashdata('item_name', $msg);
                redirect('category/index');
            } else {
                $this->load->view('category/add', $data);
            }
        }

        // success add data into database
    }

    public function edit($cid) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Category Name', 'required|xss_clean');
        $this->form_validation->set_rules('alias', 'Product Alias', 'required|trim|xss_clean|callback_validate_slug[' . $cid . ']');
        $this->form_validation->set_rules('parent_id', 'Category Parent/Child', 'required');
        $this->form_validation->set_rules('summary', 'Category summary', 'xss_clean');
        $this->form_validation->set_rules('serial', 'Category Serial', 'required|xss_clean');

        $this->form_validation->set_message('validate_slug', 'This Product Alias is already exist. Please write a unique Alias.');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->Categorys->getCategory($cid);
            $this->load->view('category/edit', $data);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['alias'] = $this->input->post('alias', TRUE);
            $data['parent_id'] = $this->input->post('parent_id', TRUE);
            $data['summary'] = $this->input->post('summary', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Categorys->updateCategory($data, $cid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}' Category";
                $this->session->set_flashdata('item_name', $msg);
                redirect('category/index');
            } else {
                $data['content'] = $this->Categorys->getCategory($cid);
                $data['error'] = 'Faild to update';
                $this->load->view('category/edit', $data);
            }
        }
    }

    public function delete($cid) {

        $content = $this->Categorys->getCategory($cid);
        $name = $content->name;
        $data['status'] = '13';
        $dels = $this->Categorys->updateCategory($data, $cid);
        if ($dels) {
            $msg = "Successfully Delete '{$name}' Category";
            $this->session->set_flashdata('item_name', $msg);
        } else {
            $msg = "Error Delete '{$name}' Category";
            $this->session->set_flashdata('error_item_name', $msg);
        }

        redirect('category/index');
    }

    public function active($cid) {

        $data['status'] = '1';
        $content = $this->Categorys->getCategory($cid);
        $name = $content->name;
        $update = $this->Categorys->updateCategory($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Active Category" . $name . " Succesfully");
            redirect('category/index');
        }
    }

    public function inactive($cid) {

        $data['status'] = '0';
        $content = $this->Categorys->getCategory($cid);
        $name = $content->name;
        $update = $this->Categorys->updateCategory($data, $cid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Inactive Category " . $name . " Succesfully");
            redirect('category/index');
        }
    }

    public function validate_slug($str, $id) {
        $field_value = $str;

        $mine = $this->Categorys->aliasExists($field_value, $id);

        return $mine;
    }

}
