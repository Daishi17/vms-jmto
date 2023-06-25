    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <i class="fas fa-sitemap mr-2"></i>
                <strong>Manajerial -
                    <span class="text-secondary">Kreatif Intelegensi Teknologi</span>
                </strong>
            </div>
            <div class="card-body">
                <div class="card card-primary card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-pemilik-tab" data-toggle="pill" href="#custom-tabs-four-pemilik" role="tab" aria-controls="custom-tabs-four-pemilik" aria-selected="true">
                                    <strong>
                                        <i class="fas fa-hospital-user mr-2"></i>
                                        Pemilik
                                    </strong>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-pengurus-tab" data-toggle="pill" href="#custom-tabs-four-pengurus" role="tab" aria-controls="custom-tabs-four-pengurus" aria-selected="true">
                                    <strong>
                                        <i class="fas fa-user-tie mr-2"></i>
                                        Pengurus
                                    </strong>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-pemilik" role="tabpanel" aria-labelledby="custom-tabs-four-pemilik-tab">
                                <div class="card card-outline card-danger">
                                    <div class="card-header">
                                        <table class="table table-bordered text-nowrap table-sm">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        <span class="text-danger">*</span> Surat Pengukuhan / RUPS
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
                                                            Surat Pengukuhan / RUPS.pdf
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
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
                                </div>

                                <div class="card card-outline card-danger">
                                    <div class="card-header">
                                        <h6 class="card-title">
                                            <i class="far fa-id-card mr-2"></i>
                                            Tabel Data Pemilik
                                        </h6>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 250px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover text-nowrap table-sm">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th style="width: 150px">NIK / Paspor</th>
                                                    <th>Nama</th>
                                                    <th style="width: 100px">Kewarganegaraan</th>
                                                    <th style="width: 100px">
                                                        <div class="text-center">Saham (%)</div>
                                                    </th>
                                                    <th style="width: 200px">
                                                        <div class="text-center">Actions</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        371234567890102
                                                    </td>
                                                    <td>
                                                        Bambang Heryanto
                                                    </td>
                                                    <td>
                                                        <div class="text-center">WNI</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">50%</div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-xl-lihat-pemilik">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        379876543210102
                                                    </td>
                                                    <td>
                                                        Ahmad Fikri Zulfikar
                                                    </td>
                                                    <td>
                                                        <div class="text-center">WNI</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">30%</div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        339876543210102
                                                    </td>
                                                    <td>
                                                        Dede Supriyadi
                                                    </td>
                                                    <td>
                                                        <div class="text-center">WNI</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">20%</div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm">
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
                                    <div class="card-footer clearfix">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-xl-tambah-pemilik">
                                            <i class="fas fa-user-plus mr-2"></i>
                                            Create Data
                                        </button>
                                        <ul class="pagination pagination-sm m-0 float-right">
                                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-four-pengurus" role="tabpanel" aria-labelledby="custom-tabs-four-siup-pengurus">
                                <div class="card card-outline card-warning">
                                    <div class="card-header">
                                        <table class="table table-bordered text-nowrap table-sm">
                                            <tr>
                                                <td class="col-sm-2 bg-light">
                                                    <label for="#" class="col-sm-12 col-form-label">
                                                        <span class="text-danger">*</span> Surat Keputusan
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
                                                            Surat Keputusan.pdf
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="col-sm-2" colspan="2">
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
                                </div>
                                <div class="card card-outline card-warning">
                                    <div class="card-header">
                                        <h6 class="card-title">
                                            <i class="fas fa-user-tie mr-2"></i>
                                            Tabel Data Pengurus
                                        </h6>
                                        <div class="card-tools">
                                            <div class="input-group input-group-sm" style="width: 250px;">
                                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-0">
                                        <table class="table table-bordered table-hover text-nowrap table-sm">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th style="width: 150px">NIK / Paspor</th>
                                                    <th>Nama</th>
                                                    <th style="width: 100px">Kewarganegaraan</th>
                                                    <th style="width: 200px">
                                                        <div>Jabatan</div>
                                                    </th>
                                                    <th style="width: 150px">Jabatan Sampai</th>
                                                    <th style="width: 50px">BPJS TK</th>
                                                    <th style="width: 50px">BPJS K</th>
                                                    <th style="width: 200px">
                                                        <div class="text-center">Actions</div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        371234567890102
                                                    </td>
                                                    <td>
                                                        Bambang Heryanto
                                                    </td>
                                                    <td>
                                                        <div class="text-center">WNI</div>
                                                    </td>
                                                    <td>
                                                        <div>Komisaris Utama</div>
                                                    </td>
                                                    <td>
                                                        <div>15/04/2025</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span class="badge badge-success text-center">
                                                                YA
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span class="badge badge-danger">
                                                                TIDAK
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-xl-edit-pengurus">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        379876543210102
                                                    </td>
                                                    <td>
                                                        Ahmad Fikri Zulfikar
                                                    </td>
                                                    <td>
                                                        <div class="text-center">WNI</div>
                                                    </td>
                                                    <td>
                                                        <div>Direktur Utama</div>
                                                    </td>
                                                    <td>
                                                        <div>15/04/2025</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span class="badge badge-success text-center">
                                                                YA
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span class="badge badge-danger">
                                                                TIDAK
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm">
                                                            <i class="fas fa-binoculars mr-2"></i>
                                                            View
                                                        </button>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash mr-2"></i>
                                                            Delete
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        339876543210102
                                                    </td>
                                                    <td>
                                                        Dede Supriyadi
                                                    </td>
                                                    <td>
                                                        <div class="text-center">WNI</div>
                                                    </td>
                                                    <td>
                                                        <div>Direktur</div>
                                                    </td>
                                                    <td>
                                                        <div>15/04/2025</div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span class="badge badge-success text-center">
                                                                YA
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <span class="badge badge-danger">
                                                                TIDAK
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-sm">
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
                                    <div class="card-footer clearfix">
                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-xl-tambah-pengurus">
                                            <i class="fas fa-user-plus mr-2"></i>
                                            Create Data
                                        </button>
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
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <div class="modal fade" id="modal-xl-tambah-pemilik">
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
                                        <strong>Kreatif Intelegensi Teknologi</strong> - Form Input Data Pemilik
                                    </span>
                                </h6>
                            </div>
                            <form>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> NIK / Paspor
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" data-inputmask='"mask": "9999999999999999"' data-mask>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    NPWP Pemilik
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nama Pemilik
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Kewarganegaraan
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-wni text-sm" id="exampleSelectRounded-wni">
                                                            <option>WNI</option>
                                                            <option>WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jenis Kepemilikan
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-jsn text-sm" id="exampleSelectRounded-jns">
                                                            <option>Individu</option>
                                                            <option>Perusahaan Nasional</option>
                                                            <option>Perusahaan Asing</option>
                                                            <option>Pemerintah</option>
                                                            <option>Publik</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jumlah Saham
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="" data-inputmask='"mask": "999"' data-mask>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Alamat
                                                </label>
                                            </td>
                                            <td class="col-sm-4" colspan="3">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Provinsi
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
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
                                                    <span class="text-danger">*</span> Kabupaten / Kota
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2bs4" style="width: 100%;">
                                                        <option selected="selected">Jakarta Timur</option>
                                                        <option>Tangerang Selatan</option>
                                                        <option>Bandung</option>
                                                    </select>
                                                </div>
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
        <div class="modal fade" id="modal-xl-lihat-pemilik">
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
                        <div class="card card-info card-outline">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <i class="fas fa-building"></i>
                                    <span class="text-secondary">
                                        <strong>Kreatif Intelegensi Teknologi</strong> - Form Edit Data Pemilik
                                    </span>
                                </h6>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-block btn-info btn-sm">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Changes
                                    </button>
                                </div>
                            </div>
                            <form>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> NIK / Paspor
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="3712345678901020" data-inputmask='"mask": "9999999999999999"' data-mask disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    NPWP Pemilik
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="77.321.456.7-888.000" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nama Pemilik
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Bambang Heryanto" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Kewarganegaraan
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-wni text-sm" id="exampleSelectRounded-wni" disabled>
                                                            <option>WNI</option>
                                                            <option>WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jenis Kepemilikan
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-jsn text-sm" id="exampleSelectRounded-jns" disabled>
                                                            <option>Individu</option>
                                                            <option>Perusahaan Nasional</option>
                                                            <option>Perusahaan Asing</option>
                                                            <option>Pemerintah</option>
                                                            <option>Publik</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jumlah Saham
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-4">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="50" data-inputmask='"mask": "999"' data-mask disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Alamat
                                                </label>
                                            </td>
                                            <td class="col-sm-4" colspan="3">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Jl. Bangka Belitiung No.17" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Provinsi
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
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
                                                    <span class="text-danger">*</span> Kabupaten / Kota
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2bs4" style="width: 100%;" disabled>
                                                        <option selected="selected">Jakarta Timur</option>
                                                        <option>Tangerang Selatan</option>
                                                        <option>Bandung</option>
                                                    </select>
                                                </div>
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
        <div class="modal fade" id="modal-xl-tambah-pengurus">
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
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <i class="fas fa-building"></i>
                                    <span class="text-secondary">
                                        <strong>Kreatif Intelegensi Teknologi</strong> - Form Input Data Pengurus
                                    </span>
                                </h6>
                            </div>
                            <form>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> NIK / Paspor
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" data-inputmask='"mask": "9999999999999999"' data-mask>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nama Pengurus
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Kewarganegaraan
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-wni text-sm" id="exampleSelectRounded-wni">
                                                            <option>WNI</option>
                                                            <option>WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jabatan Pengurus
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Menjabat Sejak
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
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
                                                    <span class="text-danger">*</span> Menjabat Sampai
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <!-- <span class="text-danger">*</span>--> Upload BPJS TK
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-10">
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
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <!-- <span class="text-danger">*</span>--> Upload BPJS K
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
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
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    File Dokumen BPJS
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        BPJS Tenaga Kerja.pdf
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        BPJS Kesehatan.pdf
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
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Alamat
                                                </label>
                                            </td>
                                            <td class="col-sm-4" colspan="3">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="">
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Provinsi
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
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
                                                    <span class="text-danger">*</span> Kabupaten / Kota
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2bs4" style="width: 100%;">
                                                        <option selected="selected">Jakarta Timur</option>
                                                        <option>Tangerang Selatan</option>
                                                        <option>Bandung</option>
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <button type="button" class="btn btn-primary" disabled>
                                        <i class="fas fa-save mr-2"></i>
                                        Save Changes
                                    </button>
                                    <button type="button" class="btn btn-danger">
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
        <div class="modal fade" id="modal-xl-edit-pengurus">
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
                        <div class="card card-warning card-outline">
                            <div class="card-header">
                                <h6 class="card-title">
                                    <i class="fas fa-building"></i>
                                    <span class="text-secondary">
                                        <strong>Kreatif Intelegensi Teknologi</strong> - Form Edit Data Pengurus
                                    </span>
                                </h6>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-block btn-info btn-sm">
                                        <i class="fas fa-edit mr-2"></i>
                                        Edit Changes
                                    </button>
                                </div>
                            </div>
                            <form>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> NIK / Paspor
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" data-inputmask='"mask": "9999999999999999"' data-mask disabled>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Nama Pengurus
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-user-edit"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Kewarganegaraan
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                        </div>
                                                        <select class="custom-select rounded-wni text-sm" id="exampleSelectRounded-wni" disabled>
                                                            <option>WNI</option>
                                                            <option>WNA</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Jabatan Pengurus
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Menjabat Sejak
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
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
                                                    <span class="text-danger">*</span> Menjabat Sampai
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <!-- <span class="text-danger">*</span>--> Upload BPJS TK
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-10">
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
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <!-- <span class="text-danger">*</span>--> Upload BPJS K
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
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
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    File Dokumen BPJS
                                                </label>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        BPJS Tenaga Kerja.pdf
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="col-sm-3">
                                                <div class="col-sm-12">
                                                    <a href="#" class="nav-link">
                                                        <i class="far fa-file-pdf mr-2"></i>
                                                        BPJS Kesehatan.pdf
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
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Alamat
                                                </label>
                                            </td>
                                            <td class="col-sm-4" colspan="3">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control form-control-sm" placeholder="" disabled>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-sm-2 bg-light">
                                                <label for="#" class="col-sm-12 col-form-label">
                                                    <span class="text-danger">*</span> Provinsi
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
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
                                                    <span class="text-danger">*</span> Kabupaten / Kota
                                                </label>
                                            </td>
                                            <td class="col-sm-4">
                                                <div class="col-sm-12">
                                                    <select class="form-control select2bs4" style="width: 100%;" disabled>
                                                        <option selected="selected">Jakarta Timur</option>
                                                        <option>Tangerang Selatan</option>
                                                        <option>Bandung</option>
                                                    </select>
                                                </div>
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

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->