get_row_vendor();
function get_row_vendor() {
    var secret_token = $('[name="secret_token"]').val()
    var id_url_vendor = $('[name="id_url_vendor"]').val()
    var url_get_row_vendor = $('[name="url_get_row_vendor"]').val()
    $.ajax({
        method: "POST",
        url: url_get_row_vendor + id_url_vendor,
        dataType: "JSON",
        data:{
            secret_token:secret_token,
        },
        success: function(response) {
          if (response['row_akta_pendirian']) {
            $('.no_surat').attr("disabled", true);
            $('.sts_seumur_hidup').attr("disabled", true);
            $('.berlaku_sampai').attr("disabled", true);
            $('.jumlah_setor_modal').attr("disabled", true);
            $('.kualifikasi_usaha').attr("disabled", true);
            // $('.file_dokumen').attr("disabled", true);
            $('.kualifikasi_usaha').attr("disabled", true);
            $('#on_save').attr("disabled", true);
            $('#button_edit').attr("disabled", false);
            $('#btn_simpan_pendirian').attr("disabled", true);
            // $('input').attr("readonly", true);
            // $('select').attr("disabled", true);
            // $('#on_save').attr("disabled", true);
          } else {
            $('.no_surat').attr("disabled", false);
            $('.sts_seumur_hidup').attr("disabled", false);
            $('.jumlah_setor_modal').attr("readonly", false);
            $('.kualifikasi_usaha').attr("disabled", false);
            $('.berlaku_sampai').attr("disabled", false);
            $('#button_edit').attr("disabled", true);
            // $('.file_dokumen').attr("disabled", false);
            $('#on_save').attr("disabled", false);
          }
            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                var id_url = response['row_akta_pendirian']['id_url'];
                $('[name="no_surat"]').val(response['row_akta_pendirian']['no_surat']);
                $('[name="sts_seumur_hidup"]').val(response['row_akta_pendirian']['sts_seumur_hidup']);
                $('[name="berlaku_sampai"]').val(response['row_akta_pendirian']['tgl_berlaku_akta']);
                $('[name="jumlah_setor_modal"]').val(response['row_akta_pendirian']['jumlah_setor_modal']);
                $('[name="kualifikasi_usaha"]').val(response['row_akta_pendirian']['kualifikasi_usaha']);
    
                $('.file_akta_pendirian').text(response['row_akta_pendirian']['file_dokumen'])
                if (response['row_akta_pendirian']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip').html('<a href="javascript:;"  onclick="DekripEnkrip(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                    response['row_akta_pendirian']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen_akta').html(html2);
                    $('.token_generate').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>'+response['row_akta_pendirian']['token_dokumen']+'</textarea></div>');
                } else {
                    $('.button_enkrip').html('<a href="javascript:;" onclick="DekripEnkrip(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile(\''+ id_url +'\')" class="btn btn-sm btn-warning btn-block">' + response['row_akta_pendirian']['file_dokumen'] +'</a>';
                    $('.token_generate').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>'+response['row_akta_pendirian']['token_dokumen']+'</textarea></div>');
                    $('#tampil_dokumen_akta').html(html2);
                }
            }
          
        }
    })
}

var form_akta_pendirian = $('#form_akta_pendirian')
form_akta_pendirian.on('submit', function(e) {
    var url_post = $('[name="url_post"]').val()
    e.preventDefault();
    $.ajax({
        url: url_post,
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache : false,
        processData: false,
        beforeSend: function() {
          $('#on_save').attr("disabled", true);
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

function DekripEnkrip(id_url, type){
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_pendirian = $('[name="url_encryption_pendirian"]').val();
    var modal_dekrip_pendirian = $('#modal_dekrip_pendirian');
    var modal_enkrip_pendirian = $('#modal_enkrip_pendirian');
    if (type == 'dekrip') {
      modal_dekrip_pendirian.modal('show');
      $('input').attr("readonly", false);
      $('[name="id_url"]').val(id_url);
    } else {
      modal_enkrip_pendirian.modal('show');
      $('input').attr("readonly", false);
      $('[name="id_url"]').val(id_url);
     
    }
}

function GenerateEnkrip(){
  var url_encryption_pendirian = $('[name="url_encryption_pendirian"]').val();
  var modal_enkrip_pendirian = $('#modal_enkrip_pendirian');
  var id_url =  $('[name="id_url"]').val();
  $.ajax({
        method: "POST",
        url: url_encryption_pendirian + id_url,
        dataType: "JSON",
        data: $('#form_enkrip').serialize(),
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
                    Swal.fire('Dokumen Berhasil Di Enkripsi!', '', 'success')
                    get_row_vendor();
                    // $('#button_dekrip_generate').css('display', 'block');
                    // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                    modal_enkrip_pendirian.modal('hide');
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

function GenerateDekrip(){
  var url_encryption_pendirian = $('[name="url_encryption_pendirian"]').val();
  var modal_dekrip_pendirian = $('#modal_dekrip_pendirian');
  var id_url = $('[name="id_url"]').val();
  $.ajax({
        method: "POST",
        url: url_encryption_pendirian + id_url,
        dataType: "JSON",
        data: $('#form_dekrip').serialize(),
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
                    get_row_vendor();
                    $('#button_dekrip_generate').css('display', 'block');
                    $('#button_dekrip_generate_manipulasi').css('display', 'none');
                    modal_dekrip_pendirian.modal('hide');
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

function DownloadFile(id_url){
  var url_download_pendirian = $('[name="url_download_pendirian"]').val()
  location.href = url_download_pendirian + id_url;
}

const EditChange = () => {
  $('#modaledit_pendirian').modal('hide')
  $('.no_surat').attr("disabled", false);
  $('.sts_seumur_hidup').attr("disabled", false);
  $('.jumlah_setor_modal').attr("disabled", false);
  $('.kualifikasi_usaha').attr("disabled", false);
  $('.berlaku_sampai').attr("disabled", false);
  $('#btn_simpan_pendirian').attr("disabled", false);
  $('#button_edit_modal').attr("disabled", true);
}