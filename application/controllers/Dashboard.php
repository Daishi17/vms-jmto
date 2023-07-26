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


        // izin usaha
        $cek_siup = $this->M_dashboard->cek_vendor_tervalidasi_siup($id_vendor);
        $cek_kbli_siup = $this->M_dashboard->cek_vendor_tervalidasi_kbli_siup($id_vendor);
        $cek_nib = $this->M_dashboard->cek_vendor_tervalidasi_nib($id_vendor);
        $cek_kbli_nib = $this->M_dashboard->cek_vendor_tervalidasi_kbli_nib($id_vendor);
        $cek_sbu = $this->M_dashboard->cek_vendor_tervalidasi_sbu($id_vendor);
        $cek_kbli_sbu = $this->M_dashboard->cek_vendor_tervalidasi_kbli_sbu($id_vendor);
        $cek_siujk = $this->M_dashboard->cek_vendor_tervalidasi_siujk($id_vendor);
        $cek_kbli_siujk = $this->M_dashboard->cek_vendor_tervalidasi_kbli_siujk($id_vendor);

        // akta
        $cek_akta_pendirian = $this->M_dashboard->cek_vendor_tervalidasi_akta_pendirian($id_vendor);
        $cek_akta_perubahan = $this->M_dashboard->cek_vendor_tervalidasi_akta_perubahan($id_vendor);
        // end akta

        // manajerial
        $cek_pemilik = $this->M_dashboard->cek_vendor_tervalidasi_pemilik($id_vendor);
        $cek_pengurus = $this->M_dashboard->cek_vendor_tervalidasi_pengurus($id_vendor);
        // end manajerial

        // pengalaman
        $cek_pengalaman = $this->M_dashboard->cek_vendor_tervalidasi_pengalaman($id_vendor);
        // end pengalaman

        // pajak
        $cek_sppkp = $this->M_dashboard->cek_vendor_tervalidasi_sppkp($id_vendor);
        $cek_npwp = $this->M_dashboard->cek_vendor_tervalidasi_npwp($id_vendor);
        $cek_spt = $this->M_dashboard->cek_vendor_tervalidasi_spt($id_vendor);
        $cek_neraca_keuangan = $this->M_dashboard->cek_vendor_tervalidasi_neraca_keuangan($id_vendor);
        $cek_keuangan = $this->M_dashboard->cek_vendor_tervalidasi_keuangan($id_vendor);
        // end pajak


        // tidak valid
        $cek_tdk_valid_siup = $this->M_dashboard->cek_vendor_tdk_valid_siup($id_vendor);
        $cek_tdk_valid_kbli_siup = $this->M_dashboard->cek_vendor_tdk_valid_kbli_siup($id_vendor);
        $cek_tdk_valid_nib = $this->M_dashboard->cek_vendor_tdk_valid_nib($id_vendor);
        $cek_tdk_valid_kbli_nib = $this->M_dashboard->cek_vendor_tdk_valid_kbli_nib($id_vendor);
        $cek_tdk_valid_sbu = $this->M_dashboard->cek_vendor_tdk_valid_sbu($id_vendor);
        $cek_tdk_valid_kbli_sbu = $this->M_dashboard->cek_vendor_tdk_valid_kbli_sbu($id_vendor);
        $cek_tdk_valid_siujk = $this->M_dashboard->cek_vendor_tdk_valid_siujk($id_vendor);
        $cek_tdk_valid_kbli_siujk = $this->M_dashboard->cek_vendor_tdk_valid_kbli_siujk($id_vendor);

        // akta
        $cek_tdk_valid_akta_pendirian = $this->M_dashboard->cek_vendor_tdk_valid_akta_pendirian($id_vendor);
        $cek_tdk_valid_akta_perubahan = $this->M_dashboard->cek_vendor_tdk_valid_akta_perubahan($id_vendor);
        // end akta

        // manajerial
        $cek_tdk_valid_pemilik = $this->M_dashboard->cek_vendor_tdk_valid_pemilik($id_vendor);
        $cek_tdk_valid_pengurus = $this->M_dashboard->cek_vendor_tdk_valid_pengurus($id_vendor);
        // end manajerial

        // pengalaman
        $cek_tdk_valid_pengalaman = $this->M_dashboard->cek_vendor_tdk_valid_pengalaman($id_vendor);
        // end pengalaman

        // pajak
        $cek_tdk_valid_sppkp = $this->M_dashboard->cek_vendor_tdk_valid_sppkp($id_vendor);
        $cek_tdk_valid_npwp = $this->M_dashboard->cek_vendor_tdk_valid_npwp($id_vendor);
        $cek_tdk_valid_spt = $this->M_dashboard->cek_vendor_tdk_valid_spt($id_vendor);
        $cek_tdk_valid_neraca_keuangan = $this->M_dashboard->cek_vendor_tdk_valid_neraca_keuangan($id_vendor);
        $cek_tdk_valid_keuangan = $this->M_dashboard->cek_vendor_tdk_valid_keuangan($id_vendor);
        // end pajak
        // end tidak valid
        $id_vendor = $this->session->userdata('id_vendor');
        $data['notifikasi'] = $this->M_dashboard->count_notifikasi($id_vendor);
        $data['count_tdk_validate'] =  $cek_tdk_valid_siup + $cek_tdk_valid_kbli_siup + $cek_tdk_valid_nib + $cek_tdk_valid_kbli_nib + $cek_tdk_valid_sbu + $cek_tdk_valid_kbli_sbu + $cek_tdk_valid_siujk + $cek_tdk_valid_kbli_siujk + $cek_tdk_valid_akta_pendirian + $cek_tdk_valid_akta_perubahan + $cek_tdk_valid_pemilik + $cek_tdk_valid_pengurus + $cek_tdk_valid_pengalaman + $cek_tdk_valid_sppkp + $cek_tdk_valid_npwp + $cek_tdk_valid_spt + $cek_tdk_valid_neraca_keuangan + $cek_tdk_valid_keuangan;
        $data['count_validate'] = $cek_siup + $cek_kbli_siup + $cek_nib + $cek_kbli_nib + $cek_sbu + $cek_kbli_sbu + $cek_siujk + $cek_kbli_siujk + $cek_akta_pendirian + $cek_akta_perubahan + $cek_pemilik + $cek_pengurus + $cek_pengalaman + $cek_sppkp + $cek_npwp + $cek_spt + $cek_neraca_keuangan + $cek_keuangan;


        $this->load->view('template_menu/header_menu', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template_menu/new_footer');
        // angga
        // $this->load->view('dashboard/ajax');
    }
}
