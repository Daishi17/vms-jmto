        <script src="<?php echo base_url(); ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
        <!-- JQUERY-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- INPUT MASK-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.3/jquery.inputmask.bundle.min.js"></script>
        <!-- Select2 -->
        <script src="<?php echo base_url(); ?>/assets/plugins-lte/select2/js/select2.full.min.js"></script>


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
        </body>

        </html>