<?php
require 'koneksi.php';

$queryPelanggan = mysqli_query($koneksi, "SELECT * FROM penjualan_pelanggan ORDER BY nama");

$queryBarang = mysqli_query($koneksi, "SELECT * FROM penjualan_barang ORDER BY nama_barang");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Input Transaksi Penjualan</title>
    <link rel="stylesheet" href="style.css">

    <script>
        function tambahBarisDetail() {
            let tabelDetail = document.getElementById("tabelDetailBarang");
            let barisBaru = tabelDetail.insertRow(-1);

            barisBaru.insertCell(0).innerHTML = `
                <select name="barang_id[]" required>
                    <?php
                    mysqli_data_seek($queryBarang, 0);
                    while ($barang = mysqli_fetch_assoc($queryBarang)) {
                        echo "<option value='{$barang['id']}'>{$barang['nama_barang']} (Stok: {$barang['stok']})</option>";
                    }
                    ?>
                </select>
            `;

            barisBaru.insertCell(1).innerHTML = `
                <input type="number" name="harga_barang[]" placeholder="Harga Barang" required>
            `;

            barisBaru.insertCell(2).innerHTML = `
                <input type="number" name="jumlah_barang[]" placeholder="Jumlah" required>
            `;
        }
    </script>

</head>
<body>

<div class="container">
    <h2>Input Transaksi Penjualan</h2>

    <form action="transaksi_simpan.php" method="POST">

        <label>Waktu Transaksi</label><br>
        <input type="datetime-local" name="waktu_transaksi" required><br><br>

        <label>Pelanggan</label><br>
        <select name="pelanggan_id" required>
            <option value="">-- Pilih Pelanggan --</option>
            <?php while ($pelanggan = mysqli_fetch_assoc($queryPelanggan)) { ?>
                <option value="<?= $pelanggan['id']; ?>"><?= $pelanggan['nama']; ?></option>
            <?php } ?>
        </select><br><br>

        <label>Keterangan Transaksi</label><br>
        <textarea name="keterangan_transaksi" required></textarea>
        <br><br>

        <h3>Detail Barang</h3>

        <table border="1" cellpadding="5" id="tabelDetailBarang">
            <tr>
                <th>Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
            </tr>

            <tr>
                <td>
                    <select name="barang_id[]" required>
                        <?php
                        mysqli_data_seek($queryBarang, 0);
                        while ($barang = mysqli_fetch_assoc($queryBarang)) {
                            echo "<option value='{$barang['id']}'>{$barang['nama_barang']} (Stok: {$barang['stok']})</option>";
                        }
                        ?>
                    </select>
                </td>

                <td><input type="number" name="harga_barang[]" required></td>
                <td><input type="number" name="jumlah_barang[]" required></td>
            </tr>
        </table>

        <br>
        <button type="button" onclick="tambahBarisDetail()">Tambah Baris Barang</button>
        <br><br>

        <button type="submit">Simpan Transaksi</button>

    </form>
</div>

</body>
</html>