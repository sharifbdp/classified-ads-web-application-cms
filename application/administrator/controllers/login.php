<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Logins');
        $this->load->model('Users');
    }

    public function index() {

        $this->load->library('form_validation');
        if ($this->session->userdata('admin_logged')) {
            redirect('home/index');
        } else {
            $this->load->view('login/index');
        }
    }

    public function check() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|xss_clean|md5');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/index');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $checkdata = $this->Logins->checkAdmin($email, $password);


            if (!empty($checkdata)) {
                $userinfo = array(
                    'username' => $checkdata->name,
                    'uid' => $checkdata->id,
                    'admin_logged' => TRUE
                );

                $this->session->set_userdata($userinfo);

                $uid = $checkdata->id;
                $logininfo = $this->Logins->updateLoginInfo($uid);

                redirect('home/index');
            } else {

                $this->load->view('login/index');
            }
        }
    }

    public function forgot_password() {
        $this->load->view('login/forgot_password');
    }

    public function new_password() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|callback_check_email[' . $this->input->post('email') . ']');
        $this->form_validation->set_message('check_email', 'This email address doesn\'t exist. Please Contact with the Administrator.');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login/forgot_password');
        } else {

            $email = $this->input->post('email', TRUE);
            $user_details = $this->Users->getUserByEmail($email);
            $user_id = $user_details->id;

            $new_password = random_string('alnum', 8);
            $data['password'] = md5($new_password);
            $update_password = $this->Users->updateData($user_id, $data);

            if ($update_password) {
                /*                 * * Success Email ** */
                $subject = "Admin panel New Password";
                $base_url = base_url();
                $msg = "Hi Mr, <strong>{$user_details->name}</strong>,<br/><br/>
                        Here is you new login details - <br/>
                        <strong>Email : </strong>{$user_details->email} <br/>
                        <strong>Password : </strong>{$new_password} <br/><br/>
                        Please <a href='{$base_url}' target='_blank'>Login</a> and change your password. ";

                $this->load->library('email');

                $config['charset'] = 'utf-8';
                $config['wordwrap'] = TRUE;
                $config['mailtype'] = 'html';

                $this->email->initialize($config);

                $this->email->to($user_details->email);
                $this->email->from('sharif@infobase.com.bd', 'Administrator');
                $this->email->subject($subject);
                $this->email->message($msg);
                $mail = $this->email->send();

                if ($mail) {
                    $this->session->set_flashdata('mail_success', 'Please check your mail, We send a radom pasword.');
                } else {
                    $this->session->set_flashdata('mail_success', 'Sending failed. Please try again.');
                }

                /*                 * *** email **** */
                redirect('login/new_password');
            } else {
                $this->load->view('login/forgot_password');
            }
        }
    }

    public function check_email($email) {

        return $this->Users->checkEmail($email);
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login/index');
    }

}