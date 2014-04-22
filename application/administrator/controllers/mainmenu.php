<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mainmenu extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 1;

    public function __construct() {
        parent::__construct();
        $this->load->model('Mainmenus');
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

        $config['base_url'] = base_url() . 'index.php/mainmenu/index';
        $config['total_rows'] = $this->Mainmenus->totalMainMenu();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['main_menus'] = $this->Mainmenus->getMainMenu($config['per_page'], $this->uri->segment(3));
        $this->load->view('mainmenu/index', $data);
    }

    public function add() {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Menu Name', 'xss_clean|required');
        $this->form_validation->set_rules('m_alias', 'Menu Alias', 'required|trim|alpha_dash|is_unique[main_menu.m_alias]');
        $this->form_validation->set_rules('serial', 'Menu Serial', 'xss_clean|required');
        $this->form_validation->set_rules('page_title', 'Page Title', 'xss_clean');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'xss_clean');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'xss_clean');

        $this->form_validation->set_message('is_unique', 'This Menu Alias is already exist. Please write a unique Alias.');

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $data['page_template'] = $this->Mainmenus->getAllPageTemplate();
            $this->load->view('mainmenu/add', $data);
        } else {
            $data['name'] = $this->input->post('name', TRUE);
            $data['m_alias'] = $this->input->post('m_alias', TRUE);
            $data['page_template'] = $this->input->post('page_template');
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['page_title'] = $this->input->post('page_title', TRUE);
            $data['meta_keywords'] = $this->input->post('meta_keywords', TRUE);
            $data['meta_description'] = $this->input->post('meta_description', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $data['last_action_date'] = date('Y-m-d H:i:s');
            $data['last_action_user'] = $this->session->userdata('uid');

            $insert = $this->Mainmenus->insertMenu($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}' Main Menu";
                $this->session->set_flashdata('item_name', $msg);
                redirect('mainmenu/index');
            } else {
                $data['page_template'] = $this->Mainmenus->getAllPageTemplate();
                $this->load->view('mainmenu/add', $data);
            }
        }

        // success add data into database
    }

    public function edit($mid) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Menu Name', 'xss_clean|required');
        $this->form_validation->set_rules('m_alias', 'Menu Alias', 'required|trim|alpha_dash|callback_validate_slug[' . $mid . ']');
        $this->form_validation->set_rules('serial', 'Menu Serial', 'xss_clean|required');
        $this->form_validation->set_rules('page_title', 'Page Title', 'xss_clean');
        $this->form_validation->set_rules('meta_keywords', 'Meta Keywords', 'xss_clean');
        $this->form_validation->set_rules('meta_description', 'Meta Description', 'xss_clean');

        $this->form_validation->set_message('validate_slug', 'This Menu Alias is already exist. Please write a unique Alias.');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->Mainmenus->getMenu($mid);
            $data['page_template'] = $this->Mainmenus->getAllPageTemplate();
            $this->load->view('mainmenu/edit', $data);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['m_alias'] = $this->input->post('m_alias', TRUE);
            $data['page_template'] = $this->input->post('page_template');
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['page_title'] = $this->input->post('page_title', TRUE);
            $data['meta_keywords'] = $this->input->post('meta_keywords', TRUE);
            $data['meta_description'] = $this->input->post('meta_description', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Mainmenus->updateMenu($data, $mid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}' Main Menu";
                $this->session->set_flashdata('item_name', $msg);
                redirect('mainmenu/index');
            } else {
                $data['content'] = $this->Mainmenus->getMenu($mid);
                $data['page_template'] = $this->Mainmenus->getAllPageTemplate();
                $data['error'] = 'Faild to update';
                $this->load->view('mainmenu/edit', $data);
            }
        }
    }

    public function delete($mid) {

        $content = $this->Mainmenus->getMenu($mid);
        $name = $content->name;
        $data['status'] = '13';
        $dels = $this->Mainmenus->updateMenu($data, $mid);
        if ($dels) {
            $msg = "Successfully Delete '{$name}' Main Menu";
            $this->session->set_flashdata('item_name', $msg);
        } else {
            $msg = "Error Delete '{$name}' Menu";
            $this->session->set_flashdata('error_item_name', $msg);
        }

        redirect('mainmenu/index');
    }

    public function active($mid) {

        $data['status'] = '1';
        $content = $this->Mainmenus->getMenu($mid);
        $name = $content->name;
        $update = $this->Mainmenus->updateMenu($data, $mid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Active Menu " . $name . " Succesfully");
            redirect('mainmenu/index');
        }
    }

    public function inactive($mid) {

        $data['status'] = '0';
        $content = $this->Mainmenus->getMenu($mid);
        $name = $content->name;
        $update = $this->Mainmenus->updateMenu($data, $mid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Inactive Menu " . $name . " Succesfully");
            redirect('mainmenu/index');
        }
    }

    public function validate_slug($str, $id) {
        $field_value = $str;
        $mine = $this->Mainmenus->aliasExists($field_value, $id);
        return $mine;
    }

}
