<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class News extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 12;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Newss');

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

        $config['base_url'] = base_url() . 'index.php/news/index';
        $config['total_rows'] = $this->Newss->totalData();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['content'] = $this->Newss->getAllData($config['per_page'], $this->uri->segment(3));

        $this->load->view('news/index', $data);
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
        $this->form_validation->set_rules('head_line', 'News Head Line', 'trim|required|xss_clean');
        $this->form_validation->set_rules('details', 'News Details', 'trim|xss_clean');
        $this->form_validation->set_rules('serial', 'News Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('news/add');
        } else {

            $data['head_line'] = $this->input->post('head_line', TRUE);
            $data['details'] = $this->input->post('details');
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $insert = $this->Newss->insertData($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['head_line']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('news/index');
            }
        }

        // success add data into database 
    }

    public function edit($infoid) {

        $infoid = trim($infoid);

        $this->load->library('form_validation');

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
        $this->form_validation->set_rules('head_line', 'News Head Line', 'trim|required|xss_clean');
        $this->form_validation->set_rules('details', 'News Details', 'trim|xss_clean');
        $this->form_validation->set_rules('serial', 'News Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $datas['content'] = $this->Newss->getData($infoid);

            $this->load->view('news/edit', $datas);
        } else {

            $data['head_line'] = $this->input->post('head_line', TRUE);
            $data['details'] = $this->input->post('details', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Newss->changeData($data, $infoid);

            if ($update) {
                $msg = "Successfully Edit '{$data['head_line']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('news/index');
            }
        }

        // success add data into database
    }

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Newss->changeData($data, $did);
        $content = $this->Newss->getData($did);
        $name = $content->head_line;
        if ($change) {

            $this->session->set_flashdata("name", "Delete    '" . $name . "'  Succesfully");
            redirect('news/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';

        $change = $this->Newss->changeData($data, $did);


        $content = $this->Newss->getData($did);
        $name = $content->head_line;
        if ($change) {

            $this->session->set_flashdata("name", "Active  '" . $name . "'  Succesfully");
            redirect('news/index');
        }
    }

    public function inactive($id) {

        $did = trim($id);
        $data['status'] = '0';

        $change = $this->Newss->changeData($data, $did);


        $content = $this->Newss->getData($did);
        $name = $content->head_line;
        if ($change) {

            $this->session->set_flashdata("name", "Inactive   '" . $name . "'  Succesfully");
            redirect('news/index');
        }
    }

}
