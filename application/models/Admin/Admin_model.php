<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
	public function admin_login($admin_email_id, $admin_password)
	{
		$query = $this->db->where('admin_email_id', $admin_email_id);
		$query = $this->db->where('admin_password', $admin_password);
		$query = $this->db->where('admin_account_status', 'A');
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->get('admin');
		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
	}
	/* ---------------------------- Branch -------------------------------- */
	// Branch Query
	public function branch_add_db($usersdate)
	{
		$this->db->insert('branch', $usersdate);
		return $this->db->insert_id();
	}
	public function branch_list_db()
	{
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->order_by('branch_unique_id', 'desc');
		$query = $this->db->get('branch');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function branch_show_db($branch_id)
	{
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->where('branch_id', $branch_id);
		$query = $this->db->get('branch');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}
	public function branch_edit_db($branch_id, $usersdate)
	{
		$query = $this->db->where('branch_id', $branch_id);
		$this->db->update('branch', $usersdate);
	}

	/* ---------------------------- Staff ------------------------------- */
	// Staff Query
	public function staff_add_db($usersdate)
	{
		$this->db->insert('staff', $usersdate);
		return $this->db->insert_id();
	}
	public function staff_list_db()
	{
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->order_by('staff_unique_id', 'desc');
		$query = $this->db->get('staff');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function staff_show_db($staff_id)
	{
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->where('staff_id', $staff_id);
		$query = $this->db->get('staff');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}
	public function staff_edit_db($staff_id, $usersdate)
	{
		$query = $this->db->where('staff_id', $staff_id);
		$this->db->update('staff', $usersdate);
	}

	/* --------------------------- Doctor -------------------------------- */
	// Doctor Query
	public function doctor_add_db($usersdate)
	{
		$this->db->insert('doctor', $usersdate);
		return $this->db->insert_id();
	}
	public function doctor_list_db()
	{
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->order_by('doctor_unique_id', 'desc');
		$query = $this->db->get('doctor');
		if ($query->num_rows() > 0) {
			return $query->result();
		}
	}
	public function doctor_show_db($doctor_id)
	{
		$query = $this->db->where('active_flag', 'Y');
		$query = $this->db->where('del_flag', 'N');
		$query = $this->db->where('doctor_id', $doctor_id);
		$query = $this->db->get('doctor');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}
	public function doctor_edit_db($doctor_id, $usersdate)
	{
		$query = $this->db->where('doctor_id', $doctor_id);
		$this->db->update('doctor', $usersdate);
	}
}
