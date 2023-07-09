public function tambah_tbl_vendor_neraca($data)
{
$this->db->insert('tbl_vendor_neraca_keuangan', $data);
return $this->db->affected_rows();
}

var $order_neraca_keuangan= array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

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






<div class="tab-pane fade" id="nav-neraca" role="tabpanel" aria-labelledby="nav-neraca-tab">
    <div class="card border-dark shadow-sm">
        <div class="card-header border-dark d-flex bd-highlight">
            <div class="p-1 flex-grow-1 bd-highlight">
                <span class="text-dark">
                    <i class="fa-regular fa-file-lines px-1"></i>
                    <small><strong>Form Pajak - Neraca Keuangan</strong></small>
                </span>
            </div>
            <div class="bd-highlight">
                <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-neraca">
                    <i class="fa-solid fa-user-plus px-1"></i>
                    Create Data
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="table_nerca_keuangan" class="table table-sm table-bordered table-striped">
                <thead class="bg-dark">
                    <tr class="shadow-lg">
                        <th style="width:5%;" class="text-white">No</th>
                        <th style="width:10%;"><small class="text-white">Tanggal Laporan</small></th>
                        <th style="width:20%;"><small class="text-white">Nama Akuntan Publik</small></th>
                        <th style="width:10%;"><small class="text-white">
                                <div class="text-center">Status Validasi</div>
                            </small></th>
                        <th style="width:10%;"><small class="text-white">
                                <div class="text-center">More Options</div>
                            </small></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

