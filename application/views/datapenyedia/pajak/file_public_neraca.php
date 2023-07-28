<script>
    get_row_vendor_neraca()


    function get_row_vendor_neraca() {
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
                var get_neraca_keuangan = $('[name="get_neraca_keuangan"]').val()
                $(document).ready(function() {
                    $('#tbl_neraca_keuangan').DataTable({
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
                            "url": get_neraca_keuangan + response['id_vendor'],
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
    // crud sppkp
    var form_tambah_neraca = $('#form_tambah_neraca')

    form_tambah_neraca.on('submit', function(e) {
        // nanti kalau sudah migrasi ke js ambil url nya dari view
        var url_post = $('[name="url_post_neraca"]').val()
        e.preventDefault();
        $.ajax({
            url: url_post,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#btn_save_neraca').attr("disabled", true);
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
                        get_row_vendor_neraca();
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

</script>