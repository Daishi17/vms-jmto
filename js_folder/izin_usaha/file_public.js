
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
            $('#button_save_kbli_nib').addClass("disabled");
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
            $('#on_save').attr("disabled", false);
            $('#button_save_kbli_nib').removeClass("disabled");
          }
            if (response == 'maaf') {
                alert('Maaf Anda Kurang Beruntung');
            } else {
                var id_url = response['row_nib']['id_url'];
                $('[name="jenis_izin"]').val(response['row_nib']['jenis_izin']);
                $('[name="no_urut_nib"]').val(response['row_nib']['no_urut_nib']);
                $('[name="nomor_surat"]').val(response['row_nib']['nomor_surat']);
                $('[name="kualifikasi_izin"]').val(response['row_nib']['kualifikasi_izin']);
                // $('[name="sts_seumur_hidup_form"]').val(response['row_nib']['sts_seumur_hidup_form']);
                $('.file').text(response['row_nib']['file_dokumen'])
                if (response['row_nib']['sts_token_dokumen'] == 1) {
                    $('.button_enkrip').html('<a href="javascript:;"  onclick="DekripEnkrip(\'' + id_url +'\''+','+ '\'' + 'dekrip' +'\')" class="btn btn-warning btn-sm"><i class="fas fa-lock-open mr-2"></i> Dekripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" class="btn btn-sm btn-info btn-block">' +
                    response['row_nib']['file_dokumen'] +'</a>';
                    $('#tampil_dokumen').html(html2);
                    $('.token_generate').html('<div class="input-group"><span class="input-group-text"><i class="fas fa-qrcode"></i></span><textarea class="form-control form-control-sm" disabled>'+response['row_nib']['token_dokumen']+'</textarea></div>');
                } else {
                    $('.button_enkrip').html('<a href="javascript:;" onclick="DekripEnkrip(\'' + id_url +'\''+','+ '\'' + 'enkrip' +'\')" class="btn btn-success btn-sm"><i class="fas fa-lock mr-2"></i> Enkripsi Dokumen</a>');
                    var html2 = '<a href="javascript:;" style="white-space: nowrap;width: 200px;overflow: hidden;text-overflow: ellipsis;" onclick="DownloadFile(\''+ id_url +'\')" class="btn btn-sm btn-warning btn-block">' + response['row_nib']['file_dokumen'] +'</a>';
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
    var url_post = $('[name="url_post"]').val();
    var nomor_surat = $('[name="nomor_surat"]').val()
    var sts_seumur_hidup_form = $('[name="sts_seumur_hidup_form"]').val()
    var file_dokumen = $('[name="file_dokumen"]').val()
    if (nomor_surat == '') {
      e.preventDefault();
      Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
      )
    } else if (sts_seumur_hidup_form == '') {
      Swal.fire(
        'Maaf!',
        'Tanggal Nib Wajib Di Isi!',
        'warning'
      )
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
    }
})

function sts_berlaku_nib(){
    var sts_seumur_hidup = $('[name="sts_seumur_hidup_form"]').val()
    if (sts_seumur_hidup == 1) {
      $('.tgl_berlaku_nib_form').attr("readonly", false);
    } else {
      $('.tgl_berlaku_nib_form').attr("readonly", true);
    }
}

function EditChangeGlobal() {
  $('#apply_edit_nib').modal('hide')
  $('.nomor_surat_form').attr("readonly", false);
  $('.sts_seumur_hidup_form').attr("disabled", false);
  $('.tgl_berlaku_nib_form').attr("readonly", false);
  $('.kualifikasi_izin_form').attr("disabled", false);
  $('.file_dokumen').attr("readonly", false);
  $('.nib_kbli_form').attr("readonly", false);
  $('.file_dokumen').attr("disabled", false);
  $('#on_save').attr("disabled", false);
  $('#button_save_kbli_nib').removeClass("disabled");
}

