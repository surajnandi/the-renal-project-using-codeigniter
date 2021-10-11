<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Branch extends CI_Controller
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
        $data['title'] = 'Branch List';
        $data['show_title'] = 'Branch';
        $data['bb_url'] = 'admin/branch/add';
        $data['list'] = $this->admin_model->branch_list_db();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/branch/list');
        $this->load->view('admin/footer');
    }
    public function add()
    {
        $data['title'] = 'Branch Add';
        $data['show_title'] = 'Branch';
        $data['bb_url'] = 'admin/branch';
        $data['submit_url'] = 'admin/branch/branch_add';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/branch/add');
        $this->load->view('admin/footer');
    }
    public function branch_add()
    {

        $usersdate = array(
            'branch_id' => uniqid(),
            'branch_name' => $this->input->post('branch_name', TRUE),
            'branch_amount_per_patient' => $this->input->post('branch_amount_per_patient', TRUE),

            'inserted_ip' => IP,
            'inserted_by' => $this->session->userdata('admin_username'),
            'inserted_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->admin_model->branch_add_db($usersdate);
        $this->session->set_flashdata('message', 'Branch Added Successfully');
        $this->session->set_flashdata('message_status', TRUE);
        redirect('admin/branch');
    }
    public function edit($parient_id)
    {
        $data['title'] = 'Branch Edit';
        $data['show_title'] = 'Branch';
        $data['bb_url'] = 'admin/branch';
        $data['submit_url'] = 'admin/branch/branch_edit';
        $data['branch_id'] = $parient_id;
        $data['show'] = $this->admin_model->branch_show_db($parient_id);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/branch/add');
        $this->load->view('admin/footer');
    }
    public function branch_edit()
    {
        $branch_id = $this->input->post('branch_id', TRUE);
        $usersdate = array(
            'branch_name' => $this->input->post('branch_name', TRUE),
            'branch_amount_per_patient' => $this->input->post('branch_amount_per_patient', TRUE),
            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('admin_username'),
            'updated_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->admin_model->branch_edit_db($branch_id, $usersdate);
        $this->session->set_flashdata('message', 'Branch Updated Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('admin/branch');
    }
    public function branch_delete($branch_id)
    {
        $usersdate = array(
            'del_flag' => 'Y',
            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('admin_username'),
            'updated_date' => DATE_TIME
        );
        // print_r($usersdate);
        $this->admin_model->branch_edit_db($branch_id, $usersdate);
        $this->session->set_flashdata('message', 'Branch Deleted Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('admin/branch');
    }
}
