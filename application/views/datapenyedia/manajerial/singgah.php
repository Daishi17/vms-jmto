<!-- url -->
<!-- PEMILIK -->
<input type="hidden" name="url_data_excel_pemilik_manajerial" value="<?= base_url('datapenyedia/get_data_excel_pemilik_manajerial') ?>">
<input type="hidden" name="url_data_pemilik_manajerial" value="<?= base_url('datapenyedia/get_data_pemilik_manajerial') ?>">
<input type="hidden" name="url_byid_pemilik_manajerial" value="<?= base_url('datapenyedia/by_id_excel_pemilik_menajerial/') ?>">
<input type="hidden" name="url_hapus_row_import_excel_pemilik" value="<?= base_url('datapenyedia/hapus_row_import_excel_pemilik/') ?>">
<input type="hidden" name="url_hapus_import_excel_pemilik" value="<?= base_url('datapenyedia/hapus_import_excel_pemilik') ?>">
<input type="hidden" name="url_dekrip_enkrip_pemilik" value="<?= base_url('datapenyedia/dekrip_enkrip_pemilik/') ?>">
<input type="hidden" name="url_download_pemilik" value="<?= base_url('datapenyedia/url_download_pemilik/') ?>">
<input type="hidden" name="url_download_pengurus" value="<?= base_url('datapenyedia/url_download_pengurus/') ?>">
<input type="hidden" name="url_buat_pemilik_manajerial" value="<?= base_url('datapenyedia/buat_pemilik_manajerial') ?>">
<input type="hidden" name="url_by_id_pemilik_manajerial" value="<?= base_url('datapenyedia/by_id_pemilik_manajerial/') ?>">
<input type="hidden" name="url_hapus_row_pemilik" value="<?= base_url('datapenyedia/hapus_row_pemilik/') ?>">
<input type="hidden" name="url_edit_excel_pemilik_manajerial" value="<?= base_url('datapenyedia/edit_excel_pemilik_manajerial') ?>">
<input type="hidden" name="url_import_pemilik_perusahaan" value="<?= base_url('datapenyedia/import_pemilik_perusahaan') ?>">
<input type="hidden" name="url_simpan_import_excel_pemilik" value="<?= base_url('datapenyedia/simpan_import_excel_pemilik') ?>">

