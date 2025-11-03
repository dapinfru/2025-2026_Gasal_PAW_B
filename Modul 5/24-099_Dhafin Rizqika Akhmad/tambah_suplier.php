<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $stmt = $pdo->prepare("INSERT INTO supplier (nama, telp, alamat) VALUES (?, ?, ?)");
    $stmt->execute([$nama, $telp, $alamat]);

    header("Location: tampilan.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Master Supplier Baru</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3 class="mb-4 text-primary">Tambah Data Master Supplier Baru</h3>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required placeholder="Nama ">
        </div>

        <div class="mb-3">
            <label class="form-label">Telp</label>
            <input type="text" name="telp" class="form-control" required placeholder="Telp ">
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" required placeholder="Alamat ">
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="tampilan.php" class="btn btn-danger">Batal</a>
    </form>
</div>

</body>
</html>