<!-- Main content -->
<section class="content">
    <!-- nanti ini di buat file global terpisah -->
    <input type="hidden" name="id_url_vendor" value="<?= $row_vendor['id_url_vendor'] ?>">
    <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
    <input type="hidden" name="url_encryption_nib" value="<?= base_url('datapenyedia/encryption_nib/') ?>">
    <input type="hidden" name="url_download" value="<?= base_url('datapenyedia/url_download/') ?>">
    <input type="hidden" value="<?= base_url('datapenyedia/get_row_global_vendor/') ?>" name="url_get_row_vendor">
    <input type="hidden" value="<?= base_url('datapenyedia/add_izin_usaha') ?>" name="url_post">
    <!-- <a href="javascript:;" onclick="kirun()">klik</a> -->

    <!-- link post siup -->
    <input type="hidden" value="<?= base_url('datapenyedia/add_izin_usaha_siup') ?>" name="url_post_siup">
    <input type="hidden" name="url_encryption_siup" value="<?= base_url('datapenyedia/encryption_siup/') ?>">
    <input type="hidden" name="url_download_siup" value="<?= base_url('datapenyedia/url_download_siup/') ?>">
    <!-- end link post siup  -->


    <!-- link post sbu -->
    <input type="hidden" value="<?= base_url('datapenyedia/add_izin_usaha_sbu') ?>" name="url_post_sbu">
    <input type="hidden" name="url_encryption_sbu" value="<?= base_url('datapenyedia/encryption_sbu/') ?>">
    <input type="hidden" name="url_download_sbu" value="<?= base_url('datapenyedia/url_download_sbu/') ?>">
    <!-- end link post sbu  -->

    <!-- link post siujk -->
    <input type="hidden" value="<?= base_url('datapenyedia/add_izin_usaha_siujk') ?>" name="url_post_siujk">
    <input type="hidden" name="url_encryption_siujk" value="<?= base_url('datapenyedia/encryption_siujk/') ?>">
    <input type="hidden" name="url_download_siujk" value="<?= base_url('datapenyedia/url_download_siujk/') ?>">
    <!-- end link post siujk  -->
    <input type="hidden" name="url_dekrip_nib" value="<?= base_url('datapenyedia/dekrip_nib') ?>">
    <!-- Default box -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <i class="fas fa-file-import mr-2"></i>
            <strong>Izin Usaha -
                <span class="text-secondary">Kreatif Intelegensi Teknologi</span>
            </strong>
        </div>
        <div class="card-body">
            <div class="card card-primary card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-four-nib-tab" data-toggle="pill" href="#custom-tabs-four-nib" role="tab" aria-controls="custom-tabs-four-nib" aria-selected="true">
                                <strong>
                                    <i class="far fa-file-word mr-2"></i>
                                    NIB
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-siup-tab" data-toggle="pill" href="#custom-tabs-four-siup" role="tab" aria-controls="custom-tabs-four-siup" aria-selected="false">
                                <strong>
                                    <i class="far fa-file-powerpoint mr-2"></i>
                                    SIUP
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-sbu-tab" data-toggle="pill" href="#custom-tabs-four-sbu" role="tab" aria-controls="custom-tabs-four-sbu" aria-selected="false">
                                <strong>
                                    <i class="far fa-file-excel mr-2"></i>
                                    SBU
                                </strong>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-four-siujk-tab" data-toggle="pill" href="#custom-tabs-four-siujk" role="tab" aria-controls="custom-tabs-four-siujk" aria-selected="false">
                                <strong>
                                    <i class="far fa-file-pdf mr-2"></i>
                                    SIUJK
                                </strong>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-four-tabContent">
                        <!-- setting body nav-tab nib -->
                        <div class="tab-pane fade show active" id="custom-tabs-four-nib" role="tabpanel" aria-labelledby="custom-tabs-four-nib-tab">
                            <div class="card card-outline card-danger">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Nomor Induk Berusaha (NIB)</span>
                                    </strong>
                                    <div class="card-tools" style="margin-right:auto;">
                                        <button type="button" data-toggle="modal" data-target="#apply_edit" class="btn btn-block btn-warning btn-sm">
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form id="form_izin_usaha" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" name="jenis_izin" value="Nomor Induk Berusaha" class="form-control form-control-sm" placeholder="Nomor Induk Berusaha" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" name="nomor_surat" class="form-control form-control-sm nomor_surat_form" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select name="sts_seumur_hidup" class="custom-select rounded-1 text-sm sts_seumur_hidup_form" id="exampleSelectRounded1" onchange="sts_berlaku_nib()">
                                                                <option value="1">Tanggal</option>
                                                                <option value="2">Seumur Hidup</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" id="tgl_berlaku_nib" name="tgl_berlaku_nib" class="form-control tgl_berlaku_nib_form" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select name="kualifikasi_izin" class="custom-select rounded-2 text-sm kualifikasi_izin_form" id="exampleSelectRounded2">
                                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                                    <option value=" <?= $value['id_kualifikasi_izin'] ?>"> <?= $value['nama_kualifikasi'] ?></option>
                                                                <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="file_dokumen" class="file_dokumen">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div id="tampil_dokumen">

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <div class="button_enkrip">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Input Kode KBLI
                                                    </label>
                                                </td>
                                                <td class="col-sm-3" colspan="3">
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-block btn-danger btn-sm" data-toggle="modal" data-target="#modal-lg-kbli nib_kbli_form">
                                                            <i class="far fa-file-alt mr-2"></i>
                                                            Form Input KBLI
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" id="on_save" class="btn btn-success btn-sm">
                                            <i class="fas fa-save mr-2"></i>
                                            Simpan
                                        </button>
                                        <a href="javascript:;" id="on_cancel" onclick="BatalChangeGlobal()" class="btn btn-danger btn-sm"> <i class="fas fa fa-ban"> </i> Cancel</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end setting body nav-tab siup -->
                        <div class="tab-pane fade" id="custom-tabs-four-siup" role="tabpanel" aria-labelledby="custom-tabs-four-siup-tab">
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Surat Izin Usaha Perdagangan (SIUP)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" data-toggle="modal" data-target="#apply_edit_siup" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form id="form_izin_usaha2" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Surat Izin Usaha Perdagangan" readonly>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input type="text" name="nomor_surat_siup" class="form-control form-control-sm nomor_surat_siup" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select name="sts_seumur_hidup_siup" class="custom-select rounded-1 text-sm sts_seumur_hidup_siup" id="exampleSelectRounded1" onchange="sts_berlaku_siup()">
                                                                <option value="1">Tanggal</option>
                                                                <option value="2">Seumur Hidup</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input id="tgl_berlaku_siup" name="tgl_berlaku_siup" type="date" class="form-control tgl_berlaku_siup" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select name="kualifikasi_izin_siup" class="custom-select rounded-2 text-sm kualifikasi_izin_siup" id="exampleSelectRounded2">
                                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"> <?= $value['nama_kualifikasi'] ?></option>
                                                                <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="file_dokumen">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div id="tampil_dokumen_siup">

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <div class="button_enkrip_siup">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Input Kode KBLI
                                                    </label>
                                                </td>
                                                <td class="col-sm-3" colspan="3">
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-block btn-warning btn-sm" data-toggle="modal" data-target="#modal-lg-siup">
                                                            <i class="far fa-file-alt mr-2"></i>
                                                            Form Input KBLI
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm on_save_siup">
                                            <i class="fas fa-save mr-2"></i>
                                            Simpan
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end setting body nav-tab sbu -->
                        <div class="tab-pane fade" id="custom-tabs-four-sbu" role="tabpanel" aria-labelledby="custom-tabs-four-sbu-tab">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Sertifikat Badan Usaha (SBU)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form id="form_izin_usaha3" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Sertifikat Badan Usaha">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input name="nomor_surat_sbu" type="text" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select name="sts_seumur_hidup_sbu" class="custom-select rounded-1 text-sm" id="exampleSelectRounded1">
                                                                <option value="1">Tanggal</option>
                                                                <option value="2">Seumur Hidup</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input name="tgl_berlaku_sbu" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select name="kualifikasi_izin_sbu" class="custom-select rounded-2 text-sm" id="exampleSelectRounded2">
                                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"> <?= $value['nama_kualifikasi'] ?></option>
                                                                <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="file_dokumen">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div id="tampil_dokumen_sbu">

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <div class="button_enkrip_sbu">

                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Input Kode SBU
                                                    </label>
                                                </td>
                                                <td class="col-sm-3" colspan="3">
                                                    <div class="col-sm-3">
                                                        <button type="button" class="btn btn-block btn-success btn-sm" data-toggle="modal" data-target="#modal-lg-sbu">
                                                            <i class="far fa-file-alt mr-2"></i>
                                                            Form Input SBU
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-save mr-2"></i>
                                            Simpan
                                        </button>
                                        <!-- <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Cancel
                                        </button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end setting body nav-tab siujk -->
                        <div class="tab-pane fade" id="custom-tabs-four-siujk" role="tabpanel" aria-labelledby="custom-tabs-four-siujk-tab">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    <strong> Form Izin Usaha -
                                        <span class="text-secondary">Surat Izin Usaha Jasa Konstruksi (SIUJK)</span>
                                    </strong>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit mr-2"></i>
                                            Edit Changes
                                        </button>
                                    </div>
                                </div>
                                <form id="form_izin_usaha4" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <table class="table table-sm table-bordered">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Jenis Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-folder-open"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Surat Izin Usaha Jasa Konstruksi">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Nomor Surat
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-qrcode"></i></span>
                                                            </div>
                                                            <input name="nomor_surat_siujk" type="text" class="form-control form-control-sm" placeholder="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Berlaku Sampai
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <select class="custom-select rounded-1 text-sm" id="exampleSelectRounded1">
                                                                <option value="1">Tanggal</option>
                                                                <option value="2">Seumur Hidup</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
                                                    <div class="col-sm-4">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input name="tgl_berlaku_siujk" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Kualifikasi Izin
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-server"></i></span>
                                                            </div>
                                                            <select name="kualifikasi_izin_siujk" class="custom-select rounded-2 text-sm" id="exampleSelectRounded2">
                                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                                    <option value="<?= $value['id_kualifikasi_izin'] ?>"> <?= $value['nama_kualifikasi'] ?></option>
                                                                <?php  } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        Upload Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-3">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="file_dokumen">
                                                            </div>
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-primary btn-sm">
                                                                    <i class="fas fa-upload"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        File Dokumen
                                                    </label>
                                                </td>
                                                <td class="col-sm-2">
                                                    <div class="col-sm-12">
                                                        <div id="tampil_dokumen_siujk">

                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="col-sm-4" colspan="2">
                                                    <div class="button_enkrip_siujk">

                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fas fa-save mr-2"></i>
                                            Simpan
                                        </button>
                                        <!-- <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-ban mr-2"></i>
                                            Cancel
                                        </button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Catatan!</h4>
                <p>
                    <hr>
                </p>by: Unit Eprocurement JMTO
            </div>
        </div>
        <!-- /.card-footer-->

    </div>
    <!-- /.card -->

    <div class="modal fade" id="modal-lg-kbli">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="text-primary">
                            <strong>Jasamarga Tollroad Operator</strong>
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong> - Nomor Induk Berusaha (NIB)
                            </span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <!--<span class="col-sm-10" for="inputKode">
                                            <strong>Kode KBLI</strong>
                                        </span> -->
                                            <label for="inputKode" class="col-sm-10  col-form-label">Kode KBLI</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">62019 || Aktivitas Pemrograman Komputer Lainnya</option>
                                                    <option>46512 || Perdagangan Besar Piranti Lunak</option>
                                                    <option>47413 || Perdagangan Eceran Piranti Lunak (Software)</option>
                                                    <option>58200 || Penerbitan Piranti Lunak (software)</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-1">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a class="nav-link">
                                                        <span class="text-white"><i class="fas fa-save mr-2"></i>Insert</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>62019</td>
                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <strong>Sudah Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>46512</td>
                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <strong>Data Tidak Valid</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>47413</td>
                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle mr-2"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-lg-siup">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="text-primary">
                            <strong>Jasamarga Tollroad Operator</strong>
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-warning card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong> - Surat Izin Usaha Perdagangan (SIUP)
                            </span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <!--<span class="col-sm-10" for="inputKode">
                                            <strong>Kode KBLI</strong>
                                        </span> -->
                                            <label for="inputKode" class="col-sm-10  col-form-label">Kode KBLI</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">62019 || Aktivitas Pemrograman Komputer Lainnya</option>
                                                    <option>46512 || Perdagangan Besar Piranti Lunak</option>
                                                    <option>47413 || Perdagangan Eceran Piranti Lunak (Software)</option>
                                                    <option>58200 || Penerbitan Piranti Lunak (software)</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-1">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a class="nav-link">
                                                        <span class="text-white"><i class="fas fa-save mr-2"></i>Insert</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>62019</td>
                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <strong>Sudah Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>46512</td>
                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <strong>Data Tidak Valid</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>47413</td>
                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle mr-2"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-lg-sbu">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                        <span class="text-primary">
                            <strong>Jasamarga Tollroad Operator</strong>
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong> - Sertifikat Badan Usaha (SBU)
                            </span>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" novalidate>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <!--<span class="col-sm-10" for="inputKode">
                                            <strong>Kode KBLI</strong>
                                        </span> -->
                                            <label for="inputKode" class="col-sm-10  col-form-label">Kode SBU</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">BG001 || Konstruksi Gedung Hunian</option>
                                                    <option>BG002 || Konstruksi Gedung Perkantoran</option>
                                                    <option>BG003 || Konstruksi Gedung Industri</option>
                                                    <option>BG004 || Konstruksi Gedung Perbelanjaan</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-1">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a class="nav-link">
                                                        <span class="text-white"><i class="fas fa-save mr-2"></i>Insert</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 200px;">
                                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap table-sm">
                                        <thead>
                                            <tr>
                                                <th>Kode</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>62019</td>
                                                <td>Aktivitas Pemrograman Komputer Lainnya</td>
                                                <td>
                                                    <span class="badge badge-success">
                                                        <strong>Sudah Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>46512</td>
                                                <td>Perdagangan Besar Piranti Lunak</td>
                                                <td>
                                                    <span class="badge badge-danger">
                                                        <strong>Data Tidak Valid</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>47413</td>
                                                <td>Perdagangan Eceran Piranti Lunak (Software)</td>
                                                <td>
                                                    <span class="badge badge-warning">
                                                        <strong>Belum Tervalidasi</strong>
                                                    </span>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash mr-2"></i>
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fas fa-times-circle mr-2"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- MODAL IZIN USAHA -->
<!-- Modal -->
<div class="modal fade" id="apply_edit" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Anda Yakin Ingin Mengedit Data Anda ??</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets/img/tanya.jpg') ?>" width="200px" alt="">
                </center>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" onclick="EditChangeGlobal()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Yakin !!</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-ban"> </i> Tidak !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="apply_edit_siup" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Anda Yakin Ingin Mengedit Data Anda ??</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center>
                    <img src="<?= base_url('assets/img/tanya.jpg') ?>" width="200px" alt="">
                </center>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" onclick="EditChangeGlobal()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Yakin !!</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-ban"> </i> Tidak !!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_dekrip" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form_dekrip" method="post">
                    <input type="hidden" name="id_url">
                    <input type="hidden" name="secret_token" value="<?= $row_vendor['token_scure_vendor'] ?>">
                    <center>
                        <img src="<?= base_url('assets/img/private.jpg') ?>" width="100%" alt="">
                        <p>Silakan Masukan Token Untuk Mendkrip File Anda </p>
                        <div class="token_generate">

                        </div>
                        <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input id="token_nib" type="text" name="token_dokumen" value="" class="form-control">
                        </div>
                    </center>
                </form>
            </div>
            <div class="modal-footer">
                <a href="javascript:;" id="button_dekrip_generate" onclick="GenerateDekrip()" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</a>
                <button disabled style="display:none" id="button_dekrip_generate_manipulasi" class="btn btn-success"> <i class="fas fa fa-check"> </i> Generate !!</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa fa-ban"> </i> Batal !!</button>
            </div>
        </div>
    </div>
</div>