<!-- PEMGURUS -->

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
                        <small>1. Upload dokumen-dokumen yang di butuhkan sesuai dengan keterangan form manajerial di bawah ini.</small><br>
                        <small>2. Jika ingin menginput banyak biodata pemilik/pengurus bisa menggunakan tombol <b>export excel</b> dan isi data sesuai format excel. Lalu setelah itu <b>import excel</b> data yang sudah diisi sesuai format.</small><br>
                        <small>3. Semua dokumen <b>KTP & NPWP</b> wajib di upload dengan format file xlsx. upload dokumen tersebut pada setiap biodata pemilik/pengurus yang sudah terinput melalui import excel / create data, dengan klik tombol <b>View</b> lalu <b>Edit</b>.</small><br>
                        <small>4. Jika salah upload atau status dokumen file <span class="text-danger"><b>tidak valid</b></span>, klik tombol <b>View</b> lalu <b>Edit Changes</b> untuk melakukan upload file dokumen yang terbaru atau file dokumen revisi.</small><br>
                        <small>5. Jika dokumen file sudah terenkripsi, untuk mendownload dan membuka dokumen file, mengklik tombol <b>dekripsi</b> dan masukan <b>token</b> yang keluar dalam form pop up dekripsi dokumen file.</small><br>
                    </div>
                    <div class="card border-secondary shadow-lg">
                        <div class="card-header bg-secondary border-secondary">
                            <h6 class="card-title">
                                <span class="text-white">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <small><strong>Form Dokumen Manajerial Pemilik/Pengurus</strong></small>
                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="card border-danger shadow-sm">
                                <div class="card-header">
                                    <div class="nav nav-tabs mb-3 bg-danger" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-pemilik-tab" data-bs-toggle="tab" data-bs-target="#nav-pemilik" type="button" role="tab" aria-controls="nav-pemilik" aria-selected="true">
                                            <small class="text-dark"><i class="fa-regular fa-file-powerpoint px-1"></i>
                                                <b>Pemilik Perusahaan</b>
                                            </small>
                                        </button>
                                        <button class="nav-link" id="nav-pengurus-tab" data-bs-toggle="tab" data-bs-target="#nav-pengurus" type="button" role="tab" aria-controls="nav-pengurus" aria-selected="false">
                                            <small class="text-dark"><i class="fa-regular fa-file-xlsx px-1"></i>
                                                <b>Pengurus Perusahaan</b>
                                            </small>
                                        </button>
                                    </div>
                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-pemilik" role="tabpanel" aria-labelledby="nav-pemilik-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-dark">
                                                            <i class="fa-solid fa-building-user"></i>
                                                            <small><strong>Form Dokumen - Manajerial Pemilik Usaha</strong></small>
                                                        </span>
                                                    </div>
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" onclick="Buat_pemilik()">
                                                            <i class="fa-solid fa-user-plus px-1"></i>
                                                            Create Data
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>&nbsp;
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modalImportPemilik">
                                                            <i class="fa-solid fa-cloud-arrow-up px-1"></i>
                                                            Import Excel
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>
                                                </div>
                                                <div class="card-body">
                                                    <table id="data_pemilik_manajerial" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:7%;"><small class="text-white">No</small></th>
                                                                <th style="width:10%;"><small class="text-white">NIK/Paspor</small></th>
                                                                <th style="width:15%;"><small class="text-white">NPWP</small></th>
                                                                <th style="width:15%;"><small class="text-white">Nama</small></th>
                                                                <th style="width:8%;"><small class="text-white">Warganegara</small></th>
                                                                <th style="width:15%;"><small class="text-white">Jenis Kepemilikan</small></th>
                                                                <th style="width:7%;"><small class="text-white">
                                                                        <div class="text-center">Saham %</div>
                                                                    </small></th>
                                                                <th style="width:10%;"><small class="text-white">
                                                                        <div class="text-center">Status Validasi</div>
                                                                    </small></th>
                                                                <th style="width:18%;"><small class="text-white">
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
                                        <div class="tab-pane fade" id="nav-pengurus" role="tabpanel" aria-labelledby="nav-pengurus-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex bd-highlight">
                                                    <div class="p-1 flex-grow-1 bd-highlight">
                                                        <span class="text-dark">
                                                            <i class="fa-solid fa-building-user"></i>
                                                            <small><strong>Form Dokumen - Manajerial Pengurus Usaha</strong></small>
                                                        </span>
                                                    </div>
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengurus">
                                                            <i class="fa-solid fa-user-plus px-1"></i>
                                                            Create Data
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>&nbsp;
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modalImportPengurus">
                                                            <i class="fa-solid fa-cloud-arrow-up px-1"></i>
                                                            Import Excel
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>
                                                </div>
                                                <div class="card-body">
                                                    <table id="data_pengurus_manajerial" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr class="shadow-lg">
                                                                <th style="width:5%;"><small class="text-white">No</small></th>
                                                                <th style="width:5%;"><small class="text-white">NIK/Paspor</small></th>
                                                                <th style="width:7%;"><small class="text-white">NPWP</small></th>
                                                                <th style="width:25%;"><small class="text-white">Nama</small></th>
                                                                <th style="width:8%;"><small class="text-white">Warganegara</small></th>
                                                                <th style="width:10%;"><small class="text-white">
                                                                        <div class="text-left">Jabatan</div>
                                                                    </small></th>
                                                                <th style="width:7%;"><small class="text-white">
                                                                        <div class="text-left">Sejak</div>
                                                                    </small></th>
                                                                <th style="width:7%;"><small class="text-white">
                                                                        <div class="text-left">Sampai</div>
                                                                    </small></th>
                                                                <th style="width:10%;"><small class="text-white">
                                                                        <div class="text-center">Status Validasi</div>
                                                                    </small></th>
                                                                <th style="width:18%;"><small class="text-white">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="modal-xl-pemilik">
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
                                    <small><strong>Form Data - Manajerial Pemilik Usaha</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_manajerial_pemilik" method="post" enctype="multipart/form-data">
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input name="nik" type="text" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                                </div>
                                                <small class="nik_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input name="npwp" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                                </div>
                                                <!-- npwp -->
                                                <small class="npwp_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Nama Pemilik</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                    <input name="nama_pemilik" type="text" class="form-control">
                                                </div>
                                                <!-- nama_pemilik -->
                                                <small class="nama_pemilik_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select name="warganegara" class="form-select" aria-label="Default select example">
                                                        <option selected>Indonesia</option>
                                                        <option>Asing</option>
                                                    </select>
                                                </div>
                                                <!-- warganegara -->
                                                <small class="warganegara_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Jenis Kepemilik</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select name="jns_pemilik" class="form-select" aria-label="Default select example">
                                                        <option selected>Individu</option>
                                                        <option>Perusahaan Nasional</option>
                                                        <option>Perusahaan Asing</option>
                                                        <option>Pemerintah</option>
                                                        <option>Publik</option>
                                                    </select>
                                                </div>
                                                <!-- jns_pemilik -->
                                                <small class="jns_pemilik_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Saham</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text">%</span>
                                                    <input name="saham" type="number" onkeyup="validasi_saham()" class="form-control">
                                                </div>
                                                <!-- saham -->
                                                <small class="saham_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Alamat Pemilik</b></label>
                                        </td>
                                        <td class="col-sm-3" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                    <input name="alamat_pemilik" type="text" class="form-control">
                                                </div>
                                                <!-- alamat_pemilik -->
                                                <small class="alamat_pemilik_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="file" name="file_ktp" id="file" accept=".pdf">
                                            <!-- file_ktp -->
                                            <small class="file_ktp_error text-danger"></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="file" name="file_npwp" id="file" accept=".pdf">
                                            <!-- file_npwp -->
                                            <small class="file_npwp_error text-danger"></small>
                                        </td>
                                    </tr>

                                    <hr>
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
    <div class="modal" tabindex="-1" id="modal-xl-pengurus">
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
                    <div class="card border-secondary shadow-lg">
                        <div class="card-header bg-secondary d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-align-justify px-1"></i>
                                    <small><strong>Form Data - Manajerial Pengurus Usaha</strong></small>
                                </span>
                            </div>
                            <div class="bd-highlight">

                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_manajerial_pengurus" method="post" enctype="multipart/form-data">
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" name="nik_pengurus" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                                </div>
                                                <!-- nik_pengurus -->
                                                <small class="nik_pengurus_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input name="npwp_pengurus" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                                </div>
                                                <!-- npwp_pengurus -->
                                                <small class="npwp_pengurus_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Nama Pengurus</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                    <input name="nama_pengurus" type="text" class="form-control">
                                                </div>
                                                <!-- nama_pengurus -->
                                                <small class="nama_pengurus_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select name="warganegara_pengurus" class="form-select" aria-label="Default select example">
                                                        <option selected>Indonesia</option>
                                                        <option>Asing</option>
                                                    </select>
                                                </div>
                                                <!-- warganegara_pengurus -->
                                                <small class="warganegara_pengurus_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Jabatan Pengurus</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                                    <input name="jabatan_pengurus" type="text" class="form-control">
                                                </div>
                                                <!-- jabatan_pengurus -->
                                                <small class="jabatan_pengurus_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Jabat Mulai - Sampai</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12 mb-3">
                                                <input type="date" class="form-control" name="jabatan_mulai" id="date">
                                                <!-- jabatan_mulai -->
                                                <small class="jabatan_mulai_error text-danger"></small>
                                                <small>-</small>
                                                <!-- jabatan_selesai -->
                                                <small class="jabatan_selesai_error text-danger"></small>
                                                <input name="jabatan_selesai" class="form-control" type="date" id="date">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Alamat Pengurus</b></label>
                                        </td>
                                        <td class="col-sm-3" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                    <textarea name="alamat_pengurus" type="text" class="form-control"></textarea>
                                                </div>
                                                <!-- alamat_pengurus -->
                                                <small class="alamat_pengurus_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="hidden" name="file_dokumen_manipulasi_ktp_pengurus">
                                            <input type="file" class="file_valid_ktp_pengurus" name="file_ktp_pengurus" id="file" accept=".pdf">
                                        </td>

                                        <td class="col-sm-3">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="hidden" name="file_dokumen_manipulasi_npwp_pengurus">
                                            <input type="file" class="file_valid_npwp_pengurus" name="file_npwp_pengurus" id="file" accept=".pdf">
                                        </td>

                                        <td class="col-sm-3">
                                        </td>
                                    </tr>
                                    <hr>
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


