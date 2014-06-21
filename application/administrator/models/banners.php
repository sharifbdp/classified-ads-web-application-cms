<?php class Banners extends CI_Model {

    public function totalData() {
        $this->db->where("status != ", '13');
        return $this->db->get('banner')->num_rows;
    }

    public function getAllData($limit = NULL, $offset = NULL) {
        $this->db->from('banner');
        $this->db->order_by("serial", "ASC");
        $this->db->where("status != ", '13');
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getData($mid) {
        $this->db->from('banner');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertData($data) {
        return $this->db->insert('banner', $data);
    }

    public function changeData($data, $mid) {

        $this->db->where('id', $mid);
        $query = $this->db->update('banner', $data);
        return $query;
    }

    public function getAllServiceSubMenu($mid) {
        $this->db->from('sub_menu');
        $this->db->where('status', '1');
        $this->db->where('mid', $mid);
        $this->db->order_by("name", "ASC");
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getSubMenuName($smid) {

        $this->db->where('status', '1');
        $this->db->where('id', $smid);
        $query = $this->db->get('sub_menu')->row();
        return $query;
    }

}
