<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ad extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 12;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Ads');
        $this->load->model('Categorys');

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

        $config['base_url'] = base_url() . 'index.php/ad/index';
        $config['total_rows'] = $this->Ads->totalData();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['content'] = $this->Ads->getAllData($config['per_page'], $this->uri->segment(3));

        $this->load->view('ad/index', $data);
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
        $this->form_validation->set_rules('name', 'Ad Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alias', 'Ad Alias', 'required|trim|is_unique[our_products.alias]');
        $this->form_validation->set_rules('cid', 'Ad Category', 'required|trim');
        $this->form_validation->set_rules('price', 'Ad Price', 'required|trim');
        $this->form_validation->set_rules('b_price', 'Blouse Price', 'required|trim');
        $this->form_validation->set_rules('p_code', 'Ad Code', 'required|trim');
        $this->form_validation->set_rules('custom_link', 'Custom link', 'trim|xss_clean');
        $this->form_validation->set_rules('serial', 'Ad Serial', 'trim|required|xss_clean');
        $this->form_validation->set_rules('summary', 'Ad Summary', 'required');
        $this->form_validation->set_rules('details', 'Ad Details', '');

        $this->form_validation->set_message('is_unique', 'This Ad Alias is already exist. Please write a unique Alias.');
        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('ad/add');
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['alias'] = $this->input->post('alias', TRUE);
            $data['cid'] = $this->input->post('cid', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['b_price'] = $this->input->post('b_price', TRUE);
            $data['p_code'] = $this->input->post('p_code', TRUE);
            $data['custom_link'] = $this->input->post('custom_link', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['summary'] = $this->input->post('summary');
            $data['details'] = $this->input->post('details');
            $data['show_home'] = $this->input->post('show_home', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            /*             * * Image Upload Start ** */

            if (!empty($_FILES['upload_files']['name'])) {

                $config['upload_path'] = '../uploads/ad/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';

                $this->load->library('upload', $config);

                $this->upload->do_upload('upload_files');
                $data_upload_files = $this->upload->data();
                $data['image'] = $data_upload_files['file_name'];

                // create resized image
                $config = array();
                $config['source_image'] = $data_upload_files['full_path'];
                $config['new_image'] = '../uploads/ad/thumbs/' . $data_upload_files['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = true;
                $config['width'] = 314;
                $config['height'] = 454;

                $this->load->library('image_lib', $config);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors('<p>', '</p>');
                }
            }
            /*             * *  upload end    ** */

            $insert = $this->Ads->insertData($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('ad/index');
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
        $this->form_validation->set_rules('name', 'Ad Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('alias', 'Ad Alias', 'required|trim|callback_validate_slug[' . $infoid . ']');
        $this->form_validation->set_rules('cid', 'Ad Category', 'required|trim');
        $this->form_validation->set_rules('price', 'Ad Price', 'required|trim');
        $this->form_validation->set_rules('b_price', 'Blouse Price', 'required|trim');
        $this->form_validation->set_rules('p_code', 'Ad Code', 'required|trim');
        $this->form_validation->set_rules('custom_link', 'Custom link', 'trim|xss_clean');
        $this->form_validation->set_rules('serial', 'Ad Serial', 'trim|required|xss_clean');
        $this->form_validation->set_rules('summary', 'Ad Summary', 'required');
        $this->form_validation->set_rules('details', 'Ad Details', '');

        $this->form_validation->set_message('validate_slug', 'This Ad Alias is already exist. Please write a unique Alias.');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $datas['content'] = $this->Ads->getData($infoid);

            $this->load->view('ad/edit', $datas);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['alias'] = $this->input->post('alias', TRUE);
            $data['cid'] = $this->input->post('cid', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['b_price'] = $this->input->post('b_price', TRUE);
            $data['p_code'] = $this->input->post('p_code', TRUE);
            $data['custom_link'] = $this->input->post('custom_link', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['summary'] = $this->input->post('summary');
            $data['details'] = $this->input->post('details');
            $data['show_home'] = $this->input->post('show_home', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            /*             * ** Image Upload Start *** */

            $config['upload_path'] = '../uploads/ad/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            $this->upload->do_upload('upload_files');
            $data_upload_files = $this->upload->data();
            if (!empty($data_upload_files['file_name'])) {
                $data['image'] = $data_upload_files['file_name'];

                // create resized image
                $config = array();
                $config['source_image'] = $data_upload_files['full_path'];
                $config['new_image'] = '../uploads/ad/thumbs/' . $data_upload_files['file_name'];
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = true;
                $config['width'] = 314;
                $config['height'] = 454;

                $this->load->library('image_lib', $config);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors('<p>', '</p>');
                }
            }
            /*             * *  upload end    ** */

            $update = $this->Ads->changeData($data, $infoid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('ad/index');
            }
        }

        // success add data into database
    }

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Ads->changeData($data, $did);
        $content = $this->Ads->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Delete '" . $name . "'  Succesfully");
            redirect('ad/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';

        $change = $this->Ads->changeData($data, $did);

        $content = $this->Ads->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Active  '" . $name . "'  Succesfully");
            redirect('ad/index');
        }
    }

    public function inactive($id) {

        $did = trim($id);
        $data['status'] = '0';

        $change = $this->Ads->changeData($data, $did);

        $content = $this->Ads->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Inactive   '" . $name . "'  Succesfully");
            redirect('ad/index');
        }
    }

    public function validate_slug($str, $id) {
        $field_value = $str;

        $mine = $this->Ads->aliasExists($field_value, $id);

        return $mine;
    }

}
