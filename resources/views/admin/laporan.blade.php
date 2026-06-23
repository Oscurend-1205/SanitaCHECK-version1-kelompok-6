@extends('layouts.admin')

@section('title', 'Rekap & Laporan')

@section('content')
<div class="mb-3">
    <h3 class="fw-bold mb-1" style="color: #1b5e3a;">Rekap & Laporan</h3>
    <p class="text-body-secondary" style="font-size: 0.9rem;">Rekapitulasi hasil inspeksi sanitasi dan kebersihan fasilitas umum</p>
</div>

<!-- Filter Section -->
<div class="card border shadow-sm mb-3" style="border-radius: 12px;">
    <div class="card-body p-3">
        <h6 class="text-success fw-bold mb-3">FILTER LAPORAN</h6>
        <div class="row g-2">
            <div class="col-md-3 col-lg-2">
                <label class="form-label small fw-semibold text-body-secondary mb-1">Periode</label>
                <input type="text" class="form-control form-control-sm" value="01/05/2025 – 22/05/2025" style="font-size: 0.8rem; border-radius: 6px;">
            </div>
            <div class="col-md-3 col-lg-2">
                <label class="form-label small fw-semibold text-body-secondary mb-1">Jenis Fasilitas</label>
                <select class="form-select form-select-sm" style="font-size: 0.8rem; border-radius: 6px;">
                    <option selected>Semua Jenis</option>
                    <option>Toilet</option>
                    <option>Kantin</option>
                    <option>Wastafel</option>
                </select>
            </div>
            <div class="col-md-3 col-lg-2">
                <label class="form-label small fw-semibold text-body-secondary mb-1">Lokasi</label>
                <select class="form-select form-select-sm" style="font-size: 0.8rem; border-radius: 6px;">
                    <option selected>Semua Lokasi</option>
                    <option>Gedung A</option>
                    <option>Gedung B</option>
                </select>
            </div>
            <div class="col-md-3 col-lg-2">
                <label class="form-label small fw-semibold text-body-secondary mb-1">Petugas</label>
                <select class="form-select form-select-sm" style="font-size: 0.8rem; border-radius: 6px;">
                    <option selected>Semua Petugas</option>
                </select>
            </div>
            <div class="col-md-3 col-lg-2">
                <label class="form-label small fw-semibold text-body-secondary mb-1">Status Sanitasi</label>
                <select class="form-select form-select-sm" style="font-size: 0.8rem; border-radius: 6px;">
                    <option selected>Semua Kondisi</option>
                    <option>Baik</option>
                    <option>Cukup</option>
                    <option>Buruk</option>
                </select>
            </div>
            <div class="col-md-3 col-lg-2">
                <label class="form-label small fw-semibold text-body-secondary mb-1">Status Tindak Lanjut</label>
                <select class="form-select form-select-sm" style="font-size: 0.8rem; border-radius: 6px;">
                    <option selected>Semua Status</option>
                    <option>Selesai</option>
                    <option>Dalam Proses</option>
                </select>
            </div>
        </div>
        <div class="d-flex gap-2 mt-3">
            <button class="btn btn-sm btn-outline-success fw-bold" style="border-radius: 6px; border-color: #1b5e3a; color: #1b5e3a;">Reset Filter</button>
            <button class="btn btn-sm btn-success text-white fw-bold" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a;">
                <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M3.853 54.87A10 10 0 0 0 13 65.51L65 53v424a10 10 0 0 0 18.18 5.87L182 348h146a10 10 0 0 0 8.18-14.13L206.18 54.87A10 10 0 0 0 198 48H18V10A10 10 0 0 0 3.853 4.13Z"/></svg>
                Terapkan Filter
            </button>
        </div>
    </div>
</div>

