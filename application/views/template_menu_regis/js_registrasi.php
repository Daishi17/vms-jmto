        <script src="<?php echo base_url(); ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
        <!-- JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- INPUT MASK-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.3/jquery.inputmask.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/select2/js/select2.full.min.js"></script>

        <script>
            function myFunction1() {
                var x = document.getElementById("passwordlihat1");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function myFunction2() {
                var x = document.getElementById("passwordlihat2");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
        <script>
            function Terima_identitas() {
                console.log('kirun');
                var checkBox = document.getElementById("check_terima_identittas");
                if (checkBox.checked == true) {
                    $('#button_save').removeClass('disabled');
                } else {
                    $('#button_save').addClass('disabled');
                }
            }

            function Kantor_cabang() {
                var sts_kantor_cabang = $('[name="sts_kantor_cabang"]').val()
                if (sts_kantor_cabang == 1) {
                    $('[name="alamat_kantor_cabang"]').attr("readonly", false);
                } else {
                    $('[name="alamat_kantor_cabang"]').attr("readonly", true);
                    $('[name="alamat_kantor_cabang"]').val('');
                }
            }

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
                var url_kecamatan = $('[name="url_kecamatan"]').val();
                var id_kabupaten = $('#kabupatentambah').val();
                $.ajax({
                    type: 'GET',
                    url: url_kecamatan + id_kabupaten,
                    success: function(html) {
                        $('#kecamatantambah').html(html);
                    }
                });
            })


            $(document).ready(function() {
                $(":input").inputmask();
                /*
                or    Inputmask().mask(document.querySelectorAll("input"));*/
            });

            //Initialize Select2 Elements
            $('.select2').select2()
        </script>
        <script>
            window.onload = function() {
                jam();
            }

            function jam() {
                var e = document.getElementById('jam'),
                    d = new Date(),
                    h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());

                e.innerHTML = h + ':' + m + ':' + s;

                setTimeout('jam()', 1000);
            }

            function set(e) {
                e = e < 10 ? '0' + e : e;
                return e;
            }
        </script>

        <script>
            function password_validation() {
                var passwordlihat1 = document.getElementById('passwordlihat1');
                var besar = document.getElementById('besar');
                var kecil = document.getElementById('kecil');
                var simbol = document.getElementById('simbol');
                var angka = document.getElementById('angka');
                var panjang = document.getElementById('panjang');
                var nilai_1 = 0;
                var nilai_2 = 0;
                var nilai_3 = 0;
                var nilai_4 = 0;
                if (passwordlihat1.value.match(/[0-9]/)) {
                    angka.style.color = 'green';
                    var nilai_1 = 1;
                } else {
                    angka.style.color = 'red';
                    var nilai_1 = 0;
                }

                if (passwordlihat1.value.match(/[A-Z]/)) {
                    besar.style.color = 'green';
                    var nilai_2 = 1;
                } else {
                    besar.style.color = 'red';
                    var nilai_2 = 0;
                }

                if (passwordlihat1.value.match(/[!\@\#\$\%\^\&\*\(\)\_\+\=\-\<\>\?\.\,]/)) {
                    simbol.style.color = 'green';
                    var nilai_3 = 1;
                } else {
                    simbol.style.color = 'red';
                    var nilai_3 = 0;
                }

                if (passwordlihat1.value.length < 8) {
                    panjang.style.color = 'green';
                    var nilai_4 = 1;
                } else {
                    panjang.style.color = 'red';
                    var nilai_4 = 0;
                }

                if (passwordlihat1.value.match(/[a-z]/)) {
                    kecil.style.color = 'green';
                    var nilai_5 = 1;
                } else {
                    kecil.style.color = 'red';
                    var nilai_5 = 0;
                }

            }

            function conform() {
                var passwordlihat1 = document.getElementById('passwordlihat1');
                var passwordlihat2 = document.getElementById('passwordlihat2');
                if (passwordlihat1.value == passwordlihat2.value) {
                    $('#button_save').css('display', 'block');
                    document.getElementById('besar').style.display = 'none';
                    document.getElementById('kecil').style.display = 'none';
                    document.getElementById('simbol').style.display = 'none';
                    document.getElementById('panjang').style.display = 'none';
                    document.getElementById('angka').style.display = 'none';
                } else {
                    $('#button_save').css('display', 'none')
                    document.getElementById('besar').style.display = 'block';
                    document.getElementById('kecil').style.display = 'block';
                    document.getElementById('simbol').style.display = 'block';
                    document.getElementById('panjang').style.display = 'block';
                    document.getElementById('angka').style.display = 'block';
                }
            }
        </script>
        </body>

        </html>