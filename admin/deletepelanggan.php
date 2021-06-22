<?php
include "koneksi.php";

$idpelanggan = $_GET["idpelanggan"];
$delete = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE idpelanggan = '$idpelanggan'");
if ($delete) {
    echo 
    "<script>
    alert('delete success');
    document.location.href = 'tabel_pelanggan.php';
    </script>";
} else {
    echo 
    "<script>
    alert('delete failed');
    document.location.href = 'tabel_pelanggan.php';
    </script>";
}
?>