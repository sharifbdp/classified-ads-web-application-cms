<?php

class Fronts extends CI_Model {

    public function getAllMenu($limit = NULL, $offset = NULL) {

        $this->db->where('status', '1');
        $this->db->order_by('serial', 'asc');

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('main_menu')->result_array();
    }

    public function getSubmenu($mid) {

        $this->db->where('status', '1');
        $this->db->where('mid', $mid);
        $this->db->order_by('serial', 'asc');

        return $this->db->get('sub_menu')->result_array();
    }

    public function getMainMenuName($m_alias) {

        $this->db->where('m_alias', $m_alias);

        return $this->db->get('main_menu')->row();
    }

    public function getSubMenuName($s_alias) {

        $this->db->where('s_alias', $s_alias);

        return $this->db->get('sub_menu')->row();
    }

    public function getmid($m_alias) {

        $this->db->where('m_alias', $m_alias);

        return $this->db->get('main_menu')->row();
    }

    public function getsmid($s_alias) {

        $this->db->where('s_alias', $s_alias);

        return $this->db->get('sub_menu')->row();
    }

    public function getWelcomeNote($id) {

        $this->db->where('status', '1');
        $this->db->where('id', $id);

        return $this->db->get('information')->row();
    }

    public function getMalias($mid) {

        $this->db->where('id', $mid);

        return $this->db->get('main_menu')->row();
    }

    public function getInfo($mid, $smid = NULL) {

        $this->db->where('status', '1');
        $this->db->where('mid', $mid);

        if ($smid != NULL) {
            $this->db->where('smid', $smid);
        }

        return $this->db->get('information')->row();
    }

    public function get_all_quick_links($limit = NULL, $offset = NULL) {

        $this->db->where('status', '1');
        $this->db->order_by('serial', 'ASC');

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('quick_link')->result_array();
    }

    public function get_quick_links_details_by_slug($alias) {
        $this->db->from('quick_link');
        $this->db->where("alias", $alias);

        $query = $this->db->get()->row();
        return $query;
    }

    public function get_our_services($limit = NULL, $offset = NULL) {

        $this->db->where('status', '1');
        $this->db->order_by('serial', 'ASC');

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('our_services')->result_array();
    }

    public function get_service_details_by_slug($alias) {
        $this->db->from('our_services');
        $this->db->where("alias", $alias);

        $query = $this->db->get()->row();
        return $query;
    }

    public function get_latest_testimonial() {
        $this->db->from('testimonial');
        $this->db->order_by('serial', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get()->row();
        return $query;
    }

    public function getAllBanner($limit = NULL, $offset = NULL) {

        $this->db->where('status', '1');
        $this->db->order_by('serial', 'ASC');
        $this->db->order_by('id', 'DESC');

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('banner')->result_array();
    }

    public function getFooterLinksByPosition($position, $limit = NULL, $offset = NULL) {

        $this->db->where('status', '1');
        $this->db->where('position', $position);
        $this->db->order_by('serial', 'ASC');

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('flink')->result_array();
    }

    public function getPosHeadByID($id) {
        $this->db->from('flink_position_name');
        $this->db->where("id", $id);

        $query = $this->db->get()->row();
        return $query;
    }

    /*     * * Socila Links * */

    public function getAllSocialLinks($name) {

        $this->db->where('status', '1');
        $this->db->where('name', $name);

        return $this->db->get('social_link')->row();
    }

    public function get_footer_link_details_by_alias($alias) {
        $this->db->from('flink');
        $this->db->where("alias", $alias);

        $query = $this->db->get()->row();
        return $query;
    }

    /* new */

    public function getTreeCategory($parent, $level = 0, $selectid = NULL) {
        $this->db->from('category');
        $this->db->select('id, name, parent_id');
        $this->db->where('parent_id', $parent);
        $this->db->order_by('name', "ASC");
        $query = $this->db->get()->result_array();

        foreach ($query as $info) {
            $disabled = ($info['parent_id'] == 0) ? 'disabled=disabled' : '';
            if ($selectid != NULL) {
                $active = ($info['id'] == $selectid) ? '"selected=selected"' : '';
                echo "<option value='" . $info['id'] . "'" . " {$active}>" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
            } else {
                echo "<option value='" . $info['id'] . "'" . " {$disabled}>" . str_repeat('---', $level) . " &rsaquo;" . $info['name'] . "</option>";
            }

            $this->getTreeCategory($info['id'], $level + 1, $selectid);
        }
    }

    public function get_all_location_data($limit = NULL, $offset = NULL) {
        $this->db->from('poster_location');
        $this->db->where("status != ", '13');
        $this->db->order_by("name", "asc");

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get()->result_array();
    }

    public function get_all_parent_category($limit = NULL, $offset = NULL) {
        $this->db->from('category');
        $this->db->where("parent_id", '0');
        $this->db->where("status != ", '13');
        $this->db->order_by("serial", "asc");

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get()->result_array();
    }

}
