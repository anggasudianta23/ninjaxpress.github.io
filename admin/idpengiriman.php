<?php
include "koneksi.php";

$noresi = $_GET["noresi"];

$datax = fungsi("SELECT idkurir FROM transaksi_paket WHERE noresi = '$noresi'")[0]["idkurir"];
if ($datax) {
    $dataz = fungsi("SELECT noplatkurir FROM kurir WHERE idkurir = '$datax'")[0]["noplatkurir"];
    $tanggal = date("dmY");
    $idpengiriman = $dataz . $tanggal;

    $update = mysqli_query($koneksi, "UPDATE transaksi_paket SET
idpengiriman = '$idpengiriman' WHERE noresi = '$noresi'");
    if ($update) {
        echo
        "<script>alert('success');
                document.location.href = 'pengiriman.php';</script>";
    } else {
        echo
        "<script> alert('failed');
                document.location.href = 'pengiriman.php';</script>";
    }
}else{
    echo
    "<script> alert('failed');
            document.location.href = 'pengiriman.php';</script>";
}
?>