<?php
require 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda Aplikasi Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Beranda Aplikasi Penjualan</h2>
    <p>Silakan pilih menu di bawah:</p>

    <ul>
        <li><a href="transaksi_input.php">Input Transaksi Penjualan</a></li>
    </ul>

    <h3>Daftar Transaksi</h3>

    <table border="1" cellpadding="5">
        <tr>
            <th>No</th>
            <th>Waktu Transaksi</th>
            <th>Pelanggan</th>
            <th>Total</th>
            <th>Keterangan</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "
            SELECT t.*, p.nama AS nama_pelanggan 
            FROM penjualan_transaksi t
            LEFT JOIN penjualan_pelanggan p ON t.pelanggan_id = p.id

            ORDER BY t.id DESC
        ");

        while ($data = mysqli_fetch_assoc($query)) {
            echo "<tr>
                    <td>{$no}</td>
                    <td>{$data['waktu_transaksi']}</td>
                    <td>{$data['nama_pelanggan']}</td>
                    <td>{$data['total']}</td>
                    <td>{$data['keterangan']}</td>
                  </tr>";
            $no++;
        }
        ?>
    </table>
</div>

</body>
</html>