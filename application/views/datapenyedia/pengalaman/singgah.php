<main class="container-fluid mt-5">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary border-primary">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fas fa-user-tag"></i>
                            <small><strong>Elektronik Data Rekanan Tervalidasi (E-DRT)</strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info shadow-lg" role="alert">
                        <h5 class="alert-heading">
                            <i class="fa-solid fa-circle-info px-1"></i>
                            Catatan!
                        </h5>
                        <hr>
                        <small>1. Upload dokumen-dokumen yang di butuhkan sesuai dengan keterangan form pengalaman di bawah ini.</small><br>
                        <small>2. Jika ingin menginput banyak pengalaman usaha bisa menggunakan tombol <b>export excel</b> dan isi data sesuai format excel. Lalu setelah itu <b>import excel</b> data yang sudah diisi sesuai format.</small><br>
                        <small>3. Semua dokumen <b>Kontrak/SPK & BASTP</b> wajib di upload dengan format file pdf. upload dokumen tersebut pada setiap pengalaman usaha yang sudah terinput melalui import excel / create data, dengan klik tombol <b>View</b> lalu <b>Edit</b>.</small><br>
                        <small>4. Jika salah upload atau status dokumen file <span class="text-danger"><b>tidak valid</b></span>, klik tombol <b>View</b> lalu <b>Edit Changes</b> untuk melakukan upload file dokumen yang terbaru atau file dokumen revisi.</small><br>
                        <small>5. Jika dokumen file sudah terenkripsi, untuk mendownload dan membuka dokumen file, mengklik tombol <b>dekripsi</b> dan masukan <b>token</b> yang keluar dalam form pop up dekripsi dokumen file.</small><br>
                    </div>
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <small><strong>Form Dokumen - Pengalaman Usaha</strong></small>
                                </span>
                            </div>
                            <div class="bd-highlight">
                                <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                    <i class="fa-solid fa-user-plus px-1"></i>
                                    Create Data
                                </button>
                            </div>&nbsp;
                            <span class="text-white">||</span>&nbsp;
                            <div class="bd-highlight">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#modalImportPengalaman" class="btn btn-secondary btn-sm shadow-lg">
                                    <i class="fa-solid fa-cloud-arrow-up px-1"></i>
                                    Import Excel
                                </button>
                            </div>&nbsp;<span class="text-white">||</span>
                        </div>
                        <div class="card-body">
                            <table style="font-size: 13px;text-align:center" id="data_pengalaman_manajerial" class="table table-sm table-bordered table-striped">
                                <thead class="bg-danger">
                                    <tr>
                                        <th class="text-white">No</th>
                                        <th style="width:8%;"><small class="text-white">No. Kontrak</small></th>
                                        <th style="width:8%;"><small class="text-white">Tgl. Kontrak</small></th>
                                        <th style="width:23%;"><small class="text-white">Nama Pekerjaan</small></th>
                                        <th style="width:9%;"><small class="text-white">Nilai (Rp.)</small></th>
                                        <th style="width:9%;"><small class="text-white">Jenis Tender</small></th>
                                        <th style="width:10%;"><small class="text-white">Instansi</small></th>
                                        <th style="width:10%;"><small class="text-white">Lokasi</small></th>
                                        <th style="width:8%;"><small class="text-white">
                                                <div class="text-center">Status Validasi</div>
                                            </small></th>
                                        <th style="width:15%;"><small class="text-white">
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
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modal-xl-pengalaman">
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
                                    <small><strong>Form Data - Pengalaman Perusahaan</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_pengalaman" method="post" enctype="multipart/form-data">
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>No. Kontrak</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input name="no_kontrak" type="text" class="form-control">
                                                </div>
                                                <small class="no_kontrak_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Tanggal Kontrak</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                    <input name="tanggal_kontrak" type="date" id="date" class="form-control">
                                                </div>
                                                <small class="tanggal_kontrak_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Nama Pekerjaan</b></label>
                                        </td>
                                        <td class="col-sm-5" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                    <textarea name="nama_pekerjaan" type="text" class="form-control" rows="2"></textarea>
                                                </div>
                                                <small class="tanggal_kontrak_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Jenis Pengadaan</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select name="id_jenis_usaha" class="form-select" aria-label="Default select example">
                                                        <option value="Jasa Lainnya">Jasa Lainnya</option>
                                                        <option value="Jasa Konstruksi">Jasa Konstruksi</option>
                                                        <option value="Jasa Pengadaan Barang">Jasa Pengadaan Barang</option>
                                                        <option value="Jasa Konsultasi">Jasa Konsultasi</option>
                                                        <option value="Sewa Kelola">Sewa Kelola</option>
                                                    </select>
                                                </div>
                                                <!-- id_jenis_usaha -->
                                                <small class="id_jenis_usaha_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Nilai Kontrak</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-10">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">Rp.</span>
                                                    <input name="nilai_kontrak" type="text" id="tanpa-rupiah" class="form-control">
                                                </div>
                                                  <!-- nilai_kontrak -->
                                                  <small class="nilai_kontrak_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Instansi Pemberi</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                                    <input name="instansi_pemberi" type="text" class="form-control">
                                                </div>
                                                <!-- instansi_pemberi -->
                                                <small class="instansi_pemberi_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Lokasi Pekerjaan</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                    <input name="lokasi_pekerjaan" type="text" class="form-control">
                                                </div>
                                                 <!-- lokasi_pekerjaan -->
                                                 <small class="lokasi_pekerjaan_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Upload File Kontrak</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                        <input type="hidden" name="file_dokumen_manipulasi_pengalaman">
                                            <input type="file" class="file_valid_pengalaman" name="file_kontrak_pengalaman" id="file" accept=".pdf">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12" colspan="4">
                                            <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                                <i class="fa-solid fa-angles-left px-1"></i>
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-success btn-sm shadow-lg btn_simpan">
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
</main>

