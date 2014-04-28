<?php

class Ads extends CI_Model {

    public function totalData() {
        $this->db->where("status != ", '13');
        return $this->db->get('advertizement')->num_rows;
    }

    public function getAllData($limit = NULL, $offset = NULL) {
        $this->db->from('advertizement');
        $this->db->order_by("cid", "ASC");
        $this->db->order_by("serial", "ASC");
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

}