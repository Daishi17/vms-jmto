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