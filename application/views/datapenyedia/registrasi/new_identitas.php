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
    <main class="container-fluid">
        <div class="row">
            <div class="col">
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
               <h5><i class="icon fas fa-exclamation-triangle"></i> Selamat!</h5>';
                    echo  $this->session->flashdata('success');
                    echo ' </div>';
                } ?>
                <div class="card border-dark">
                    <div class="card-header swatch-purple border-dark">
                        <h6 class="card-title">
                            <span class="text-white">
                                <i class="fas fa-user-tag"></i>
                                <small><strong>Elektronik - Form Data Rekanan Tervalidasi</strong></small>
                            </span>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('registrasi/add_identitas') ?>" method="post">
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <select required class="select2" multiple="multiple" name="jenis_usaha[]" data-placeholder="Pilih Jenis Usaha" style="width: 100%;">
                                        <?php foreach ($get_jenis_usaha as $key => $value) { ?>
                                            <option value="<?= $value['id_jenis_usaha'] ?>"><?= $value['nama_jenis_usaha'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-city"></i></span>
                                        <input type="text" required class="form-control" name="nama_usaha" placeholder="Nama Perusahaan / Individu">

                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                        <select class="form-select" required name="bentuk_usaha" aria-label="Default select example">
                                            <option>Pilih Bentuk Usaha...</option>
                                            <option value="Perseroan Terbatas (PT)">Perseroan Terbatas (PT)</option>
                                            <option value="Commanditaire Vennootschap (CV)">Commanditaire Vennootschap (CV)</option>
                                            <option value="Firma">Firma</option>
                                            <option value="Individu">Individu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-bars"></i></span>
                                        <select required name="kualifikasi_usaha" class="form-select" aria-label="Default select example">
                                            <option>Pilih Kualifikasi Usaha...</option>
                                            <option value="Besar">Besar</option>
                                            <option value="Menengah">Menengah</option>
                                            <option value="Kecil">Kecil</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-1 mb-2">
                                <div class="col-sm-12">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                        <input required type="text" class="form-control" name="alamat" placeholder="Alamat Perusahaan / Individu">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-building-columns"></i></span>
                                        <select required name="id_provinsi" required id="provinsitambah" class="form-control select2" style="width: 600px;">
                                            <option value="">Plih Provinsi </option>
                                            <?php foreach ($provinsi as $key => $value) { ?>
                                                <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                            <?php  } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-map-location-dot"></i></span>
                                        <select name="id_kabupaten" required id="kabupatentambah" class="form-control select2" style="width: 590px;">
                                            <option value="">Pilih Kabupaten</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                        <select required name="id_kecamatan" required id="kecamatantambah" class="form-control select2" style="width: 600px;">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-signs-post"></i></span>
                                        <input type="text" required name="kelurahan" placeholder="Nama Kelurahan..." class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-location-crosshairs"></i></span>
                                        <input type="number" required name="kode_pos" maxlength="5" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="Kode Pos">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                                        <input type="text" required maxlength="13" name="no_telpon" class="form-control" onkeypress="return hanyaAngka(event)" placeholder="No. Kontak">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                        <select required onchange="Kantor_cabang()" name="sts_kantor_cabang" class="form-select">
                                            <option>Kantor Cabang </option>
                                            <option value="1">Ya</option>
                                            <option value="2">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                        <input type="text" required name="alamat_kantor_cabang" readonly class="form-control" placeholder="Alamat Kantor Cabang">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                        <input type="email" required class="form-control" name="email" value="<?= $this->session->userdata('email') ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-regular fa-credit-card"></i></span>
                                        <input type="text" required class="form-control" name="npwp" value="<?= $this->session->userdata('npwp') ?>" data-inputmask='"mask": "99.999.999.9-999.999"' readonly data-mask>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <div class="input-group-text">
                                            <input type="checkbox" id="check_terima_identittas" onclick="Terima_identitas()">
                                        </div>
                                        <input type="text" class="form-control" value="Saya setuju dengan syarat dan ketentuan yang berlaku." aria-label="Text input with checkbox" disabled readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex justify-content-center">
                                        <center>
                                            <?php echo $widget; ?>
                                            <?php echo $script; ?>
                                            <br>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-2 mb-2">
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-keyboard"></i></span>
                                        <input required type="password" onkeyup="password_validation()" id="passwordlihat1" name="password" class="form-control" placeholder="Buat Password">
                                        <a class="btn btn-outline-secondary" onclick="myFunction1()" href="javascript:;"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-key"></i></span>
                                        <input required name="password2" id="passwordlihat2" onkeyup="conform()" type="password" class="form-control" placeholder="Konfirmasi Password">
                                        <a class="btn btn-outline-secondary" onclick="myFunction2()" href="javascript:;"><i class="fa-solid fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <small id="besar">Sertakan Huruf Besar</small><br>
                                            <small id="kecil">Sertakan Huruf Kecil</small><br>
                                            <small id="simbol">Sertakan Sepesial Simbol</small><br>
                                            <small id="angka">Sertakan Angka</small><br>
                                            <small id="panjang">Panjang 8 Karakter</small>
                                        </div>
                                        <div class="col-md-4"><br>
                                            <br>
                                            <div class="row align-items-start">
                                                <div class="col-auto">
                                                    <button type="submit" id="button_save" style="display: none;" class="btn btn-primary disabled">
                                                        <i class="fa-solid fa-registered px-1"></i>
                                                        Registrasi
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?php } else { ?>
    <?php $this->load->view('notfound'); ?>
<?php   }
?>