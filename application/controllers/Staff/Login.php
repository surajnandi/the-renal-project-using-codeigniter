<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->logged_in();
        $this->load->model('global_model');
        $this->global_model->afterloginStaff();
    }
    public function index()
    {
        $data['title'] = 'Staff Login';
        $data['show_title'] = 'Staff Login';
        $this->load->view('staff/login', $data);
    }
}
