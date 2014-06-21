<?php

class Locations extends CI_Model {

    public function total_data() {
        $this->db->where("status != ", '13');
        return $this->db->get('poster_location')->num_rows;
    }

    public function get_all_data($limit = NULL, $offset = NULL) {
        $this->db->from('poster_location');
        $this->db->where("status != ", '13');
        $this->db->order_by("name", "asc");

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        $query = $this->db->get()->result_array();

        return $query;
    }

    public function insert_data($data) {
        return $this->db->insert('poster_location', $data);
    }

    public function get_data_by_id($cid) {
        $this->db->from('poster_location');
        $this->db->where("id", $cid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function update_data($data, $cid) {

        $this->db->where('id', $cid);
        $query = $this->db->update('poster_location', $data);
        return $query;
    }

    public function aliasExists($alias, $id) {

        $this->db->where('alias', $alias);
        $this->db->where_not_in('id', $id);

        $query = $this->db->get('poster_location');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return false;
        } else {
            return true;
        }
    }

}
