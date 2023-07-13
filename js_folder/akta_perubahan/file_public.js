    // akta_perubahan
    $('.file_valid_akta_perubahan').change(function(e) {
      var geekss = e.target.files[0].name;
      $('[name="file_dokumen_manipulasi_perubahan"]').val(geekss);
  });

var form_akta_perubahan = $('#form_akta_perubahan')
form_akta_perubahan.on('submit', function(e) {
    var url_post = $('[name="url_post_perubahan"]').val()
    var file_dokumen_manipulasi_perubahan = $('[name="file_dokumen_manipulasi_perubahan"]').val()
    if (file_dokumen_manipulasi_perubahan == '') {
      e.preventDefault();
      Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Dokumen Wajib Di Isi!',
        })
    } else {
      e.preventDefault();
      $.ajax({
          url: url_post,
          method: "POST",
          data: new FormData(this),
          contentType: false,
          cache : false,
          processData: false,
          beforeSend: function() {
            $('#save_perubahan').attr("disabled", true);
        },
          success: function(response) {
            if (response['error']) {
              // nomor_surat
              $(".no_surat_perubahan_error").html(response['error']['no_surat_perubahan']);
              // sts_seumur_hidup
              $(".sts_seumur_hidup_perubahan_error").html(response['error']['sts_seumur_hidup_perubahan']);
              // jumlah_setor_modal
              $(".jumlah_setor_modal_perubahan_error").html(response['error']['jumlah_setor_perubahan']);
              // kualifikasi_usaha
              $(".kualifikasi_usaha_perubahan_error").html(response['error']['kualifikasi_usaha_perubahan']);
              $('#save_perubahan').attr("disabled", false);
              $('#button_edit_perubahan').attr("disabled", false);
            } else {
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
                  $(".no_surat_perubahan_error").css('display','none');
                  // sts_seumur_hidup
                  $(".sts_seumur_hidup_perubahan_error").css('display','none');
                  // jumlah_setor_modal
                  $(".jumlah_setor_modal_perubahan_error").css('display','none');
                  // kualifikasi_usaha
                  $(".kualifikasi_usaha_perubahan_error").css('display','none');
                  $('#save_perubahan').attr("disabled", false);
                  $('#button_edit_perubahan').attr("disabled", false);
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
})

get_row_vendor_perubahan()
function get_row_vendor_perubahan() {
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
        if (response['row_akta_perubahan']) {
          if (response['row_akta_perubahan']['sts_validasi'] == 1) {
            $('#sts_validasi_akta_perubahan_1').css('display','block');
            $('#sts_validasi_akta_perubahan_2').css('display','none');
            $('#sts_validasi_akta_perubahan_3').css('display','none');
         } else if (response['row_akta_perubahan']['sts_validasi'] == 2) {
            $('#sts_validasi_akta_perubahan_1').css('display','none');
            $('#sts_validasi_akta_perubahan_2').css('display','block');
            $('#sts_validasi_akta_perubahan_3').css('display','none');
        } else {
            $('#sts_validasi_akta_perubahan_1').css('display','none');
            $('#sts_validasi_akta_perubahan_2').css('display','none');
            $('#sts_validasi_akta_perubahan_3').css('display','block');
        }
        $('[name="file_dokumen_manipulasi_perubahan"]').val(response['row_akta_perubahan']['file_dokumen']);
          $('[name="no_surat_perubahan"]').attr("disabled", true);
          $('[name="sts_seumur_hidup_perubahan"]').attr("disabled", true);
          $('[name="tgl_masa_berlaku_perubahan"]').attr("disabled", true);
          $('[name="jumlah_setor_perubahan"]').attr("disabled", true);
          $('[name="kualifikasi_usaha_perubahan"]').attr("disabled", true);
          // $('.file_dokumen').attr("disabled", true);
          $('#save_perubahan').attr("disabled", true);
          $('#button_edit_perubahan').attr("disabled", false);
          // $('input').attr("readonly", true);
          // $('select').attr("disabled", true);
          // $('#save_perubahan').attr("disabled", true);
        } else {
          $('[name="no_surat_perubahan"]').attr("disabled", false);
          $('[name="sts_seumur_hidup_perubahan"]').attr("disabled", false);
          $('[name="tgl_masa_berlaku_perubahan"]').attr("disabled", false);
          $('[name="jumlah_setor_perubahan"]').attr("disabled", false);
          $('[name="kualifikasi_usaha_perubahan"]').attr("disabled", false);
          // $('.file_dokumen').attr("disabled", true);
          $('#save_perubahan').attr("disabled", false);
          $('#button_edit_perubahan').attr("disabled", true);
        }
          if (response == 'maaf') {
              alert('Maaf Anda Kurang Beruntung');
          } else {
              var id_url = response['row_akta_perubahan']['id_url'];
              $('[name="file_dokumen_manipulasi_pendirian"]').val(response['row_akta_pendirian']['file_dokumen']);
              $('[name="no_surat_perubahan"]').val(response['row_akta_perubahan']['no_surat']);
              $('[name="sts_seumur_hidup_perubahan"]').val(response['row_akta_perubahan']['sts_seumur_hidup']);
              $('[name="tgl_masa_berlaku_perubahan"]').val(response['row_akta_perubahan']['tgl_berlaku_akta']);
              $('[name="jumlah_setor_perubahan"]').val(response['row_akta_perubahan']['jumlah_setor_modal']);
              $('[name="kualifikasi_usaha_perubahan"]').val(response['row_akta_perubahan']['kualifikasi_usaha']);
  
              $('.file_akta_perubahan').text(response['row_akta_perubahan']['file_dokumen'])
              if (response['row_akta_perubahan']['sts_token_dokumen'] == 1) {
                  $('.button_enkrip_perubahan').html('<a href="javascript:;"  onclick="DekripEnkrip_Perubahan(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                  var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                  response['row_akta_perubahan']['file_dokumen'] +'</a>';
                  $('#tampil_dokumen_akta_perubahan').html(html2);
                  $('.token_generate_perubahan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>'+response['row_akta_perubahan']['token_dokumen']+'</textarea></div>');
              } else {
                  $('.button_enkrip_perubahan').html('<a href="javascript:;" onclick="DekripEnkrip_Perubahan(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                  var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile(\''+ id_url +'\')" class="btn btn-sm btn-warning btn-block">' + response['row_akta_perubahan']['file_dokumen'] +'</a>';
                  $('.token_generate_perubahan').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>'+response['row_akta_perubahan']['token_dokumen']+'</textarea></div>');
                  $('#tampil_dokumen_akta_perubahan').html(html2);
              }
          }
        
      }
  })
}


function DekripEnkrip_Perubahan(id_url, type){

  var secret_token = $('[name="secret_token"]').val()
  var url_encryption_pendirian = $('[name="url_encryption_pendirian"]').val();
  var modal_dekrip_perubahan = $('#modal_dekrip_perubahan');
  var modal_enkrip_perubahan = $('#modal_enkrip_perubahan');
  if (type == 'dekrip') {
    modal_dekrip_perubahan.modal('show');
    $('input').attr("readonly", false);
    $('[name="id_url_perubahan"]').val(id_url);
  } else {
    modal_enkrip_perubahan.modal('show');
    $('input').attr("readonly", false);
    $('[name="id_url_perubahan"]').val(id_url);
   
  }
}

function GenerateDekrip_Perubahan(){
  var url_encryption_perubahan = $('[name="url_encryption_perubahan"]').val();
  var modal_dekrip_perubahan = $('#modal_dekrip_perubahan');
  var id_url = $('[name="id_url_perubahan"]').val();
  $.ajax({
        method: "POST",
        url: url_encryption_perubahan + id_url,
        dataType: "JSON",
        data: $('#form_dekrip_perubahan').serialize(),
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
                    get_row_vendor_perubahan();
                    // $('#button_dekrip_generate').css('display', 'block');
                    // $('#button_dekrip_generate_manipulasi').css('display', 'none');
                    modal_dekrip_perubahan.modal('hide');
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


function GenerateEnkrip_Perubahan(){
  var url_encryption_perubahan = $('[name="url_encryption_perubahan"]').val();
  var modal_enkrip_perubahan = $('#modal_enkrip_perubahan');
  var id_url =  $('[name="id_url_perubahan"]').val();
  $.ajax({
        method: "POST",
        url: url_encryption_perubahan + id_url,
        dataType: "JSON",
        data: $('#form_enkrip_perubahan').serialize(),
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
                    modal_enkrip_perubahan.modal('hide');
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

function Tidak_ada_akta_perubahan() {
  var url_tidak_ada_akta_perubahan = $('[name="url_tidak_ada_akta_perubahan"]').val();
  $.ajax({
        method: "POST",
        url: url_tidak_ada_akta_perubahan,
        dataType: "JSON",
        success: function(response) {
                let timerInterval
                Swal.fire({
                  title: 'Sedang Create Proses Tidak Ada Perubahan!',
                  html: 'Proses Tidak Ada Perubahan <b></b>',
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
                    Swal.fire('Data Berhasil Di Create Tanpa Akta Perubahani!', '', 'success')
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

const EditChange_perubahan = () => {
  $('#modaledit_perubahan').modal('hide')
  $('[name="no_surat_perubahan"]').attr("disabled", false);
  $('[name="sts_seumur_hidup_perubahan"]').attr("disabled", false);
  $('[name="tgl_masa_berlaku_perubahan"]').attr("disabled", false);
  $('[name="jumlah_setor_perubahan"]').attr("disabled", false);
  $('[name="kualifikasi_usaha_perubahan"]').attr("disabled", false);
  // $('.file_dokumen').attr("disabled", true);
  $('#save_perubahan').attr("disabled", false);
  $('#button_edit_perubahan').attr("disabled", true);
}


$(".jumlah_setor_perubahan").keyup(function() {
  var harga = $(".jumlah_setor_perubahan").val();
  var tanpa_rupiah = document.getElementById('tanpa_rupiah_akta_perubahan');
  tanpa_rupiah.value = formatRupiah(this.value, 'Rp. ');
  /* Fungsi */
  function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
          split = number_string.split(','),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      if (ribuan) {
          separator = sisa ? '.' : '';
          rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  }
});