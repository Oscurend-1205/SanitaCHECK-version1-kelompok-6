<?php
require_once 'services/api.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id === 0) {
    header("Location: /fasilitas.php");
    exit;
}

// Ambil detail fasilitas
$response = json_decode(fetchApi("/api/fasilitas/$id"), true);
if ($response['status'] !== 'success' || empty($response['data'])) {
    die("Data fasilitas tidak ditemukan.");
}
$fasilitas = $response['data'];

// Ambil riwayat inspeksi
$response_riwayat = json_decode(fetchApi("/api/fasilitas/$id/inspeksi"), true);
$riwayat = $response_riwayat['status'] == 'success' ? $response_riwayat['data'] : [];

// Ambil 3 inspeksi terakhir
$riwayat_terakhir = array_slice($riwayat, 0, 3);

// Menentukan rekomendasi
$rekomendasi = '';
$alert_class = '';
$status_lower = strtolower($fasilitas['status']);

if ($status_lower == 'bersih') {
    $rekomendasi = 'Fasilitas dalam kondisi baik. Tetap lakukan pemantauan rutin untuk menjaga kualitas sanitasi.';
    $alert_class = 'alert-success';
} elseif ($status_lower == 'perlu perhatian') {
    $rekomendasi = 'Ditemukan beberapa masalah ringan. Segera lakukan pembersihan rutin agar fasilitas kembali nyaman digunakan.';
    $alert_class = 'alert-warning';
} else {
    $rekomendasi = 'Fasilitas dalam kondisi buruk. Segera lakukan perbaikan menyeluruh dan hubungi teknisi jika ada kerusakan.';
    $alert_class = 'alert-danger';
}

// Simulasi Checklist Berdasarkan Status
$checklist = [
    'Ketersediaan Air' => $status_lower == 'bersih' || $status_lower == 'perlu perhatian' ? true : false,
    'Ketersediaan Sabun' => $status_lower == 'bersih' ? true : false,
    'Tidak Ada Bau' => $status_lower != 'perlu perbaikan' ? true : false,
    'Lantai Kering & Bersih' => $status_lower == 'bersih' ? true : false
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Fasilitas - SanitaCheck</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<?php include 'components/navbar.php'; ?>

<div class="container my-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item"><a href="/fasilitas.php" class="text-success text-decoration-none">Fasilitas</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($fasilitas['nama']) ?></li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Kolom Kiri: Informasi Utama & Checklist -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-success text-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-info-circle me-2"></i>Informasi Fasilitas</h5>
                </div>
                <div class="card-body">
                    <h4 class="fw-bold mb-1"><?= htmlspecialchars($fasilitas['nama']) ?></h4>
                    <p class="text-muted mb-4"><i class="bi bi-geo-alt-fill me-1 text-danger"></i> <?= htmlspecialchars($fasilitas['lokasi']) ?></p>

                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Jenis</span>
                            <span class="fw-medium"><?= htmlspecialchars($fasilitas['jenis']) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Status Terkini</span>
                            <?php if($status_lower == 'bersih'): ?>
                                <span class="badge bg-success">Bersih</span>
                            <?php elseif($status_lower == 'perlu perhatian'): ?>
                                <span class="badge bg-warning text-dark">Perlu Perhatian</span>
                            <?php else: ?>
                                <span class="badge bg-danger">Perlu Perbaikan</span>
                            <?php endif; ?>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0">
                            <span class="text-muted">Inspeksi Terakhir</span>
                            <span class="fw-medium"><?= date('d M Y, H:i', strtotime($fasilitas['terakhir_inspeksi'])) ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between px-0 border-bottom-0">
                            <span class="text-muted">Petugas</span>
                            <span class="fw-medium"><i class="bi bi-person me-1"></i> <?= htmlspecialchars($fasilitas['petugas']) ?></span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Rekomendasi -->
            <div class="alert <?= $alert_class ?> shadow-sm border-0">
                <h6 class="alert-heading fw-bold"><i class="bi bi-lightbulb me-1"></i> Rekomendasi Sistem</h6>
                <hr>
                <p class="mb-0 small"><?= $rekomendasi ?></p>
            </div>
        </div>

        <!-- Kolom Kanan: Riwayat & Checklist -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-body">
                    <h5 class="fw-bold mb-4 border-bottom pb-2">Checklist Inspeksi Terakhir</h5>
                    <div class="row">
                        <?php foreach($checklist as $item => $isChecked): ?>
                        <div class="col-md-6 mb-3">
                            <div class="d-flex align-items-center">
                                <?php if($isChecked): ?>
                                    <i class="bi bi-check-circle-fill text-success fs-5 me-2"></i>
                                    <span class="text-dark fw-medium"><?= $item ?></span>
                                <?php else: ?>
                                    <i class="bi bi-x-circle-fill text-danger fs-5 me-2"></i>
                                    <span class="text-muted text-decoration-line-through"><?= $item ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="mt-3 p-3 bg-light rounded">
                        <strong><i class="bi bi-chat-left-text me-1"></i> Catatan Petugas:</strong>
                        <p class="mb-0 mt-1 text-muted small">
                            "<?= !empty($riwayat_terakhir) ? htmlspecialchars($riwayat_terakhir[0]['kondisi']) : 'Tidak ada catatan khusus.' ?>"
                        </p>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i>Riwayat Inspeksi (3 Terakhir)</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">Tanggal</th>
                                    <th>Kondisi / Catatan</th>
                                    <th class="text-end pe-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($riwayat_terakhir)): ?>
                                <tr><td colspan="3" class="text-center py-3 text-muted">Belum ada riwayat inspeksi.</td></tr>
                                <?php else: ?>
                                    <?php foreach($riwayat_terakhir as $r): ?>
                                    <tr>
                                        <td class="ps-4 text-nowrap"><i class="bi bi-calendar-event me-1 text-muted"></i> <?= date('d M Y', strtotime($r['tanggal'])) ?></td>
                                        <td><?= htmlspecialchars($r['kondisi']) ?></td>
                                        <td class="text-end pe-4">
                                            <?php if(strtolower($r['status']) == 'bersih'): ?>
                                                <span class="badge bg-success">Bersih</span>
                                            <?php elseif(strtolower($r['status']) == 'perlu perhatian'): ?>
                                                <span class="badge bg-warning text-dark">Perhatian</span>
                                            <?php else: ?>
                                                <span class="badge bg-danger">Perbaikan</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>
