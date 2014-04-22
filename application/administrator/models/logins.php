<?php

class Logins extends CI_Model {

    public function checkAdmin($email, $password) {

        if (!empty($email) && !empty($password)) {

            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->where('status', '1');
            $this->db->from('user');
            $query = $this->db->get()->row();
            $norows = $this->db->count_all_results();

            if ($norows > 0) {

                return $query;
            } else {
                return NULL;
            }
        } else {
            return NULL;
        }
    }

    public function updateLoginInfo($uid) {
        $data['last_login_date'] = date('Y-m-d h:i:s');
        $data['last_login_ip'] = $_SERVER['REMOTE_ADDR'];


        $this->db->where('id', $uid);
        $query = $this->db->update('user', $data);

        return $query;
    }

}
