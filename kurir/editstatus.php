<?php
include "koneksi.php";

$noresi = $_GET["noresi"];
$datax = mysqli_query($koneksi, "SELECT * FROM transaksi_paket WHERE noresi = '$noresi'");
$arrxs = [];
while ($arrx = mysqli_fetch_assoc($datax)) {
  $arrxs[] = $arrx;
}
$qkur = mysqli_query($koneksi, "SELECT * FROM kurir");
$arrkurs = [];
while ($arrkur = mysqli_fetch_assoc($qkur)) {
  $arrkurs[] = $arrkur;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kurir</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
              <h1 class="m-0">Admin</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="card">

            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Status</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST">

                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">No Resi</label>
                    <input type="text" class="form-control" name="noresi" value="<?= $arrxs[0]['noresi'] ?>" required readonly>
                  </div>

                  <div class="form-group">
                    <label>ID Kurir</label>
                    <select class="custom-select rounded-0" name="idkurir">
                      <option style="display:none"></option>
                      <option value="">BATAL</option>
                      <?php
                      foreach ($arrkurs as $datakur) :
                      ?>
                        <option <?php if ($datakur['idkurir'] == $arrxs[0]['idkurir']) {
                                echo "selected";
                              } ?>><?php echo $datakur['idkurir']; ?></option>
                        
                      <?php
                      endforeach;
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="alamat">Tanggal</label>
                    <input type="text" class="form-control" name="tanggal" value="<?= $arrxs[0]['tanggal'] ?>" required readonly>
                  </div>

                  <div class="form-group">
                    <label for="no_hp">Estimasi</label>
                    <input type="text" class="form-control" name="estimasi" value="<?= $arrxs[0]['estimasi'] ?>" required readonly>
                  </div>

                  <div class="form-group">
                    <label for="no_hp">Berat</label>
                    <input type="text" class="form-control" name="beratpaket" value="<?= $arrxs[0]['beratpaket'] ?>" required readonly>
                  </div>

                  <div class="form-group">
                    <label for="no_hp">Ukuran</label>
                    <input type="text" class="form-control" name="ukuranpaket" value="<?= $arrxs[0]['ukuranpaket'] ?>" required readonly>
                  </div>

                  <div class="form-group">
                    <label>Status</label>
                    <select class="custom-select rounded-0" name="statuspengiriman">
                      <option <?php if ($arrxs[0]["statuspengiriman"] == 'Sedang Diproses') {
                                echo "selected";
                              } ?>>Sedang Diproses</option>
                      <option <?php if ($arrxs[0]["statuspengiriman"] == 'Sedang Dikirim') {
                                echo "selected";
                              } ?>>Sedang Dikirim</option>
                      <option <?php if ($arrxs[0]["statuspengiriman"] == 'Selesai') {
                                echo "selected";
                              } ?>>Selesai</option>
                    </select>
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="buat" name="buat" class="btn btn-info">Edit</button>
                </div>
              </form>

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

<?php
if (isset($_POST['buat'])) {
  $insert = mysqli_query(
    $koneksi,
    "UPDATE transaksi_paket SET
      idkurir = '$_POST[idkurir]', 
      statuspengiriman = '$_POST[statuspengiriman]' 
      WHERE noresi = '$_GET[noresi]'"
  );

  if ($insert) {
    echo
    "<script>alert('edit success');
                document.location.href = 'pengiriman.php';</script>";
  } else {
    echo
    "<script> alert('edit failed');
                document.location.href = 'pengiriman.php';</script>";
  }
}
?>