<?php
// Array tinggi badan
$height = array(
    "Andy" => "176",
    "Barry" => "165",
    "Charlie" => "170",
    "Alan" => "167",
    "Zaki" => "175",
    "Riel" => "179",
    "Rafi" => "187",
    "Nafaul" => "177"
);
echo "<b>Data Tinggi Badan:</b><br>";
foreach($height as $nama => $tinggi) {
    echo $nama . " " . $tinggi . " cm<br>";
}
echo "<br><b>Data Berat Badan:</b><br>";
$weight = array(
    "Alan" => 49,
    "Nafaul" => 46,
    "Zaki" => 44
);
foreach($weight as $nama => $berat) {
    echo $nama . " " . $berat . " kg<br>";
}
?>