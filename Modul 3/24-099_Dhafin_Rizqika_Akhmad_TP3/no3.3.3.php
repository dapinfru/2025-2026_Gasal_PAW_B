<?php
$height = array("Andy" => "176", "Barry" => "165", "Charlie" => "170");
echo "Data awal:<br>";
echo "Andy is " . $height['Andy'] . " cm tall.<br><br>";

$height["Alan"] = "167";
$height["El"] = "175";
$height["Ibra"] = "179";
$height["Tierza"] = "187";
$height["Dapin"] = "177";

$keys = array_keys($height);
echo "Nilai terakhir sebelum penghapusan: " . end($keys) . " (" . $height[end($keys)] . " cm)<br><br>";

echo "Data yang dihapus: Dapin dengan tinggi " . $height["Dapin"] . " cm<br>";
unset($height["Dapin"]);

$keys = array_keys($height);
echo "Nilai terakhir setelah penghapusan: " . end($keys) . " (" . $height[end($keys)] . " cm)<br><br>";

$weight = array("Alan" => 49, "Dapin" => 46, "El" => 44);

echo "Data kedua dari array weight: Dapin dengan berat " . $weight["Dapin"] . " kg<br>";
?>