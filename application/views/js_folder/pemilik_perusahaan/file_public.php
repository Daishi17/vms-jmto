<script>
    // GET TABLE KBLI NIB
    var data_excel_pemilik_manajerial = $('#data_excel_pemilik_manajerial')
    $(document).ready(function() {
        var url_data_excel_pemilik_manajerial = $('[name="url_data_excel_pemilik_manajerial"]').val();
        data_excel_pemilik_manajerial.DataTable({
            "ordering": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_data_excel_pemilik_manajerial') ?>',
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
        }).buttons().container().appendTo('#data_excel_pemilik_manajerial .col-md-6:eq(0)');
    });

    function reloaddata_excel_pemilik_manajerial() {
        data_excel_pemilik_manajerial.DataTable().ajax.reload();
    }


    // GET TABLE KBLI NIB
    var data_pemilik_manajerial = $('#data_pemilik_manajerial')
    $(document).ready(function() {
        // var url_data_pemilik_manajerial = $('[name="url_data_pemilik_manajerial"]').val();
        data_pemilik_manajerial.DataTable({
            "ordering": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_data_pemilik_manajerial') ?>',
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
        }).buttons().container().appendTo('#data_pemilik_manajerial .col-md-6:eq(0)');
    });

    function reloaddata_pemilik_manajerial() {
        data_pemilik_manajerial.DataTable().ajax.reload();
    }


    function by_id_excel_pemilik_manajerial(id_pemilik, type) {
        var modal_edit_excel_pemilik_manajerial = $('#modal_edit_excel_pemilik_manajerial');
        // var url_byid_kbli_nib = $('[name="url_byid_kbli_nib"]').val();
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
            url: '<?= base_url('datapenyedia/by_id_excel_pemilik_menajerial/') ?>' + id_pemilik,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pemilik_manajerial.modal('show');
                    $('[name="type_edit_pemilik"]').val('edit_excel');
                    $('[name="validasi_enkripsi_pemilik"]').val(response['row_excel_pemilik_manajerial'].sts_token_dokumen_pemilik);
                    if (response['row_excel_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                        $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_ktp + '</a>');
                    $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_npwp + '</a>');
                    $('[name="id_pemilik"]').val(response['row_excel_pemilik_manajerial'].id_pemilik);
                    $('[name="id_url"]').val(response['row_excel_pemilik_manajerial'].id_url);
                    $('[name="nik"]').val(response['row_excel_pemilik_manajerial'].nik);
                    $('[name="nama_pemilik"]').val(response['row_excel_pemilik_manajerial'].nama_pemilik);
                    $('[name="jns_pemilik"]').val(response['row_excel_pemilik_manajerial'].jns_pemilik);
                    $('[name="alamat_pemilik"]').val(response['row_excel_pemilik_manajerial'].alamat_pemilik);
                    $('[name="npwp"]').val(response['row_excel_pemilik_manajerial'].npwp);
                    $('[name="warganegara"]').val(response['row_excel_pemilik_manajerial'].warganegara);
                    $('[name="saham"]').val(response['row_excel_pemilik_manajerial'].saham);
                    $('[name="file_ktp"]').val(response['row_excel_pemilik_manajerial'].file_ktp);
                    $('[name="file_npwp"]').val(response['row_excel_pemilik_manajerial'].file_npwp);
                } else if (type == 'hapus') {
                    Question_hapus_excel_pemilik(response['row_excel_pemilik_manajerial'].id_url, response['row_excel_pemilik_manajerial'].nama_pemilik);
                } else {

                }
            }
        })
    }

    function Question_hapus_excel_pemilik(id_url, nama_pemilik) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data' + nama_pemilik + 'Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_import_excel_pemilik/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_excel_pemilik_manajerial()
                    }
                })
            }
        });
    }


    function Hapus_import_pemilik() {
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
                    url: '<?= base_url('datapenyedia/hapus_import_excel_pemilik') ?>',
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_excel_pemilik_manajerial()

                    }
                })
            }
        });
    }

    function DekripEnkrip_pemilik(id_url, type) {
        var type_edit_pemilik = $('[name="type_edit_pemilik"]').val();
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: '<?= base_url('datapenyedia/dekrip_enkrip_pemilik/') ?>' + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pemilik: type_edit_pemilik
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
                            if (response['type_edit_pemilik'] == 'edit_excel') {
                                $('[name="validasi_enkripsi_pemilik"]').val(response['row_excel_pemilik_manajerial'].sts_token_dokumen_pemilik);
                                if (response['row_excel_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_ktp + '</a>');
                                $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_npwp + '</a>');
                                reloaddata_excel_pemilik_manajerial();
                            } else {
                                $('[name="validasi_enkripsi_pemilik"]').val(response['row_pemilik_manajerial'].sts_token_dokumen_pemilik);
                                if (response['row_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_ktp + '</a>');
                                $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_npwp + '</a>');
                                reloaddata_pemilik_manajerial();
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
                url: '<?= base_url('datapenyedia/dekrip_enkrip_pemilik/') ?>' + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pemilik: type_edit_pemilik
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
                            if (response['type_edit_pemilik'] == 'edit_excel') {
                                $('[name="validasi_enkripsi_pemilik"]').val(response['row_excel_pemilik_manajerial'].sts_token_dokumen_pemilik);
                                if (response['row_excel_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_ktp + '</a>');
                                $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_excel_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_npwp + '</a>');
                                reloaddata_excel_pemilik_manajerial();
                            } else {
                                $('[name="validasi_enkripsi_pemilik"]').val(response['row_pemilik_manajerial'].sts_token_dokumen_pemilik);
                                if (response['row_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_ktp + '</a>');
                                $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_npwp + '</a>');
                                reloaddata_pemilik_manajerial();
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

    function Download_pemilik(id_url, type) {
        // var url_download_nib = $('[name="url_download_nib"]').val()
        location.href = '<?= base_url('datapenyedia/url_download_pemilik/') ?>' + id_url + '/' + type;
    }


    var form_simpan_manajerial_pemilik = $('#form_simpan_manajerial_pemilik');
    var modal_xl_pemilik = $('#modal-xl-pemilik');
    form_simpan_manajerial_pemilik.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/buat_pemilik_manajerial",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                modal_xl_pemilik.modal('hide')
                Swal.fire('Good job!', 'Data Beharhasil Di Buat!', 'success');
                reloaddata_pemilik_manajerial()
                $('.btn_simpan').attr('disabled', false);
                form_simpan_manajerial_pemilik[0].reset();
            }
        });
    });

    function by_id_pemilik_manajerial(id_pemilik, type) {
        var modal_edit_excel_pemilik_manajerial = $('#modal_edit_excel_pemilik_manajerial');
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
            url: '<?= base_url('datapenyedia/by_id_pemilik_manajerial/') ?>' + id_pemilik,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pemilik_manajerial.modal('show');
                    $('[name="type_edit_pemilik"]').val('edit_biasa');
                    $('[name="validasi_enkripsi_pemilik"]').val(response['row_pemilik_manajerial'].sts_token_dokumen_pemilik);
                    if (response['row_pemilik_manajerial']['sts_token_dokumen_pemilik'] == 1) {
                        $('.button_enkrip_pemilik').html('<a href="javascript:;"  onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pemilik').html('<a href="javascript:;" onclick="DekripEnkrip_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_ktp + '</a>');
                    $('.button_nama_file_npwp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + response['row_pemilik_manajerial'].id_url + '\'' + ',' + '\'' + 'pemilik_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pemilik_manajerial'].file_npwp + '</a>');
                    $('[name="id_pemilik"]').val(response['row_pemilik_manajerial'].id_pemilik);
                    $('[name="id_url"]').val(response['row_pemilik_manajerial'].id_url);
                    $('[name="nik"]').val(response['row_pemilik_manajerial'].nik);
                    $('[name="nama_pemilik"]').val(response['row_pemilik_manajerial'].nama_pemilik);
                    $('[name="jns_pemilik"]').val(response['row_pemilik_manajerial'].jns_pemilik);
                    $('[name="alamat_pemilik"]').val(response['row_pemilik_manajerial'].alamat_pemilik);
                    $('[name="npwp"]').val(response['row_pemilik_manajerial'].npwp);
                    $('[name="warganegara"]').val(response['row_pemilik_manajerial'].warganegara);
                    $('[name="saham"]').val(response['row_pemilik_manajerial'].saham);
                    $('[name="file_ktp"]').val(response['row_pemilik_manajerial'].file_ktp);
                    $('[name="file_npwp"]').val(response['row_pemilik_manajerial'].file_npwp);
                } else if (type == 'hapus') {
                    Question_hapus_pemilik(response['row_pemilik_manajerial'].id_url, response['row_pemilik_manajerial'].nama_pemilik);
                } else {

                }
            }
        })
    }

    function Question_hapus_pemilik(id_url, nama_pemilik) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data' + nama_pemilik + 'Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_pemilik/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_pemilik_manajerial()
                    }
                })
            }
        });
    }


    // edit


    var form_edit_excel_pemilik_manajerial = $('#form_edit_excel_pemilik_manajerial');
    var modal_edit_excel_pemilik_manajerial = $('#modal_edit_excel_pemilik_manajerial');
    form_edit_excel_pemilik_manajerial.on('submit', function(e) {
        e.preventDefault();
        var validasi_enkripsi_pemilik = $('[name="validasi_enkripsi_pemilik"]').val();
        if (validasi_enkripsi_pemilik == 2) {
            Swal.fire('Waduh Maaf!', 'Enkripsi File Terlebih Dahulu Yaa!', 'warning');
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>datapenyedia/edit_excel_pemilik_manajerial",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan').attr('disabled', 'disabled');
                },
                success: function(response) {
                    modal_edit_excel_pemilik_manajerial.modal('hide')
                    Swal.fire('Good job!', 'Data Beharhasil Di Edit!', 'success');
                    reloaddata_excel_pemilik_manajerial()
                    reloaddata_pemilik_manajerial();
                    $('.btn_simpan').attr('disabled', false);
                    form_edit_excel_pemilik_manajerial[0].reset();
                }
            });
        }
    });





    var form_import_excel = $('#form_import_excel');
    form_import_excel.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/import_pemilik_perusahaan",
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
                    reloaddata_excel_pemilik_manajerial()
                    form_import_excel[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    reloaddata_excel_pemilik_manajerial()
                    reloaddata_pemilik_manajerial();
                    form_import_excel[0].reset();
                }
            }
        });
    });

    function Simpan_import_pemilik() {
        $.ajax({
            type: "POST",
            url: '<?= base_url('datapenyedia/simpan_import_excel_pemilik') ?>',
            dataType: "JSON",
            beforeSend: function() {
                $('.data_tervalidasi').css('display', 'none');
            },
            success: function(response) {
                Swal.fire('Good job!', 'Data Beharhasil Simpan!', 'success');
                form_import_excel[0].reset();
                reloaddata_excel_pemilik_manajerial();
                reloaddata_pemilik_manajerial();
                if (response['validasi']) {
                    $('.data_tervalidasi').css('display', 'block');
                    setTimeout(() => {
                        $('.data_tervalidasi').css('display', 'none');
                    }, 5000);
                    var html = '';
                    var i;
                    for (i = 0; i < response['validasi'].length; i++) {
                        html += '<tr>' +
                            '<td>' + response['validasi'][i].nik + '</td>' +
                            '<td>' + response['validasi'][i].nama_pemilik + '</td>' +
                            '</tr>'
                    }
                    $('.data_tervalidasi_excel').html(html);
                } else {

                }
            }
        })
    }
