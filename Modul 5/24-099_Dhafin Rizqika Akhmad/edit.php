<?php
require 'config.php';

if (!isset($_GET['id'])) {
    header("Location: tampilan.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM supplier WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Data tidak ditemukan!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $update = $pdo->prepare("UPDATE supplier SET nama=?, telp=?, alamat=? WHERE id=?");
    $update->execute([$nama, $telp, $alamat, $id]);

    header("Location: tampilan.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Supplier</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h3 class="mb-4 text-primary">Edit Data Supplier</h3>

    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Telp</label>
            <input type="text" name="telp" class="form-control" value="<?= htmlspecialchars($data['telp']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" value="<?= htmlspecialchars($data['alamat']) ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="tampilan.php" class="btn btn-danger">Batal</a>
    </form>
</div>
</body>
</html>