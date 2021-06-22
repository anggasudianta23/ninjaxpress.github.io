<?php
include "koneksi.php";

$idcs = $_GET["idcs"];
$delete = mysqli_query($koneksi, "DELETE FROM cs WHERE idcs = '$idcs'");
if ($delete) {

    echo 
    "<script>
    alert('delete success');
    document.location.href = 'tabel_cs.php';
    </script>";

} else {

    echo 
    "<script>
    alert('delete failed');
    document.location.href = 'tabel_cs.php';
    </script>";
    
}
?>