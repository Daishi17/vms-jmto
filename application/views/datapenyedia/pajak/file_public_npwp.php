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
        $('#modaledit_perubahan').modal('hide')
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