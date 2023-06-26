<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_hitam extends CI_Controller
{

    public function index()
    {
        $this->load->view('template_menu/header_menu');
        $this->load->view('daftar_hitam/index');
        $this->load->view('template_menu/new_footer');
    }
}
