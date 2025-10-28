<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Data Mahasiswa</title>
</head>
<body>
    <h2>Form Input Data Mahasiswa</h2>
    <form method="post" action="processData.php">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" required><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="text" name="tanggal" placeholder="format: yyyy-mm-dd" required><br><br>

        <label>IP Address:</label><br>
        <input type="text" name="ip" required><br><br>

        <input type="submit" value="Kirim Data">
    </form>
</body>
</html>