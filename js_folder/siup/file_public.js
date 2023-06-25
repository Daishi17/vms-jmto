
get_row_vendor_siup() 
function get_row_vendor_siup() {
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
        if (response['row_siup']) {
          $('.nomor_surat_siup').attr("readonly", true);
          $('.sts_seumur_hidup_siup').attr("disabled", true);
          $('.tgl_berlaku_siup').attr("readonly", true);
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
              var id_url = response['row_siup']['id_url'];
              $('[name="jenis_izin"]').val(response['row_siup']['jenis_izin']);
              $('[name="no_urut_siup"]').val(response['row_siup']['no_urut_siup']);
              $('[name="nomor_surat_siup"]').val(response['row_siup']['nomor_surat']);
              $('[name="kualifikasi_izin_siup"]').val(response['row_siup']['kualifikasi_izin']);
              $('[name="tgl_berlaku_siup"]').val(response['row_siup']['tgl_berlaku_siup']);
  
              // $('.file').text(response['row_siup']['file_dokumen'])
              if (response['row_siup']['sts_token_dokumen'] == 1) {
                  $('.button_enkrip_siup').html('<a href="javascript:;" onclick="DekripEnkripSiup(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i>Dekripsi Dokumen</a>');
                  var html_siup = '<a href="javascript:;" class="btn btn-sm btn-info">' +
                  response['row_siup']['file_dokumen'] +'</a>';
                  $('#tampil_dokumen_siup').html(html_siup);

              } else {
                  $('.button_enkrip_siup').html('<a href="javascript:;" onclick="DekripEnkripSiup(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i>Enkripsi Dokumen</a>');
                  var html_siup = '<a href="javascript:;" onclick="DownloadFile_siup(\''+ id_url +'\')" class="btn btn-sm btn-warning">' + response['row_siup']['file_dokumen'] +'</a>';
                  $('#tampil_dokumen_siup').html(html_siup);
              }
          }
        
      }
  })
}


var form_izin_usaha2 = $('#form_izin_usaha2')
form_izin_usaha2.on('submit', function(e) {
    var url_post = $('[name="url_post_siup"]').val()
    e.preventDefault();
    $.ajax({
        url: url_post,
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache : false,
        processData: false,
        success: function(response) {
            let timerInterval
            Swal.fire({
              title: 'Sedang Proses Menyimpan Data!',
              html: 'Membuat Data<b></b>',
              timer: 3000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                  // b.textContent = Swal.getTimerLeft()
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
                Swal.fire('Data Berhasil Di Simpan!', '', 'success')
                get_row_vendor_siup() 
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
              }
            })
        }
    })
})

function DekripEnkripSiup(id_url, type){
  var secret_token = $('[name="secret_token"]').val()
  var url_encryption_siup = $('[name="url_encryption_siup"]').val();
  if (type == 'dekrip') {
      $.ajax({
          method: "POST",
          url: url_encryption_siup + id_url,
          dataType: "JSON",
          data:{
              secret_token: secret_token,
              type:type
          },
          success: function(response) {
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
                  get_row_vendor_siup() 
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
          url: url_encryption_siup + id_url,
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
                  get_row_vendor_siup() 
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


function DownloadFile_siup(id_url){
  var url_download = $('[name="url_download_siup"]').val()
  location.href = url_download + id_url;
}

function sts_berlaku_siup(){
    var sts_seumur_hidup = $('[name="sts_seumur_hidup_siup"]').val()
    if (sts_seumur_hidup == 1) {
        $('#tgl_berlaku_siup').attr("readonly", false); 
    } else {
        $('#tgl_berlaku_siup').attr("readonly", true); 
    }
}