<main class="container-fluid mt-5">
    <input type="hidden" name="id_url_vendor" value="<?= $row_vendor['id_url_vendor'] ?>">
    <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
    <input type="hidden" value="<?= base_url('datapenyedia/get_row_global_vendor/') ?>" name="url_get_row_vendor">

    <!-- pendirian -->
    <input type="hidden" name="url_post" value="<?= base_url('datapenyedia/add_akta_pendirian') ?>">
    <input type="hidden" name="url_download_pendirian" value="<?= base_url('datapenyedia/url_download_pendirian/') ?>">
    <input type="hidden" name="url_encryption_pendirian" value="<?= base_url('datapenyedia/encryption_akta_pendirian/') ?>">

    <!-- perubahan -->
    <input type="hidden" name="url_post_perubahan" value="<?= base_url('datapenyedia/add_akta_perubahan') ?>">
    <input type="hidden" name="url_download_perubahan" value="<?= base_url('datapenyedia/url_download_perubahan/') ?>">
    <input type="hidden" name="url_encryption_perubahan" value="<?= base_url('datapenyedia/encryption_akta_perubahan/') ?>">
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
                        <small>1. Upload dokumen-dokumen yang di butuhkan sesuai dengan keterangan form Akta Pendirian/Perubahan di bawah ini.</small><br>
                        <small>2. Akta perubahan tidak wajib diisi jika tidak ada dokumen akta perubahan. Klik tombol <b>Tidak Ada</b> untuk status dokumen valid.</small><br>
                        <small>3. Semua dokumen wajib di upload dengan format file pdf, jika dokumen file lebih dari satu, harus di buat menjadi satu dokumen file pdf.</small><br>
                        <small>4. Jika salah upload atau status dokumen file <span class="text-danger"><b>tidak valid</b></span>, klik tombol <b>Edit Changes</b> untuk melakukan upload file dokumen yang terbaru atau file dokumen revisi.</small><br>
                        <small>5. Jika dokumen file sudah terenkripsi, untuk mendownload dan membuka dokumen file, mengklik tombol <b>dekripsi</b> dan masukan <b>token</b> yang keluar dalam form pop up dekripsi dokumen file.</small><br>
                    </div>
                    <div class="card border-danger shadow-lg">
                        <div class="card-header bg-danger border-danger">
                            <h6 class="card-title">
                                <span class="text-white">
                                    <i class="fa-regular fa-folder-open"></i>
                                    <small><strong>Form Dokumen Akta Pendirian / Perubahan</strong></small>
                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="card border-warning shadow-sm">
                                <div class="card-header">
                                    <div class="nav nav-tabs mb-3 bg-warning" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-pendiri-tab" data-bs-toggle="tab" data-bs-target="#nav-pendiri" type="button" role="tab" aria-controls="nav-pendiri" aria-selected="true">
                                            <i class="fa-regular fa-file-powerpoint"></i>
                                            <small><b>Akta Pendirian</b></small>
                                        </button>
                                        <button class="nav-link" id="nav-perubahan-tab" data-bs-toggle="tab" data-bs-target="#nav-perubahan" type="button" role="tab" aria-controls="nav-perubahan" aria-selected="false">
                                            <i class="fa-regular fa-file-pdf"></i>
                                            <small><b>Akta Perubahan</b></small>
                                        </button>
                                    </div>
                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-pendiri" role="tabpanel" aria-labelledby="nav-pendiri-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - Akta Pendirian</strong></small>
                                                        </span>
                                                    </div>
                                                    <button data-bs-toggle="modal" data-bs-target="#modaledit_pendirian" type="button" class="btn btn-secondary btn-sm shadow-lg" id="button_edit_modal">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_akta_pendirian" enctype="multipart/form-data">
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat Akta</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input name="no_surat_akta" type="text" class="form-control no_surat">
                                                                        </div>
                                                                        <small class="nomor_surat_error text-danger"></small>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                        <select name="sts_seumur_hidup" class="form-select sts_seumur_hidup" aria-label="Default select example">
                                                                            <option value="1">Seumur Hidup</option>
                                                                            <option value="2">Tanggal</option>
                                                                        </select>
                                                                        <input type="date" id="date" name="berlaku_sampai" class="berlaku_sampai form-control">
                                                                    </div>
                                                                    <small class="sts_seumur_hidup_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Jumlah Setor Modal</b></label>
                                                                </td>
                                                                <td class="col-sm-2" colspan="3">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text">Rp.</span>
                                                                            <input name="jumlah_setor_modal" type="text" class="form-control jumlah_setor_modal"> <!--  id="tanpa-rupiah1"  -->
                                                                            <input type="text" class="form-control" readonly id="tanpa_rupiah_akta_pendirian">
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                    <small class="jumlah_setor_modal_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="hidden" name="file_dokumen_manipulasi_pendirian">
                                                                    <input type="file" class="file_valid_akta_pendirian" name="file_dokumen" accept=".pdf, .xlsx, .xls">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_akta"></div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip">

                                                                    </div>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Kualifikasi Usaha</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-angles-right"></i></span>
                                                                            <select name="kualifikasi_usaha" class="form-select kualifikasi_usaha" aria-label="Default select example">
                                                                                <option value="Besar - (B1)">Besar - (B1)</option>
                                                                                <option value="Besar - (B2)">Besar - (B2)</option>
                                                                                <option value="Menengah - (M1)">Menengah - (M1)</option>
                                                                                <option value="Menengah - (M2)">Menengah - (M2)</option>
                                                                                <option value="Kecil - (K3)">Kecil - (K3)</option>
                                                                                <option value="Kecil - (K2)">Kecil - (K2)</option>
                                                                                <option value="Kecil - (K1)">Kecil - (K1)</option>
                                                                            </select>
                                                                        </div>
                                                                        <small class="kualifikasi_usaha_error text-danger"></small>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div id="sts_validasi_akta_pendirian_1" style="display: none;">
                                                                        <span class="badge bg-success">Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_akta_pendirian_2" style="display: none;">
                                                                        <span class="badge bg-danger">Belum Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_akta_pendirian_3" style="display: none;">
                                                                        <span class="badge bg-secondary">Belum Diperiksa</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <button onclick="history.back()" type="button" class="btn btn-dark btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-angles-left px-1"></i>
                                                                        Batal
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary btn-sm shadow-lg" id="btn_simpan_pendirian">
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
                                        <div class="tab-pane fade" id="nav-perubahan" role="tabpanel" aria-labelledby="nav-perubahan-tab">
                                            <div class="card border-dark shadow-sm">
                                                <div class="card-header border-dark d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - Akta Perubahan</strong></small>
                                                        </span>
                                                        <input type="hidden" name="url_tidak_ada_akta_perubahan" value="<?= base_url('datapenyedia/tidak_ada_akta_perubahan')?>">
                                                        <a href="javascript:;" onclick="Tidak_ada_akta_perubahan()" class="btn btn-success btn-sm shadow-lg">
                                                            <i class="fa-solid fa-circle-check px-1"></i>
                                                            Tidak Ada
