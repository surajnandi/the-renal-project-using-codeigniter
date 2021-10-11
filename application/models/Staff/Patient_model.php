<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Patient_model extends CI_Model
{
    public function patient_add_db($usersdate)
    {
        $this->db->insert('patient', $usersdate);
        return $this->db->insert_id();
    }
    public function patient_list_db()
    {
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        // $query = $this->db->where('notice_id',$notice_id);
        // $query = $this->db->limit(0);
        $query = $this->db->order_by('patient_unique_id', 'desc');
        $query = $this->db->get('patient');
        if ($query->num_rows() > 0) {
            return $query->result();
            // return $query->result_array();
            // return $query->row();
        }
    }
    public function patient_show_db($patient_id)
    {
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->where('patient_id', $patient_id);
        // $query = $this->db->limit(0);
        $query = $this->db->get('patient');
        if ($query->num_rows() > 0) {
            // return $query->result();
            // return $query->result_array();
            return $query->row();
        }
    }
    public function patient_edit_db($patient_id, $usersdate)
    {
        $query = $this->db->where('patient_id', $patient_id);
        $this->db->update('patient', $usersdate);
    }
}
