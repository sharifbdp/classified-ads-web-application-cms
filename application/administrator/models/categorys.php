<?php

class Categorys extends CI_Model {

    public function totalMainCategory() {
        $this->db->where("status != ", '13');
        return $this->db->get('category')->num_rows;
    }

    public function getMainCategory($limit = NULL, $offset = NULL) {
        $this->db->from('category');
        $this->db->where("status != ", '13');

        $this->db->order_by("parent_id", "asc");
        $this->db->order_by("serial", "asc");
        
        $this->db->limit($limit, $offset);
        $query = $this->db->get()->result_array();

        return $query;
    }

    public function insertCategory($data) {
        return $this->db->insert('category', $data);
    }

    public function getCategory($cid) {
        $this->db->from('category');
        $this->db->where("id", $cid);
        $query = $this->db->get()->row();
        return $query;
    }

    public function updateCategory($data, $cid) {

        $this->db->where('id', $cid);
        $query = $this->db->update('category', $data);
        return $query;
    }

    public function getAllMainCategory() {
        $this->db->from('category');
        $this->db->where('status', '1');
        $this->db->where('parent_id', '0');
        $this->db->order_by("name", "asc");
        $query = $this->db->get()->result_array();
        return $query;
    }

//    public function getTreeCategory($parent, $level = 0) {
//        $this->db->from('category');
//        $this->db->select('id, name');
//        $this->db->where('parent_id', $parent);
//        $query = $this->db->get()->result_array();
//
//        foreach ($query as $info) {
//            echo "<option value='" . $info['id'] . "'" . ">" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
//
//            $this->getTreeCategory($info['id'], $level + 1);
//        }
//    }

    public function getTreeCategory($parent, $level = 0, $selectid = NULL) {
        $this->db->from('category');
        $this->db->select('id, name');
        $this->db->where('parent_id', $parent);
        $this->db->order_by('name', "ASC");
        $query = $this->db->get()->result_array();

        foreach ($query as $info) {
            if ($selectid != NULL) {
                if ($info['id'] == $selectid) {
                    $selected = "selected = selected";
                } else {
                    $selected = "";
                }
                echo "<option value='" . $info['id'] . "'" . " {$selected}>" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
            } else {
                echo "<option value='" . $info['id'] . "'" . ">" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
            }

            $this->getTreeCategory($info['id'], $level + 1, $selectid);
        }
    }

    public function aliasExists($alias, $id) {

        $this->db->where('alias', $alias);
        $this->db->where_not_in('id', $id);

        $query = $this->db->get('category');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return false;
        } else {
            return true;
        }
    }

}
