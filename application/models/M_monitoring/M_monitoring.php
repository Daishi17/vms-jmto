<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_monitoring extends CI_Model
{
    var $order =  array('id_monitoring', 'nomor_surat', 'nomor_kbli', 'sts_validasi', 'id_monitoring');

    // get nib
    private function _get_data_query_monitoring_dokumen($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('monitoring_dokumen');
        $this->db->where('monitoring_dokumen.id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['SIUP', 'SIUP-KBLI', 'NIB', 'NIB-KBLI', 'SBU', 'KODE-SBU', 'SIUJK', 'SIUJK-KBLI']);
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
            $this->db->order_by('monitoring_dokumen.id_monitoring', 'DESC');
        }
    }

    public function gettable_monitoring_dokumen($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_monitoring_dokumen($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_monitoring_dokumen($id_vendor)
    {
        $this->_get_data_query_monitoring_dokumen($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_monitoring_dokumen($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('monitoring_dokumen');
        $this->db->where('monitoring_dokumen.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

    function get_kbli($no_kbli)
    {
        $this->db->select('*');
        $this->db->from('tbl_kbli');
        $this->db->where('tbl_kbli.kode_kbli', $no_kbli);
        $query = $this->db->get();
        return $query->row_array();
    }

    function get_sbu($no_sbu)
    {
        $this->db->select('*');
        $this->db->from('tbl_sbu');
        $this->db->where('tbl_sbu.kode_sbu', $no_sbu);
        $query = $this->db->get();
        return $query->row_array();
    }

    var $order2 =  array('id_monitoring', 'jenis_dokumen', 'nomor_surat', 'sts_validasi', 'id_monitoring');

    private function _get_data_query_monitoring_dokumen2($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('monitoring_dokumen');
        $this->db->where('monitoring_dokumen.id_vendor', $id_vendor);
        $this->db->where_in('jenis_dokumen', ['AKTA-PENDIRIAN', 'AKTA-PERUBAHAN']);
        $i = 0;
        foreach ($this->order2 as $item) // looping awal
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

                        if (count($this->order2) - 1 == $i)
                            $this->db->group_end();
                    }
                $i++;
            }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('monitoring_dokumen.id_monitoring', 'DESC');
        }
    }

    public function gettable_monitoring_dokumen2($id_vendor) //nam[ilin data pake ini
    {
        $this->_get_data_query_monitoring_dokumen2($id_vendor); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_monitoring_dokumen2($id_vendor)
    {
        $this->_get_data_query_monitoring_dokumen2($id_vendor); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_monitoring_dokumen2($id_vendor)
    {
        $this->db->select('*');
        $this->db->from('monitoring_dokumen');
        $this->db->where('monitoring_dokumen.id_vendor', $id_vendor);
        return $this->db->count_all_results();
    }

}
