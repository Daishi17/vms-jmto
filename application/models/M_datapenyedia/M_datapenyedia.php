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

    // 
    // tambah kbli nib
    public function tambah_kbli_nib($data)
    {
        $this->db->insert('tbl_vendor_kbli_nib', $data);
        return $this->db->affected_rows();
    }
    var $colum_order = array('id_vendor_kbli_nib', 'kode_kbli', 'nama_kbli', 'sts_kbli_nib', 'id_vendor_kbli_nib');
    var $order =  array('id_vendor_kbli_nib', 'kode_kbli', 'nama_kbli', 'sts_kbli_nib', 'id_vendor_kbli_nib');

    // get nib
    private function _get_data_query($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor_kbli_nib');
        $this->db->join('tbl_kbli', 'tbl_vendor_kbli_nib.id_kbli = tbl_kbli.id_kbli', 'left');
        $this->db->join('tbl_kualifikasi_izin', 'tbl_vendor_kbli_nib.id_kualifikasi_izin = tbl_kualifikasi_izin.id_kualifikasi_izin', 'left');
        $this->db->where('tbl_vendor_kbli_nib.id_vendor', $id_vendor);
        $i = 0;
        foreach ($this->order as $item) // looping awal
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

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_vendor_kbli_nib.id_vendor_kbli_nib', 'DESC');
        }
    }

    public function gettable_kbli_nib($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data($id_vendor)
    {
        $this->_get_data_query($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data($id_vendor)
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
}
