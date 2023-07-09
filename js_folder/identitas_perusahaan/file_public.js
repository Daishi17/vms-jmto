
$('#provinsitambah').change(function() {
  var url_provinsi = $('[name="url_provinsi"]').val();
  var id_provinsi = $('#provinsitambah').val();
  $.ajax({
    type: 'GET',
    url: url_provinsi + id_provinsi,
    success: function(html) {
      $('#kabupatentambah').html(html);
    }
  });
})		


$('#kabupatentambah').change(function() {
  var url_kabupaten = $('[name="url_kabupaten"]').val();
  var id_kabupaten = $('#kabupatentambah').val();
  $.ajax({
    type: 'GET',
    url: url_kabupaten + id_kabupaten,
    success: function(html) {
      $('#kecamatantambah').html(html);
    }
  });
})		

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
      x.type = "text";
  } else {
      x.type = "password";
  }
}

var simpan_identitas_vendor = $('#simpan_identitas_vendor');
var url_simpan_identitas_vendor = $('[name="url_simpan_identitas_vendor"]').val();
simpan_identitas_vendor.on('submit', function(e) {
    e.preventDefault();
    $.ajax({
        url: url_simpan_identitas_vendor,
        method: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('.btn_simpan').attr('disabled', 'disabled');
        },
        success: function(response) {
            Swal.fire('Good job!', 'Data Beharhasil Di Update!', 'success');
            $('.btn_simpan').attr('disabled', false);
            simpan_identitas_vendor[0].reset();
            location.reload()
        }
    });
});
