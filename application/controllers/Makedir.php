<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Makedir extends CI_Controller
{
    public function index()
    {
        $date = date('d-m-Y');
        if (!is_dir('uploads/nama_pt-' . $date)) {
            mkdir('./uploads/nama_pt- ' . $date, 0777, TRUE);
        }
    }
}
