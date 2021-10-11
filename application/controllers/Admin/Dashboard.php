<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('global_model');
		$this->global_model->loginCheckAdmin();
	}
	public function index()
	{
		$data['title'] = 'Admin Dashboard';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard/index', $data);
		$this->load->view('admin/footer');
		$this->load->view('admin/footer_dashboad', $data);
	}
}
