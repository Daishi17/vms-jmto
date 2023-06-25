
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
          if (response['row_nib']) {
            $('.nomor_surat_form').attr("readonly", true);
            $('.sts_seumur_hidup_form').attr("disabled", true);
            $('.tgl_berlaku_nib_form').attr("readonly", true);
            $('.kualifikasi_izin_form').attr("disabled", true);
            $('.file_dokumen').attr("readonly", true);
            $('.nib_kbli_form').attr("readonly", true);
            $('.file_dokumen').attr("disabled", true);
            $('#on_save').attr("disabled", true);
            // $('input').attr("readonly", true);
            // $('select').attr("disabled", true);
            // $('#on_save').attr("disabled", true);
          } else {
            $('.nomor_surat_form').attr("readonly", false);
            $('.sts_seumur_hidup_form').attr("disabled", false);
            $('.tgl_berlaku_nib_form').attr("readonly", false);
            $('.kualifikasi_izin_form').attr("disabled", false);
            $('.file_dokumen').attr("readonly", false);
            $('.nib_kbli_form').attr("readonly", false);
            $('.file_dokumen').attr("disabled", false);
          }
            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                var id_url = response['row_nib']['id_url'];
                $('[name="jenis_izin"]').val(response['row_nib']['jenis_izin']);
                $('[name="no_urut_nib"]').val(response['row_nib']['no_urut_nib']);
                $('[name="nomor_surat"]').val(response['row_nib']['nomor_surat']);
                $('[name="kualifikasi_izin"]').val(response['row_nib']['kualifikasi_izin']);
                $('[name="tgl_berlaku_nib"]').val(response['row_nib']['tgl_berlaku_nib']);
    
                $('.file').text(response['row_nib']['file_dokumen'])
                if (response['row_nib']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip').html('<a href="javascript:;"  onclick="DekripEnkrip(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i>Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" class="btn btn-sm btn-info btn-block">' +
                    response['row_nib']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen').html(html2);
                    $('.token_generate').html('<div class="input-group"><div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-qrcode">Token </i></span></div><input type="text" value="'+response['row_nib']['token_dokumen']+'" class="form-control form-control-sm" readonly></div>');
                } else {
                    $('.button_enkrip').html('<a href="javascript:;" onclick="DekripEnkrip(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i>Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" onclick="DownloadFile(\''+ id_url +'\')" class="btn btn-sm btn-warning btn-block">' + response['row_nib']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen').html(html2);
                }
            }
          
        }
    })
}


function DownloadFile(id_url){
    var url_download = $('[name="url_download"]').val()
    location.href = url_download + id_url;
}

function DekripEnkrip(id_url, type){
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_nib = $('[name="url_encryption_nib"]').val();
    var modal_dekrip = $('#modal_dekrip');
    if (type == 'dekrip') {
      modal_dekrip.modal('show');
      $('input').attr("readonly", false);
      $('[name="id_url"]').val(id_url);
    } else {
        $.ajax({
            method: "POST",
            url: url_encryption_nib + id_url,
            dataType: "JSON",
            data:{
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


function GenerateDekrip(){
      var url_dekrip_nib = $('[name="url_dekrip_nib"]').val();
      var modal_dekrip = $('#modal_dekrip');
      $.ajax({
            method: "POST",
            url: url_dekrip_nib,
            dataType: "JSON",
            data: $('#form_dekrip').serialize(),
            beforeSend: function() {
                $('#button_dekrip_generate').css('display', 'none');
                $('#button_dekrip_generate_manipulasi').css('display', 'block');
            },
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
                        modal_dekrip.modal('hide');
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


var form_izin_usaha = $('#form_izin_usaha')
form_izin_usaha.on('submit', function(e) {
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

function sts_berlaku_nib(){
    var sts_seumur_hidup = $('[name="sts_seumur_hidup"]').val()

    if (sts_seumur_hidup == 1) {
        $('#tgl_berlaku_nib').attr("readonly", false); 
    } else {
        $('#tgl_berlaku_nib').attr("readonly", true); 
    }
}

function EditChangeGlobal() {
  $('#apply_edit').modal('hide')
  $('.nomor_surat_form').attr("readonly", false);
  $('.sts_seumur_hidup_form').attr("disabled", false);
  $('.tgl_berlaku_nib_form').attr("readonly", false);
  $('.kualifikasi_izin_form').attr("disabled", false);
  $('.file_dokumen').attr("readonly", false);
  $('.nib_kbli_form').attr("readonly", false);
  $('.file_dokumen').attr("disabled", false);
  $('#on_save').attr("disabled", false);
}

function BatalChangeGlobal() {
  $('#apply_edit').modal('hide')
  $('.nomor_surat_form').attr("readonly", true);
  $('.sts_seumur_hidup_form').attr("disabled", true);
  $('.tgl_berlaku_nib_form').attr("readonly", true);
  $('.kualifikasi_izin_form').attr("disabled", true);
  $('.file_dokumen').attr("readonly", true);
  $('.nib_kbli_form').attr("readonly", true);
  $('.file_dokumen').attr("disabled", true);
  $('#on_save').attr("disabled", true);
}

$('#modal_dekrip').on('hidden.bs.modal', function () {
  get_row_vendor();
})

