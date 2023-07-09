<script>
    get_row_vendor_keuangan()

    function get_row_vendor_keuangan() {
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
                var get_keuangan = $('[name="get_keuangan"]').val()
                $(document).ready(function() {
                    $('#tbl_keuangan').DataTable({
                        "responsive": true,
                        "ordering": true,
                        "processing": true,
                        "serverSide": true,
                        "dom": 'Bfrtip',
                        "bDestroy": true,
                        "autoWidth": false,
                        "buttons": ["excel", "pdf", "print", "colvis"],
                        "order": [],
                        "ajax": {
                            "url": get_keuangan + response['id_vendor'],
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
                    })


                });

            }
        })
    }


    var form_tambah_keuangan = $('#form_tambah_keuangan')

    form_tambah_keuangan.on('submit', function(e) {
        // nanti kalau sudah migrasi ke js ambil url nya dari view
        var url_post = $('[name="url_post_keuangan"]').val()
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_save_laporan').attr("disabled", true);
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
                        get_row_vendor_keuangan();
                        $('#modal-xl-keuangan').modal('hide')
                        $('#form_tambah_keuangan')[0].reset();
                        $('#btn_save_laporan').attr("disabled", false);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    })

    function byid_keuangan(id, type) {
        if (type == 'dekrip') {
            saveData = 'dekrip';
        }
        if (type == 'enkrip') {
            saveData = 'enkrip';
        }
        var modal_dekrip_keuangan = $('#modal_dekrip_keuangan');
        var modal_enkrip_keuangan = $('#modal_enkrip_keuangan');
        var url_get_keuangan_by_id = $('[name="url_get_keuangan_by_id"]').val();
        $.ajax({
            type: "GET",
            url: url_get_keuangan_by_id + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'dekrip') {
                    modal_dekrip_keuangan.modal('show');
                    $('[name="id_url_keuangan"]').val(response['row_keuangan'].id_url);
                    $('.button_enkrip_keuangan').html('<a href="javascript:;"  onclick="DekripEnkrip_keuangan(\'' + response['row_keuangan'].file_dokumen + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_keuangan'].file_dokumen + '</a>';
                    $('.token_generate_keuangan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_keuangan'].token_dokumen + '</textarea></div>');
                } else if (type == 'enkrip') {
                    modal_enkrip_keuangan.modal('show');
                    $('[name="id_url_keuangan"]').val(response['row_keuangan'].id_url);
                    $('.button_enkrip_keuangan').html('<a href="javascript:;" onclick="DekripEnkrip_keuangan(\'' + response['row_keuangan'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_keuangan(\'' + response['row_keuangan'].id_url + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_keuangan'].file_dokumen + '</a>';
                    $('.token_generate_keuangan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_keuangan'].token_dokumen + '</textarea></div>');
                }
            }

        })
    }

    function GenerateDekrip_keuangan() {
        var url_encryption_keuangan = $('[name="url_encryption_keuangan"]').val();
        var modal_dekrip_keuangan = $('#modal_dekrip_keuangan');
        var id_url = $('[name="id_url_keuangan"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_keuangan + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_keuangan').serialize(),
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
                            get_row_vendor_keuangan();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_keuangan.modal('hide');
                            $('#form_dekrip_keuangan')[0].reset()
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


    function GenerateEnkrip_keuangan() {
        var url_encryption_keuangan = $('[name="url_encryption_keuangan"]').val();
        var modal_enkrip_keuangan = $('#modal_enkrip_keuangan');
        var id_url = $('[name="id_url_keuangan"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_keuangan + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_keuangan').serialize(),
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
                            get_row_vendor_keuangan();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            $('#form_enkrip_keuangan')[0].reset()
                            modal_enkrip_keuangan.modal('hide');
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
</script>