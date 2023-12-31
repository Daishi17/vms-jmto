<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_datapenyedia extends CI_Model
{

    public function update_vendor($data, $where)
    {
        $this->db->update('tbl_vendor', $data, $where);
        return $this->db->affected_rows();
    }

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
        // $this->db->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_vendor.id_provinsi');
        // $this->db->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_vendor.id_kabupaten');
        // $this->db->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_vendor.id_kecamatan');
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


    public function get_row_kbli_nib_by_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
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

    public function get_row_kbli_siup_by_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siup');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siup.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siup.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siup.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    
    public function get_row_kbli_siujk_by_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siujk.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_row_kbli_sbu_by_vendor($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_sbu');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_sbu.id_kualifikasi_sbu = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_sbu.id_vendor', $id_vendor);
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


    //   BATAS siujk

    // batas siujk
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

    public function update_dekrip_siujk($where, $data)
    {
        $this->db->update('tbl_vendor_siujk', $data, $where);
        return $this->db->affected_rows();
    }


    public function get_row_siujk_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_siujk');
        $this->db->where('tbl_vendor_siujk.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    // 
    // tambah kbli siujk
    public function tambah_kbli_siujk($data)
    {
        $this->db->insert('tbl_vendor_kbli_siujk', $data);
        return $this->db->affected_rows();
    }
    var $order_siujk =  array('id_vendor_kbli_siujk', 'kode_kbli', 'nama_kbli', 'sts_kbli_siujk', 'id_vendor_kbli_siujk');

    // get siujk
    private function _get_data_query_kbli_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siujk.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_siujk as $item) // looping awal
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

                if (count($this->order_siujk) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_siujk[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_siujk.id_vendor_kbli_siujk', 'DESC');
        }
    }

    public function gettable_kbli_siujk($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_kbli_siujk($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_kbli_siujk($id_vendor)
    {
        $this->_get_data_query_kbli_siujk($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_kbli_siujk($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siujk.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function get_row_kbli_siujk($id_url_kbli_siujk)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_siujk');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_siujk.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_siujk.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_siujk.id_url_kbli_siujk', $id_url_kbli_siujk);
        $query = $this->db->get();
        return $query->row_array();
    }

    function edit_kbli_siujk($data, $where)
    {
        $this->db->update('tbl_vendor_kbli_siujk', $data, $where);
        return $this->db->affected_rows();
    }

    function hapus_kbli_siujk($where)
    {
        $this->db->delete('tbl_vendor_kbli_siujk', $where);
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

    // crud pengurus manajerial
    function insert_pengurus($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('temp_vendor_pengurus', $data);
        }
    }


    // crud pengurus manajerial
    function insert_pengalaman($data)
    {
        $jumlah = count($data);
        if ($jumlah > 0) {
            $this->db->replace('temp_vendor_pengalaman', $data);
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

    var $order_pengurus =  array('id_vendor', 'nik', 'nama_pengurus', 'jabatan_pengurus', 'alamat_pengurus', 'npwp', 'warganegara', 'saham', 'file_ktp', 'id_vendor', 'id_vendor');

    private function _get_data_query_pengurus_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pengurus.id_pengurus', 'DESC');
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

                if (count($this->order_pengurus) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengurus[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pengurus.id_vendor', 'DESC');
        }
    }

    public function gettable_pengurus_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pengurus_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pengurus_manajerial($id_vendor)
    {
        $this->_get_data_query_pengurus_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    var $order_pengurus_excel =  array('id_vendor', 'nik', 'nama_pengurus', 'jabatan_pengurus', 'alamat_pengurus', 'npwp', 'warganegara', 'saham', 'file_ktp', 'id_vendor', 'id_vendor');

    private function _get_data_query_excel_pengurus_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengurus');
        $this->db->where('temp_vendor_pengurus.id_vendor', $id_vendor);
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

                if (count($this->order_pengurus_excel) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengurus_excel[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('temp_vendor_pengurus.id_vendor', 'DESC');
        }
    }

    public function gettable_excel_pengurus_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_excel_pengurus_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_excel_pengurus_manajerial($id_vendor)
    {
        $this->_get_data_query_excel_pengurus_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_excel_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengurus');
        $this->db->where('temp_vendor_pengurus.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }



    public function tambah_tbl_vendor_pengurus($data)
    {
        $this->db->insert('tbl_vendor_pengurus', $data);
        return $this->db->affected_rows();
    }


    public function get_row_excel_pengurus_manajerial($id_pengurus)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengurus');
        $this->db->where('temp_vendor_pengurus.id_pengurus', $id_pengurus);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pengurus_manajerial($id_pengurus)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_pengurus', $id_pengurus);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_excel_pengurus_manajerial($data, $where)
    {
        $this->db->update('temp_vendor_pengurus', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_pengurus_manajerial($data, $where)
    {
        $this->db->update('tbl_vendor_pengurus', $data, $where);
        return $this->db->affected_rows();
    }


    public function get_row_excel_pengurus_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengurus');
        $this->db->where('temp_vendor_pengurus.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pengurus_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_excel_pengurus_manajerial_enkription($where, $data)
    {
        $this->db->update('temp_vendor_pengurus', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_pengurus_manajerial_enkription($where, $data)
    {
        $this->db->update('tbl_vendor_pengurus', $data, $where);
        return $this->db->affected_rows();
    }

    function delete_import_excel_pengurus($where)
    {
        $this->db->delete('temp_vendor_pengurus', $where);
        return $this->db->affected_rows();
    }

    function delete_pengurus($where)
    {
        $this->db->delete('tbl_vendor_pengurus', $where);
        return $this->db->affected_rows();
    }
    public function get_result_pengurus_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_excel_pengurus($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengurus');
        $this->db->where('temp_vendor_pengurus.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_excel_pengurus_manajerial($id_vendor, $cek_table)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengurus');
        $this->db->where('temp_vendor_pengurus.id_vendor', $id_vendor);
        if ($cek_table) {
            foreach ($cek_table as $key => $value) {
                $this->db->where('nik !=', '' . $value['nik'] . '');
            }
        } else {
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_validasi_excel_pengurus_manajerial($id_vendor, $cek_table2)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengurus');
        $this->db->where('tbl_vendor_pengurus.id_vendor', $id_vendor);
        if ($cek_table2) {
            foreach ($cek_table2 as $key => $valu2) {
                $this->db->or_where('nik', '' . $valu2['nik'] . '');
            }
        } else {
        }
        $query = $this->db->get();
        return $query->result_array();
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
    // INI UNTUK PENGALAMAN

    public function tambah_tbl_pengalaman($data)
    {
        $this->db->insert('tbl_vendor_pengalaman', $data);
        return $this->db->affected_rows();
    }

    var $order_pengalaman =  array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

    private function _get_data_query_pengalaman_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $this->db->order_by('tbl_vendor_pengalaman.id_pengalaman', 'DESC');
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

                if (count($this->order_pengalaman) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengalaman[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_pengalaman.id_vendor', 'DESC');
        }
    }

    public function gettable_pengalaman_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_pengalaman_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pengalaman_manajerial($id_vendor)
    {
        $this->_get_data_query_pengalaman_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pengalaman_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    var $order_pengalaman_excel =  array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

    private function _get_data_query_excel_pengalaman_manjerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengalaman');
        $this->db->where('temp_vendor_pengalaman.id_vendor', $id_vendor);
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

                if (count($this->order_pengalaman_excel) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengalaman_excel[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('temp_vendor_pengalaman.id_vendor', 'DESC');
        }
    }

    public function gettable_excel_pengalaman_manajerial($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_excel_pengalaman_manjerial($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_excel_pengalaman_manajerial($id_vendor)
    {
        $this->_get_data_query_excel_pengalaman_manjerial($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_excel_pengalaman_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengalaman');
        $this->db->where('temp_vendor_pengalaman.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function tambah_tbl_vendor_pengalaman($data)
    {
        $this->db->insert('tbl_vendor_pengalaman', $data);
        return $this->db->affected_rows();
    }




    public function get_row_excel_pengalaman_manajerial($id_pengalaman)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengalaman');
        $this->db->where('temp_vendor_pengalaman.id_pengalaman', $id_pengalaman);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pengalaman_manajerial($id_pengalaman)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_pengalaman', $id_pengalaman);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_excel_pengalaman_manajerial($data, $where)
    {
        $this->db->update('temp_vendor_pengalaman', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_pengalaman_manajerial($data, $where)
    {
        $this->db->update('tbl_vendor_pengalaman', $data, $where);
        return $this->db->affected_rows();
    }


    public function get_row_excel_pengalaman_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengalaman');
        $this->db->where('temp_vendor_pengalaman.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_pengalaman_manajerial_enkription($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function update_excel_pengalaman_manajerial_enkription($where, $data)
    {
        $this->db->update('temp_vendor_pengalaman', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_pengalaman_manajerial_enkription($where, $data)
    {
        $this->db->update('tbl_vendor_pengalaman', $data, $where);
        return $this->db->affected_rows();
    }

    function delete_import_excel_pengalaman($where)
    {
        $this->db->delete('temp_vendor_pengalaman', $where);
        return $this->db->affected_rows();
    }

    function delete_pengalaman($where)
    {
        $this->db->delete('tbl_vendor_pengalaman', $where);
        return $this->db->affected_rows();
    }
    public function get_result_pengalaman_manajerial($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function result_excel_pengalaman($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengalaman');
        $this->db->where('temp_vendor_pengalaman.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_excel_pengalaman_manajerial($id_vendor, $cek_table)
    {
        $this->db->select('*');
        $this->db->from('temp_vendor_pengalaman');
        $this->db->where('temp_vendor_pengalaman.id_vendor', $id_vendor);
        if ($cek_table) {
            foreach ($cek_table as $key => $value) {
                $this->db->where('no_kontrak !=', '' . $value['no_kontrak'] . '');
            }
        } else {
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_result_validasi_excel_pengalaman_manajerial($id_vendor, $cek_table2)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_pengalaman');
        $this->db->where('tbl_vendor_pengalaman.id_vendor', $id_vendor);
        if ($cek_table2) {
            foreach ($cek_table2 as $key => $valu2) {
                $this->db->or_where('no_kontrak', '' . $valu2['no_kontrak'] . '');
            }
        } else {
        }
        $query = $this->db->get();
        return $query->result_array();
    }
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
    // end neraca keuangan

    // CRUD SPT

    var $order_spt =  array('id_vendor_spt', 'nomor_surat', 'tahun_lapor', 'jenis_spt', 'tgl_penyampaian', 'file_dokumen', 'sts_validasi', 'id_vendor_spt');
    private function _get_data_query_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_spt as $item) // looping awal
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

                if (count($this->order_spt) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_spt[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_spt.id_vendor', 'ASC');
        }
    }

    public function gettable_spt($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_spt($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_spt($id_vendor)
    {
        $this->_get_data_query_spt($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    public function tambah_spt($data)
    {
        $this->db->insert('tbl_vendor_spt', $data);
        return $this->db->affected_rows();
    }

    public function update_spt($data, $where)
    {
        $this->db->update('tbl_vendor_spt', $data, $where);
    }

    public function get_row_spt_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_spt($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_spt');
        $this->db->where('tbl_vendor_spt.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }
    function delete_spt($where)
    {
        $this->db->delete('tbl_vendor_spt', $where);
        return $this->db->affected_rows();
    }
    // END CRUD SPT

    // crud keuangan
    function tambah_keuangan($data)
    {
        $this->db->insert('tbl_vendor_keuangan', $data);
        return $this->db->affected_rows();
    }

    function delete_keuangan($where)
    {
        $this->db->delete('tbl_vendor_keuangan', $where);
        return $this->db->affected_rows();
    }

    var $order_keuangan =  array('id_vendor_keuangan', 'tahun_lapor', 'file_laporan_auditor', 'file_laporan_keuangan', 'sts_validasi', 'id_vendor_keuangan');
    private function _get_data_query_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order_keuangan as $item) // looping awal
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

                if (count($this->order_keuangan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_keuangan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_keuangan.id_vendor', 'ASC');
        }
    }

    public function gettable_keuangan($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_keuangan($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered_keuangan($id_vendor)
    {
        $this->_get_data_query_keuangan($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }


    public function get_row_keuangan_url($id_url)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_url', $id_url);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor', $id_vendor);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_keuangan_row_banget($id_vendor_keuangan)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_keuangan');
        $this->db->where('tbl_vendor_keuangan.id_vendor_keuangan', $id_vendor_keuangan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_keuangan($data, $where)
    {
        $this->db->update('tbl_vendor_keuangan', $data, $where);
    }


    public function tambah_tbl_vendor_neraca($data)
    {
        $this->db->insert('tbl_vendor_neraca_keuangan', $data);
        return $this->db->affected_rows();
    }

    var $order_neraca_keuangan = array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

    private function _get_data_query_neraca_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
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

                if (count($this->order_pengalaman_excel) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pengalaman_excel[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_neraca_keuangan.id_vendor', 'DESC');
        }
    }

    public function gettable_neraca_keuangan($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_neraca_keuangan($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_neraca_keuangan($id_vendor)
    {
        $this->_get_data_query_neraca_keuangan($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }


    public function count_all_data_neraca_keuangan($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }



    public function get_row_neraca($id_neraca)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_neraca', $id_neraca);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_row_neraca_enkrip($id_url_neraca)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_neraca_keuangan');
        $this->db->where('tbl_vendor_neraca_keuangan.id_url_neraca', $id_url_neraca);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_neraca($data, $where)
    {
        $this->db->update('tbl_vendor_neraca_keuangan', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_neraca_enkrip($where, $data)
    {
        $this->db->update('tbl_vendor_neraca_keuangan', $data, $where);
        return $this->db->affected_rows();
    }

    function delete_neraca($where)
    {
        $this->db->delete('tbl_vendor_neraca_keuangan', $where);
        return $this->db->affected_rows();
    }
}
