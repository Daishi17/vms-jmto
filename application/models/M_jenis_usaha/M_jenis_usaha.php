<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_usaha extends CI_Model
{

    public function get_result_jenis_usaha()
    {
        $this->db->select('*');
        $this->db->from('tbl_jenis_usaha');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }
}
