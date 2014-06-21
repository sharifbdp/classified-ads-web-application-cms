<?php

class Userauth extends CI_Model {

    public function powerUser($uid) {
        $this->db->where('id', $uid);
        // user_status: 1 = Super user, 2 = Normal user
        $this->db->where('user_status', '1');

        // if return 1:true then this user power user or return 0:false then this user is normal user

        return $no_rows = $this->db->get('user')->num_rows();
    }

    public function modulePermission($uid, $modid) {
        $this->db->where('user_id', $uid);
        $this->db->where('module_id', $modid);

        //if return 1:true then this user permit for this module otherwise not permission 

        return $this->db->get('user_privileges')->num_rows();
    }

}
