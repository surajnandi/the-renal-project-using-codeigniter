<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->global_model->loginCheckStaff();
        $this->load->model('staff/patient_model');
    }
    public function index()
    {
        $data['title'] = 'Patient List';
        $data['show_title'] = 'Patient';
        $data['bb_url'] = 'staff/patient/add';
        $data['list'] = $this->patient_model->patient_list_db();
        $this->load->view('staff/header', $data);
        $this->load->view('staff/patient/list');
        $this->load->view('staff/footer');
    }
    public function add()
    {
        $data['title'] = 'Patient Add';
        $data['show_title'] = 'Patient';
        $data['bb_url'] = 'staff/patient';
        $data['submit_url'] = 'staff/patient/patient_add';
        $this->load->view('staff/header', $data);
        $this->load->view('staff/patient/add');
        $this->load->view('staff/footer');
    }
    public function patient_add()
    {

        $usersdate = array(
            'patient_id' => uniqid(),
            'patient_name' => $this->input->post('patient_name', TRUE),
            'patient_phone' => $this->input->post('patient_phone', TRUE),
            'patient_age' => $this->input->post('patient_age', TRUE),
            'patient_dob' => $this->input->post('patient_dob', TRUE),
            'inserted_ip' => IP,
            'inserted_by' => $this->session->userdata('staff_username'),
            'inserted_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->patient_model->patient_add_db($usersdate);
        $this->session->set_flashdata('message', 'Patient Added Successfully');
        $this->session->set_flashdata('message_status', TRUE);
        redirect('staff/patient');
    }
    public function edit($parient_id)
    {
        $data['title'] = 'Parient Edit';
        $data['show_title'] = 'Parient';
        $data['bb_url'] = 'staff/patient';
        $data['submit_url'] = 'staff/patient/patient_edit';
        $data['patient_id'] = $parient_id;
        $data['show'] = $this->patient_model->patient_show_db($parient_id);
        $this->load->view('staff/header', $data);
        $this->load->view('staff/patient/add');
        $this->load->view('staff/footer');
    }
    public function patient_edit()
    {
        $patient_id = $this->input->post('patient_id', TRUE);
        $usersdate = array(
            'patient_name' => $this->input->post('patient_name', TRUE),
            'patient_phone' => $this->input->post('patient_phone', TRUE),
            'patient_age' => $this->input->post('patient_age', TRUE),
            'patient_dob' => $this->input->post('patient_dob', TRUE),
            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('staff_username'),
            'updated_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->patient_model->patient_edit_db($patient_id, $usersdate);
        $this->session->set_flashdata('message', 'Patient Updated Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('staff/patient');
    }
    public function patient_delete($patient_id)
    {
        $usersdate = array(
            'del_flag' => 'Y',
            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('staff_username'),
            'updated_date' => DATE_TIME
        );
        // print_r($usersdate);
        $this->patient_model->patient_edit_db($patient_id, $usersdate);
        $this->session->set_flashdata('message', 'Patient Deleted Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('staff/patient');
    }

    public function patient_phone_check()
    {
        // echo "string";
        $patient_phone = $this->input->post('patient_phone', TRUE);
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->where('patient_phone', $patient_phone);
        $query = $this->db->get('patient');
        if ($query->num_rows() > 0) {
            // return $query->row();
            $response['status'] = 0;
            $response['message'] = 'Phone no Allready Exist';
            $response = json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = 'Phone no Not Exist';
            $response = json_encode($response);
        }
        echo ($response);
    }
}
