<?php
$total = 0;
$ulang = "y";

while ($ulang == "y") {
    echo "Menu:\n";
    echo "1. Geprekin Aja - 15000\n";
    echo "2. Mie Ayam - 12000\n";
    echo "3. Esteh - 5000\n";

    $pilihan = readline("Pilih menu (1-3): ");

    switch ($pilihan) {
        case 1:
            $total += 15000;
            break;
        case 2:
            $total += 12000;
            break;
        case 3:
            $total += 5000;
            break;
        default:
            echo "Menu tidak valid!\n";
    }

    $ulang = readline("Apakah ingin beli lagi? (y/n): ");
}

echo "\nTotal yang harus dibayar: Rp " . $total;
?>