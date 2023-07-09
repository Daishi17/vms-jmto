<main class="container-fluid mt-5">
    <input type="hidden" name="id_url_vendor" value="<?= $row_vendor['id_url_vendor'] ?>">
    <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
    <input type="hidden" value="<?= base_url('datapenyedia/get_row_global_pajak/') ?>" name="url_get_row_vendor">

    <!-- SPPKP -->
    <input type="hidden" name="url_encryption_sppkp" value="<?= base_url('datapenyedia/encryption_sppkp/') ?>">
    <input type="hidden" name="url_download_sppkp" value="<?= base_url('datapenyedia/url_download_sppkp/') ?>">
    <input type="hidden" name="url_post_sppkp" value="<?= base_url('datapenyedia/add_sppkp') ?>">
    <!-- END SPPKP -->

    <!-- NPWP -->
    <input type="hidden" name="url_encryption_npwp" value="<?= base_url('datapenyedia/encryption_npwp/') ?>">
    <input type="hidden" name="url_download_npwp" value="<?= base_url('datapenyedia/url_download_npwp/') ?>">
    <input type="hidden" name="url_post_npwp" value="<?= base_url('datapenyedia/add_npwp') ?>">
    <!-- END NPWP -->

    <!-- neraca -->
    <input type="hidden" name="url_encryption_neraca" value="<?= base_url('datapenyedia/encryption_neraca/') ?>">
    <input type="hidden" name="url_download_neraca" value="<?= base_url('datapenyedia/url_download_neraca/') ?>">
    <input type="hidden" name="url_post_neraca" value="<?= base_url('datapenyedia/add_neraca') ?>">
    <!-- END neraca -->

    <!-- neraca -->
    <input type="hidden" name="url_encryption_spt" value="<?= base_url('datapenyedia/encryption_spt/') ?>">
    <input type="hidden" name="url_download_spt" value="<?= base_url('datapenyedia/url_download_spt/') ?>">
    <input type="hidden" name="url_post_spt" value="<?= base_url('datapenyedia/add_spt') ?>">
    <input type="hidden" name="url_edit_spt" value="<?= base_url('datapenyedia/edit_spt') ?>">
    <!-- END neraca -->

    <!-- keuangan -->
    <input type="hidden" name="url_encryption_keuangan" value="<?= base_url('datapenyedia/encryption_keuangan/') ?>">
    <input type="hidden" name="url_download_keuangan" value="<?= base_url('datapenyedia/url_download_keuangan/') ?>">
    <input type="hidden" name="url_post_keuangan" value="<?= base_url('datapenyedia/add_keuangan') ?>">
    <input type="hidden" name="url_edit_keuangan" value="<?= base_url('datapenyedia/edit_keuangan') ?>">
    <!-- END keuangan -->

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
                        <small>1. Upload dokumen-dokumen yang di butuhkan sesuai dengan keterangan form pajak di bawah ini.</small><br>
                        <small>2. Semua dokumen <b>SPPKP, NPWP, dan SPT</b> wajib di upload dengan format file pdf. upload dokumen tersebut pada setiap dokumen masing-masing yang sudah terinput melalui create data.</small><br>
                        <small>3. Dokumen <b>Neraca Keuangan</b> wajib di upload dengan format file excel, yang dapat pada tombol export excel. isi file excel tersebut sesuai dengan format. lalu upload file dengan tombol import excel. </small><br>
                        <small>4. Jika salah upload atau status dokumen file <span class="text-danger"><b>tidak valid</b></span>, klik tombol <b>View</b> lalu <b>Edit Changes</b> untuk melakukan upload file dokumen yang terbaru atau file dokumen revisi.</small><br>
                        <small>5. Jika dokumen file sudah terenkripsi, untuk mendownload dan membuka dokumen file, mengklik tombol <b>dekripsi</b> dan masukan <b>token</b> yang keluar dalam form pop up dekripsi dokumen file.</small><br>
                    </div>
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <small><strong>Form Dokumen - Pajak</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card border-danger shadow-sm">
                                <div class="card-header">
                                    <div class="nav nav-tabs mb-3 bg-danger" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-sppkp-tab" data-bs-toggle="tab" data-bs-target="#nav-sppkp" type="button" role="tab" aria-controls="nav-sppkp" aria-selected="true">
                                            <span class="text-dark">
                                                <i class="fa-regular fa-file-powerpoint"></i>
                                                <small><b>SPPKP</b></small>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-npwp-tab" data-bs-toggle="tab" data-bs-target="#nav-npwp" type="button" role="tab" aria-controls="nav-npwp" aria-selected="false">
                                            <span class="text-dark">
                                                <i class="fa-regular fa-file-word"></i>
                                                <small><b>NPWP</b></small>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-spt-tab" data-bs-toggle="tab" data-bs-target="#nav-spt" type="button" role="tab" aria-controls="nav-spt" aria-selected="false">
                                            <span class="text-dark">
                                                <i class="fa-regular fa-file-word"></i>
                                                <small><b>SPT</b></small>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-neraca-tab" data-bs-toggle="tab" data-bs-target="#nav-neraca" type="button" role="tab" aria-controls="nav-neraca" aria-selected="false">
                                            <span class="text-dark">
                                                <i class="fa-regular fa-file-word"></i>
                                                <small><b>Neraca Keuangan</b></small>
                                            </span>
                                        </button>
                                        <button class="nav-link" id="nav-keuangan-tab" data-bs-toggle="tab" data-bs-target="#nav-keuangan" type="button" role="tab" aria-controls="nav-keuangan" aria-selected="false">
                                            <span class="text-dark">
                                                <i class="fa-regular fa-file-word"></i>
                                                <small><b>Laporan Keuangan</b></small>
                                            </span>
                                        </button>
                                    </div>
                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-sppkp" role="tabpanel" aria-labelledby="nav-sppkp-tab">
                                            <div class="card border-dark shadow-sm">
                                                <div class="card-header border-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                            <small><strong>Form Pajak - Surat Pengukuhan Pengusaha Kena Pajak (SPPKP)</strong></small>
                                                        </span>
                                                    </div>
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg" id="btn_edit_sppkp" data-bs-toggle="modal" data-bs-target="#modaledit_perubahan">
                                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                                            Edit Changes
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_tambah_sppkp" enctype="multipart/form-data">
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input name="no_surat_sppkp" type="text" class="form-control ">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                        <select name="sts_seumur_hidup_sppkp" class="form-select" aria-label="Default select example">
                                                                            <option value="1">Seumur Hidup</option>
                                                                            <option value="2">Tanggal</option>
                                                                        </select>
                                                                        <input type="date" name="tgl_berlaku_sppkp" class="form-control" id="date">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="file" name="file_sppkp" id="file" accept=".pdf, .xlsx, .xls">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_sppkp">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_sppkp">

                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5" colspan="2">
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <button onclick="history.back()" type="button" class="btn btn-dark btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-angles-left px-1"></i>
                                                                        Go Back
                                                                    </button>
                                                                    <button id="btn_save_sppkp" type="submit" class="btn btn-primary btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-floppy-disk px-1"></i>
                                                                        Simpan
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-npwp" role="tabpanel" aria-labelledby="nav-npwp-tab">
                                            <div class="card border-dark shadow-sm">
                                                <div class="card-header border-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                            <small><strong>Form Pajak - Nomor Pokok Wajib Pajak (NPWP)</strong></small>
                                                        </span>
                                                    </div>
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg" id="btn_edit_npwp" data-bs-toggle="modal" data-bs-target="#modaledit_perubahan_npwp">
                                                            <i class="fa-solid fa-pen-to-square px-1"></i>
                                                            Edit Changes
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_tambah_npwp" enctype="multipart/form-data">
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor NPWP</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                                            <input type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask name="no_npwp">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                        <select class="form-select" aria-label="Default select example" name="sts_seumur_hidup_npwp">
                                                                            <option value="1">Seumur Hidup</option>
                                                                            <option value="2">Tanggal</option>
                                                                        </select>
                                                                        <input type="date" id="date" name="tgl_berlaku_npwp" class="form-control">
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="file" id="file" accept=".pdf, .xlsx, .xls" name="file_npwp">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_npwp">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_npwp">

                                                                    </div>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5" colspan="2">
                                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <button onclick="history.back()" type="button" class="btn btn-dark btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-angles-left px-1"></i>
                                                                        Go Back
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary btn-sm shadow-lg" id="btn_save_npwp">
                                                                        <i class="fa-solid fa-floppy-disk px-1"></i>
                                                                        Simpan
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-spt" role="tabpanel" aria-labelledby="nav-spt-tab">
                                            <div class="card border-dark shadow-sm">
                                                <div class="card-header border-dark d-flex bd-highlight">
                                                    <div class="p-1 flex-grow-1 bd-highlight">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                            <small><strong>Form Pajak - Surat Pemberitahuan Tahunan (SPT)</strong></small>
                                                        </span>
                                                    </div>
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-spt">
                                                            <i class="fa-solid fa-user-plus px-1"></i>
                                                            Create Data
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="get_spt" value="<?= base_url('datapenyedia/get_spt/') ?>">
                                                    <input type="hidden" name="url_get_spt_by_id" value="<?= base_url('datapenyedia/get_spt_by_id/') ?>">
                                                    <table id="tbl_spt" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-dark">
                                                            <tr class="shadow-lg">
                                                                <th style="width:5%;"><small class="text-white">No</small></th>
                                                                <th style="width:10%;"><small class="text-white">Nomor TTE/SPT</small></th>
                                                                <th style="width:10%;"><small class="text-white">Tahun SPT</small></th>
                                                                <th style="width:10%;"><small class="text-white">Jenis SPT</small></th>
                                                                <th style="width:10%;"><small class="text-white">Tgl. Penyampaian</small></th>
                                                                <th style="width:15%;"><small class="text-white">
                                                                        <div class="text-center">File SPT</div>
                                                                    </small></th>
                                                                <th style="width:10%;"><small class="text-white">
                                                                        <div class="text-center">Status Validasi</div>
                                                                    </small></th>
                                                                <th style="width:20%;"><small class="text-white">
                                                                        <div class="text-center">More Options</div>
                                                                    </small>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- <tr class="shadow-lg">
                                                                <td><small>1234567890123456</small></td>
                                                                <td><small>2021</small></td>
                                                                <td><small>177OS</small></td>
                                                                <td><small>02/04/2022</small></td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <button type="button" class="btn btn-primary btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-solid fa-file-pdf px-1"></i>
                                                                        Nama File .pdf
                                                                    </button>
                                                                </td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-spt">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-lock-open px-1"></i>
                                                                            <small>Dycrep</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-trash-can px-1"></i>
                                                                            <small>Delete</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <input type="hidden" name="get_neraca_keuangan" value="<?= base_url('datapenyedia/get_neraca_keuangan/') ?>">
                                                    <table id="tbl_neraca_keuangan" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-dark">
                                                            <tr class="shadow-lg">
                                                                <th style="width:10%;"><small class="text-white">No</small></th>
                                                                <th style="width:10%;"><small class="text-white">Tahun Laporan 1</small></th>
                                                                <th style="width:10%;"><small class="text-white">Tahun Laporan 2</small></th>
                                                                <th style="width:20%;"><small class="text-white">Nama Akuntan Publik</small></th>
                                                                <th style="width:10%;"><small class="text-white">Tanggal Laporan</small></th>
                                                                <th style="width:10%;"><small class="text-white">Status Validasi</small></th>
                                                                <th style="width:15%;"><small class="text-white">
                                                                        <div class="text-center">File Neraca</div>
                                                                    </small></th>
                                                                <th style="width:10%;"><small class="text-white">
                                                                        <div class="text-center">Status Validasi</div>
                                                                    </small></th>
                                                                <th style="width:20%;"><small class="text-white">
                                                                        <div class="text-center">More Options</div>
                                                                    </small></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- <tr class="shadow-lg">
                                                                <td><small>2022</small></td>
                                                                <td><small>PT. Ortex</small></td>
                                                                <td><small>Audit</small></td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <button type="button" class="btn btn-primary btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-regular fa-file-excel px-1"></i>
                                                                        Nama File .pdf/xls
                                                                    </button>
                                                                </td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-neraca">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-lock-open px-1"></i>
                                                                            <small>Dycrep</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-trash-can px-1"></i>
                                                                            <small>Delete</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-keuangan" role="tabpanel" aria-labelledby="nav-keuangan-tab">
                                            <div class="card border-dark shadow-sm">
                                                <div class="card-header border-dark d-flex bd-highlight">
                                                    <div class="p-1 flex-grow-1 bd-highlight">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-file-lines px-1"></i>
                                                            <small><strong>Form Pajak - Laporan Keuangan</strong></small>
                                                        </span>
                                                    </div>
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-keuangan">
                                                            <i class="fa-solid fa-user-plus px-1"></i>
                                                            Create Data
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="get_keuangan" value="<?= base_url('datapenyedia/get_keuangan/') ?>">
                                                    <input type="hidden" name="url_get_keuangan_by_id" value="<?= base_url('datapenyedia/get_keuangan_by_id/') ?>">
                                                    <div style="overflow-x:auto">
                                                        <table id="tbl_keuangan" class="table table-sm table-bordered table-striped">
                                                            <thead class="bg-dark">
                                                                <tr class="shadow-lg">
                                                                    <th style="width:5%;"><small class="text-white">No</small></th>
                                                                    <th style="width:10%;"><small class="text-white">Tahun Laporan</small></th>

                                                                    <th style="width:10%;"><small class="text-white">
                                                                            <div class="text-center">File Auditor</div>
                                                                        </small>
                                                                    </th>
                                                                    <th style="width:10%;"><small class="text-white">
                                                                            <div class="text-center">File Keuangan</div>
                                                                        </small>
                                                                    </th>
                                                                    <th style="width:10%;"><small class="text-white">
                                                                            <div class="text-center">Status Validasi</div>
                                                                        </small>
                                                                    </th>
                                                                    <th style="width:20%;"><small class="text-white">
                                                                            <div class="text-center">More Options</div>
                                                                        </small>
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <!-- <tr class="shadow-lg">
                                                                <td><small>2022</small></td>
                                                                <td><small>PT. Ortex</small></td>
                                                                <td><small>Audit</small></td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <button type="button" class="btn btn-primary btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-regular fa-file-excel px-1"></i>
                                                                        Nama File .pdf/xls
                                                                    </button>
                                                                </td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-neraca">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-lock-open px-1"></i>
                                                                            <small>Dycrep</small>
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-trash-can px-1"></i>
                                                                            <small>Delete</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr> -->
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
                            <div class="bd-highlight">
                                <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_tambah_neraca">
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Tahun Laporan 1</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                    <input type="number" class="form-control" placeholder="ex.2023">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Nama Akuntan Publik</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Tahun Laporan 2</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                    <input type="number" class="form-control" placeholder="ex.2023">
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
                                                    <input type="date" id="date" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Upload Neraca Keuangan</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <input type="file" id="file" accept=".pdf,.xlsx">
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <button type="button" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                                                <i class="fa-solid fa-file-pdf px-1"></i>
                                                Nama File .pdf/.xlsx
                                            </button>
                                        </td>
                                        <td class="col-sm-3">
                                            <small>
                                                <span class="badge bg-secondary">Belum Tervalidasi</span>
                                            </small>
                                            <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                <i class="fa-solid fa-lock-open px-1"></i>
                                                Dekripsi File
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12" colspan="4">
                                            <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                                <i class="fa-solid fa-angles-left px-1"></i>
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-success btn-sm shadow-lg" disabled>
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
</main>


