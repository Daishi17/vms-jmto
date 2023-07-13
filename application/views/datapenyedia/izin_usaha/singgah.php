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
                                                    <form id="form_nib" enctype="multipart/form-data">
                                                        <table style="width: 100%;" class="table">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" name="nomor_surat_nib" class="form-control form-control-sm nomor_surat_nib">
                                                                        </div>
                                                                    </div>
                                                                    <small class="nomor_surat_nib_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select name="sts_seumur_hidup_nib" class="form-select text-sm sts_seumur_hidup_nib" aria-label="Default select example" onchange="sts_berlaku_nib()">
                                                                                <option value="1">Tanggal</option>
                                                                                <option value="2">Seumur Hidup</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="tgl_berlaku_nib" name="tgl_berlaku_nib" class="form-control tgl_berlaku_nib" readonly data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                                    </div>
                                                                    <small class="sts_seumur_hidup_nib_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="hidden" name="file_dokumen_nib_manipulasi">
                                                                    <input type="file" name="file_dokumen_nib" class="file_dokumen_nib file_valid_nib"  accept=".pdf, .xlsx, .xls">
                                                                    <small class="file_dokumen_nib_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_nib">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_nib">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Input KBLI</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger btn-sm col-sm-8 shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-kbli-nib">
                                                                        <i class="fa-solid fa-clone px-1"></i>
                                                                        Input Data KBLI
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div id="sts_validasi_nib_1" style="display: none;">
                                                                        <span class="badge bg-success sts_validasi_nib_1">Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_nib_2" style="display: none;">
                                                                        <span class="badge bg-secondary sts_validasi_nib_1">Belum Tervalidasi</span>
                                                                    </div>
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

                                        <div class="tab-pane fade show" id="nav-siup" role="tabpanel" aria-labelledby="nav-siup-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - SIUP</strong></small>
                                                        </span>
                                                    </div>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#apply_edit_siup" class="btn btn-secondary btn-sm shadow-lg">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_siup" enctype="multipart/form-data">
                                                        <table style="width: 100%;" class="table">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" name="nomor_surat_siup" class="form-control form-control-sm nomor_surat_siup">
                                                                        </div>
                                                                    </div>
                                                                    <small class="nomor_surat_siup_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select name="sts_seumur_hidup_siup" class="form-select text-sm sts_seumur_hidup_siup" aria-label="Default select example" onchange="sts_berlaku_siup()">
                                                                                <option value="1">Tanggal</option>
                                                                                <option value="2">Seumur Hidup</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="tgl_berlaku_siup" name="tgl_berlaku_siup" class="form-control tgl_berlaku_siup" readonly data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                                    </div>
                                                                    <small class="sts_seumur_hidup_siup_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="hidden" name="file_dokumen_siup_manipulasi">
                                                                    <input type="file" name="file_dokumen_siup" class="file_dokumen_siup file_valid_siup" accept=".pdf, .xlsx, .xls">
                                                                    <small class="file_dokumen_siup_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_siup">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_siup">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Input KBLI</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger btn-sm col-sm-8 shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-kbli-siup">
                                                                        <i class="fa-solid fa-clone px-1"></i>
                                                                        Input Data KBLI
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div id="sts_validasi_siup_1" style="display: none;">
                                                                        <span class="badge bg-success">Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_siup_2" style="display: none;">
                                                                        <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <div class="card-footer">
                                                                        <button type="submit" id="on_save_siup" class="btn btn-primary btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                                                            Simpan
                                                                        </button>
                                                                        <a href="javascript:;" id="on_cancel_siup" onclick="BatalChangeGlobal_siup()" class="btn btn-dark btn-sm shadow-lg"> <i class="fa-solid fa-angles-left px-1"> </i> Cancel</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade show" id="nav-sbu" role="tabpanel" aria-labelledby="nav-sbu-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - Sertifikat Badan Usaha SBU</strong></small>
                                                        </span>
                                                    </div>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#apply_edit_sbu" class="btn btn-secondary btn-sm shadow-lg">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_sbu" enctype="multipart/form-data">
                                                        <table style="width: 100%;" class="table">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" name="nomor_surat_sbu" class="form-control form-control-sm nomor_surat_sbu">
                                                                        </div>
                                                                    </div>
                                                                    <small class="nomor_surat_sbu_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select name="sts_seumur_hidup_sbu" class="form-select text-sm sts_seumur_hidup_sbu" aria-label="Default select example" onchange="sts_berlaku_sbu()">
                                                                                <option value="1">Tanggal</option>
                                                                                <option value="2">Seumur Hidup</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="tgl_berlaku_sbu" name="tgl_berlaku_sbu" class="form-control tgl_berlaku_sbu" readonly data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                                    </div>
                                                                    <small class="sts_seumur_hidup_sbu_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                <input type="hidden" name="file_dokumen_sbu_manipulasi">
                                                                    <input type="file" name="file_dokumen_sbu" class="file_dokumen_sbu file_valid_sbu" accept=".pdf, .xlsx, .xls">
                                                                    <small class="file_dokumen_sbu_error text-danger"></small>

                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_sbu">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_sbu">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Input KBLI</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger btn-sm col-sm-8 shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-kbli-sbu">
                                                                        <i class="fa-solid fa-clone px-1"></i>
                                                                        Input Data SBU
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div id="sts_validasi_sbu_1" style="display: none;">
                                                                        <span class="badge bg-success">Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_sbu_2" style="display: none;">
                                                                        <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <div class="card-footer">
                                                                        <button type="submit" id="on_save_sbu" class="btn btn-primary btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                                                            Simpan
                                                                        </button>
                                                                        <a href="javascript:;" id="on_cancel_sbu" onclick="BatalChangeGlobal_sbu()" class="btn btn-dark btn-sm shadow-lg"> <i class="fa-solid fa-angles-left px-1"> </i> Cancel</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade show" id="nav-siujk" role="tabpanel" aria-labelledby="nav-siujk-tab">
                                            <div class="card border-danger shadow-sm">
                                                <div class="card-header border-danger d-flex justify-content-between align-items-center">
                                                    <div class="card-title">
                                                        <span class="text-dark">
                                                            <i class="fa-regular fa-folder-open"></i>
                                                            <small><strong>Form Dokumen - siujk</strong></small>
                                                        </span>
                                                    </div>
                                                    <button type="button" data-bs-toggle="modal" data-bs-target="#apply_edit_siujk" class="btn btn-secondary btn-sm shadow-lg">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </div>
                                                <div class="card-body">
                                                    <form id="form_siujk" enctype="multipart/form-data">
                                                        <table style="width: 100%;" class="table">
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Nomor Surat</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <div class="col-sm-10">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                                            <input type="text" name="nomor_surat_siujk" class="form-control form-control-sm nomor_surat_siujk">
                                                                        </div>
                                                                    </div>
                                                                    <small class="nomor_surat_siujk_error text-danger"></small>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-sm-12 col-form-label-sm"><b>Berlaku Sampai</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="col-sm-5">
                                                                        <div class="input-group mb-2">
                                                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                                                            <select name="sts_seumur_hidup_siujk" class="form-select text-sm sts_seumur_hidup_siujk" aria-label="Default select example" onchange="sts_berlaku_siujk()">
                                                                                <option value="1">Tanggal</option>
                                                                                <option value="2">Seumur Hidup</option>
                                                                            </select>
                                                                        </div>
                                                                        <input type="date" id="tgl_berlaku_siujk" name="tgl_berlaku_siujk" class="form-control tgl_berlaku_siujk" readonly data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                                    </div>
                                                                    <small class="sts_seumur_hidup_siujk_error text-danger"></small>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Upload File</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <input type="hidden" name="file_dokumen_siujk_manipulasi">
                                                                    <input type="file" name="file_dokumen_siujk" class="file_dokumen_siujk file_valid_siujk" accept=".pdf, .xlsx, .xls">
                                                                    <small class="file_dokumen_siujk_error text-danger"></small>

                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <div id="tampil_dokumen_siujk">

                                                                    </div>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div class="button_enkrip_siujk">

                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Input KBLI</b></label>
                                                                </td>
                                                                <td class="col-sm-3">
                                                                    <button type="button" class="btn btn-danger btn-sm col-sm-8 shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-kbli-siujk">
                                                                        <i class="fa-solid fa-clone px-1"></i>
                                                                        Input Data KBLI
                                                                    </button>
                                                                </td>
                                                                <td class="col-sm-2 bg-light">
                                                                    <label class="form-label col-form-label-sm"><b>Status Validasi Dokumen</b></label>
                                                                </td>
                                                                <td class="col-sm-5">
                                                                    <div id="sts_validasi_siujk_1" style="display: none;">
                                                                        <span class="badge bg-success">Tervalidasi</span>
                                                                    </div>
                                                                    <div id="sts_validasi_siujk_2" style="display: none;">
                                                                        <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12 bg-dark" colspan="4"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="col-sm-12" colspan="4">
                                                                    <div class="card-footer">
                                                                        <button type="submit" id="on_save_siujk" class="btn btn-primary btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-floppy-disk px-1"></i>
                                                                            Simpan
                                                                        </button>
                                                                        <a href="javascript:;" id="on_cancel_siujk" onclick="BatalChangeGlobal_siujk()" class="btn btn-dark btn-sm shadow-lg"> <i class="fa-solid fa-angles-left px-1"> </i> Cancel</a>
                                                                    </div>
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
    <div class="modal" tabindex="-1" id="modal-xl-kbli-nib">
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
                                    <small><strong>Form Input - KBLI - NIB/TDP</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_kbli_nib" method="post">
                                <table style="width: 100%;" class="table">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli_nib">
                                                        <option value=""></option>
                                                        <?php foreach ($data_kbli as $key => $value) { ?>
                                                            <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kbli_nib text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi Usaha..." name="id_kualifikasi_izin_kbli_nib">
                                                        <option value=""></option>
                                                        <?php foreach ($kualifikasi as $key => $value) { ?>
                                                            <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kualifikasi_izin_kbli_nib text-danger"></small>
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
                                                <small class="ket_kbli_nib text-danger"></small>
                                            </div>
                                        </td>
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
                                    <table id="table_kbli_nib" style="width: 100%;" class="table table-bordered table-striped">
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
                    <form id="form_dekrip_nib" method="post">
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
                                <input type="text" name="token_dokumen_nib" value="" class="form-control">
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
                        <table style="width: 100%;" class="table">
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                </td>
                                <td class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli_nib">
                                                <option value=""></option>
                                                <?php foreach ($data_kbli as $key => $value) { ?>
                                                    <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <small class="id_kbli_kbli_error text-danger"></small>
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
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi..." name="id_kualifikasi_izin_kbli_nib">
                                                <option value=""></option>
                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <small class="id_kualifikasi_izin_kbli_nib_error text-danger"></small>
                                    </div>
                                    <label id="pilihan_kualifikasi_kbli_nib" for=""></label>
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
                                        <small class="ket_kbli_nib_error text-danger"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-12 bg-light" colspan="4">
                                    <a href="javascript:;" id="button_edit_kbli_nib" onclick="edit_kbli_nib()" class="btn btn-primary btn-sm shadow-lg">
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


    <!-- batas modal siup -->
    <div class="modal" tabindex="-1" id="modal-xl-kbli-siup">
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
                                    <small><strong>Form Input - SIUP</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_kbli_siup" method="post">
                                <table style="width: 100%;" class="table">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli_siup">
                                                        <option value=""></option>
                                                        <?php foreach ($data_kbli as $key => $value) { ?>
                                                            <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kbli_siup_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi Usaha..." name="id_kualifikasi_izin_kbli_siup">
                                                        <option value=""></option>
                                                        <?php foreach ($kualifikasi as $key => $value) { ?>
                                                            <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kualifikasi_izin_kbli_siup_error text-danger"></small>
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
                                                    <textarea name="ket_kbli_siup" class="form-control form-control-sm" rows="2"></textarea>
                                                </div>
                                                <small class="ket_kbli_siup_error text-danger"></small>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12 bg-light" colspan="4">
                                            <a href="javascript:;" id="button_save_kbli_siup" onclick="simpan_kbli_siup()" class="btn btn-primary btn-sm shadow-lg">
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Add Changes
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr>
                            <div class="card border-primary shadow-lg">
                                <div class="card-header bg-primary d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-solid fa-table-list px-1"></i>
                                            <small><strong>Tabel Data KBLI - siup/TDP Yang Terinput</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table_kbli_siup" style="width: 100%;" class="table table-bordered table-striped">
                                        <thead class="bg-primary">
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

    <div class="modal fade" id="apply_edit_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <a href="javascript:;" onclick="EditChangeGlobal_siup()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Yakin !!</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Tidak !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_dekrip_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">DEKRIP FILE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_dekrip_siup" method="post">
                        <input type="hidden" name="id_url_siup">
                        <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
                        <center>
                            <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                            <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                            <div class="token_generate_siup">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="text" name="token_dokumen_siup" value="" class="form-control">
                            </div>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" id="button_dekrip_generate_siup" onclick="GenerateDekrip_siup()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                    <button disabled style="display:none" id="button_dekrip_generate_manipulasi_siup" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_kbli_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT KBLI</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_kbli_siup" method="post">
                        <input type="hidden" name="id_url_kbli_siup">
                        <input type="hidden" name="token_kbli_siup">
                        <table style="width: 100%;" class="table">
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                </td>
                                <td class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli_siup">
                                                <option value=""></option>
                                                <?php foreach ($data_kbli as $key => $value) { ?>
                                                    <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                <?php  } ?>
                                            </select>
                                            <small class="id_kbli_siup_error text-danger"></small>
                                        </div>
                                    </div>
                                    <label id="pilihan_kbli_siup" for=""></label>
                                </td>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                </td>
                                <td class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi..." name="id_kualifikasi_izin_kbli_siup">
                                                <option value=""></option>
                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <small class="id_kualifikasi_izin_kbli_siup_error text-danger"></small>
                                    </div>
                                    <label id="pilihan_kualifikasi_kbli_siup" for=""></label>
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
                                            <textarea name="ket_kbli_siup" class="form-control form-control-sm" rows="2"></textarea>
                                        </div>
                                        <small class="ket_kbli_siup_error text-danger"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-12 bg-light" colspan="4">
                                    <a href="javascript:;" id="button_edit_kbli_siup" onclick="edit_kbli_siup()" class="btn btn-primary btn-sm shadow-lg">
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


    <!-- sbu -->
    <!-- batas modal sbu -->
    <div class="modal" tabindex="-1" id="modal-xl-kbli-sbu">
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
                    <div class="card border-danger shadow-lg">
                        <div class="card-header bg-danger d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-align-justify px-1"></i>
                                    <small><strong>Form Input - Sertifikat Badan Usaha SBU</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_kbli_sbu" method="post">
                                <table style="width: 100%;" class="table">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode SBU</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode SBU..." name="id_kbli_sbu">
                                                        <option value=""></option>
                                                        <?php foreach ($data_sbu as $key => $value) { ?>
                                                            <option value="<?= $value['id_sbu'] ?>"><?= $value['kode_sbu'] ?> || <?= $value['nama_sbu'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kbli_sbu_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi SBU</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi Usaha..." name="id_kualifikasi_izin_kbli_sbu">
                                                        <option value=""></option>
                                                        <?php foreach ($kualifikasi_sbu as $key => $value) { ?>
                                                            <option value="<?= $value['id_kualifikasi_sbu'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                    <small class="id_kualifikasi_izin_kbli_sbu_error text-danger"></small>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Keterangan SBU</b></label>
                                        </td>
                                        <td class="col-sm-10" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                                    <textarea name="ket_kbli_sbu" class="form-control form-control-sm" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <small class="ket_kbli_sbu_error text-danger"></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12 bg-light" colspan="4">
                                            <a href="javascript:;" id="button_save_kbli_sbu" onclick="simpan_kbli_sbu()" class="btn btn-primary btn-sm shadow-lg">
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Add Changes
                                            </a>
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
                                            <small><strong>Tabel Data SBU Yang Terinput</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table_kbli_sbu" style="width: 100%;" class="table table-bordered table-striped">
                                        <thead class="bg-danger">
                                            <tr>
                                                <th><small class="text-white">No</small></th>
                                                <th style="width:50%;"><small class="text-white">Kode & Jenis SBU</small></th>
                                                <th style="width:10%;"><small class="text-white">Kualifikasi SBU</small></th>
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

    <div class="modal fade" id="apply_edit_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <a href="javascript:;" onclick="EditChangeGlobal_sbu()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Yakin !!</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Tidak !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_dekrip_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">DEKRIP FILE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_dekrip_sbu" method="post">
                        <input type="hidden" name="id_url_sbu">
                        <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
                        <center>
                            <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                            <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                            <div class="token_generate_sbu">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="text" name="token_dokumen_sbu" value="" class="form-control">
                            </div>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" id="button_dekrip_generate_sbu" onclick="GenerateDekrip_sbu()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                    <button disabled style="display:none" id="button_dekrip_generate_manipulasi_sbu" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_kbli_sbu" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT SBU</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_kbli_sbu" method="post">
                        <input type="hidden" name="id_url_kbli_sbu">
                        <input type="hidden" name="token_kbli_sbu">
                        <table style="width: 100%;" class="table">
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kode SBU</b></label>
                                </td>
                                <td class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode SBU..." name="id_kbli_sbu">
                                                <option value=""></option>
                                                <?php foreach ($data_sbu as $key => $value) { ?>
                                                    <option value="<?= $value['id_sbu'] ?>"><?= $value['kode_sbu'] ?> || <?= $value['nama_sbu'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <small class="id_kbli_sbu_error text-danger"></small>
                                    </div>
                                    <label id="pilihan_kbli_sbu" for=""></label>
                                </td>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kualifikasi SBU</b></label>
                                </td>
                                <td class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi SBU..." name="id_kualifikasi_izin_kbli_sbu">
                                                <option value=""></option>
                                                <?php foreach ($kualifikasi_sbu as $key => $value) { ?>
                                                    <option value="<?= $value['id_kualifikasi_sbu'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <small class="id_kualifikasi_izin_kbli_sbu_error text-danger"></small>
                                    <label id="pilihan_kualifikasi_kbli_sbu" for=""></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Keterangan SBU</b></label>
                                </td>
                                <td class="col-sm-10" colspan="3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                            <textarea name="ket_kbli_sbu" class="form-control form-control-sm" rows="2"></textarea>
                                        </div>
                                    </div>
                                    <small class="ket_kbli_sbu_error text-danger"></small>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-12 bg-light" colspan="4">
                                    <a href="javascript:;" id="button_edit_kbli_sbu" onclick="edit_kbli_sbu()" class="btn btn-primary btn-sm shadow-lg">
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



    <!-- batas modal siujk -->
    <div class="modal" tabindex="-1" id="modal-xl-kbli-siujk">
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
                                    <small><strong>Form Input - siujk</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <form id="form_simpan_kbli_siujk" method="post">
                                <table style="width: 100%;" class="table">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                        </td>
                                        <td class="col-sm-5">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli_siujk">
                                                        <option value=""></option>
                                                        <?php foreach ($data_kbli as $key => $value) { ?>
                                                            <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kbli_siujk_error text-danger"></small>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi Usaha..." name="id_kualifikasi_izin_kbli_siujk">
                                                        <option value=""></option>
                                                        <?php foreach ($kualifikasi as $key => $value) { ?>
                                                            <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                        <?php  } ?>
                                                    </select>
                                                </div>
                                                <small class="id_kualifikasi_izin_kbli_siujk_error text-danger"></small>
                                            </div>
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
                                                    <textarea name="ket_kbli_siujk" class="form-control form-control-sm" rows="2"></textarea>
                                                </div>
                                            </div>
                                            <small class="ket_kbli_siujk_error text-danger"></small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-12 bg-light" colspan="4">
                                            <a href="javascript:;" id="button_save_kbli_siujk" onclick="simpan_kbli_siujk()" class="btn btn-primary btn-sm shadow-lg">
                                                <i class="fa-solid fa-floppy-disk px-1"></i>
                                                Add Changes
                                            </a>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <hr>
                            <div class="card border-primary shadow-lg">
                                <div class="card-header bg-primary d-flex bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <span class="text-white">
                                            <i class="fa-solid fa-table-list px-1"></i>
                                            <small><strong>Tabel Data KBLI - siujk/TDP Yang Terinput</strong></small>
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="table_kbli_siujk" style="width: 100%;" class="table table-bordered table-striped">
                                        <thead class="bg-primary">
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

    <div class="modal fade" id="apply_edit_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <a href="javascript:;" onclick="EditChangeGlobal_siujk()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Yakin !!</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Tidak !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_dekrip_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title">DEKRIP FILE</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_dekrip_siujk" method="post">
                        <input type="hidden" name="id_url_siujk">
                        <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
                        <center>
                            <img src="<?= base_url('assets34543543/img/private.jpg') ?>" width="100%" alt="">
                            <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                            <div class="token_generate_siujk">

                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="text" name="token_dokumen_siujk" value="" class="form-control">
                            </div>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" id="button_dekrip_generate_siujk" onclick="GenerateDekrip_siujk()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                    <button disabled style="display:none" id="button_dekrip_generate_manipulasi_siujk" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_edit_kbli_siujk" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">EDIT KBLI</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_kbli_siujk" method="post">
                        <input type="hidden" name="id_url_kbli_siujk">
                        <input type="hidden" name="token_kbli_siujk">
                        <table style="width: 100%;" class="table">
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kode KBLI</b></label>
                                </td>
                                <td class="col-sm-5">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kode Kbli..." name="id_kbli_siujk">
                                                <option value=""></option>
                                                <?php foreach ($data_kbli as $key => $value) { ?>
                                                    <option value="<?= $value['id_kbli'] ?>"><?= $value['kode_kbli'] ?> || <?= $value['nama_kbli'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <small class="id_kbli_siujk_error text-danger"></small>
                                    </div>
                                    <label id="pilihan_kbli_siujk" for=""></label>
                                </td>
                                <td class="col-sm-2 bg-light">
                                    <label class="form-label col-form-label-sm"><b>Kualifikasi KBLI</b></label>
                                </td>
                                <td class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                            <select class="form-select form-select-sm single-select-field" data-placeholder="Cari Kualifikasi..." name="id_kualifikasi_izin_kbli_siujk">
                                                <option value=""></option>
                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"><?= $value['nama_kualifikasi'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <small class="id_kualifikasi_izin_kbli_siujk_error text-danger"></small>
                                    </div>
                                    <label id="pilihan_kualifikasi_kbli_siujk" for=""></label>
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
                                            <textarea name="ket_kbli_siujk" class="form-control form-control-sm" rows="2"></textarea>
                                        </div>
                                        <small class="ket_kbli_siujk_error text-danger"></small>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-12 bg-light" colspan="4">
                                    <a href="javascript:;" id="button_edit_kbli_siujk" onclick="edit_kbli_siujk()" class="btn btn-primary btn-sm shadow-lg">
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
</div>