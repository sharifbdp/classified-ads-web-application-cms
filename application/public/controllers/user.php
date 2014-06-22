<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Fronts');
        $this->load->model('Users');
    }

    public function index() {
        if ($this->session->userdata('user_logged')) {
            $uid = $this->session->userdata('uid');
            $data['my_ad_list'] = $this->Users->get_all_my_ad_list_by_uid($uid);
            $this->load->view('poster/account_success', $data);
        } else {
            redirect('user/login');
        }
    }

    public function activate($e_code) {
        $email = $this->Users->decode(trim($e_code));
        $check_user = $this->Users->check_poster_email_existence($email);
        if ($check_user != FALSE) {
            // Update user status to 1 // active
            $dp['status'] = '1';
            $this->Fronts->update_poster_by_id($dp, $check_user->id);

            $userinfo = array(
                'name' => $check_user->name,
                'email' => $check_user->email,
                'uid' => $check_user->id,
                'user_logged' => TRUE
            );

            $this->session->set_userdata($userinfo);

            $update_login = $this->Users->updateLoginInfo($check_user->id);

            if ($update_login) {
                $this->session->set_flashdata('sign_success', 'Your account was successfully confirmed. You are now signed in.');
            } else {
                $this->session->set_flashdata("sign_error", "Here is an error. Please <a href='" . base_url('en/details/contact-us') . "'>contact</a> with the Admin");
            }

            redirect('user/index');
        }
    }

    public function change_password($e_code) {
        $email = $this->Users->decode(trim($e_code));
        $check_user = $this->Users->check_poster_email_existence($email);
        if ($check_user != FALSE) {

            $userinfo = array(
                'name' => $check_user->name,
                'email' => $check_user->email,
                'uid' => $check_user->id,
                'user_logged' => TRUE
            );

            $this->session->set_userdata($userinfo);

            $update_login = $this->Users->updateLoginInfo($check_user->id);


            // This is for update Password
            $submit = $this->input->post('submit_form');
            if ($submit == 'change_lost_password') {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|matches[c_password]');
                $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|xss_clean|trim');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('poster/lost_change_password');
                } else {

                    $dpass['password'] = md5($this->input->post('password', TRUE));

                    $update_pass = $this->Fronts->update_poster_by_id($dpass, $check_user->id);

                    if ($update_pass) {
                        $this->session->set_flashdata('sign_success', 'Your password updated successfully!');
                        redirect('user');
                    } else {
                        $this->session->set_flashdata("sign_error", "Here is an error. Please try again later or <a href='" . base_url('en/details/contact-us') . "'>conatct</a> with admin.");
                        $this->load->view('poster/lost_change_password');
                    }
                }
            }

            $this->load->view('poster/lost_change_password');
        } else {
            $this->session->set_flashdata("mail_error", "The password reset link you used is no longer valid or Token is mismatch. Please enter your email again to get a new link or <a href='" . base_url('en/details/contact-us') . "'>conatct</a> with admin.");
            redirect('user/password');
        }
    }

    //

    public function password() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|callback_check_email[' . $this->input->post('email') . ']');
        $this->form_validation->set_message("check_email", "This email address doesn\'t exist. Please <a href='" . base_url('user/sign_up') . "'>sign up<a>.");

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('poster/lost_password');
        } else {

            $email = $this->input->post('email', TRUE);
            $poster_details = $this->Users->get_poster_details_by_email($email);

            if (!empty($poster_details)) {
                // send a reset password email
                $this->Users->send_change_password_email($poster_details);
                redirect('user/password');
            } else {
                $this->session->set_flashdata('mail_error', 'Here is an error. Please try again or contact with the admin.');
                $this->load->view('poster/lost_password');
            }
        }
    }

    public function check_email($email) {

        return $this->Users->check_email_for_lost_password($email);
    }

    public function login() {

        $back_url = $this->session->userdata('back_url');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'email', 'required|xss_clean|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required|xss_clean|trim|md5');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('poster/login');
        } else {

            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $check_user = $this->Users->check_user_email_password($email, $password);

            if (!empty($check_user)) {
                $userinfo = array(
                    'name' => $check_user->name,
                    'email' => $check_user->email,
                    'uid' => $check_user->id,
                    'user_logged' => TRUE
                );

                $this->session->set_userdata($userinfo);

                $this->Users->updateLoginInfo($check_user->id);

                $this->session->set_flashdata('sign_success', 'Your are now successfully signed in.');
                if (!empty($back_url)) {
                    $this->session->unset_userdata('back_url');
                    redirect($back_url);
                } else {
                    redirect('user/index');
                }
            } else {
                $this->session->set_flashdata("sign_error", "Wrong email / password, or you did not create an account when you posted your ad. . Please <a href='" . base_url('user/sign_up') . "'>Create an account</a> and manage your ads.");
                redirect('user/login');
            }
        }
    }

    public function sign_up() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|is_unique[poster.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|matches[c_password]');
        $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|xss_clean|trim');

        $this->form_validation->set_message('is_unique', 'This email already belongs to an existing account. Please enter a different email.');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('poster/sign_up');
        } else {

            $data['name'] = $this->input->post('name', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['password'] = md5($this->input->post('password', TRUE));
            $data['status'] = 5;
            $data['act_code'] = $this->Users->encode($data['email']);

            $insert = $this->Fronts->insert_ad_poster($data);

            if ($insert) {

                $poster_details = $this->Fronts->get_poster_details_by_id($insert);
                $this->Users->send_user_account_email($poster_details);
                //
                $this->session->set_flashdata('sign_success', 'Thank you! Please check your email. We send you an activation link.');
                redirect('user/login');
            } else {
                $this->session->set_flashdata("sign_error", "Here is an error. Please try again or <a href='" . base_url('en/details/contact-us') . "'>conatct</a> with admin.");
                redirect('user/login');
            }
        }
    }

    public function settings() {
        if ($this->session->userdata('user_logged')) {
            $uid = $this->session->userdata('uid');
            $data['poster_details'] = $this->Fronts->get_poster_details_by_id($uid);

            $submit = $this->input->post('submit_form');
            // This is for update name, phone no
            if ($submit == 'update_details') {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
                $this->form_validation->set_rules('phone', 'Phone', 'required|xss_clean|trim');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('poster/settings', $data);
                } else {

                    $det['name'] = $this->input->post('name', TRUE);
                    $det['phone'] = $this->input->post('phone', TRUE);

                    $update_details = $this->Fronts->update_poster_by_id($det, $uid);

                    if ($update_details) {
                        $this->session->set_flashdata('sign_success', 'Information update successfully!');
                        redirect('user/settings');
                    } else {
                        $this->session->set_flashdata("sign_error", "Here is an error. Please try again later or <a href='" . base_url('en/details/contact-us') . "'>conatct</a> with admin.");
                        redirect('user/settings');
                    }
                }
            }

            // This is for update Password
            if ($submit == 'change_password') {

                $this->load->library('form_validation');

                $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|xss_clean|callback_check_current_password[' . $uid . ']');
                $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|matches[c_password]');
                $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|xss_clean|trim');

                $this->form_validation->set_message('check_current_password', 'Current password doesn\'t match.');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('poster/settings', $data);
                } else {

                    $dpass['password'] = md5($this->input->post('password', TRUE));

                    $update_pass = $this->Fronts->update_poster_by_id($dpass, $uid);

                    if ($update_pass) {
                        $this->session->set_flashdata('sign_success', 'Your password updated successfully!');
                        redirect('user/settings');
                    } else {
                        $this->session->set_flashdata("sign_error", "Here is an error. Please try again later or <a href='" . base_url('en/details/contact-us') . "'>conatct</a> with admin.");
                        redirect('user/settings');
                    }
                }
            }

            $this->load->view('poster/settings', $data);
        } else {
            redirect('user/login');
        }
    }

    public function check_current_password($str, $id) {
        $current_pas = md5($str);
        $mine = $this->Users->poster_check_current_password($current_pas, $id);
        if ($mine == FALSE) {
            $this->session->set_flashdata("sign_error", "The current password you've entered is incorrect. Please enter a different password.");
        }
        return $mine;
    }

    public function add_to_favorite_login() {
        $current_url = $this->input->post('current_url', TRUE);
        $this->session->set_userdata('back_url', $current_url);
        var_dump($current_url);
        return true;
    }

    public function add_to_favorite() {
        $ad_alias = $this->input->post('ad_alias', TRUE);
        $ad_details = $this->Fronts->get_ad_details_by_sulg($ad_alias);

        $data['ad_id'] = $ad_details->id;
        $data['poster_id'] = $this->session->userdata('uid');
        $data['status'] = '1';
        //var_dump($data);
        $check_fav = $this->Users->check_fouorite_ad_existance_in_user_list($data['ad_id'], $data['poster_id']);
        if ($check_fav == TRUE) {
            echo '<div class="box success">This advertisement is already in your favorite list.</div>';
        } else {
            $favourite_insert = $this->Users->insert_ad_to_favorite_data($data);
            if ($favourite_insert) {
                echo '<div class="box success"> This advertisement is successfully added to your favorite List </div>';
            } else {
                echo '<div class="alert alert-error">Here is an error. Please try again. </div>';
            }
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('user/login');
    }

}

/*

 <div class="alert wrap">
<div class="box notice">
<a href="#" class="polar close">
×
</a>
<p>An email has been sent with instructions on how to reset your password.</p>
</div>
</div>


 */