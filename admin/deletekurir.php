<?php
include "koneksi.php";

$idkurir = $_GET["idkurir"];
$delete = mysqli_query($koneksi, "DELETE FROM kurir WHERE idkurir = '$idkurir'");
if ($delete) {
    echo 
    "<script>
    alert('delete success');
    document.location.href = 'tabel_kurir.php';
    </script>";
} else {
    echo 
    "<script>
    alert('delete failed');
    document.location.href = 'tabel_kurir.php';
    </script>";
}
?>