<div class="modal fade" id="modal_dekrip_sppkp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_sppkp" method="post">
                    <input type="hidden" value="dekrip" name="type">
                    <input type="hidden" name="id_url_sppkp">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_sppkp">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateDekrip_sppkp()">Yakin</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_enkrip_sppkp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_sppkp" method="post">
                    <input type="hidden" value="enkrip" name="type">
                    <input type="hidden" name="id_url_sppkp">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_sppkp">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateEnkrip_sppkp()">Yakin</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="modaledit_perubahan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin Ingin Mengedit Data Anda ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets34543543/img/tanya.jpg') ?>" alt="" width="200px">
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="edit_sppkp()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_dekrip_npwp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_npwp" method="post">
                    <input type="hidden" value="dekrip" name="type">
                    <input type="hidden" name="id_url_npwp">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_npwp">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateDekrip_npwp()">Yakin</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_enkrip_npwp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_npwp" method="post">
                    <input type="hidden" value="enkrip" name="type">
                    <input type="hidden" name="id_url_npwp">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_npwp">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateEnkrip_npwp()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaledit_perubahan_npwp" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin Ingin Mengedit Data Anda ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets34543543/img/tanya.jpg') ?>" alt="" width="200px">
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="edit_npwp()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<!-- spt -->
<div class="modal fade" tabindex="-1" id="modal_edit_spt">
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
                                <small><strong>Form Data - Surat Pemberitahuan Tahunan (SPT)</strong></small>
                            </span>
                        </div>
                        <div class="bd-highlight">
                            <button type="button" class="btn btn-warning btn-sm shadow-lg" onclick="edit_data_spt()">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_edit_spt" enctype="multipart/form-data">
                            <input type="text" name="id_url">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>No. TTE/SPT</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                <input name="nomor_surat" id="nomor_surat" type="text" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tahun Lapor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                <input type="number" name="tahun_lapor" id="tahun_lapor" min="2010" class="form-control" placeholder="ex.2023" disabled>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jenis SPT</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="jenis_spt" id="jenis_spt" class="form-select" aria-label="Default select example" disabled>
                                                    <option value="177OS">177OS</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tanggal Penyampaian</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                <input name="tgl_penyampaian" id="tgl_penyampaian" type="date" id="date" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File SPT</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" id="file" accept=".pdf" id="file_dokumen_spt" name="file_dokumen_spt" disabled>
                                    </td>
                                    <td class="col-sm-2 bg-light">

                                        <div id="tampil_dokumen_spt"></div>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="button_enkrip_spt"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-12" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Tutup
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg" id="btn_edit_spt" disabled>
                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                            Simpan
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


