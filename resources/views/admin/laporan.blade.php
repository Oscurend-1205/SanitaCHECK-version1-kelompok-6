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
    @foreach($kpis as $i => $kpi)
    <div class="col-sm-6 col-lg-2 mb-2">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-2 d-flex align-items-center">
                <!-- Icon container menggunakan text-white agar ikon di dalam background berwarna tetap putih terang -->
                <div class="bg-{{ $kpi[3] }} text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                    @if($i === 5)
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 368a160 160 0 1 1 160-160 160.182 160.182 0 0 1-160 160"/><path fill="currentColor" d="M256 128a128 128 0 1 0 128 128 128.144 128.144 0 0 0-128-128m0 192a64 64 0 1 1 64-64 64.072 64.072 0 0 1-64 64"/></svg>
                    @else
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="{{ $kpi[4] }}"/></svg>
                    @endif
                </div>
                <div>
                    <!-- Diubah dari text-success menjadi text-body-secondary / text-body -->
                    <div class="text-body-secondary fw-semibold" style="font-size: 0.7rem;">{{ $kpi[0] }}</div>
                    <div class="fw-bold text-body" style="font-size: 1.3rem; line-height: 1;">{{ $kpi[1] }}</div>
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
                    ['Aman / Baik', $kondisiBaik, $baikP, 'success'],
                    ['Perlu Dibersihkan', $kondisiCukup, $cukupP, 'warning'],
                    ['Perlu Perbaikan / Buruk', $kondisiBuruk, $burukP, 'danger'],
                    ['Menunggu Tindak Lanjut', $tindakLanjut, $tindakLanjutP, 'info'],
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
                            @forelse($rekapFasilitas as $i => $row)
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
                                    <span class="badge {{ $row[7] === 'warning' ? 'bg-warning text-dark' : 'bg-'.$row[7] }} ms-1" style="font-size: 0.7rem;">{{ $row[8] }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-muted">Belum ada data rekap fasilitas.</td>
                            </tr>
                            @endforelse
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
                    <span class="badge {{ $item[3] === 'warning' ? 'bg-warning text-dark' : 'bg-'.$item[3] }} rounded-pill px-2 py-1" style="font-size: 0.7rem;">{{ $item[1] }}x ({{ $item[2] }})</span>
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
                                <th class="text-success py-2" style="font-size: 0.8rem;">Fasilitas</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Pelapor</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Catatan</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Tanggal</th>
                                <th class="text-center text-success py-2" style="font-size: 0.8rem;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($laporans as $i => $report)
                            <tr>
                                <td class="text-center text-body-secondary small py-2">{{ $i + 1 }}</td>
                                <td class="small py-2 fw-semibold">{{ $report->fasilitas->nama_fasilitas ?? 'Umum' }}</td>
                                <td class="text-body-secondary small py-2">{{ $report->nama_pelapor }}</td>
                                <td class="text-body-secondary small py-2">{{ Str::limit($report->catatan, 40) }}</td>
                                <td class="text-body-secondary small py-2">{{ $report->created_at->format('d/m/Y H:i') }}</td>
                                <td class="text-center py-2">
                                    <span class="badge {{ $report->status == 'Selesai' ? 'bg-success' : ($report->status == 'Diproses' ? 'bg-primary' : 'bg-warning text-dark') }}">{{ $report->status }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">Belum ada keluhan laporan.</td>
                            </tr>
                            @endforelse
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
            // Perbaikan warna text chart agar fleksibel saat dark/light mode
            textColor: isDarkMode ? 'rgba(255, 255, 255, 0.87)' : '#212529',
            gridColor: isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)',
        };
    }

    let colors = getThemeColors();

    // Trend Line Chart
    let trendChart = new Chart(document.getElementById('trendLineChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: {!! json_encode(array_reverse($trendLabels)) !!},
            datasets: [
                { label: 'Total Inspeksi', data: {!! json_encode(array_reverse($trendData)) !!}, borderColor: '#198754', backgroundColor: 'rgba(25, 135, 84, 0.1)', borderWidth: 2, fill: true, tension: 0.3, pointRadius: 3 }
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
    let conditionChart = new Chart(document.getElementById('conditionDoughnut').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Baik ('+{{ $baikP }}+'%)', 'Cukup ('+{{ $cukupP }}+'%)', 'Buruk ('+{{ $burukP }}+'%)'],
            datasets: [{ data: [{{ $kondisiBaik }}, {{ $kondisiCukup }}, {{ $kondisiBuruk }}], backgroundColor: ['#28a745', '#ffc107', '#dc3545'], borderWidth: 0 }]
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
                const text = "{{ $kondisiBaik + $kondisiCukup + $kondisiBuruk }}", textX = Math.round((chart.chartArea.left + chart.chartArea.right - ctx.measureText(text).width) / 2), textY = (chart.chartArea.top + chart.chartArea.bottom) / 2;
                ctx.fillText(text, textX, textY - 10); // sedikit naik agar teks "Total" pas di bawahnya
                ctx.font = "0.8em sans-serif";
                ctx.fillText("Total", textX + 2, textY + 15);
                ctx.save();
            }
        }]
    });

    // Observer untuk mendeteksi perubahan tema tanpa refresh halaman
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'data-coreui-theme') {
                colors = getThemeColors();
                
                // Update Trend Line Chart
                trendChart.options.plugins.legend.labels.color = colors.textColor;
                trendChart.options.scales.y.ticks.color = colors.textColor;
                trendChart.options.scales.y.grid.color = colors.gridColor;
                trendChart.options.scales.x.ticks.color = colors.textColor;
                trendChart.update();

                // Update Doughnut Chart
                conditionChart.options.plugins.legend.labels.color = colors.textColor;
                conditionChart.update();
            }
        });
    });

    observer.observe(document.documentElement, { attributes: true, attributeFilter: ['data-coreui-theme'] });
});
</script>
@endpush