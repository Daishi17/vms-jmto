get_row_vendor();

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
            if (response['row_nib']) {
                if (response['row_nib']['sts_validasi'] == 1) {
                    $('#sts_validasi_nib_1').css('display','block');
                    $('#sts_validasi_nib_2').css('display','none');
                } else {
                    $('#sts_validasi_nib_1').css('display','none');
                    $('#sts_validasi_nib_2').css('display','block');
                }
                $('.nomor_surat_nib').attr("readonly", true);
                $('.sts_seumur_hidup_nib').attr("disabled", true);
                $('.tgl_berlaku_nib').attr("readonly", true);
                $('.kualifikasi_izin_nib').attr("disabled", true);
                $('.file_dokumen_nib').attr("readonly", true);
                $('.kbli_nib').attr("readonly", true);
                $('#on_save_nib').attr("disabled", true);
                $('#button_save_kbli_nib').addClass("disabled");
                $('#button_edit_kbli_nib').addClass("disabled");
            } else {
                $('.nomor_surat_nib').attr("readonly", false);
                $('.sts_seumur_hidup_nib').attr("disabled", false);
                $('.tgl_berlaku_nib').attr("readonly", false);
                $('.kualifikasi_izin_nib').attr("disabled", false);
                $('.file_dokumen_nib').attr("readonly", false);
                $('.kbli_nib').attr("readonly", false);
                $('#on_save_nib').attr("disabled", false);
                $('#button_save_kbli_nib').removeClass("disabled");
                $('#button_edit_kbli_nib').removeClass("disabled");
            }

            if (response['row_siup']) {
                if (response['row_siup']['sts_validasi'] == 1) {
                    $('#sts_validasi_siup_1').css('display','block');
                    $('#sts_validasi_siup_2').css('display','none');
                } else {
                    $('#sts_validasi_siup_1').css('display','none');
                    $('#sts_validasi_siup_2').css('display','block');
                }
                $('.nomor_surat_siup').attr("readonly", true);
                $('.sts_seumur_hidup_siup').attr("disabled", true);
                $('.tgl_berlaku_siup').attr("readonly", true);
                $('.kualifikasi_izin_siup').attr("disabled", true);
                $('.file_dokumen_siup').attr("readonly", true);
                $('.kbli_siup').attr("readonly", true);
                $('#on_save_siup').attr("disabled", true);
                $('#button_save_kbli_siup').addClass("disabled");
                $('#button_edit_kbli_siup').addClass("disabled");
            } else {
                $('.nomor_surat_siup').attr("readonly", false);
                $('.sts_seumur_hidup_siup').attr("disabled", false);
                $('.tgl_berlaku_siup').attr("readonly", false);
                $('.kualifikasi_izin_siup').attr("disabled", false);
                $('.file_dokumen_siup').attr("readonly", false);
                $('.kbli_siup').attr("readonly", false);
                $('#on_save_siup').attr("disabled", false);
                $('#button_save_kbli_siup').removeClass("disabled");
                $('#button_edit_kbli_siup').removeClass("disabled");
            }

            if (response['row_sbu']) {
                if (response['row_sbu']['sts_validasi'] == 1) {
                    $('#sts_validasi_sbu_1').css('display','block');
                    $('#sts_validasi_sbu_2').css('display','none');
                } else {
                    $('#sts_validasi_sbu_1').css('display','none');
                    $('#sts_validasi_sbu_2').css('display','block');
                }
                $('.nomor_surat_sbu').attr("readonly", true);
                $('.sts_seumur_hidup_sbu').attr("disabled", true);
                $('.tgl_berlaku_sbu').attr("readonly", true);
                $('.kualifikasi_izin_sbu').attr("disabled", true);
                $('.file_dokumen_sbu').attr("readonly", true);
                $('.kbli_sbu').attr("readonly", true);
                $('#on_save_sbu').attr("disabled", true);
                $('#button_save_kbli_sbu').addClass("disabled");
                $('#button_edit_kbli_sbu').addClass("disabled");
            } else {
                $('.nomor_surat_sbu').attr("readonly", false);
                $('.sts_seumur_hidup_sbu').attr("disabled", false);
                $('.tgl_berlaku_sbu').attr("readonly", false);
                $('.kualifikasi_izin_sbu').attr("disabled", false);
                $('.file_dokumen_sbu').attr("readonly", false);
                $('.kbli_sbu').attr("readonly", false);
                $('#on_save_sbu').attr("disabled", false);
                $('#button_save_kbli_sbu').removeClass("disabled");
                $('#button_edit_kbli_sbu').removeClass("disabled");
            }

            if (response['row_siujk']) {
                if (response['row_siujk']['sts_validasi'] == 1) {
                    $('#sts_validasi_siujk_1').css('display','block');
                    $('#sts_validasi_siujk_2').css('display','none');
                } else {
                    $('#sts_validasi_siujk_1').css('display','none');
                    $('#sts_validasi_siujk_2').css('display','block');
                }
                $('.nomor_surat_siujk').attr("readonly", true);
                $('.sts_seumur_hidup_siujk').attr("disabled", true);
                $('.tgl_berlaku_siujk').attr("readonly", true);
                $('.kualifikasi_izin_siujk').attr("disabled", true);
                $('.file_dokumen_siujk').attr("readonly", true);
                $('.kbli_siujk').attr("readonly", true);
                $('#on_save_siujk').attr("disabled", true);
                $('#button_save_kbli_siujk').addClass("disabled");
                $('#button_edit_kbli_siujk').addClass("disabled");
            } else {
                $('.nomor_surat_siujk').attr("readonly", false);
                $('.sts_seumur_hidup_siujk').attr("disabled", false);
                $('.tgl_berlaku_siujk').attr("readonly", false);
                $('.kualifikasi_izin_siujk').attr("disabled", false);
                $('.file_dokumen_siujk').attr("readonly", false);
                $('.kbli_siujk').attr("readonly", false);
                $('#on_save_siujk').attr("disabled", false);
                $('#button_save_kbli_siujk').removeClass("disabled");
                $('#button_edit_kbli_siujk').removeClass("disabled");
            }

            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                // nib
                var id_url_nib = response['row_nib']['id_url'];
                $('[name="jenis_izin_nib"]').val(response['row_nib']['jenis_izin']);
                $('[name="no_urut_nib"]').val(response['row_nib']['no_urut']);
                $('[name="nomor_surat_nib"]').val(response['row_nib']['nomor_surat']);
                $('[name="tgl_berlaku_nib"]').val(response['row_nib']['tgl_berlaku']);
                $('[name="kualifikasi_izin_nib"]').val(response['row_nib']['kualifikasi_izin']);
                $('.file_dokumen_nib').text(response['row_nib']['file_dokumen'])
                if (response['row_nib']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip_nib').html('<a href="javascript:;"  onclick="DekripEnkrip_nib(\'' + id_url_nib + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_nib']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_nib').html(html2);
                    $('.token_generate_nib').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_nib']['token_dokumen'] + '</textarea></div>');
                } else {
                    $('.button_enkrip_nib').html('<a href="javascript:;" onclick="DekripEnkrip_nib(\'' + id_url_nib + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_nib(\'' + id_url_nib + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_nib']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_nib').html(html2);
                }

                // siup
                var id_url_siup = response['row_siup']['id_url'];
                $('[name="jenis_izin_siup"]').val(response['row_siup']['jenis_izin']);
                $('[name="no_urut_siup"]').val(response['row_siup']['no_urut']);
                $('[name="nomor_surat_siup"]').val(response['row_siup']['nomor_surat']);
                $('[name="kualifikasi_izin_siup"]').val(response['row_siup']['kualifikasi_izin']);
                $('[name="tgl_berlaku_siup"]').val(response['row_siup']['tgl_berlaku']);
                $('.file_dokumen_siup').text(response['row_siup']['file_dokumen'])
                if (response['row_siup']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip_siup').html('<a href="javascript:;"  onclick="DekripEnkrip_siup(\'' + id_url_siup + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_siup']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_siup').html(html2);
                    $('.token_generate_siup').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siup']['token_dokumen'] + '</textarea></div>');
                } else {
                    $('.button_enkrip_siup').html('<a href="javascript:;" onclick="DekripEnkrip_siup(\'' + id_url_siup + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_siup(\'' + id_url_siup + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_siup']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_siup').html(html2);
                }
                // sbu
                var id_url_sbu = response['row_sbu']['id_url'];
                $('[name="jenis_izin_sbu"]').val(response['row_sbu']['jenis_izin']);
                $('[name="no_urut_sbu"]').val(response['row_sbu']['no_urut']);
                $('[name="nomor_surat_sbu"]').val(response['row_sbu']['nomor_surat']);
                $('[name="kualifikasi_izin_sbu"]').val(response['row_sbu']['kualifikasi_izin']);
                $('[name="tgl_berlaku_sbu"]').val(response['row_sbu']['tgl_berlaku']);
                $('.file_dokumen_sbu').text(response['row_sbu']['file_dokumen'])
                if (response['row_sbu']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip_sbu').html('<a href="javascript:;"  onclick="DekripEnkrip_sbu(\'' + id_url_sbu + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_sbu']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_sbu').html(html2);
                    $('.token_generate_sbu').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_sbu']['token_dokumen'] + '</textarea></div>');
                } else {
                    $('.button_enkrip_sbu').html('<a href="javascript:;" onclick="DekripEnkrip_sbu(\'' + id_url_sbu + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_sbu(\'' + id_url_sbu + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_sbu']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_sbu').html(html2);
                }

                // siujk
                var id_url_siujk = response['row_siujk']['id_url'];
                $('[name="jenis_izin_siujk"]').val(response['row_siujk']['jenis_izin']);
                $('[name="no_urut_siujk"]').val(response['row_siujk']['no_urut']);
                $('[name="nomor_surat_siujk"]').val(response['row_siujk']['nomor_surat']);
                $('[name="kualifikasi_izin_siujk"]').val(response['row_siujk']['kualifikasi_izin']);
                $('[name="tgl_berlaku_siujk"]').val(response['row_siujk']['tgl_berlaku']);
                $('.file_dokumen_siujk').text(response['row_siujk']['file_dokumen'])
                if (response['row_siujk']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip_siujk').html('<a href="javascript:;"  onclick="DekripEnkrip_siujk(\'' + id_url_siujk + '\'' + ',' + '\'' + 'dekrip' + '\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                        response['row_siujk']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_siujk').html(html2);
                    $('.token_generate_siujk').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>' + response['row_siujk']['token_dokumen'] + '</textarea></div>');
                } else {
                    $('.button_enkrip_siujk').html('<a href="javascript:;" onclick="DekripEnkrip_siujk(\'' + id_url_siujk + '\'' + ',' + '\'' + 'enkrip' + '\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile_siujk(\'' + id_url_siujk + '\')" class="btn btn-sm btn-warning btn-block">' + response['row_siujk']['file_dokumen'] + '</a>';
                    $('#tampil_dokumen_siujk').html(html2);
                }

            }

        }
    })
}
//  BATAS NIB
function DownloadFile_nib(id_url_nib) {
    var url_download_nib = $('[name="url_download_nib"]').val()
    location.href = url_download_nib + id_url_nib;
}

