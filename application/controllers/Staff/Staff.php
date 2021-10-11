<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('staff/staff_model');
    }
    public function login()
    {
        $staff_email_id = $this->security->xss_clean($this->input->post('staff_email_id'));
        $staff_password = $this->security->xss_clean($this->input->post('staff_password'));
        $staff_dtl = $this->staff_model->staff_login($staff_email_id, $staff_password);
        if ($staff_dtl) {
            $usersdate = array(

                'staff_unique_id' => $staff_dtl->staff_unique_id,
                'staff_id' => $staff_dtl->staff_id,
                'staff_email_id' => $staff_dtl->staff_email_id,
                'staff_username' => $staff_dtl->staff_username,
                'staff_phone' => $staff_dtl->staff_phone,
                'staff_account_status' => $staff_dtl->staff_account_status,
            );
            $this->session->set_userdata($usersdate);
            redirect('staff/dashboard');
        } else {
            $this->session->set_flashdata('message', 'Invalid email or password.');
            redirect('staff/login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('staff/login');
    }
}
