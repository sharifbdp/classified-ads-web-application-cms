<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 12;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Banners');

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

        $config['base_url'] = base_url() . 'index.php/banner/index';
        $config['total_rows'] = $this->Banners->totalData();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['content'] = $this->Banners->getAllData($config['per_page'], $this->uri->segment(3));

        $this->load->view('banner/index', $data);
    }

    public function add() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Banner Name', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('banner/add');
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['status'] = $this->input->post('status', TRUE);


            $config['upload_path'] = "../uploads/banner/";
            $config['allowed_types'] = "gif|jpg|jpeg|png";

            /*             * * Image Upload Start** */
            if (!empty($_FILES['upload_files']['name'])) {

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('upload_files')) {
                    echo $this->upload->display_error();
                } else {
                    $finfo = $this->upload->data();
                    $this->_createThumbnail($finfo['file_name']);
                    $data['image'] = $finfo['raw_name'] . '_thumb' . $finfo['file_ext'];
                }
            }
            /*             * *  upload end    ** */
            /*             * * Image Upload Start** */
            if (!empty($_FILES['upload_files_2']['name'])) {

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('upload_files_2')) {
                    echo $this->upload->display_error();
                } else {
                    $finfo = $this->upload->data();
                    $this->_createThumbnail($finfo['file_name']);
                    $data['links'] = $finfo['raw_name'] . '_thumb' . $finfo['file_ext'];
                }
            }
            /*             * *  upload end    ** */

            $insert = $this->Banners->insertData($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('banner/index');
            }
        }

        // success add data into database 
    }

    //Create Thumbnail function

    function _createThumbnail($filename) {

        $config['image_library'] = "gd2";
        $config['source_image'] = "../uploads/banner/" . $filename;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = "75";
        $config['height'] = "75";

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }

        $this->image_lib->clear();
    }

    /*
     * 

      public function add() {

      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'Banner Name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('links', 'Banner Links', 'trim|xss_clean');
      $this->form_validation->set_rules('serial', 'Banner Serial', 'trim|required|xss_clean');

      //'required'

      if ($this->form_validation->run() == FALSE) {
      // validation failed
      $this->load->view('banner/add');
      } else {

      $data['name'] = $this->input->post('name', TRUE);
      $data['links'] = $this->input->post('links', TRUE);
      $data['serial'] = $this->input->post('serial', TRUE);
      $data['status'] = $this->input->post('status', TRUE);


      if (!empty($_FILES['upload_files']['name'])) {

      $config['upload_path'] = '../uploads/banner/';
      $config['allowed_types'] = 'gif|jpg|png|jpeg';
      $this->load->library('upload', $config);
      $this->upload->do_upload('upload_files');
      $data_upload_files = $this->upload->data();
      $data['image'] = $data_upload_files['file_name'];
      }



      $insert = $this->Banners->insertData($data);

      if ($insert) {
      $msg = "Successfully Add '{$data['name']}'  ";
      $this->session->set_flashdata('name', $msg);
      redirect('banner/index');
      }
      }

      // success add data into database
      }

     */

    public function edit($infoid) {

        $infoid = trim($infoid);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Banner Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('links', 'Banner Links', 'trim|xss_clean');
        $this->form_validation->set_rules('serial', 'Banner Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $datas['content'] = $this->Banners->getData($infoid);

            $this->load->view('banner/edit', $datas);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['links'] = $this->input->post('links', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            /*             * * Upload Image ** */

            $config['upload_path'] = '../uploads/banner/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            $this->upload->do_upload('upload_files');
            $data_upload_files = $this->upload->data();

            if (!empty($data_upload_files['file_name'])) {
                $data['image'] = $data_upload_files['file_name'];
            }

            /*             * *  upload end    ** */

            $update = $this->Banners->changeData($data, $infoid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('banner/index');
            }
        }

        // success add data into database
    }

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Banners->changeData($data, $did);
        $content = $this->Banners->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Delete    '" . $name . "'  Succesfully");
            redirect('banner/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';

        $change = $this->Banners->changeData($data, $did);


        $content = $this->Banners->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Active  '" . $name . "'  Succesfully");
            redirect('banner/index');
        }
    }

    public function inactive($id) {

        $did = trim($id);
        $data['status'] = '0';

        $change = $this->Banners->changeData($data, $did);


        $content = $this->Banners->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Inactive   '" . $name . "'  Succesfully");
            redirect('banner/index');
        }
    }

}
