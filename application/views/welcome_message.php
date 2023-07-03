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