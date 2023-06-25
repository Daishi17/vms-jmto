<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Dashboard extends CI_Model
{

    public function get_row_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_vendor.id_provinsi = tbl_provinsi.id_provinsi', 'left');
        $this->db->join('tbl_kabupaten', 'tbl_vendor.id_kabupaten = tbl_kabupaten.id_kabupaten', 'left');
        $this->db->join('tbl_kecamatan', 'tbl_vendor.id_kecamatan = tbl_kecamatan.id_kecamatan', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor.kualifikasi_usaha = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_kualifikasi_izin($value)
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_usaha');
        $this->db->where('id_jenis_usaha', $value);
        $query = $this->db->get();
        return $query->row_array();
    }
}
