<?php
$koneksi = mysqli_connect("localhost", "root", "", "penjualan");

if (!$koneksi) {
    echo "Koneksi gagal: " . mysqli_connect_error();
}
?>
