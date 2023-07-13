    <!-- Main content -->
    <?php if (!$this->session->userdata('npwp') && !$this->session->userdata('email')) {
        redirect('registrasi');
    }
    ?>
    <?php if ($token_regis == $this->session->userdata('token_regis')) { ?>
    <input type="hidden" required name="url_kabupaten" value="<?= base_url('wilayah/dataKabupaten/') ?>">
    <input type="hidden" required name="url_kecamatan" value="<?= base_url('wilayah/dataKecamatan/') ?>">
    <input type="hidden" name="url_provinsi" value="<?= base_url('registrasi/dataKabupaten/') ?>">
    <input type="hidden" name="url_kecamatan" value="<?= base_url('registrasi/dataKecamatan/') ?>">
    <section class="content">
        <div class="container">
            <!-- Default box -->
            <div class="card card-outline card-primary text-sm">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-city mr-2"></i>
                        <strong>Identitas Perusahaan / Individu</strong>
                    </h4>
                </div>
                <?php if ($this->session->flashdata('password2')) {
                    echo '  <div class="alert alert-warning alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>';
                    echo  $this->session->flashdata('password2');
                    echo ' </div>';
                } ?>
                <?php if ($this->session->flashdata('success')) {
                    echo '  <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>';
                    echo  $this->session->flashdata('success');
                    echo ' </div>';
                } ?>
                <div class="card-body">
                    <div class="card card-primary text-sm">
                        <div class="card-header">
                            <h6 class="card-title">
                                <i class="fab fa-wpforms mr-2"></i>
                                Form Input Identitas Perusahaan / Individu
                            </h6>
                        </div>
                        <form action="<?= base_url('registrasi/add_identitas') ?>" method="post">
                            <div class="card-body">
                                <div class="callout callout-danger text-sm">
                                    <i class="fas fa-info"></i>
                                    <strong>Catatan:</strong>
                                    <div class="text-sm">
                                        <span class="text-primary">
                                            1. Semua inputan form identitas wajib di isi, terkecuali alamat kantor cabang jika tidak terdapat kantor cabang <br>
                                            2. Untuk inputan NPWP dan Email sudah automatis terisi sesuai dengan isian registrasi awal.
                                        </span>
                                    </div>
                                </div>
                                <table class="table table-sm">
                                    <tr class="col-sm-12">
                                        <td class="col-sm-4">
                                            <select required class="select2bs4" name="jenis_usaha[]" multiple data-placeholder="Pilih Jenis Usaha" style="width: 100%;">
                                                <?php foreach ($get_jenis_usaha as $key => $value) { ?>
                                                    <option value="<?= $value['id_jenis_usaha'] ?>"><?= $value['nama_jenis_usaha'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </td>
                                        <td class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                                </div>
                                                <input type="text" required class="form-control" name="nama_usaha" placeholder="Alamat Perusahaan / Individu">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12">
                                        <td class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                </div>
                                                <select required name="bentuk_usaha" class="form-control">
                                                    <option>Pilih Bentuk Usaha...</option>
                                                    <option value="Perseroan Terbatas (PT)">Perseroan Terbatas (PT)</option>
                                                    <option value="Commanditaire Vennootschap (CV)">Commanditaire Vennootschap (CV)</option>
                                                    <option value="Firma">Firma</option>
                                                    <option value="Individu">Individu</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                </div>
                                                <select required name="kualifikasi_usaha" class="form-control">
                                                    <option>Pilih Kualifikasi Usaha...</option>
                                                    <option value="Besar">Besar</option>
                                                    <option value="Menengah">Menengah</option>
                                                    <option value="Kecil">Kecil</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12">
                                        <td class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                </div>
                                                <input type="text" required class="form-control" name="npwp" value="<?= $this->session->userdata('npwp') ?>" data-inputmask='"mask": "99.999.999.9-999.999"' readonly data-mask>
                                            </div>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                                                </div>
                                                <input type="email" required class="form-control" name="email" value="<?= $this->session->userdata('email') ?>" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12">
                                        <td class="col-sm-12" colspan="2">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                </div>
                                                <textarea type="text" required name="alamat" class="form-control" placeholder="Alamat Lengkap ..."></textarea>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12">
                                        <td class="col-sm-4">
                                            <select name="id_provinsi" required id="provinsitambah" class="form-control select2bs4">
                                                <option value="">Plih Provinsi </option>
                                                <?php foreach ($provinsi as $key => $value) { ?>
                                                    <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </td>
                                        <td class="col-sm-4">
                                            <select name="id_kabupaten" required id="kabupatentambah" class="form-control select2bs4">
                                                <option value="">Pilih Kabupaten</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12">
                                        <td class="col-sm-4">
                                            <select  name="id_kecamatan" required id="kecamatantambah" class="form-control select2bs4">
                                                <option value="">Pilih Kecamatan</option>
                                            </select>
                                        </td>
                                        <td class="col-sm-4">
                                            <input type="text" required name="kelurahan" placeholder="Nama Kelurahan..." class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-pin"></i></span>
                                                </div>
                                                <input type="text" required name="kode_pos" maxlength="5" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Kode Pos">
                                            </div>
                                        </td>
                                        <td class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                                </div>
                                                <input type="text" required maxlength="13" name="no_telpon" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Nomor Kontak">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12">
                                        <td class="col-sm-4">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-th-list"></i></span>
                                                </div>
                                                <select required onchange="Kantor_cabang()" name="sts_kantor_cabang" class="form-control">
                                                    <option>Kantor Cabang...</option>
                                                    <option value="1">Ya</option>
                                                    <option value="2">Tidak</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-road"></i></span>
                                                </div>
                                                <input required type="text" name="alamat_kantor_cabang" class="form-control" placeholder="Alamat Kantor Cabang">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                                </div>
                                                <input type="text" required name="password" class="form-control" placeholder="Buat Password">
                                            </div>
                                        </td>
                                        <td class="col-sm-6">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input required name="password2" type="text" class="form-control" placeholder="Konfirmasi Password">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-6">
                                            <div class="custom-control custom-checkbox">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <input type="checkbox" id="check_terima_identittas" onclick="Terima_identitas()">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label>Saya menyetujui persyaratan layanan.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                            </div>
                            <td class="col-sm-6">
                                <center>
                                    <?php echo $widget; ?>
                                    <?php echo $script; ?>
                                    <br>
                                </center>
                            </td>
                    </div>
                    </tr>
                    </table>
                    <div class="card-footer">
                        <button type="submit" id="button_save" class="btn btn-primary disabled">
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
        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div>

    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php } else { ?>
      <?php  $this->load->view('notfound'); ?>
    <?php   }
    ?>