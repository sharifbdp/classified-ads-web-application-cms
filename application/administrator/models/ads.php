<?php

class Ads extends CI_Model {

    public function totalData() {
        $this->db->where("status != ", '13');
        return $this->db->get('advertizement')->num_rows;
    }

    public function getAllData($limit = NULL, $offset = NULL) {
        $this->db->from('advertizement');
        $this->db->order_by("id", "DESC");
        $this->db->where("status != ", '13');
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();
        return $query;
    }

    public function getData($mid) {
        $this->db->from('advertizement');
        $this->db->where("id", $mid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function insertData($data) {
        return $this->db->insert('advertizement', $data);
    }

    public function changeData($data, $mid) {

        $this->db->where('id', $mid);
        $query = $this->db->update('advertizement', $data);
        return $query;
    }

    public function getTreeCategory($parent, $level = 0, $selectid = NULL) {
        $this->db->from('category');
        $this->db->select('id, name, parent_id');
        $this->db->where('parent_id', $parent);
        $this->db->order_by('name', "ASC");
        $query = $this->db->get()->result_array();

        foreach ($query as $info) {
            $disabled = ($info['parent_id'] == 0) ? 'disabled=disabled' : '';
            if ($selectid != NULL) {
                $active = ($info['id'] == $selectid) ? 'selected=selected' : '';
                echo "<option value='" . $info['id'] . "'" . " {$active} {$disabled}>" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
            } else {
                echo "<option value='" . $info['id'] . "'" . " {$disabled}>" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
            }

            $this->getTreeCategory($info['id'], $level + 1, $selectid);
        }
    }

    public function aliasExists($alias, $id) {

        $this->db->where('alias', $alias);
        $this->db->where_not_in('id', $id);

        $query = $this->db->get('advertizement');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function get_poster_details_by_id($p_id) {
        $this->db->where('id', $p_id);
        $result = $this->db->get('poster')->row();
        return $result;
    }

    public function get_ad_details_by_id($id) {
        $this->db->select('A.*, C.name as cat_name, P.name as poster_name, P.email as poster_email, P.phone as poster_phone, P.status as poster_status, L.name as location, CT.name as city');
        $this->db->from('advertizement as A');
        $this->db->join('category as C', 'C.id = A.cate_2', 'inner');
        $this->db->join('poster as P', 'P.id = A.p_id', 'inner');
        $this->db->join('poster_location as L', 'L.id = A.ad_location', 'inner');
        $this->db->join('poster_location_city as CT', 'CT.id = A.ad_city', 'inner');

        $this->db->where('A.id', $id);
        return $this->db->get()->row();
    }
    
    public function get_all_ad_image_by_ad_id($ad_id) {
        $this->db->where('ad_id', $ad_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('advertizement_image')->result_array();
    }
}
