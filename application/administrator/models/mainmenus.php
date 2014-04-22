<?php

class Mainmenus extends CI_Model {

    public function totalMainMenu() {
        $this->db->where("status != ", '13');
        return $this->db->get('main_menu')->num_rows;
    }

    public function getMainMenu($limit = NULL, $offset = NULL) {
        $this->db->from('main_menu');
        $this->db->where("status != ", '13');
        $this->db->order_by("serial", "asc");

        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllPageTemplate() {
        $this->db->from('page_template');
        $this->db->order_by("template_name", "asc");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insertMenu($data) {
        return $this->db->insert('main_menu', $data);
    }

    public function getMenu($mid) {
        $this->db->from('main_menu');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateMenu($data, $mid) {

        $data['last_action_date'] = date('Y-m-d H:i:s');
        $data['last_action_user'] = $this->session->userdata('uid');

        $this->db->where('id', $mid);
        $query = $this->db->update('main_menu', $data);
        return $query;
    }

    public function changeMenuStatus($mid, $status) {
        $this->db->where('id', $mid);
        $query = $this->db->update('main_menu', array('status' => $status));
        return $query;
    }

    public function getAllMainMenu() {
        $this->db->from('main_menu');
        $this->db->where('status', '1');
        $this->db->order_by("name", "asc");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getAllMainMenuForInfo() {
        $this->db->from('main_menu');
        $this->db->where('status', '1');

        $this->db->order_by("name", "asc");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function aliasExists($m_alias, $id) {

        $this->db->where('m_alias', $m_alias);
        $this->db->where_not_in('id', $id);

        $query = $this->db->get('main_menu');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return false;
        } else {
            return true;
        }
    }

}
