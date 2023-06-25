    <!-- Main content -->
    <section class="content">
        <div class="container">

            <!-- Default box -->
            <div class="card card-outline card-primary text-sm">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-registered mr-2"></i>
                        Registrasi Data Rekanan Tervalidasi (DRT)
                    </h4>

                </div>
                <div class="card-body">
                    <div class="callout callout-danger text-sm">
                        <h6>
                            <i class="fas fa-info"></i>
                            Catatan:
                        </h6>
                        <div class="text-sm">
                            Sebelum melakukan pendaftaran ke SI-DRT JMTO,
                            pastikan alamat Email dan NPWP yang ingin anda gunakan sudah benar dan tidak terdaftar sebelumnya pada sistem DRT.
                            <strong>(Pendaftaran Wajib Menggunakan 1 Perangkat dan Wajib Menggunakan Laptop/PC)</strong>.<br>
                            <span class="text-danger">
                                Link form pengisian identitas perusahan/individu akan dikirimkan melalui Email setelah anda melakukan registrasi
                                dengan mengisi Email & NPWP pada form dibawah ini.
                            </span>
                        </div>
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
                    <div class="card card-primary text-sm">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="fas fa-registered mr-2"></i>
                                Form Registrasi SI-DRT
                            </h4>
                        </div>
                        <?= form_open('registrasi'); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group col-sm-8">
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                                            </div>
                                            <input type="text" name="email" class="form-control" placeholder="Enter email">
                                        </div>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="npwp" placeholder="NPWP" data-inputmask='"mask": "99.999.999.9-999.999"' data-mask>
                                        </div>
                                        <br>
                                        <div class="form-group mb-0">
                                            <div class="custom-control custom-checkbox">
                                                <div class="row">
                                                    <div class="col-md-1">
                                                        <input type="checkbox" id="check_terima" onclick="Terima()">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <label>Saya menyetujui persyaratan layanan.</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group col-sm-8">
                                        <center>
                                            <?php echo $widget; ?>
                                            <?php echo $script; ?>
                                            <br>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" id="button_save" disabled class="btn btn-primary">
                                <i class="fas fa-share-square mr-2"></i>
                                Registrasi
                            </button>
                        </div>
                        <?= form_close(); ?>
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