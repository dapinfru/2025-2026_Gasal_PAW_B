<?php
function validateData(&$errors, $data) {
    //Validasi Nama (hanya huruf & spasi)
    if (!preg_match("/^[a-zA-Z ]+$/", trim($data['nama']))) {
        $errors['nama'] = "Nama hanya boleh huruf dan spasi.";
    }

    //Validasi Email (gunakan filter_var)
    if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email tidak valid.";
    }

    //Validasi Password (minimal 6 karakter)
    if (strlen($data['password']) < 6) {
        $errors['password'] = "Password minimal 6 karakter.";
    }

    //Validasi Tanggal Lahir (gunakan checkdate)
    $tanggal = explode("-", $data['tanggal']);
    if (count($tanggal) == 3) {
        if (!checkdate($tanggal[1], $tanggal[2], $tanggal[0])) {
            $errors['tanggal'] = "Tanggal lahir tidak valid.";
        }
    } else {
        $errors['tanggal'] = "Format tanggal harus yyyy-mm-dd.";
    }

    // Validasi IP Address
    if (!filter_var($data['ip'], FILTER_VALIDATE_IP)) {
        $errors['ip'] = "IP Address tidak valid.";
    }
}
?>