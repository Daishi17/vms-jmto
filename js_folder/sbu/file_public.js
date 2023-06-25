get_row_vendor_sbu()
function get_row_vendor_sbu() {
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
                var id_url = response['row_sbu']['id_url'];
                $('[name="jenis_izin"]').val(response['row_sbu']['jenis_izin']);
                $('[name="no_urut_sbu"]').val(response['row_sbu']['no_urut_sbu']);
                $('[name="nomor_surat_sbu"]').val(response['row_sbu']['nomor_surat']);
                $('[name="kualifikasi_izin_sbu"]').val(response['row_sbu']['kualifikasi_izin']);
                $('[name="tgl_berlaku_sbu"]').val(response['row_sbu']['tgl_berlaku_sbu']);
    
                // $('.file').text(response['row_sbu']['file_dokumen'])
                if (response['row_sbu']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip_sbu').html('<a href="javascript:;" onclick="DekripEnkripSbu(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i>Dekripsi Dokumen</a>');
                    var html_sbu = '<a href="javascript:;" class="btn btn-sm btn-info">' +
                    response['row_sbu']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen_sbu').html(html_sbu);
  
                } else {
                    $('.button_enkrip_sbu').html('<a href="javascript:;" onclick="DekripEnkripSbu(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i>Enkripsi Dokumen</a>');
                    var html_sbu = '<a href="javascript:;" onclick="DownloadFile_sbu(\''+ id_url +'\')" class="btn btn-sm btn-warning">' + response['row_sbu']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen_sbu').html(html_sbu);
                }
            }
          
        }
    })
}

var form_izin_usaha3 = $('#form_izin_usaha3')
form_izin_usaha3.on('submit', function(e) {
    var url_post = $('[name="url_post_sbu"]').val()
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
                get_row_vendor_sbu() 
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

function DekripEnkripSbu(id_url, type){
    var secret_token = $('[name="secret_token"]').val()
    var url_encryption_sbu = $('[name="url_encryption_sbu"]').val();
    if (type == 'dekrip') {
        $.ajax({
            method: "POST",
            url: url_encryption_sbu + id_url,
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
                    get_row_vendor_sbu() 
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
            url: url_encryption_sbu + id_url,
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
                    get_row_vendor_sbu() 
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

function DownloadFile_sbu(id_url){
    var url_download = $('[name="url_download_sbu"]').val()
    location.href = url_download + id_url;
}