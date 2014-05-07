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

    public function time_ago($time) {
        $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
        $lengths = array("60", "60", "24", "7", "4.35", "12", "10");

        $now = time();

        $difference = $now - $time;
        $tense = "ago";

        for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
            $difference /= $lengths[$j];
        }

        $difference = round($difference);

        if ($difference != 1) {
            $periods[$j].= "s";
        }

        return "$difference $periods[$j] ago";
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

    public function get_area_list_by_location_id($id) {
        $this->db->where('lid', $id);
        $this->db->where('status', '1');
        $query = $this->db->get('poster_location_city')->result_array();
        return $query;
    }

    public function get_category_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('category')->row();
    }

    public function get_category_details_by_id($id) {
        $this->db->select('C.parent_id as parent_id, C.name as sub_name, C.alias as sub_alias, P.name as main_name, P.alias as main_alias');
        $this->db->from('category as C');
        $this->db->join('category as P', 'C.parent_id = P.id', 'inner');
        $this->db->where('C.id', $id);
        return $this->db->get('category')->row();
    }

    public function get_location_details_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('poster_location')->row();
    }

    public function get_city_details_by_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('poster_location_city')->row();
    }

    public function check_poster_email_existence($email) {
        $this->db->where('email', $email);
        $query = $this->db->get('poster')->row();
        $norows = $this->db->count_all_results();

        if ($norows < 0) {
            return false;
        } else {
            return $query;
        }
    }

    public function insert_ad_poster($dp) {
        $this->db->insert('poster', $dp);
        return $this->db->insert_id();
    }

    public function insert_advertizement($data) {
        $this->db->insert('advertizement', $data);
        return $this->db->insert_id();
    }

    public function insert_ad_image($dp) {
        return $this->db->insert('advertizement_image', $dp);
    }

    public function update_advertizement_by_id($data, $ad_id) {
        $data['entry_date'] = date('Y-m-d H:i:s');
        $this->db->where('id', $ad_id);
        return $this->db->update('advertizement', $data);
    }

    public function update_ad_image_by_ad_id($da_ad, $ad_id) {
        $this->db->where('ad_id', $ad_id);
        return $this->db->update('advertizement_image', $da_ad);
    }

    public function update_poster_by_id($dp, $p_id) {
        $this->db->where('id', $p_id);
        return $this->db->update('poster', $dp);
    }

    public function get_advertizement_by_id($ad_id) {
        $this->db->where('id', $ad_id);
        return $this->db->get('advertizement')->row();
    }

    public function get_ad_details_by_sulg($slug) {
        $this->db->select('A.*, C.name as cat_name, P.name as poster_name, P.email as poster_email, P.phone as poster_phone, P.status as poster_status, L.name as location, CT.name as city');
        $this->db->from('advertizement as A');
        $this->db->join('category as C', 'C.id = A.cid', 'inner');
        $this->db->join('poster as P', 'P.id = A.p_id', 'inner');
        $this->db->join('poster_location as L', 'L.id = A.ad_location', 'inner');
        $this->db->join('poster_location_city as CT', 'CT.id = A.ad_city', 'inner');

        $this->db->where('A.slug', $slug);
        return $this->db->get()->row();
    }

    public function get_ad_details_by_id($id) {
        $this->db->select('A.*, C.name as cat_name, P.name as poster_name, P.email as poster_email, P.phone as poster_phone, P.status as poster_status, L.name as location, CT.name as city');
        $this->db->from('advertizement as A');
        $this->db->join('category as C', 'C.id = A.cid', 'inner');
        $this->db->join('poster as P', 'P.id = A.p_id', 'inner');
        $this->db->join('poster_location as L', 'L.id = A.ad_location', 'inner');
        $this->db->join('poster_location_city as CT', 'CT.id = A.ad_city', 'inner');

        $this->db->where('A.id', $id);
        return $this->db->get()->row();
    }

    public function get_all_ad_data($limit = NULL, $offset = NULL) {
        $this->db->select('A.*, C.name as cat_name, P.name as poster_name, P.email as poster_email, P.phone as poster_phone, P.status as poster_status, L.name as location, CT.name as city');
        $this->db->from('advertizement A');
        $this->db->join('category C', 'C.id = A.cid', 'inner');
        $this->db->join('poster P', 'P.id = A.p_id', 'inner');
        $this->db->join('poster_location L', 'L.id = A.ad_location', 'inner');
        $this->db->join('poster_location_city CT', 'CT.id = A.ad_city', 'inner');

        if ($limit != NULL) {
            $this->db->limit($limit, $offset);
        }
        $this->db->where('A.status', 0);
        $this->db->order_by('A.entry_date', 'DESC');
        return $this->db->get()->result_array();
    }

    public function get_all_ad_image_by_ad_id($ad_id) {
        $this->db->where('ad_id', $ad_id);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('advertizement_image')->result_array();
    }

    public function count_ads_by_category_id($cid) {
        $this->db->where('cid', $cid);
        $this->db->where('status', 0);
        return $this->db->count_all_results('advertizement');
    }

    public function count_ads_by_location_id($ad_location) {
        $this->db->where('ad_location', $ad_location);
        $this->db->where('status', 0);
        return $this->db->count_all_results('advertizement');
    }

    public function get_next_ad($parent_id) {
        $this->db->where('id', $parent_id + 1);
        $this->db->where('status', 0);
        return $this->db->get('advertizement')->row();
    }

    public function get_previous_ad($parent_id) {
        $this->db->where('id', $parent_id - 1);
        $this->db->where('status', 0);
        return $this->db->get('advertizement')->row();
    }

    public function get_super_parent_cate_ad($cate_id) {
        $cate_details = $this->get_category_by_id($cate_id);
        if ($cate_details->parent_id != 0) {
            $this->get_super_parent_cate_ad($cate_details->parent_id);
        } else {
            echo $cate_details->id;
        }
    }
   

}
