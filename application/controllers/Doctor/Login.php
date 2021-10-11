<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->logged_in();
        $this->load->model('global_model');
        $this->global_model->afterloginDoctor();
    }
    public function index()
    {
        $data['title'] = 'Doctor Login';
        $data['show_title'] = 'Doctor Login';
        $this->load->view('doctor/login', $data);
    }
}
