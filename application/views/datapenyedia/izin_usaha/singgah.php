<div class="container-fluid">
    <!-- nanti ini di buat file global terpisah -->
    <input type="hidden" name="id_url_vendor" value="<?= $row_vendor['id_url_vendor'] ?>">
    <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
    <?php $this->load->view('datapenyedia/izin_usaha/url_izin_usaha') ?>
    <!-- Default box -->
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary border-primary">
                    <h6 class="card-title">
                        <span class="text-white">
                            <i class="fas fa-user-tag"></i>
                            <small><strong>Elektronik Data Rekanan T ervalidasi (E-DRT)</strong></small>
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
                        <small>1. Upload dokumen-dokumen yang di butuhkan sesuai dengan keterangan form izin usaha di bawah ini. Jika jenis usahanya tidak dibidang konstruksi dokumen SIUJK tidak wajib diisi silahkan klik tombol <b>Tidak Ada</b> untuk status valid.</small><br>
                        <small>2. Semua dokumen wajib di upload dengan format file pdf, jika dokumen file lebih dari satu, harus di buat menjadi satu dokumen file pdf.</small><br>
                        <small>3. Jika salah upload atau status dokumen file <span class="text-danger"><b>tidak valid</b></span>, klik tombol <b>Edit Changes</b> untuk melakukan upload file dokumen yang terbaru atau file dokumen revisi.</small><br>
                        <small>4. Jika dokumen file sudah terenkripsi, untuk mendownload dan membuka dokumen file, mengklik tombol <b>dekripsi</b> dan masukan <b>token</b> yang keluar dalam form pop up dekripsi dokumen file.</small><br>
                        <small>5. Klik Tombol <b>Input Data KBLI/SBU</b> untuk mengisi KBLI/SBU sesuai dengan dokumen yang diupload.</small>
                    </div>
                    <div class="card border-danger shadow-lg">
                        <div class="card-header bg-danger border-danger">
                            <h6 class="card-title">
                                <span class="text-white">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <small><strong>Form Dokumen Izin Usaha</strong></small>
                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="card border-warning shadow-sm">
                                <div class="card-header">
                                    <div class="nav nav-tabs mb-3 bg-warning" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-nib-tab" data-bs-toggle="tab" data-bs-target="#nav-nib" type="button" role="tab" aria-controls="nav-nib" aria-selected="false">
                                            <i class="fa-regular fa-file-word"></i>
                                            <small><b>NIB/TDP</b></small>
                                        </button>
                                        <button class="nav-link" id="nav-siup-tab" data-bs-toggle="tab" data-bs-target="#nav-siup" type="button" role="tab" aria-controls="nav-siup" aria-selected="true">
                                            <i class="fa-regular fa-file-powerpoint"></i>
                                            <small><b>SIUP</b></small>
                                        </button>
                                        <button class="nav-link" id="nav-sbu-tab" data-bs-toggle="tab" data-bs-target="#nav-sbu" type="button" role="tab" aria-controls="nav-sbu" aria-selected="false">
                                            <i class="fa-regular fa-file-excel"></i>
                                            <small><b>SBU</b></small>
                                        </button>
                                        <button class="nav-link" id="nav-siujk-tab" data-bs-toggle="tab" data-bs-target="#nav-siujk" type="button" role="tab" aria-controls="nav-siujk" aria-selected="false">
                                            <i class="fa-regular fa-file-pdf"></i>
                                            <small><b>SIUJK</b></small>
                                        </button>
                                    </div>
                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-nib" role="tabpanel" aria-labelledby="nav-nib-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - Nomor Induk Berusaha (NIB)</strong></small>
                                                        </span>
                                                    </div>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#apply_edit_nib" class="btn btn-secondary btn-sm shadow-lg">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_izin_usaha" enctype="multipart/form-data">
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" name="nomor_surat_nib" class="form-control form-control-sm nomor_surat_form">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select name="sts_seumur_hidup_form_nib" class="form-select text-sm sts_seumur_hidup_form_nib" aria-label="Default select example" onchange="sts_berlaku_nib()">
                                                                                <option value="1">Tanggal</option>
                                                                                <option value="2">Seumur Hidup</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="tgl_berlaku_nib" name="tgl_berlaku_nib" class="form-control tgl_berlaku_nib_form" readonly data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="file" name="file_dokumen_nib" class="file_dokumen_nib" accept=".pdf, .xlsx, .xls">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Input KBLI</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger btn-sm col-sm-8 shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-nib">
                                                                        <i class="fa-solid fa-clone px-1"></i>
                                                                        Input Data KBLI
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <div class="card-footer">
                                                                        <button type="submit" id="on_save_nib" class="btn btn-primary btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                                                            Simpan
                                                                        </button>
                                                                        <a href="javascript:;" id="on_cancel_nib" onclick="BatalChangeGlobal_nib()" class="btn btn-dark btn-sm shadow-lg"> <i class="fa-solid fa-angles-left px-1"> </i> Cancel</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="nav-sbu" role="tabpanel" aria-labelledby="nav-sbu-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - Sertifikat Badan Usaha (SBU)</strong></small>
                                                        </span>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary btn-sm shadow-lg" disabled>
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form>
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select class="form-select" aria-label="Default select example">
                                                                                <option selected>Seumur Hidup</option>
                                                                                <option>Tanggal</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="date" disabled>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="file" id="file" accept=".pdf, .xlsx, .xls">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <button type="button" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-solid fa-file-pdf px-1"></i>
                                                                        Nama File .pdf
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-5">

                                                                    <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                                        <i class="fa-solid fa-lock-open px-1"></i>
                                                                        Dekripsi File
                                                                    </button>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Input SBU</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger btn-sm col-sm-8 shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-sbu">
                                                                        <i class="fa-solid fa-clone px-1"></i>
                                                                        Input Data SBU
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <button onclick="history.back()" type="button" class="btn btn-dark btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-angles-left px-1"></i>
                                                                        Go Back
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
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
                                        <div class="tab-pane fade" id="nav-siujk" role="tabpanel" aria-labelledby="nav-siujk-tab">
                                            <div class="card border-dark shadow-sm">
                                                <div class="card-header border-dark d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - Surat Izin Usaha Jasa Konstruksi (SIUJK)</strong></small>
                                                        </span>
                                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                            <i class="fa-solid fa-circle-check px-1"></i>
                                                            Tidak Ada
                                                        </button>
                                                    </div>
                                                    <button type="button" class="btn btn-secondary btn-sm shadow-lg" disabled>
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form>
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select class="form-select" aria-label="Default select example">
                                                                                <option selected>Seumur Hidup</option>
                                                                                <option>Tanggal</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="date" disabled>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="file" id="file" accept=".pdf, .xlsx, .xls">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <button type="button" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-solid fa-file-pdf px-1"></i>
                                                                        Nama File .pdf
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-5">

                                                                    <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                                        <i class="fa-solid fa-lock-open px-1"></i>
                                                                        Dekripsi File
                                                                    </button>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Kualifikasi Usaha</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-angles-right"></i></span>
                                                                            <select class="form-select" aria-label="Default select example">
                                                                                <option selected>Besar</option>
                                                                                <option>Menengah</option>
                                                                                <option>Kecil</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <button onclick="history.back()" type="button" class="btn btn-dark btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-angles-left px-1"></i>
                                                                        Go Back
                                                                    </button>
                                                                    <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- batas modal nib -->
    <div class="modal" tabindex="-1" id="modal-xl-nib">
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
                    <div class="card border-primary shadow-lg">
                        <div class="card-header bg-primary d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-align-justify px-1"></i>
                                    <small><strong>Form Input - KBLI - NIB/TDP</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_kbli_nib" method="post">
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli">
                                                        <option value=""></option>
                                                        <?php foreach ($data_kbli as $key => $value) { ?>
                                                            <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi Usaha..." name="id_kualifikasi_izin">
                                                        <option value=""></option>
                                                        <?php foreach ($kualifikasi as $key => $value) { ?>
                                                            <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Keterangan KBLI</b></label>
                                        </td>
                                        <td class="col-sm-10" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                                    <textarea name="ket_kbli_nib" class="form-control form-control-sm" rows="2"></textarea>
                                                </div>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12 bg-light" colspan="4">
                                            <a href="javascript:;" id="button_save_kbli_nib" onclick="simpan_kbli_nib()" class="btn btn-primary btn-sm shadow-lg">
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Add Changes
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr>
                            <div class="card border-secondary shadow-lg">
                                <div class="card-header bg-secondary d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-solid fa-table-list px-1"></i>
                                            <small><strong>Tabel Data KBLI - NIB/TDP Yang Terinput</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table_kbli_nib" class="table table-sm table-bordered table-striped">
                                        <thead class="bg-secondary">
                                            <tr>
                                                <th><small class="text-white">No</small></th>
                                                <th style="width:50%;"><small class="text-white">Kode & Jenis KBLI</small></th>
                                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                                <th style="width:15%;"><small class="text-white">
                                                        <div class="text-center">Status Validasi</div>
                                                    </small></th>
                                                <th style="width:20%;"><small class="text-white">
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
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark px-1"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="apply_edit_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">Anda Yakin Ingin Mengedit Data Anda ??</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <center>
                        <img src="<?= base_url('assets34543543/img/tanya.jpg') ?>" width="200px" alt="">
                    </center>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" onclick="EditChangeGlobal_nib()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Yakin !!</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Tidak !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_dekrip_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">DEKRIP FILE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_dekrip" method="post">
                        <input type="hidden" name="id_url_nib">
                        <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
                        <center>
                            <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                            <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                            <div class="token_generate_nib">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input id="token_nib" type="text" name="token_dokumen_nib" value="" class="form-control">
                            </div>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" id="button_dekrip_generate_nib" onclick="GenerateDekrip_nib()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                    <button disabled style="display:none" id="button_dekrip_generate_manipulasi_nib" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_kbli_nib" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT KBLI</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_kbli_nib" method="post">
                        <input type="hidden" name="id_url_kbli_nib">
                        <input type="hidden" name="token_kbli_nib">
                        <table class="table table-sm">
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                </td>
                                <td class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli">
                                                <option value=""></option>
                                                <?php foreach ($data_kbli as $key => $value) { ?>
                                                    <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label id="pilihan_kbli_nib" for=""></label>
                                </td>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                </td>
                                <td class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi..." name="id_kualifikasi_izin">
                                                <option value=""></option>
                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <label id="pilihan_kualifikasi_nib" for=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Keterangan KBLI</b></label>
                                </td>
                                <td class="col-sm-10" colspan="3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                            <textarea name="ket_kbli_nib" class="form-control form-control-sm" rows="2"></textarea>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-12 bg-light" colspan="4">
                                    <a href="javascript:;" id="button_save_kbli_nib" onclick="edit_kbli_nib()" class="btn btn-primary btn-sm shadow-lg">
                                        <i class="fa-solid fa-floppy-disk px-1"></i>
                                        Edit Changes
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" id="modal-xl-siup">
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
                    <div class="card border-primary shadow-lg">
                        <div class="card-header bg-primary d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-align-justify px-1"></i>
                                    <small><strong>Form Input - KBLI - SIUP</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input class="form-control form-control-sm" list="datalistOptions3" id="exampleDataList" placeholder="Pilih Kode KBLI...">
                                                    <datalist id="datalistOptions3">
                                                        <option value="62019 || Aktivitas Pemrograman Komputer Lainnya">
                                                        <option value="46512 || Perdagangan Besar Piranti Lunak">
                                                        <option value="47413 || Perdagangan Eceran Piranti Lunak (Software)">
                                                    </datalist>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                                        <option selected>Besar - (B2)</option>
                                                        <option>Besar - (B1)</option>
                                                        <option>Menengah - (M3)</option>
                                                        <option>Menengah - (M2)</option>
                                                        <option>Menengah - (M1)</option>
                                                        <option>Kecil - (K-3)</option>
                                                        <option>Kecil - (K-2)</option>
                                                        <option>Kecil - (K-1)</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Keterangan KBLI</b></label>
                                        </td>
                                        <td class="col-sm-10" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                                    <!-- <input type="text" class="form-control" disabled> -->
                                                    <textarea class="form-control form-control-sm" rows="2" disabled></textarea>
                                                </div>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12 bg-light" colspan="4">
                                            <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Add Changes
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr>
                            <div class="card border-dark shadow-lg">
                                <div class="card-header bg-dark d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-solid fa-table-list px-1"></i>
                                            <small><strong>Tabel Data KBLI - SIUP Yang Terinput</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-sm table-bordered table-striped">
                                        <thead class="bg-dark">
                                            <tr>
                                                <th style="width:25%;"><small class="text-white">Kode & Jenis KBLI</small></th>
                                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                                <th style="width:8%;"><small class="text-white">
                                                        <div class="text-center">Status Validasi</div>
                                                    </small></th>
                                                <th style="width:15%;"><small class="text-white">
                                                        <div class="text-center">More Options</div>
                                                    </small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><small>62019 || Aktivitas Pemrograman Komputer Lainnya</small></td>
                                                <td><small>Menengah - (M1)</small></td>
                                                <td><small>
                                                        <div class="text-center">
                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                        </div>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                                            <small>Edit Changes</small>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                            <i class="fa-solid fa-trash-can px-1"></i>
                                                            <small>Delete</small>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark px-1"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" id="modal-xl-sbu">
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
                    <div class="card border-primary shadow-lg">
                        <div class="card-header bg-primary d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-align-justify px-1"></i>
                                    <small><strong>Form Input - SBU</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode SBU</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input class="form-control form-control-sm" list="datalistOptions2" id="exampleDataList" placeholder="Pilih Kode SBU...">
                                                    <datalist id="datalistOptions2">
                                                        <option value="62019 || Aktivitas Pemrograman Komputer Lainnya">
                                                        <option value="46512 || Perdagangan Besar Piranti Lunak">
                                                        <option value="47413 || Perdagangan Eceran Piranti Lunak (Software)">
                                                    </datalist>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi SBU</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                                        <option selected>Besar - (B2)</option>
                                                        <option>Besar - (B1)</option>
                                                        <option>Menengah - (M3)</option>
                                                        <option>Menengah - (M2)</option>
                                                        <option>Menengah - (M1)</option>
                                                        <option>Kecil - (K-3)</option>
                                                        <option>Kecil - (K-2)</option>
                                                        <option>Kecil - (K-1)</option>
                                                    </select>
                                                </div>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Keterangan SBU</b></label>
                                        </td>
                                        <td class="col-sm-10" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                                    <!-- <input type="text" class="form-control" disabled> -->
                                                    <textarea class="form-control form-control-sm" rows="2" disabled></textarea>
                                                </div>
                                            </div>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12 bg-light" colspan="4">
                                            <button type="button" class="btn btn-primary btn-sm shadow-lg" disabled>
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Add Changes
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr>
                            <div class="card border-danger shadow-lg">
                                <div class="card-header bg-danger d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-solid fa-table-list px-1"></i>
                                            <small><strong>Tabel Data - SBU Yang Terinput</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example5" class="table table-sm table-bordered table-striped">
                                        <thead class="bg-danger">
                                            <tr>
                                                <th style="width:25%;"><small class="text-white">Kode & Jenis SBU</small></th>
                                                <th style="width:10%;"><small class="text-white">Kualifikasi</small></th>
                                                <th style="width:8%;"><small class="text-white">
                                                        <div class="text-center">Status Validasi</div>
                                                    </small></th>
                                                <th style="width:15%;"><small class="text-white">
                                                        <div class="text-center">More Options</div>
                                                    </small></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><small>62019 || Aktivitas Pemrograman Komputer Lainnya</small></td>
                                                <td><small>Menengah - (M1)</small></td>
                                                <td><small>
                                                        <div class="text-center">
                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                        </div>
                                                    </small>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                                            <small>Edit Changes</small>
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                            <i class="fa-solid fa-trash-can px-1"></i>
                                                            <small>Delete</small>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                        <i class="fa-solid fa-rectangle-xmark px-1"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>


    
</div>