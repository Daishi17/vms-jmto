<section class="content">

    <!-- Default box -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title">
                <span class="text-secondary">
                    <i class="fas fa-user-tag"></i>
                    <strong>SISTEM INFORMASI DATA REKANAN TERVALIDASI (SI-DRT)</strong>
                </span>
            </h5>
        </div>
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?php echo base_url(); ?>assets/template/frontend/dist/img/logo usaha.png" alt="User profile picture">
                            </div>
                            <h5 class="profile-username text-center text-sm">
                                <strong><?= $row_vendor['nama_usaha'] ?></strong>
                            </h5>
                            <p class="text-muted text-center">
                                <!-- Jasa Lainnya || Jasa Konsultasi || Jasa Pemborongan -->
                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                    <?php $kualifikasi = $this->M_dashboard->get_kualifikasi_izin($value); ?>
                                    <?php echo $kualifikasi['nama_jenis_usaha'] ?> <br>
                                <?php    } ?>
                            </p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kualifikasi Usaha</b> <a class="float-right"><?= $row_vendor['nama_kualifikasi'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>NPWP</b> <a class="float-right"> <?= $row_vendor['npwp'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?= $row_vendor['email'] ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status Dokumen</b>
                                    <a class="float-right">
                                        <span class="badge badge-danger">
                                            <strong>Belum Lengkap</strong>
                                        </span>
                                    </a>
                                </li>
                                <li class="list-group-item">
                                    <b>Status Tender Terundang</b>
                                    <a class="float-right">
                                        <span class="badge badge-warning">
                                            <strong>Belum Tervalidasi</strong>
                                        </span>
                                    </a>
                                </li>
                                </u>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title">
                                <span>
                                    <i class="fas fa-user-tag"></i>
                                    <strong>Informasi Usaha / Perorangan</strong>
                                </span>
                            </h5>
                        </div>
                        <div class="card-body">
                            <form>
                                <table class="table table-bordered table-sm">
                                    <tr>
                                        <th class="col-sm-3 bg-light">
                                            Bentuk Usaha
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-building mr-2"></i>
                                            <?= $row_vendor['bentuk_usaha'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Alamat
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-road mr-2"></i>
                                            <?= $row_vendor['alamat'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Provinsi
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-map mr-2"></i>
                                            <?= $row_vendor['nama_provinsi'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Kabupaten / Kota
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-map-signs mr-2"></i>
                                            <?= $row_vendor['nama_kabupaten'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Kecamatan
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-route mr-2"></i>
                                            <?= $row_vendor['nama_kecamatan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Kelurahan
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-map-marker-alt mr-3"></i>
                                            <?= $row_vendor['kelurahan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Kode Pos
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-map-pin mr-3"></i>
                                            <?= $row_vendor['kode_pos'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Kontak
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-phone-alt mr-2"></i>
                                            <?= $row_vendor['no_telpon'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Kantor Cabang
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-laptop-house mr-2"></i>
                                            <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                <?= $row_vendor['alamat_kantor_cabang'] ?>
                                            <?php  } else { ?>
                                                Tidak Ada
                                            <?php   }   ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            Alamat Kantor Cabang
                                        </th>
                                        <td class="col-sm-10">
                                            <i class="fas fa-laptop-house mr-2"></i>
                                            <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                <?= $row_vendor['alamat_kantor_cabang'] ?>
                                            <?php  } else { ?>
                                                -
                                            <?php   }   ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="col-sm-2 bg-light">
                                            <span class="text-info">More Options</span>
                                        </th>
                                        <td class="col-sm-10">
                                            <span type="button" class="badge badge-info">
                                                <strong>
                                                    <a href="<?= base_url('datapenyedia/identitas_perusahaan') ?>" class="nav-link">
                                                        <span class="text-white"><i class="fas fa-edit mr-2"></i>Edit Changes</span>
                                                    </a>
                                                </strong>
                                            </span>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card card-danger card-outline">
                <div class="card-header">
                    <h5 class="card-title">
                        <span>
                            <i class="fas fa-chart-pie"></i>
                            <strong>Informasi Grafis Rekanan</strong>
                        </span>
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="far fa-envelope"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Dokumen Tervalidasi</strong></span>
                                    <span class="info-box-text text-danger"><strong>8 / 10</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="fas fa-percentage"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Penilaian Kinerja</strong></span>
                                    <span class="info-box-text"><strong>0</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-bullhorn"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Tender Yang di Ikuti</strong></span>
                                    <span class="info-box-text text-success"><strong>0</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary"><i class="fas fa-marker"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text"><strong>Tender Berkontrak</strong></span>
                                    <span class="info-box-text text-primary"><strong>0</strong></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->