
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