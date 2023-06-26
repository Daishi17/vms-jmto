<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");
class Monitoring_dokumen extends CI_Controller
{
    function index()
    {
        $this->load->view('template_menu/header_menu');
        $this->load->view('monitoring_dokumen/index');
        $this->load->view('template_menu/new_footer');
    }
}
