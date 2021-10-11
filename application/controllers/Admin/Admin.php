<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('admin/admin_model');
	}
	public function login()
	{
		$admin_email_id = $this->security->xss_clean($this->input->post('admin_email_id'));
		$admin_password = $this->security->xss_clean($this->input->post('admin_password'));
		$admin_dtl = $this->admin_model->admin_login($admin_email_id, $admin_password);
		if ($admin_dtl) {
			$usersdate = array(
				// `admin_unique_id`, `admin_id`, `admin_email_id`, `admin_password`, `admin_name`, `admin_account_status`, `admin_role`
				'admin_unique_id' => $admin_dtl->admin_unique_id,
				'admin_id' => $admin_dtl->admin_id,
				'admin_email_id' => $admin_dtl->admin_email_id,
				'admin_username' => $admin_dtl->admin_username,
				'admin_phone' => $admin_dtl->admin_phone,
				// 'admin_role' => $admin_dtl->admin_role,
				'admin_account_status' => $admin_dtl->admin_account_status,
				// 'crud_by' => '$admin_dtl->admin_role' . '|' . $admin_dtl->admin_id
				// 'crud_by' => 'AC' . '|' . $admin_dtl->admin_id
			);
			$this->session->set_userdata($usersdate);
			redirect('admin/dashboard');
		} else {
			$this->session->set_flashdata('message', 'Invalid email or password.');
			redirect('admin/login');
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/login');
	}
}