<!-- KPI Cards -->
<div class="row mb-3">
    @foreach([
        ['Total Inspeksi', '86', 'Semua inspeksi', 'success', 'M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z'],
        ['Kondisi Baik', '38', '44% dari total inspeksi', 'success', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm108.25 138.29-134.4 160a16 16 0 0 1-23.35 1.14l-80-80a16 16 0 0 1 22.62-22.62l67.24 67.24 123.36-146.85a16 16 0 0 1 24.53 21.09Z'],
        ['Kondisi Cukup', '26', '30% dari total inspeksi', 'warning', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm96 224H160a16 16 0 0 1 0-32h192a16 16 0 0 1 0 32Z'],
        ['Kondisi Buruk', '22', '26% dari total inspeksi', 'danger', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432Z'],
        ['Perlu Tindak Lanjut', '28', '33% dari total inspeksi', 'warning', 'M494 198.671a40.54 40.54 0 0 0-32.174-27.592l-115.909-18.837-53.732-104.414a40.7 40.7 0 0 0-72.37 0l-53.732 104.414-115.907 18.837a40.7 40.7 0 0 0-22.364 68.827l82.7 83.368-17.9 116.055a40.672 40.672 0 0 0 58.548 42.538L256 428.977l104.843 52.89a40.69 40.69 0 0 0 58.548-42.538l-17.9-116.055 82.7-83.368A40.54 40.54 0 0 0 494 198.671'],
        ['Rata-rata Skor', '78', '/ 100 (Baik)', 'primary', ''],
    ] as $i => $kpi)
    <div class="col-sm-6 col-lg-2 mb-2">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-2 d-flex align-items-center">
                <div class="bg-{{ $kpi[3] }} text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                    @if($i === 5)
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 368a160 160 0 1 1 160-160 160.182 160.182 0 0 1-160 160"/><path fill="currentColor" d="M256 128a128 128 0 1 0 128 128 128.144 128.144 0 0 0-128-128m0 192a64 64 0 1 1 64-64 64.072 64.072 0 0 1-64 64"/></svg>
                    @else
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="{{ $kpi[4] }}"/></svg>
                    @endif
                </div>
                <div>
                    <div class="text-success fw-bold" style="font-size: 0.7rem;">{{ $kpi[0] }}</div>
                    <div class="fw-bold text-success" style="font-size: 1.3rem; line-height: 1;">{{ $kpi[1] }}</div>
                    <div class="text-body-secondary" style="font-size: 0.65rem;">{{ $kpi[2] }}</div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Charts Row -->
<div class="row mb-3">
    <div class="col-lg-5 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Tren Inspeksi per Bulan</h6>
                <div style="position: relative; height: 220px;">
                    <canvas id="trendLineChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Persentase Kondisi Sanitasi</h6>
                <div style="position: relative; height: 220px;">
                    <canvas id="conditionDoughnut"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Status Tindak Lanjut</h6>
                @foreach([
                    ['Aman', 38, 44, 'success'],
                    ['Perlu Dibersihkan', 20, 23, 'warning'],
                    ['Perlu Perbaikan', 8, 9, 'warning'],
                    ['Perlu Tindak Lanjut', 20, 23, 'danger'],
                ] as $status)
                <div class="mb-3">
                    <div class="d-flex justify-content-between small mb-1">
                        <span class="fw-semibold text-body-secondary">{{ $status[0] }}</span>
                        <span class="text-body-secondary">{{ $status[1] }} ({{ $status[2] }}%)</span>
                    </div>
                    <div class="progress" style="height: 8px; border-radius: 4px;">
                        <div class="progress-bar bg-{{ $status[3] }}" style="width: {{ $status[2] }}%;"></div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Tables Row -->
<div class="row mb-3">
    <div class="col-lg-8 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Rekap Sanitasi per Fasilitas</h6>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead style="border-bottom: 1px solid var(--cui-border-color);">
                            <tr>
                                <th class="text-center text-success py-2" style="font-size: 0.75rem;">No</th>
                                <th class="text-success py-2" style="font-size: 0.75rem;">Fasilitas</th>
                                <th class="text-success py-2" style="font-size: 0.75rem;">Lokasi</th>
                                <th class="text-center text-success py-2" style="font-size: 0.75rem;">Total</th>
                                <th class="text-center text-success py-2" style="font-size: 0.75rem;">Baik</th>
                                <th class="text-center text-success py-2" style="font-size: 0.75rem;">Cukup</th>
                                <th class="text-center text-success py-2" style="font-size: 0.75rem;">Buruk</th>
                                <th class="text-center text-success py-2" style="font-size: 0.75rem;">Skor</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Toilet Lantai 1','Gedung A',12,6,3,3,70,'warning','Cukup'],
                                ['Toilet Lantai 2','Gedung A',10,5,3,2,75,'warning','Cukup'],
                                ['Kantin Sehat','Gedung B',12,4,5,3,68,'warning','Cukup'],
                                ['Ruang Tunggu','Gedung C',10,8,1,1,85,'success','Baik'],
                                ['Tempat Cuci Tangan','Halaman Depan',12,6,4,2,72,'warning','Cukup'],
                                ['Toilet Perempuan','Gedung B',11,5,2,4,65,'danger','Buruk'],
                                ['Ruang Kelas 3A','Gedung D',9,7,1,1,82,'success','Baik'],
                                ['Area Parkir','Halaman Belakang',10,3,5,2,60,'danger','Buruk'],
                            ] as $i => $row)
                            <tr>
                                <td class="text-center text-body-secondary small py-2">{{ $i + 1 }}</td>
                                <td class="small py-2 fw-semibold">{{ $row[0] }}</td>
                                <td class="text-body-secondary small py-2">{{ $row[1] }}</td>
                                <td class="text-center text-body-secondary small py-2">{{ $row[2] }}</td>
                                <td class="text-center small py-2"><span class="text-success fw-semibold">{{ $row[3] }}</span></td>
                                <td class="text-center small py-2"><span class="text-warning fw-semibold">{{ $row[4] }}</span></td>
                                <td class="text-center small py-2"><span class="text-danger fw-semibold">{{ $row[5] }}</span></td>
                                <td class="text-center py-2">
                                    <span class="small fw-bold" style="font-size: 0.8rem;">{{ $row[6] }}</span>
                                    <span class="badge bg-{{ $row[7] === 'success' ? 'success' : ($row[7] === 'warning' ? 'warning text-dark' : 'danger') }} ms-1" style="font-size: 0.7rem;">{{ $row[8] }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-2 text-end">
                    <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; padding: 0.2rem 0.8rem; font-size: 0.75rem;">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border shadow-sm mb-3" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Top 5 Fasilitas Bermasalah</h6>
                @foreach([
                    ['Tempat Cuci Tangan Belakang', 6, '55%', 'danger'],
                    ['Toilet Perempuan', 4, '36%', 'danger'],
                    ['Toilet Lantai 1', 3, '25%', 'warning'],
                    ['Kantin Sehat', 3, '25%', 'warning'],
                    ['Toilet Lantai 2', 2, '20%', 'warning'],
                ] as $i => $item)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <span class="text-body-secondary small me-2 fw-bold">{{ $i + 1 }}</span>
                        <span class="small">{{ $item[0] }}</span>
                    </div>
                    <span class="badge bg-{{ $item[3] }} rounded-pill px-2 py-1" style="font-size: 0.7rem;">{{ $item[1] }}x ({{ $item[2] }})</span>
                </div>
                @endforeach
                <div class="mt-2 text-end">
                    <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; padding: 0.2rem 0.8rem; font-size: 0.75rem;">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
        <div class="card border shadow-sm" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Top 5 Petugas Teraktif</h6>
                @foreach([
                    ['Budi Santoso', 18],
                    ['Siti Aisyah', 16],
                    ['Andi Wijaya', 14],
                    ['Rina Martina', 12],
                    ['Dewi Lestari', 10],
                ] as $i => $petugas)
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <span class="text-body-secondary small me-2 fw-bold">{{ $i + 1 }}</span>
                        <span class="small">{{ $petugas[0] }}</span>
                    </div>
                    <span class="badge bg-success rounded-pill px-2 py-1" style="font-size: 0.7rem;">{{ $petugas[1] }} Inspeksi</span>
                </div>
                @endforeach
                <div class="mt-2 text-end">
                    <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; padding: 0.2rem 0.8rem; font-size: 0.75rem;">Lihat Selengkapnya</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Laporan & Export -->
<div class="row mb-4">
    <div class="col-lg-8 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Riwayat Laporan</h6>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead style="border-bottom: 1px solid var(--cui-border-color);">
                            <tr>
                                <th class="text-center text-success py-2" style="font-size: 0.8rem;">No</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Nama Laporan</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Periode</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Dibuat Oleh</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Tanggal</th>
                                <th class="text-center text-success py-2" style="font-size: 0.8rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Laporan Rekap Sanitasi Mei 2025', '01/05/2025 – 22/05/2025', 'Admin', '22/05/2025 10:30'],
                                ['Laporan Rekap Sanitasi April 2025', '01/04/2025 – 30/04/2025', 'Admin', '30/04/2025 09:15'],
                                ['Laporan Rekap Sanitasi Maret 2025', '01/03/2025 – 31/03/2025', 'Admin', '31/03/2025 14:20'],
                            ] as $i => $report)
                            <tr>
                                <td class="text-center text-body-secondary small py-2">{{ $i + 1 }}</td>
                                <td class="small py-2 fw-semibold">{{ $report[0] }}</td>
                                <td class="text-body-secondary small py-2">{{ $report[1] }}</td>
                                <td class="text-body-secondary small py-2">{{ $report[2] }}</td>
                                <td class="text-body-secondary small py-2">{{ $report[3] }}</td>
                                <td class="text-center py-2">
                                    <div class="d-flex justify-content-center gap-1">
                                        <button class="btn btn-sm btn-outline-primary border-0 p-1" title="Lihat">
                                            <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 112C146.45 112 49.28 182.18 16.37 253.24a16 16 0 0 0 0 13.52C49.28 337.82 146.45 408 256 408s206.72-70.18 239.63-141.24a16 16 0 0 0 0-13.52C462.72 182.18 365.55 112 256 112m0 256a112 112 0 1 1 112-112 112.126 112.126 0 0 1-112 112"/></svg>
                                        </button>
                                        <button class="btn btn-sm btn-outline-success border-0 p-1" title="Unduh">
                                            <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 336l115.313-130.688L347.687 176 272 261.313V16h-32v245.313L164.313 176l-23.626 29.312z"/><path fill="currentColor" d="M464 336v128H48V336H16v144a16 16 0 0 0 16 16h448a16 16 0 0 0 16-16V336z"/></svg>
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger border-0 p-1" title="Hapus">
                                            <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320H112zm280 0v32h24a24 24 0 0 0 0-48H160a24 24 0 0 0 0 48h24v-32H80v-32h352v32z"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-1">Export Laporan</h6>
                <p class="text-body-secondary small mb-3">Unduh laporan dalam format yang tersedia.</p>
                <div class="d-flex flex-column gap-2">
                    <button class="btn btn-outline-danger d-flex align-items-center fw-semibold" style="border-radius: 8px; padding: 0.6rem 1rem;">
                        <svg class="me-2" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z"/></svg>
                        Export PDF
                    </button>
                    <button class="btn btn-outline-success d-flex align-items-center fw-semibold" style="border-radius: 8px; padding: 0.6rem 1rem;">
                        <svg class="me-2" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472 40H40a24.03 24.03 0 0 0-24 24v384a24.03 24.03 0 0 0 24 24h432a24.03 24.03 0 0 0 24-24V64a24.03 24.03 0 0 0-24-24m-8 400H48V72h416Z"/></svg>
                        Export Excel
                    </button>
                    <button class="btn btn-outline-primary d-flex align-items-center fw-semibold" style="border-radius: 8px; padding: 0.6rem 1rem;">
                        <svg class="me-2" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M400 464H48V104h192V72H16v424h416V272h-32z"/></svg>
                        Cetak Laporan
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    function getThemeColors() {
        const isDarkMode = document.documentElement.getAttribute('data-coreui-theme') === 'dark';
        return {
            textColor: isDarkMode ? 'rgba(255, 255, 255, 0.87)' : '#333',
            gridColor: isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)',
        };
    }

    const colors = getThemeColors();

    // Trend Line Chart
    new Chart(document.getElementById('trendLineChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: ['Des 24', 'Jan 25', 'Feb 25', 'Mar 25', 'Apr 25', 'Mei 25'],
            datasets: [
                { label: 'Baik', data: [20, 25, 30, 28, 35, 38], borderColor: '#28a745', backgroundColor: '#28a745', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                { label: 'Cukup', data: [15, 18, 22, 28, 24, 26], borderColor: '#ffc107', backgroundColor: '#ffc107', borderWidth: 2, tension: 0.3, pointRadius: 3 },
                { label: 'Buruk', data: [10, 12, 8, 15, 18, 22], borderColor: '#dc3545', backgroundColor: '#dc3545', borderWidth: 2, tension: 0.3, pointRadius: 3 }
            ]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 15, color: colors.textColor, font: { size: 11 } } } },
            scales: {
                y: { beginAtZero: true, ticks: { color: colors.textColor }, grid: { color: colors.gridColor } },
                x: { ticks: { color: colors.textColor }, grid: { display: false } }
            }
        }
    });

    // Condition Doughnut
    new Chart(document.getElementById('conditionDoughnut').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Baik (44%)', 'Cukup (30%)', 'Buruk (26%)'],
            datasets: [{ data: [38, 26, 22], backgroundColor: ['#28a745', '#ffc107', '#dc3545'], borderWidth: 0 }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '70%',
            plugins: { legend: { position: 'bottom', labels: { usePointStyle: true, padding: 15, color: colors.textColor, font: { size: 11 } } } }
        },
        plugins: [{
            id: 'centerText',
            beforeDraw: function(chart) {
                const ctx = chart.ctx;
                ctx.restore();
                ctx.font = "bold 2em sans-serif";
                ctx.textBaseline = "middle";
                ctx.fillStyle = colors.textColor;
                const text = "86", textX = Math.round((chart.chartArea.left + chart.chartArea.right - ctx.measureText(text).width) / 2), textY = (chart.chartArea.top + chart.chartArea.bottom) / 2;
                ctx.fillText(text, textX, textY);
                ctx.font = "0.8em sans-serif";
                ctx.fillText("Total", textX + 5, textY + 22);
                ctx.save();
            }
        }]
    });
});
</script>
@endpush
