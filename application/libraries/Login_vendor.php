<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Login_vendor
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Auth_model');
    }

    public function login($username_vendor, $password_vendor)
    {
        $cek = $this->ci->Auth_model->login($username_vendor);
        if (!$cek->email) {
            $this->ci->session->set_flashdata('salah', 'Penyedia Tidak Terdaftar!');
            redirect('auth');
        } else {
            if ($cek->sts_aktif == 0) {
                $this->ci->session->set_flashdata('salah', 'Akun Anda Sedang Menunggu Di Aktivasi Oleh Validator JMTO!');
                redirect('auth');
            } else {
                if ($cek && password_verify($password_vendor, $cek->password)) {
                    $sekarang = date('Y-m-d H:i');
                    $data = [
                        'waktu_login' => $sekarang,
                        'alamat_ip' => $this->ci->input->ip_address(),
                        'id_vendor' => $cek->id_vendor
                    ];
                    $this->ci->Auth_model->insert_log($data);
                    $userdata = [
                        'id_vendor' => $cek->id_vendor,
                        'id_url_vendor' => $cek->id_url_vendor,
                        'username' => $cek->username,
                        'email' => $cek->email,
                        'nama_usaha' => $cek->nama_usaha,
                        'bentuk_usaha' => $cek->bentuk_usaha,
                        'npwp' => $cek->npwp,
                        'kualifikasi_usaha' => $cek->kualifikasi_usaha,
                        'id_jenis_usaha' => $cek->id_jenis_usaha
                    ];

                    // buat session
                    $this->ci->session->set_userdata($userdata);
                    redirect('dashboard');
                } else {
                    $this->ci->session->set_flashdata('salah', 'Email Atau Password Salah');
                    redirect('auth');
                }
            }
        }
    }
    public function cek_login()
    {
        if ($this->ci->session->userdata('username_vendor') == "") {
            $this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->ci->session->sess_destroy();
        redirect(base_url(''));
    }
}
