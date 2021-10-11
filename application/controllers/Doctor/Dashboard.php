<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('global_model');
        $this->global_model->loginCheckDoctor();
        $this->load->model('doctor/doctor_model');
    }
    // public function index()
    // {
    //     $data['title'] = 'Doctor Dashboard';
    //     $this->load->view('doctor/header', $data);
    //     $this->load->view('doctor/dashboard/index', $data);
    //     // $this->load->view('doctor/footer');
    //     $this->load->view('doctor/footer_dashboad', $data);
    // }

    public function index()
    {
        $data['title'] = 'Doctor Dashboard';
        $this->load->view('doctor/header', $data);

        // $query = $this->db
        //     ->where('active_flag', 'Y')
        //     ->where('del_flag', 'N')
        //     ->count_all_results("patient");
        // $query = $this->db->query("SELECT SUM(patient_unique_id) as count FROM patient   
        //     GROUP BY YEAR(inserted_date) ORDER BY inserted_date");


        // $query = $this->db->query(
        //     "SELECT date(inserted_date),count(patient_unique_id) FROM patient GROUP BY date(inserted_date);"
        // );




        // $data['row'] = json_encode(array_column($query->result(), 'count'), JSON_NUMERIC_CHECK);

        // $data['row'] = $query->result();

        // $data['row'] = json_encode(($query->result()));

        // echo json_encode($data);

        // $data = $query->result();

        // $data = [];

        // foreach ($record as $row) {
        //     // $data['label'][] = $row->date;
        //     $data['data'][] = (int) $row->count;
        // }
        // $data['chart_data'] = json_encode($data);


        //     $query =  $this->db->query("SELECT COUNT(patient_unique_id) as count,MONTHNAME(inserted_date) as month_name FROM patient WHERE YEAR(inserted_date) = '" . date('Y') . "'
        //   GROUP BY YEAR(inserted_date),MONTH(inserted_date)");

        $query =  $this->db->query("SELECT COUNT(patient_unique_id) as count,date(inserted_date) as date FROM patient 
      GROUP BY date(inserted_date)");

        $record = $query->result();
        $data = [];

        foreach ($record as $row) {
            $data['label'][] = $row->date;
            $data['data'][] = (int) $row->count;
        }
        $data['chart_data'] = json_encode($data);






        // echo "<pre>";
        // print_r($data);
        // die();



        // $this->load->view('my_chart', $data);  
        $this->load->view('doctor/dashboard/index', $data);
        // $this->load->view('doctor/footer');
        $this->load->view('doctor/footer_dashboad', $data);
    }
}
