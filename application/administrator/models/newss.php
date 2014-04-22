<?php

class Newss extends CI_Model {

    public function totalData() {
        $this->db->where("status != ", '13');
        return $this->db->get('news')->num_rows;
    }

    public function getAllData($limit = NULL, $offset = NULL) {
        $this->db->from('news');
        $this->db->order_by("serial", "ASC");
        $this->db->where("status != ", '13');
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getData($mid) {
        $this->db->from('news');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertData($data) {
        return $this->db->insert('news', $data);
    }

    public function changeData($data, $mid) {

        $this->db->where('id', $mid);
        $query = $this->db->update('news', $data);
        return $query;
    }

}
