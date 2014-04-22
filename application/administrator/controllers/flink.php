<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Flink extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 12;

    public function __construct() {
        parent::__construct();

        $this->load->model('Userauth');
        $this->load->model('Flinks');

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

        $config['base_url'] = base_url() . 'index.php/flink/index';
        $config['total_rows'] = $this->Flinks->totalData();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);

        $data['content'] = $this->Flinks->getAllData($config['per_page'], $this->uri->segment(3));

        $this->load->view('flink/index', $data);
    }

    public function add() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Flink Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('links', 'Links', 'trim|required|xss_clean');
        $this->form_validation->set_rules('position', 'Flink Position', 'trim|required');
        $this->form_validation->set_rules('serial', 'Flink Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $this->load->view('flink/add');
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['links'] = $this->input->post('links', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['position'] = $this->input->post('position', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $insert = $this->Flinks->insertData($data);

            if ($insert) {
                $msg = "Successfully Add '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('flink/index');
            }
        }

        // success add data into database 
    }

    public function edit($infoid) {

        $infoid = trim($infoid);
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Flink Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('links', 'Links', 'trim|required|xss_clean');
        $this->form_validation->set_rules('position', 'Flink Position', 'trim|required');
        $this->form_validation->set_rules('serial', 'Flink Serial', 'trim|required|xss_clean');

        //'required'

        if ($this->form_validation->run() == FALSE) {
            // validation failed
            $datas['content'] = $this->Flinks->getData($infoid);

            $this->load->view('flink/edit', $datas);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['links'] = $this->input->post('links', TRUE);
            $data['serial'] = $this->input->post('serial', TRUE);
            $data['position'] = $this->input->post('position', TRUE);
            $data['status'] = $this->input->post('status', TRUE);

            $update = $this->Flinks->changeData($data, $infoid);

            if ($update) {
                $msg = "Successfully Edit '{$data['name']}'  ";
                $this->session->set_flashdata('name', $msg);
                redirect('flink/index');
            }
        }

        // success add data into database
    }

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Flinks->changeData($data, $did);
        $content = $this->Flinks->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Delete '" . $name . "'  Succesfully");
            redirect('flink/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';

        $change = $this->Flinks->changeData($data, $did);

        $content = $this->Flinks->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Active  '" . $name . "'  Succesfully");
            redirect('flink/index');
        }
    }

    public function inactive($id) {

        $did = trim($id);
        $data['status'] = '0';

        $change = $this->Flinks->changeData($data, $did);

        $content = $this->Flinks->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Inactive   '" . $name . "'  Succesfully");
            redirect('flink/index');
        }
    }

    public function edit_heading() {
        $this->load->view('flink/pos_heading_name');
    }

    public function edit_posotion_heading($f_id) {

        $id = trim($f_id);

        $data['name'] = $this->input->post('name', TRUE);

        $change = $this->Flinks->updateFooterHeading($data, $id);

        $content = $this->Flinks->getPosHeadByID($id);
        $name = $content->name;
        if ($change) {
            echo "<div class='ok'> Edit  " . "'$name'" . "  Succesfully </div>";
        }
    }

}
