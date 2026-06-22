@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold" style="color: #1b5e3a;">Dashboard</h2>
    <p class="text-body-secondary fs-5">Selamat datang, Admin! Berikut ringkasan monitoring sanitasi hari ini.</p>
</div>

<!-- Stats Widgets -->
<div class="row mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 mb-xl-0 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-success text-white p-3 me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 12px; width: 64px; height: 64px;">
                    <svg class="icon" style="width: 32px; height: 32px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z"/>
                        <path fill="currentColor" d="M136 296h224v32H136zm0 80h224v32H136z"/>
                    </svg>
                </div>
                <div>
                    <div class="text-success fw-bold fs-6">Total Fasilitas</div>
                    <div class="fs-2 fw-bold text-success" style="line-height: 1;">25</div>
                    <div class="text-body-secondary" style="font-size: 0.75rem;">Semua fasilitas aktif</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 mb-xl-0 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="p-3 me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 12px; width: 64px; height: 64px; border: 1px solid var(--cui-border-color);">
                    <svg class="icon text-success" style="width: 32px; height: 32px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M400 464H48V104h192V72H16v424h416V272h-32z" />
                        <path fill="currentColor" d="M304 16v32h137.373L188.687 300.687l22.626 22.626L464 70.627V208h32V16z" />
                    </svg>
                </div>
                <div>
                    <div class="text-success fw-bold fs-6">Inspeksi Hari Ini</div>
                    <div class="fs-2 fw-bold text-success" style="line-height: 1;">8</div>
                    <div class="text-body-secondary" style="font-size: 0.75rem;">Dari total 25 fasilitas</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 mb-xl-0 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-warning text-white p-3 me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 12px; width: 64px; height: 64px;">
                    <svg class="icon" style="width: 32px; height: 32px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M494 198.671a40.54 40.54 0 0 0-32.174-27.592l-115.909-18.837-53.732-104.414a40.7 40.7 0 0 0-72.37 0l-53.732 104.414-115.907 18.837a40.7 40.7 0 0 0-22.364 68.827l82.7 83.368-17.9 116.055a40.672 40.672 0 0 0 58.548 42.538L256 428.977l104.843 52.89a40.69 40.69 0 0 0 58.548-42.538l-17.9-116.055 82.7-83.368A40.54 40.54 0 0 0 494 198.671m-32.53 18.7L367.4 312.2l20.364 132.01a8.671 8.671 0 0 1-12.509 9.088L256 393.136 136.744 453.3a8.671 8.671 0 0 1-12.509-9.088L144.6 312.2l-94.069-94.83a8.7 8.7 0 0 1 4.778-14.706l131.841-21.426 61.119-118.767a8.694 8.694 0 0 1 15.462 0l61.119 118.767 131.841 21.426a8.7 8.7 0 0 1 4.778 14.706Z" />
                    </svg>
                </div>
                <div>
                    <div class="text-success fw-bold fs-6">Tindak Lanjut</div>
                    <div class="fs-2 fw-bold text-success" style="line-height: 1;">6</div>
                    <div class="text-body-secondary" style="font-size: 0.75rem;">Perlu dibersihkan</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 col-lg-3">
        <div class="card mb-4 mb-xl-0 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-danger text-white p-3 me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 12px; width: 64px; height: 64px;">
                    <svg class="icon" style="width: 32px; height: 32px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="m496.059 182.581-.025-70.7-32 .012.017 48.172-66.288 23.779-45.729.007v-30.964A96.55 96.55 0 0 0 329.92 91.3l43.129-43.413h42.84v-32h-56.157l-53.987 54.344a96.82 96.82 0 0 0-100.511-.554l-53.056-53.84-56.158.05.029 32 42.748-.038L180.824 90.5a96.56 96.56 0 0 0-22.79 62.39v30.99l-43.235.007L48 160.093v-48.172H16v70.742l80.035 28.509.007 84.715H16.034v32h80.01v8.01a159.7 159.7 0 0 0 9.7 54.979l-89.71 34.572v70.439h32v-48.476l71.73-27.642a159.794 159.794 0 0 0 249.578 29.044 161.5 161.5 0 0 0 23.058-29.146l71.638 27.727v48.493h32v-70.421l-89.618-34.685a159.2 159.2 0 0 0 9.614-55.1v-7.794h80v-32h-80v-84.6ZM240 463.029C176.991 455.235 128.045 401.2 128.045 335.9l-.01-120.011h30v.007H240Zm-49.966-279.154v-30.988a65 65 0 0 1 130 0v30.968Zm194 151.849A128.28 128.28 0 0 1 272 462.979V215.887h80.032v-.036h32Z" />
                    </svg>
                </div>
                <div>
                    <div class="text-success fw-bold fs-6">Fasilitas Buruk</div>
                    <div class="fs-2 fw-bold text-success" style="line-height: 1;">2</div>
                    <div class="text-body-secondary" style="font-size: 0.75rem;">Kondisi sanitasi buruk</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row mb-4">
    <div class="col-md-5">
        <div class="card h-100 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body">
                <h6 class="card-title text-success fw-bold mb-4">Ringkasan Status Fasilitas</h6>
                <div style="position: relative; height: 250px;">
                    <canvas id="statusDoughnutChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card h-100 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body">
                <h6 class="card-title text-success fw-bold mb-4">Inspeksi 7 Hari Terakhir</h6>
                <div style="position: relative; height: 250px;">
                    <canvas id="inspeksiLineChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tables Row -->
