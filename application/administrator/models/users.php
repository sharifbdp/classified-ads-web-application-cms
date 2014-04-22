<?php

class Users extends CI_Model {

    public function totalUser() {
        $this->db->where("status  != ", '13');
        return $this->db->count_all('user');
    }

    public function getAllUser($limit = NULL, $offset = NULL) {
        $this->db->where('status !=', '13');
        $this->db->order_by("id", "desc");
        $this->db->limit($limit, $offset);
        return $this->db->get('user')->result_array();
    }

    public function getAllModule() {
        return $this->db->get('module_info')->result_array();
    }

    public function insertData($data) {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function insertModulePermission($insert, $module_id) {
        $data['user_id'] = $insert;
        $data['module_id'] = $module_id;

        return $this->db->insert('user_privileges', $data);
    }

    public function viewUser($lid) {
        $this->db->where('id', $lid);
        return $this->db->get('user')->row();
    }

    public function approveModel($this_uid, $moduleid) {
        $this->db->where('user_id', $this_uid);
        $this->db->where('module_id', $moduleid);
        return $this->db->get('user_privileges')->num_rows();
    }

    public function updateData($lid, $data) {
        $this->db->where('id', $lid);
        return $this->db->update('user', $data);
    }

    public function deleteModulePermission($lid) {
        $this->db->where('user_id', $lid);
        $this->db->delete('user_privileges');
    }

    public function deleteUser($did, $data) {
        $this->db->where('id', $did);
        return $this->db->update('user', $data);
    }

    /**
     * This is for Forgot Password
     * @param type $email
     * @return type
     */
    public function getUserByEmail($email) {
        $this->db->where('email', $email);
        $result = $this->db->get('user')->row();
        return $result;
    }

    /*
     * Check Email Address
     */

    public function checkEmail($email) {

        $this->db->where('email', $email);

        $query = $this->db->get('user');

        $norows = $query->num_rows();

        if ($norows > 0) {
            return true;
        } else {
            return false;
        }
    }

}