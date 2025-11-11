<?php
require 'koneksi.php';

$waktuTransaksi = $_POST['waktu_transaksi'];
$keteranganTransaksi = $_POST['keterangan_transaksi'];
$pelangganId = $_POST['pelanggan_id'];

$totalTransaksi = 0;
$hargaBarang = $_POST['harga_barang'];
$jumlahBarang = $_POST['jumlah_barang'];

for ($i = 0; $i < count($hargaBarang); $i++) {
    $totalTransaksi += ($hargaBarang[$i] * $jumlahBarang[$i]);
}

$querySimpanMaster = mysqli_query(
    $koneksi,
    "INSERT INTO penjualan_transaksi 
    (waktu_transaksi, keterangan, total, pelanggan_id)
    VALUES 
    ('$waktuTransaksi', '$keteranganTransaksi', '$totalTransaksi', '$pelangganId')"
);

$idTransaksiBaru = mysqli_insert_id($koneksi);

$barangId = $_POST['barang_id'];

for ($i = 0; $i < count($barangId); $i++) {

    $idBarang = $barangId[$i];
    $harga = $hargaBarang[$i];
    $jumlah = $jumlahBarang[$i];

    mysqli_query(
        $koneksi,
        "INSERT INTO penjualan_transaksi_detail 
        (transaksi_id, barang_id, harga, qty)
        VALUES 
        ('$idTransaksiBaru', '$idBarang', '$harga', '$qty')"
    );
}

echo "<script>
alert('Transaksi berhasil disimpan!');
window.location='index.php';
</script>";
?>