function DekripEnkrip_nib(id_url_nib, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_nib = $('[name="url_encryption_nib"]').val();
    var modal_dekrip_nib = $('#modal_dekrip_nib');
    if (type == 'dekrip') {
        modal_dekrip_nib.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_nib"]').val(id_url_nib);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_nib + id_url_nib,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
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
                        get_row_vendor();
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

function GenerateDekrip_nib() {
    var url_dekrip_nib = $('[name="url_dekrip_nib"]').val();
    var modal_dekrip_nib = $('#modal_dekrip_nib');
    $.ajax({
        method: "POST",
        url: url_dekrip_nib,
        dataType: "JSON",
        data: $('#form_dekrip_nib').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_nib').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_nib').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_nib').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_nib').css('display', 'none');
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
                        $('#button_dekrip_generate_nib').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_nib').css('display', 'none');
                        modal_dekrip_nib.modal('hide');
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

var form_nib = $('#form_nib')
form_nib.on('submit', function(e) {
    var url_post_nib = $('[name="url_post_nib"]').val();
    var nomor_surat_nib = $('[name="nomor_surat_nib"]').val()
    var sts_seumur_hidup_nib = $('[name="sts_seumur_hidup_nib"]').val()
    if (nomor_surat_nib == '') {
        e.preventDefault();
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    } else if (sts_seumur_hidup_nib == '') {
        Swal.fire(
            'Maaf!',
            'Tanggal Nib Wajib Di Isi!',
            'warning'
        )
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_nib,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_nib').attr("disabled", true);
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
                        $('#on_save_nib').attr("disabled", false);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }
})

function sts_berlaku_nib() {
    var sts_seumur_hidup_nib = $('[name="sts_seumur_hidup_nib"]').val()
    if (sts_seumur_hidup_nib == 1) {
        $('.tgl_berlaku_nib').attr("readonly", false);
    } else {
        $('.tgl_berlaku_nib').attr("readonly", true);
    }
}

function EditChangeGlobal_nib() {
    $('#apply_edit_nib').modal('hide')
    $('.nomor_surat_nib').attr("readonly", false);
    $('.sts_seumur_hidup_nib').attr("disabled", false);
    $('.tgl_berlaku_nib').attr("readonly", false);
    $('.kualifikasi_izin_nib').attr("disabled", false);
    $('.file_dokumen_nib').attr("readonly", false);
    $('.kbli_nib').attr("readonly", false);
    $('.file_dokumen_nib').attr("disabled", false);
    $('#on_save_nib').attr("disabled", false);
    $('#button_save_kbli_nib').removeClass("disabled");
    $('#button_edit_kbli_nib').removeClass("disabled");
}

function BatalChangeGlobal_nib() {
    $('#apply_edit_nib').modal('hide')
    $('.nomor_surat_nib').attr("readonly", true);
    $('.sts_seumur_hidup_nib').attr("disabled", true);
    $('.tgl_berlaku_nib').attr("readonly", true);
    $('.kualifikasi_izin_nib').attr("disabled", true);
    $('.file_dokumen_nib').attr("readonly", true);
    $('.kbli_nib').attr("readonly", true);
    $('.file_dokumen_nib').attr("disabled", true);
    $('#on_save_nib').attr("disabled", true);
    $('#button_save_kbli_nib').addClass("disabled");
    $('#button_edit_kbli_nib').addClass("disabled");
}

$('#modal_dekrip_nib').on('hidden.bs.modal', function() {
    get_row_vendor();
})


// GET TABLE KBLI NIB
var table_kbli_nib = $('#table_kbli_nib')
$(document).ready(function() {
    var url_table_kbli_nib = $('[name="url_table_kbli_nib"]').val();
    table_kbli_nib.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_nib,
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
    }).buttons().container().appendTo('#table_kbli_nib .col-md-6:eq(0)');
});

function reloadTable_kbli_nib() {
    table_kbli_nib.DataTable().ajax.reload();
}

// ADD NIB
function simpan_kbli_nib() {
    var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
    var id_kualifikasi_izin_kbli_nib = $('[name="id_kualifikasi_izin_kbli_nib"]').val();
    var id_kbli_nib = $('[name="id_kbli_nib"]').val();
    var url_tambah_kbli_nib = $('[name="url_tambah_kbli_nib"]').val();
    if (id_kbli_nib == '') {
        Swal.fire(
            'Maaf!',
            'Kbli Wajib Di Isi!',
            'warning'
        )
    } else if (id_kualifikasi_izin_kbli_nib == '') {
        Swal.fire(
            'Maaf!',
            'Kualifikasi Wajib Di Isi!',
            'warning'
        )
    } else {
        $.ajax({
            method: "POST",
            url: url_tambah_kbli_nib,
            data: form_simpan_kbli_nib.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response['message'] == 'success') {
                    Swal.fire('Good job!', 'Data Beharhasil Ditambah!', 'success');
                    form_simpan_kbli_nib[0].reset();
                    reloadTable_kbli_nib()
                }
            }
        })
    }
}


