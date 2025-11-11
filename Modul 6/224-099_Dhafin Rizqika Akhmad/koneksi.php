<?php
$serverDatabase = "localhost";
$namaPenggunaDatabase = "root";
$kataSandiDatabase = "";
$namaDatabase = "db_penjualan";

$koneksi = mysqli_connect(
    $serverDatabase,
    $namaPenggunaDatabase,
    $kataSandiDatabase,
    $namaDatabase
);

if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>