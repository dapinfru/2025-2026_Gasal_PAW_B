<?php
$fruits = array("Avocado", "Blueberry", "Cherry");

for ($i = 0; $i < 5; $i++) {
    $fruits[] = "Buah ke-" . ($i + 4);
}

$arrlength = count($fruits);

echo "Data array fruits:<br>";
for ($x = 0; $x < $arrlength; $x++) {
    echo "Indeks $x : " . $fruits[$x] . "<br>";
}

echo "<br>Jumlah data dalam array fruits saat ini: " . $arrlength . "<br><br>";

$vegies = array("Pear", "Wortel", "Brokoli");

$veglength = count($vegies);

echo "Data array vegies:<br>";
for ($v = 0; $v < $veglength; $v++) {
    echo "Data $v : " . $vegies[$v] . "<br>";
}
?>