<div class="modal fade" id="modalImportPengalaman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Pengalaman Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="text-white">Import Data Pengalaman Perusahaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <a href="<?= base_url('format_excel/FORMAT EXCEL DATA PENGALAMAN PERUSAHAAN DRT JMTO.xlsx') ?>" class="btn btn-success"> <img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> Download Format Excel</a>
                                        </center>
                                        <br>
                                        <form action="javascript:;" id="form_import_excel_pengalaman" enctype="multipart/form-data" method="post">
                                            <div class="input-group">
                                                <input type="file" class="form-control form-control-sm" id="importexcel" aria-describedby="inputGroupFileAddon04" accept=".xlsx,.xls" name="importexcel" aria-label="Upload" required>
                                                <button class="btn btn-sm btn-success" type="submit" id="inputGroupFileAddon04"><img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> UPLOAD</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>
                                <br><br>
                                <div style="display: none;" class="data_tervalidasi_pengalaman">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white">
                                                Data Ini Sudah Ada , Dan Tidak Dapat Dimasukan Ke Table Pemilik
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped table-inverse table-responsive">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>No Kontrak</th>
                                                            <th>Nama PEKERJAAN</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="data_tervalidasi_excel_pengalaman">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bg-success text-white">
                                        View Data Import
                                    </div>
                                    <div class="card-body">
                                        <table id="data_excel_pengalaman_manajerial" style="width: 100%;font-size:12px" class="table table-bordered">
                                            <thead class="bg-secondary" style="text-align: center;">
                                                <tr>
                                                    <th class="text-white">
                                                        No
                                                    </th>
                                                    <th>
                                                        <small class="text-white">No. Kontrak</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">Tgl. Kontrak</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">Nama Pekerjaan</small>
                                                    </th>
                                                    <th><small class="text-white">Nilai (Rp.)</small></th>
                                                    <th>
                                                        <small class="text-white">Jenis Tender</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">
                                                            <div class="text-center">Instansi</div>
                                                        </small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">
                                                            <div class="text-center">Lokasi</div>
                                                        </small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">
                                                            <div class="text-center"> Aksi </div>
                                                        </small>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" onclick="Hapus_import_pengalaman()" class="btn btn-secondary" data-bs-dismiss="modal">Reset Table View</a>
                <a href="javascript:;" onclick="Simpan_import_pengalaman()" class="btn btn-primary">Simpan Ke Table</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal_edit_excel_pengalaman_manajerial">
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
                                <small><strong>Form Edit Excel Pengalaman Manajerial</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_excel_pengalaman_manajerial" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengalaman">
                            <input type="hidden" name="type_edit_pengalaman">
                            <input type="hidden" name="validasi_enkripsi_pengalaman">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>No. Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                <input name="no_kontrak" type="text" class="form-control">
                                            </div>
                                             <!-- no_kontrak -->
                                             <small class="no_kontrak_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tanggal Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                <input name="tanggal_kontrak" type="date" id="date" class="form-control">
                                            </div>
                                            <!-- tanggal_kontrak -->
                                            <small class="tanggal_kontrak_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Pekerjaan</b></label>
                                    </td>
                                    <td class="col-sm-5" colspan="3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <textarea name="nama_pekerjaan" type="text" class="form-control" rows="2"></textarea>
                                            </div>
                                             <!-- nama_pekerjaan -->
                                             <small class="nama_pekerjaan_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jenis Pengadaan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="id_jenis_usaha" class="form-select" aria-label="Default select example">
                                                    <option value="Jasa Lainnya">Jasa Lainnya</option>
                                                    <option value="Jasa Konstruksi">Jasa Konstruksi</option>
                                                    <option value="Jasa Pengadaan Barang">Jasa Pengadaan Barang</option>
                                                    <option value="Jasa Konsultasi">Jasa Konsultasi</option>
                                                    <option value="Sewa Kelola">Sewa Kelola</option>
                                                </select>
                                            </div>
                                             <!-- id_jenis_usaha -->
                                             <small class="id_jenis_usaha_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nilai Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-10">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">Rp.</span>
                                                <input name="nilai_kontrak" type="text" id="tanpa-rupiah" class="form-control">
                                            </div>
                                             <!-- nilai_kontrak -->
                                             <small class="nilai_kontrak_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Instansi Pemberi</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                                <input name="instansi_pemberi" type="text" class="form-control">
                                            </div>
                                            <!-- instansi_pemberi -->
                                            <small class="instansi_pemberi_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Lokasi Pekerjaan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                <input name="lokasi_pekerjaan" type="text" class="form-control">
                                            </div>
                                            <!-- lokasi_pekerjaan -->
                                            <small class="lokasi_pekerjaan_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File Kontrak</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                    <input type="hidden" name="file_dokumen_manipulasi_pengalaman">
                                            <input type="file" class="file_valid_pengalaman" name="file_kontrak_pengalaman" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_kontrak_pengalaman">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_pengalaman">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-10" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg btn_simpan btn_edit_biasa">
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