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
                        <small>1. Upload dokumen-dokumen yang di butuhkan sesuai dengan keterangan form pengalaman di bawah ini.</small><br>
                        <small>2. Jika ingin menginput banyak pengalaman usaha bisa menggunakan tombol <b>export excel</b> dan isi data sesuai format excel. Lalu setelah itu <b>import excel</b> data yang sudah diisi sesuai format.</small><br>
                        <small>3. Semua dokumen <b>Kontrak/SPK & BASTP</b> wajib di upload dengan format file pdf. upload dokumen tersebut pada setiap pengalaman usaha yang sudah terinput melalui import excel / create data, dengan klik tombol <b>View</b> lalu <b>Edit</b>.</small><br>
                        <small>4. Jika salah upload atau status dokumen file <span class="text-danger"><b>tidak valid</b></span>, klik tombol <b>View</b> lalu <b>Edit Changes</b> untuk melakukan upload file dokumen yang terbaru atau file dokumen revisi.</small><br>
                        <small>5. Jika dokumen file sudah terenkripsi, untuk mendownload dan membuka dokumen file, mengklik tombol <b>dekripsi</b> dan masukan <b>token</b> yang keluar dalam form pop up dekripsi dokumen file.</small><br>
                    </div>
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                    <small><strong>Form Dokumen - Pengalaman Usaha</strong></small>
                                </span>
                            </div>
                            <div class="bd-highlight">
                                <button type="button" class="btn btn-primary btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                    <i class="fa-solid fa-user-plus px-1"></i>
                                    Create Data
                                </button>
                            </div>&nbsp;
                            <span class="text-white">||</span>&nbsp;
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
                            </div>&nbsp;<span class="text-white">||</span>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-sm table-bordered table-striped">
                                <thead class="bg-danger">
                                    <tr>
                                        <th style="width:8%;"><small class="text-white">No. Kontrak</small></th>
                                        <th style="width:8%;"><small class="text-white">Tgl. Kontrak</small></th>
                                        <th style="width:23%;"><small class="text-white">Nama Pekerjaan</small></th>
                                        <th style="width:9%;"><small class="text-white">Nilai (Rp.)</small></th>
                                        <th style="width:9%;"><small class="text-white">Jenis Tender</small></th>
                                        <th style="width:10%;"><small class="text-white">Instansi</small></th>
                                        <th style="width:10%;"><small class="text-white">Lokasi</small></th>
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
                                        <td><small>1234567890123456</small></td>
                                        <td><small>14/08/2022</small></td>
                                        <td><small>Pekerjaan Sewa Kendaraan Operasional Kantor Pusat 1, periode ke-2</small></td>
                                        <td><small>
                                                <div class="text-end">20.000.000.000</div>
                                            </small></td>
                                        <td><small>Jasa Lainnya</small></td>
                                        <td><small>Kementrian BUMN</small></td>
                                        <td><small>DKI Jakarta</small></td>
                                        <td><small>
                                                <div class="text-center">
                                                    <span class="badge bg-secondary">Belum Tervalidasi</span>
                                                </div>
                                            </small>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
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
    <div class="modal" tabindex="-1" id="modal-xl-pengalaman">
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
                                    <small><strong>Form Data - Pengalaman Perusahaan</strong></small>
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
                                            <label class="form-label col-form-label-sm"><b>No. Kontrak</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-barcode"></i></span>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Tanggal Kontrak</b></label>
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
                                            <label class="form-label col-form-label-sm"><b>Nama Pekerjaan</b></label>
                                        </td>
                                        <td class="col-sm-5" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                    <textarea type="text" class="form-control" rows="2"></textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Jenis Pengadaan</b></label>
                                        </td>
                                        <td class="col-sm-3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                                    <select class="form-select" aria-label="Default select example">
                                                        <option selected>Jasa Lainnya</option>
                                                        <option>Jasa Konstruksi</option>
                                                        <option>Jasa Pengadaan Barang</option>
                                                        <option>Jasa Konsultasi</option>
                                                        <option>Sewa Kelola</option>
                                                    </select>
                                                </div>
                                            </div>
                        </div>
                        <td class="col-sm-2 bg-light">
                            <label class="form-label col-form-label-sm"><b>Nilai Kontrak</b></label>
                        </td>
                        <td class="col-sm-3">
                            <div class="col-sm-10">
                                <div class="input-group mb-2">
                                    <span class="input-group-text">Rp.</span>
                                    <input type="text" id="tanpa-rupiah" class="form-control">
                                </div>
                            </div>
                        </td>
                        </tr>
                        <tr>
                            <td class="col-sm-2 bg-light">
                                <label class="form-label col-form-label-sm"><b>Instansi Pemberi</b></label>
                            </td>
                            <td class="col-sm-3">
                                <div class="col-sm-12">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-business-time"></i></span>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-2 bg-light">
                                <label class="form-label col-form-label-sm"><b>Lokasi Pekerjaan</b></label>
                            </td>
                            <td class="col-sm-3">
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
                                <label class="form-label col-form-label-sm"><b>Upload File SPK/Kontrak</b></label>
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
                            <label class="form-label col-form-label-sm"><b>Upload File BAST</b></label>
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