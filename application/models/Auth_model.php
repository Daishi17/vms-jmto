<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function login($username)
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $this->db->where('email', $username);
        $this->db->or_where('npwp', $username);
        return $this->db->get()->row();
    }


    
    public function update_password($data, $username)
    {
        $this->db->where('email', $username);
        $this->db->or_where('npwp', $username);
        $this->db->update('tbl_vendor', $data);
        return $this->db->affected_rows();
    }


    public function insert_log($data)
    {
        $this->db->insert('tbl_vendor_log', $data);
        return $this->db->affected_rows();
    }
}
