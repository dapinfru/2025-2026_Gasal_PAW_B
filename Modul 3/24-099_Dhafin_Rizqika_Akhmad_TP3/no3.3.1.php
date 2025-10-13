<?php
$fruits = array("Alpukat", "Blueberry", "Cherry", "Durian", "Mangga", "Apel", "Jeruk", "Anggur");

echo "Data array fruits:<br>";
foreach($fruits as $a => $val){
    echo "Indeks $a : $val<br>";
}
echo "Indeks tertinggi: " . (count($fruits) - 1) . "<br><br>";

unset($fruits[4]);

echo "No 3.3.2 (after hapus data mangga) :<br>";
foreach($fruits as $a => $val){
    echo "Indeks $a : $val<br>";
}
echo "Indeks tertinggi tetap " . (count($fruits)) . " data (indeks 4 kosong).<br><br>";

$vegies = array("Wortel", "Tomat", "Broccoli");

echo "Data Vagies:<br>";
foreach($vegies as $v){
    echo "$v<br>";
}
?>