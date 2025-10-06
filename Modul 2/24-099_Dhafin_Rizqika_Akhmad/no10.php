<!DOCTYPE html>
<html>
<head>
    <title>Program Kasir Sederhana</title>
</head>
<body>
<h2>Program Kasir Sederhana</h2>

<form method="post">
    <label>Pilih Menu:</label><br>
    <select name="menu">
        <option value="15000">Geprekin Aja - Rp 15.000</option>
        <option value="12000">Mie Ayam - Rp 12.000</option>
        <option value="5000">Es Teh - Rp 5.000</option>
    </select>
    <br><br>

    <label>Jumlah Beli:</label><br>
    <input type="number" name="jumlah" min="1" value="1" required>
    <br><br>

    <input type="submit" name="tambah" value="Tambah ke Keranjang">
    <input type="submit" name="selesai" value="Selesai">
</form>

<?php
session_start();

if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

if (isset($_POST['tambah'])) {
    $harga = $_POST['menu'];
    $jumlah = $_POST['jumlah'];
    $total = $harga * $jumlah;
    $_SESSION['keranjang'][] = $total;
    echo "<p>Item berhasil ditambahkan!</p>";
}

if (isset($_POST['selesai'])) {
    $grandTotal = array_sum($_SESSION['keranjang']);
    echo "<h3>Total yang harus dibayar: Rp " . $grandTotal . "</h3>";
    session_destroy(); // untuk mereset setelah selesai
}
?>
</body>
</html>
