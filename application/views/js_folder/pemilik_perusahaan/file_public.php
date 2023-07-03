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
                    var ktp = response['row_excel_pemilik_manajerial'].file_ktp;
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
                    $('[name="file_bjps"]').val(response['row_excel_pemilik_manajerial'].file_bjps);
                    $('[name="file_sk_pengukuhan"]').val(response['row_excel_pemilik_manajerial'].file_sk_pengukuhan);
                    $('.button_pemilik_ktp').html('<label>' + ktp + '</label>');
                    $('.button_pemilik_bpjs').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + id_pemilik + '\'' + ',' + '\'' + 'pemilik_bpjs' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_bjps + '</a>');
                    $('.button_pemilik_file_sk_pengukuhan').html('<a href="javascript:;"  onclick="Download_pemilik(\'' + id_pemilik + '\'' + ',' + '\'' + 'pemilik_file_sk_pengukuhan' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> ' + response['row_excel_pemilik_manajerial'].file_sk_pengukuhan + '</a>');
                } else {
                    // Question_kbli_nib(id_pemilik, response['row_excel_pemilik_manajerial'].nama_pemilik);
                }
            }
        })
    }

    // edit
    var form_edit_excel_pemilik_manajerial = $('#form_edit_excel_pemilik_manajerial');
    form_edit_excel_pemilik_manajerial.on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            url: "<?php echo base_url(); ?>datapenyedia/edit_excel_pemilik_manajerial",
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: function() {
            //     $('.btn_simpan').attr('disabled', 'disabled');
            // },
            success: function(response) {
                // messageSwal('success', 'Data Berhasil Di edit!!');
                alert('berhasil')
                reloaddata_excel_pemilik_manajerial()
                $('.btn_simpan').attr('disabled', false);
            }
        });
    });
</script>