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

    public function delete($did) {
        $did = trim($did);
        $data['status'] = '13';
        $change = $this->Ads->changeData($data, $did);
        $content = $this->Ads->getData($did);
        $name = $content->name;
        if ($change) {

            $this->session->set_flashdata("name", "Delete '<strong>" . $name . "</strong>'  Succesfully");
            redirect('ad/index');
        }
    }

    public function active($id) {
        $did = trim($id);
        $data['status'] = '1';

        $change = $this->Ads->changeData($data, $did);

        $content = $this->Ads->getData($did);
        $name = $content->title;
        if ($change) {
            // sed mail to poster
            $send_mail = $this->notify_user_ad_published($content);
            if ($send_mail == TRUE) {
                $this->session->set_flashdata("name", "'<strong>" . $name . "</strong>'  ad posted succesfully! and an email send to the Poster");
            }
            if ($send_mail == FALSE) {
                $this->session->set_flashdata("name", "'<strong>" . $name . "</strong>'  ad posted succesfully!");
            }
            redirect('ad/index');
        }
    }

    public function inactive($id) {

        $did = trim($id);
        $data['status'] = '7';

        $change = $this->Ads->changeData($data, $did);

        $content = $this->Ads->getData($did);
        $name = $content->title;
        if ($change) {
            $this->session->set_flashdata("name", "'<strong>" . $name . "</strong>'  ad inactive succesfully");
            redirect('ad/index');
        }
    }

    public function validate_slug($str, $id) {
        $field_value = $str;

        $mine = $this->Ads->aliasExists($field_value, $id);

        return $mine;
    }

    public function notify_user_ad_published($content) {

        $poster_details = $this->Ads->get_poster_details_by_id($content->p_id);
        $subject = "Receipt: {$content->title} (Published)";
        $ad_link = "http://localhost/bikroy/en/view/" . $content->slug;
        
        $msg = "Congratulations! Your ad has now been published Website.com - at. <br><br>

Your ad is the link:  <a href='{$ad_link}' target='_blank'>{$ad_link}</a><br><br>

Change or delete the ad down 'Edit Delete', click the link, or your account 'My Ads' to visit. <br><br><br>

Stay Safe<br>
- Trade respective areas. Meet the seller directly, Please check the item thoroughly and completely satisfied when you pay the price.<br>
- Money - money and share things together. Do not pay any money in advance.<br>
- Do not give your personal information or any atharika.<br>
- Be careful if you pay extra to none. <br><br>
    

Regards,<br>
The support team at Website.com<br><br>

--------------------------------------------<br>
Website.com - Sell anything ";

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
            return TRUE;
        } else {
            // if email don't send then shows error.
            show_error($this->email->print_debugger());
            return FALSE;
        }
    }

}
