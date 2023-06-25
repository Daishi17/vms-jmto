<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $id_vendor = $this->session->userdata('id_vendor');
        $this->load->model('M_dashboard/M_dashboard');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    public function index()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $data['row_vendor'] = $this->M_dashboard->get_row_vendor($id_vendor);
        $data['kualifikasi'] = str_split($data['row_vendor']['id_jenis_usaha']);

        $this->load->view('template_menu/header_menu');
        $this->load->view('dashboard/index', $data);
        $this->load->view('template_menu/footer_menu');
        // angga
        // $this->load->view('dashboard/ajax');
    }
}
