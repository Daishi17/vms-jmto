<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>JMTO - VMS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/fontawesome-free/css/all.min.css">
    <link href="<?php echo base_url(); ?>assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins-lte/datatables-buttons/css/buttons.bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="theme-color" content="#7952b3">
    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 => 'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $hari = array(
            1 => 'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $pecahkan = explode('-', $tanggal);

        // Contoh tanggal 20 Maret 2016 adalah hari Minggu
        $num = date(
            'N',
            strtotime($tanggal)
        );
        return $pecahkan[2]  . '-' . $bulan[(int)$pecahkan[1]] . '-' . $pecahkan[0];
    }
    ?>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        .ui-datepicker-calendar {
            display: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <!-- <link href="headers.css" rel="stylesheet"> -->
</head>

<body>
    <nav class="navbar fixed-top navbar-dark bg-dark">
        <div class="container-fluid d-flex flex-wrap bg-light shadow-lg">
            <a class="navbar-brand">
                <img src="<?php echo base_url(); ?>assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
                <b><span class="text-primary">Jasamarga Tollroad Operator</span></b>
            </a>
            <ul class="nav">
                <h6>
                    <strong><?= tgl_indo(date('Y-m-d')) ?> || <label for="" id="jam"></label></strong>
                </h6>
            </ul>
        </div>
        <div class="container-fluid shadow-lg">
            <a class="navbar-brand">
                <!-- <img src="<?php echo base_url(); ?>assets/brand/bootstrap-logo.svg" alt="" width="29" height="24" class="d-inline-block align-text-top"> -->
                <small>E-DataRekananJMTO</small>
            </a>
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li>&nbsp;</li>
                <li>
                    <a href="<?= base_url() ?>dashboard" class="nav-link px-2 text-white">
                        <i class="fa-solid fa-gauge-high mb-1"></i>
                        <small>Dashboard</small>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-city mb-1"></i>
                        <small>Profil Perusahaan</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>datapenyedia/identitas_perusahaan">
                                <i class="fa-regular fa-building px-1"></i>
                                <small>Identitas Perusahaan</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>datapenyedia/izin_usaha">
                                <i class="fa-regular fa-folder-open px-1"></i>
                                <small>Izin Perusahaan</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>datapenyedia/akta_pendiri">
                                <i class="fa-solid fa-file-shield px-1"></i>
                                <small>Akta Pendirian</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>datapenyedia/manajerial">
                                <i class="fa-solid fa-network-wired px-1"></i>
                                <small>Manajerial</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>datapenyedia/pengalaman">
                                <i class="fa-solid fa-chalkboard-user px-1"></i>
                                <small>Pengalaman Perusahaan</small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>datapenyedia/pajak">
                                <i class="fa-solid fa-calculator px-2"></i>
                                <small>Pajak</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url() ?>daftar_hitam">
                                <i class="fa-solid fa-ban px-1"></i>
                                <small>Daftar Hitam</small>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="<?= base_url() ?>dok_tervalidasi" class="nav-link px-2 text-white">
                        <i class="fa-solid fa-envelope-circle-check mb-1"></i>
                        <small>Monitoring Status Dokumen <span class="badge bg-danger">0</span></small>

                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-business-time mb-1"></i>
                        <small>Info Tender</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="http://localhost/eproc-jmto/page_kosong/page_konstruksi">
                                <i class="fa-solid fa-envelope-open-text px-1"></i>
                                <small>Tender Terundang <span class="badge bg-success">4</span></small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="http://localhost/eproc-jmto/page_kosong/page_konstruksi">
                                <i class="fa-solid fa-inbox px-1"></i>
                                <small>Tender Umum</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="http://localhost/eproc-jmto/page_kosong/page_konstruksi">
                                <i class="fa-solid fa-newspaper px-1"></i>
                                <small>Berita Terkini <span class="badge bg-primary">4</span></small>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-chart-simple mb-1"></i>
                        <small>Laporan</small>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="http://localhost/eproc-jmto/page_kosong/page_konstruksi">
                                <i class="fa-solid fa-marker px-1"></i>
                                <small>Hasil Tender</small>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="http://localhost/eproc-jmto/page_kosong/page_konstruksi">
                                <i class="fa-solid fa-person-chalkboard px-1"></i>
                                <small>Progress Kerja <span class="badge bg-success">4</span></small>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="http://localhost/eproc-jmto/page_kosong/page_konstruksi">
                                <i class="fa-solid fa-certificate px-1"></i>
                                <small>Penilaian Kinerja</small>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="text-end">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?php echo base_url(); ?>assets/brand/avatar5.png" alt="mdo" width="32" height="32" class="rounded-circle shadow-lg">
                            <small class="text-white">User: Penyedia</small>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#"><small>New project...</small></a></li>
                        </ul>
                    </div>
                    <div class="flex-shrink-0 dropdown">
                        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <small class="text-white"><i class="fa-regular fa-file-pdf px-1"></i>Guide || FAQ</small>
                        </a>
                        <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                            <li><a class="dropdown-item" href="#"><small>New project...</small></a></li>
                        </ul>
                    </div>
                    <div class="flex-shrink-0 dropdown">
                        <small class="text-dark">Peny</small>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br><br>

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