</script>

<!-- INI UNTUK PENGURUS -->
<script>

var data_pengurus_manajerial = $('#data_pengurus_manajerial')
    $(document).ready(function() {
        // var url_data_pengurus_manajerial = $('[name="url_data_pengurus_manajerial"]').val();
        data_pengurus_manajerial.DataTable({
            "ordering": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_data_pengurus_manajerial') ?>',
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
        }).buttons().container().appendTo('#data_pengurus_manajerial .col-md-6:eq(0)');
    });

    function reloaddata_pengurus_manajerial() {
        data_pengurus_manajerial.DataTable().ajax.reload();
    }

    function Download_pengurus(id_url, type) {
        // var url_download_nib = $('[name="url_download_nib"]').val()
        location.href = '<?= base_url('datapenyedia/url_download_pengurus/') ?>' + id_url + '/' + type;
    }

    var form_simpan_manajerial_pengurus = $('#form_simpan_manajerial_pengurus');
    var modal_xl_pengurus = $('#modal-xl-pengurus');
    form_simpan_manajerial_pengurus.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/buat_pengurus_manajerial",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.btn_simpan').attr('disabled', 'disabled');
            },
            success: function(response) {
                modal_xl_pengurus.modal('hide')
                Swal.fire('Good job!', 'Data Beharhasil Di Buat!', 'success');
                // reloaddata_pengurus_manajerial()
                $('.btn_simpan').attr('disabled', false);
                form_simpan_manajerial_pengurus[0].reset();
            }
        });
    });


    var data_excel_pengurus_manajerial = $('#data_excel_pengurus_manajerial')
    $(document).ready(function() {
        var url_data_excel_pengurus_manajerial = $('[name="url_data_excel_pengurus_manajerial"]').val();
        data_excel_pengurus_manajerial.DataTable({
            "ordering": true,
            "autoWidth": true,
            "processing": true,
            "serverSide": true,
            "bDestroy": true,
            "dom": 'Bfrtip',
            "buttons": ["excel", "pdf", "print", "colvis"],
            "order": [],
            "ajax": {
                "url": '<?= base_url('datapenyedia/get_data_excel_pengurus_manajerial') ?>',
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
        }).buttons().container().appendTo('#data_excel_pengurus_manajerial .col-md-6:eq(0)');
    });

    function reloaddata_excel_pengurus_manajerial() {
        data_excel_pengurus_manajerial.DataTable().ajax.reload();
    }



    function by_id_excel_pengurus_manajerial(id_pengurus, type) {
        var modal_edit_excel_pengurus_manajerial = $('#modal_edit_excel_pengurus_manajerial');
        // var url_byid_kbli_nib = $('[name="url_byid_kbli_nib"]').val();
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
            url: '<?= base_url('datapenyedia/by_id_excel_pengurus_menajerial/') ?>' + id_pengurus,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pengurus_manajerial.modal('show');
                    $('[name="type_edit_pengurus"]').val('edit_excel');
                    $('[name="validasi_enkripsi_pengurus"]').val(response['row_excel_pengurus_manajerial'].sts_token_dokumen_pengurus);
                    if (response['row_excel_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                        $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                    $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                    $('[name="id_pengurus"]').val(response['row_excel_pengurus_manajerial'].id_pengurus);
                    $('[name="id_url"]').val(response['row_excel_pengurus_manajerial'].id_url);
                    $('[name="nik_pengurus"]').val(response['row_excel_pengurus_manajerial'].nik);
                    $('[name="nama_pengurus"]').val(response['row_excel_pengurus_manajerial'].nama_pengurus);
                    $('[name="alamat_pengurus"]').val(response['row_excel_pengurus_manajerial'].alamat_pengurus);
                    $('[name="npwp_pengurus"]').val(response['row_excel_pengurus_manajerial'].npwp);
                    $('[name="warganegara_pengurus"]').val(response['row_excel_pengurus_manajerial'].warganegara);
                    $('[name="jabatan_pengurus"]').val(response['row_excel_pengurus_manajerial'].jabatan_pengurus);
                    $('[name="jabatan_mulai"]').val(response['row_excel_pengurus_manajerial'].jabatan_mulai);
                    $('[name="jabatan_selesai"]').val(response['row_excel_pengurus_manajerial'].jabatan_selesai);
                    $('[name="file_ktp_pengurus"]').val(response['row_excel_pengurus_manajerial'].file_ktp_pengurus);
                    $('[name="file_npwp_pengurus"]').val(response['row_excel_pengurus_manajerial'].file_npwp_pengurus);
                } else if (type == 'hapus') {
                    Question_hapus_excel_pengurus(response['row_excel_pengurus_manajerial'].id_url, response['row_excel_pengurus_manajerial'].nama_pengurus);
                } else {

                }
            }
        })
    }



    var form_import_excel_pengurus = $('#form_import_excel_pengurus');
    form_import_excel_pengurus.on('submit', function(e) {
        console.log('berhasil');
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/import_pengurus_perusahaan",
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
                    reloaddata_excel_pengurus_manajerial()
                    form_import_excel_pengurus[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    reloaddata_excel_pengurus_manajerial()
                    reloaddata_pengurus_manajerial();
                    form_import_excel_pengurus[0].reset();
                }
            }
        });
    });


    // EDIT REUSABLE
    var form_edit_excel_pengurus_manajerial = $('#form_edit_excel_pengurus_manajerial');
    var modal_edit_excel_pengurus_manajerial = $('#modal_edit_excel_pengurus_manajerial');
    form_edit_excel_pengurus_manajerial.on('submit', function(e) {
        e.preventDefault();
        var validasi_enkripsi_pengurus = $('[name="validasi_enkripsi_pengurus"]').val();
        if (validasi_enkripsi_pengurus == 2) {
            Swal.fire('Waduh Maaf!', 'Enkripsi File Terlebih Dahulu Yaa!', 'warning');
        } else {
            $.ajax({
                url: "<?php echo base_url(); ?>datapenyedia/edit_excel_pengurus_manajerial",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.btn_simpan').attr('disabled', 'disabled');
                },
                success: function(response) {
                    modal_edit_excel_pengurus_manajerial.modal('hide')
                    $('.btn_simpan').attr('disabled', false);
                    Swal.fire('Good job!', 'Data Beharhasil Di Edit!', 'success');
                    reloaddata_excel_pengurus_manajerial()
                    reloaddata_pengurus_manajerial();
                    form_edit_excel_pengurus_manajerial[0].reset();
                }
            });
        }
    });

    function Question_hapus_excel_pengurus(id_url, nama_pengurus) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data' + nama_pengurus + 'Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_import_excel_pengurus/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_excel_pengurus_manajerial()
                    }
                })
            }
        });
    }

    function Simpan_import_pengurus() {
        $.ajax({
            type: "POST",
            url: '<?= base_url('datapenyedia/simpan_import_excel_pengurus') ?>',
            dataType: "JSON",
            beforeSend: function() {
                $('.data_tervalidasi_pengurus').css('display', 'none');
            },
            success: function(response) {
                Swal.fire('Good job!', 'Data Beharhasil Simpan!', 'success');
                form_import_excel[0].reset();
                reloaddata_excel_pengurus_manajerial();
                reloaddata_pengurus_manajerial();
                if (response['validasi']) {
                    $('.data_tervalidasi_pengurus').css('display', 'block');
                    setTimeout(() => {
                        $('.data_tervalidasi_pengurus').css('display', 'none');
                    }, 5000);
                    var html = '';
                    var i;
                    for (i = 0; i < response['validasi'].length; i++) {
                        html += '<tr>' +
                            '<td>' + response['validasi'][i].nik + '</td>' +
                            '<td>' + response['validasi'][i].nama_pengurus + '</td>' +
                            '</tr>'
                    }
                    $('.data_tervalidasi_excel_pengurus').html(html);
                } else {

                }
            }
        })
    }


    function Hapus_import_pengurus() {
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
                    url: '<?= base_url('datapenyedia/hapus_import_excel_pengurus') ?>',
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_excel_pengurus_manajerial()

                    }
                })
            }
        });
    }

    function DekripEnkrip_pengurus(id_url, type) {
        var type_edit_pengurus = $('[name="type_edit_pengurus"]').val();
        if (type == 'dekrip') {
            $.ajax({
                method: "POST",
                url: '<?= base_url('datapenyedia/dekrip_enkrip_pengurus/') ?>' + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengurus: type_edit_pengurus
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
                            if (response['type_edit_pengurus'] == 'edit_excel') {
                                $('[name="validasi_enkripsi_pengurus"]').val(response['row_excel_pengurus_manajerial'].sts_token_dokumen_pengurus);
                                if (response['row_excel_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                                reloaddata_excel_pengurus_manajerial();
                            } else {
                                $('[name="validasi_enkripsi_pengurus"]').val(response['row_pengurus_manajerial'].sts_token_dokumen_pengurus);
                                if (response['row_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                                reloaddata_pengurus_manajerial();
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
                url: '<?= base_url('datapenyedia/dekrip_enkrip_pengurus/') ?>' + id_url,
                dataType: "JSON",
                data: {
                    type: type,
                    type_edit_pengurus: type_edit_pengurus
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
                            if (response['type_edit_pengurus'] == 'edit_excel') {
                                $('[name="validasi_enkripsi_pengurus"]').val(response['row_excel_pengurus_manajerial'].sts_token_dokumen_pengurus);
                                if (response['row_excel_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_excel_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                                reloaddata_excel_pengurus_manajerial();
                            } else {
                                $('[name="validasi_enkripsi_pengurus"]').val(response['row_pengurus_manajerial'].sts_token_dokumen_pengurus);
                                if (response['row_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                                } else {
                                    $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                                }
                                $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                                $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                                reloaddata_pengurus_manajerial();
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

    
    function by_id_pengurus_manajerial(id_pengurus, type) {
        var modal_edit_excel_pengurus_manajerial = $('#modal_edit_excel_pengurus_manajerial');
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
            url: '<?= base_url('datapenyedia/by_id_pengurus_manajerial/') ?>' + id_pengurus,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pengurus_manajerial.modal('show');
                    $('[name="type_edit_pengurus"]').val('edit_biasa');
                    $('[name="validasi_enkripsi_pengurus"]').val(response['row_pengurus_manajerial'].sts_token_dokumen_pengurus);
                    if (response['row_pengurus_manajerial']['sts_token_dokumen_pengurus'] == 1) {
                        $('.button_enkrip_pengurus').html('<a href="javascript:;"  onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    } else {
                        $('.button_enkrip_pengurus').html('<a href="javascript:;" onclick="DekripEnkrip_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    }
                    $('.button_nama_file_ktp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_ktp_pengurus + '</a>');
                    $('.button_nama_file_npwp_pengurus').html('<a href="javascript:;"  onclick="Download_pengurus(\'' + response['row_pengurus_manajerial'].id_url + '\'' + ',' + '\'' + 'pengurus_npwp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_pengurus_manajerial'].file_npwp_pengurus + '</a>');
                    $('[name="id_pengurus"]').val(response['row_pengurus_manajerial'].id_pengurus);
                    $('[name="id_url"]').val(response['row_pengurus_manajerial'].id_url);
                    $('[name="nik_pengurus"]').val(response['row_pengurus_manajerial'].nik);
                    $('[name="nama_pengurus"]').val(response['row_pengurus_manajerial'].nama_pengurus);
                    $('[name="jabatan_pengurus"]').val(response['row_pengurus_manajerial'].jabatan_pengurus);
                    $('[name="alamat_pengurus"]').val(response['row_pengurus_manajerial'].alamat_pengurus);
                    $('[name="npwp_pengurus"]').val(response['row_pengurus_manajerial'].npwp);
                    $('[name="warganegara"]').val(response['row_pengurus_manajerial'].warganegara);
                    $('[name="jabatan_mulai"]').val(response['row_pengurus_manajerial'].jabatan_mulai);
                    $('[name="jabatan_selesai"]').val(response['row_pengurus_manajerial'].jabatan_selesai);
                    $('[name="file_ktp_pengurus"]').val(response['row_pengurus_manajerial'].file_ktp_pengurus);
                    $('[name="file_npwp_pengurus"]').val(response['row_pengurus_manajerial'].file_npwp_pengurus);
                } else if (type == 'hapus') {
                    Question_hapus_pengurus(response['row_pengurus_manajerial'].id_url, response['row_pengurus_manajerial'].nama_pengurus);
                } else {

                }
            }
        })
    }

    function Question_hapus_pengurus(id_url, nama_pengurus) {
        Swal.fire({
            title: "Yakin Mau Hapus",
            text: 'Data' + nama_pengurus + 'Ini Mau Di hapus?',
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: '<?= base_url('datapenyedia/hapus_row_pengurus/') ?>' + id_url,
                    dataType: "JSON",
                    success: function(response) {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        reloaddata_pengurus_manajerial()
                    }
                })
            }
        });
    }

</script>