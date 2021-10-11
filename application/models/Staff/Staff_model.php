<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Staff_model extends CI_Model
{
    public function staff_login($staff_email_id, $staff_password)
    {
        $query = $this->db->where('staff_email_id', $staff_email_id);
        $query = $this->db->where('staff_password', $staff_password);
        $query = $this->db->where('staff_account_status', 'A');
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->get('staff');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
