<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->global_model->loginCheckStaff();
    }
    public function index()
    {
        $data['title'] = 'Staff Dashboard';
        $this->load->view('staff/header', $data);
        $this->load->view('staff/dashboard/index', $data);
        $this->load->view('staff/footer_dashboad', $data);
        // $this->load->view('staff/footer');
    }
}
