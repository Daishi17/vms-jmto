public function tambah_tbl_vendor_neraca($data)
    {
        $this->db->insert('tbl_vendor_neraca_keuangan', $data);
        return $this->db->affected_rows();
    }

    var $order_neraca_keuangan=  array('id_vendor', 'no_kontrak', 'nama_pekerjaan', 'id_jenis_usaha', 'tanggal_kontrak', 'instansi_pemberi', 'nilai_kontrak', 'id_vendor', 'id_vendor');

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

<div class="modal" tabindex="-1" id="modal-xl-neraca">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-dark shadow-lg">
                    <div class="card-header bg-dark d-flex bd-highlight">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-white">
                                <i class="fa-solid fa-align-justify px-1"></i>
                                <small><strong>Form Data - Neraca Keuangan</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info shadow-lg" role="alert">
                            <h5 class="alert-heading">
                                <i class="fa-solid fa-circle-info px-1"></i>
                                Catatan!
                            </h5>
                            <hr>
                            <small>1. Klik Button Isi Format Excel Neraca.</small><br>
                            <small>2. Isi Format Dengan Sesuai Table Yang Kami Formatkan.</small><br>
                            <small>3. Setalah Format Anda Isi Silakan Anda Download Format Dalam Bentuk Excel Lalu Anda Upload Format Nya Ke Dalam File Upload Neraca Keuangan.</small><br>
                        </div>
                        <br>
                        <center>
                            <a href="javascript:;" onclick="buat_format_excel()" class="btn btn-primary btn-sm mb-2">Isi Dan Download Format Excel</a>
                        </center>


                        <br>
                        <form id="form_simpan_neraca" enctype="multipart/form-data">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Akuntan Publik</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <input name="nama_akuntan_public" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tanggal Laporan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                <input type="date" name="tangga_laporan" id="date" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload Neraca Keuangan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_dokumen_neraca" id="file" accept=".xlsx">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File Sertifikat</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_dokumen_sertifikat" id="file" accept=".pdf,.xlsx">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-12" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg btn-simpan">
                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                            Save Changes
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal-xl-neraca-edit">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <a class="navbar-brand">
                    <img src="<?php echo base_url(); ?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                    <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
                </a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card border-dark shadow-lg">
                    <div class="card-header bg-dark d-flex bd-highlight">
                        <div class="flex-grow-1 bd-highlight">
                            <span class="text-white">
                                <i class="fa-solid fa-align-justify px-1"></i>
                                <small><strong>Form Data - Neraca Keuangan</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-info shadow-lg" role="alert">
                            <h5 class="alert-heading">
                                <i class="fa-solid fa-circle-info px-1"></i>
                                Catatan!
                            </h5>
                            <hr>
                            <small>1. Klik Button Isi Format Excel Neraca.</small><br>
                            <small>2. Isi Format Dengan Sesuai Table Yang Kami Formatkan.</small><br>
                            <small>3. Setalah Format Anda Isi Silakan Anda Download Format Dalam Bentuk Excel Lalu Anda Upload Format Nya Ke Dalam File Upload Neraca Keuangan.</small><br>
                        </div>
                        <br>
                        <center>
                            <a href="javascript:;" onclick="buat_format_excel()" class="btn btn-primary btn-sm mb-2">Isi Dan Download Format Excel</a>
                        </center>
                        <br>
                        <form id="form_edit_neraca" enctype="multipart/form-data">
                            <input type="hidden" name="id_neraca">
                            <input type="hidden" name="validasi_enkripsi">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Akuntan Publik</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <input name="nama_akuntan_public" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tanggal Laporan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                <input type="date" name="tangga_laporan" id="date" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_dokumen_neraca" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_dokumen_neraca">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_dokumen_sertifikat" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_dokumen_sertifikat">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_neraca">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-12" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg btn-simpan">
                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                            Save Changes
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<div class="modal fade" id="buat_format_excel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-secondary text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Format Pengisian Neraca Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('datapenyedia/buat_excel_format_neraca') ?>" method="post">
                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th class="tg-9wq8" rowspan="2">NO</th>
                                <th class="tg-9wq8" rowspan="2">Uraian</th>
                                <th class="tg-9wq8" rowspan="2">Jenis Laporan</th>
                                <th class="tg-9wq8" colspan="2">Tahun 2022</th>
                                <th class="tg-9wq8" colspan="2">Tahun 2023</th>
                            </tr>
                            <tr>
                                <th class="tg-9wq8" colspan="2">(Rp).</th>
                                <th class="tg-9wq8" colspan="2">(Rp).</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tg-0pky">1</td>
                                <td class="tg-0pky">Penjelasan/Opini dari Auditor Kantor Akuntan Publik</td>
                                <td class="tg-0pky"><select name="jenis_laporan_1" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_1"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_1"></td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">2</td>
                                <td class="tg-za14">Jumlah Kas dan Bank</td>
                                <td class="tg-0pky"><select name="jenis_laporan_2" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_2"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_2"></td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">3</td>
                                <td class="tg-za14">Total Hutang</td>
                                <td class="tg-0pky"><select name="jenis_laporan_3" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_3"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_3"></td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">4</td>
                                <td class="tg-za14">Total Ekuitas</td>
                                <td class="tg-0pky"><select name="jenis_laporan_4" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_4"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_4"></td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">5</td>
                                <td class="tg-za14">Total Aktiva Lancar</td>
                                <td class="tg-0pky"><select name="jenis_laporan_5" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_5"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_5"></td>
                            </tr>
                            <tr>
                                <td class="tg-0pky">6</td>
                                <td class="tg-za14">Total Hutang Lancar</td>
                                <td class="tg-0pky"><select name="jenis_laporan_6" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_6"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_6"></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">7</td>
                                <td class="tg-7zrl">Laba Usaha</td>
                                <td class="tg-0pky"><select name="jenis_laporan_7" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_7"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_7"></td>
                            </tr>
                            <tr>
                                <td class="tg-0lax">8</td>
                                <td class="tg-7zrl">EBITDA (Laba Usaha + Beban Penyusutan)</td>
                                <td class="tg-0pky"><select name="jenis_laporan_8" class="form-control form-control-sm" id="">
                                        <option value="Audit">Audit</option>
                                        <option value="Tidak Audit">Tidak Audit</option>
                                    </select></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_1_8"></td>
                                <td class="tg-0pky" colspan="2"><input class="rupiahku form-control form-control-sm" type="text" name="nilai_tahun_kolom_2_8"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">Cetak Format Dan Download</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
    </div>
</div>

