<?php
$id = $_GET['id'] ?? 1;
$apiUrl = "http://127.0.0.1:8000/api/fasilitas/{$id}/inspeksi";

// Data simulasi/dummy untuk detail jika API mati
$dummyDetail = [
    'fasilitas' => [
        'id' => $id,
        'nama_fasilitas' => 'Toilet Utama Lantai ' . htmlspecialchars($id),
        'lokasi' => 'Gedung Pusat',
        'status_sanitasi' => 'Perlu Perhatian',
        'penanggung_jawab' => 'Bapak Yanto'
    ],
    'inspeksi_terakhir' => [
        'kebersihan' => 'Cukup',
        'air' => 'Lancar',
        'sabun' => 'Habis',
        'bau' => 'Sedikit Bau',
        'rekomendasi' => 'Segera isi ulang sabun cuci tangan dan bersihkan noda lantai.'
    ],
    'riwayat_inspeksi' => [
        ['tanggal' => date('Y-m-d H:i', strtotime('-2 hours')), 'petugas' => 'Siti Aminah', 'status' => 'Perlu Perhatian', 'catatan' => 'Sabun habis'],
        ['tanggal' => date('Y-m-d H:i', strtotime('-1 day')), 'petugas' => 'Budi Santoso', 'status' => 'Bersih', 'catatan' => 'Aman terkendali, lantai bersih.'],
        ['tanggal' => date('Y-m-d H:i', strtotime('-2 days')), 'petugas' => 'Siti Aminah', 'status' => 'Bersih', 'catatan' => 'Sudah dibersihkan pagi ini.']
    ]
];

$detail = [];
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
    // Sesuaikan dengan struktur JSON response dari Laravel
    $detail = isset($data['data']) ? $data['data'] : (is_array($data) ? $data : []);
    
    // Fallback ke dummy jika struktur tidak lengkap (misal endpoint belum dibuat sempurna)
    if (empty($detail) || !isset($detail['fasilitas'])) {
        $detail = $dummyDetail;
    }
} else {
    $apiError = true;
    $detail = $dummyDetail;
}

