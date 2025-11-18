<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Filter Laporan Penjualan</title>
    <link rel="stylesheet" href="style.css"> 
    <style>
        .main-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

    <div class="main-container">
        <h2>1. Buatkan filter seperti berikut ini</h2>

        <form class="filter-container" method="GET" action="laporan.php">
            <?php
            date_default_timezone_set('Asia/Jakarta');
            $default_tgl_awal = date('Y-m-01');
            $default_tgl_akhir = date('Y-m-d');
            ?>
            <input type="date" name="tgl_awal" value="<?php echo $default_tgl_awal; ?>">
            <input type="date" name="tgl_akhir" value="<?php echo $default_tgl_akhir; ?>">
            <button type="submit">Tampilkan</button>
        </form>
    </div>

</body>
</html>