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
                        <small>3. Semua dokumen <b>KTP & BPJS-TK</b> wajib di upload dengan format file pdf. upload dokumen tersebut pada setiap biodata pemilik/pengurus yang sudah terinput melalui import excel / create data, dengan klik tombol <b>View</b> lalu <b>Edit</b>.</small><br>
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
                                            <small class="text-dark"><i class="fa-regular fa-file-pdf px-1"></i>
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
                                                        <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pemilik">
                                                            <i class="fa-solid fa-user-plus px-1"></i>
                                                            Create Data
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>&nbsp;
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                            <i class="fa-solid fa-file-export px-1"></i>
                                                            Export Excel
                                                        </button>
                                                    </div>&nbsp;
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg">
                                                            <i class="fa-solid fa-cloud-arrow-up px-1"></i>
                                                            Import Excel
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>
                                                </div>
                                                <div class="card-body">
                                                    <table id="example1" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:7%;"><small class="text-white">NIK/Paspor</small></th>
                                                                <th style="width:7%;"><small class="text-white">NPWP</small></th>
                                                                <th style="width:25%;"><small class="text-white">Nama</small></th>
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
                                                            <tr>
                                                                <td><small>1234567890123456</small></td>
                                                                <td><small>12345678901234567</small></td>
                                                                <td><small>Ahmad Fikri Zulfikar</small></td>
                                                                <td><small>Indonesia</small></td>
                                                                <td><small>Individu</small></td>
                                                                <td><small>
                                                                        <div class="text-center">50</div>
                                                                    </small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pemilik">
                                                                        <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                        <small>View</small>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-trash-can px-1"></i>
                                                                        <small>Delete</small>
                                                                    </button>
                                                                </td>
                                                            </tr>
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
                                                        <button type="button" class="btn btn-success btn-sm shadow-lg">
                                                            <i class="fa-solid fa-file-export px-1"></i>
                                                            Export Excel
                                                        </button>
                                                    </div>&nbsp;
                                                    <div class="bd-highlight">
                                                        <button type="button" class="btn btn-secondary btn-sm shadow-lg">
                                                            <i class="fa-solid fa-cloud-arrow-up px-1"></i>
                                                            Import Excel
                                                        </button>
                                                    </div>&nbsp;
                                                    <span>||</span>
                                                </div>
                                                <div class="card-body">
                                                    <table id="example3" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr class="shadow-lg">
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
                                                            <tr class="shadow-lg">
                                                                <td><small>1234567890123456</small></td>
                                                                <td><small>12345678901234567</small></td>
                                                                <td><small>Ahmad Fikri Zulfikar</small></td>
                                                                <td><small>Indonesia</small></td>
                                                                <td><small>Direktur Utama</small></td>
                                                                <td><small>21/02/2021</small></td>
                                                                <td><small>21/02/2026</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengurus">
                                                                        <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                        <small>View</small>
                                                                    </button>
                                                                    <button type="button" class="btn btn-danger btn-sm shadow-lg">
                                                                        <i class="fa-solid fa-trash-can px-1"></i>
                                                                        <small>Delete</small>
                                                                    </button>
                                                                </td>
                                                            </tr>
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
                            <div class="bd-highlight">
                                <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                                </div>
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
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Indonesia</option>
                                                        <option>Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                        </div>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-light">
                                <label class="form-label col-form-label-sm"><b>Jenis Kepemilik</b></label>
                            </td>
                            <td class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Individu</option>
                                            <option>Perusahaan Nasional</option>
                                            <option>Perusahaan Asing</option>
                                            <option>Pemerintah</option>
                                            <option>Publik</option>
                                        </select>
                                    </div>
                                </div>
                    </div>
                    <td class="col-sm-2 bg-light">
                        <label class="form-label col-form-label-sm"><b>Saham</b></label>
                    </td>
                    <td class="col-sm-3">
                        <div class="col-sm-6">
                            <div class="input-group mb-2">
                                <span class="input-group-text">%</span>
                                <input type="number" class="form-control">
                            </div>
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
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-2 bg-light">
                            <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                        </td>
                        <td class="col-sm-3">
                            <input type="file" id="file" accept=".pdf">
                        </td>
                        <td class="col-sm-2 bg-light">
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
                </div>
                </tr>
                <tr>
                    <td class="col-sm-2 bg-light">
                        <label class="form-label col-form-label-sm"><b>Upload File BPJS-TK</b></label>
                    </td>
                    <td class="col-sm-3">
                        <input type="file" id="file" accept=".pdf">
                    </td>
                    <td class="col-sm-2 bg-light">
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
            </div>
            </tr>
            <tr>
                <td class="col-sm-2 bg-light">
                    <label class="form-label col-form-label-sm"><b>Upload File SK/Pengukuhan</b></label>
                </td>
                <td class="col-sm-3">
                    <input type="file" id="file" accept=".pdf">
                </td>
                <td class="col-sm-2 bg-light">
                    <button type="button" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                        <i class="fa-solid fa-file-pdf px-1"></i>
                        Nama File .pdf
                    </button>
                </td>
                <td class="col-sm-3 mb-2">
                    <small>
                        <span class="badge bg-secondary">Belum Tervalidasi</span>
                    </small>
                    <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                        <i class="fa-solid fa-lock-open px-1"></i>
                        Dekripsi File
                    </button>
        </div>
        </tr>
        <hr>
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
                                <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    Edit Data
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NIK/Paspor</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" class="form-control" data-inputmask='"mask": "9999999999999999"' data-mask>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                                </div>
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
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Warganegara</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Indonesia</option>
                                                        <option>Asing</option>
                                                    </select>
                                                </div>
                                            </div>
                        </div>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-light">
                                <label class="form-label col-form-label-sm"><b>Jabatan Pengurus</b></label>
                            </td>
                            <td class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-user-tie"></i></span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-2 bg-light">
                                <label class="form-label col-form-label-sm"><b>Jabat Mulai - Sampai</b></label>
                            </td>
                            <td class="col-sm-3">
                                <div class="col-sm-12 mb-3">
                                    <input type="date" id="date"><small>-</small><input type="date" id="date">
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
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-light">
                                <label class="form-label col-form-label-sm"><b>Upload File KTP</b></label>
                            </td>
                            <td class="col-sm-3">
                                <input type="file" id="file" accept=".pdf">
                            </td>
                            <td class="col-sm-2 bg-light">
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
                    </div>
                    </tr>
                    <tr>
                        <td class="col-sm-2 bg-light">
                            <label class="form-label col-form-label-sm"><b>Upload File BPJS-TK</b></label>
                        </td>
                        <td class="col-sm-3">
                            <input type="file" id="file" accept=".pdf">
                        </td>
                        <td class="col-sm-2 bg-light">
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
                </div>
                </tr>
                <tr>
                    <td class="col-sm-2 bg-light">
                        <label class="form-label col-form-label-sm"><b>Upload File SK/Pengukuhan</b></label>
                    </td>
                    <td class="col-sm-3">
                        <input type="file" id="file" accept=".pdf">
                    </td>
                    <td class="col-sm-2 bg-light">
                        <button type="button" class="btn btn-info btn-sm text-start col-sm-12 shadow-lg">
                            <i class="fa-solid fa-file-pdf px-1"></i>
                            Nama File .pdf
                        </button>
                    </td>
                    <td class="col-sm-3 mb-2">
                        <small>
                            <span class="badge bg-secondary">Belum Tervalidasi</span>
                        </small>
                        <button type="button" class="btn btn-warning btn-sm shadow-lg" disabled>
                            <i class="fa-solid fa-lock-open px-1"></i>
                            Dekripsi File
                        </button>
            </div>
            </tr>
            <hr>
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
</main>