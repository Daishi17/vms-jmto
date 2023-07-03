<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="theme-color" content="#7952b3">

        <title>Registrasi-EDRT || JMTO</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/fontawesome-free/css/all.min.css">
        <link href="<?php echo base_url();?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins-lte/select2/css/select2.min.css">

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
        <style>
            .swatch-blue {
                color: #fff;
                background-color: #0d6efd; 
            }
            .swatch-indigo {
                color: #fff;
                background-color: #6610f2; 
            }
            .swatch-purple {
                color: #fff;
                background-color: #6f42c1; 
            }
            .swatch-pink {
                color: #fff;
                background-color: #d63384; 
            }
            .swatch-orange {
                color: #fff;
                background-color: #fd7e14; 
            }
            .swatch-teal {
                color: #fff;
                background-color: #20c997; 
            }
            .swatch-cyan {
                color: #fff;
                background-color: #17a2b8; 
            }
        </style>
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
    </head>
    <body class="bg-white">
        <nav class="navbar fixed-top navbar-dark bg-dark">
            <div class="container-fluid d-flex flex-wrap bg-warning shadow-lg">
                <a class="navbar-brand">
                    <img src="<?php echo base_url();?>/assets/brand/jm1.png" alt="" width="25" height="25" class="d-inline-block align-text-top">
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
                    <img src="<?php echo base_url();?>/assets/brand/bootstrap-logo.svg" alt="" width="29" height="24" class="d-inline-block align-text-top">
                    <small>E-Registrasi Rekanan JMTO</small>
                </a>
                <div class="text-end">
                    <div class="d-flex align-items-center">
                        <div class="btn-group dropstart">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-right-to-bracket px-1"></i>
                                Log-In
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-user-tie px-2"></i>
                                        Log-In Penyedia
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="fa-solid fa-users-gear px-1"></i>
                                        Log-In Non Penyedia
                                    </a>
                                </li>
                            </ul>
                        </div>&nbsp;
                    </div>
                </div>
            </div>
        </nav><br><br><br><hr>