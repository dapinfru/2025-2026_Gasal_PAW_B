<?php
function salam() {
    echo "Halo!<br>";
}

function sapa($nama) {
    echo "Halo  / Hai, $nama<br>";
}

function jumlah($a, $b) {
    return $a + $b;
}

function hobi($nama, $hobi = "membaca") {
    echo "$nama suka $hobi<br>";
}

salam();
sapa("Andi");
echo "Hasil jumlah: " . jumlah(5, 7) . "<br>";
hobi("Budi");
hobi("Citra", "berenang");
?>