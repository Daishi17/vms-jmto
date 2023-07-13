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
                        <small>1. Fiture ini adalah untuk memonitoring kelengkapan status dokumen tervalidasi yang sudah di koreksi oleh pihak validator non penyedia berdasarkan data rangkuman profile perusahan.</small><br>
                        <small>2. Jika terdapat status dokumen <b>tidak valid</b> segera perbaiki dengan mengklik tombol <b>View</b>.</small><br>
                    </div>
                    <div class="card border-dark shadow-lg">
                        <div class="card-header bg-dark d-flex bd-highlight">
                            <div class="flex-grow-1 bd-highlight">
                                <span class="text-white">
                                    <i class="fa-regular fa-folder-open px-0"></i>
                                    <small><strong>Monitoring Data Tabel - Dokumen Tervalidasi</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card border-danger shadow-lg">
                                <div class="card-header">
                                    <div class="nav nav-tabs mb-3 bg-danger" id="nav-tab" role="tablist">
                                        <button class="nav-link active" id="nav-izin-tab" data-bs-toggle="tab" data-bs-target="#nav-izin" type="button" role="tab" aria-controls="nav-izin" aria-selected="true">
                                            <small class="text-dark">
                                                <i class="fa-regular fa-file fa-beat"></i>
                                                <b>Izin Usaha</b>
                                                <span class="badge bg-secondary text-white">2</span>
                                            </small>
                                        </button>
                                        <button class="nav-link" id="nav-akta-tab" data-bs-toggle="tab" data-bs-target="#nav-akta" type="button" role="tab" aria-controls="nav-akta" aria-selected="false">
                                            <small class="text-dark">
                                                <i class="fa-regular fa-file"></i>
                                                <b>Akta</b>
                                                <span class="badge bg-secondary text-white">0</span>
                                            </small>
                                        </button>
                                        <button class="nav-link" id="nav-manajerial-tab" data-bs-toggle="tab" data-bs-target="#nav-manajerial" type="button" role="tab" aria-controls="nav-manajerial" aria-selected="false">
                                            <small class="text-dark">
                                                <i class="fa-regular fa-file"></i>
                                                <b>Manajerial</b>
                                                <span class="badge bg-secondary text-white">0</span>
                                            </small>
                                        </button>
                                        <button class="nav-link" id="nav-pengalaman-tab" data-bs-toggle="tab" data-bs-target="#nav-pengalaman" type="button" role="tab" aria-controls="nav-pengalaman" aria-selected="false">
                                            <small class="text-dark">
                                                <i class="fa-regular fa-file"></i>
                                                <b>Pengalaman Perusahaan</b>
                                                <span class="badge bg-secondary text-white">0</span>
                                            </small>
                                        </button>
                                        <button class="nav-link" id="nav-pajak-tab" data-bs-toggle="tab" data-bs-target="#nav-pajak" type="button" role="tab" aria-controls="nav-pajak" aria-selected="false">
                                            <small class="text-dark">
                                                <i class="fa-regular fa-file"></i>
                                                <b>Pajak</b>
                                                <span class="badge bg-secondary text-white">0</span>
                                            </small>
                                        </button>
                                    </div>
                                    <div class="tab-content p-3 border bg-light" id="nav-tabContent">
                                        <div class="tab-pane fade active show" id="nav-izin" role="tabpanel" aria-labelledby="nav-izin-tab">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header bg-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-white">
                                                            <i class="fa-regular fa-folder-open px-0"></i>
                                                            <small><strong>Data Tabel - Izin Usaha</strong></small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="get_data_izin" value="<?= base_url('monitoring_dokumen/get_data_izin') ?>">
                                                    <table id="tbl_monitoring_izin" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:2%;"><small class="text-white">No </small></th>
                                                                <th style="width:20%;"><small class="text-white">Jenis Dokumen</small></th>
                                                                <th style="width:20%;"><small class="text-white">No. Surat</small></th>
                                                                <th style="width:60%;"><small class="text-white">KBLI/SBU</small></th>
                                                                <th style="width:10%;"><small class="text-white">Status Validasi</small></th>
                                                                <th style="width:10%;">
                                                                    <div class="text-center">
                                                                        <small class="text-white">
                                                                            Ket. Validator
                                                                        </small>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-akta" role="tabpanel" aria-labelledby="nav-akta-tab">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header bg-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-white">
                                                            <i class="fa-regular fa-folder-open px-0"></i>
                                                            <small><strong>Data Tabel - Akta Perusahaan</strong></small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <input type="hidden" name="get_data_akta" value="<?= base_url('monitoring_dokumen/get_data_akta') ?>">
                                                    <table id="get_data_akta" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:5%;"><small class="text-white">No</small></th>
                                                                <th style="width:10%;"><small class="text-white">Jenis Dokumen</small></th>
                                                                <th style="width:30%;"><small class="text-white">No. Surat</small></th>
                                                                <!-- <th style="width:20%;"><small class="text-white">Berlaku Sampai</small></th> -->
                                                                <th style="width:10%;"><small class="text-white">Status Validasi</small></th>
                                                                <th style="width:10%;">
                                                                    <div class="text-center">
                                                                        <small class="text-white">
                                                                            Ket. Validator
                                                                        </small>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody></tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-manajerial" role="tabpanel" aria-labelledby="nav-manajerial-tab">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header bg-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-white">
                                                            <i class="fa-regular fa-folder-open px-0"></i>
                                                            <small><strong>Data Tabel - Manajerial Perusahaan</strong></small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table id="example5" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:5%;"><small class="text-white">No</small></th>
                                                                <th style="width:10%;"><small class="text-white">Jenis Dokumen</small></th>
                                                                <th style="width:30%;"><small class="text-white">Nama</small></th>
                                                                <th style="width:20%;"><small class="text-white">NIK / Paspor</small></th>
                                                                <th style="width:10%;"><small class="text-white">Status Validasi</small></th>
                                                                <th style="width:10%;">
                                                                    <div class="text-center">
                                                                        <small class="text-white">
                                                                            Ket. Validator
                                                                        </small>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><small>Pemilik</small></td>
                                                                <td><small>Ahmad Fikri Z</small></td>
                                                                <td><small>1234567890123456</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-success">Sudah Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>Pengurus</small></td>
                                                                <td><small>Ahmad Fikri Z</small></td>
                                                                <td><small>1234567890123456</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-success">Sudah Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-pengalaman" role="tabpanel" aria-labelledby="nav-pengalaman-tab">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header bg-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-white">
                                                            <i class="fa-regular fa-folder-open px-0"></i>
                                                            <small><strong>Data Tabel - Pengalaman Perusahaan</strong></small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table id="example7" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:8%;"><small class="text-white">No. Kontrak</small></th>
                                                                <th style="width:8%;"><small class="text-white">Tgl. Kontrak</small></th>
                                                                <th style="width:28%;"><small class="text-white">Nama Pekerjaan</small></th>
                                                                <th style="width:9%;"><small class="text-white">Nilai (Rp.)</small></th>
                                                                <th style="width:9%;"><small class="text-white">Jenis Tender</small></th>
                                                                <th style="width:10%;"><small class="text-white">Instansi</small></th>
                                                                <th style="width:10%;"><small class="text-white">Lokasi</small></th>
                                                                <th style="width:8%;"><small class="text-white">
                                                                        <div class="text-center">Status Validasi</div>
                                                                    </small></th>
                                                                <th style="width:10%;"><small class="text-white">
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
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-pajak" role="tabpanel" aria-labelledby="nav-pajak-tab">
                                            <div class="card border-dark shadow-lg">
                                                <div class="card-header bg-dark d-flex bd-highlight">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <span class="text-white">
                                                            <i class="fa-regular fa-folder-open px-0"></i>
                                                            <small><strong>Data Tabel - Pajak</strong></small>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <table id="example8" class="table table-sm table-bordered table-striped">
                                                        <thead class="bg-secondary">
                                                            <tr>
                                                                <th style="width:20%;"><small class="text-white">Jenis Dokumen</small></th>
                                                                <th style="width:20%;"><small class="text-white">No. Surat</small></th>
                                                                <th style="width:20%;"><small class="text-white">Tanggal / Tahun</small></th>
                                                                <th style="width:10%;"><small class="text-white">Status Validasi</small></th>
                                                                <th style="width:10%;">
                                                                    <div class="text-center">
                                                                        <small class="text-white">
                                                                            More Options
                                                                        </small>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td><small>SPPKP</small></td>
                                                                <td><small>123456789</small></td>
                                                                <td><small>Seumur Hidup</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-success">Sudah Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>NPWP</small></td>
                                                                <td><small>123456789</small></td>
                                                                <td><small>Seumur Hidup</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-success">Sudah Tervalidasi</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>SPT</small></td>
                                                                <td><small>123456789</small></td>
                                                                <td><small>2021</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-danger">Tidak Valid</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><small>Neraca Keuangan</small></td>
                                                                <td><small>123456789</small></td>
                                                                <td><small>2021</small></td>
                                                                <td><small>
                                                                        <div class="text-center">
                                                                            <span class="badge bg-danger">Tidak Valid</span>
                                                                        </div>
                                                                    </small>
                                                                </td>
                                                                <td>
                                                                    <div class="text-center">
                                                                        <button type="button" class="btn btn-info btn-sm shadow-lg" data-bs-toggle="modal" data-bs-target="#modal-xl-pengalaman">
                                                                            <i class="fa-solid fa-users-viewfinder px-1"></i>
                                                                            <small>View</small>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>