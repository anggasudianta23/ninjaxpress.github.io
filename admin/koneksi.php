<?php


$koneksi = mysqli_connect("localhost","root","","ninjaxpress");

function fungsi($query){
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $arrs = [];
    while($arr = mysqli_fetch_assoc($result)){
        $arrs[] = $arr;
    }
    return $arrs;
}

function cariresi($keyword){
    global $koneksi;
    $query = "SELECT * FROM transaksi_paket WHERE noresi LIKE '$keyword'";
    $result = mysqli_query($koneksi, $query);
    $arrs = [ ];
    while( $arr = mysqli_fetch_assoc($result) ) {
        $arrs[] = $arr;
    }
    return $arrs;
}

function cariidpengiriman($keyword){
    global $koneksi;
    $query = "SELECT * FROM transaksi_paket WHERE noresi LIKE '$keyword' OR idpengiriman LIKE '$keyword'";
    $result = mysqli_query($koneksi, $query);
    $arrs = [ ];
    while( $arr = mysqli_fetch_assoc($result) ) {
        $arrs[] = $arr;
    }
    return $arrs;
}

function carics($keyword){
    global $koneksi;
    $query = "SELECT * FROM cs WHERE idcs LIKE '$keyword'";
    $result = mysqli_query($koneksi, $query);
    $arrs = [ ];
    while( $arr = mysqli_fetch_assoc($result) ) {
        $arrs[] = $arr;
    }
    return $arrs;
}

function carikurir($keyword){
    global $koneksi;
    $query = "SELECT * FROM kurir WHERE idkurir LIKE '$keyword'";
    $result = mysqli_query($koneksi, $query);
    $arrs = [ ];
    while( $arr = mysqli_fetch_assoc($result) ) {
        $arrs[] = $arr;
    }
    return $arrs;
}

function caripelanggan($keyword){
    global $koneksi;
    $query = "SELECT * FROM pelanggan WHERE idpelanggan LIKE '$keyword'";
    $result = mysqli_query($koneksi, $query);
    $arrs = [ ];
    while( $arr = mysqli_fetch_assoc($result) ) {
        $arrs[] = $arr;
    }
    return $arrs;
}

?>