<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "penjualan";

$koneksi = new mysqli($host, $user, $pass, $dbname);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

function format_rupiah($angka){
    $hasil_rupiah = "RP. " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
?>