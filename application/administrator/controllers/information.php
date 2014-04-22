<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Information extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 4;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Mainmenus');
        $this->load->model('Informations');

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

        $config['base_url'] = base_url() . 'index.php/information/index';
        $config['total_rows'] = $this->Informations->totalInformation();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['content'] = $this->Informations->getAllInformation($config['per_page'], $this->uri->segment(3));
        $this->load->view('information/index', $data);
    }

    public function add() {

        $this->load->library('form_validation');

        /** this is for ckeditor and ckfinder * */
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');

        //configure base path of ckeditor folder
        $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        $this->ckeditor->config['toolbar'] = 'Full';
        $this->ckeditor->config['language'] = 'en';
        //configure ckfinder with ckeditor config
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../../asset/ckfinder/');

        /** this is for ckeditor and ckfinder * */
        $this->form_validation->set_rules('mid', 'Main Menu', 'required');
        $this->form_validation->set_rules('head_line', 'Inforamtion Head Line', 'trim|required|xss_clean');
        $this->form_validation->set_rules('details', 'Information Details', '');
        $this->form_validation->set_rules('summary', 'Information Summary', 'required');
        $this->form_validation->set_rules('status', 'Inforamtion Status', 'required');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $data['allmainmenu'] = $this->Mainmenus->getAllMainMenuForInfo();
            $this->load->view('information/add', $data);
        } else {
            $data['mid'] = $this->input->post('mid');
            $data['head_line'] = $this->input->post('head_line', TRUE);
            $data['details'] = $this->input->post('details');
            $data['summary'] = $this->input->post('summary');
            $data['status'] = $this->input->post('status');

            $data['last_action_date'] = date('Y-m-d h:i:s');
            $data['last_action_user'] = $this->session->userdata('uid');

            $insert = $this->Informations->insertInformation($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['head_line']}' Information ";
                $this->session->set_flashdata('name', $msg);
                redirect('information/index');
            } else {
                $data['allmainmenu'] = $this->Mainmenus->getInformationMenu();
                $this->load->view('information/add', $data);
            }
        }

        // success add data into database 
    }

    public function edit($infoid) {

        $infoid = trim($infoid);

        $this->load->library('form_validation');

        /** this is for ckeditor and ckfinder * */
        $this->load->library('ckeditor');
        $this->load->library('ckfinder');

        //configure base path of ckeditor folder
        $this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
        $this->ckeditor->config['toolbar'] = 'Full';
        $this->ckeditor->config['language'] = 'en';
        //configure ckfinder with ckeditor config
        $this->ckfinder->SetupCKEditor($this->ckeditor, '../../../asset/ckfinder/');

        /** this is for ckeditor and ckfinder * */
        $this->form_validation->set_rules('mid', 'Main Menu', 'required');
        $this->form_validation->set_rules('head_line', 'Inforamtion Head Line', 'trim|required|xss_clean');
        $this->form_validation->set_rules('details', 'Information Details', '');
        $this->form_validation->set_rules('summary', 'Information Summary', 'required');
        $this->form_validation->set_rules('status', 'Inforamtion Status', 'required');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $data['allmainmenu'] = $this->Mainmenus->getAllMainMenuForInfo();
            $data['content'] = $this->Informations->getInformation($infoid);
            $this->load->view('information/edit', $data);
        } else {
            $data['mid'] = $this->input->post('mid');
            $data['head_line'] = $this->input->post('head_line', TRUE);
            $data['details'] = $this->input->post('details');
            $data['summary'] = $this->input->post('summary');
            $data['status'] = $this->input->post('status');

            $update = $this->Informations->changeInfo($data, $infoid);

            if ($update) {
                $msg = "Successfully Edit '{$data['head_line']}' Information ";
                $this->session->set_flashdata('name', $msg);
                redirect('information/index');
            } else {
                $data['allmainmenu'] = $this->Mainmenus->getInformationMenu();
                $data['content'] = $this->Informations->getInformation($infoid);
                $this->load->view('information/edit', $data);
            }
        }

        // success add data into database
    }

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Informations->changeInfo($data, $did);
        $content = $this->Informations->getInformation($did);
        $name = $content->head_line;
        if ($change) {

            $this->session->set_flashdata("name", "Delete Information  '" . $name . "'  Succesfully");
            redirect('information/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';

        $change = $this->Informations->changeInfo($data, $did);


        $content = $this->Informations->getInformation($did);
        $name = $content->head_line;
        if ($change) {

            $this->session->set_flashdata("name", "Active Information  '" . $name . "'  Succesfully");
            redirect('information/index');
        }
    }

    public function inactive($id) {

        $did = trim($id);
        $data['status'] = '0';

        $change = $this->Informations->changeInfo($data, $did);


        $content = $this->Informations->getInformation($did);
        $name = $content->head_line;
        if ($change) {

            $this->session->set_flashdata("name", "Inactive Information  '" . $name . "'  Succesfully");
            redirect('information/index');
        }
    }

}
