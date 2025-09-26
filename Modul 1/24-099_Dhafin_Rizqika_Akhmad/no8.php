<?php
$text = "Belajar PHP itu Seru";

echo "Panjang string: " . strlen($text) . "<br>";
echo "Jumlah kata: " . str_word_count($text) . "<br>";
echo "Dibalik: " . strrev($text) . "<br>";
echo "Posisi kata 'PHP': " . strpos($text, "PHP") . "<br>";
echo "Ganti kata: " . str_replace("menyenangkan", "mudah", $text);
?>