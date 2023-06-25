<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Vendor
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('M_datapenyedia/M_datapenyedia');
    }

    public function get_vendor_url()
    {
        $id_url_vendor =  $this->ci->session->userdata('id_url_vendor');
        $row_vendor_by_id_url = $this->ci->M_datapenyedia->get_row_vendor_by_id_url_vendor($id_url_vendor);
        return $row_vendor_by_id_url;
    }
}
