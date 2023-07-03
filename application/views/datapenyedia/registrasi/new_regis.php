<main class="container-fluid">
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
                    <div class="alert alert-white border-dark shadow-lg" role="alert">
                        <h5 class="alert-heading">
                            <i class="fa-solid fa-circle-info px-1"></i>
                            Catatan!
                        </h5>
                        <span class="text-dark">
                            <hr>
                        </span>
                        <small>
                            <p>Sebelum melakukan pendaftaran ke E-DRT JMTO, pastikan alamat Email dan NPWP yang ingin anda gunakan sudah benar dan tidak terdaftar sebelumnya pada sistem E-DRT. <b>(Pendaftaran Wajib Menggunakan 1 Perangkat dan Wajib Menggunakan Laptop/PC)</b>.</p>
                            <span class="text-danger">Link form pengisian identitas perusahan/individu akan dikirimkan melalui Email setelah anda melakukan registrasi dengan mengisi Email & NPWP pada form dibawah ini.</span>
                        </small><br>
                    </div>
                    <?php if ($this->session->flashdata('email_salah')) {
                        echo '  <div class="alert alert-warning alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Maaf!</h5>';
                        echo  $this->session->flashdata('email_salah');
                        echo ' </div>';
                    } ?>
                    <?php if ($this->session->flashdata('success')) {
                        echo '  <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
               <h5><i class="icon fas fa-exclamation-triangle"></i> Anda Berhasil Registrasi !</h5>';
                        echo  $this->session->flashdata('success');
                        echo ' </div>';
                    } ?>
                    <div class="card border-dark">
                        <div class="card-header bg-dark border-dark">
                            <div class="card-title">
                                <span class="text-white">
                                    <i class="fas fa-user-tag"></i>
                                    <small><strong>Form Registrasi Rekanan Baru</strong></small>
                                </span>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= form_open('registrasi'); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-envelope-circle-check"></i></span>
                                        <input required type="email" name="email" class="form-control" placeholder="Masukan Email" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                    </div>
                                    <div class="input-group mb-2">
                                        <span class="input-group-text"><i class="fa-solid fa-address-card"></i></span>
                                        <input required type="text" name="npwp" class="form-control" placeholder="Masukan NPWP" data-masked="" data-inputmask="'mask': '99.999.999.9-999.99'">
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa-solid fa-registered px-1"></i>
                                            Registrasi
                                        </button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex justify-content-center">
                                        <center>
                                            <?php echo $widget; ?>
                                            <?php echo $script; ?>
                                            <br>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>