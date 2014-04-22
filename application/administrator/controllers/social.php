<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Social extends CI_Controller {

    public $poweruser;
    public $modpermit;
    private $modid = 8;

    public function __construct() {
        parent::__construct();
        $this->load->model('Socials');
        $this->load->helper('form');

        $this->load->model('Userauth');

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

        $config['base_url'] = base_url() . 'social/index';
        $config['total_rows'] = $this->Socials->totalElearningList();
        $config['per_page'] = 20;

        $this->pagination->initialize($config);


        $data['allElearnings'] = $this->Socials->getElearningList($config['per_page'], $this->uri->segment(3));
        $this->load->view('social/index', $data);
    }

    /* public function add() {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('name', 'Social Link Name', 'required');
      $this->form_validation->set_rules('link', 'URL', 'required');

      if ($this->form_validation->run() == FALSE) {
      // validation failed
      // $data['controller_name'] = $this->Socials->getControllerName();
      $this->load->view('social/add');
      } else {
      $data['name'] = $this->input->post('name', TRUE);
      $data['link'] = $this->input->post('link', TRUE);
      $data['status'] = $this->input->post('status', TRUE);
      $data['last_action_date'] = date('Y-m-d H:i:s');
      $data['last_action_user'] = $this->session->userdata('uid');


      $insert = $this->Socials->insertElearning($data);

      if ($insert) {
      $msg = "Successfully Add '{$data['name']}' Social Links";
      $this->session->set_flashdata('item_name', $msg);
      redirect('social/index');
      } else {
      $data['controller_name'] = $this->Socials->getControllerName();
      $this->load->view('social/add', $data);
      }
      }

      // success add data into database
      } */

    public function edit($mid) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Social Link Name', 'required');
        $this->form_validation->set_rules('link', 'URL', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['content'] = $this->Socials->getElearning($mid);
            $this->load->view('social/edit', $data);
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['link'] = $this->input->post('link', TRUE);
            $data['status'] = $this->input->post('status', TRUE);
            $data['last_action_date'] = date('Y-m-d H:i:s');
            $data['last_action_user'] = $this->session->userdata('uid');

            $mid = $this->input->post('mid');

            if ($data['name'] == 1) {
                $social = "Facebook";
            } elseif ($data['name'] == 2) {
                $social = "Twitter";
            } elseif ($data['name'] == 3) {
                $social = "Youtube";
            } elseif ($data['name'] == 4) {
                $social = "Google";
            }

            $update = $this->Socials->updateElearning($data, $mid);

            if ($update) {
                $msg = "Successfully Edit " . "'$social'" . "  Social Links";
                $this->session->set_flashdata('item_name', $msg);
                redirect('social/index');
            } else {
                $data['content'] = $this->Socials->getElearning($mid);
                $data['error'] = 'Faild to update';
                $this->load->view('social/edit', $data);
            }
        }
    }

    public function active($mid) {

        $data['status'] = '1';
        $content = $this->Socials->getElearning($mid);

        if ($content->name == 1) {
            $social = "Facebook";
        } elseif ($content->name == 2) {
            $social = "Twitter";
        } elseif ($content->name == 3) {
            $social = "Youtube";
        } elseif ($content->name == 4) {
            $social = "Google";
        }

        $update = $this->Socials->updateElearning($data, $mid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Active Social Links " . "'$social'" . " Succesfully");
            redirect('social/index');
        }
    }

    public function inactive($mid) {

        $data['status'] = '0';
        $content = $this->Socials->getElearning($mid);

        if ($content->name == 1) {
            $social = "Facebook";
        } elseif ($content->name == 2) {
            $social = "Twitter";
        } elseif ($content->name == 3) {
            $social = "Youtube";
        } elseif ($content->name == 4) {
            $social = "Google";
        }

        $update = $this->Socials->updateElearning($data, $mid);
        if ($update) {

            $this->session->set_flashdata("item_name", "Inactive Social links " . "'$social'" . " Succesfully");
            redirect('social/index');
        }
    }

}
