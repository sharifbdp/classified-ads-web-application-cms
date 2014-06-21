<?php

class Brands extends CI_Model {

    public function total_data() {
        $this->db->where("status != ", '13');
        return $this->db->get('category_brand')->num_rows;
    }

    public function get_all_data($limit = NULL, $offset = NULL) {
        $this->db->from('category_brand');
        $this->db->where("status != ", '13');
        $this->db->order_by("cid", "asc");
        $this->db->order_by("name", "asc");

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }
        $query = $this->db->get()->result_array();

        return $query;
    }

    public function insert_data($data) {
        return $this->db->insert('category_brand', $data);
    }

    public function get_data_by_id($cid) {
        $this->db->from('category_brand');
        $this->db->where("id", $cid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function update_data($data, $cid) {

        $this->db->where('id', $cid);
        $query = $this->db->update('category_brand', $data);
        return $query;
    }

}
