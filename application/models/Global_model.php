<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Global_model extends CI_Model
{

	// Admin Login Check
	public function loginCheckAdmin()
	{
		if (!$this->session->userdata('admin_id')) {
			redirect('admin/login');
		}
	}
	public function afterloginAdmin()
	{
		if ($this->session->userdata('admin_id')) {
			redirect('admin/dashboard');
		}
	}


	// Staff Login Check
	public function loginCheckStaff()
	{
		if (!$this->session->userdata('staff_id')) {
			redirect('staff/login');
		}
	}
	public function afterloginStaff()
	{
		if ($this->session->userdata('staff_id')) {
			redirect('staff/dashboard');
		}
	}


	// Doctor Login Check

	public function loginCheckDoctor()
	{
		if (!$this->session->userdata('doctor_id')) {
			redirect('doctor/login');
		}
	}
	public function afterloginDoctor()
	{
		if ($this->session->userdata('doctor_id')) {
			redirect(base_url('doctor/dashboard'));
		}
	}
}
