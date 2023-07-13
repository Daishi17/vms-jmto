<script>
    get_row_vendor()

    function get_row_vendor() {
        var secret_token = $('[name="secret_token"]').val()
        var id_url_vendor = $('[name="id_url_vendor"]').val()
        var url_get_row_vendor = $('[name="url_get_row_vendor"]').val()
        $.ajax({
            method: "POST",
            url: url_get_row_vendor + id_url_vendor,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
            },
            success: function(response) {
                if (response['row_sppkp']) {
                    $('[name="no_surat_sppkp"]').attr("readonly", true);
                    $('[name="sts_seumur_hidup_sppkp"]').attr("disabled", true);
                    $('[name="tgl_berlaku_sppkp"]').attr("readonly", true);
                    $('[name="file_sppkp"]').attr("disabled", true);
                    $('#btn_save_sppkp').attr("disabled", true);
                } else {
                    $('[name="no_surat_sppkp"]').attr("readonly", false);
                    $('[name="sts_seumur_hidup_sppkp"]').attr("disabled", false);
                    $('[name="tgl_berlaku_sppkp"]').attr("readonly", false);
                    $('[name="file_sppkp"]').attr("disabled", false);
                    $('#btn_save_sppkp').attr("disabled", false);
                    $('#btn_edit_sppkp').removeClass("disabled");
                }

                if (response == 'maaf') {
                    alert('Maaf Anda Kurang Beruntung');
                } else {
                    // sppkp
                    if (response) {
                        var id_url_sppkp = response['row_sppkp']['id_url'];
                    }

                    $('[name="no_surat_sppkp"]').val(response['row_sppkp']['no_surat']);
                    $('[name="sts_seumur_hidup_sppkp"]').val(response['row_sppkp']['sts_seumur_hidup']);
                    $('[name="tgl_berlaku_sppkp"]').val(response['row_sppkp']['tgl_berlaku']);
                    $('.file_dokumen_sppkp').text(response['row_sppkp']['file_dokumen'])
                    if (response['row_sppkp']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_sppkp').html('<a href="javascript:;"  onclick="DekripEnkrip_sppkp(\'' + id_url_sppkp + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                            response['row_sppkp']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_sppkp').html(html2);
                        $('.token_generate_sppkp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sppkp']['token_dokumen'] + '</textarea></div>');
                    } else {
                        $('.button_enkrip_sppkp').html('<a href="javascript:;" onclick="DekripEnkrip_sppkp(\'' + id_url_sppkp + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_sppkp(\'' + id_url_sppkp + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_sppkp']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_sppkp').html(html2);
                        $('.token_generate_sppkp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sppkp']['token_dokumen'] + '</textarea></div>');
                    }
                }

            }
        })
    }
    // crud sppkp
    var form_tambah_sppkp = $('#form_tambah_sppkp')

    form_tambah_sppkp.on('submit', function(e) {
        // nanti kalau sudah migrasi ke js ambil url nya dari view
        var url_post = $('[name="url_post_sppkp"]').val()
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_save_sppkp').attr("disabled", true);
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Membuat Data <b></b>',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                        get_row_vendor();
                        $('#on_save').attr("disabled", false);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    function DekripEnkrip_sppkp(id_url, type) {
        var secret_token = $('[name="secret_token"]').val()
        var url_encryption_sppkp = $('[name="url_encryption_sppkp"]').val();
        var modal_dekrip_sppkp = $('#modal_dekrip_sppkp');
        var modal_enkrip_sppkp = $('#modal_enkrip_sppkp');
        if (type == 'dekrip') {
            modal_dekrip_sppkp.modal('show');
            $('[name="id_url_sppkp"]').val(id_url);
        } else {
            modal_enkrip_sppkp.modal('show');
            $('[name="id_url_sppkp"]').val(id_url);

        }
    }

    function GenerateDekrip_sppkp() {
        var url_encryption_sppkp = $('[name="url_encryption_sppkp"]').val();
        var modal_dekrip_sppkp = $('#modal_dekrip_sppkp');
        var id_url = $('[name="id_url_sppkp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_sppkp + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_sppkp').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            get_row_vendor();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_sppkp.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }


    function GenerateEnkrip_sppkp() {
        var url_encryption_sppkp = $('[name="url_encryption_sppkp"]').val();
        var modal_enkrip_sppkp = $('#modal_enkrip_sppkp');
        var id_url = $('[name="id_url_sppkp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_sppkp + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_sppkp').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            get_row_vendor();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_sppkp.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }

    const edit_sppkp = () => {
        $('#modaledit_perubahan').modal('hide')
        $('[name="no_surat_sppkp"]').attr("readonly", false);
        $('[name="sts_seumur_hidup_sppkp"]').attr("disabled", false);
        $('[name="tgl_berlaku_sppkp"]').attr("readonly", false);
        $('[name="file_sppkp"]').attr("disabled", false);
        $('#btn_save_sppkp').attr("disabled", false);
        $('#btn_edit_sppkp').attr("disabled", true);
    }

    function DownloadFile_sppkp(id_url) {
        var url_download_sppkp = $('[name="url_download_sppkp"]').val()
        location.href = url_download_sppkp + id_url;
    }
    // end sppkp
</script>

<script>
    get_row_vendor_npwp()

    function get_row_vendor_npwp() {
        var secret_token = $('[name="secret_token"]').val()
        var id_url_vendor = $('[name="id_url_vendor"]').val()
        var url_get_row_vendor = $('[name="url_get_row_vendor"]').val()
        $.ajax({
            method: "POST",
            url: url_get_row_vendor + id_url_vendor,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
            },
            success: function(response) {
                if (response['row_npwp']) {
                    $('[name="no_npwp"]').attr("readonly", true);
                    $('[name="sts_seumur_hidup_npwp"]').attr("disabled", true);
                    $('[name="tgl_berlaku_npwp"]').attr("readonly", true);
                    $('[name="file_npwp"]').attr("disabled", true);
                    $('#btn_save_npwp').attr("disabled", true);
                } else {
                    $('[name="no_npwp"]').attr("readonly", false);
                    $('[name="sts_seumur_hidup_npwp"]').attr("disabled", false);
                    $('[name="tgl_berlaku_npwp"]').attr("readonly", false);
                    $('[name="file_npwp"]').attr("disabled", false);
                    $('#btn_save_npwp').attr("disabled", false);
                    $('#btn_edit_npwp').removeClass("disabled");
                }

                if (response == 'maaf') {
                    alert('Maaf Anda Kurang Beruntung');
                } else {
                    // sppkp
                    if (response) {
                        var id_url_npwp = response['row_npwp']['id_url'];
                    }

                    $('[name="no_npwp"]').val(response['row_npwp']['no_npwp']);
                    $('[name="sts_seumur_hidup_npwp"]').val(response['row_npwp']['sts_seumur_hidup']);
                    $('[name="tgl_berlaku_npwp"]').val(response['row_npwp']['tgl_berlaku']);
                    $('.file_dokumen_npwp').text(response['row_npwp']['file_dokumen'])
                    if (response['row_npwp']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_npwp').html('<a href="javascript:;"  onclick="DekripEnkrip_npwp(\'' + id_url_npwp + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                            response['row_npwp']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_npwp').html(html2);
                        $('.token_generate_npwp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_npwp']['token_dokumen'] + '</textarea></div>');
                    } else {
                        $('.button_enkrip_npwp').html('<a href="javascript:;" onclick="DekripEnkrip_npwp(\'' + id_url_npwp + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                        var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_npwp(\'' + id_url_npwp + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_npwp']['file_dokumen'] + '</a>';
                        $('#tampil_dokumen_npwp').html(html2);
                        $('.token_generate_npwp').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_npwp']['token_dokumen'] + '</textarea></div>');
                    }
                }

            }
        })
    }
    // crud sppkp
    var form_tambah_npwp = $('#form_tambah_npwp')

    form_tambah_npwp.on('submit', function(e) {
        // nanti kalau sudah migrasi ke js ambil url nya dari view
        var url_post = $('[name="url_post_npwp"]').val()
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_save_npwp').attr("disabled", true);
            },
            success: function(response) {
                let timerInterval
                Swal.fire({
                    title: 'Sedang Proses Menyimpan Data!',
                    html: 'Membuat Data <b></b>',
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            // b.textContent = Swal.getTimerRight()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                        Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                        get_row_vendor_npwp();
                        $('#on_save').attr("disabled", false);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    function DekripEnkrip_npwp(id_url, type) {
        var secret_token = $('[name="secret_token"]').val()
        var url_encryption_npwp = $('[name="url_encryption_npwp"]').val();
        var modal_dekrip_npwp = $('#modal_dekrip_npwp');
        var modal_enkrip_npwp = $('#modal_enkrip_npwp');
        if (type == 'dekrip') {
            modal_dekrip_npwp.modal('show');
            $('[name="id_url_npwp"]').val(id_url);
        } else {
            modal_enkrip_npwp.modal('show');
            $('[name="id_url_npwp"]').val(id_url);

        }
    }

    function GenerateDekrip_npwp() {
        var url_encryption_npwp = $('[name="url_encryption_npwp"]').val();
        var modal_dekrip_npwp = $('#modal_dekrip_npwp');
        var id_url = $('[name="id_url_npwp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_npwp + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_npwp').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            get_row_vendor_npwp();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_npwp.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }


    function GenerateEnkrip_npwp() {
        var url_encryption_npwp = $('[name="url_encryption_npwp"]').val();
        var modal_enkrip_npwp = $('#modal_enkrip_npwp');
        var id_url = $('[name="id_url_npwp"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_npwp + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_npwp').serialize(),
            // beforeSend: function() {
            //     $('#button_dekrip_generate').css('display', 'none');
            //     $('#button_dekrip_generate_manipulasi').css('display', 'block');
            // },
            success: function(response) {
                if (response['maaf']) {
                    Swal.fire(response['maaf'], '', 'warning')
                } else {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Deskripsi!',
                        html: 'Proses Deksripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Deskripsi!', '', 'success')
                            get_row_vendor_npwp();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_enkrip_npwp.modal('hide');
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            }
        })
    }

    const edit_npwp = () => {
        $('#modaledit_perubahan_npwp').modal('hide')
        $('[name="no_npwp"]').attr("readonly", false);
        $('[name="sts_seumur_hidup_npwp"]').attr("disabled", false);
        $('[name="tgl_berlaku_npwp"]').attr("readonly", false);
        $('[name="file_npwp"]').attr("disabled", false);
        $('#btn_save_npwp').attr("disabled", false);
        $('#btn_edit_npwp').attr("disabled", true);
    }

    function DownloadFile_npwp(id_url) {
        var url_download_npwp = $('[name="url_download_npwp"]').val()
        location.href = url_download_npwp + id_url;
    }
    // end sppkp
</script>

<!-- INI UNTUK NERACA KEUANGAN -->
<script>
    function buat_format_excel() {
        var buat_format_excel = $('#buat_format_excel');
        buat_format_excel.modal('show');
    }

    function Cetak_format_dan_download() {
        var modal_cetak_format_dan_download = $('#modal_cetak_format_dan_download');
        var jenis_laporan_1 = $('[name="jenis_laporan_1"]').val()
        var nilai_tahun_kolom_1_1 = $('[name="nilai_tahun_kolom_1_1"]').val()
        var nilai_tahun_kolom_2_1 = $('[name="nilai_tahun_kolom_2_1"]').val()
        // 
        var jenis_laporan_2 = $('[name="jenis_laporan_2"]').val()
        var nilai_tahun_kolom_1_2 = $('[name="nilai_tahun_kolom_1_2"]').val()
        var nilai_tahun_kolom_2_2 = $('[name="nilai_tahun_kolom_2_2"]').val()
        // 
        var jenis_laporan_3 = $('[name="jenis_laporan_3"]').val()
        var nilai_tahun_kolom_1_3 = $('[name="nilai_tahun_kolom_1_3"]').val()
        var nilai_tahun_kolom_2_3 = $('[name="nilai_tahun_kolom_2_3"]').val()
        // 
        var jenis_laporan_4 = $('[name="jenis_laporan_4"]').val()
        var nilai_tahun_kolom_1_4 = $('[name="nilai_tahun_kolom_1_4"]').val()
        var nilai_tahun_kolom_2_4 = $('[name="nilai_tahun_kolom_2_4"]').val()
        // 
        var jenis_laporan_5 = $('[name="jenis_laporan_5"]').val()
        var nilai_tahun_kolom_1_5 = $('[name="nilai_tahun_kolom_1_5"]').val()
        var nilai_tahun_kolom_2_5 = $('[name="nilai_tahun_kolom_2_5"]').val()
        // 
        var jenis_laporan_6 = $('[name="jenis_laporan_6"]').val()
        var nilai_tahun_kolom_1_6 = $('[name="nilai_tahun_kolom_1_6"]').val()
        var nilai_tahun_kolom_2_6 = $('[name="nilai_tahun_kolom_2_6"]').val()
        // 
        var jenis_laporan_7 = $('[name="jenis_laporan_7"]').val()
        var nilai_tahun_kolom_1_7 = $('[name="nilai_tahun_kolom_1_7"]').val()
        var nilai_tahun_kolom_2_7 = $('[name="nilai_tahun_kolom_2_7"]').val()
        // 
        var jenis_laporan_8 = $('[name="jenis_laporan_8"]').val()
        var nilai_tahun_kolom_1_8 = $('[name="nilai_tahun_kolom_1_8"]').val()
        var nilai_tahun_kolom_2_8 = $('[name="nilai_tahun_kolom_2_8"]').val()
        $.ajax({
            method: "POST",
            url: '<?= base_url('datapenyedia/buat_excel_format_neraca') ?>',
            dataType: "JSON",
            data: {
                // batas 1
                jenis_laporan_1: jenis_laporan_1,
                nilai_tahun_kolom_1_1: nilai_tahun_kolom_1_1,
                nilai_tahun_kolom_2_1: nilai_tahun_kolom_2_1,
                // batas 2
                jenis_laporan_2: jenis_laporan_2,
                nilai_tahun_kolom_1_2: nilai_tahun_kolom_1_2,
                nilai_tahun_kolom_2_2: nilai_tahun_kolom_2_2,
                // batas 3
                jenis_laporan_3: jenis_laporan_3,
                nilai_tahun_kolom_1_3: nilai_tahun_kolom_1_3,
                nilai_tahun_kolom_2_3: nilai_tahun_kolom_2_3,
                // batas 4
                jenis_laporan_4: jenis_laporan_4,
                nilai_tahun_kolom_1_4: nilai_tahun_kolom_1_4,
                nilai_tahun_kolom_2_4: nilai_tahun_kolom_2_4,
                // batas 5
                jenis_laporan_5: jenis_laporan_5,
                nilai_tahun_kolom_1_5: nilai_tahun_kolom_1_5,
                nilai_tahun_kolom_2_5: nilai_tahun_kolom_2_5,
                // batas 6
                jenis_laporan_6: jenis_laporan_6,
                nilai_tahun_kolom_1_6: nilai_tahun_kolom_1_6,
                nilai_tahun_kolom_2_6: nilai_tahun_kolom_2_6,
                // batas 7
                jenis_laporan_7: jenis_laporan_7,
                nilai_tahun_kolom_1_7: nilai_tahun_kolom_1_7,
                nilai_tahun_kolom_2_7: nilai_tahun_kolom_2_7,
                // batas 8
                jenis_laporan_8: jenis_laporan_8,
                nilai_tahun_kolom_1_8: nilai_tahun_kolom_1_8,
                nilai_tahun_kolom_2_8: nilai_tahun_kolom_2_8,
            },
            success: function(response) {
                modal_cetak_format_dan_download.modal('show');
                $('#jenis_laporan_1').html(response['jenis_laporan_1']);
                $('#nilai_tahun_kolom_1_1').html(response['nilai_tahun_kolom_1_1']);
                $('#nilai_tahun_kolom_2_1').html(response['nilai_tahun_kolom_2_1']);
                $('#jenis_laporan_2').html(response['jenis_laporan_2']);
                $('#nilai_tahun_kolom_1_2').html(response['nilai_tahun_kolom_1_2']);
                $('#nilai_tahun_kolom_2_2').html(response['nilai_tahun_kolom_2_2']);
                $('#jenis_laporan_3').html(response['jenis_laporan_3']);
                $('#nilai_tahun_kolom_1_3').html(response['nilai_tahun_kolom_1_3']);
                $('#nilai_tahun_kolom_2_3').html(response['nilai_tahun_kolom_2_3']);
                $('#jenis_laporan_4').html(response['jenis_laporan_4']);
                // $('#nilai_tahun_kolom_1_4').html(nilai_tahun_kolom_1_4);
                // $('#nilai_tahun_kolom_2_4').html(nilai_tahun_kolom_2_4);
                // $('#jenis_laporan_5').html(jenis_laporan_5);
                // $('#nilai_tahun_kolom_1_5').html(nilai_tahun_kolom_1_5);
                // $('#nilai_tahun_kolom_2_5').html(nilai_tahun_kolom_2_5);
                // $('#jenis_laporan_6').html(jenis_laporan_6);
                // $('#nilai_tahun_kolom_1_6').html(nilai_tahun_kolom_1_6);
                // $('#nilai_tahun_kolom_2_6').html(nilai_tahun_kolom_2_6);
                // $('#jenis_laporan_7').html(jenis_laporan_7);
                // $('#nilai_tahun_kolom_1_7').html(nilai_tahun_kolom_1_7);
                // $('#nilai_tahun_kolom_2_7').html(nilai_tahun_kolom_2_7);
                // $('#jenis_laporan_8').html(jenis_laporan_8);
                // $('#nilai_tahun_kolom_1_8').html(nilai_tahun_kolom_1_8);
                // $('#nilai_tahun_kolom_2_8').html(nilai_tahun_kolom_2_8);
                var html = '';
                html += '<tr>' +
                    '<td>1</td>' +
                    '<td>Penjelasan/Opini dari Auditor Kantor Akuntan Publik</td>' +
                    '<td><label for="" id="jenis_laporan_1"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_1"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_1"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>2</td>' +
                    '<td class="tg-za14">Jumlah Kas dan Bank</td>' +
                    '<td><label for="" id="jenis_laporan_2"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_2"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_2"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>3</td>' +
                    '<td class="tg-za14">Total Hutang</td>' +
                    '<td><label for="" id="jenis_laporan_3"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_3"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_3"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>4</td>' +
                    '<td class="tg-za14">Total Ekuitas</td>' +
                    '<td><label for="" id="jenis_laporan_4"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_4"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_4"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>5</td>' +
                    '<td class="tg-za14">Total Aktiva Lancar</td>' +
                    '<td><label for="" id="jenis_laporan_5"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_5"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_5"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>6</td>' +
                    '<td class="tg-za14">Total Hutang Lancar</td>' +
                    '<td><label for="" id="jenis_laporan_6"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_6"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_6"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td class="tg-0lax">7</td>' +
                    '<td class="tg-7zrl">Laba Usaha</td>' +
                    '<td><label for="" id="jenis_laporan_7"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_7"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_7"></label></td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td class="tg-0lax">8</td>' +
                    '<td class="tg-7zrl">EBITDA (Laba Usaha + Beban Penyusutan)</td>' +
                    '<td><label for="" id="jenis_laporan_8"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_1_8"></label></td>' +
                    '<td><label for="" id="nilai_tahun_kolom_2_8"></label></td>' +
                    '</tr>';
                $('.data_export').html(html);
            }
        })
    }
</script>

<script>
    $(document).ready(function() {
        $('#cetak_table').DataTable({
            "autoWidth": false,
            "bDestroy": true,
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });
</script>

<script>
    var table_nerca_keuangan = $('#table_nerca_keuangan')
    $(document).ready(function() {
        var url_table_nerca_keuangan = $('[name="url_table_nerca_keuangan"]').val();
        table_nerca_keuangan.DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_table_nerca_keuangan') ?>',
                "type": "POST",
            },
            "columnDefs": [{
                "target": [-1],
                "orderable": false
            }],
            "oLanguage": {
                "sSearch": "Pencarian : ",
                "sEmptyTable": "Data Tidak Tersedia",
                "sLoadingRecords": "Silahkan Tunggu - loading...",
                "sLengthMenu": "Menampilkan &nbsp;  _MENU_  &nbsp;   Data",
                "sZeroRecords": "Tidak Ada Data Yang Di Cari",
                "sProcessing": "Memuat Data...."
            }
        }).buttons().container().appendTo('#table_nerca_keuangan .col-md-6:eq(0)');
    });

    function reloadtable_nerca_keuangan() {
        table_nerca_keuangan.DataTable().ajax.reload();
    }
    var modal_neraca = $('#modal-xl-neraca')
    var form_simpan_neraca = $('#form_simpan_neraca');
    form_simpan_neraca.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/simpan_neraca_keuangan",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                modal_neraca.modal('hide')
                $('.btn_simpan').attr('disabled', false);
                if (response['message']) {
                    Swal.fire('Good job!', 'Behasil Simpan Data', 'success');
                    reloadtable_nerca_keuangan()
                    form_simpan_neraca[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    reloadtable_nerca_keuangan()
                    form_simpan_neraca[0].reset();
                }
            }
        });
    });




    var form_edit_neraca = $('#form_edit_neraca');
    var modal_edit_neraca = $('#modal-xl-neraca-edit');
    form_edit_neraca.on('submit', function(e) {
        e.preventDefault();
        var validasi_enkripsi_pemilik = $('[name="validasi_enkripsi_pemilik"]').val();
        if (validasi_enkripsi_pemilik == 2) {
            Swal.fire('Waduh Maaf!', 'Enkripsi File Terlebih Dahulu Yaa!', 'warning');
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>datapenyedia/edit_neraca_keuangan",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan').attr('disabled', 'disabled');
                },
                success: function(response) {
                    modal_edit_neraca.modal('hide')
                    Swal.fire('Good job!', 'Data Beharhasil Di Edit!', 'success');
                    reloadtable_nerca_keuangan();
                    $('.btn_simpan').attr('disabled', false);
                    form_edit_neraca[0].reset();
                }
            });
        }
    });



    function by_id_neraca_keuangan(id_neraca, type) {
        var modal_edit_neraca = $('#modal-xl-neraca-edit');
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'hapus') {
            saveData = 'hapus';
        }
        if (type == 'upload_ktp') {
            saveData = 'upload_ktp';
        }
        if (type == 'upload_npwp') {
            saveData = 'upload_npwp';
        }

        $.ajax({
            type: "GET",
            url: '<?= base_url('datapenyedia/by_id_neraca/') ?>' + id_neraca,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_neraca.modal('show');
                    $('[name="validasi_enkripsi"]').val(response['row_neraca'].sts_token_dokumen);
                    if (response['row_neraca']['sts_token_dokumen'] == 1) {
                        $('.button_enkrip_neraca').html('<a href="javascript:;"  onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_neraca').html('<a href="javascript:;" onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_dokumen_sertifikat').html('<a href="javascript:;"  onclick="Download_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'neraca_dokumen' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_neraca'].file_dokumen_sertifikat + '</a>');
                    $('.button_nama_file_dokumen_neraca').html('<a href="javascript:;"  onclick="Download_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'neraca_sertifikat' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_neraca'].file_dokumen_neraca + '</a>');
                    $('[name="id_neraca"]').val(response['row_neraca'].id_neraca);
                    // $('[name="nama_akuntan_public"]').val(response['row_neraca'].nama_akuntan_public);
                    // $('[name="tangga_laporan"]').val(response['row_neraca'].tangga_laporan);
                    $('[name="file_dokumen_neraca"]').val(response['row_neraca'].file_dokumen_neraca);
                    $('[name="file_dokumen_sertifikat"]').val(response['row_neraca'].file_dokumen_sertifikat);
                } else if (type == 'hapus') {
                    Question_hapus_neraca(response['row_neraca'].id_url_neraca, response['row_neraca'].nama_akuntan_public);
                } else {

                }
            }
        })
    }

    
    function Question_hapus_neraca(id_url_neraca, nama_akuntan_public) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_neraca/') ?>' + id_url_neraca,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloadtable_nerca_keuangan()
                    }
                })
            }
        });
    }


    function DekripEnkrip_neraca(id_url_neraca, type) {
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: '<?= base_url('datapenyedia/dekrip_enkrip_neraca/') ?>' + id_url_neraca,
                dataType: "JSON",
                data: {
                    type: type,
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Dekripsi!',
                        html: 'Proses Enkripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                            reloadtable_nerca_keuangan();
                            $('[name="validasi_enkripsi"]').val(response['row_neraca'].sts_token_dokumen);
                            if (response['row_neraca']['sts_token_dokumen'] == 1) {
                                $('.button_enkrip_neraca').html('<a href="javascript:;"  onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                            } else {
                                $('.button_enkrip_neraca').html('<a href="javascript:;" onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                            }
                            $('.button_nama_file_dokumen_sertifikat').html('<a href="javascript:;"  onclick="Download_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'neraca_dokumen' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_neraca'].file_dokumen_sertifikat + '</a>');
                            $('.button_nama_file_dokumen_neraca').html('<a href="javascript:;"  onclick="Download_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'neraca_sertifikat' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_neraca'].file_dokumen_neraca + '</a>');
                            $('[name="id_neraca"]').val(response['row_neraca'].id_neraca);
                            $('[name="file_dokumen_neraca"]').val(response['row_neraca'].file_dokumen_neraca);
                            $('[name="file_dokumen_sertifikat"]').val(response['row_neraca'].file_dokumen_sertifikat);

                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        } else {
            $.ajax({
                method: "POST",
                url: '<?= base_url('datapenyedia/dekrip_enkrip_neraca/') ?>' + id_url_neraca,
                dataType: "JSON",
                data: {
                    type: type,
                },
                success: function(response) {
                    let timerInterval
                    Swal.fire({
                        title: 'Sedang Proses Enkripsi!',
                        html: 'Proses Enkripsi <b></b>',
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: () => {
                            Swal.showLoading()
                            const b = Swal.getHtmlContainer().querySelector('b')
                            timerInterval = setInterval(() => {
                                // b.textContent = Swal.getTimerRight()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(timerInterval)
                            Swal.fire('Dokumen Berhasil Di Enkripsi', '', 'success')
                            reloadtable_nerca_keuangan();
                            $('[name="validasi_enkripsi"]').val(response['row_neraca'].sts_token_dokumen);
                            if (response['row_neraca']['sts_token_dokumen'] == 1) {
                                $('.button_enkrip_neraca').html('<a href="javascript:;"  onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                            } else {
                                $('.button_enkrip_neraca').html('<a href="javascript:;" onclick="DekripEnkrip_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                            }
                            $('.button_nama_file_dokumen_sertifikat').html('<a href="javascript:;"  onclick="Download_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'neraca_dokumen' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_neraca'].file_dokumen_sertifikat + '</a>');
                            $('.button_nama_file_dokumen_neraca').html('<a href="javascript:;"  onclick="Download_neraca(\'' + response['row_neraca'].id_url_neraca + '\'' + ',' + '\'' + 'neraca_sertifikat' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_neraca'].file_dokumen_neraca + '</a>');
                            $('[name="id_neraca"]').val(response['row_neraca'].id_neraca);
                            $('[name="file_dokumen_neraca"]').val(response['row_neraca'].file_dokumen_neraca);
                            $('[name="file_dokumen_sertifikat"]').val(response['row_neraca'].file_dokumen_sertifikat);
                        }
                    }).then((result) => {
                        /* Read more about handling dismissals below */
                        if (result.dismiss === Swal.DismissReason.timer) {

                        }
                    })
                }
            })
        }

    }

    
    function Download_neraca(id_url_neraca, type) {
        // var url_download_nib = $('[name="url_download_nib"]').val()
        location.href = '<?= base_url('datapenyedia/url_download_neraca/') ?>' + id_url_neraca + '/' + type;
    }


</script>