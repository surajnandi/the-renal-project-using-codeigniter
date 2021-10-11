<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
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
        $data['title'] = 'Staff List';
        $data['show_title'] = 'Staff';
        $data['bb_url'] = 'admin/staff/add';
        $data['list'] = $this->admin_model->staff_list_db();
        $this->load->view('admin/header', $data);
        $this->load->view('admin/staff/list');
        $this->load->view('admin/footer');
    }
    public function add()
    {
        $data['title'] = 'Staff Add';
        $data['show_title'] = 'Staff';
        $data['bb_url'] = 'admin/staff';
        $data['submit_url'] = 'admin/staff/staff_add';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/staff/add');
        $this->load->view('admin/footer');
    }
    public function staff_add()
    {

        $usersdate = array(
            'staff_id' => uniqid(),
            'staff_username' => $this->input->post('staff_username', TRUE),
            'staff_email_id' => $this->input->post('staff_email_id', TRUE),
            'staff_phone' => $this->input->post('staff_phone', TRUE),
            'staff_password' => $this->input->post('staff_password', TRUE),

            'inserted_ip' => IP,
            'inserted_by' => $this->session->userdata('admin_username'),
            'inserted_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->admin_model->staff_add_db($usersdate);
        $this->session->set_flashdata('message', 'Staff Added Successfully');
        $this->session->set_flashdata('message_status', TRUE);
        redirect('admin/staff');
    }
    public function edit($staff_id)
    {
        $data['title'] = 'Staff Edit';
        $data['show_title'] = 'Staff';
        $data['bb_url'] = 'admin/staff';
        $data['submit_url'] = 'admin/staff/staff_edit';
        $data['staff_id'] = $staff_id;
        $data['show'] = $this->admin_model->staff_show_db($staff_id);
        $this->load->view('admin/header', $data);
        $this->load->view('admin/staff/add');
        $this->load->view('admin/footer');
    }
    public function staff_edit()
    {
        $staff_id = $this->input->post('staff_id', TRUE);
        $usersdate = array(
            'staff_username' => $this->input->post('staff_username', TRUE),
            'staff_email_id' => $this->input->post('staff_email_id', TRUE),
            'staff_phone' => $this->input->post('staff_phone', TRUE),
            'staff_password' => $this->input->post('staff_password', TRUE),

            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('admin_username'),
            'updated_date' => DATE_TIME
        );

        // print_r($usersdate);
        $this->admin_model->staff_edit_db($staff_id, $usersdate);
        $this->session->set_flashdata('message', 'Staff Updated Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('admin/staff');
    }

    public function staff_delete($staff_id)
    {
        $usersdate = array(
            'del_flag' => 'Y',
            'updated_ip' => IP,
            'updated_by' => $this->session->userdata('admin_username'),
            'updated_date' => DATE_TIME
        );
        // print_r($usersdate);
        $this->admin_model->staff_edit_db($staff_id, $usersdate);
        $this->session->set_flashdata('message', 'Staff Deleted Successfully');
        $this->session->set_flashdata('message_status', 1);
        redirect('admin/staff');
    }


    public function staff_phone_check()
    {
        // echo "string";
        $staff_phone = $this->input->post('staff_phone', TRUE);
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->where('staff_phone', $staff_phone);
        $query = $this->db->get('staff');
        if ($query->num_rows() > 0) {
            // return $query->row();
            $response['status'] = 0;
            $response['message'] = 'Staff Allready Exist';
            $response = json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = 'Staff Not Exist';
            $response = json_encode($response);
        }
        echo ($response);
    }
    public function staff_email_check()
    {
        // echo "string";
        $staff_email_id = $this->input->post('staff_email_id', TRUE);
        $query = $this->db->where('active_flag', 'Y');
        $query = $this->db->where('del_flag', 'N');
        $query = $this->db->where('staff_email_id', $staff_email_id);
        $query = $this->db->get('staff');
        if ($query->num_rows() > 0) {
            // return $query->row();
            $response['status'] = 0;
            $response['message'] = 'Staff Allready Exist';
            $response = json_encode($response);
        } else {
            $response['status'] = 1;
            $response['message'] = 'Staff Not Exist';
            $response = json_encode($response);
        }
        echo ($response);
    }
}
