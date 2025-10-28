<?php
$errors = array();

if (isset($_POST['surname'])) {
    require 'validate.inc';
    validateName($errors, $_POST, 'surname');
    validateAge($errors, $_POST, 'age');

    if ($errors) {
        echo '<h2>Data tidak valid, perbaiki kesalahan berikut:</h2>';
        foreach ($errors as $field => $error) {
            echo "$field $error<br/>";
        }
        include 'form.inc';
    } else {
        echo '<h2>Form berhasil dikirim tanpa kesalahan!</h2>';
    }
} else {
    include 'form.inc';
}
?>