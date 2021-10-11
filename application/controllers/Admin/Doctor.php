<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->global_model->loginCheckAdmin();
        $this->load->model('admin/admin_model');
    }
    public function index()
    {
        $data['title'] = 'Doctor List';
        $data['show_title'] = 'Doctor';
        $data['bb_url'] = 'admin/doctor/add';
        $data['list'] = $this->admin_model->doctor_list_db();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/doctor/list');
        $this->load->view('admin/footer');
    }
    public function add()
    {
        $data['title'] = 'Doctor Add';
        $data['show_title'] = 'Doctor';
        $data['bb_url'] = 'admin/doctor';
        $data['submit_url'] = 'admin/doctor/doctor_add';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/doctor/add');
        $this->load->view('admin/footer');
    }
    public function doctor_add()
    {

        $usersdate = array(
            'doctor_id' => uniqid(),
            'doctor_username' => $this->input->post('doctor_username', TRUE),
            'doctor_email_id' => $this->input->post('doctor_email_id', TRUE),
            'doctor_phone' => $this->input->post('doctor_phone', TRUE),
            'doctor_password' => $this->input->post('doctor_password', TRUE),

            'inserted_ip' => IP,
            'inserted_by' => $this->session->userdata('admin_username'),
            'inserted_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->admin_model->doctor_add_db($usersdate);
        $this->session->set_flashdata('message', 'Doctor Added Successfully');
        $this->session->set_flashdata('message_status', TRUE);
        redirect('admin/doctor');
    }
    public function edit($parient_id)
    {
        $data['title'] = 'Doctor Edit';
        $data['show_title'] = 'Doctor';
        $data['bb_url'] = 'admin/doctor';
        $data['submit_url'] = 'admin/doctor/doctor_edit';
        $data['doctor_id'] = $parient_id;
        $data['show'] = $this->admin_model->doctor_show_db($parient_id);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/doctor/add');
        $this->load->view('admin/footer');
    }
    public function doctor_edit()
    {
        $doctor_id = $this->input->post('doctor_id', TRUE);
        $usersdate = array(
            'doctor_username' => $this->input->post('doctor_username', TRUE),
            'doctor_email_id' => $this->input->post('doctor_email_id', TRUE),
            'doctor_phone' => $this->input->post('doctor_phone', TRUE),
            'doctor_password' => $this->input->post('doctor_password', TRUE),

            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('admin_username'),
            'updated_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->admin_model->doctor_edit_db($doctor_id, $usersdate);
        $this->session->set_flashdata('message', 'Doctor Updated Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('admin/doctor');
    }
    public function doctor_delete($doctor_id)
    {
        $usersdate = array(
            'del_flag' => 'Y',
            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('admin_username'),
            'updated_date' => DATE_TIME
        );
        // print_r($usersdate);
        $this->admin_model->doctor_edit_db($doctor_id, $usersdate);
        $this->session->set_flashdata('message', 'Doctor Deleted Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('admin/doctor');
    }


    public function doctor_phone_check()
    {
        // echo "string";
        $doctor_phone = $this->input->post('doctor_phone', TRUE);
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->where('doctor_phone', $doctor_phone);
        $query = $this->db->get('doctor');
        if ($query->num_rows() > 0) {
            // return $query->row();
            $response['status'] = 0;
            $response['message'] = 'Doctor Allready Exist';
            $response = json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = 'Doctor Not Exist';
            $response = json_encode($response);
        }
        echo ($response);
    }
    public function doctor_email_check()
    {
        // echo "string";
        $doctor_email_id = $this->input->post('doctor_email_id', TRUE);
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->where('doctor_email_id', $doctor_email_id);
        $query = $this->db->get('doctor');
        if ($query->num_rows() > 0) {
            // return $query->row();
            $response['status'] = 0;
            $response['message'] = 'Doctor Allready Exist';
            $response = json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = 'Doctor Not Exist';
            $response = json_encode($response);
        }
        echo ($response);
    }
}
