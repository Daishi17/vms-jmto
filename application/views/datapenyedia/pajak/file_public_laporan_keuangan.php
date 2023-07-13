<script>
    $("#modal-xl-keuangan").on('hide.bs.modal', function() {
        get_row_vendor_keuangan()
    });

    get_row_vendor_keuangan()
    $('.file_valid_auditor').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_manipulasi_auditor"]').val(geekss);
    });


    $('.file_valid_keuangan').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_manipulasi_keuangan"]').val(geekss);
    });

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
                $('[name="type_keuangan"]').val('tambah');
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
        var type_keuangan = $('[name="type_keuangan"]').val()
        var file_dokumen_manipulasi_auditor = $('[name="file_dokumen_manipulasi_auditor"]').val()
        var file_dokumen_manipulasi_keuangan = $('[name="file_dokumen_manipulasi_keuangan"]').val()
        if (file_dokumen_manipulasi_auditor == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else if (file_dokumen_manipulasi_keuangan == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            if (type_keuangan == 'edit') {
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
            } else {
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
            }

        }
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
        var modal_edit_keuangan = $('#modal-xl-keuangan');
        var url_get_keuangan_by_id = $('[name="url_get_keuangan_by_id"]').val();
        var url_encryption_keuangan = $('[name="url_encryption_keuangan"]').val()
        $.ajax({
            type: "GET",
            url: url_get_keuangan_by_id + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'dekrip') {
                    $.ajax({
                        method: "POST",
                        url: url_encryption_keuangan + response['row_keuangan'].id_url,
                        dataType: "JSON",
                        data: {
                            type: "dekrip"
                        },
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
                } else if (type == 'enkrip') {
                    $.ajax({
                        method: "POST",
                        url: url_encryption_keuangan + response['row_keuangan'].id_url,
                        dataType: "JSON",
                        data: {
                            type: "enkrip"
                        },
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
                } else if (type == 'edit') {
                    modal_edit_keuangan.modal('show');
                    $('[name="type_keuangan"]').val('edit');
                    $('[name="jenis_audit"]').val(response['row_keuangan'].jenis_audit);
                    $('[name="tahun_lapor"]').val(response['row_keuangan'].tahun_lapor);
                    $('[name="file_dokumen_manipulasi_auditor"]').val(response['row_keuangan'].file_laporan_auditor);
                    $('[name="file_dokumen_manipulasi_keuangan"]').val(response['row_keuangan'].file_laporan_keuangan);
                    $('[name="id_vendor_keuangan"]').val(response['row_keuangan'].id_vendor_keuangan);
                    $('[name="file_laporan_auditor"]').val(response['row_keuangan'].file_laporan_auditor);
                    $('[name="file_laporan_keuangan"]').val(response['row_keuangan'].file_laporan_keuangan);
                } else {
                    Question_hapus_keuangan(response['row_keuangan'].id_url);

                }
            }

        })
    }

    function Question_hapus_keuangan(id_url) {
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
                    url: '<?= base_url('datapenyedia/hapus_row_keuangan/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        get_row_vendor_keuangan();
                    }
                })
            }
        });
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