<?php
include "koneksi.php";
ob_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>NinjaXpress</title>

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

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>NinjaXpress</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Register</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <?php
            $max_noresi = mysqli_query($koneksi, "SELECT MAX(idpelanggan) as max_idpelanggan FROM pelanggan");
            $query_noresi = mysqli_fetch_array($max_noresi);
            $noresi = $query_noresi['max_idpelanggan'];
            $newresi = (int) substr($noresi, 4, 2);
            $newresi++;
            $char = 'PEL';
            $resi = $char . sprintf("%02s", $newresi);
            ?>
            <input type="text" class="form-control" name="idpelanggan" placeholder="ID Pelanggan" value="<?=$resi?>" readonly>
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="namapelanggan" placeholder="Nama" required>
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="alamatpelanggan" placeholder="Alamat" required>
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="nohppelanggan" placeholder="No HP" required>
            <div class="input-group-append">
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="passwordpelanggan" placeholder="Password" required>
            <div class="input-group-append">
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="register" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        <br>
        <a href="login.php" class="text-center">I already have a account</a>
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>
  <!-- /.register-box -->

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
if (isset($_POST['register'])) {
  if (is_numeric($_POST["nohppelanggan"])) {
    if (ctype_alpha($_POST["namapelanggan"])) {
      $insert = mysqli_query($koneksi, "INSERT INTO pelanggan (idpelanggan, namapelanggan, alamatpelanggan, nohppelanggan, passwordpelanggan) 
              VALUES ('$_POST[idpelanggan]','$_POST[namapelanggan]','$_POST[alamatpelanggan]','$_POST[nohppelanggan]','$_POST[passwordpelanggan]')");
      if ($insert) {
        echo
        "<script>alert('success');
                document.location.href = 'login.php';</script>";
      } else {
        echo
        "<script> alert('failed');
                document.location.href = 'login.php';</script>";
      }
    } else {
      echo
      "<script> alert('format nama salah');</script>";
    }
  } else {
    echo
    "<script> alert('format no hp salah');</script>";
  }
}
?>