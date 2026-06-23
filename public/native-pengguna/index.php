<?php
// Konfigurasi API
$apiUrl = 'http://127.0.0.1:8000/api/fasilitas';

// Data simulasi/dummy jika API mati
$dummyFasilitas = [
    [
        'id' => 1,
        'nama_fasilitas' => 'Toilet Utama Lantai 1',
        'jenis_fasilitas' => 'Toilet',
        'lokasi' => 'Gedung A',
        'status_sanitasi' => 'Bersih',
        'penanggung_jawab' => 'Yanto 24 Jam'
    ],
    [
        'id' => 2,
        'nama_fasilitas' => 'Kantin Sehat B',
        'jenis_fasilitas' => 'Kantin',
        'lokasi' => 'Gedung B',
        'status_sanitasi' => 'Perlu Perhatian',
        'penanggung_jawab' => 'Wawan Galon'
    ],
    [
        'id' => 3,
        'nama_fasilitas' => 'Ruang Tunggu Pasien',
        'jenis_fasilitas' => 'Ruang Tunggu',
        'lokasi' => 'Lobi Utama',
        'status_sanitasi' => 'Buruk',
        'penanggung_jawab' => 'Asep Klining'
    ],
    [
        'id' => 4,
        'nama_fasilitas' => 'Toilet Pria Lantai 2',
        'jenis_fasilitas' => 'Toilet',
        'lokasi' => 'Gedung C',
        'status_sanitasi' => 'Bersih',
        'penanggung_jawab' => 'Agus Super'
    ]
];

$fasilitas = [];
$apiError = false;

// Mengambil data dari API dengan cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 3); // Timeout 3 detik agar tidak blank lama
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($response !== false && $httpCode >= 200 && $httpCode < 300) {
    $data = json_decode($response, true);
    // Asumsi API mengembalikan JSON dengan key 'data' atau array langsung
    $fasilitas = isset($data['data']) ? $data['data'] : (is_array($data) ? $data : []);
    if (empty($fasilitas)) {
        $fasilitas = $dummyFasilitas; // Gunakan dummy jika response kosong
    }
} else {
    $apiError = true;
    $fasilitas = $dummyFasilitas;
}

// Fitur Pencarian & Filter
$search = $_GET['search'] ?? '';
$jenis = $_GET['jenis'] ?? '';

