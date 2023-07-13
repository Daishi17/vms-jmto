<main class="container-fluid" style="margin-top: 30px;">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-transparent border-primary">
                    <h6 class="card-title">
                        <span class="text-secondary">
                            <i class="fas fa-user-tag"></i>
                            <small><strong>Elektronik Data Rekanan Tervalidasi (E-DRT)</strong></small>
                        </span>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <div class="card border-primary shadow-lg">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img src="<?php echo base_url(); ?>/assets/brand/logo usaha.png" alt="mdo" width="160" height="120" class="rounded-circle shadow-lg">
                                    </div>
                                    <h6 class="profile-username text-center text-sm">
                                        <small><strong><?= $row_vendor['nama_usaha'] ?></strong></small>
                                    </h6>
                                    <p class="text-muted text-center">
                                        <small>
                                            <?php foreach ($kualifikasi as $key => $value) { ?>
                                                <?php $kualifikasi = $this->M_dashboard->get_kualifikasi_izin($value); ?>
                                                <?php echo $kualifikasi['nama_jenis_usaha'] ?> <br>
                                            <?php    } ?>
                                        </small>
                                    </p><br>
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kualifikasi Usaha</small>
                                            </th>
                                            <td class="text-end">
                                                <small class="text-primary"><?= $row_vendor['kualifikasi_usaha'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>NPWP</small>
                                            </th>
                                            <td class="text-end">
                                                <small class="text-primary"><?= $row_vendor['npwp'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Email</small>
                                            </th>
                                            <td class="text-end">
                                                <small class="text-primary"><?= $row_vendor['email'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Status Dokumen</small>
                                            </th>
                                            <?php
                                            if ($count_validate == 18) { ?>
                                                <td class="text-end">
                                                    <small><span class="badge bg-success">Sudah Valid</span></small>
                                                </td>

                                            <?php } else { ?>
                                                <td class="text-end">
                                                    <small><span class="badge bg-danger">Belum Lengkap</span></small>
                                                </td>
                                            <?php  }  ?>

                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Tender Terundang</small>
                                            </th>
                                            <?php
                                            if ($row_vendor['sts_terundang'] == 1) { ?>
                                                <td class="text-end">
                                                    <small><span class="badge bg-success">Sudah Tervalidasi</span></small>
                                                </td>
                                            <?php } else { ?>
                                                <td class="text-end">
                                                    <small><span class="badge bg-secondary">Belum Tervalidasi</span></small>
                                                </td>
                                            <?php  }  ?>

                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card border-primary shadow-lg">
                                <div class="card-header"><small class="text-primary"><b><i class="fa-solid fa-address-card px-1"></i>Profil Perusahaan</b></small></div>
                                <div class="card-body">
                                    <table class="table table-bordered table-sm">
                                        <tr>
                                            <th class="bg-light">
                                                <small>Bentuk Usaha</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-building px-2"></i>
                                                <small> <?= $row_vendor['bentuk_usaha'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Alamat</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-road px-1"></i>
                                                <small> <?= $row_vendor['alamat'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small><?= $row_vendor['nama_provinsi'] ?></small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-landmark px-1"></i>
                                                <small>Banten</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kabupaten/Kota</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-tree-city px-1"></i>
                                                <small> <?= $row_vendor['nama_kabupaten'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kecamatan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-map px-1"></i>
                                                <small> <?= $row_vendor['nama_kecamatan'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kelurahan</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-signs-post px-1"></i>
                                                <small> <?= $row_vendor['kelurahan'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kode Pos</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-location-dot px-1"></i>
                                                <small> <?= $row_vendor['kode_pos'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>No. Kontak</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-phone-volume px-1"></i>
                                                <small> <?= $row_vendor['no_telpon'] ?></small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light">
                                                <small>Kantor Cabang</small>
                                            </th>
                                            <td>
                                                <i class="fa-solid fa-house px-1"></i>
                                                <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                    <?= $row_vendor['alamat_kantor_cabang'] ?>
                                                <?php  } else { ?>
                                                    <small>Tidak Ada</small>
                                                <?php   }   ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="bg-light" colspan="2">
                                                <a href="<?= base_url('datapenyedia/identitas_perusahaan') ?>">
                                                    <button type="button" class="btn btn-warning btn-sm">
                                                        <i class="fa-solid fa-pen-to-square px-1"></i>
                                                        Edit Changes
                                                    </button>
                                                </a>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card border-danger shadow-lg">
                            <div class="card-header"><small class="text-danger"><b>
                                        <i class="fa-solid fa-chart-simple px-1"></i>
                                        Info Grafik Rekanan</b></small>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">

                                            <?php if ($count_validate == 18) { ?>
                                                <div class="card-body bg-success">
                                                    <div class="text-start">
                                                        <i class="fa-solid fa-envelope fa-beat fa-2xl"></i>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5>
                                                            <input type="hidden" name="count_validate" value="<?= base_url('dashboard/count_validate') ?>">
                                                            <small class="text-white"><b id="count_validate"><?= $count_validate ?>/18</b></small>
                                                        </h5>
                                                        <small class="text-white"><b>Dokumen Yang Tervalidasi</b></small>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="card-body bg-danger">
                                                    <div class="text-start">
                                                        <i class="fa-solid fa-envelope fa-beat fa-2xl"></i>
                                                    </div>
                                                    <div class="text-end">
                                                        <h5>
                                                            <input type="hidden" name="count_validate" value="<?= base_url('dashboard/count_validate') ?>">
                                                            <small class="text-white"><b id="count_validate"><?= $count_validate ?>/18</b></small>
                                                        </h5>
                                                        <small class="text-white"><b>Dokumen Yang Tervalidasi</b></small>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small>Informasi Lebih Lanjut</small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">
                                            <div class="card-body bg-warning">
                                                <div class="text-start">
                                                    <i class="fa-solid fa-paper-plane fa-spin fa-2xl"></i>
                                                </div>
                                                <div class="text-end">
                                                    <h5>
                                                        <small class="text-dark"><b>0</b></small>
                                                    </h5>
                                                    <small class="text-dark"><b>Tender Terundang</b></small>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small> Informasi Lebih Lanjut </small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">
                                            <div class="card-body bg-success">
                                                <div class="text-start">
                                                    <i class="fa-solid fa-fax fa-flip fa-2xl"></i>
                                                </div>
                                                <div class="text-end">
                                                    <h5>
                                                        <small class="text-white"><b>0</b></small>
                                                    </h5>
                                                    <small class="text-white"><b>Penilaian Kinerja</b></small>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small> Informasi Lebih Lanjut </small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-6">
                                        <div class="card shadow-lg" style="width: 18rem;">
                                            <div class="card-body bg-primary">
                                                <div class="text-start">
                                                    <i class="fa-solid fa-certificate fa-bounce fa-2xl"></i>
                                                </div>
                                                <div class="text-end">
                                                    <h5>
                                                        <small class="text-white"><b>0</b></small>
                                                    </h5>
                                                    <small class="text-white"><b>Tender Berkontrak</b></small>
                                                </div>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <a href="#" class="small-box-footer">
                                                    <small> Informasi Lebih Lanjut </small> <i class="fas fa-arrow-circle-right"></i>
                                                </a>
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
<br>