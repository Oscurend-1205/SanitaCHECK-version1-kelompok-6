<?php
require_once 'services/api.php';
$stats = getStatistik();

// Fetch 10 aktivitas inspeksi terbaru (mock)
$response_fasilitas = json_decode(fetchApi('/api/fasilitas'), true);
$semua_fasilitas = $response_fasilitas['status'] == 'success' ? $response_fasilitas['data'] : [];

// Ambil 5 top fasilitas untuk ditampilkan di tabel
$top_5 = array_slice($semua_fasilitas, 0, 5);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SanitaCheck - Sistem Monitoring Sanitasi</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<?php include 'components/navbar.php'; ?>

<!-- Hero Section -->
<div class="bg-success text-white py-5 mb-4">
    <div class="container text-center">
        <h1 class="display-5 fw-bold mb-3">SanitaCHECK</h1>
        <p class="lead mb-4">Sistem Monitoring Sanitasi dan Kebersihan Fasilitas Umum Kampus ITSK RS dr. Soepraoen Kesdam V/BRW Malang.</p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="/fasilitas.php" method="GET" class="d-flex bg-white p-2 rounded shadow-sm">
                    <input type="text" name="search" class="form-control border-0 shadow-none" placeholder="Cari nama gedung atau toilet...">
                    <button type="submit" class="btn btn-success px-4">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container mb-5">
    
    <!-- Statistik Harian -->
    <div class="row g-4 mb-5">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card hover-elevate h-100 bg-success text-white">
                <div class="card-body d-flex align-items-center">
                    <i class="bi bi-percent stat-icon me-3"></i>
                    <div>
                        <h6 class="card-title text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Persentase Kebersihan</h6>
                        <h2 class="mb-0 fw-bold"><?= $stats['persentase_kebersihan'] ?>%</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card hover-elevate h-100 border-primary border-start border-4">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Inspeksi Hari Ini</h6>
                    <h2 class="mb-0 text-primary fw-bold"><?= $stats['inspeksi_hari_ini'] ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card hover-elevate h-100 border-danger border-start border-4">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Perlu Tindak Lanjut</h6>
                    <h2 class="mb-0 text-danger fw-bold"><?= $stats['perlu_tindak_lanjut'] ?></h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <div class="card hover-elevate h-100 border-warning border-start border-4">
                <div class="card-body">
                    <h6 class="text-muted text-uppercase mb-1" style="font-size: 0.8rem; letter-spacing: 1px;">Keluhan Diproses</h6>
                    <h2 class="mb-0 text-warning fw-bold"><?= $stats['keluhan_diproses'] ?></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Top 5 Fasilitas -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-star me-2 text-warning"></i> Top 5 Fasilitas (Prioritas)</h5>
                    <a href="/fasilitas.php" class="btn btn-sm btn-outline-success">Lihat Semua</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Fasilitas</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($top_5 as $fas): ?>
                                <tr>
                                    <td class="fw-medium"><?= htmlspecialchars($fas['nama']) ?><br><small class="text-muted"><?= htmlspecialchars($fas['lokasi']) ?></small></td>
                                    <td><?= htmlspecialchars($fas['jenis']) ?></td>
                                    <td>
                                        <?php if(strtolower($fas['status']) == 'bersih'): ?>
                                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Aman</span>
                                        <?php elseif(strtolower($fas['status']) == 'perlu perhatian'): ?>
                                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i> Perhatian</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i> Perbaikan</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><small><?= date('d M Y', strtotime($fas['terakhir_inspeksi'])) ?></small></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Ringkasan Tindak Lanjut -->
            <div class="row mt-4">
                <div class="col-md-6 mb-3">
                    <div class="card bg-danger text-white hover-elevate">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Perlu Dibersihkan</h5>
                                <small>4 Fasilitas</small>
                            </div>
                            <a href="/fasilitas.php?status=perbaikan" class="btn btn-light btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="card bg-warning text-dark hover-elevate">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-0">Perlu Perbaikan</h5>
                                <small>2 Fasilitas</small>
                            </div>
                            <a href="/fasilitas.php?status=perhatian" class="btn btn-dark btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Aktivitas Terkini (Live Feed) -->
        <div class="col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-activity me-2 text-primary"></i> Aktivitas Terkini</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <?php for($i=0; $i<5; $i++): 
                            $fas = $semua_fasilitas[$i % count($semua_fasilitas)];
                            $times_ago = [5, 12, 28, 45, 59];
                        ?>
                        <div class="timeline-item">
                            <p class="mb-1 fw-medium text-dark"><?= htmlspecialchars($fas['nama']) ?> telah diinspeksi</p>
                            <p class="mb-1 small text-muted"><i class="bi bi-clock me-1"></i> <?= $times_ago[$i] ?> menit yang lalu oleh <?= htmlspecialchars($fas['petugas']) ?></p>
                            <?php if(strtolower($fas['status']) == 'bersih'): ?>
                                <span class="badge bg-success-subtle text-success border border-success-subtle">Status: Bersih</span>
                            <?php else: ?>
                                <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">Status: Perlu Perhatian</span>
                            <?php endif; ?>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>
