<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('doctor/doctor_model');
    }
    public function login()
    {
        $doctor_email_id = $this->security->xss_clean($this->input->post('doctor_email_id'));
        $doctor_password = $this->security->xss_clean($this->input->post('doctor_password'));
        $doctor_dtl = $this->doctor_model->doctor_login($doctor_email_id, $doctor_password);
        if ($doctor_dtl) {
            $usersdate = array(

                'doctor_unique_id' => $doctor_dtl->doctor_unique_id,
                'doctor_id' => $doctor_dtl->doctor_id,
                'doctor_email_id' => $doctor_dtl->doctor_email_id,
                'doctor_username' => $doctor_dtl->doctor_username,
                'doctor_phone' => $doctor_dtl->doctor_phone,
                'doctor_account_status' => $doctor_dtl->doctor_account_status,
            );
            $this->session->set_userdata($usersdate);
            redirect('doctor/dashboard');
        } else {
            $this->session->set_flashdata('message', 'Invalid email or password.');
            redirect('doctor/login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('doctor/login');
    }
}
