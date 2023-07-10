<input type="hidden" name="url_simpan_identitas_vendor" value="<?= base_url('datapenyedia/simpan_penyedia') ?>">
<input type="hidden" name="url_kabupaten" value="<?= base_url('wilayah/dataKecamatan/') ?>">
<input type="hidden" name="url_provinsi" value="<?= base_url('registrasi/dataKabupaten/') ?>">
<main class="container-fluid mt-4">
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
                        <small>1. Klik tombol <b>Edit Changes</b> untuk mengubah data identitas perusahaan</small><br>
                        <small>2. Perubahan data identitas akan berhasil berubah jika sudah diverifikasi oleh pihak validator.</small><br>
                        <small>3. Data <b>NPWP</b> dan <b>Email</b> tidak dapat di ubah, dikarenakan itu adalah data register rekanan.</small>
                    </div>
                    <div class="card border-danger shadow-lg">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <small class="text-primary">
                                <b><i class="fa-solid fa-address-card px-1"></i>
                                    Identitas Perusahaan
                                </b>
                            </small>
                            <!-- <button type="button" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-pen-to-square px-1"></i>
                                Edit Changes
                            </button> -->
                        </div>
                        <form id="simpan_identitas_vendor"  method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <table class="table table-sm">
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Jenis Usaha</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <select id="multiple" class="js-states form-control" multiple name="jenis_usaha[]" style="width: 100%;">
                                                    <?php foreach ($get_jenis_usaha as $key => $value) { ?>
                                                        <option value="<?= $value['id_jenis_usaha'] ?>"><?= $value['nama_jenis_usaha'] ?></option>
                                                    <?php } ?>
                                                </select>
                                                <?php foreach ($kualifikasi as $key => $value) { ?>
                                                    <?php $kualifikasi = $this->M_dashboard->get_kualifikasi_izin($value); ?>
                                                    <?php echo $kualifikasi['nama_jenis_usaha'] ?> -
                                                <?php    } ?>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-sm-12 col-form-label-sm"><b>Nama Usaha/Individu</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-building-flag"></i></span>
                                                    <input type="text" name="nama_usaha" class="form-control" value="<?= $row_vendor['nama_usaha'] ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Bentuk Usaha</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-10">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                                    <select name="bentuk_usaha" class="form-select" aria-label="Default select example">
                                                        <option value="<?= $row_vendor['bentuk_usaha'] ?>"><?= $row_vendor['bentuk_usaha'] ?></option>
                                                        <option value="Perseroan Terbatas (PT)">Perseroan Terbatas (PT)</option>
                                                        <option value="Commanditaire Vennootschap (CV)">Commanditaire Vennootschap (CV)</option>
                                                        <option value="Firma">Firma</option>
                                                        <option value="Individu WNI">Individu WNI</option>
                                                        <option value="Individu WNA">Individu WNA</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-sm-12 col-form-label-sm"><b>Kualifikasi Usaha</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-10">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-angles-right"></i></span>
                                                    <select name="kualifikasi_usaha" class="form-select" aria-label="Default select example">
                                                        <option value="<?= $row_vendor['kualifikasi_usaha'] ?>"><?= $row_vendor['kualifikasi_usaha'] ?></option>
                                                        <option>Besar - (B3)</option>
                                                        <option>Besar - (B2)</option>
                                                        <option>Besar - (B1)</option>
                                                        <option>Menengah - (M3)</option>
                                                        <option>Menengah - (M2)</option>
                                                        <option>Menengah - (M1)</option>
                                                        <option>Kecil - (K3)</option>
                                                        <option>Kecil - (K2)</option>
                                                        <option>Kecil - (K1)</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>NPWP</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                                    <input type="text" class="form-control" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask value="<?= $row_vendor['npwp'] ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Email</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-8">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                                    <input type="text" class="form-control" value="<?= $row_vendor['email'] ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Alamat</b></label>
                                        </td>
                                        <td class="col-sm-11" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                    <textarea name="alamat" type="text" class="form-control form-control-sm"> <?= $row_vendor['alamat'] ?> </textarea>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Provinsi</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-10">
                                                <select name="id_provinsi" required id="provinsitambah" class="form-control select2bs4">
                                                    <option value="<?= $row_vendor['id_provinsi'] ?>"><?= $row_vendor['nama_provinsi'] ?></option>
                                                    <?php foreach ($provinsi as $key => $value) { ?>
                                                        <option value="<?= $value['id_provinsi'] ?>"><?= $value['nama_provinsi'] ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kabupaten/Kota</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-10">
                                                <select name="id_kabupaten" required id="kabupatentambah" class="form-control select2bs4">
                                                    <option value="<?= $row_vendor['id_kabupaten'] ?>"><?= $row_vendor['nama_kabupaten'] ?></option>
                                                    <option value="">Pilih Kabupaten</option>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kecamatan</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-10">
                                                <select  id="kecamatantambah"  name="id_kecamatan" class="form-control select2bs4">
                                                    <option value="<?= $row_vendor['id_kecamatan'] ?>"><?= $row_vendor['nama_kecamatan'] ?></option>
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kelurahan</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-signs-post"></i></span>
                                                    <input type="text" required value="<?= $row_vendor['kelurahan'] ?>" name="kelurahan" placeholder="Nama Kelurahan..." class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kode Pos</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-4">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                                    <input name="kode_pos" type="number" class="form-control" value="<?= $row_vendor['kode_pos'] ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-2 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Nomor Kontak</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-5">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-phone-volume"></i></span>
                                                    <input name="no_telpon" type="number" class="form-control" value="<?= $row_vendor['no_telpon'] ?>">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Kantor Cabang</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-4">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-arrow-right-to-city"></i></span>
                                                    <select name="sts_kantor_cabang" class="form-select" aria-label="Default select example">
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
                                            <label class="form-label col-form-label-sm"><b>Alamat Cabang</b></label>
                                        </td>
                                        <td class="col-sm-4">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-road"></i></span>
                                                    <?php if ($row_vendor['sts_kantor_cabang'] == 1) { ?>
                                                        <textarea name="alamat_kantor_cabang" type="text" class="form-control form-control-sm"><?= $row_vendor['alamat_kantor_cabang'] ?></textarea>
                                                    <?php   } else { ?>
                                                        <textarea name="alamat_kantor_cabang" type="text" class="form-control form-control-sm"></textarea>
                                                    <?php  }
                                                    ?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-sm-1 bg-light">
                                            <label class="form-label col-form-label-sm"><b>Alasan Perubahan</b></label>
                                        </td>
                                        <td class="col-sm-11" colspan="3">
                                            <div class="col-sm-12">
                                                <div class="input-group mb-2">
                                                    <span class="input-group-text"><i class="fa-solid fa-user-pen"></i></span>
                                                    <input type="text" value="<?= $row_vendor['alasan_perubahan'] ?>" name="alasan_perubahan" class="form-control">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer d-flex justify-content-start align-items-center">
                                <button onclick="history.back()" type="button" class="btn btn-secondary btn-sm">
                                    <i class="fa-solid fa-angles-left px-1"></i>
                                    Go Back
                                </button>&nbsp;
                                <button type="submit" class="btn btn-success btn-sm btn_simpan">
                                    <i class="fa-solid fa-share-from-square px-1"></i>
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>