$fasilitas = $detail['fasilitas'] ?? [];
$inspeksiTerakhir = $detail['inspeksi_terakhir'] ?? [];
$riwayat = $detail['riwayat_inspeksi'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Fasilitas - SanitaCheck</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary-green: #198754;
            --dark-green: #146c43;
        }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; flex-direction: column; min-height: 100vh; }
        .navbar-custom { background-color: var(--primary-green); }
        .detail-header {
            background-color: white;
            border-left: 6px solid var(--primary-green);
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .status-badge { font-size: 1rem; padding: 10px 20px; border-radius: 30px; font-weight: 600; }
        .card-info { border: none; box-shadow: 0 4px 15px rgba(0,0,0,0.05); border-radius: 12px; overflow: hidden; }
        .table-custom thead { background-color: var(--dark-green); color: white; }
        .table-custom th { font-weight: 500; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">
            <i class="fa-solid fa-leaf me-2"></i> SanitaCheck
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php"><i class="fa-solid fa-house"></i> Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="grafik.php"><i class="fa-solid fa-chart-pie"></i> Statistik</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container flex-grow-1 py-4">
    <div class="mb-4">
        <a href="index.php" class="text-decoration-none text-success fw-bold">
            <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Daftar Fasilitas
        </a>
    </div>

    <?php if ($apiError): ?>
    <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> Perhatian!</strong> Koneksi ke server API terputus. Menampilkan data simulasi (offline mode).
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <!-- Header Fasilitas -->
    <div class="detail-header mb-4 d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-2 text-dark"><?= htmlspecialchars($fasilitas['nama_fasilitas'] ?? 'Fasilitas Tidak Dikenal') ?></h2>
            <div class="text-muted d-flex gap-3 flex-wrap">
                <span><i class="fa-solid fa-location-dot text-danger"></i> Lokasi: <?= htmlspecialchars($fasilitas['lokasi'] ?? '-') ?></span>
                <span><i class="fa-solid fa-user-tie text-primary"></i> PJ: <?= htmlspecialchars($fasilitas['penanggung_jawab'] ?? '-') ?></span>
            </div>
        </div>
        <div>
            <?php 
                $badgeClass = 'bg-secondary';
                $status = strtolower($fasilitas['status_sanitasi'] ?? '');
                if (str_contains($status, 'bersih')) $badgeClass = 'bg-success';
                elseif (str_contains($status, 'perhatian')) $badgeClass = 'bg-warning text-dark';
                elseif (str_contains($status, 'buruk')) $badgeClass = 'bg-danger';
            ?>
            <span class="badge <?= $badgeClass ?> status-badge shadow-sm">
                <i class="fa-solid fa-info-circle"></i> Status: <?= htmlspecialchars($fasilitas['status_sanitasi'] ?? 'Unknown') ?>
            </span>
        </div>
    </div>

    <div class="row g-4">
        <!-- Kondisi Saat Ini -->
        <div class="col-lg-5">
            <div class="card card-info h-100">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                    <h5 class="card-title fw-bold text-success mb-0"><i class="fa-solid fa-clipboard-check me-2"></i> Kondisi Inspeksi Terakhir</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fa-solid fa-broom text-secondary w-20px text-center"></i> Kebersihan</span>
                            <span class="fw-bold"><?= htmlspecialchars($inspeksiTerakhir['kebersihan'] ?? '-') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fa-solid fa-droplet text-info w-20px text-center"></i> Air</span>
                            <span class="fw-bold"><?= htmlspecialchars($inspeksiTerakhir['air'] ?? '-') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fa-solid fa-pump-soap text-warning w-20px text-center"></i> Sabun/Tisu</span>
                            <span class="fw-bold"><?= htmlspecialchars($inspeksiTerakhir['sabun'] ?? '-') ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            <span><i class="fa-solid fa-wind text-success w-20px text-center"></i> Bau</span>
                            <span class="fw-bold"><?= htmlspecialchars($inspeksiTerakhir['bau'] ?? '-') ?></span>
                        </li>
                    </ul>
                    <div class="alert alert-success border-0 shadow-sm mb-0">
                        <strong><i class="fa-regular fa-lightbulb"></i> Rekomendasi Tindak Lanjut:</strong><br>
                        <span class="small"><?= nl2br(htmlspecialchars($inspeksiTerakhir['rekomendasi'] ?? 'Tidak ada catatan khusus.')) ?></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Inspeksi -->
        <div class="col-lg-7">
            <div class="card card-info h-100">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-3">
                    <h5 class="card-title fw-bold text-success mb-0"><i class="fa-solid fa-clock-rotate-left me-2"></i> Riwayat Inspeksi (Logbook)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-custom text-center align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="py-3">Waktu Inspeksi</th>
                                    <th class="py-3">Petugas</th>
                                    <th class="py-3">Status</th>
                                    <th class="py-3">Catatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (count($riwayat) > 0): ?>
                                    <?php foreach ($riwayat as $r): ?>
                                    <tr>
                                        <td class="text-nowrap"><?= htmlspecialchars($r['tanggal'] ?? '-') ?></td>
                                        <td><?= htmlspecialchars($r['petugas'] ?? '-') ?></td>
                                        <td>
                                            <?php 
                                                $sBadge = 'bg-secondary';
                                                $s = strtolower($r['status'] ?? '');
                                                if (str_contains($s, 'bersih')) $sBadge = 'bg-success';
                                                elseif (str_contains($s, 'perhatian')) $sBadge = 'bg-warning text-dark';
                                                elseif (str_contains($s, 'buruk')) $sBadge = 'bg-danger';
                                            ?>
                                            <span class="badge <?= $sBadge ?> rounded-pill px-3"><?= htmlspecialchars($r['status'] ?? '-') ?></span>
                                        </td>
                                        <td class="text-start small"><?= htmlspecialchars($r['catatan'] ?? '-') ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="4" class="text-muted py-4">Belum ada riwayat inspeksi tercatat.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
