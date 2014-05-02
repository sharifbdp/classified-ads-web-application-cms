<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class En extends CI_Controller {

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

    public function post_ad() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cid', 'Category', 'required|xss_clean');
        $this->form_validation->set_rules('for_what', 'Type', 'required|xss_clean');
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean');
        $this->form_validation->set_rules('details', 'Description', 'required|xss_clean');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean');
        $this->form_validation->set_rules('ad_location', 'Ad Location', 'required|xss_clean');
        $this->form_validation->set_rules('ad_city', 'Ad City', 'required|xss_clean');

        //Poster
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email');
        $this->form_validation->set_rules('phone', 'Phone No', 'required|xss_clean');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('ad/post_ad');
        } else {
            $data['cid'] = $this->input->post('cid', TRUE);
            $data['for_what'] = $this->input->post('for_what', TRUE);
            $data['title'] = $this->input->post('title', TRUE);
            $data['details'] = $this->input->post('details', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['ad_location'] = $this->input->post('ad_location', TRUE);
            $data['ad_city'] = $this->input->post('ad_city', TRUE);
            $data['entry_date'] = date('Y-m-d H:i:s');
            $data['status'] = 0;

            //poster
            $dp['name'] = $this->input->post('name', TRUE);
            $dp['email'] = $this->input->post('email', TRUE);
            $dp['phone'] = $this->input->post('phone', TRUE);
            $dp['status'] = 0;

            $data['p_id'] = $this->Fronts->insert_ad_poster($dp);
            if ($data['p_id']) {
                $data['ad_id'] = $this->Fronts->insert_advertizement($data);
                $this->load->view('ad/check_ad', $data + $dp);
            } else {
                redirect('en/post_ad');
            }
        }
    }

    public function view_area_by_location($location_id) {
        $id = trim($location_id);
        $data = $this->Fronts->get_area_list_by_location_id($id);

        foreach ($data as $ds) {
            echo '<option value=' . $ds["id"] . '>' . $ds["name"] . '</option>';
        }
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