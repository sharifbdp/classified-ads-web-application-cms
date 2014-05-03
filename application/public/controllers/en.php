<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class En extends CI_Controller {

    public $i = 1; //default value

    public function __construct() {
        parent::__construct();
        $this->load->model('Fronts');
    }

    public function index() {
        $data['wcnote'] = $this->Fronts->getWelcomeNote(1);
        $this->load->view('front/index', $data);
    }

    public function details($m_alias) {

        $menu_details = $this->Fronts->getmid($m_alias);
        $mid = $menu_details->id;

        $data['content'] = $this->Fronts->getInfo($mid);
        $data['m_alias'] = $m_alias;

        $this->load->view('inner/' . $menu_details->page_template . '', $data);
    }

    public function readmore($ids) {

        $id = trim($ids);
        $data['content'] = $this->Fronts->getWelcomeNote($id);

        $this->load->view('inner/details', $data);
    }

    public function services($alias) {
        $al = trim($alias);
        $data['content'] = $this->Fronts->get_service_details_by_slug($al);

        $this->load->view('inner/service_details', $data);
    }

    public function links($alias) {
        $al = trim($alias);
        $data['content'] = $this->Fronts->get_quick_links_details_by_slug($al);

        $this->load->view('inner/quick_links_details', $data);
    }

    public function footer($alias) {
        $alias = trim($alias);
        $data['content'] = $this->Fronts->get_footer_link_details_by_alias($alias);

        $this->load->view('inner/footer_link_details', $data);
    }

    public function pageNotFound() {

        $this->load->view('inner/404');
    }

    public function care_request() {
        /*         * ** check & required ** */

        $this->load->library('form_validation');

        $this->form_validation->set_rules('care_type', 'Care Type', 'required|xss_clean');
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('contact_no', 'Contact No', 'required|xss_clean');
        $this->form_validation->set_rules('zip_code', 'ZIP code', 'xss_clean');

        $this->form_validation->set_rules('comments', 'Message', 'required|xss_clean');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('feedback_success', 'Please write your message');
            $this->load->view('form/care_request');
        } else {
            $datas['care_type'] = $this->input->post('care_type');
            $datas['name'] = $this->input->post('name');
            $datas['email'] = $this->input->post('email');
            $datas['contact_no'] = $this->input->post('contact_no');
            $datas['zip_code'] = $this->input->post('zip_code');

            $datas['comments'] = $this->input->post('comments');

            $subject = "Senior Care Request From Hope Adult Care- Web Site.";

            $datas['send_date'] = date('Y-m-d');

            /*             * * Success Email ** */

            $msg = "<strong>Message: </strong>{$datas['comments']}<br/><br/><strong>Name :</strong>{$datas['name']}<br/>
            <strong>Care Type :</strong>{$datas['care_type']}<br/>
            <strong>Contact no :</strong>{$datas['contact_no']}<br/>
            <strong>Email :</strong>{$datas['email']}<br/>
            <strong>Zip Code :</strong>{$datas['zip_code']} ";

            $this->load->library('email');

            $config['charset'] = 'utf-8';
            $config['wordwrap'] = TRUE;
            $config['mailtype'] = 'html';

            $this->email->initialize($config);

            $this->email->to('sharif@infobase.com.bd');
            $this->email->from($datas['email'], $datas['name']);
            $this->email->subject($subject);
            $this->email->message($msg);
            $mail = $this->email->send();

            if ($mail) {
                $this->session->set_flashdata('feedback_success', 'Care Request Sent Successfully');
            } else {
                $this->session->set_flashdata('feedback_error', 'Care Request Sending Failed');
            }

            /*             * *** email **** */

            redirect('view/care_request');
        }
    }

    public function view_area_by_location($location_id) {
        $id = trim($location_id);
        $data = $this->Fronts->get_area_list_by_location_id($id);

        foreach ($data as $ds) {
            echo '<option value=' . $ds["id"] . '>' . $ds["name"] . '</option>';
        }
    }

    public function generate_unique_slug($slug, $separator = '-', $increment_number_at_end = FALSE) {

        //check if the last char is a number
        //that could break this script if we don't handle it
        $last_char_is_number = is_numeric($slug[strlen($slug) - 1]);
        //add a point to this slug if needed to prevent number collision..
        $slug = $slug . ($last_char_is_number && $increment_number_at_end ? '.' : '');

        //if slug exists already, increment it
        $i = 0;

        while (get_instance()->db->where('slug', $slug)->count_all_results('advertizement') != 0) {
            //increment the slug
            $slug = increment_string($slug, $separator);
            $i++;
        }

        //so now we have unique slug
        //remove the dot create because number collision
        if ($last_char_is_number && $increment_number_at_end)
            $slug = str_replace('.', '', $slug);

        return $slug;
    }

    public function post_ad() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cid', 'Category', 'required|xss_clean|trim');
        $this->form_validation->set_rules('for_what', 'Type', 'required|xss_clean|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean|trim');
        $this->form_validation->set_rules('details', 'Description', 'required|xss_clean|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim');
        $this->form_validation->set_rules('type', 'Ad Type', 'required|xss_clean|trim');
        $this->form_validation->set_rules('ad_location', 'Ad Location', 'required|xss_clean|trim');
        $this->form_validation->set_rules('ad_city', 'Ad City', 'required|xss_clean|trim');

        //Poster
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone No', 'required|xss_clean|trim');
        $this->form_validation->set_rules('p_status', 'Phone No Show/Hide', 'xss_clean|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('ad/post_ad');
        } else {
            $data['cid'] = $this->input->post('cid', TRUE);
            $data['for_what'] = $this->input->post('for_what', TRUE);
            $data['title'] = $this->input->post('title', TRUE);
            $slug = url_title($data['title'], '-', TRUE);

            $data['slug'] = $this->generate_unique_slug($slug); //here generate slug
            $data['details'] = $this->input->post('details', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['ad_location'] = $this->input->post('ad_location', TRUE);
            $data['ad_city'] = $this->input->post('ad_city', TRUE);
            $data['entry_date'] = date('Y-m-d H:i:s');
            $data['type'] = $this->input->post('type', TRUE);
            $data['status'] = 5;

            //poster
            $poster_email = $this->input->post('email', TRUE);
            $poster_check = $this->Fronts->check_poster_email_existence($poster_email);
            if ($poster_check == FALSE) {
                $dp['name'] = $this->input->post('name', TRUE);
                $dp['email'] = $poster_email;
                $dp['phone'] = $this->input->post('phone', TRUE);
                $dp['p_status'] = $this->input->post('p_status', TRUE);
                $dp['status'] = 5;

                $data['p_id'] = $this->Fronts->insert_ad_poster($dp);
            } else {
                $data['p_id'] = $poster_check->id;
            }

            if ($data['p_id']) {
                $ad_id = $this->Fronts->insert_advertizement($data);
                $ad_details = $this->Fronts->get_advertizement_by_id($ad_id);
                redirect('en/review/' . $ad_details->slug . '');
            } else {
                redirect('en/post_ad');
            }
        }
    }

    public function review($slug) {
        $data['content'] = $this->Fronts->get_ad_details_by_sulg(trim($slug));
        $this->load->view('ad/check_ad', $data);
    }

    public function publish() {
        $this->load->library('form_validation');
        $poster_status = $this->input->post('poster_status', TRUE);
        if ($poster_status == 5) {
            $this->form_validation->set_rules('password', 'Password', 'required|xss_clean|trim|matches[c_password]');
            $this->form_validation->set_rules('c_password', 'Password Confirmation', 'required|xss_clean|trim');
        }

        $this->form_validation->set_rules('ad_id', 'Poster ID', 'required|xss_clean|trim');
        $ad_id = $this->input->post('ad_id', TRUE);
        $ad_details = $this->Fronts->get_advertizement_by_id($ad_id);

        if ($this->form_validation->run() == FALSE) {
            $this->review($ad_details->slug);
        } else {
            $data['status'] = '0';
            $update = $this->Fronts->update_advertizement_by_id($data, $ad_id);

            if ($update) {
                $dp['status'] = '0';
                if ($poster_status == 5) {
                    $dp['password'] = md5($this->input->post('password', TRUE));
                }
                $this->Fronts->update_poster_by_id($dp, $ad_details->p_id);
                redirect('en/finish/' . $ad_details->slug . '');
            }
        }
    }

    public function finish($slug) {
        $data['content'] = $this->Fronts->get_ad_details_by_sulg(trim($slug));
        $this->load->view('ad/finish', $data);
    }
    
    public function all_ad() {
        $this->load->view('ad/all_ad');
    }

}

/* success
 *

<div class="alert wrap">
<div class="box success">
<a href="#" class="polar close">
×
</a>
<p>An email with a confirmation link has been sent to your email address. Please click the link to confirm your account.</p>
</div>
</div>

 *
 *
 * no-ads
<div id="no-ads">
<div class="wrap">
<div class="item-box">
<h2>Looks like you don't have any ads yet</h2>
<p>What are you waiting for? Posting ads is free</p>
<div class="btn-wrapper">
<div class="bg left"></div>
<div class="bg right"></div>
<div class="btn-border">
<a class="btn large post" href="/en/new?controller=ads"><span class="large">Post an ad now</span></a>
</div>
</div>
</div>
</div>

</div>
 */