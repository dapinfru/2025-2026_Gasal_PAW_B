<?php
session_start();

// Proteksi halaman
if (!isset($_SESSION['username'])) {
    header("Location: login_page.html");
    exit();
}

$username = $_SESSION['username'];
$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Penjualan</title>

    <!-- Memanggil file CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">
    <div class="title">📘 Sistem Penjualan</div>

    <div class="menu">
        <a href="#">Home</a>

        <!-- Tampilkan Data Master hanya untuk level 1 -->
        <?php if ($level == 1): ?>
            <div class="dropdown">
                Data Master ⬇
                <div class="dropdown-content">
                    <a href="#">Barang</a>
                    <a href="#">Supplier</a>
                    <a href="#">Transaksi</a>
                </div>
            </div>
        <?php endif; ?>

        <a href="#">Transaksi</a>
        <a href="#">Laporan</a>
    </div>

    <div class="user">
        <?= $username ?>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>
</div>

<h2 class="welcome">Selamat datang, <?= $username ?>!</h2>

</body>
</html>