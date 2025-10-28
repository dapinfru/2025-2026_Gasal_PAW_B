<?php
require 'validate.inc';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    validateData($errors, $_POST);

    if ($errors) {
        echo "<h2>Terjadi Kesalahan:</h2>";
        foreach ($errors as $field => $error) {
            echo "<p><strong>$field:</strong> $error</p>";
        }
        echo "<a href='form.php'>Kembali ke Form</a>";
    } else {
        echo "<h2>Data berhasil dikirim</h2>";
        echo "<p><strong>Nama:</strong> " . htmlspecialchars($_POST['nama']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><strong>Tanggal Lahir:</strong> " . htmlspecialchars($_POST['tanggal']) . "</p>";
        echo "<p><strong>IP Address:</strong> " . htmlspecialchars($_POST['ip']) . "</p>";
    }
} else {
    header("Location: form.php");
    exit;
}
?>