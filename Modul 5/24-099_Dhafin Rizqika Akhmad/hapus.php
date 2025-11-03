<?php
require 'config.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM supplier WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header("Location: tampilan.php");
exit;