<div class="modal fade" id="modal_dekrip_spt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_spt" method="post">
                    <input type="hidden" value="dekrip" name="type">
                    <input type="hidden" name="id_url_spt">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_spt">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateDekrip_spt()">Yakin</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_enkrip_spt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Enkripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_spt" method="post">
                    <input type="hidden" value="enkrip" name="type">
                    <input type="hidden" name="id_url_spt">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Enkripsi File Anda </p>
                        <div class="token_generate_spt">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateEnkrip_spt()">Yakin</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modaledit_spt" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Anda Yakin Ingin Mengedit Data Anda ?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets34543543/img/tanya.jpg') ?>" alt="" width="200px">
                </center>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="edit_spt()">Yakin</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" tabindex="-1" id="modal-xl-spt">
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
                                <small><strong>Form Data - Surat Pemberitahuan Tahunan (SPT)</strong></small>
                            </span>
                        </div>
                        <!-- <div class="bd-highlight">
                                <button type="button" class="btn btn-warning btn-sm shadow-lg">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit Data
                                </button>
                            </div> -->
                    </div>
                    <div class="card-body">
                        <form id="form_tambah_spt" enctype="multipart/form-data">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>No. TTE/SPT</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                <input name="nomor_surat" type="text" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tahun Lapor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-regular fa-calendar-days"></i></span>
                                                <input type="number" name="tahun_lapor" min="2010" class="form-control" placeholder="ex.2023">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Jenis SPT</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-12">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                <select name="jenis_spt" class="form-select" aria-label="Default select example">
                                                    <option value="177OS">177OS</option>
                                                    <option value="Lainnya">Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload File SPT</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" id="file" accept=".pdf" name="file_dokumen_spt">
                                    </td>
                                    <!-- <td class="col-sm-2 bg-light">
                                            <button type="button" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                                                <i class="fa-solid fa-file-pdf px-1"></i>
                                                Nama File .pdf
                                            </button>
                                        </td>
                                        <td class="col-sm-3">
                                            <small>
                                                <span class="badge bg-secondary">Belum Tervalidasi</span>
                                            </small>
                                            <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                                <i class="fa-solid fa-lock-open px-1"></i>
                                                Dekripsi File
                                            </button>
                                        </td> -->
                                </tr>
                                <tr>
                                    <td class="col-sm-2 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tanggal Penyampaian</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="col-sm-8">
                                            <div class="input-group mb-2">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                <input name="tgl_penyampaian" type="date" id="date" class="form-control">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col-sm-12" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Tutup
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg" id="btn_save_spt">
                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                            Simpan
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
<!-- end spt -->