function byid_kbli_nib(id_url_kbli_nib, type) {
    var modal_edit_kbli_nib = $('#modal_edit_kbli_nib');
    var url_byid_kbli_nib = $('[name="url_byid_kbli_nib"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_nib + id_url_kbli_nib,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_nib.modal('show');
                $('[name="id_url_kbli_nib"]').val(response['row_kbli_nib'].id_url_kbli_nib);
                $('[name="token_kbli_nib"]').val(response['row_kbli_nib'].token_kbli_nib);
                $('[name="id_kbli_nib"]').val(response['row_kbli_nib'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_nib"]').val(response['row_kbli_nib'].id_kualifikasi_izin);
                $('[name="ket_kbli_nib"]').val(response['row_kbli_nib'].ket_kbli_nib);
                $('#pilihan_kbli_nib').html(response['row_kbli_nib'].kode_kbli + ' || ' + response['row_kbli_nib'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_nib').html(response['row_kbli_nib'].nama_kualifikasi);
            } else {
                Question_kbli_nib(id_url_kbli_nib, response['row_kbli_nib'].token_kbli_nib);
            }
        }
    })
}

function Question_kbli_nib(id_url_kbli_nib, token_kbli_nib) {
    var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
    var url_hapus_kbli_nib = $('[name="url_hapus_kbli_nib"]').val();
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
                url: url_hapus_kbli_nib,
                data: {
                    id_url_kbli_nib: id_url_kbli_nib,
                    token_kbli_nib: token_kbli_nib
                },
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

function edit_kbli_nib() {
    var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
    var form_edit_kbli_nib = $('#form_edit_kbli_nib');
    var modal_edit_kbli_nib = $('#modal_edit_kbli_nib');
    var url_edit_kbli_nib = $('[name="url_edit_kbli_nib"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_nib,
        data: form_edit_kbli_nib.serialize(),
        dataType: "JSON",
        success: function(response) {
            if (response['message'] == 'success') {
                modal_edit_kbli_nib.modal('hide');
                Swal.fire('Good job!', 'Data Beharhasil Edit!', 'success');
                form_simpan_kbli_nib[0].reset();
                form_edit_kbli_nib[0].reset();
                reloadTable_kbli_nib();
            } else {
                Swal.fire('Maaf', response['maaf'], 'warning');
                reloadTable_kbli_nib();
            }
        }
    })
}




//  BATAS siup
function DownloadFile_siup(id_url_siup) {
    var url_download_siup = $('[name="url_download_siup"]').val()
    location.href = url_download_siup + id_url_siup;
}

function DekripEnkrip_siup(id_url_siup, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_siup = $('[name="url_encryption_siup"]').val();
    var modal_dekrip_siup = $('#modal_dekrip_siup');
    if (type == 'dekrip') {
        modal_dekrip_siup.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_siup"]').val(id_url_siup);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_siup + id_url_siup,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
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
                        get_row_vendor();
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

function GenerateDekrip_siup() {
    var url_dekrip_siup = $('[name="url_dekrip_siup"]').val();
    var modal_dekrip_siup = $('#modal_dekrip_siup');
    $.ajax({
        method: "POST",
        url: url_dekrip_siup,
        dataType: "JSON",
        data: $('#form_dekrip_siup').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_siup').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_siup').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_siup').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_siup').css('display', 'none');
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
                        $('#button_dekrip_generate_siup').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_siup').css('display', 'none');
                        modal_dekrip_siup.modal('hide');
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

var form_siup = $('#form_siup')
form_siup.on('submit', function(e) {
    var url_post_siup = $('[name="url_post_siup"]').val();
    var nomor_surat_siup = $('[name="nomor_surat_siup"]').val()
    var sts_seumur_hidup_siup = $('[name="sts_seumur_hidup_siup"]').val()
    if (nomor_surat_siup == '') {
        e.preventDefault();
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    } else if (sts_seumur_hidup_siup == '') {
        Swal.fire(
            'Maaf!',
            'Tanggal siup Wajib Di Isi!',
            'warning'
        )
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_siup,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_siup').attr("disabled", true);
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
                        $('#on_save_siup').attr("disabled", false);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }
})

function sts_berlaku_siup() {
    var sts_seumur_hidup_siup = $('[name="sts_seumur_hidup_siup"]').val()
    if (sts_seumur_hidup_siup == 1) {
        $('.tgl_berlaku_siup').attr("readonly", false);
    } else {
        $('.tgl_berlaku_siup').attr("readonly", true);
    }
}

function EditChangeGlobal_siup() {
    $('#apply_edit_siup').modal('hide')
    $('.nomor_surat_siup').attr("readonly", false);
    $('.sts_seumur_hidup_siup').attr("disabled", false);
    $('.tgl_berlaku_siup').attr("readonly", false);
    $('.kualifikasi_izin_siup').attr("disabled", false);
    $('.file_dokumen_siup').attr("readonly", false);
    $('.kbli_siup').attr("readonly", false);
    $('.file_dokumen_siup').attr("disabled", false);
    $('#on_save_siup').attr("disabled", false);
    $('#button_save_kbli_siup').removeClass("disabled");
    $('#button_edit_kbli_siup').removeClass("disabled");
}

function BatalChangeGlobal_siup() {
    $('#apply_edit_siup').modal('hide')
    $('.nomor_surat_siup').attr("readonly", true);
    $('.sts_seumur_hidup_siup').attr("disabled", true);
    $('.tgl_berlaku_siup').attr("readonly", true);
    $('.kualifikasi_izin_siup').attr("disabled", true);
    $('.file_dokumen_siup').attr("readonly", true);
    $('.kbli_siup').attr("readonly", true);
    $('.file_dokumen_siup').attr("disabled", true);
    $('#on_save_siup').attr("disabled", true);
    $('#button_save_kbli_siup').addClass("disabled");
    $('#button_edit_kbli_siup').addClass("disabled");
}

$('#modal_dekrip_siup').on('hidden.bs.modal', function() {
    get_row_vendor();
})


// GET TABLE KBLI siup
var table_kbli_siup = $('#table_kbli_siup')
$(document).ready(function() {
    var url_table_kbli_siup = $('[name="url_table_kbli_siup"]').val();
    table_kbli_siup.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_siup,
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
    }).buttons().container().appendTo('#table_kbli_siup .col-md-6:eq(0)');
});

function reloadTable_kbli_siup() {
    table_kbli_siup.DataTable().ajax.reload();
}

// ADD siup
function simpan_kbli_siup() {
    var form_simpan_kbli_siup = $('#form_simpan_kbli_siup');
    var id_kualifikasi_izin_kbli_siup = $('[name="id_kualifikasi_izin_kbli_siup"]').val();
    var id_kbli_siup = $('[name="id_kbli_siup"]').val();
    var url_tambah_kbli_siup = $('[name="url_tambah_kbli_siup"]').val();
    if (id_kbli_siup == '') {
        Swal.fire(
            'Maaf!',
            'Kbli Wajib Di Isi!',
            'warning'
        )
    } else if (id_kualifikasi_izin_kbli_siup == '') {
        Swal.fire(
            'Maaf!',
            'Kualifikasi Wajib Di Isi!',
            'warning'
        )
    } else {
        $.ajax({
            method: "POST",
            url: url_tambah_kbli_siup,
            data: form_simpan_kbli_siup.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response['message'] == 'success') {
                    Swal.fire('Good job!', 'Data Beharhasil Ditambah!', 'success');
                    form_simpan_kbli_siup[0].reset();
                    reloadTable_kbli_siup()
                }
            }
        })
    }
}


