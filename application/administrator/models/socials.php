<?php class Socials extends CI_Model {

    public function totalElearningList() {
        $this->db->where("status != ", '13');
        return $this->db->get('social_link')->num_rows;
    }

    public function getElearningList($limit = NULL, $offset = NULL) {
        $this->db->from('social_link');
        $this->db->where("status != ", '13');
        // $this->db->order_by("serial", "asc");
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function insertElearning($data) {
        return $this->db->insert('social_link', $data);
    }

    public function getElearning($mid) {
        $this->db->from('social_link');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateElearning($data, $mid) {

        $data['last_action_date'] = date('Y-m-d H:i:s');
        $data['last_action_user'] = $this->session->userdata('uid');

        $this->db->where('id', $mid);
        $query = $this->db->update('social_link', $data);
        return $query;
    }

}
