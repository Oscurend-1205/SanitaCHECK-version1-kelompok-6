<?php
require_once 'services/api.php';

// Ambil semua fasilitas untuk dropdown
$response = json_decode(fetchApi('/api/fasilitas'), true);
$fasilitas = $response['status'] == 'success' ? $response['data'] : [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapor Keluhan - SanitaCheck</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>

<?php include 'components/navbar.php'; ?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="text-center mb-4">
                <h2 class="fw-bold">Lapor Keluhan Sanitasi</h2>
                <p class="text-muted">Bantu kami menjaga kebersihan kampus. Laporkan fasilitas yang kotor atau rusak di sini.</p>
            </div>

            <!-- Pesan Sukses (Hidden by default) -->
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" id="success-alert" style="display: none;">
                <h4 class="alert-heading fw-bold"><i class="bi bi-check-circle-fill me-2"></i>Laporan Berhasil Dikirim!</h4>
                <p>Terima kasih atas partisipasi Anda dalam menjaga kebersihan lingkungan kampus. Laporan Anda telah kami terima dan akan segera diproses oleh petugas.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('success-alert').style.display='none';"></button>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <form id="form-lapor">
                        
                        <div class="mb-4">
                            <label for="nama_pelapor" class="form-label fw-bold">Nama Pelapor <span class="text-muted fw-normal">(Opsional)</span></label>
                            <input type="text" class="form-control" id="nama_pelapor" placeholder="Masukkan nama Anda (atau biarkan kosong untuk anonim)">
                        </div>

                        <div class="mb-4">
                            <label for="fasilitas" class="form-label fw-bold">Pilih Fasilitas <span class="text-danger">*</span></label>
                            <select class="form-select" id="fasilitas" required>
                                <option value="" selected disabled>-- Pilih fasilitas yang ingin dilaporkan --</option>
                                <?php foreach($fasilitas as $fas): ?>
                                    <option value="<?= $fas['id'] ?>"><?= htmlspecialchars($fas['nama']) ?> (<?= htmlspecialchars($fas['lokasi']) ?>)</option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text">Pilih fasilitas dari daftar yang tersedia.</div>
                        </div>

                        <div class="mb-4">
                            <label for="foto" class="form-label fw-bold">Upload Foto Bukti <span class="text-muted fw-normal">(Opsional)</span></label>
                            <input class="form-control" type="file" id="foto" accept=".jpg,.jpeg,.png">
                            <div class="form-text">Format yang didukung: JPG, JPEG, PNG.</div>
                        </div>

                        <div class="mb-4">
                            <label for="catatan" class="form-label fw-bold">Catatan Keluhan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="catatan" rows="4" placeholder="Jelaskan kondisi fasilitas (contoh: Air wastafel mati dan sabun habis, lantai sangat kotor...)" required></textarea>
                            <div class="form-text text-muted">Minimal 10 karakter.</div>
                        </div>

                        <div class="mb-4 form-check bg-light p-3 rounded">
                            <input type="checkbox" class="form-check-input ms-1" id="persetujuan" required>
                            <label class="form-check-label ms-2" for="persetujuan">
                                Saya menyatakan bahwa laporan ini sesuai dengan kondisi sebenarnya di lapangan.
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg fw-bold" id="btn-submit">
                                <i class="bi bi-send-fill me-2"></i>Kirim Laporan
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include 'components/footer.php'; ?>
