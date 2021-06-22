<?php
include "koneksi.php";
error_reporting(0);

$paket = mysqli_query($koneksi, "SELECT * FROM transaksi_paket");
$paketz = mysqli_num_rows($paket);
$sdiproses = mysqli_query($koneksi, "SELECT * FROM transaksi_paket WHERE statuspengiriman = 'Sedang Diproses'");
$sdiprosesz = mysqli_num_rows($sdiproses);
$sdikirm = mysqli_query($koneksi, "SELECT * FROM transaksi_paket WHERE statuspengiriman = 'Sedang Dikirim'");
$sdikirmz = mysqli_num_rows($sdikirm);
$s = mysqli_query($koneksi, "SELECT * FROM transaksi_paket WHERE statuspengiriman = 'Selesai'");
$sz = mysqli_num_rows($s);
$date = date("d-m-Y");
$telat = mysqli_query($koneksi, "SELECT * FROM transaksi_paket WHERE estimasi < '$date' AND statuspengiriman <> 'Selesai'");
$telatz = mysqli_num_rows($telat);
$daerah = fungsi("SELECT kodepospenerima, count(*) from transaksi_paket group by kodepospenerima order by count(*) desc");
$pengirim = fungsi("SELECT idpelanggan, count(*) from transaksi_paket group by idpelanggan order by count(*) desc");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a href="login.php"><button type="button" class="btn btn-block btn-danger btn-lg">Log out</button></a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <span class="brand-text font-weight-light">NinjaXpress</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tabel_cs.php" class="nav-link">
                <i class="nav-icon"></i>
                <p>
                  Tabel CS
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tabel_kurir.php" class="nav-link">
                <i class="nav-icon"></i>
                <p>
                  Tabel Kurir
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="tabel_pelanggan.php" class="nav-link">
                <i class="nav-icon"></i>
                <p>
                  Tabel Pelanggan
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="paket.php" class="nav-link">
                <i class="nav-icon"></i>
                <p>
                  Paket
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pengiriman.php" class="nav-link">
                <i class="nav-icon"></i>
                <p>
                  Pengiriman
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">

            <div class="col-lg-4 col-6">
              <!-- small box -->
              <div class="small-box bg-primary">
                <div class="inner">
                  <h3><?= $paketz?></h3>
                  <p>Total Paket</p>
                </div>
                <div class="icon">
                  <i class="fas fa-box"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3><?= $sdiprosesz ?></h3>
                  <p>Sedang Diproses</p>
                </div>
                <div class="icon">
                  <i class="fas fa-circle-notch"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3><?= $sdikirmz ?></h3>
                  <p>Sedang Dikirim</p>
                </div>
                <div class="icon">
                  <i class="fas fa-shipping-fast"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $sz ?></h3>
                  <p>Selesai</p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-check"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3><?=$telatz?></h3>
                  <p>Terlambat</p>
                </div>
                <div class="icon">
                  <i class="fas fa-circle"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3><?=$daerah[0]['kodepospenerima']?></h3>
                  <p>Daerah Terbanyak (Kode Pos)</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box bg-secondary">
                <div class="inner">
                  <h3><?=$pengirim[0]['idpelanggan']?></h3>
                  <p>Pengiriman Terbanyak</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chess-queen"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="main-footer">

      <div class="float-right d-none d-sm-inline-block">

      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="../plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="../plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="../plugins/moment/moment.min.js"></script>
  <script src="../plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="../plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../dist/js/demo.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="../dist/js/pages/dashboard.js"></script>
</body>

</html>