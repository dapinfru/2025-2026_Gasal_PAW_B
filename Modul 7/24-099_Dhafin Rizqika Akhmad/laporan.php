<?php
include 'koneksi.php';

date_default_timezone_set('Asia/Jakarta');

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

$dataRekapTanggal = [];
$labels = []; 
$data_chart = []; 

if ($hasilQueryRekapTanggal->num_rows > 0) {
    while($row = $hasilQueryRekapTanggal->fetch_assoc()) {
        $dataRekapTanggal[] = $row;
        $labels[] = date('Y-m-d', strtotime($row['Tanggal'])); 
        $data_chart[] = $row['Total'];
    }
}

$queryHitunganTotal = "
    SELECT 
        COUNT(DISTINCT pelanggan_id) AS Jumlah_Pelanggan, 
        SUM(total) AS Total_Pendapatan 
    FROM transaksi 
    WHERE DATE(waktu_transaksi) BETWEEN '$tanggalAwal' AND '$tanggalAkhir'
";
$hasilQueryHitunganTotal = $koneksi->query($queryHitunganTotal);
$dataHitunganTotal = $hasilQueryHitunganTotal->fetch_assoc();

$judulLaporan = "Rekap Laporan Penjualan " . date('d-m-Y', strtotime($tanggalAwal)) . " sampai " . date('d-m-Y', strtotime($tanggalAkhir));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan (Hasil Filter)</title>
    <link rel="stylesheet" href="style.css"> 
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    
    <div class="export-buttons" style="margin-bottom: 10px;">
        <a href="filter.php" style="text-decoration: none;">
            <button class="btn-print" style="background-color: #6c757d;">
                <i class="fa fa-arrow-left"></i> Kembali ke Filter
            </button>
        </a>
    </div>

    <div class="print-header" style="display:none;">
        <?php echo $judulLaporan; ?>
    </div>

    <h2>2. Hasil pencarian sebagai berikut</h2>

    <div class="export-buttons">
        <button class="btn-print" onclick="window.print()">
            <i class="fa fa-print"></i> Cetak / PDF
        </button>
        <a href="export_excel.php?tgl_awal=<?php echo $tanggalAwal; ?>&tgl_akhir=<?php echo $tanggalAkhir; ?>">
            <button class="btn-excel">
                <i class="fa fa-file-excel-o"></i> Excel
            </button>
        </a>
    </div>

    <div class="grafik-container">
        <h3>Grafik</h3>
        <canvas id="penjualanChart"></canvas>
    </div>

    <h3>Rekap</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Total</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php if (!empty($dataRekapTanggal)): ?>
                <?php foreach ($dataRekapTanggal as $row): ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo format_rupiah($row['Total']); ?></td>
                        <td><?php echo date('d M Y', strtotime($row['Tanggal'])); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" style="text-align: center;">Tidak ada data transaksi pada periode ini.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h3>Total</h3>
    <table class="total-table">
        <thead>
            <tr>
                <th>Jumlah Pelanggan</th>
                <th>Jumlah Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="data-pelanggan"><?php echo number_format($dataHitunganTotal['Jumlah_Pelanggan'], 0, ',', '.'); ?> Orang</td>
                <td class="data-pendapatan"><?php echo format_rupiah($dataHitunganTotal['Total_Pendapatan']); ?></td>
            </tr>
        </tbody>
    </table>

    <script>
        const ctx = document.getElementById('penjualanChart').getContext('2d');
        const penjualanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Total Penjualan (RP)',
                    data: <?php echo json_encode($data_chart); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true, title: { display: true, text: 'Total (Rp)' } },
                    x: { title: { display: true, text: 'Tanggal' } }
                }
            }
        });
    </script>

</body>
</html>
<?php
$koneksi->close();
?>