<?php

class Users extends CI_Model {

    public function send_user_account_email($poster_details) {

        $subject = " Please confirm your Website.com account";
        $confirmation_link = base_url() . "user/activate/" . $poster_details->act_code;
        $msg = "Welcome {$poster_details->name}! Thank you for signing up for an account on Website.<br><br>

Please click on the link below to confirm and gain access to your account.<br><br>


<a href='{$confirmation_link}' target='_blank'>{$confirmation_link}</a><br><br>

If you didn't sign up for an account, please ignore this email. The account will not be created if you do not click the link above.<br><br>

Regards,<br>
The support team at Website.com<br><br>

--------------------------------------------";

//        $this->load->library('email');
//
//        $config['charset'] = 'utf-8';
//        $config['wordwrap'] = TRUE;
//        $config['mailtype'] = 'html';
//
//        $this->email->initialize($config);

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'admin@orionwebtech.net', // gmail Username
            'smtp_pass' => 'Orion*566#', // gmail Password
            'mailtype' => 'html', // what type of mail you want to sent. i.e html/plaintext
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->to($poster_details->email);
        $this->email->from($poster_details->email, $poster_details->name);
        $this->email->subject($subject);
        $this->email->message($msg);
        $mail = $this->email->send();

        if ($mail) {
            $this->session->set_flashdata('feedback_success', 'Care Request Sent Successfully');
        } else {
            // if email don't send then shows error.

            $this->session->set_flashdata('feedback_error', 'Care Request Sending Failed');
        }
    }

    public function send_change_password_email($poster_details) {

        $subject = "How to reset your Website.com account password";
        $confirmation_link = base_url() . "user/change_password/" . $poster_details->act_code;
        $msg = "Hello {$poster_details->name},<br><br>

To create a new password for your Website.com account, simply click the link below.<br><br>

<a href='{$confirmation_link}' target='_blank'>{$confirmation_link}</a><br><br>

If you didn't request to change your password, please ignore this email. Your password won't change unless you access the link above and create a new password.<br><br>

Regards,<br>
The support team at Website.com<br><br>

--------------------------------------------";

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'admin@orionwebtech.net', // gmail Username
            'smtp_pass' => 'Orion*566#', // gmail Password
            'mailtype' => 'html', // what type of mail you want to sent. i.e html/plaintext
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");

        $this->email->to($poster_details->email);
        $this->email->from($poster_details->email, $poster_details->name);
        $this->email->subject($subject);
        $this->email->message($msg);
        $mail = $this->email->send();

        if ($mail) {
            $this->session->set_flashdata('mail_success', 'An email has been sent with instructions on how to reset your password.');
        } else {
            // if email don't send then shows error.
            $this->session->set_flashdata('mail_error', 'Here is an error. Please try again or contact with the admin.');
        }
    }

    public function check_user_email_password($email, $password) {

        if (!empty($email) && !empty($password)) {

            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->where('status', '1');
            $this->db->from('poster');
            $query = $this->db->get()->row();
            $norows = $this->db->count_all_results();
            if ($norows > 0) {
                return $query;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public function updateLoginInfo($uid) {
        $data['last_login_date'] = date('Y-m-d h:i:s');
        $data['last_login_ip'] = $_SERVER['REMOTE_ADDR'];

        $this->db->where('id', $uid);
        $query = $this->db->update('poster', $data);
        return $query;
    }

    public function check_poster_email_existence($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('poster')->row();
        $norows = $this->db->count_all_results();

        if ($norows < 0) {
            return false;
        } else {
            return $query;
        }
    }

    public function poster_check_current_password($current_pas, $id) {

        $this->db->where('password', $current_pas);
        $this->db->where('id', $id);

        $query = $this->db->get('poster');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * This is for Forgot Password
     * @param type $email
     * @return type
     */
    public function get_poster_details_by_email($email) {
        $this->db->where('email', $email);
        $result = $this->db->get('poster')->row();
        return $result;
    }

    /*
     * Check Email Address
     */

    public function check_email_for_lost_password($email) {

        $this->db->where('email', $email);
        $query = $this->db->get('poster');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * URL Friendly version of base64_encode.
     * */
    function encode($input) {
        return strtr(base64_encode($input), '+/=', '-_a');
    }

    /**
     * URL Friendly version of base64_decode.
     * */
    function decode($input) {
        return base64_decode(strtr($input, '-_a', '+/='));
    }

    public function get_all_my_ad_list_by_uid($uid, $limit = NULL, $offset = NULL) {
        $this->db->select('A.*, C.name as cat_name, P.name as poster_name, P.email as poster_email, P.phone as poster_phone, P.status as poster_status, L.name as location, CT.name as city');
        $this->db->from('advertizement A');
        $this->db->join('category C', 'C.id = A.cate_2', 'inner');
        $this->db->join('poster P', 'P.id = A.p_id', 'inner');
        $this->db->join('poster_location L', 'L.id = A.ad_location', 'inner');
        $this->db->join('poster_location_city CT', 'CT.id = A.ad_city', 'inner');
        $this->db->where('A.p_id', $uid);
        $this->db->where('A.status', 1);
        $this->db->order_by('A.entry_date', 'DESC');
        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }
        return $this->db->get()->result_array();
    }

}
