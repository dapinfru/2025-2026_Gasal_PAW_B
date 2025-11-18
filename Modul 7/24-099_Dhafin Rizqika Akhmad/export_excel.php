<?php
include 'koneksi.php';

$tanggalAwal = isset($_GET['tgl_awal']) ? $_GET['tgl_awal'] : date('Y-m-01');
$tanggalAkhir = isset($_GET['tgl_akhir']) ? $_GET['tgl_akhir'] : date('Y-m-d');

$queryRekapTanggal = "
    SELECT 
        DATE(waktu_transaksi) AS Tanggal, 
        SUM(total) AS Total 
    FROM transaksi 
    WHERE DATE(waktu_transaksi) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
    GROUP BY DATE(waktu_transaksi)
    ORDER BY Tanggal ASC
";
$hasilQueryRekapTanggal = $koneksi->query($queryRekapTanggal);

$queryHitunganTotal = "
    SELECT 
        COUNT(DISTINCT pelanggan_id) AS Jumlah_Pelanggan, 
        SUM(total) AS Total_Pendapatan 
    FROM transaksi 
    WHERE DATE(waktu_transaksi) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
";
$hasilQueryHitunganTotal = $koneksi->query($queryHitunganTotal);
$dataHitunganTotal = $hasilQueryHitunganTotal->fetch_assoc();

function format_excel_number($angka){
    return number_format($angka, 0, '.', ''); 
}

$filename = "LaporanPenjualan_" . date('Ymd', strtotime($tanggalAwal)) . "_" . date('Ymd', strtotime($tanggalAkhir));
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename={$filename}.xls");
header("Pragma: no-cache");
header("Expires: 0");

echo "<h3>Rekap Laporan Penjualan</h3>";
echo "<h4>Periode: " . date('d-m-Y', strtotime($tanggalAwal)) . " sampai " . date('d-m-Y', strtotime($tanggalAkhir)) . "</h4>";
echo "<br>";

echo "<table border='1'>";
echo "<thead>";
echo "<tr><th>No</th><th>Tanggal</th><th>Total Penjualan (Rp)</th></tr>";
echo "</thead>";
echo "<tbody>";

$no = 1;
if ($hasilQueryRekapTanggal->num_rows > 0) {
    while($row = $hasilQueryRekapTanggal->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . date('d/m/Y', strtotime($row['Tanggal'])) . "</td>";
        echo "<td>" . format_excel_number($row['Total']) . "</td>"; 
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Tidak ada data transaksi.</td></tr>";
}
echo "</tbody>";
echo "</table>";

echo "<br>";
echo "<h4>Rekap Total Kumulatif</h4>";
echo "<table border='1'>";
echo "<tr><td>Total Pelanggan</td><td>" . format_excel_number($dataHitunganTotal['Jumlah_Pelanggan']) . " Orang</td></tr>";
echo "<tr><td>Total Pendapatan</td><td>" . format_excel_number($dataHitunganTotal['Total_Pendapatan']) . "</td></tr>";
echo "</table>";

$koneksi->close();
?>