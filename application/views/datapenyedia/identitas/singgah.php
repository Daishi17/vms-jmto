<!-- Main content -->
<section class="content">
    <input type="hidden" name="url_provinsi" value="<?= base_url('registrasi/dataKabupaten/') ?>">
    <input type="hidden" name="url_kabupaten" value="<?= base_url('registrasi/dataKecamatan/') ?>">
    <!-- Default box -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <i class="fas fa-building mr-2"></i>
            <strong>Identitas Perusahan</strong>
        </div>
        <form>
            <div class="card-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <i class="fas fa-file-alt mr-2"></i>
                        Form Identitas Perusahan
                        <div class="card-tools">
                            <button type="button" class="btn btn-block btn-warning btn-sm">
                                <i class="fas fa-edit mr-2"></i>
                                Edit Changes
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-bordered">
                            <tr>
                                <td class="col-sm-2 bg-light">
                                    <label for="#" class="col-sm-12 col-form-label">
                                        Jenis Usaha
                                    </label>
                                </td>
                                <td class="col-sm-3">
                                    <div class="col-sm-12">
                                        <a href="javascript:;" onclick="m_jenis_usaha()" class="btn btn-sm btn-info btn-block"> <i class="fas fa-city"></i> &nbsp; View Jenis Usaha</a>
                                        <!-- <select class="select2bs4" name="jenis_usaha[]" multiple data-placeholder="Pilih Jenis Usaha" style="width: 100%;">
                                            <?php foreach ($get_jenis_usaha as $key => $value) { ?>
                                                <option value="<?= $value['id_jenis_usaha'] ?>"><?= $value['nama_jenis_usaha'] ?></option>
                                            <?php } ?>
                                        </select> -->
                                    </div>
                                </td>
                                <td class="col-sm-3 bg-light">
                                    <label for="#" class="col-sm-10 col-form-label">
                                        Nama Usaha / Perorangan
                                    </label>
                                </td>
                                <td class="col-sm-4">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-city"></i></span>
                                            </div>
                                            <input type="text" name="nama_usaha" value="<?= $row_vendor['nama_usaha'] ?>" class="form-control form-control-sm" placeholder="Kreatif Intelegensi Teknologi" readonly>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-sm-1 bg-light">
                                    <label for="#" class="col-sm-12 col-form-label">
                                        <span>Bentuk Usaha</span>
                                    </label>
                                </td>
                                <td class="col-sm-3">
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-th"></i></span>
                                            </div>
                                            <select name="bentuk_usaha" class="custom-select rounded-11 text-sm" id="exampleSelectRounded11">
                                                <option value="<?= $row_vendor['bentuk_usaha'] ?>"><?= $row_vendor['bentuk_usaha'] ?></option>
                                                <option>Perseroan Terbatas (PT)</option>
                                                <option>Commanditaire Vennootschap (CV)</option>
                                                <option>Firma</option>
                                                <option>Perorangan</option>
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-sm-2 bg-light">
                                    <label for="#" class="col-sm-10 col-form-label">
                                        Kualifikasi Usaha
                                    </label>
                                </td>
                                <td class="col-sm-4">
                                    <div class="col-sm-8">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                            </div>
                                            <select name="kualifikasi_usaha" class="custom-select rounded-1 text-sm" id="exampleSelectRounded1" readonly>
                                                <option value="<?= $row_vendor['kualifikasi_usaha'] ?>"><?= $row_vendor['kualifikasi_usaha'] ?></option>
                                                <option>Usaha Besar</option>
                                                <option>Usaha Menengah</option>
                                                <option>Usaha Kecil (Mikro UMKM)</option>
                                            </select>
                                        </div>
                                    </div>
                    </div>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                NPWP
                            </label>
                        </td>
                        <td class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" value="<?= $row_vendor['npwp'] ?>" placeholder="95.725.637.3-411.000" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask readonly>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-2 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Email
                            </label>
                        </td>
                        <td class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                                    </div>
                                    <input type="email" value="<?= $row_vendor['email'] ?>" class="form-control form-control-sm" placeholder="kreatifintelegnsi@gmail.com" readonly>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Alamat
                            </label>
                        </td>
                        <td class="col-sm-11" colspan="3">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-road"></i></span>
                                    </div>
                                    <textarea type="text" class="form-control form-control-sm" readonly> <?= $row_vendor['alamat'] ?> </textarea>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Provinsi
                            </label>
                        </td>
                        <td class="col-sm-3">
                            <div class="col-sm-12">
                                <select name="id_provinsi" required id="provinsitambah" class="form-control select2bs4" disabled>
                                    <option value="<?= $row_vendor['id_provinsi'] ?>"><?= $row_vendor['nama_provinsi'] ?></option>
                                    <?php foreach ($provinsi as $key => $value) { ?>
                                        <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                    <?php  } ?>
                                </select>
                            </div>
                        </td>
                        <td class="col-sm-2 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Kabupaten / Kota
                            </label>
                        </td>
                        <td class="col-sm-4">
                            <div class="col-sm-12">
                                <select name="id_kabupaten" required id="kabupatentambah" class="form-control select2bs4" disabled>
                                    <option value="<?= $row_vendor['id_kabupaten'] ?>"><?= $row_vendor['nama_kabupaten'] ?></option>
                                    <option value="">Pilih Kabupaten</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Kecamatan
                            </label>
                        </td>
                        <td class="col-sm-3">
                            <div class="col-sm-12">
                                <select name="id_kecamtan" required id="kecamatantambah" class="form-control select2bs4" disabled>
                                    <option value="<?= $row_vendor['id_kecamatan'] ?>"><?= $row_vendor['nama_kecamatan'] ?></option>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                        </td>
                        <td class="col-sm-2 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Kelurahan
                            </label>
                        </td>
                        <td class="col-sm-4">
                            <div class="col-sm-12">
                                <input type="text" required value="<?= $row_vendor['kelurahan'] ?>" name="kelurahan" placeholder="Nama Kelurahan..." class="form-control">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Kode Pos
                            </label>
                        </td>
                        <td class="col-sm-3">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                    </div>
                                    <input type="text" name="kode_pos" value="<?= $row_vendor['kode_pos'] ?>" class="form-control form-control-sm" placeholder="15310" data-inputmask='"mask": "99999"' data-mask readonly>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-2 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Nomor Kontak
                            </label>
                        </td>
                        <td class="col-sm-4">
                            <div class="col-sm-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                                    </div>
                                    <input type="text" name="no_telpon" value="<?= $row_vendor['no_telpon'] ?>" class="form-control form-control-sm" placeholder="08118333433" readonly>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Kantor Cabang
                            </label>
                        </td>
                        <td class="col-sm-2">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-laptop-house"></i></span>
                                    </div>
                                    <select name="sts_kantor_cabang" class="custom-select rounded-0 text-sm" id="exampleSelectRounded0" readonly>
                                        <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                            <option value="<?= $row_vendor['sts_kantor_cabang'] ?>">
                                                <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                    Ada
                                                <?php   } else { ?>
                                                    Tidak Ada
                                                <?php  }
                                                ?>
                                            </option>
                                            <option value="1">Ada</option>
                                            <option value="2">Tidak Ada</option>
                                        <?php   } else { ?>
                                            <option value="<?= $row_vendor['sts_kantor_cabang'] ?>">
                                                <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                    Ada
                                                <?php   } else { ?>
                                                    Tidak Ada
                                                <?php  }
                                                ?>
                                            </option>
                                            <option value="1">Ada</option>
                                            <option value="2">Tidak Ada</option>
                                        <?php  }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-2 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Alamat Kantor Cabang
                            </label>
                        </td>
                        <td class="col-sm-4">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-laptop-house"></i></span>
                                    </div>
                                    <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                        <textarea name="alamat_kantor_cabang" type="text" class="form-control form-control-sm"><?= $row_vendor['alamat_kantor_cabang'] ?></textarea>
                                    <?php   } else { ?>
                                        <textarea name="alamat_kantor_cabang" readonly type="text" class="form-control form-control-sm"></textarea>
                                    <?php  }
                                    ?>

                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-sm-1 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                User Id
                            </label>
                        </td>
                        <td class="col-sm-3">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-sm" value="<?= $row_vendor['email'] . ' || ' . $row_vendor['npwp'] ?>" placeholder="Email || NPWP" readonly>
                                </div>
                            </div>
                        </td>
                        <td class="col-sm-2 bg-light">
                            <label for="#" class="col-sm-12 col-form-label">
                                Password
                            </label>
                        </td>
                        <td class="col-sm-4">
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                                    </div>
                                    <input type="password" name="password" value="<?= $row_vendor['password'] ?>" id="myInput" class="form-control" readonly>
                                    <div class="input-group-prepend" style="display:none;">
                                        <span class="input-group-text"> <a href="javascript:;" onclick="myFunction()"><i class="text-navy fas fa fa-eye"></i></a></span>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <button type="button" class="btn btn-success btn-sm" readonly>
                        <i class="fas fa-save mr-2"></i>
                        Save Changes
                    </button>
                    <button type="button" class="btn btn-danger btn-sm">
                        <i class="fas fa-ban mr-2"></i>
                        Cancel
                    </button>
                </div>
            </div>
    </div>
    <!-- /.card-body -->
    </form>
    </div>
    <!-- /.card -->
    <div class="modal fade" id="modal-lg-jenis">
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
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <i class="fas fa-building"></i>
                            <span class="text-secondary">
                                <strong>Kreatif Intelegensi Teknologi</strong>
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
                                            <label for="inputKode" class="col-sm-10  col-form-label">Jenis Usaha</label>
                                        </td>
                                        <td class="col-mb-2">
                                            <div class="col-sm-12">
                                                <select class="form-control select2bs4" style="width: 100%;">
                                                    <option selected="selected">Jasa Lainnya</option>
                                                    <option>Jasa Pemborongan</option>
                                                    <option>Jasa Konsultasi</option>
                                                    <option>Jasa Konstruksi</option>
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
                                                <th>Jenis Usaha</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Jasa Lain</td>
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
                                                <td>Jasa Konsultasi</td>
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
                                                <td>Jasa Pemborongan</td>
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