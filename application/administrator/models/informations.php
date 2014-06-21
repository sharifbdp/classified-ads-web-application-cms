<?php

class Informations extends CI_Model {

    public function totalInformation() {
        $this->db->where("status != ", '13');
        return $this->db->get('information')->num_rows;
    }

    public function getAllInformation($limit = NULL, $offset = NULL) {
        $this->db->from('information');
        $this->db->order_by("id", "desc");
        $this->db->where("status != ", '13');
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getInformation($mid) {
        $this->db->from('information');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertInformation($data) {
        return $this->db->insert('information', $data);
    }

    public function changeInfo($data, $mid) {
        $data['last_action_date'] = date('Y-m-d h:i:s');
        $data['last_action_user'] = $this->session->userdata('uid');
        $this->db->where('id', $mid);
        $query = $this->db->update('information', $data);
        return $query;
    }

}
