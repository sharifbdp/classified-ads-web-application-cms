<?php

class Suppliers extends CI_Model {

    public function totalData() {
        $this->db->where("status != ", '13');
        return $this->db->get('slider_supplier')->num_rows;
    }

    public function getAllData($limit = NULL, $offset = NULL) {
        $this->db->from('slider_supplier');
        $this->db->order_by("serial", "ASC");
        $this->db->where("status != ", '13');
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getData($mid) {
        $this->db->from('slider_supplier');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertData($data) {
        return $this->db->insert('slider_supplier', $data);
    }

    public function changeData($data, $mid) {
        $this->db->where('id', $mid);
        $query = $this->db->update('slider_supplier', $data);
        return $query;
    }

}