<!-- MODAL PEMILIK IMPORT -->
<div class="modal fade" id="modalImportPemilik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Pemilik Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="text-white">Import Data Pemilik Perusahaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <a href="<?= base_url('format_excel/FORMAT EXCEL DATA PEMILIK PERUSAHAAN DRT JMTO.xlsx') ?>" class="btn btn-success"> <img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> Download Format Excel</a>
                                        </center>
                                        <br>
                                        <form action="javascript:;" id="form_import_excel" enctype="multipart/form-data" method="post">
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
                                <div style="display: none;" class="data_tervalidasi">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white">
                                                Data Ini Sudah Ada , Dan Tidak Dapat Dimasukan Ke Table Pemilik
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped table-inverse table-responsive">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>Nik</th>
                                                            <th>Nama Pemilik</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="data_tervalidasi_excel">

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
                                        <table id="data_excel_pemilik_manajerial" style="width: 100%;font-size:12px" class="table table-bordered">
                                            <thead class="bg-secondary" style="text-align: center;">
                                                <tr>
                                                    <th class="text-white">
                                                        No
                                                    </th>
                                                    <th>
                                                        <small class="text-white">NIK/Paspor</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">NPWP</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">Nama</small>
                                                    </th>
                                                    <th><small class="text-white">Warganegara</small></th>
                                                    <th>
                                                        <small class="text-white">Jenis Kepemilikan</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">
                                                            <div class="text-center">Saham %</div>
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
                <a href="javascript:;" onclick="Hapus_import_pemilik()" class="btn btn-secondary" data-bs-dismiss="modal">Reset Table View</a>
                <a href="javascript:;" onclick="Simpan_import_pemilik()" class="btn btn-primary">Simpan Ke Table</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal_edit_excel_pemilik_manajerial">
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
                                <small><strong>Form Edit Excel Pemilik Manajerial</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_excel_pemilik_manajerial" enctype="multipart/form-data">
                            <input type="hidden" name="id_pemilik">
                            <input type="hidden" name="type_edit_pemilik">
                            <input type="hidden" name="validasi_enkripsi_pemilik">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input name="nik" type="text" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                            </div>
                                            <small class="nik_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input name="npwp" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                            </div>
                                            <small class="npwp_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Pemilik</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <input name="nama_pemilik" type="text" class="form-control">
                                            </div>
                                            <small class="nama_pemilik_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="warganegara" class="form-select" aria-label="Default select example">
                                                    <option selected>Indonesia</option>
                                                    <option>Asing</option>
                                                </select>
                                            </div>
                                            <small class="warganegara_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jenis Kepemilik</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="jns_pemilik" class="form-select" aria-label="Default select example">
                                                    <option selected>Individu</option>
                                                    <option>Perusahaan Nasional</option>
                                                    <option>Perusahaan Asing</option>
                                                    <option>Pemerintah</option>
                                                    <option>Publik</option>
                                                </select>
                                                <small class="jns_pemilik_error text-danger"></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Saham</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-6">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text">%</span>
                                                <input name="saham" onkeyup="validasi_saham_edit()" type="number" class="form-control saham_edit">
                                            </div>
                                            <small class="saham_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Alamat Pemilik</b></label>
                                    </td>
                                    <td class="col-sm-3" colspan="3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                <input name="alamat_pemilik" type="text" class="form-control">
                                            </div>
                                            <small class="alamat_pemilik_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="hidden" name="file_ktp_manipulasi">
                                        <input type="file" name="file_ktp" class="edit_ktp" accept=".pdf">
                                        <small class="file_ktp_error text-danger"></small>
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_ktp">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="hidden" name="file_npwp_manipulasi">
                                        <input type="file" name="file_npwp" class="edit_npwp" accept=".pdf">
                                        <small class="file_npwp_error text-danger"></small>
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_npwp">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_pemilik">

                                        </div>
                                    </td>
                                </tr>
                                <hr>
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