if (!empty($search) || !empty($jenis)) {
    $fasilitas = array_filter($fasilitas, function($item) use ($search, $jenis) {
        $matchSearch = empty($search) || stripos($item['nama_fasilitas'], $search) !== false;
        $matchJenis = empty($jenis) || strcasecmp($item['jenis_fasilitas'], $jenis) == 0;
        return $matchSearch && $matchJenis;
    });
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SanitaCheck - Monitoring Kebersihan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        :root {
            --primary-green: #198754;
            --dark-green: #146c43;
            --light-green: #d1e7dd;
        }
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex; flex-direction: column; min-height: 100vh; }
        .navbar-custom { background-color: var(--primary-green); }
        .hero-section {
            background: linear-gradient(135deg, var(--dark-green) 0%, var(--primary-green) 100%);
            color: white;
            padding: 80px 0;
            margin-bottom: 40px;
            border-bottom-left-radius: 50px;
            border-bottom-right-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .card-fasilitas {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .card-fasilitas:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        .status-badge {
            font-size: 0.85rem;
            padding: 8px 12px;
            border-radius: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
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
                <li class="nav-item">
                    <a class="nav-link active" href="index.php"><i class="fa-solid fa-house"></i> Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="grafik.php"><i class="fa-solid fa-chart-pie"></i> Statistik</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-outline-light btn-sm ms-lg-3 rounded-pill px-3" href="/login" target="_blank"><i class="fa-solid fa-right-to-bracket"></i> Login Petugas</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="hero-section text-center">
    <div class="container">
        <h1 class="display-4 fw-bold mb-3"><i class="fa-solid fa-hands-bubbles"></i> Kampus Sehat Terintegrasi</h1>
        <p class="lead mb-4">Pantau kondisi sanitasi dan kebersihan fasilitas umum di lingkungan kampus secara real-time.</p>
        
        <!-- Form Pencarian -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="card p-3 shadow" action="index.php" method="GET">
                    <div class="row g-2">
                        <div class="col-md-5">
                            <input type="text" name="search" class="form-control" placeholder="Cari fasilitas..." value="<?= htmlspecialchars($search) ?>">
                        </div>
                        <div class="col-md-4">
                            <select name="jenis" class="form-select">
                                <option value="">Semua Jenis Fasilitas</option>
                                <option value="Toilet" <?= $jenis == 'Toilet' ? 'selected' : '' ?>>Toilet</option>
                                <option value="Kantin" <?= $jenis == 'Kantin' ? 'selected' : '' ?>>Kantin</option>
                                <option value="Ruang Tunggu" <?= $jenis == 'Ruang Tunggu' ? 'selected' : '' ?>>Ruang Tunggu</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success w-100 fw-bold"><i class="fa-solid fa-magnifying-glass"></i> Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container flex-grow-1 mb-5">
    <?php if ($apiError): ?>
    <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
        <strong><i class="fa-solid fa-triangle-exclamation"></i> Perhatian!</strong> Koneksi ke server API terputus. Menampilkan data simulasi (offline mode).
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h3 class="fw-bold text-success mb-0">Daftar Fasilitas Umum</h3>
        <?php if (!empty($search) || !empty($jenis)): ?>
            <a href="index.php" class="btn btn-sm btn-outline-secondary">Reset Filter</a>
        <?php endif; ?>
    </div>

    <div class="row g-4">
        <?php if (count($fasilitas) > 0): ?>
            <?php foreach ($fasilitas as $f): ?>
                <?php 
                    // Menentukan warna badge berdasarkan status
                    $badgeClass = 'bg-secondary';
                    $icon = 'fa-circle-info';
                    $status = strtolower($f['status_sanitasi'] ?? '');
                    
                    if (str_contains($status, 'bersih')) {
                        $badgeClass = 'bg-success';
                        $icon = 'fa-circle-check';
                    } elseif (str_contains($status, 'perhatian')) {
                        $badgeClass = 'bg-warning text-dark';
                        $icon = 'fa-triangle-exclamation';
                    } elseif (str_contains($status, 'buruk')) {
                        $badgeClass = 'bg-danger';
                        $icon = 'fa-circle-xmark';
                    }
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-fasilitas h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title fw-bold text-dark mb-0"><?= htmlspecialchars($f['nama_fasilitas'] ?? 'Tidak Diketahui') ?></h5>
                                <span class="badge <?= $badgeClass ?> status-badge">
                                    <i class="fa-solid <?= $icon ?>"></i> <?= htmlspecialchars($f['status_sanitasi'] ?? 'Unknown') ?>
                                </span>
                            </div>
                            <p class="card-text text-muted small mb-2"><i class="fa-solid fa-tags"></i> Jenis: <?= htmlspecialchars($f['jenis_fasilitas'] ?? '-') ?></p>
                            <p class="card-text text-muted small mb-2"><i class="fa-solid fa-location-dot text-danger"></i> Lokasi: <?= htmlspecialchars($f['lokasi'] ?? '-') ?></p>
                            <p class="card-text text-muted small mb-4"><i class="fa-solid fa-user-tie text-primary"></i> Penanggung Jawab: <span class="fw-medium"><?= htmlspecialchars($f['penanggung_jawab'] ?? '-') ?></span></p>
                            
                            <a href="detail.php?id=<?= urlencode($f['id'] ?? '') ?>" class="btn btn-outline-success w-100 fw-medium">
                                <i class="fa-solid fa-eye"></i> Lihat Detail/Riwayat
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <img src="https://cdn-icons-png.flaticon.com/512/7486/7486747.png" alt="Not Found" width="120" class="mb-3 opacity-50">
                <h5 class="text-muted">Fasilitas tidak ditemukan</h5>
                <p class="text-muted">Coba ubah kata kunci pencarian atau filter Anda.</p>
            </div>
        <?php endif; ?>
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
