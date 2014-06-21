<?php

class Flinks extends CI_Model {

    public function totalData() {
        $this->db->where("status != ", '13');
        return $this->db->get('flink')->num_rows;
    }

    public function getAllData($limit = NULL, $offset = NULL) {
        $this->db->from('flink');
        $this->db->order_by("position", "ASC");
        $this->db->order_by("serial", "ASC");
        $this->db->where("status != ", '13');
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getData($mid) {
        $this->db->from('flink');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertData($data) {
        return $this->db->insert('flink', $data);
    }

    public function changeData($data, $mid) {

        $this->db->where('id', $mid);
        $query = $this->db->update('flink', $data);
        return $query;
    }

    public function updateFooterHeading($data, $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('flink_position_name', $data);
        return $query;
    }

    public function getPosHeadByID($id) {
        $this->db->from('flink_position_name');
        $this->db->where("id", $id);
        
        $query = $this->db->get()->row();
        return $query;
    }

    public function getAllPosHeading() {
        $this->db->from('flink_position_name');
        $this->db->order_by("id", "ASC");
        $query = $this->db->get()->result_array();
        return $query;
    }

}
