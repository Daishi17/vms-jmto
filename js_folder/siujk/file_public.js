get_row_vendor_siujk()
function get_row_vendor_siujk() {
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
            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                var id_url = response['row_siujk']['id_url'];
                $('[name="jenis_izin"]').val(response['row_siujk']['jenis_izin']);
                $('[name="no_urut_siujk"]').val(response['row_siujk']['no_urut_siujk']);
                $('[name="nomor_surat_siujk"]').val(response['row_siujk']['nomor_surat']);
                $('[name="kualifikasi_izin_siujk"]').val(response['row_siujk']['kualifikasi_izin']);
                $('[name="tgl_berlaku_siujk"]').val(response['row_siujk']['tgl_berlaku_siujk']);
    
                // $('.file').text(response['row_siujk']['file_dokumen'])
                if (response['row_siujk']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip_siujk').html('<a href="javascript:;" onclick="DekripEnkripSiujk(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i>Dekripsi Dokumen</a>');
                    var html_siujk = '<a href="javascript:;" class="btn btn-sm btn-info">' +
                    response['row_siujk']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen_siujk').html(html_siujk);
  
                } else {
                    $('.button_enkrip_siujk').html('<a href="javascript:;" onclick="DekripEnkripSiujk(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i>Enkripsi Dokumen</a>');
                    var html_siujk = '<a href="javascript:;" onclick="DownloadFile_siujk(\''+ id_url +'\')" class="btn btn-sm btn-warning">' + response['row_siujk']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen_siujk').html(html_siujk);
                }
            }
          
        }
    })
}

var form_izin_usaha4 = $('#form_izin_usaha4')
form_izin_usaha4.on('submit', function(e) {
    var url_post = $('[name="url_post_siujk"]').val()
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
                get_row_vendor_siujk() 
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

function DekripEnkripSiujk(id_url, type){
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_siujk = $('[name="url_encryption_siujk"]').val();
    if (type == 'dekrip') {
        $.ajax({
            method: "POST",
            url: url_encryption_siujk + id_url,
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
                    get_row_vendor_siujk() 
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
            url: url_encryption_siujk + id_url,
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
                    get_row_vendor_siujk() 
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

function DownloadFile_siujk(id_url){
    var url_download = $('[name="url_download_siujk"]').val()
    location.href = url_download + id_url;
}