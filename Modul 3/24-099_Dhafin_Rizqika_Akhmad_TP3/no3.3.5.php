<?php
$students = array(
    array("Alex", "220401", "0812345678"),
    array("Bianca", "220402", "0812345687"),
    array("Candice", "220403", "0812345665")
);

$students[] = ["Daniel", "220404", "0812345699"];
$students[] = ["Elaine", "220405", "0812345611"];
$students[] = ["Farhan", "220406", "0812345622"];
$students[] = ["Gita", "220407", "0812345633"];
$students[] = ["Hafidz", "220408", "0812345644"];

echo "<h3>Data Mahasiswa</h3>";
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr><th>Nama</th><th>NIM</th><th>No HP</th></tr>";

for ($row = 0; $row < count($students); $row++) {
    echo "<tr>";
    for ($col = 0; $col < 3; $col++) {
        echo "<td>" . $students[$row][$col] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>