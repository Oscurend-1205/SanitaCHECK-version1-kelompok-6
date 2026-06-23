<?php
$apiUrl = 'http://127.0.0.1:8000/api/fasilitas';

// Data simulasi/dummy untuk chart jika API mati
$dummyFasilitas = [
    ['status_sanitasi' => 'Bersih'], ['status_sanitasi' => 'Bersih'], ['status_sanitasi' => 'Bersih'], ['status_sanitasi' => 'Bersih'], ['status_sanitasi' => 'Bersih'],
    ['status_sanitasi' => 'Bersih'], ['status_sanitasi' => 'Bersih'], ['status_sanitasi' => 'Bersih'],
    ['status_sanitasi' => 'Perlu Perhatian'], ['status_sanitasi' => 'Perlu Perhatian'], ['status_sanitasi' => 'Perlu Perhatian'],
    ['status_sanitasi' => 'Buruk'], ['status_sanitasi' => 'Buruk']
];

$fasilitas = [];
$apiError = false;

// Mengambil data dari API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 3);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response !== false && $httpCode >= 200 && $httpCode < 300) {
    $data = json_decode($response, true);
    $fasilitas = isset($data['data']) ? $data['data'] : (is_array($data) ? $data : []);
    if (empty($fasilitas)) $fasilitas = $dummyFasilitas;
} else {
    $apiError = true;
    $fasilitas = $dummyFasilitas;
}

// Rekapitulasi Data Status Sanitasi
$rekapStatus = [
    'Bersih' => 0,
    'Perlu Perhatian' => 0,
    'Buruk' => 0
];

foreach ($fasilitas as $f) {
    $s = $f['status_sanitasi'] ?? 'Unknown';
    // Mapping agar seragam
    if (stripos($s, 'bersih') !== false) $rekapStatus['Bersih']++;
    elseif (stripos($s, 'perhatian') !== false) $rekapStatus['Perlu Perhatian']++;
    elseif (stripos($s, 'buruk') !== false) $rekapStatus['Buruk']++;
}

// Simulasi data fasilitas paling sering bermasalah (Inovasi/Statistik Tambahan)
// Jika di dunia nyata, ini diambil dari API `GET /api/statistik-masalah`
$fasilitasMasalah = [
    'Toilet Pria Lantai 1' => 15,
    'Kantin B (Timur)' => 12,
    'Toilet Wanita Lantai 3' => 8,
    'Ruang Tunggu Pasien A' => 5,
    'Mushola Utama' => 3
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik & Grafik - SanitaCheck</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root { --primary-green: #198754; --dark-green: #146c43; }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; flex-direction: column; min-height: 100vh; }
        .navbar-custom { background-color: var(--primary-green); }
        .card-grafik { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 15px; }
        .page-header { background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 100%); color: white; padding: 40px 0; margin-bottom: 40px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php"><i class="fa-solid fa-leaf me-2"></i> SanitaCheck</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
                <li class="nav-item"><a class="nav-link active" href="grafik.php"><i class="fa-solid fa-chart-pie"></i> Statistik</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="page-header text-center">
    <div class="container">
        <h2 class="fw-bold"><i class="fa-solid fa-chart-pie me-2"></i> Dashboard Statistik Publik</h2>
        <p class="lead mb-0">Visualisasi data tingkat kebersihan fasilitas umum berdasarkan hasil inspeksi harian.</p>
    </div>
</div>

<div class="container flex-grow-1 mb-5">
    <?php if ($apiError): ?>
    <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> Perhatian!</strong> Koneksi ke server API terputus. Menampilkan data simulasi grafik (offline mode).
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="row g-4">
        <!-- Grafik Lingkaran (Pie Chart) Status Saat Ini -->
        <div class="col-lg-6">
            <div class="card card-grafik h-100">
                <div class="card-body text-center p-4">
                    <h5 class="fw-bold text-success mb-2">Sebaran Status Sanitasi Global</h5>
                    <p class="text-muted small mb-4">Persentase kondisi seluruh fasilitas saat ini</p>
                    <div style="height: 320px; display: flex; justify-content: center; position: relative;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Grafik Batang (Bar Chart) Top Masalah -->
        <div class="col-lg-6">
            <div class="card card-grafik h-100">
                <div class="card-body text-center p-4">
                    <h5 class="fw-bold text-danger mb-2">Top 5 Fasilitas Paling Sering Bermasalah</h5>
                    <p class="text-muted small mb-4">Akumulasi laporan kebersihan (Perlu Perhatian / Buruk) bulan ini</p>
                    <div style="height: 320px; position: relative;">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-0">&copy; 2026 SanitaCheck - Kelompok 6. All Rights Reserved.</p>
    </div>
</footer>

<script>
    // Konfigurasi Chart.js untuk Pie Chart
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: {
            labels: ['Bersih', 'Perlu Perhatian', 'Buruk'],
            datasets: [{
                data: [<?= $rekapStatus['Bersih'] ?>, <?= $rekapStatus['Perlu Perhatian'] ?>, <?= $rekapStatus['Buruk'] ?>],
                backgroundColor: ['#198754', '#ffc107', '#dc3545'],
                hoverOffset: 4,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { 
                legend: { position: 'bottom', labels: { padding: 20, font: { family: "'Segoe UI', sans-serif" } } } 
            },
            cutout: '60%' // Membuat efek doughnut yang lebih elegan
        }
    });

    // Konfigurasi Chart.js untuk Bar Chart
    const barCtx = document.getElementById('barChart').getContext('2d');
    const fasilitasLabels = <?= json_encode(array_keys($fasilitasMasalah)) ?>;
    const fasilitasData = <?= json_encode(array_values($fasilitasMasalah)) ?>;

    new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: fasilitasLabels,
            datasets: [{
                label: 'Frekuensi Masalah',
                data: fasilitasData,
                backgroundColor: 'rgba(220, 53, 69, 0.8)', // Merah Bootstrap dengan opacity
                borderColor: '#dc3545',
                borderWidth: 1,
                borderRadius: 6,
                barPercentage: 0.6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: { 
                y: { 
                    beginAtZero: true, 
                    grid: { borderDash: [5, 5] },
                    ticks: { precision: 0 } // Menghilangkan desimal di sumbu Y
                },
                x: {
                    grid: { display: false }
                }
            },
            plugins: { 
                legend: { display: false },
                tooltip: { backgroundColor: 'rgba(0,0,0,0.8)' }
            }
        }
    });
</script>

</body>
</html>