function BatalChangeGlobal() {
  $('#apply_edit_nib').modal('hide')
  $('.nomor_surat_form').attr("readonly", true);
  $('.sts_seumur_hidup_form').attr("disabled", true);
  $('.tgl_berlaku_nib_form').attr("readonly", true);
  $('.kualifikasi_izin_form').attr("disabled", true);
  $('.file_dokumen').attr("readonly", true);
  $('.nib_kbli_form').attr("readonly", true);
  $('.file_dokumen').attr("disabled", true);
  $('#on_save').attr("disabled", true);
  $('#button_save_kbli_nib').addClass("disabled");
}

$('#modal_dekrip').on('hidden.bs.modal', function () {
  get_row_vendor();
})


// GET TABLE KBLI NIB
var table_kbli_nib = $('#table_kbli_nib')
$(document).ready(function() {
  var url_table_kbli_nib = $('[name="url_table_kbli_nib"]').val();
  table_kbli_nib.DataTable({
    "responsive": true,
    "ordering": true,
    "processing": true,
    "autoWidth": false,
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
  var id_kualifikasi_izin = $('[name="id_kualifikasi_izin"]').val();
  var id_kbli = $('[name="id_kbli"]').val();
  var url_tambah_kbli_nib = $('[name="url_tambah_kbli_nib"]').val();
  if (id_kbli == '') {
    Swal.fire(
      'Maaf!',
      'Kbli Wajib Di Isi!',
      'warning'
    )
  } else if (id_kualifikasi_izin == '') {
    Swal.fire(
      'Maaf!',
      'Kbli Wajib Di Isi!',
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
                Swal.fire('Good job!','Data Beharhasil Ditambah!','success');
                form_simpan_kbli_nib[0].reset();
                reloadTable_kbli_nib()
            }
        }
    })
  }
}


function byid_kbli_nib(id, type) {
  var form_simpan_kbli_nib = $('#form_simpan_kbli_nib');
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
      url: url_byid_kbli_nib + id,
      dataType: "JSON",
      success: function(response) {
          if (type == 'edit') {
            console.log(response['row_kbli_nib']);
            modal_edit_kbli_nib.modal('show');
             $('[name="id_url_kbli_nib"]').val(response['row_kbli_nib'].id_url_kbli_nib);
             $('[name="token_kbli_nib"]').val(response['row_kbli_nib'].token_kbli_nib);
             $('[name="id_kbli"]').val(response['row_kbli_nib'].id_kbli);
             $('[name="id_kualifikasi_izin"]').val(response['row_kbli_nib'].id_kualifikasi_izin);
             $('[name="ket_kbli_nib"]').val(response['row_kbli_nib'].ket_kbli_nib);
             $('#pilihan_kbli_nib').html(response['row_kbli_nib'].kode_kbli + ' || ' + response['row_kbli_nib'].nama_kbli);
             $('#pilihan_kualifikasi_nib').html(response['row_kbli_nib'].nama_kualifikasi);
          } else {
              Question_kbli_nib(id,response['row_kbli_nib'].token_kbli_nib);
          }
      }
  })
}

function Question_kbli_nib(id,token) {
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
              data:{
                id:id,
                token:token
              },
              dataType: "JSON",
              success: function(response) {
                  if (response['message'] == 'success') {
                    Swal.fire('Good job!','Data Beharhasil Dihapus!','success');
                    form_simpan_kbli_nib[0].reset();
                    reloadTable_kbli_nib()
                  } else {
                    Swal.fire('Maaf',response['maaf'],'warning');
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
      url: url_edit_kbli_nib ,
      data: form_edit_kbli_nib.serialize(),
      dataType: "JSON",
      success: function(response) {
          if (response['message'] == 'success') {
            modal_edit_kbli_nib.modal('hide');
            Swal.fire('Good job!','Data Beharhasil Edit!','success');
            form_simpan_kbli_nib[0].reset();
            form_edit_kbli_nib[0].reset();
            reloadTable_kbli_nib();
          }else{
            Swal.fire('Maaf',response['maaf'],'warning');
            reloadTable_kbli_nib();
          }
      }
  })
}

