    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h6 class="card-title">
                    <i class="fas fa-building"></i>
                    <span class="text-secondary">
                        <strong>Kreatif Intelegensi Teknologi</strong> - Pengalaman
                    </span>
                </h6>
            </div>
            <div class="card-body">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-chart-bar mr-2"></i>
                            Pengalaman Perusahaan
                        </h3>
                        <div class="card-tools">
                            <div class="card-tools">
                                <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-xl-tambah">
                                    <i class="fas fa-user-plus mr-2"></i>
                                    Create Data
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-sm table-bordered table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th style="width: 300px">
                                        Nama Kontrak
                                    </th>
                                    <th style="width: 50px">
                                        Tanggal
                                    </th>
                                    <th class="text-center" style="width: 120px">
                                        Nilai (Rp.)
                                    </th>
                                    <th style="width: 120px">
                                        Jenis Pengadaan
                                    </th>
                                    <th>
                                        Instansi
                                    </th>
                                    <th>
                                        Lokasi Pekerjaan
                                    </th>
                                    <th class="text-center">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Pengembangan Sistem Informasi E-Procurment, DRT dan RUP</td>
                                    <td>01/10/2021</td>
                                    <td class="text-right">1.300.000.000</td>
                                    <td>Jasa Lainnya</td>
                                    <td>Jasamarga Tollroad Maintenance</td>
                                    <td>DKI Jakarta</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-xl-edit">
                                            <i class="fas fa-binoculars mr-2"></i>
                                            View
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash mr-2"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <div class="modal fade" id="modal-xl-tambah">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="text-primary">
                                <strong>Jasamarga Tollroad Operator</strong>
                            </span>
                        </h5>
                    </div>

                    <div class="modal-body">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <i class="fas fa-building"></i>
                                    <span class="text-secondary">
                                        <strong>Kreatif Intelegensi Teknologi</strong> - Form Input Pengalaman
                                    </span>
                                </h6>
                            </div>
                            <from>
                                <div class="card-body">
                                    <table class="table table-sm table-bordered table-sm">
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nomor Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nama Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-stream"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Tanggal Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nilai Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp.</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="rupiah" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Persentase Pekerjaan
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-5">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jenis Pengadaan
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-wni text-sm">
                                                            <option>Jasa Lainnya</option>
                                                            <option>Jasa Konsultasi</option>
                                                            <option>Jasa Pemborongan</option>
                                                            <option>Jasa Konstruksi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Lokasi Pekerjaan
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2bs4" style="width: 100%;">
                                                        <option selected="selected">DKI Jakarta</option>
                                                        <option>Banten</option>
                                                        <option>Jawa Barat</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Instansi Pemberi
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Dokumen Kontrak/SPK
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-upload"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        Dokumen Kontrak/SPK.pdf
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="col-sm-4" colspan="2">
                                                <button type="button" class="btn btn-success btn-sm">
                                                    <i class="fas fa-lock mr-2"></i>
                                                    Enkripsi Doc
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" disabled>
                                                    <i class="fas fa-unlock-alt mr-2"></i>
                                                    Dekripsi Doc
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <i class="fas fa-save mr-2"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="btn btn-warning">
                                        <i class="fas fa-ban mr-2"></i>
                                        Cancel
                                    </button>
                                </div>
                                </form>
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
        <div class="modal fade" id="modal-xl-edit">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5> <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/jmto_rev1.png" class="brand-image img-circle elevation-3" style="opacity: .8">
                            <span class="text-primary">
                                <strong>Jasamarga Tollroad Operator</strong>
                            </span>
                        </h5>
                    </div>

                    <div class="modal-body">
                        <div class="card card-danger card-outline">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <i class="fas fa-building"></i>
                                    <span class="text-secondary">
                                        <strong>Kreatif Intelegensi Teknologi</strong> - Form Edit Pengalaman
                                    </span>
                                </h6>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-block btn-info btn-sm">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Changes
                                    </button>
                                </div>
                            </div>
                            <from>
                                <div class="card-body">
                                    <table class="table table-sm table-bordered table-sm">
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nomor Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nama Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-stream"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Tanggal Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nilai Kontrak
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp.</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="rupiah" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Persentase Pekerjaan
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-5">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-percentage"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jenis Pengadaan
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-wni text-sm" disabled>
                                                            <option>Jasa Lainnya</option>
                                                            <option>Jasa Konsultasi</option>
                                                            <option>Jasa Pemborongan</option>
                                                            <option>Jasa Konstruksi</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Lokasi Pekerjaan
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2bs4" style="width: 100%;" disabled>
                                                        <option selected="selected">DKI Jakarta</option>
                                                        <option>Banten</option>
                                                        <option>Jawa Barat</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Instansi Pemberi
                                                </label>
                                            </td>
                                            <td class="col-sm-5">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-building"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Dokumen Kontrak/SPK
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="exampleInputFile" disabled>
                                                            <label class="custom-file-label" for="exampleInputFile">Nama File</label>
                                                        </div>
                                                        <div class="input-group-append">
                                                            <button type="button" class="btn btn-primary btn-sm" disabled>
                                                                <i class="fas fa-upload"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        Dokumen Kontrak/SPK.pdf
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="col-sm-4" colspan="2">
                                                <button type="button" class="btn btn-success btn-sm" disabled>
                                                    <i class="fas fa-lock mr-2"></i>
                                                    Enkripsi Doc
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" disabled>
                                                    <i class="fas fa-unlock-alt mr-2"></i>
                                                    Dekripsi Doc
                                                </button>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <i class="fas fa-save mr-2"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="btn btn-warning" disabled>
                                        <i class="fas fa-ban mr-2"></i>
                                        Cancel
                                    </button>
                                </div>
                                </form>
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