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


    public function get_kualifikasi_sbu()
    {
        $this->db->select('*');
        $this->db->from('tbl_kualifikasi_sbu');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_sbu()
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        $query = $this->db->get();
        return $query->result_array();
    }


    public function get_kbli()
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
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

    // batas nib
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



    public function update_enkrip_nib($where, $data)
    {
        $this->db->update('tbl_vendor_nib', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_dekrip_nib($where, $data)
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

    // 
    // tambah kbli nib
    public function tambah_kbli_nib($data)
    {
        $this->db->insert('tbl_vendor_kbli_nib', $data);
        return $this->db->affected_rows();
    }
    var $order_nib =  array('id_vendor_kbli_nib', 'kode_kbli', 'nama_kbli', 'sts_kbli_nib', 'id_vendor_kbli_nib');

    // get nib
    private function _get_data_query_kbli_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_nib as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order_nib) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_nib[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_nib.id_vendor_kbli_nib', 'DESC');
        }
    }

    public function gettable_kbli_nib($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_nib($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_kbli_nib($id_vendor)
    {
        $this->_get_data_query_kbli_nib($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_kbli_nib($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_kbli_nib($id_url_kbli_nib)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_url_kbli_nib', $id_url_kbli_nib);
        $query = $this->db->get();
        return $query->row_array();
    }

    function edit_kbli_nib($data, $where)
    {
        $this->db->update('tbl_vendor_kbli_nib', $data, $where);
        return $this->db->affected_rows();
    }

    function hapus_kbli_nib($where)
    {
        $this->db->delete('tbl_vendor_kbli_nib', $where);
        return $this->db->affected_rows();
    }


    //   BATAS SIUP

    // batas siup
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



    public function update_enkrip_siup($where, $data)
    {
        $this->db->update('tbl_vendor_siup', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_dekrip_siup($where, $data)
    {
        $this->db->update('tbl_vendor_siup', $data, $where);
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

    public function get_row_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siup');
        $this->db->where('tbl_vendor_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // 
    // tambah kbli siup
    public function tambah_kbli_siup($data)
    {
        $this->db->insert('tbl_vendor_kbli_siup', $data);
        return $this->db->affected_rows();
    }
    var $order_siup =  array('id_vendor_kbli_siup', 'kode_kbli', 'nama_kbli', 'sts_kbli_siup', 'id_vendor_kbli_siup');

    // get siup
    private function _get_data_query_kbli_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siup.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_siup as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order_siup) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_siup[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_siup.id_vendor_kbli_siup', 'DESC');
        }
    }

    public function gettable_kbli_siup($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_siup($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_kbli_siup($id_vendor)
    {
        $this->_get_data_query_kbli_siup($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_kbli_siup($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siup.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_kbli_siup($id_url_kbli_siup)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siup.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_url_kbli_siup', $id_url_kbli_siup);
        $query = $this->db->get();
        return $query->row_array();
    }

    function edit_kbli_siup($data, $where)
    {
        $this->db->update('tbl_vendor_kbli_siup', $data, $where);
        return $this->db->affected_rows();
    }

    function hapus_kbli_siup($where)
    {
        $this->db->delete('tbl_vendor_kbli_siup', $where);
        return $this->db->affected_rows();
    }



    // sbu
    //   BATAS SBU

    // batas sbu
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

    public function update_dekrip_sbu($where, $data)
    {
        $this->db->update('tbl_vendor_sbu', $data, $where);
        return $this->db->affected_rows();
    }


    public function get_row_sbu_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sbu');
        $this->db->where('tbl_vendor_sbu.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // 
    // tambah kbli sbu
    public function tambah_kbli_sbu($data)
    {
        $this->db->insert('tbl_vendor_kbli_sbu', $data);
        return $this->db->affected_rows();
    }
    var $order_sbu =  array('id_vendor_kbli_sbu', 'kode_kbli', 'nama_kbli', 'sts_kbli_sbu', 'id_vendor_kbli_sbu');

    // get sbu
    private function _get_data_query_kbli_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->join('tbl_kualifikasi_sbu', 'tbl_vendor_kbli_sbu.id_kualifikasi_sbu = tbl_kualifikasi_sbu.id_kualifikasi_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_sbu as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order_sbu) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_sbu[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_sbu.id_vendor_kbli_sbu', 'DESC');
        }
    }

    public function gettable_kbli_sbu($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_sbu($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_kbli_sbu($id_vendor)
    {
        $this->_get_data_query_kbli_sbu($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_kbli_sbu($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->join('tbl_kualifikasi_sbu', 'tbl_vendor_kbli_sbu.id_kualifikasi_sbu = tbl_kualifikasi_sbu.id_kualifikasi_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_kbli_sbu($id_url_kbli_sbu)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_sbu', 'tbl_vendor_kbli_sbu.id_sbu = tbl_sbu.id_sbu', 'left');
        $this->db->join('tbl_kualifikasi_sbu', 'tbl_vendor_kbli_sbu.id_kualifikasi_sbu = tbl_kualifikasi_sbu.id_kualifikasi_sbu', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_url_kbli_sbu', $id_url_kbli_sbu);
        $query = $this->db->get();
        return $query->row_array();
    }

    function edit_kbli_sbu($data, $where)
    {
        $this->db->update('tbl_vendor_kbli_sbu', $data, $where);
        return $this->db->affected_rows();
    }

    function hapus_kbli_sbu($where)
    {
        $this->db->delete('tbl_vendor_kbli_sbu', $where);
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

    // crud pemilik manajerial
    function insert_pemilik($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('temp_vendor_pemilik', $data);
        }
    }





    var $order_pemilik =  array('id_vendor', 'nik', 'nama_pemilik', 'jns_pemilik', 'alamat_pemilik', 'npwp', 'warganegara', 'saham', 'file_ktp', 'id_vendor', 'id_vendor');

    private function _get_data_query_pemilik_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pemilik.id_pemilik', 'DESC');
        $i = 0;
        foreach ($this->order_nib as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order_pemilik) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pemilik[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pemilik.id_vendor', 'DESC');
        }
    }

    public function gettable_pemilik_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pemilik_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pemilik_manajerial($id_vendor)
    {
        $this->_get_data_query_pemilik_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pemilik_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_pemilik_manajerial($id_pemilik)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_pemilik', $id_pemilik);
        $query = $this->db->get();
        return $query->row_array();
    }





    var $order_pemilik_excel =  array('id_vendor', 'nik', 'nama_pemilik', 'jns_pemilik', 'alamat_pemilik', 'npwp', 'warganegara', 'saham', 'file_ktp', 'id_vendor', 'id_vendor');

    private function _get_data_query_excel_pemilik_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_nib as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order_pemilik_excel) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pemilik_excel[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('temp_vendor_pemilik.id_vendor', 'DESC');
        }
    }

    public function gettable_excel_pemilik_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_excel_pemilik_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_excel_pemilik_manajerial($id_vendor)
    {
        $this->_get_data_query_excel_pemilik_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_excel_pemilik_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }



    public function get_row_excel_pemilik_manajerial($id_pemilik)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_pemilik', $id_pemilik);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_excel_pemilik_manajerial($data, $where)
    {
        $this->db->update('temp_vendor_pemilik', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_pemilik_manajerial($data, $where)
    {
        $this->db->update('tbl_vendor_pemilik', $data, $where);
        return $this->db->affected_rows();
    }
    public function get_result_excel_pemilik_manajerial($id_vendor, $cek_table)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_vendor', $id_vendor);
        if ($cek_table) {
            foreach ($cek_table as $key => $value) {
                $this->db->where('nik !=', '' . $value['nik'] . '');
            }
        } else {
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_validasi_excel_pemilik_manajerial($id_vendor, $cek_table2)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        if ($cek_table2) {
            foreach ($cek_table2 as $key => $valu2) {
                $this->db->or_where('nik', '' . $valu2['nik'] . '');
            }
        } else {
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_pemilik_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_excel_pemilik($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_row_excel_pemilik_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pemilik');
        $this->db->where('temp_vendor_pemilik.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pemilik_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pemilik');
        $this->db->where('tbl_vendor_pemilik.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_excel_pemilik_manajerial_enkription($where, $data)
    {
        $this->db->update('temp_vendor_pemilik', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_pemilik_manajerial_enkription($where, $data)
    {
        $this->db->update('tbl_vendor_pemilik', $data, $where);
        return $this->db->affected_rows();
    }



    function delete_import_excel_pemilik($where)
    {
        $this->db->delete('temp_vendor_pemilik', $where);
        return $this->db->affected_rows();
    }

    function delete_pemilik($where)
    {
        $this->db->delete('tbl_vendor_pemilik', $where);
        return $this->db->affected_rows();
    }


    public function tambah_tbl_vendor_pemilik($data)
    {
        $this->db->insert('tbl_vendor_pemilik', $data);
        return $this->db->affected_rows();
    }

    // INI UNTUK PENGURUS

    
    public function tambah_tbl_vendor_pengurus($data)
    {
        $this->db->insert('tbl_vendor_pengurus', $data);
        return $this->db->affected_rows();
    }


    // 

    // crud pajak sppkp
    public function get_row_sppkp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('tbl_vendor_sppkp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_sppkp($data)
    {
        $this->db->insert('tbl_vendor_sppkp', $data);
        return $this->db->affected_rows();
    }

    public function update_sppkp($data, $where)
    {
        $this->db->update('tbl_vendor_sppkp', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function get_row_sppkp_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_sppkp');
        $this->db->where('tbl_vendor_sppkp.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    // end crud pajak sppkp

    // crud pajak npwp
    public function get_row_npwp($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('tbl_vendor_npwp.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_npwp($data)
    {
        $this->db->insert('tbl_vendor_npwp', $data);
        return $this->db->affected_rows();
    }

    public function update_npwp($data, $where)
    {
        $this->db->update('tbl_vendor_npwp', $data);
        $this->db->where($where);
        return $this->db->affected_rows();
    }

    public function get_row_npwp_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_npwp');
        $this->db->where('tbl_vendor_npwp.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    // end crud pajak npwp
}
