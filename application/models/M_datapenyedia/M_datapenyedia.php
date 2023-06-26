<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datapenyedia extends CI_Model
{

    public function get_provinsi()
    {
        $this->db->select('*');
        $this->db->from('tbl_provinsi');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKabupaten($id_provinsi)
    {
        $this->db->select('*');
        $this->db->from('tbl_kabupaten');
        $this->db->where('id_provinsi', $id_provinsi);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKecamatan($id_kabupaten)
    {
        $this->db->select('*');
        $this->db->from('tbl_kecamatan');
        $this->db->where('id_kabupaten', $id_kabupaten);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_vendor($data)
    {
        $this->db->insert('tbl_vendor', $data);
        return $this->db->affected_rows();
    }

    public function update_status_dokumen($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

    public function get_kualifikasi_izin()
    {
        $this->db->select('*');
        $this->db->from('tbl_kualifikasi_izin');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_vendor()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('tbl_vendor.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_vendor_by_id_url_vendor($id_url_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_vendor.id_provinsi');
        $this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_vendor.id_kabupaten');
        $this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_vendor.id_kecamatan');
        $this->db->where('tbl_vendor.id_url_vendor', $id_url_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function tambah_nib($data)
    {
        $this->db->insert('tbl_vendor_nib', $data);
        return $this->db->affected_rows();
    }

    public function update_nib($data, $where)
    {
        $this->db->update('tbl_vendor_nib', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }



    public function update_enkrip($where, $data)
    {
        $this->db->update('tbl_vendor_nib', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_dekrip($where, $data)
    {
        $this->db->update('tbl_vendor_nib', $data, $where);
        return $this->db->affected_rows();
    }


    public function get_row_nib_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_nib');
        $this->db->where('tbl_vendor_nib.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // siup
    public function get_row_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('tbl_vendor_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function tambah_siup($data)
    {
        $this->db->insert('tbl_vendor_siup', $data);
        return $this->db->affected_rows();
    }

    public function update_siup($data, $where)
    {
        $this->db->update('tbl_vendor_siup', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function get_row_siup_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('tbl_vendor_siup.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_enkrip_siup($where, $data)
    {
        $this->db->update('tbl_vendor_siup', $data, $where);
        return $this->db->affected_rows();
    }
    // end siup

    // sbu
    public function get_row_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_sbu_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_sbu($data)
    {
        $this->db->insert('tbl_vendor_sbu', $data);
        return $this->db->affected_rows();
    }

    public function update_sbu($data, $where)
    {
        $this->db->update('tbl_vendor_sbu', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function update_enkrip_sbu($where, $data)
    {
        $this->db->update('tbl_vendor_sbu', $data, $where);
        return $this->db->affected_rows();
    }
    // end sbu

    // siujk
    public function get_row_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siujk_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_siujk($data)
    {
        $this->db->insert('tbl_vendor_siujk', $data);
        return $this->db->affected_rows();
    }

    public function update_siujk($data, $where)
    {
        $this->db->update('tbl_vendor_siujk', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function update_enkrip_siujk($where, $data)
    {
        $this->db->update('tbl_vendor_siujk', $data, $where);
        return $this->db->affected_rows();
    }
    // end siujk

    // crud akta pendirian
    public function get_row_akta_pendirian($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('tbl_vendor_akta_pendirian.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_akta_pendirian($data)
    {
        $this->db->insert('tbl_vendor_akta_pendirian', $data);
        return $this->db->affected_rows();
    }

    public function update_akta_pendirian($data, $where)
    {
        $this->db->update('tbl_vendor_akta_pendirian', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function get_row_akta_pendirian_url($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_pendirian');
        $this->db->where('tbl_vendor_akta_pendirian.id_url', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // end crud akta pendirian

    // crud akta perubahan
    public function get_row_akta_perubahan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('tbl_vendor_akta_perubahan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function tambah_akta_perubahan($data)
    {
        $this->db->insert('tbl_vendor_akta_perubahan', $data);
        return $this->db->affected_rows();
    }

    public function update_akta_perubahan($data, $where)
    {
        $this->db->update('tbl_vendor_akta_perubahan', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function get_row_akta_perubahan_url($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_akta_perubahan');
        $this->db->where('tbl_vendor_akta_perubahan.id_url', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }
    // end crud akta perubahan
}
