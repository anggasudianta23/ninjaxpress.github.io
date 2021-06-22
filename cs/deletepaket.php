<?php
include "koneksi.php";

$noresi = $_GET["noresi"];
$delete = mysqli_query($koneksi, "DELETE FROM transaksi_paket WHERE noresi = '$noresi'");
if ($delete) {

    echo 
    "<script>
    alert('delete success');
    document.location.href = 'paket.php';
    </script>";

} else {

    echo 
    "<script>
    alert('delete failed');
    document.location.href = 'paket.php';
    </script>";

}
?>