<!-- MODAL PENGURUS IMPORT -->

<div class="modal fade" id="modalImportPengurus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Pengurus Perusahaan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h4 class="text-white">Import Data Pengurus Perusahaan</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <a href="<?= base_url('format_excel/FORMAT EXCEL DATA PENGURUS PERUSAHAAN DRT JMTO.xlsx') ?>" class="btn btn-success"> <img src="<?= base_url('assets/excel.png') ?>" style="width: 20px;" alt=""> Download Format Excel</a>
                                        </center>
                                        <br>
                                        <form action="javascript:;" id="form_import_excel_pengurus" enctype="multipart/form-data" method="post">
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
                                <div style="display: none;" class="data_tervalidasi_pengurus">
                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        <div class="card">
                                            <div class="card-header bg-danger text-white">
                                                Data Ini Sudah Ada , Dan Tidak Dapat Dimasukan Ke Table Pemilik
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-striped table-inverse table-responsive">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>Nik</th>
                                                            <th>Nama Pengurus</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="data_tervalidasi_excel_pengurus">

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
                                        <table id="data_excel_pengurus_manajerial" style="width: 100%;font-size:12px" class="table table-bordered">
                                            <thead class="bg-secondary" style="text-align: center;">
                                                <tr>
                                                    <th class="text-white">
                                                        No
                                                    </th>
                                                    <th>
                                                        <small class="text-white">NIK/Paspor</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">NPWP</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">Nama</small>
                                                    </th>
                                                    <th><small class="text-white">Warganegara</small></th>
                                                    <th>
                                                        <small class="text-white">Jabatan</small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">
                                                            <div class="text-center">Sejak</div>
                                                        </small>
                                                    </th>
                                                    <th>
                                                        <small class="text-white">
                                                            <div class="text-center">Sampai</div>
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
                <a href="javascript:;" onclick="Hapus_import_pengurus()" class="btn btn-secondary" data-bs-dismiss="modal">Reset Table View</a>
                <a href="javascript:;" onclick="Simpan_import_pengurus()" class="btn btn-primary">Simpan Ke Table</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="modal_edit_excel_pengurus_manajerial">
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
                                <small><strong>Form Edit Excel Pengurus Manajerial</strong></small>
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_excel_pengurus_manajerial" enctype="multipart/form-data">
                            <input type="hidden" name="id_pengurus">
                            <input type="hidden" name="type_edit_pengurus">
                            <input type="hidden" name="validasi_enkripsi_pengurus">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input type="text" name="nik_pengurus" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                            </div>
                                            <small class="nik_pengurus_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                <input name="npwp_pengurus" type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                            </div>
                                            <small class="npwp_pengurus_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Nama Pengurus</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                <input name="nama_pengurus" type="text" class="form-control">
                                            </div>
                                            <small class="nama_pengurus_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="warganegara_pengurus" class="form-select" aria-label="Default select example">
                                                    <option selected>Indonesia</option>
                                                    <option>Asing</option>
                                                </select>
                                            </div>
                                            <small class="warganegara_pengurus_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jabatan Pengurus</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                                <input name="jabatan_pengurus" type="text" class="form-control">
                                            </div>
                                            <!-- jabatan_pengurus -->
                                            <small class="jabatan_pengurus_error text-danger"></small>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jabat Mulai - Sampai</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12 mb-3">
                                            <input type="date" class="form-control" name="jabatan_mulai" id="date">
                                            <!-- jabatan_mulai -->
                                            <small class="jabatan_mulai_error text-danger"></small>
                                            <small>-</small>
                                            <!-- jabatan_selesai -->
                                            <small class="jabatan_selesai_error text-danger"></small>
                                            <input name="jabatan_selesai" class="form-control" type="date" id="date">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Alamat Pengurus</b></label>
                                    </td>
                                    <td class="col-sm-3" colspan="3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                <textarea name="alamat_pengurus" type="text" class="form-control"></textarea>
                                            </div>
                                            <!-- alamat_pengurus -->
                                            <small class="alamat_pengurus_error text-danger"></small>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="hidden" name="file_dokumen_manipulasi_ktp_pengurus">
                                        <input type="file" class="file_valid_ktp_pengurus" name="file_ktp_pengurus" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_ktp_pengurus">

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File NPWP</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="hidden" name="file_dokumen_manipulasi_npwp_pengurus">
                                        <input type="file" class="file_valid_npwp_pengurus" name="file_npwp_pengurus" id="file" accept=".pdf">
                                    </td>
                                    <td class="col-sm-4">
                                        <div class="button_nama_file_npwp_pengurus">

                                        </div>
                                    </td>
                                    <td>
                                        <div class="button_enkrip_pengurus">

                                        </div>
                                    </td>
                                </tr>
                                <hr>
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