function byid_kbli_siup(id_url_kbli_siup, type) {
    var modal_edit_kbli_siup = $('#modal_edit_kbli_siup');
    var url_byid_kbli_siup = $('[name="url_byid_kbli_siup"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_siup + id_url_kbli_siup,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_siup.modal('show');
                $('[name="id_url_kbli_siup"]').val(response['row_kbli_siup'].id_url_kbli_siup);
                $('[name="token_kbli_siup"]').val(response['row_kbli_siup'].token_kbli_siup);
                $('[name="id_kbli_siup"]').val(response['row_kbli_siup'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_siup"]').val(response['row_kbli_siup'].id_kualifikasi_izin);
                $('[name="ket_kbli_siup"]').val(response['row_kbli_siup'].ket_kbli_siup);
                $('#pilihan_kbli_siup').html(response['row_kbli_siup'].kode_kbli + ' || ' + response['row_kbli_siup'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_siup').html(response['row_kbli_siup'].nama_kualifikasi);
            } else {
                Question_kbli_siup(id_url_kbli_siup, response['row_kbli_siup'].token_kbli_siup);
            }
        }
    })
}

function Question_kbli_siup(id_url_kbli_siup, token_kbli_siup) {
    var form_simpan_kbli_siup = $('#form_simpan_kbli_siup');
    var url_hapus_kbli_siup = $('[name="url_hapus_kbli_siup"]').val();
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
                url: url_hapus_kbli_siup,
                data: {
                    id_url_kbli_siup: id_url_kbli_siup,
                    token_kbli_siup: token_kbli_siup
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['message'] == 'success') {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        form_simpan_kbli_siup[0].reset();
                        reloadTable_kbli_siup()
                    } else {
                        Swal.fire('Maaf', response['maaf'], 'warning');
                    }
                }
            })
        }
    });
}

