<?php
$warna1 = array("Red", "Green", "Blue");
$warna2 = array("Purple", "Black", "Yellow");

echo "<h3>1. Fungsi array_push()</h3>";
array_push($warna1, "Grey");
echo "Setelah menambahkan 'Grey' ke array warna1:<br>";
print_r($warna1);
echo "<hr>";

echo "<h3>2. Fungsi array_merge()</h3>";
$gabung = array_merge($warna1, $warna2);
echo "Hasil penggabungan warna1 dan warna2:<br>";
print_r($gabung);
echo "<hr>";

echo "<h3>3. Fungsi array_values()</h3>";
$nilai = array_values($gabung);
echo "Menampilkan semua nilai array dengan indeks baru:<br>";
print_r($nilai);
echo "<hr>";

echo "<h3>4. Fungsi array_search()</h3>";
$index = array_search("Green", $gabung);
echo "Posisi elemen 'Green' ada di indeks ke-<b>$index</b>.<br>";
echo "<hr>";

echo "<h3>5. Fungsi array_filter()</h3>";
$pendek = array_filter($gabung, function($w) {
    return strlen($w) < 5; // hanya warna yang kurang dari 5 huruf
});
echo "Warna dengan nama kurang dari 5 huruf:<br>";
print_r($pendek);
echo "<hr>";

echo "<h3>6. Fungsi Sorting (sort)</h3>";
sort($gabung);
echo "Hasil pengurutan warna dari A ke Z:<br>";
print_r($gabung);
?>