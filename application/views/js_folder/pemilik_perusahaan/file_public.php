<script>
    // GET TABLE KBLI NIB
    var data_excel_pemilik_manajerial = $('#data_excel_pemilik_manajerial')
    $(document).ready(function() {
        var url_data_excel_pemilik_manajerial = $('[name="url_data_excel_pemilik_manajerial"]').val();
        data_excel_pemilik_manajerial.DataTable({
            "responsive": true,
            "ordering": true,
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
        if (type == 'upload_bpjs') {
            saveData = 'upload_bpjs';
        }
        if (type == 'upload_sk_pengukuhan') {
            saveData = 'upload_sk_pengukuhan';
        }

        $.ajax({
            type: "GET",
            url: '<?= base_url('datapenyedia/by_id_excel_pemilik_menajerial/') ?>' + id_pemilik,
            dataType: "JSON",
            success: function(response) {
                if (type == 'edit') {
                    modal_edit_excel_pemilik_manajerial.modal('show');
                    $('.button_nama_file_ktp').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + id_pemilik + '\'' + ',' + '\'' + 'pemilik_ktp' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_ktp + '</a>');
                    $('.button_nama_file_bpjs').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + id_pemilik + '\'' + ',' + '\'' + 'pemilik_bpjs' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_bpjs + '</a>');
                    $('.button_nama_file_sk').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + id_pemilik + '\'' + ',' + '\'' + 'pemilik_sk' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-file mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_sk_pengukuhan + '</a>');
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
                    $('[name="file_bpjs"]').val(response['row_excel_pemilik_manajerial'].file_bpjs);
                    $('[name="file_sk_pengukuhan"]').val(response['row_excel_pemilik_manajerial'].file_sk_pengukuhan);
                } else {
                    // Question_kbli_nib(id_pemilik, response['row_excel_pemilik_manajerial'].nama_pemilik);
                }
            }
        })
    }

    // edit


    var form_edit_excel_pemilik_manajerial = $('#form_edit_excel_pemilik_manajerial');
    var modal_edit_excel_pemilik_manajerial = $('#modal_edit_excel_pemilik_manajerial');
    form_edit_excel_pemilik_manajerial.on('submit', function(e) {
        e.preventDefault();
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
                $('.btn_simpan').attr('disabled', false);
                form_edit_excel_pemilik_manajerial[0].reset();
            }
        });
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
                if (response['message']) {
                    Swal.fire('Good job!', 'Behasil Import Excel', 'success');
                    reloaddata_excel_pemilik_manajerial()
                    form_import_excel[0].reset();
                } else {
                    Swal.fire('Maaf!', 'Kesalahan', 'warning');
                    reloaddata_excel_pemilik_manajerial()
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
            success: function(response) {
                Swal.fire('Good job!', 'Data Beharhasil Simpan!', 'success');
                form_import_excel[0].reset();
                reloaddata_excel_pemilik_manajerial()
                $('.data_tervalidasi').css('display','block');
                console.log(response['validasi']);
                var html = '';
					var i;
					for (i = 0; i < response['validasi'].length; i++) {
						$hps = response['validasi'][i].hps;
						html += '<tr>' +
							'<td>' + response['validasi'][i].nik + '</td>' +
							'<td>' + response['validasi'][i].nama_pemilik + '</td>' +
							'</tr>'
					}
					$('.data_tervalidasi_excel').html(html);
            }
        })
    }

    function Hapus_import_pemilik() {
        Swal.fire({
            title: "Data Di Hapus",
            text: 'Kbli Ini Mau Di hapus?',
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
                        if (response['message'] == 'success') {
                            Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                            form_simpan_kbli_nib[0].reset();
                            reloadTable_kbli_nib()
                        } else {
                            Swal.fire('Maaf', response['maaf'], 'warning');
                        }
                    }
                })
            }
        });
    }
</script>