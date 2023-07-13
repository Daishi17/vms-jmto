<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Monitoring_dokumen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_datapenyedia/M_datapenyedia');
        $this->load->model('M_jenis_usaha/M_jenis_usaha');
        $this->load->model('Wilayah/Wilayah_model');
        $this->load->model('M_dashboard/M_dashboard');
        $this->load->model('M_monitoring/M_monitoring');
        $this->load->helper('download');
        $id_vendor = $this->session->userdata('id_vendor');
        if (!$id_vendor) {
            redirect('auth');
        }
    }

    function index()
    {
        $this->load->view('template_menu/header_menu');
        $this->load->view('monitoring_dokumen/index');
        $this->load->view('template_menu/new_footer');
        $this->load->view('monitoring_dokumen/file_public');
    }

    public function get_data_izin()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $resultss = $this->M_monitoring->gettable_monitoring_dokumen($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->jenis_dokumen;

            if (!$rs->nomor_surat) {
                $row[] = '-';
            } else {
                $row[] = $rs->nomor_surat;
            }

            if (!$rs->nomor_kbli) {
                $row[] = '-';
            } else {
                if ($rs->jenis_dokumen == 'SIUP-KBLI') {
                    $KBLI = $this->M_monitoring->get_kbli($rs->nomor_kbli);
                    $row[] = $KBLI['kode_kbli'] . '-' . $KBLI['nama_kbli'];
                } else if ($rs->jenis_dokumen == 'NIB-KBLI') {
                    $KBLI = $this->M_monitoring->get_kbli($rs->nomor_kbli);
                    $row[] = $KBLI['kode_kbli'] . '-' . $KBLI['nama_kbli'];
                } else if ($rs->jenis_dokumen == 'SIUJK-KBLI') {
                    $KBLI = $this->M_monitoring->get_kbli($rs->nomor_kbli);
                    $row[] = $KBLI['kode_kbli'] . '-' . $KBLI['nama_kbli'];
                } else if ($rs->jenis_dokumen == 'KODE-SBU') {
                    $KBLI = $this->M_monitoring->get_sbu($rs->nomor_kbli);
                    $row[] = $KBLI['kode_sbu'] . '-' . $KBLI['nama_sbu'];
                }
            }

            if ($rs->sts_validasi == 1) {
                $row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
            } else if ($rs->sts_validasi == null) {
                $row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
            } else {
                $row[] = '<span class="badge bg-warning">Revisi</span>';
            }

            if (!$rs->alasan_validator) {
                $row[] = '-';
            } else {
                $row[] = $rs->alasan_validator;
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_monitoring->count_all_data_monitoring_dokumen($id_vendor),
            "recordsFiltered" => $this->M_monitoring->count_filtered_data_monitoring_dokumen($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function get_data_akta()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $resultss = $this->M_monitoring->gettable_monitoring_dokumen2($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->jenis_dokumen;

            if (!$rs->nomor_surat) {
                $row[] = '-';
            } else {
                $row[] = $rs->nomor_surat;
            }
            if ($rs->sts_validasi == 1) {
                $row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
            } else if ($rs->sts_validasi == null) {
                $row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
            } else {
                $row[] = '<span class="badge bg-warning">Revisi</span>';
            }

            if (!$rs->alasan_validator) {
                $row[] = '-';
            } else {
                $row[] = $rs->alasan_validator;
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_monitoring->count_all_data_monitoring_dokumen2($id_vendor),
            "recordsFiltered" => $this->M_monitoring->count_filtered_data_monitoring_dokumen2($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_manajerial()
    {
        $id_vendor = $this->session->userdata('id_vendor');
        $resultss = $this->M_monitoring->gettable_monitoring_dokumen3($id_vendor);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->jenis_dokumen;
            $row[] = $rs->jenis_dokumen;
            if (!$rs->nomor_surat) {
                $row[] = '-';
            } else {
                $row[] = $rs->nomor_surat;
            }
            if ($rs->sts_validasi == 1) {
                $row[] = '<span class="badge bg-success">Sudah Tervalidasi</span>';
            } else if ($rs->sts_validasi == null) {
                $row[] = '<span class="badge bg-secondary">Belum Tervalidasi</span>';
            } else {
                $row[] = '<span class="badge bg-warning">Revisi</span>';
            }

            if (!$rs->alasan_validator) {
                $row[] = '-';
            } else {
                $row[] = $rs->alasan_validator;
            }
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->M_monitoring->count_all_data_monitoring_dokumen3($id_vendor),
            "recordsFiltered" => $this->M_monitoring->count_filtered_data_monitoring_dokumen3($id_vendor),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
}