</a>
                                                    </div>
                                                    <button data-bs-toggle="modal" data-bs-target="#modaledit_perubahan" id="button_edit_perubahan" type="button" class="btn btn-secondary btn-sm shadow-lg">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_akta_perubahan" enctype="multipart/form-data">
                                                        <table class="table table-sm">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat Akta</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" class="form-control" name="no_surat_perubahan">
                                                                        </div>
                                                                        <small class="no_surat_perubahan_error text-danger"></small>
                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="input-group mb-2">
                                                                        <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                        <select class="form-select" aria-label="Default select example" name="sts_seumur_hidup_perubahan">
                                                                            <option value="1">Seumur Hidup</option>
                                                                            <option value="2">Tanggal</option>
                                                                        </select>
                                                                        <input type="date" name="tgl_masa_berlaku_perubahan" id="date" class="form-control">
                                                                    </div>
                                                                    <small class="sts_seumur_hidup_perubahan_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Jumlah Setor Modal</b></label>
                                                                </td>
                                                                <td class="col-sm-10" colspan="3">
                                                                    <div class="col-sm-6">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text">Rp.</span>
                                                                            <input type="text" class="form-control jumlah_setor_perubahan" name="jumlah_setor_perubahan">
                                                                            <input type="text" class="form-control" readonly id="tanpa_rupiah_akta_perubahan">
                                                                            <br>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="hidden" name="file_dokumen_manipulasi_perubahan">
                                                                    <input type="file" class="file_valid_akta_perubahan" name="file_dokumen_perubahan" id="file" accept=".pdf, .xlsx, .xls">
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <!-- <a href="javascript:;" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                                                                        <i class="fa-solid fa-file-pdf px-1"></i>
                                                                        <span class="file_akta_pendirian"></span>
                                                                    </a> -->
                                                                    <div id="tampil_dokumen_akta_perubahan"></div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_perubahan">

                                                                    </div>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Kualifikasi Usaha</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-8">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-angles-right"></i></span>
                                                                            <select class="form-select" aria-label="Default select example" name="kualifikasi_usaha_perubahan">
                                                                                <option value="Besar - (B1)">Besar - (B1)</option>
                                                                                <option value="Besar - (B2)">Besar - (B2)</option>
                                                                                <option value="Menengah - (M1)">Menengah - (M1)</option>
                                                                                <option value="Menengah - (M2)">Menengah - (M2)</option>
                                                                                <option value="Kecil - (K3)">Kecil - (K3)</option>
                                                                                <option value="Kecil - (K2)">Kecil - (K2)</option>
                                                                                <option value="Kecil - (K1)">Kecil - (K1)</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <small class="kualifikasi_usaha_perubahan_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div id="sts_validasi_akta_perubahan_1" style="display: none;">
                                                                        <span class="badge bg-success">Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_akta_perubahan_2" style="display: none;">
                                                                        <span class="badge bg-danger">Belum Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_akta_perubahan_3" style="display: none;">
                                                                        <span class="badge bg-secondary">Belum Diperiksa</span>
                                                                    </div>
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
                                                                    <button id="save_perubahan" type="submit" class="btn btn-primary btn-sm shadow-lg">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>

