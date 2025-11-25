<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$plain_password = $_POST['password'];

$q = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' LIMIT 1");
if(mysqli_num_rows($q) > 0){
    $data = mysqli_fetch_assoc($q);
    $hash = $data['password'];

    // VERIFIKASI PASSWORD MENGGUNAKAN MD5
    if(md5($plain_password) == $hash){
        $_SESSION['username'] = $data['username'];
        $_SESSION['level'] = $data['level'];
        header("Location: index.php");
        exit();
    } else {
        echo "<script>
            alert('Password salah');
            window.location='login_page.html';
        </script>";
    }
} else {
    echo "<script>
        alert('User tidak ditemukan');
        window.location='login_page.html';
    </script>";
}
?>