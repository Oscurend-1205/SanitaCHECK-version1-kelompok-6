<?php
require_once 'services/api.php';

// Menangkap parameter filter
$search = isset($_GET['search']) ? $_GET['search'] : '';
$gedung = isset($_GET['gedung']) ? $_GET['gedung'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

// Mengambil data dari mock API
$endpoint = '/api/fasilitas';
if ($status !== '') {
    // Jika ada filter status, panggil endpoint status (mock)
    // Di mock api.php, endpointnya /api/fasilitas/status/{status}
    $endpoint = '/api/fasilitas/status/' . urlencode($status);
}

$response = json_decode(fetchApi($endpoint), true);
$fasilitas = $response['status'] == 'success' ? $response['data'] : [];

// Filter tambahan di PHP (sebagai simulasi backend filtering untuk search dan gedung)
if ($search !== '' || $gedung !== '') {
    $fasilitas = array_filter($fasilitas, function($item) use ($search, $gedung) {
        $match_search = $search === '' || stripos($item['nama'], $search) !== false;
        $match_gedung = $gedung === '' || stripos($item['lokasi'], $gedung) !== false;
        return $match_search && $match_gedung;
    });
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Fasilitas - SanitaCheck</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<?php include 'components/navbar.php'; ?>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold"><i class="bi bi-building text-success me-2"></i>Daftar Fasilitas</h2>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" class="text-success text-decoration-none">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
            </ol>
        </nav>
    </div>

    <!-- Area Filter -->
    <div class="card shadow-sm mb-4 border-0 bg-light">
        <div class="card-body">
            <form action="fasilitas.php" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label class="form-label text-muted small fw-bold">Pencarian</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" name="search" class="form-control border-start-0" placeholder="Cari nama fasilitas..." value="<?= htmlspecialchars($search) ?>">
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">Gedung / Lokasi</label>
                    <select name="gedung" class="form-select">
                        <option value="">Semua Gedung</option>
                        <option value="Gedung A" <?= $gedung == 'Gedung A' ? 'selected' : '' ?>>Gedung A</option>
                        <option value="Gedung B" <?= $gedung == 'Gedung B' ? 'selected' : '' ?>>Gedung B</option>
                        <option value="Gedung C" <?= $gedung == 'Gedung C' ? 'selected' : '' ?>>Gedung C</option>
                        <option value="Halaman Depan" <?= $gedung == 'Halaman Depan' ? 'selected' : '' ?>>Halaman Depan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label text-muted small fw-bold">Status Sanitasi</label>
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="Bersih" <?= strtolower($status) == 'bersih' ? 'selected' : '' ?>>Bersih</option>
                        <option value="Perlu Perhatian" <?= strtolower($status) == 'perlu perhatian' ? 'selected' : '' ?>>Perlu Perhatian</option>
                        <option value="Perlu Perbaikan" <?= strtolower($status) == 'perlu perbaikan' ? 'selected' : '' ?>>Perlu Perbaikan</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-success w-100"><i class="bi bi-funnel me-1"></i> Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Table Daftar -->
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4">Nama Fasilitas</th>
                            <th>Jenis</th>
                            <th>Lokasi</th>
                            <th>Status</th>
                            <th>Inspeksi Terakhir</th>
                            <th class="text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($fasilitas)): ?>
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">Data fasilitas tidak ditemukan.</td>
                        </tr>
                        <?php else: ?>
                            <?php foreach($fasilitas as $fas): ?>
                            <tr>
                                <td class="ps-4 fw-medium text-dark"><?= htmlspecialchars($fas['nama']) ?></td>
                                <td><?= htmlspecialchars($fas['jenis']) ?></td>
                                <td><i class="bi bi-geo-alt text-muted me-1"></i> <?= htmlspecialchars($fas['lokasi']) ?></td>
                                <td>
                                    <?php if(strtolower($fas['status']) == 'bersih'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success-subtle px-3"><i class="bi bi-check-circle me-1"></i> Bersih</span>
                                    <?php elseif(strtolower($fas['status']) == 'perlu perhatian'): ?>
                                        <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle px-3"><i class="bi bi-exclamation-triangle me-1"></i> Perhatian</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3"><i class="bi bi-x-circle me-1"></i> Perbaikan</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="small text-muted"><i class="bi bi-calendar-event me-1"></i> <?= date('d M Y', strtotime($fas['terakhir_inspeksi'])) ?></div>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="/detail-fasilitas.php?id=<?= $fas['id'] ?>" class="btn btn-sm btn-outline-success">
                                        Lihat Detail <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Pagination (Static/Mock) -->
        <?php if(!empty($fasilitas)): ?>
        <div class="card-footer bg-white py-3 border-0">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mb-0">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                    <li class="page-item active" aria-current="page"><a class="page-link bg-success border-success" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-success" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-success" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link text-success" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        <?php endif; ?>
    </div>

</div>

<?php include 'components/footer.php'; ?>
