<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
    public function doctor_login($doctor_email_id, $doctor_password)
    {
        $query = $this->db->where('doctor_email_id', $doctor_email_id);
        $query = $this->db->where('doctor_password', $doctor_password);
        $query = $this->db->where('doctor_account_status', 'A');
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->get('doctor');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function fetch_year()
    {
        $this->db->select('inserted_date');
        $this->db->from('patient');
        $this->db->group_by('created_date');
        $this->db->order_by('created_date', 'DESC');
        return $this->db->get();
    }

    public function fetch_chart_data($created_date)
    {
        $this->db->where('created_date', $created_date);
        $this->db->order_by('patient_unique_id', 'ASC');
        return $this->db->get('patient');
    }
}
