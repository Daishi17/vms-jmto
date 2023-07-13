<script>

var data_pengalaman_manajerial = $('#data_pengalaman_manajerial')
    $(document).ready(function() {
        // var url_data_pengalaman_manajerial = $('[name="url_data_pengalaman_manajerial"]').val();
        data_pengalaman_manajerial.DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_data_pengalaman_manajerial') ?>',
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
        }).buttons().container().appendTo('#data_pengalaman_manajerial .col-md-6:eq(0)');
    });

    function reloaddata_pengalaman_manajerial() {
        data_pengalaman_manajerial.DataTable().ajax.reload();
    }

    function Download_pengalaman(id_url, type) {
        // var url_download_nib = $('[name="url_download_nib"]').val()
        location.href = '<?= base_url('datapenyedia/url_download_pengalaman/') ?>' + id_url + '/' + type;
    }


    var data_excel_pengalaman_manajerial = $('#data_excel_pengalaman_manajerial')
    $(document).ready(function() {
        var url_data_excel_pengalaman_manajerial = $('[name="url_data_excel_pengalaman_manajerial"]').val();
        data_excel_pengalaman_manajerial.DataTable({
            "ordering": true,
            "autoWidth": false,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_data_excel_pengalaman_manajerial') ?>',
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
        }).buttons().container().appendTo('#data_excel_pengalaman_manajerial .col-md-6:eq(0)');
    });

    function reloaddata_excel_pengalaman_manajerial() {
        data_excel_pengalaman_manajerial.DataTable().ajax.reload();
    }


    function by_id_excel_pengalaman_manajerial(id_pengalaman, type) {
        var modal_edit_excel_pengalaman_manajerial = $('#modal_edit_excel_pengalaman_manajerial');
        // var url_byid_kbli_nib = $('[name="url_byid_kbli_nib"]').val();
        if (type == 'edit') {
            saveData = 'edit';
        }
        if (type == 'hapus') {
            saveData = 'hapus';
        }

        $.ajax({
            type: "GET",
            url: '<?= base_url('datapenyedia/by_id_excel_pengalaman_menajerial/') ?>' + id_pengalaman,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pengalaman_manajerial.modal('show');
                    $('[name="type_edit_pengalaman"]').val('edit_excel');
                    $('[name="validasi_enkripsi_pengalaman"]').val(response['row_excel_pengalaman_manajerial'].sts_token_dokumen_pengalaman);
                    if (response['row_excel_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                        $('.button_enkrip_pengalaman').html('<a href="javascript:;"  onclick="DekripEnkrip_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_kontrak_pengalaman').html('<a href="javascript:;"  onclick="Download_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                    $('[name="id_pengalaman"]').val(response['row_excel_pengalaman_manajerial'].id_pengalaman);
                    $('[name="id_url"]').val(response['row_excel_pengalaman_manajerial'].id_url);
                    $('[name="no_kontrak"]').val(response['row_excel_pengalaman_manajerial'].no_kontrak);
                    $('[name="nama_pekerjaan"]').val(response['row_excel_pengalaman_manajerial'].nama_pekerjaan);
                    $('[name="id_jenis_usaha"]').val(response['row_excel_pengalaman_manajerial'].id_jenis_usaha);
                    $('[name="tanggal_kontrak"]').val(response['row_excel_pengalaman_manajerial'].tanggal_kontrak);
                    $('[name="instansi_pemberi"]').val(response['row_excel_pengalaman_manajerial'].instansi_pemberi);
                    $('[name="nilai_kontrak"]').val(response['row_excel_pengalaman_manajerial'].nilai_kontrak);
                    $('[name="lokasi_pekerjaan"]').val(response['row_excel_pengalaman_manajerial'].lokasi_pekerjaan);
                    $('[name="file_kontrak_pengalaman"]').val(response['row_excel_pengalaman_manajerial'].file_kontrak_pengalaman);
                } else if (type == 'hapus') {
                    // Question_hapus_excel_pengalaman(response['row_excel_pengalaman_manajerial'].id_url, response['row_excel_pengalaman_manajerial'].nama_pekerjaan);
                } else {

                }
            }
        })
    }


    var form_edit_excel_pengalaman_manajerial = $('#form_edit_excel_pengalaman_manajerial');
    var modal_edit_excel_pengalaman_manajerial = $('#modal_edit_excel_pengalaman_manajerial');
    form_edit_excel_pengalaman_manajerial.on('submit', function(e) {
        e.preventDefault();
        var validasi_enkripsi_pengalaman = $('[name="validasi_enkripsi_pengalaman"]').val();
        if (validasi_enkripsi_pengalaman == 2) {
            Swal.fire('Waduh Maaf!', 'Enkripsi File Terlebih Dahulu Yaa!', 'warning');
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>datapenyedia/edit_excel_pengalaman_manajerial",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan').attr('disabled', 'disabled');
                },
                success: function(response) {
                    modal_edit_excel_pengalaman_manajerial.modal('hide')
                    Swal.fire('Good job!', 'Data Beharhasil Di Edit!', 'success');
                    reloaddata_excel_pengalaman_manajerial()
                    reloaddata_pengalaman_manajerial();
                    $('.btn_simpan').attr('disabled', false);
                    form_edit_excel_pengalaman_manajerial[0].reset();
                }
            });
        }
    });




    var form_simpan_pengalaman = $('#form_simpan_pengalaman');
    var modal_pengalaman = $('#modal-xl-pengalaman');
    form_simpan_pengalaman.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/buat_pengalaman",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                modal_pengalaman.modal('hide')
                Swal.fire('Good job!', 'Data Beharhasil Di Buat!', 'success');
                reloaddata_pengalaman_manajerial()
                $('.btn_simpan').attr('disabled', false);
                form_simpan_pengalaman[0].reset();
            }
        });
    });

    var form_import_excel_pengalaman = $('#form_import_excel_pengalaman');
    form_import_excel_pengalaman.on('submit', function(e) {
        console.log('berhasil');
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/import_pengalaman_perusahaan",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                $('.btn_simpan').attr('disabled', false);
                if (response['message']) {
                    Swal.fire('Good job!', 'Behasil Import Excel', 'success');
                    reloaddata_excel_pengalaman_manajerial()
                    form_import_excel_pengalaman[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    reloaddata_excel_pengalaman_manajerial()
                    reloaddata_pengalaman_manajerial();
                    form_import_excel_pengalaman[0].reset();
                }
            }
        });
    });


    function Question_hapus_excel_pengalaman(id_url, nama_pekerjaan) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data' + nama_pekerjaan + 'Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_import_excel_pengalaman/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_excel_pengalaman_manajerial()
                    }
                })
            }
        });
    }

    function Simpan_import_pengalaman() {
        var form_import_excel_pengalaman = $('#form_import_excel_pengalaman');
        $.ajax({
            type: "POST",
            url: '<?= base_url('datapenyedia/simpan_import_excel_pengalaman') ?>',
            dataType: "JSON",
            beforeSend: function() {
                $('.data_tervalidasi_pengalaman').css('display', 'none');
            },
            success: function(response) {
                Swal.fire('Good job!', 'Data Beharhasil Simpan!', 'success');
                form_import_excel_pengalaman[0].reset();
                reloaddata_excel_pengalaman_manajerial();
                reloaddata_pengalaman_manajerial();
                if (response['validasi']) {
                    $('.data_tervalidasi_pengalaman').css('display', 'block');
                    setTimeout(() => {
                        $('.data_tervalidasi_pengalaman').css('display', 'none');
                    }, 5000);
                    var html = '';
                    var i;
                    for (i = 0; i < response['validasi'].length; i++) {
                        html += '<tr>' +
                            '<td>' + response['validasi'][i].no_kontrak + '</td>' +
                            '<td>' + response['validasi'][i].nama_pekerjaan + '</td>' +
                            '</tr>'
                    }
                    $('.data_tervalidasi_excel_pengalaman').html(html);
                } else {

                }
            }
        })
    }


    function Hapus_import_pengalaman() {
        Swal.fire({
            title: "Anda Yakin",
            text: 'Semua Data Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_import_excel_pengalaman') ?>',
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_excel_pengalaman_manajerial()

                    }
                })
            }
        });
    }

    function DekripEnkrip_pengalaman(id_url, type) {
        var type_edit_pengalaman = $('[name="type_edit_pengalaman"]').val();
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: '<?= base_url('datapenyedia/dekrip_enkrip_pengalaman/') ?>' + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengalaman: type_edit_pengalaman
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
                            Swal.fire('Dokumen Berhasil Di Dekripsi', '', 'success');
                            if (response['type_edit_pengalaman'] == 'edit_excel') {
                                $('[name="validasi_enkripsi_pengalaman"]').val(response['row_excel_pengalaman_manajerial'].sts_token_dokumen_pengalaman);
                                if (response['row_excel_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;"  onclick="DekripEnkrip_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_kontrak_pengalaman').html('<a href="javascript:;"  onclick="Download_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                                reloaddata_excel_pengalaman_manajerial();
                            } else {
                                $('[name="validasi_enkripsi_pengalaman"]').val(response['row_pengalaman_manajerial'].sts_token_dokumen_pengalaman);
                                if (response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;"  onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_kontrak_pengalaman').html('<a href="javascript:;"  onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                                reloaddata_pengalaman_manajerial();
                            }
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
                url: '<?= base_url('datapenyedia/dekrip_enkrip_pengalaman/') ?>' + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengalaman: type_edit_pengalaman
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
                            Swal.fire('Dokumen Berhasil Di Dekripsi', '', 'success');
                            if (response['type_edit_pengalaman'] == 'edit_excel') {
                                $('[name="validasi_enkripsi_pengalaman"]').val(response['row_excel_pengalaman_manajerial'].sts_token_dokumen_pengalaman);
                                if (response['row_excel_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;"  onclick="DekripEnkrip_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_kontrak_pengalaman').html('<a href="javascript:;"  onclick="Download_pengalaman(\'' + response['row_excel_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                                reloaddata_excel_pengalaman_manajerial();
                            } else {
                                $('[name="validasi_enkripsi_pengalaman"]').val(response['row_pengalaman_manajerial'].sts_token_dokumen_pengalaman);
                                if (response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;"  onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_kontrak_pengalaman').html('<a href="javascript:;"  onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                                reloaddata_pengalaman_manajerial();
                            }
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


    function by_id_pengalaman_manajerial(id_pengalaman, type) {
        var modal_edit_excel_pengalaman_manajerial = $('#modal_edit_excel_pengalaman_manajerial');
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
            url: '<?= base_url('datapenyedia/by_id_pengalaman_manajerial/') ?>' + id_pengalaman,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pengalaman_manajerial.modal('show');
                    $('[name="type_edit_pengalaman"]').val('edit_biasa');
                    $('[name="validasi_enkripsi_pengalaman"]').val(response['row_pengalaman_manajerial'].sts_token_dokumen_pengalaman);
                    if (response['row_pengalaman_manajerial']['sts_token_dokumen_pengalaman'] == 1) {
                        $('.button_enkrip_pengalaman').html('<a href="javascript:;"  onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pengalaman').html('<a href="javascript:;" onclick="DekripEnkrip_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_kontrak_pengalaman').html('<a href="javascript:;"  onclick="Download_pengalaman(\'' + response['row_pengalaman_manajerial'].id_url + '\'' + ',' + '\'' + 'pengalaman_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengalaman_manajerial'].file_kontrak_pengalaman + '</a>');
                    $('[name="id_pengalaman"]').val(response['row_pengalaman_manajerial'].id_pengalaman);
                    $('[name="id_url"]').val(response['row_pengalaman_manajerial'].id_url);
                    $('[name="no_kontrak"]').val(response['row_pengalaman_manajerial'].no_kontrak);
                    $('[name="nama_pekerjaan"]').val(response['row_pengalaman_manajerial'].nama_pekerjaan);
                    $('[name="id_jenis_usaha"]').val(response['row_pengalaman_manajerial'].id_jenis_usaha);
                    $('[name="tanggal_kontrak"]').val(response['row_pengalaman_manajerial'].tanggal_kontrak);
                    $('[name="instansi_pemberi"]').val(response['row_pengalaman_manajerial'].instansi_pemberi);
                    $('[name="nilai_kontrak"]').val(response['row_pengalaman_manajerial'].nilai_kontrak);
                    $('[name="lokasi_pekerjaan"]').val(response['row_pengalaman_manajerial'].lokasi_pekerjaan);
                    $('[name="file_kontrak_pengalaman"]').val(response['row_pengalaman_manajerial'].file_kontrak_pengalaman);
                } else if (type == 'hapus') {
                    Question_hapus_pengalaman(response['row_pengalaman_manajerial'].id_url, response['row_pengalaman_manajerial'].nama_pekerjaan);
                } else {

                }
            }
        })
    }

    function Question_hapus_pengalaman(id_url, nama_pekerjaan) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data' + nama_pekerjaan + 'Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_pengalaman/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_pengalaman_manajerial()
                    }
                })
            }
        });
    }
</script>