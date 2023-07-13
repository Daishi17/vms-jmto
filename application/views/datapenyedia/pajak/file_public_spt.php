<script>
    // crud spt
    // spt
    $('.file_valid_spt').change(function(e) {
        var geekss = e.target.files[0].name;
        $('[name="file_dokumen_manipulasi_spt"]').val(geekss);
    });
    get_row_vendor_spt()

    function get_row_vendor_spt() {
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
                var get_spt = $('[name="get_spt"]').val()
                $(document).ready(function() {
                    $('#tbl_spt').DataTable({
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
                            "url": get_spt + response['id_vendor'],
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

    var form_tambah_spt = $('#form_tambah_spt')

    form_tambah_spt.on('submit', function(e) {
        // nanti kalau sudah migrasi ke js ambil url nya dari view
        var url_post = $('[name="url_post_spt"]').val()
        var file_dokumen_manipulasi_spt = $('[name="file_dokumen_manipulasi_spt"]').val()
        if (file_dokumen_manipulasi_spt == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
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
                    $('#btn_save_spt').attr("disabled", true);
                },
                success: function(response) {
                    if (response['error']) {
                        // nomor_surat
                        $(".nomor_surat_spt_error").css('display', 'block');
                        // sts_seumur_hidup_sppkp
                        $(".tahun_lapor_spt_error").css('display', 'block');
                        // tgl_berlaku_sppkp
                        $(".jenis_spt_error").css('display', 'block');
                        // tgl_berlaku_sppkp
                        $(".tgl_penyampaian_error").css('display', 'block');
                        // nomor_surat
                        $(".nomor_surat_spt_error").html(response['error']['nomor_surat']);
                        // tahun_lapor
                        $(".tahun_lapor_spt_error").html(response['error']['tahun_lapor']);
                        // jenis_spt
                        $(".jenis_spt_error").html(response['error']['jenis_spt']);
                        // tgl_penyampaian
                        $(".tgl_penyampaian_spt_error").html(response['error']['tgl_penyampaian']);
                        $('#btn_save_spt').attr("disabled", false);
                    } else {
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
                                get_row_vendor_spt();
                                $('#modal-xl-spt').modal('hide')
                                $('#form_tambah_spt')[0].reset();
                                // nomor_surat
                                $(".nomor_surat_spt_error").css('display', 'none');
                                // sts_seumur_hidup_sppkp
                                $(".tahun_lapor_spt_error").css('display', 'none');
                                // tgl_berlaku_sppkp
                                $(".jenis_spt_error").css('display', 'none');
                                // tgl_berlaku_sppkp
                                $(".tgl_penyampaian_spt_error").css('display', 'none');
                                $('#btn_save_spt').attr("disabled", false);
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
    })

    var form_edit_spt = $('#form_edit_spt')

    form_edit_spt.on('submit', function(e) {
        // nanti kalau sudah migrasi ke js ambil url nya dari view
        var url_edit = $('[name="url_edit_spt"]').val()
        var file_dokumen_manipulasi_spt = $('[name="file_dokumen_manipulasi_spt"]').val()
        if (file_dokumen_manipulasi_spt == '') {
            e.preventDefault();
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Dokumen Wajib Di Isi!',
            })
        } else {
            e.preventDefault();
            $.ajax({
                url: url_edit,
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#btn_edit_spt').attr("disabled", true);
                },
                success: function(response) {
                    if (response['error']) {
                        // nomor_surat
                        $(".nomor_surat_spt_error").css('display', 'block');
                        // sts_seumur_hidup_sppkp
                        $(".tahun_lapor_spt_error").css('display', 'block');
                        // tgl_berlaku_sppkp
                        $(".jenis_spt_error").css('display', 'block');
                        // tgl_berlaku_sppkp
                        $(".tgl_penyampaian_error").css('display', 'block');
                        // nomor_surat
                        $(".nomor_surat_spt_error").html(response['error']['nomor_surat']);
                        // tahun_lapor
                        $(".tahun_lapor_spt_error").html(response['error']['tahun_lapor']);
                        // jenis_spt
                        $(".jenis_spt_error").html(response['error']['jenis_spt']);
                        // tgl_penyampaian
                        $(".tgl_penyampaian_spt_error").html(response['error']['tgl_penyampaian']);
                        $('#btn_edit_spt').attr("disabled", false);
                    } else {
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
                                get_row_vendor_spt();
                                $('#modal_edit_spt').modal('hide')
                                $('#form_edit_spt')[0].reset();
                                // nomor_surat
                                $(".nomor_surat_spt_error").css('display', 'block');
                                // sts_seumur_hidup_sppkp
                                $(".tahun_lapor_spt_error").css('display', 'block');
                                // tgl_berlaku_sppkp
                                $(".jenis_spt_error").css('display', 'block');
                                // tgl_berlaku_sppkp
                                $(".tgl_penyampaian_error").css('display', 'block');
                                // nomor_surat
                                $('#btn_edit_spt').attr("disabled", false);
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
    })

    function byid_spt(id, type) {
        if (type == 'lihat') {
            saveData = 'lihat';
        }
        if (type == 'dekrip') {
            saveData = 'dekrip';
        }
        if (type == 'enkrip') {
            saveData = 'enkrip';
        }
        var url_get_spt_by_id = $('[name="url_get_spt_by_id"]').val();
        var modal_edit_spt = $('#modal_edit_spt')
        var modal_dekrip_spt = $('#modal_dekrip_spt');
        var modal_enkrip_spt = $('#modal_enkrip_spt');
        $.ajax({
            type: "GET",
            url: url_get_spt_by_id + id,
            dataType: "JSON",
            success: function(response) {
                if (type == 'lihat') {
                    modal_edit_spt.modal('show')
                    $('[name="file_dokumen_manipulasi_spt"]').val(response['row_spt'].file_dokumen);
                    $('#nomor_surat').val(response['row_spt'].nomor_surat)
                    $('#tahun_lapor').val(response['row_spt'].tahun_lapor)
                    $('#jenis_spt').val(response['row_spt'].jenis_spt)
                    $('#tgl_penyampaian').val(response['row_spt'].tgl_penyampaian)
                    $('[name="id_url"]').val(response['row_spt'].id_url)
                } else if (type == 'dekrip') {
                    modal_dekrip_spt.modal('show');
                    $('[name="id_url_spt"]').val(response['row_spt'].id_url);
                    $('.button_enkrip_spt').html('<a href="javascript:;"  onclick="DekripEnkrip_spt(\'' + response['row_spt'].file_dokumen + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_spt'].file_dokumen + '</a>';
                    $('.token_generate_spt').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_spt'].token_dokumen + '</textarea></div>');
                } else if (type == 'enkrip') {
                    modal_enkrip_spt.modal('show');
                    $('[name="id_url_spt"]').val(response['row_spt'].id_url);
                    $('.button_enkrip_spt').html('<a href="javascript:;" onclick="DekripEnkrip_spt(\'' + response['row_spt'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_spt(\'' + response['row_spt'].id_url + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_spt'].file_dokumen + '</a>';
                    $('.token_generate_spt').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_spt'].token_dokumen + '</textarea></div>');
                }else{
                    Question_hapus_spt(response['row_spt'].id_url);
                }
            }
        })
    }

    function Question_hapus_spt(id_url) {
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
                    url: '<?= base_url('datapenyedia/hapus_row_spt/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        get_row_vendor_spt();
                    }
                })
            }
        });
    }


    function GenerateDekrip_spt() {
        var url_encryption_spt = $('[name="url_encryption_spt"]').val();
        var modal_dekrip_spt = $('#modal_dekrip_spt');
        var id_url = $('[name="id_url_spt"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_spt + id_url,
            dataType: "JSON",
            data: $('#form_dekrip_spt').serialize(),
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
                            get_row_vendor_spt();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            modal_dekrip_spt.modal('hide');
                            $('#form_dekrip_spt')[0].reset()
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


    function GenerateEnkrip_spt() {
        var url_encryption_spt = $('[name="url_encryption_spt"]').val();
        var modal_enkrip_spt = $('#modal_enkrip_spt');
        var id_url = $('[name="id_url_spt"]').val();
        $.ajax({
            method: "POST",
            url: url_encryption_spt + id_url,
            dataType: "JSON",
            data: $('#form_enkrip_spt').serialize(),
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
                            get_row_vendor_spt();
                            $('#button_dekrip_generate').css('display', 'block');
                            $('#button_dekrip_generate_manipulasi').css('display', 'none');
                            $('#form_enkrip_spt')[0].reset()
                            modal_enkrip_spt.modal('hide');
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

    function DownloadFile_spt(id_url) {
        var url_download_spt = $('[name="url_download_spt"]').val()
        location.href = url_download_spt + id_url;
    }

    function edit_data_spt() {
        $('#modaledit_spt').modal('show')
    }

    function edit_spt() {
        $('#nomor_surat').attr("disabled", false);
        $('#tahun_lapor').attr("disabled", false);
        $('#jenis_spt').attr("disabled", false);
        $('#tgl_penyampaian').attr("disabled", false);
        $('[name="file_dokumen_spt"]').attr("disabled", false);
        $('#modaledit_spt').modal('hide')
        $('#btn_edit_spt').attr("disabled", false);
    }
    //   end crud spt
</script>