<!-- Modal -->
<div class="modal fade" id="modaledit_pendirian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                <button type="button" class="btn btn-primary" onclick="EditChange()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_dekrip_pendirian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip" method="post">
                    <input type="hidden" name="id_url">
                    <input type="hidden" name="type" value="dekrip">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateDekrip()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_pendirian" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Enkripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip" method="post">
                    <input type="hidden" name="id_url">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Enkripsi File Anda </p>
                        <div class="token_generate">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateEnkrip()">Yakin</button>
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
                <button type="button" class="btn btn-primary" onclick="EditChange_perubahan()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_dekrip_perubahan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Deskripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip_perubahan" method="post">
                    <input type="hidden" value="dekrip" name="type">
                    <input type="hidden" name="id_url_perubahan">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate_perubahan">

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
                <button type="button" class="btn btn-primary" onclick="GenerateDekrip_Perubahan()">Yakin</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_enkrip_perubahan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Silahkan Copy dan Paste Token Untuk Enkripsi Dokumen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_enkrip_perubahan" method="post">
                    <input type="hidden" name="id_url_perubahan">
                    <input type="hidden" name="type" value="enkrip">
                    <center>
                        <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Enkripsi File Anda </p>
                        <div class="token_generate_perubahan">

                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                            <input type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="GenerateEnkrip_Perubahan()">Yakin</button>
            </div>
        </div>
    </div>
</div>