<!-- modal laporan keuangan -->
<div class="modal fade" tabindex="-1" id="modal-xl-keuangan">
    <div class="modal-dialog modal-dialog-scrollable">
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
                                <small><strong>Form Data - Laporan Keuangan</strong></small>
                            </span>
                        </div>

                    </div>
                    <div class="card-body">
                        <form id="form_tambah_keuangan" enctype="multipart/form-data">
                            <table class="table table-sm">
                                <tr>
                                    <td class="col-sm-3 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Tahun Laporan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="number" name="tahun_lapor" min="2000" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload Laporan Auditor</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_laporan_auditor" id="file" accept=".pdf,.xlsx">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-3 bg-light">
                                        <label class="form-label col-form-label-sm"><b>Upload Laporan Keuangan</b></label>
                                    </td>
                                    <td class="col-sm-3">
                                        <input type="file" name="file_laporan_keuangan" id="file" accept=".pdf,.xlsx">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="col-sm-12" colspan="4">
                                        <button type="button" class="btn btn-danger btn-sm shadow-lg" data-bs-dismiss="modal">
                                            <i class="fa-solid fa-angles-left px-1"></i>
                                            Tutup
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm shadow-lg" id="btn_save_laporan">
                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                            Simpan
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


<div class="modal fade" id="modal_dekrip_keuangan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_keuangan" method="post">
                    <input type="hidden" value="dekrip" name="type">
                    <input type="hidden" name="id_url_keuangan">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_keuangan">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateDekrip_keuangan()">Yakin</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal_enkrip_keuangan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Enkripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_keuangan" method="post">
                    <input type="hidden" value="enkrip" name="type">
                    <input type="hidden" name="id_url_keuangan">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Enkripsi File Anda </p>
                        <div class="token_generate_keuangan">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateEnkrip_keuangan()">Yakin</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal laporan keuangan -->