<div class="row mb-5">
    <!-- Fasilitas Perlu Tindak Lanjut -->
    <div class="col-md-7">
        <div class="card h-100 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body">
                <h6 class="card-title text-success fw-bold mb-3">Fasilitas Perlu Tindak Lanjut</h6>
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead class="text-success" style="border-bottom: 1px solid var(--cui-border-color);">
                            <tr>
                                <th class="text-center" style="font-size: 0.85rem;">No</th>
                                <th style="font-size: 0.85rem;">Nama Fasilitas</th>
                                <th style="font-size: 0.85rem;">Lokasi</th>
                                <th class="text-center" style="font-size: 0.85rem;">Status</th>
                                <th class="text-center" style="font-size: 0.85rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center text-body-secondary small">1</td>
                                <td class="text-body-secondary small">Toilet Lantai 2</td>
                                <td class="text-body-secondary small">Kampus 3</td>
                                <td class="text-center"><span class="badge bg-success" style="min-width: 80px;">Kampus 3</span></td>
                                <td class="text-center text-body-secondary">⋮</td>
                            </tr>
                            <tr>
                                <td class="text-center text-body-secondary small">2</td>
                                <td class="text-body-secondary small">Kantin Mami ITSK</td>
                                <td class="text-body-secondary small">Kampus 2</td>
                                <td class="text-center"><span class="badge bg-danger" style="min-width: 80px;">Kampus 3</span></td>
                                <td class="text-center text-body-secondary">⋮</td>
                            </tr>
                            <tr>
                                <td class="text-center text-body-secondary small">3</td>
                                <td class="text-body-secondary small">Wastafel Cuci Tangan</td>
                                <td class="text-body-secondary small">Kampus 4</td>
                                <td class="text-center"><span class="badge bg-warning text-dark" style="min-width: 80px;">Kampus 3</span></td>
                                <td class="text-center text-body-secondary">⋮</td>
                            </tr>
                            <tr>
                                <td class="text-center text-body-secondary small">4</td>
                                <td class="text-body-secondary small">Lobby Rektorat ITSK Soepraoen</td>
                                <td class="text-body-secondary small">Kampus 2</td>
                                <td class="text-center"><span class="badge bg-warning text-dark" style="min-width: 80px;">Kampus 3</span></td>
                                <td class="text-center text-body-secondary">⋮</td>
                            </tr>
                            <tr>
                                <td class="text-center text-body-secondary small">5</td>
                                <td class="text-body-secondary small">LPPM ITSK Soepraoen</td>
                                <td class="text-body-secondary small">Kampus 2</td>
                                <td class="text-center"><span class="badge bg-warning text-dark" style="min-width: 80px;">Kampus 3</span></td>
                                <td class="text-center text-body-secondary">⋮</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; padding: 0.3rem 1rem;">Lihat Semua</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Fasilitas dengan Masalah Terbanyak -->
    <div class="col-md-5 mt-4 mt-md-0">
        <div class="card h-100 border shadow-sm" style="border-radius: 12px;">
            <div class="card-body">
                <h6 class="card-title text-success fw-bold mb-4">Fasilitas dengan Masalah Terbanyak</h6>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <span class="text-body-secondary small me-3 fw-bold">1</span>
                        <span class="text-body-secondary small">Kantin Mami ITSK</span>
                    </div>
                    <span class="badge bg-danger rounded-pill px-3 py-2">4 Kali</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <span class="text-body-secondary small me-3 fw-bold">2</span>
                        <span class="text-body-secondary small">Wastafel Cuci Tangan</span>
                    </div>
                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">2 Kali</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <span class="text-body-secondary small me-3 fw-bold">3</span>
                        <span class="text-body-secondary small">Lobby Rektorat ITSK Soepraoen</span>
                    </div>
                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">8 Kali</span>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="d-flex align-items-center">
                        <span class="text-body-secondary small me-3 fw-bold">4</span>
                        <span class="text-body-secondary small">LPPM ITSK Soepraoen</span>
                    </div>
                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">7 Kali</span>
                </div>
                
                <div class="mt-4 pt-2">
                    <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; padding: 0.3rem 1rem;">Lihat Semua</button>
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
        // Mendapatkan warna teks berdasarkan mode (terang/gelap)
        const isDarkMode = document.documentElement.getAttribute('data-coreui-theme') === 'dark';
        const textColor = isDarkMode ? 'rgba(255, 255, 255, 0.87)' : '#333';
        const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.1)' : 'rgba(0, 0, 0, 0.05)';

        // Doughnut Chart (Ringkasan Status Fasilitas)
        const ctxDoughnut = document.getElementById('statusDoughnutChart').getContext('2d');
        new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: ['Bersih dan Aman', 'Perlu Perhatian', 'Perlu Dibersihkan', 'Buruk'],
                datasets: [{
                    data: [13, 6, 4, 2],
                    backgroundColor: ['#28a745', '#ffc107', '#fd7e14', '#dc3545'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            color: textColor,
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            },
            plugins: [{
                id: 'textCenter',
                beforeDraw: function(chart) {
                    var width = chart.width,
                        height = chart.height,
                        ctx = chart.ctx;

                    ctx.restore();
                    
                    // Total number
                    ctx.font = "bold 2.5em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = textColor;
                    var text = "25",
                        textX = Math.round((chart.chartArea.left + chart.chartArea.right - ctx.measureText(text).width) / 2),
                        textY = (chart.chartArea.top + chart.chartArea.bottom) / 2 - 10;
                    ctx.fillText(text, textX, textY);
                    
                    // Subtext
                    ctx.font = "0.9em sans-serif";
                    var text2 = "Total (Items)",
                        text2X = Math.round((chart.chartArea.left + chart.chartArea.right - ctx.measureText(text2).width) / 2),
                        text2Y = textY + 30;
                    ctx.fillText(text2, text2X, text2Y);
                    ctx.save();
                }
            }]
        });

        // Line Chart (Inspeksi 7 Hari Terakhir)
        const ctxLine = document.getElementById('inspeksiLineChart').getContext('2d');
        new Chart(ctxLine, {
            type: 'line',
            data: {
                labels: ['16 Mei', '17 Mei', '18 Mei', '19 Mei', '20 Mei', '21 Mei', '22 Mei'],
                datasets: [{
                    label: 'Inspeksi',
                    data: [6, 12, 15, 10, 14, 10, 18],
                    borderColor: '#28a745',
                    backgroundColor: '#28a745',
                    borderWidth: 3,
                    pointBackgroundColor: isDarkMode ? '#212529' : '#fff', // Match card background
                    pointBorderColor: '#28a745',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: isDarkMode ? 'rgba(0, 0, 0, 0.8)' : 'rgba(255, 255, 255, 0.9)',
                        titleColor: isDarkMode ? '#fff' : '#000',
                        bodyColor: isDarkMode ? '#fff' : '#000',
                        borderColor: gridColor,
                        borderWidth: 1
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 20,
                        ticks: {
                            stepSize: 5,
                            color: textColor
                        },
                        grid: {
                            color: gridColor
                        },
                        border: {
                            display: false
                        }
                    },
                    x: {
                        ticks: {
                            color: textColor
                        },
                        grid: {
                            display: false
                        },
                        border: {
                            color: gridColor
                        }
                    }
                }
            }
        });
    });
</script>
@endpush
