<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI-DRT JMTO</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/toastr/toastr.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/dist/css/adminlte.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/frontend/plugins/dropzone/min/dropzone.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <style>
        /* .invalid class prevents CSS from automatically applying */
        .invalid input:required:invalid {
            background: #BE4C54;
        }

        /* Mark valid inputs during .invalid state */
        .invalid input:required:valid {
            background: #17D654;
        }
    </style>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-warning">
            <a style="font-size: 15px;" class="navbar-brand">
                <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/e-logo.jpeg" class="brand-image img-circle elevation-3">
                <span class="brand-text font-weight-light text-black">
                    <strong>DRT-JMTO</strong>
                </span>
            </a>
            <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-navy">
                            <span class="text-navy"><i class="fas fa-align-justify"></i></span>
                        </a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a style="font-size:12px" href="<?= base_url('dashboard') ?>" class="nav-link text-navy">
                            <i class="fas fa-tachometer-alt mr-2"></i>
                            <strong>Dashboard</strong>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:12px" id="dropdownSubMenu" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-navy dropdown-toggle">
                            <i class="fas fa-city mr-2"></i>
                            <strong>Profile Perusahan</strong>
                        </a>
                        <ul aria-labelledby="dropdownSubMenu" class="dropdown-menu border-0 shadow">
                            <li>
                                <a style="font-size:12px" href="<?= base_url('datapenyedia/identitas_perusahaan') ?>" class="dropdown-item">
                                    <i class="fas fa-hospital-user mr-2"></i>
                                    Identitas Perusahan
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a style="font-size:12px" href="<?= base_url('datapenyedia/izin_usaha') ?>" class="dropdown-item">
                                    <i class="fas fa-clone mr-2"></i>
                                    Izin Perusahan
                                </a>
                            </li>
                            <li>
                                <a style="font-size:12px" href="<?= base_url('datapenyedia/akta_pendirian') ?>" class="dropdown-item">
                                    <i class="fas fa-file-alt mr-2"></i>
                                    Akta Pendirian
                                </a>
                            </li>
                            <li>
                                <a style="font-size:12px" href="<?= base_url('datapenyedia/manajerial') ?>" class="dropdown-item">
                                    <i class="fas fa-sitemap mr-2"></i>
                                    Manajerial
                                </a>
                            </li>
                            <li>
                                <a style="font-size:12px" href="<?= base_url('datapenyedia/pengalaman') ?>" class="dropdown-item">
                                    <i class="fas fa-briefcase mr-2"></i>
                                    Pengalaman
                                </a>
                            </li>
                            <li>
                                <a style="font-size:12px" href="<?= base_url('datapenyedia/pajak') ?>" class="dropdown-item">
                                    <i class="fas fa-fax mr-2"></i>
                                    Pajak
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a style="font-size:12px" href="#" class="dropdown-item">
                                    <i class="fas fa-ban mr-2"></i>
                                    Daftar Hitam
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a style="font-size:12px" href="#" class="nav-link text-navy">
                            <i class="fas fa-folder-open mr-2"></i>
                            <strong>Dokumen Tervalidasi</strong>
                            <span class="badge badge-danger right">2</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:12px" id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-navy">
                            <i class="fas fa-envelope-open mr-2"></i>
                            <strong>Informasi Tender</strong>
                        </a>
                        <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                            <li>
                                <a style="font-size:12px" href="#" class="dropdown-item">
                                    <i class="fas fa-envelope mr-2"></i>
                                    Undangan Tender Terpilih
                                    <span class="badge badge-success right">3</span>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a style="font-size:12px" href="#" class="dropdown-item">
                                    <i class="fas fa-registered mr-2"></i>
                                    Informasi Tender Umum
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a style="font-size:12px" href="#" class="dropdown-item">
                                    <i class="fas fa-newspaper mr-2"></i>
                                    Berita Terkini
                                    <span class="badge badge-warning right">4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:12px" id="dropdownSubMenu2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle text-navy">
                            <i class="fas fa-book mr-2"></i>
                            <strong>Penilaian & Laporan</strong>
                        </a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                            <li>
                                <a href="#" class="dropdown-item ">
                                    <i class="fas fa-balance-scale mr-2"></i>
                                    Penilaian
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>

                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    Laporan Progres Kerja
                                </a>
                            </li>

                            <li>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-chart-pie mr-2"></i>
                                    Laporan Hasil Kinerja
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-navy">
                            <span class="text-navy"><i class="fas fa-align-justify"></i></span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:12px" class="nav-link text-navy" data-toggle="dropdown" href="#">
                            <span class="text-navy">
                                <i class="fas fa-caret-square-down"></i>
                                Guide || FAQ
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="#" class="dropdown-item">
                                <i class="far fa-file-pdf mr-2"></i>Dokumen User Guide
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="nav-icon fas fa-headset mr-2"></i> FAQ
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a style="font-size:13px;" class="navbar-brand nav-link" data-toggle="dropdown" href="#">
                            <img src="<?php echo base_url(); ?>assets/template/frontend/dist/img/avatar5.png" class="brand-image img-circle elevation-3">
                            <span class="text-navy text-sm">
                                User: <strong>Penyedia</strong>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">
                                <span class="text-primary">
                                    <strong>
                                        <i class="fas fa-user-lock mr-2"></i>
                                        <?= $this->session->userdata('nama_usaha') ?>
                                    </strong>
                                </span>
                            </span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-key mr-2"></i>
                                Ganti Password
                            </a>
                            <a href="<?= base_url('auth/logout') ?>" class="dropdown-item">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Log Out System
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->