function edit_kbli_siup() {
    var form_simpan_kbli_siup = $('#form_simpan_kbli_siup');
    var form_edit_kbli_siup = $('#form_edit_kbli_siup');
    var modal_edit_kbli_siup = $('#modal_edit_kbli_siup');
    var url_edit_kbli_siup = $('[name="url_edit_kbli_siup"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_siup,
        data: form_edit_kbli_siup.serialize(),
        dataType: "JSON",
        success: function(response) {
            if (response['message'] == 'success') {
                modal_edit_kbli_siup.modal('hide');
                Swal.fire('Good job!', 'Data Beharhasil Edit!', 'success');
                form_simpan_kbli_siup[0].reset();
                form_edit_kbli_siup[0].reset();
                reloadTable_kbli_siup();
            } else {
                Swal.fire('Maaf', response['maaf'], 'warning');
                reloadTable_kbli_siup();
            }
        }
    })
}


//  BATAS sbu
function DownloadFile_sbu(id_url_sbu) {
  var url_download_sbu = $('[name="url_download_sbu"]').val()
  location.href = url_download_sbu + id_url_sbu;
}

function DekripEnkrip_sbu(id_url_sbu, type) {
  var secret_token = $('[name="secret_token"]').val()
  var url_encryption_sbu = $('[name="url_encryption_sbu"]').val();
  var modal_dekrip_sbu = $('#modal_dekrip_sbu');
  if (type == 'dekrip') {
      modal_dekrip_sbu.modal('show');
      $('input').attr("readonly", false);
      $('[name="id_url_sbu"]').val(id_url_sbu);
  } else {
      $.ajax({
          method: "POST",
          url: url_encryption_sbu + id_url_sbu,
          dataType: "JSON",
          data: {
              secret_token: secret_token,
              type: type
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
                      get_row_vendor();
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

function GenerateDekrip_sbu() {
  var url_dekrip_sbu = $('[name="url_dekrip_sbu"]').val();
  var modal_dekrip_sbu = $('#modal_dekrip_sbu');
  $.ajax({
      method: "POST",
      url: url_dekrip_sbu,
      dataType: "JSON",
      data: $('#form_dekrip_sbu').serialize(),
      beforeSend: function() {
          $('#button_dekrip_generate_sbu').css('display', 'none');
          $('#button_dekrip_generate_manipulasi_sbu').css('display', 'block');
      },
      success: function(response) {
          if (response['maaf']) {
              $('#button_dekrip_generate_sbu').css('display', 'block');
              $('#button_dekrip_generate_manipulasi_sbu').css('display', 'none');
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
                      $('#button_dekrip_generate_sbu').css('display', 'block');
                      $('#button_dekrip_generate_manipulasi_sbu').css('display', 'none');
                      modal_dekrip_sbu.modal('hide');
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

var form_sbu = $('#form_sbu')
form_sbu.on('submit', function(e) {
  var url_post_sbu = $('[name="url_post_sbu"]').val();
  var nomor_surat_sbu = $('[name="nomor_surat_sbu"]').val()
  var sts_seumur_hidup_sbu = $('[name="sts_seumur_hidup_sbu"]').val()
  if (nomor_surat_sbu == '') {
      e.preventDefault();
      Swal.fire(
          'Good job!',
          'You clicked the button!',
          'success'
      )
  } else if (sts_seumur_hidup_sbu == '') {
      Swal.fire(
          'Maaf!',
          'Tanggal SBU Wajib Di Isi!',
          'warning'
      )
  } else {
      e.preventDefault();
      $.ajax({
          url: url_post_sbu,
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function() {
              $('#on_save_sbu').attr("disabled", true);
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
                      $('#on_save_sbu').attr("disabled", false);
                  }
              }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {

                  }
              })
          }
      })
  }
})

function sts_berlaku_sbu() {
  var sts_seumur_hidup_sbu = $('[name="sts_seumur_hidup_sbu"]').val()
  if (sts_seumur_hidup_sbu == 1) {
      $('.tgl_berlaku_sbu').attr("readonly", false);
  } else {
      $('.tgl_berlaku_sbu').attr("readonly", true);
  }
}

function EditChangeGlobal_sbu() {
  $('#apply_edit_sbu').modal('hide')
  $('.nomor_surat_sbu').attr("readonly", false);
  $('.sts_seumur_hidup_sbu').attr("disabled", false);
  $('.tgl_berlaku_sbu').attr("readonly", false);
  $('.kualifikasi_izin_sbu').attr("disabled", false);
  $('.file_dokumen_sbu').attr("readonly", false);
  $('.kbli_sbu').attr("readonly", false);
  $('.file_dokumen_sbu').attr("disabled", false);
  $('#on_save_sbu').attr("disabled", false);
  $('#button_save_kbli_sbu').removeClass("disabled");
  $('#button_edit_kbli_sbu').removeClass("disabled");
}

function BatalChangeGlobal_sbu() {
  $('#apply_edit_sbu').modal('hide')
  $('.nomor_surat_sbu').attr("readonly", true);
  $('.sts_seumur_hidup_sbu').attr("disabled", true);
  $('.tgl_berlaku_sbu').attr("readonly", true);
  $('.kualifikasi_izin_sbu').attr("disabled", true);
  $('.file_dokumen_sbu').attr("readonly", true);
  $('.kbli_sbu').attr("readonly", true);
  $('.file_dokumen_sbu').attr("disabled", true);
  $('#on_save_sbu').attr("disabled", true);
  $('#button_save_kbli_sbu').addClass("disabled");
  $('#button_edit_kbli_sbu').addClass("disabled");
}

$('#modal_dekrip_sbu').on('hidden.bs.modal', function() {
  get_row_vendor();
})


// GET TABLE KBLI sbu
var table_kbli_sbu = $('#table_kbli_sbu')
$(document).ready(function() {
  var url_table_kbli_sbu = $('[name="url_table_kbli_sbu"]').val();
  table_kbli_sbu.DataTable({
      "responsive": false,
      "ordering": true,
      "processing": true,
      "serverSide": true,
      "dom": 'Bfrtip',
      "buttons": ["excel", "pdf", "print", "colvis"],
      "order": [],
      "ajax": {
          "url": url_table_kbli_sbu,
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
  }).buttons().container().appendTo('#table_kbli_sbu .col-md-6:eq(0)');
});

function reloadTable_kbli_sbu() {
  table_kbli_sbu.DataTable().ajax.reload();
}

// ADD sbu
function simpan_kbli_sbu() {
  var form_simpan_kbli_sbu = $('#form_simpan_kbli_sbu');
  var id_kualifikasi_izin_kbli_sbu = $('[name="id_kualifikasi_izin_kbli_sbu"]').val();
  var id_kbli_sbu = $('[name="id_kbli_sbu"]').val();
  var url_tambah_kbli_sbu = $('[name="url_tambah_kbli_sbu"]').val();
  if (id_kbli_sbu == '') {
      Swal.fire(
          'Maaf!',
          'SBU Wajib Di Isi!',
          'warning'
      )
  } else if (id_kualifikasi_izin_kbli_sbu == '') {
      Swal.fire(
          'Maaf!',
          'Kualifikasi Wajib Di Isi!',
          'warning'
      )
  } else {
      $.ajax({
          method: "POST",
          url: url_tambah_kbli_sbu,
          data: form_simpan_kbli_sbu.serialize(),
          dataType: "JSON",
          success: function(response) {
              if (response['message'] == 'success') {
                  Swal.fire('Good job!', 'Data Beharhasil Ditambah!', 'success');
                  form_simpan_kbli_sbu[0].reset();
                  reloadTable_kbli_sbu()
              }
          }
      })
  }
}


function byid_kbli_sbu(id_url_kbli_sbu, type) {
  var modal_edit_kbli_sbu = $('#modal_edit_kbli_sbu');
  var url_byid_kbli_sbu = $('[name="url_byid_kbli_sbu"]').val();
  if (type == 'edit') {
      saveData = 'edit';
  }

  if (type == 'hapus') {
      saveData = 'hapus';
  }

  $.ajax({
      type: "GET",
      url: url_byid_kbli_sbu + id_url_kbli_sbu,
      dataType: "JSON",
      success: function(response) {
          if (type == 'edit') {
              modal_edit_kbli_sbu.modal('show');
              $('[name="id_url_kbli_sbu"]').val(response['row_kbli_sbu'].id_url_kbli_sbu);
              $('[name="token_kbli_sbu"]').val(response['row_kbli_sbu'].token_kbli_sbu);
              $('[name="id_kbli_sbu"]').val(response['row_kbli_sbu'].id_kbli);
              $('[name="id_kualifikasi_izin_kbli_sbu"]').val(response['row_kbli_sbu'].id_kualifikasi_izin);
              $('[name="ket_kbli_sbu"]').val(response['row_kbli_sbu'].ket_kbli_sbu);
              $('#pilihan_kbli_sbu').html(response['row_kbli_sbu'].kode_sbu + ' || ' + response['row_kbli_sbu'].nama_sbu);
              $('#pilihan_kualifikasi_kbli_sbu').html(response['row_kbli_sbu'].nama_kualifikasi);
          } else {
              Question_kbli_sbu(id_url_kbli_sbu, response['row_kbli_sbu'].token_kbli_sbu);
          }
      }
  })
}

function Question_kbli_sbu(id_url_kbli_sbu, token_kbli_sbu) {
  var form_simpan_kbli_sbu = $('#form_simpan_kbli_sbu');
  var url_hapus_kbli_sbu = $('[name="url_hapus_kbli_sbu"]').val();
  Swal.fire({
      title: "Data Di Hapus",
      text: 'SBU Ini Mau Di hapus?',
      icon: "warning",
      buttons: true,
      dangerMode: true,
  }).then((willDelete) => {
      if (willDelete) {
          $.ajax({
              type: "POST",
              url: url_hapus_kbli_sbu,
              data: {
                  id_url_kbli_sbu: id_url_kbli_sbu,
                  token_kbli_sbu: token_kbli_sbu
              },
              dataType: "JSON",
              success: function(response) {
                  if (response['message'] == 'success') {
                      Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                      form_simpan_kbli_sbu[0].reset();
                      reloadTable_kbli_sbu()
                  } else {
                      Swal.fire('Maaf', response['maaf'], 'warning');
                  }
              }
          })
      }
  });
}

function edit_kbli_sbu() {
  var form_simpan_kbli_sbu = $('#form_simpan_kbli_sbu');
  var form_edit_kbli_sbu = $('#form_edit_kbli_sbu');
  var modal_edit_kbli_sbu = $('#modal_edit_kbli_sbu');
  var url_edit_kbli_sbu = $('[name="url_edit_kbli_sbu"]').val();
  $.ajax({
      method: "POST",
      url: url_edit_kbli_sbu,
      data: form_edit_kbli_sbu.serialize(),
      dataType: "JSON",
      success: function(response) {
          if (response['message'] == 'success') {
              modal_edit_kbli_sbu.modal('hide');
              Swal.fire('Good job!', 'Data Beharhasil Edit!', 'success');
              form_simpan_kbli_sbu[0].reset();
              form_edit_kbli_sbu[0].reset();
              reloadTable_kbli_sbu();
          } else {
              Swal.fire('Maaf', response['maaf'], 'warning');
              reloadTable_kbli_sbu();
          }
      }
  })
}


//  BATAS siujk
function DownloadFile_siujk(id_url_siujk) {
    var url_download_siujk = $('[name="url_download_siujk"]').val()
    location.href = url_download_siujk + id_url_siujk;
}

function DekripEnkrip_siujk(id_url_siujk, type) {
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_siujk = $('[name="url_encryption_siujk"]').val();
    var modal_dekrip_siujk = $('#modal_dekrip_siujk');
    if (type == 'dekrip') {
        modal_dekrip_siujk.modal('show');
        $('input').attr("readonly", false);
        $('[name="id_url_siujk"]').val(id_url_siujk);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_siujk + id_url_siujk,
            dataType: "JSON",
            data: {
                secret_token: secret_token,
                type: type
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
                        get_row_vendor();
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

function GenerateDekrip_siujk() {
    var url_dekrip_siujk = $('[name="url_dekrip_siujk"]').val();
    var modal_dekrip_siujk = $('#modal_dekrip_siujk');
    $.ajax({
        method: "POST",
        url: url_dekrip_siujk,
        dataType: "JSON",
        data: $('#form_dekrip_siujk').serialize(),
        beforeSend: function() {
            $('#button_dekrip_generate_siujk').css('display', 'none');
            $('#button_dekrip_generate_manipulasi_siujk').css('display', 'block');
        },
        success: function(response) {
            if (response['maaf']) {
                $('#button_dekrip_generate_siujk').css('display', 'block');
                $('#button_dekrip_generate_manipulasi_siujk').css('display', 'none');
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
                        $('#button_dekrip_generate_siujk').css('display', 'block');
                        $('#button_dekrip_generate_manipulasi_siujk').css('display', 'none');
                        modal_dekrip_siujk.modal('hide');
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

var form_siujk = $('#form_siujk')
form_siujk.on('submit', function(e) {
    var url_post_siujk = $('[name="url_post_siujk"]').val();
    var nomor_surat_siujk = $('[name="nomor_surat_siujk"]').val()
    var sts_seumur_hidup_siujk = $('[name="sts_seumur_hidup_siujk"]').val()
    if (nomor_surat_siujk == '') {
        e.preventDefault();
        Swal.fire(
            'Good job!',
            'You clicked the button!',
            'success'
        )
    } else if (sts_seumur_hidup_siujk == '') {
        Swal.fire(
            'Maaf!',
            'Tanggal siujk Wajib Di Isi!',
            'warning'
        )
    } else {
        e.preventDefault();
        $.ajax({
            url: url_post_siujk,
            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#on_save_siujk').attr("disabled", true);
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
                        $('#on_save_siujk').attr("disabled", false);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {

                    }
                })
            }
        })
    }
})

function sts_berlaku_siujk() {
    var sts_seumur_hidup_siujk = $('[name="sts_seumur_hidup_siujk"]').val()
    if (sts_seumur_hidup_siujk == 1) {
        $('.tgl_berlaku_siujk').attr("readonly", false);
    } else {
        $('.tgl_berlaku_siujk').attr("readonly", true);
    }
}

function EditChangeGlobal_siujk() {
    $('#apply_edit_siujk').modal('hide')
    $('.nomor_surat_siujk').attr("readonly", false);
    $('.sts_seumur_hidup_siujk').attr("disabled", false);
    $('.tgl_berlaku_siujk').attr("readonly", false);
    $('.kualifikasi_izin_siujk').attr("disabled", false);
    $('.file_dokumen_siujk').attr("readonly", false);
    $('.kbli_siujk').attr("readonly", false);
    $('.file_dokumen_siujk').attr("disabled", false);
    $('#on_save_siujk').attr("disabled", false);
    $('#button_save_kbli_siujk').removeClass("disabled");
    $('#button_edit_kbli_siujk').removeClass("disabled");
}

function BatalChangeGlobal_siujk() {
    $('#apply_edit_siujk').modal('hide')
    $('.nomor_surat_siujk').attr("readonly", true);
    $('.sts_seumur_hidup_siujk').attr("disabled", true);
    $('.tgl_berlaku_siujk').attr("readonly", true);
    $('.kualifikasi_izin_siujk').attr("disabled", true);
    $('.file_dokumen_siujk').attr("readonly", true);
    $('.kbli_siujk').attr("readonly", true);
    $('.file_dokumen_siujk').attr("disabled", true);
    $('#on_save_siujk').attr("disabled", true);
    $('#button_save_kbli_siujk').addClass("disabled");
    $('#button_edit_kbli_siujk').addClass("disabled");
}

$('#modal_dekrip_siujk').on('hidden.bs.modal', function() {
    get_row_vendor();
})


// GET TABLE KBLI siujk
var table_kbli_siujk = $('#table_kbli_siujk')
$(document).ready(function() {
    var url_table_kbli_siujk = $('[name="url_table_kbli_siujk"]').val();
    table_kbli_siujk.DataTable({
        "responsive": false,
        "ordering": true,
        "processing": true,
        "serverSide": true,
        "dom": 'Bfrtip',
        "buttons": ["excel", "pdf", "print", "colvis"],
        "order": [],
        "ajax": {
            "url": url_table_kbli_siujk,
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
    }).buttons().container().appendTo('#table_kbli_siujk .col-md-6:eq(0)');
});

function reloadTable_kbli_siujk() {
    table_kbli_siujk.DataTable().ajax.reload();
}

// ADD siujk
function simpan_kbli_siujk() {
    var form_simpan_kbli_siujk = $('#form_simpan_kbli_siujk');
    var id_kualifikasi_izin_kbli_siujk = $('[name="id_kualifikasi_izin_kbli_siujk"]').val();
    var id_kbli_siujk = $('[name="id_kbli_siujk"]').val();
    var url_tambah_kbli_siujk = $('[name="url_tambah_kbli_siujk"]').val();
    if (id_kbli_siujk == '') {
        Swal.fire(
            'Maaf!',
            'Kbli Wajib Di Isi!',
            'warning'
        )
    } else if (id_kualifikasi_izin_kbli_siujk == '') {
        Swal.fire(
            'Maaf!',
            'Kualifikasi Wajib Di Isi!',
            'warning'
        )
    } else {
        $.ajax({
            method: "POST",
            url: url_tambah_kbli_siujk,
            data: form_simpan_kbli_siujk.serialize(),
            dataType: "JSON",
            success: function(response) {
                if (response['message'] == 'success') {
                    Swal.fire('Good job!', 'Data Beharhasil Ditambah!', 'success');
                    form_simpan_kbli_siujk[0].reset();
                    reloadTable_kbli_siujk()
                }
            }
        })
    }
}


function byid_kbli_siujk(id_url_kbli_siujk, type) {
    var modal_edit_kbli_siujk = $('#modal_edit_kbli_siujk');
    var url_byid_kbli_siujk = $('[name="url_byid_kbli_siujk"]').val();
    if (type == 'edit') {
        saveData = 'edit';
    }

    if (type == 'hapus') {
        saveData = 'hapus';
    }

    $.ajax({
        type: "GET",
        url: url_byid_kbli_siujk + id_url_kbli_siujk,
        dataType: "JSON",
        success: function(response) {
            if (type == 'edit') {
                modal_edit_kbli_siujk.modal('show');
                $('[name="id_url_kbli_siujk"]').val(response['row_kbli_siujk'].id_url_kbli_siujk);
                $('[name="token_kbli_siujk"]').val(response['row_kbli_siujk'].token_kbli_siujk);
                $('[name="id_kbli_siujk"]').val(response['row_kbli_siujk'].id_kbli);
                $('[name="id_kualifikasi_izin_kbli_siujk"]').val(response['row_kbli_siujk'].id_kualifikasi_izin);
                $('[name="ket_kbli_siujk"]').val(response['row_kbli_siujk'].ket_kbli_siujk);
                $('#pilihan_kbli_siujk').html(response['row_kbli_siujk'].kode_kbli + ' || ' + response['row_kbli_siujk'].nama_kbli);
                $('#pilihan_kualifikasi_kbli_siujk').html(response['row_kbli_siujk'].nama_kualifikasi);
            } else {
                Question_kbli_siujk(id_url_kbli_siujk, response['row_kbli_siujk'].token_kbli_siujk);
            }
        }
    })
}

function Question_kbli_siujk(id_url_kbli_siujk, token_kbli_siujk) {
    var form_simpan_kbli_siujk = $('#form_simpan_kbli_siujk');
    var url_hapus_kbli_siujk = $('[name="url_hapus_kbli_siujk"]').val();
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
                url: url_hapus_kbli_siujk,
                data: {
                    id_url_kbli_siujk: id_url_kbli_siujk,
                    token_kbli_siujk: token_kbli_siujk
                },
                dataType: "JSON",
                success: function(response) {
                    if (response['message'] == 'success') {
                        Swal.fire('Good job!', 'Data Beharhasil Dihapus!', 'success');
                        form_simpan_kbli_siujk[0].reset();
                        reloadTable_kbli_siujk()
                    } else {
                        Swal.fire('Maaf', response['maaf'], 'warning');
                    }
                }
            })
        }
    });
}

function edit_kbli_siujk() {
    var form_simpan_kbli_siujk = $('#form_simpan_kbli_siujk');
    var form_edit_kbli_siujk = $('#form_edit_kbli_siujk');
    var modal_edit_kbli_siujk = $('#modal_edit_kbli_siujk');
    var url_edit_kbli_siujk = $('[name="url_edit_kbli_siujk"]').val();
    $.ajax({
        method: "POST",
        url: url_edit_kbli_siujk,
        data: form_edit_kbli_siujk.serialize(),
        dataType: "JSON",
        success: function(response) {
            if (response['message'] == 'success') {
                modal_edit_kbli_siujk.modal('hide');
                Swal.fire('Good job!', 'Data Beharhasil Edit!', 'success');
                form_simpan_kbli_siujk[0].reset();
                form_edit_kbli_siujk[0].reset();
                reloadTable_kbli_siujk();
            } else {
                Swal.fire('Maaf', response['maaf'], 'warning');
                reloadTable_kbli_siujk();
            }
        }
    })
}
