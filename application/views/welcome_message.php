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
