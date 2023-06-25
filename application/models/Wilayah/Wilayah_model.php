<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wilayah_model extends CI_Model
{
   private $tableProv = "tbl_provinsi";

   public function getProvinsi()
   {
      return $this->db->get($this->tableProv)->result_array();
   }
   public function getKabupaten($id_provinsi)
   {
      return $this->db->get_where('tbl_kabupaten', array('id_provinsi' => $id_provinsi))->result_array();
   }
   public function getKecamatan($id_kabupaten)
   {
      return $this->db->get_where('tbl_kecamatan', array('id_kabupaten' => $id_kabupaten))->result_array();
   }
   public function getAllKabupaten()
   {
      return $this->db->get('tbl_kabupaten')->result_array();
   }
}
