function Terima() {
    var checkBox = document.getElementById("check_terima");
    if (checkBox.checked == true){
      $('#button_save').removeAttr('disabled');
    } else {
        $('#button_save').attr('disabled','disabled');
    }
  }

  $("#provinsitambah").change(function() {
    var id_provinsi = $("#provinsitambah").val();
    var url_kabupaten = $('[name="url_kabupaten"]').val();
    $.ajax({
      type: 'GET',
      url: url_kabupaten + id_provinsi,
      success: function(html) {
        $("#kabupatentambah").html(html);
      }
    });
  })
  $("#kabupatentambah").change(function() {
    var id_kabupaten = $("#kabupatentambah").val();
    var url_kecamatan = $('[name="url_kecamatan"]').val();
        $.ajax({
      type: 'GET',
      url: url_kecamatan + id_kabupaten,
      success: function(html) {
        $("#kecamatantambah").html(html);
      }
    });
  })