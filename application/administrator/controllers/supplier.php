<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 12;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Suppliers');

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

        $config['base_url'] = base_url() . 'index.php/supplier/index';
        $config['total_rows'] = $this->Suppliers->totalData();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['content'] = $this->Suppliers->getAllData($config['per_page'], $this->uri->segment(3));

        $this->load->view('supplier/index', $data);
    }

    public function add() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Supplier Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('serial', 'Supplier Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('supplier/add');
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            if (!empty($_FILES['upload_files']['name'])) {

                $config['upload_path'] = '../uploads/supplier_slider/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $this->load->library('upload', $config);
                $this->upload->do_upload('upload_files');
                $data_upload_files = $this->upload->data();
                $data['image'] = $data_upload_files['file_name'];
            }

            $insert = $this->Suppliers->insertData($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('supplier/index');
            }
        }

        // success add data into database
    }

    public function edit($infoid) {

        $infoid = trim($infoid);

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Supplier Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('serial', 'Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $datas['content'] = $this->Suppliers->getData($infoid);
            $this->load->view('supplier/edit', $datas);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            /*             * * Upload Image ** */

            $config['upload_path'] = '../uploads/supplier_slider/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            $this->upload->do_upload('upload_files');
            $data_upload_files = $this->upload->data();

            if (!empty($data_upload_files['file_name'])) {
                $data['image'] = $data_upload_files['file_name'];
            }

            /*             * *  upload end    ** */

            $update = $this->Suppliers->changeData($data, $infoid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}'";
                $this->session->set_flashdata('name', $msg);
                redirect('supplier/index');
            }
        }

        // success add data into database
    }

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Suppliers->changeData($data, $did);
        $content = $this->Suppliers->getData($did);
        $name = $content->name;
        if ($change) {
            $this->session->set_flashdata("name", "Delete '" . $name . "' Succesfully");
            redirect('supplier/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';
        $change = $this->Suppliers->changeData($data, $did);
        $content = $this->Suppliers->getData($did);
        $name = $content->name;
        if ($change) {
            $this->session->set_flashdata("name", "Active  '" . $name . "'  Succesfully");
            redirect('supplier/index');
        }
    }

    public function inactive($id) {
        $did = trim($id);
        $data['status'] = '0';
        $change = $this->Suppliers->changeData($data, $did);
        $content = $this->Suppliers->getData($did);
        $name = $content->name;
        if ($change) {
            $this->session->set_flashdata("name", "Inactive '" . $name . "' Succesfully");
            redirect('supplier/index');
        }
    }

    public function delete_images() {
        $id = trim($this->input->post('id'));
        $content = $this->Suppliers->getData($id);

        $delete = unlink(realpath("../uploads/supplier_slider/" . $content->image));
        $data['image'] = "";

        if ($delete) {
            $this->Suppliers->changeData($data, $id);
            echo json_encode(array('status' => 'OK'));
        } else {
            return FALSE;
        }
    }

}
