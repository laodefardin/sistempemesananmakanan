<!DOCTYPE html>
<?php
include 'koneksi.php';
session_start();
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Sistem Pemesanan Makanan</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

  <link rel="stylesheet" href="assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="icon" href="icon.png" type="image/x-icon" />
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand-md navbar-dark navbar-info">
      <div class="container">
        <a href="index" class="navbar-brand">
          <span class="brand-text font-weight-light">SISTEM PEMESANAN MAKANAN</span>
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <?php
              if (!isset($_SESSION['username'])){?>
              <?php }else{ ?>
              <a href="riwayat-pemesanan" class="nav-link">Riwayat Pemesanan</a>
              <?php }; ?>
            </li>
            <li class="nav-item dropdown">
              <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                class="nav-link dropdown-toggle">Setting</a>
              <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow"
                style="left: 0px; right: inherit;">
                <li><a href="setting-profil" class="dropdown-item">Profil </a></li>
                <li><a href="setting-password" class="dropdown-item">Ubah Password</a></li>
              </ul>
            </li>
          </ul>
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <li class="nav-item">
              <?php
              if (!isset($_SESSION['username'])){?>
              <a href="login" class="nav-link">Login</a>
              <?php }else{ ?>
              <a href="logout" class="btn btn-danger btn-sm"> Log Out</a>
              <?php }; ?>
            </li>
          </ul>

        </div>
      </div>
    </nav>
    <!-- /.navbar -->