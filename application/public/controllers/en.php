<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class En extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Fronts');
        $this->load->model('Users');
    }

    public function index() {
        $data['wcnote'] = $this->Fronts->getWelcomeNote(1);
        $data['location_one'] = $this->Fronts->get_all_location_data(3, 0);
        $data['location_two'] = $this->Fronts->get_all_location_data(10, 3);
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

    public function view_category_list_by_parent($parent) {
        $id = trim($parent);
        $data = $this->Fronts->get_all_parent_category($id);

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

    public function upload_image($ad_id) {

        $this->load->library('image_lib');

        $config['upload_path'] = './uploads/ad_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5120';
        $config['max_width'] = '2048';
        $config['max_height'] = '1080';

        $this->load->library('upload', $config);

        foreach ($_FILES['ad_image'] as $key => $val) {
            $i = 1;
            foreach ($val as $v) {
                $field_name = "file_" . $i;
                $_FILES[$field_name][$key] = $v;
                $i++;
            }
        }
        // hapus array awal, karena kita sudah memiliki array baru
        unset($_FILES['ad_image']);

        $error = array();
        foreach ($_FILES as $field_name => $file) {
            if (!$this->upload->do_upload($field_name)) {
                $error[] = $this->upload->display_errors();
            } else {

                $data_upload_files = $this->upload->data();

                // Get value and insert to table
                $ad['ad_id'] = $ad_id;
                $ad['image_name'] = $data_upload_files['file_name'];
                $ad['status'] = '0';
                $this->Fronts->insert_ad_image($ad);

                // Big image
                $config['source_image'] = $data_upload_files['full_path'];
                $config['new_image'] = './uploads/ad_image/' . $data_upload_files['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 625;
                $config['height'] = 385;

                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();

                //thumb image
                $config['source_image'] = $data_upload_files['full_path'];
                $config['new_image'] = './uploads/ad_image/thumbs/' . $data_upload_files['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 105;
                $config['height'] = 75;

                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                $this->image_lib->clear();
            }
        }
        if (count($error) > 0) {
            $this->session->set_flashdata('upload_error', $error);
        }
    }

    public function post_ad() {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cate_2', 'Category', 'required|xss_clean|trim');
        $this->form_validation->set_rules('for_what', 'Type', 'required|xss_clean|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean|trim');
        $this->form_validation->set_rules('details', 'Description', 'required|xss_clean|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim');
        $this->form_validation->set_rules('negotiable', 'Negotiable', 'xss_clean|trim');
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
            $data['cate_2'] = $this->input->post('cate_2', TRUE);
            $data['cate_1'] = file_get_contents(base_url() . "en/find_parent_category/" . $data['cate_2']);
            $data['cate_3'] = $this->input->post('cate_3', TRUE);
            $data['for_what'] = $this->input->post('for_what', TRUE);
            $data['title'] = $this->input->post('title', TRUE);
            $slug = url_title($data['title'], '-', TRUE);

            $data['slug'] = $this->generate_unique_slug($slug); //here generate slug
            $data['details'] = $this->input->post('details', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['negotiable'] = $this->input->post('negotiable', TRUE);
            $data['ad_location'] = $this->input->post('ad_location', TRUE);
            $data['ad_city'] = $this->input->post('ad_city', TRUE);
            $data['entry_date'] = date('Y-m-d H:i:s');
            $data['type'] = $this->input->post('type', TRUE);
            $data['status'] = 5;

            //poster
            $poster_email = $this->input->post('email', TRUE);
            $poster_check = $this->Users->check_poster_email_existence($poster_email);
            if ($poster_check == FALSE) {
                $dp['name'] = $this->input->post('name', TRUE);
                $dp['email'] = $poster_email;
                $dp['phone'] = $this->input->post('phone', TRUE);
                $dp['p_status'] = $this->input->post('p_status', TRUE);
                $dp['status'] = 5;
                $dp['act_code'] = $this->Users->encode($poster_email);

                $data['p_id'] = $this->Fronts->insert_ad_poster($dp);
            } else {
                $data['p_id'] = $poster_check->id;
            }

            if ($data['p_id']) {
                $ad_id = $this->Fronts->insert_advertizement($data);
                $this->upload_image($ad_id); //Upload image and insert to DB
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
                $da_ad['status'] = 1;
                $this->Fronts->update_ad_image_by_ad_id($da_ad, $ad_id);
                redirect('en/finish/' . $ad_details->slug . '');
            }
        }
    }

    public function finish($slug) {
        $data['content'] = $this->Fronts->get_ad_details_by_sulg(trim($slug));
        $poster_details = $this->Fronts->get_poster_details_by_id($data['content']->poster_id);
        if (!empty($poster_details)) {
            $this->Users->send_user_account_email($poster_details);
        }

        $this->load->view('ad/finish', $data);
    }

    public function edit_ad($ad_id, $ad_slug) {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('cate_2', 'Category', 'required|xss_clean|trim');
        $this->form_validation->set_rules('for_what', 'Type', 'required|xss_clean|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|xss_clean|trim');
        $this->form_validation->set_rules('details', 'Description', 'required|xss_clean|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|xss_clean|trim');
        $this->form_validation->set_rules('negotiable', 'Negotiable', 'xss_clean|trim');
        $this->form_validation->set_rules('type', 'Ad Type', 'required|xss_clean|trim');
        $this->form_validation->set_rules('ad_location', 'Ad Location', 'required|xss_clean|trim');
        $this->form_validation->set_rules('ad_city', 'Ad City', 'required|xss_clean|trim');

        //Poster
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|xss_clean|valid_email|trim');
        $this->form_validation->set_rules('phone', 'Phone No', 'required|xss_clean|trim');
        $this->form_validation->set_rules('p_status', 'Phone No Show/Hide', 'xss_clean|trim');

        $ds['content'] = $this->Fronts->get_ad_details_by_id(trim($ad_id));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('ad/edit_ad', $ds);
        } else {
            $data['cate_2'] = $this->input->post('cate_2', TRUE);
            $data['cate_1'] = file_get_contents(base_url() . "en/find_parent_category/" . $data['cate_2']);
            $data['cate_3'] = $this->input->post('cate_3', TRUE);
            $data['for_what'] = $this->input->post('for_what', TRUE);
            $data['title'] = $this->input->post('title', TRUE);
            $slug = url_title($data['title'], '-', TRUE);

            $data['slug'] = $this->generate_unique_slug($slug); //here generate slug
            $data['details'] = $this->input->post('details', TRUE);
            $data['price'] = $this->input->post('price', TRUE);
            $data['negotiable'] = $this->input->post('negotiable', TRUE);
            $data['ad_location'] = $this->input->post('ad_location', TRUE);
            $data['ad_city'] = $this->input->post('ad_city', TRUE);
            $data['entry_date'] = date('Y-m-d H:i:s');
            $data['type'] = $this->input->post('type', TRUE);
            $data['status'] = 5;

            //poster
            $poster_email = $this->input->post('email', TRUE);
            $poster_check = $this->Users->check_poster_email_existence($poster_email);
            if ($poster_check == FALSE) {
                $dp['name'] = $this->input->post('name', TRUE);
                $dp['email'] = $poster_email;
                $dp['phone'] = $this->input->post('phone', TRUE);
                $dp['p_status'] = $this->input->post('p_status', TRUE);
                $dp['status'] = 5;
                $dp['act_code'] = $this->Users->encode($poster_email);

                $data['p_id'] = $this->Fronts->insert_ad_poster($dp);
            } else {
                $data['p_id'] = $poster_check->id;
            }

            if ($data['p_id']) {
                $this->Fronts->update_advertizement_by_id($data, $ds['content']->id);
                $this->upload_image($ds['content']->id); //Upload image and insert to DB
                $ad_details = $this->Fronts->get_advertizement_by_id($ds['content']->id);
                redirect('en/review/' . $ad_details->slug . '');
            } else {
                redirect("en/edit_ad/{$ad_id}/{$ad_slug}");
            }
        }
    }

    public function delete_ad_images() {
        $id = trim($this->input->post('id'));
        $content = $this->Fronts->get_ad_image_by_id($id);

        $delete = unlink(realpath("./uploads/ad_image/" . $content->image_name));
        unlink(realpath("./uploads/ad_image/thumbs/" . $content->image_name));

        if ($delete != NULL) {
            $this->Fronts->delete_ad_image_by_id($id);
            echo json_encode(array('status' => 'OK'));
        } else {
            return FALSE;
        }
    }

    public function all_ads($type = NULL, $cate_1_slug = NULL, $cate_2_slug = NULL, $cate_3_slug = NULL, $sort = NULL) {
        if ($type != NULL) {
            if ($type == 'all') {
                $type = NULL;
            } elseif ($type == 'private') {
                $type = 1;
            } elseif ($type == 'business') {
                $type = 2;
            }
        }
        if ($sort == 'price') {
            $sort = TRUE;
        } else {
            $sort = FALSE;
        }
        //
        $data['cate_1_details'] = $this->Fronts->get_category_by_alias(trim($cate_1_slug));
        $data['cate_2_details'] = $this->Fronts->get_category_by_alias(trim($cate_2_slug));
        $data['cate_3_details'] = $this->Fronts->get_category_by_alias(trim($cate_3_slug));
        $cate_1_id = (!empty($data['cate_1_details'])) ? $data['cate_1_details']->id : NULL;
        $cate_2_id = (!empty($data['cate_2_details'])) ? $data['cate_2_details']->id : NULL;
        $cate_3_id = (!empty($data['cate_3_details'])) ? $data['cate_3_details']->id : NULL;
        //

        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'en/ajax_all_ads/0/0/0/0/0';

        $config['total_rows'] = $this->Fronts->total_no_of_ad_data($type = NULL, $sort = NULL);

        $config['per_page'] = 1;
        $config['uri_segment'] = 8;
       
        $config['prev_link'] = 'prev';

        $config['prev_tag_open'] = '<div class="page"><span class="prev">';

        $config['prev_tag_close'] = '</span></div>';

        $config['next_link'] = 'next';

        $config['next_tag_open'] = '<div class="page"><span class="next ">';

        $config['next_tag_close'] = '</span></div>';

        $config['cur_tag_open'] = '<div class="page current"><span class="current"><a href="0">';

        $config['cur_tag_close'] = '</a></span></div>';

        $config['num_tag_open'] = '<div class="page"><span>';

        $config['num_tag_close'] = '</span></div>';

        $config['first_link'] = '<<';
        $config['first_tag_open'] = '<div class="page"><span>';
        $config['first_tag_close'] = '</span></div>';


        $config['last_link'] = '>>';
        $config['last_tag_open'] = '<div class="page"><span>';
        $config['last_tag_close'] = '</span></div>';

        //$config['first_link'] = FALSE;
        //$config['last_link'] = FALSE;
        
        $this->pagination->initialize($config);

        //$data['content'] = $this->Fronts->get_all_ad_data($type = NULL, $sort = NULL, $config['per_page'], $this->uri->segment(3));

        $data['content'] = $this->Fronts->get_all_ad_by_type_sort_category_id($type, $sort, $cate_1_id, $cate_2_id, $cate_3_id, $config['per_page'], $this->uri->segment(8));

        //$data['content'] = $this->Fronts->get_all_ad_by_type_sort_category_id($type, $cate_1_id, $cate_2_id, $cate_3_id, $sort);
        $this->load->view('ad/all_ad', $data);
    }

    public function ajax_all_ads($type = NULL, $cate_1_slug = NULL, $cate_2_slug = NULL, $cate_3_slug = NULL, $sort = NULL) {
        if ($type != NULL) {
            if ($type == 'all') {
                $type = NULL;
            } elseif ($type == 'private') {
                $type = 1;
            } elseif ($type == 'business') {
                $type = 2;
            }
        }
        if ($sort == 'price') {
            $sort = TRUE;
        } else {
            $sort = FALSE;
        }
        //
        $data['cate_1_details'] = $this->Fronts->get_category_by_alias(trim($cate_1_slug));
        $data['cate_2_details'] = $this->Fronts->get_category_by_alias(trim($cate_2_slug));
        $data['cate_3_details'] = $this->Fronts->get_category_by_alias(trim($cate_3_slug));
        $cate_1_id = (!empty($data['cate_1_details'])) ? $data['cate_1_details']->id : NULL;
        $cate_2_id = (!empty($data['cate_2_details'])) ? $data['cate_2_details']->id : NULL;
        $cate_3_id = (!empty($data['cate_3_details'])) ? $data['cate_3_details']->id : NULL;
        //
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'en/ajax_all_ads/0/0/0/0/0';

        $config['total_rows'] = $this->Fronts->total_no_of_ad_data($type = NULL, $sort = NULL);

        $config['per_page'] = 1;
        $config['uri_segment'] = 8;
        
        $config['prev_link'] = 'prev';

        $config['prev_tag_open'] = '<div class="page"><span class="prev">';

        $config['prev_tag_close'] = '</span></div>';

        $config['next_link'] = 'next';

        $config['next_tag_open'] = '<div class="page"><span class="next ">';

        $config['next_tag_close'] = '</span></div>';

        $config['cur_tag_open'] = '<div class="page current"><span class="current"><a href="0">';

        $config['cur_tag_close'] = '</a></span></div>';

        $config['num_tag_open'] = '<div class="page"><span>';

        $config['num_tag_close'] = '</span></div>';

        $config['first_link'] = '<<';
        $config['first_tag_open'] = '<div class="page"><span>';
        $config['first_tag_close'] = '</span></div>';

        $config['last_link'] = '>>';
        $config['last_tag_open'] = '<div class="page"><span>';
        $config['last_tag_close'] = '</span></div>';

        //$config['first_link'] = FALSE;
        //$config['last_link'] = FALSE;
        
        $this->pagination->initialize($config);

        //$data['content'] = $this->Fronts->get_all_ad_data($type = NULL, $sort = NULL, $config['per_page'], $this->uri->segment(3));
        //var_dump($this->uri->segment(9));
        $data['content'] = $this->Fronts->get_all_ad_by_type_sort_category_id($type, $sort, $cate_1_id, $cate_2_id, $cate_3_id, $config['per_page'], $this->uri->segment(8));
        //var_dump($data);
        $this->load->view('ad/private_ad', $data);
    }

    public function load_ads($type = NULL, $sort = NULL, $cate_1_slug = NULL, $cate_2_slug = NULL, $cate_3_slug = NULL) {
        if ($type != NULL) {
            if ($type == 'all') {
                $type = NULL;
            } elseif ($type == 'private') {
                $type = 1;
            } elseif ($type == 'business') {
                $type = 2;
            }
        }
        if ($sort == 'price') {
            $sort = TRUE;
        } else {
            $sort = FALSE;
        }
        //
        $data['cate_1_details'] = $this->Fronts->get_category_by_alias(trim($cate_1_slug));
        $data['cate_2_details'] = $this->Fronts->get_category_by_alias(trim($cate_2_slug));
        $data['cate_3_details'] = $this->Fronts->get_category_by_alias(trim($cate_3_slug));
        $cate_1_id = (!empty($data['cate_1_details'])) ? $data['cate_1_details']->id : NULL;
        $cate_2_id = (!empty($data['cate_2_details'])) ? $data['cate_2_details']->id : NULL;
        $cate_3_id = (!empty($data['cate_3_details'])) ? $data['cate_3_details']->id : NULL;
        //
        $data['content'] = $this->Fronts->get_all_ad_by_type_sort_category_id($type, $sort, $cate_1_id, $cate_2_id, $cate_3_id);
        $this->load->view('ad/private_ad', $data);
    }

    public function view($slug) {
        $data['content'] = $this->Fronts->get_ad_details_by_sulg(trim($slug));
        if (!empty($data['content'])) {
            $data['all_images'] = $this->Fronts->get_all_ad_image_by_ad_id($data['content']->id);
        }
//        echo "<pre>";
//        echo print_r($data['content']);
//        echo "<pre>";
        $this->load->view('ad/ad_details', $data);
    }

    public function category($c_1, $c_2 = NULL, $c_3 = NULL) {
        $cate_1 = trim($c_1);
        $cate_2 = trim($c_2);
        $cate_3 = trim($c_3);
        //Get value
        $data['min-price'] = $this->input->get('min-price', TRUE);
        $data['max-price'] = $this->input->get('max-price', TRUE);

        $data['cate_1_details'] = $this->Fronts->get_category_by_alias($cate_1);
        $data['content'] = $this->Fronts->get_all_ad_data_by_category_id($data['cate_1_details']->id);
        if ($cate_2 != NUll) {
            $data['cate_2_details'] = $this->Fronts->get_category_by_alias($cate_2);
            $data['content'] = $this->Fronts->get_all_ad_data_by_category_id($data['cate_1_details']->id, $data['cate_2_details']->id);
        }
        if ($cate_3 != NUll) {
            $data['cate_3_details'] = $this->Fronts->get_category_by_alias($cate_3);
            $data['content'] = $this->Fronts->get_all_ad_data_by_category_id($data['cate_1_details']->id, $data['cate_2_details']->id, $data['cate_3_details']->id);
        }
        //var_dump($data['content']);
        $this->load->view('ad/category_page', $data);
    }

    public function city($location_slug, $city_slug = NULL) {
        $l_slug = trim($location_slug);
        $c_slug = trim($city_slug);

        $location_details = $this->Fronts->get_location_details_by_alias($l_slug);
        if (!empty($location_details)) {
            $data['location_details'] = $location_details;
            $data['content'] = $this->Fronts->get_all_ad_data_by_location_id($data['location_details']->id);
            if ($c_slug != NUll) {
                $data['city_details'] = $this->Fronts->get_city_area_details_by_alias($c_slug);
                $data['content'] = $this->Fronts->get_all_ad_data_by_location_id($data['location_details']->id, $data['city_details']->id);
            }
        } else {
            $data['location_details'] = "";
            $data['content'] = "";
        }
        //var_dump($data['content']);
        $this->load->view('ad/city_page', $data);
    }

    public function find_parent_category($cate_id) {
        $cate_details = $this->Fronts->get_category_by_id($cate_id);
        echo $cate_details->parent_id;
    }

    public function search() {
        $data['query'] = $this->input->get('query', TRUE);
        $data['category_alias'] = $this->input->get('category', TRUE);
        $data['location_name'] = $this->input->get('location', TRUE);

        $cate_id = NULL;
        $location_id = NULL;
        if ($data['category_alias'] != NULL) {
            $category_details = $this->Fronts->get_category_by_alias(trim($data['category_alias']));
            $cate_id = $category_details->id;
        }
        if ($data['location_name'] != NULL) {
            $location_details = $this->Fronts->get_location_details_by_name(trim($data['location_name']));
            $location_id = $location_details->id;
        }

        $data['content'] = $this->Fronts->search_by_query_category_location($data['query'], $cate_id, $location_id);

        $this->load->view('search/search', $data);
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