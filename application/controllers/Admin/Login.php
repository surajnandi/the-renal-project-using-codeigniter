<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		// $this->logged_in();
		$this->load->model('global_model');
		$this->global_model->afterloginAdmin();
	}
	public function index()
	{
		$data['title'] = 'Admin Login';
		$data['show_title'] = 'Admin Login';
		$this->load->view('admin/login', $data);
	}
}
