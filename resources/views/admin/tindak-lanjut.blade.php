@extends('layouts.admin')

@section('title', 'Tindak Lanjut')

@section('content')
<div class="mb-3">
    <h3 class="fw-bold mb-1" style="color: #1b5e3a;">Tindak Lanjut</h3>
    <p class="text-body-secondary" style="font-size: 0.9rem;">Monitoring dan pengelolaan tindak lanjut hasil inspeksi sanitasi</p>
</div>

<!-- KPI Cards -->
<div class="row mb-3">
    @foreach($kpis as $kpi)
    <div class="col-sm-6 col-lg mb-2">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-2 d-flex align-items-center">
                <div class="bg-{{ $kpi[3] }} text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                    <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Z"/></svg>
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

<!-- Filter Section -->
<div class="card border shadow-sm mb-3" style="border-radius: 12px;">
    <div class="card-body p-3">
        <div class="row g-2">
            <div class="col-md-3">
                <div class="input-group shadow-sm" style="border-radius: 6px; overflow: hidden;">
                    <input type="text" class="form-control border-end-0" placeholder="Cari fasilitas atau lokasi..." style="padding: 0.5rem 0.75rem; font-size: 0.85rem;">
                    <span class="input-group-text bg-white border-start-0" style="cursor: pointer; padding: 0.5rem 0.75rem;">
                        <svg class="icon text-body-secondary" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.72 113.6-13.67 10.33 85.08 20.35 204.3c8.11 96.53 87.57 173.3 184.2 178.6 44.59 2.45 86.82-10.42 121.7-33.82l119.5 119.5c15.6 15.6 40.9 15.6 56.5 0l-1.95-24.9zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z"/></svg>
                    </span>
                </div>
            </div>
            <div class="col-md-2">
                <select class="form-select shadow-sm" style="border-radius: 6px; font-size: 0.85rem;">
                    <option selected>Semua Status</option>
                    <option>Dalam Proses</option>
                    <option>Belum Dikerjakan</option>
                    <option>Selesai</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select shadow-sm" style="border-radius: 6px; font-size: 0.85rem;">
                    <option selected>Semua Jenis</option>
                    <option>Perlu Dibersihkan</option>
                    <option>Perlu Perbaikan</option>
                </select>
            </div>
            <div class="col-md-2">
                <select class="form-select shadow-sm" style="border-radius: 6px; font-size: 0.85rem;">
                    <option selected>Semua Prioritas</option>
                    <option>Tinggi</option>
                    <option>Sedang</option>
                    <option>Rendah</option>
                </select>
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control shadow-sm" value="01/05/2025 – 22/05/2025" style="font-size: 0.85rem; border-radius: 6px;">
            </div>
            <div class="col-md-1">
                <button class="btn btn-outline-success fw-bold w-100" style="border-radius: 6px; border-color: #1b5e3a; color: #1b5e3a; font-size: 0.85rem;">Reset</button>
            </div>
        </div>
    </div>
</div>

<!-- Data Table -->
<div class="card border shadow-sm mb-3" style="border-radius: 12px;">
    <div class="card-body p-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="card-title text-success fw-bold mb-0">Daftar Tindak Lanjut</h6>
            <button class="btn btn-success text-white fw-bold shadow-sm" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.85rem; padding: 0.4rem 0.8rem;">
                + Tambah Tindak Lanjut
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover align-middle mb-0">
                <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: var(--cui-tertiary-bg);">
                    <tr>
                        <th class="text-center text-success py-2 px-2" style="font-size: 0.8rem;">No</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Fasilitas</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Lokasi</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Jenis</th>
                        <th class="text-center text-success py-2" style="font-size: 0.8rem;">Prioritas</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Ditemukan</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Target</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Penanggung Jawab</th>
                        <th class="text-center text-success py-2" style="font-size: 0.8rem;">Status</th>
                        <th class="text-center text-success py-2 px-2" style="font-size: 0.8rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataTindakLanjut as $index => $item)
                    @php
                        $prioritas = 'Rendah';
                        $badgePrioritas = 'success';
                        $jenis = 'Perlu Dibersihkan';
                        if ($item->kondisi_kebersihan == 'Buruk') {
                            $prioritas = 'Tinggi';
                            $badgePrioritas = 'danger';
                            $jenis = 'Perlu Perbaikan';
                        } elseif ($item->kondisi_kebersihan == 'Cukup') {
                            $prioritas = 'Sedang';
                            $badgePrioritas = 'warning text-dark';
                        }
                        
                        $statusBadge = 'warning';
                        if ($item->status_tindak_lanjut == 'Selesai') $statusBadge = 'success';
                        elseif ($item->status_tindak_lanjut == 'Dalam Proses') $statusBadge = 'primary';
                    @endphp
                    <tr>
                        <td class="text-center text-body-secondary small py-2">{{ $dataTindakLanjut->firstItem() + $index }}</td>
                        <td class="small py-2 fw-semibold">{{ $item->fasilitas->nama_fasilitas ?? '-' }}</td>
                        <td class="text-body-secondary small py-2">{{ $item->fasilitas->lokasi ?? '-' }}</td>
                        <td class="text-body-secondary small py-2">{{ $jenis }}</td>
                        <td class="text-center py-2">
                            <span class="badge bg-{{ $badgePrioritas }}" style="font-size: 0.7rem;">{{ $prioritas }}</span>
                        </td>
                        <td class="text-body-secondary small py-2" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($item->tanggal_inspeksi)->format('d M Y H:i') }}</td>
                        <td class="text-body-secondary small py-2" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($item->tanggal_inspeksi)->addDays(2)->format('d M Y') }}</td>
                        <td class="text-body-secondary small py-2">{{ $item->petugas->name ?? 'Admin' }}</td>
                        <td class="text-center py-2">
                            <span class="badge bg-{{ $statusBadge }}" style="font-size: 0.7rem; min-width: 90px;">{{ $item->status_tindak_lanjut ?? 'Menunggu' }}</span>
                        </td>
                        <td class="text-center py-2">
                            <div class="d-flex justify-content-center gap-1">
                                <button class="btn btn-sm btn-outline-primary border-0 p-1" title="Lihat">
                                    <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 112C146.45 112 49.28 182.18 16.37 253.24a16 16 0 0 0 0 13.52C49.28 337.82 146.45 408 256 408s206.72-70.18 239.63-141.24a16 16 0 0 0 0-13.52C462.72 182.18 365.55 112 256 112m0 256a112 112 0 1 1 112-112 112.126 112.126 0 0 1-112 112"/></svg>
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-warning border-0 p-1" data-coreui-toggle="modal" data-coreui-target="#updateStatusModal{{ $item->id }}" title="Edit Status">
                                    <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9M162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Modal Update Status -->
                    <div class="modal fade" id="updateStatusModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                          <div class="modal-header border-bottom-0 pb-0">
                            <h5 class="modal-title text-success fw-bold">Update Status</h5>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form action="{{ route('tindak-lanjut.update', $item->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <p class="small mb-3">Tindak Lanjut untuk: <strong>{{ $item->fasilitas->nama_fasilitas ?? '-' }}</strong></p>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-success mb-1">Status</label>
                                    <select name="status_tindak_lanjut" class="form-select form-select-sm" required style="border-radius: 6px;">
                                        <option value="Menunggu" {{ $item->status_tindak_lanjut == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                        <option value="Dalam Proses" {{ $item->status_tindak_lanjut == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                        <option value="Selesai" {{ $item->status_tindak_lanjut == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer border-top-0 pt-0">
                                <button type="button" class="btn btn-outline-secondary btn-sm fw-bold" data-coreui-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success text-white btn-sm fw-bold">Simpan</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @empty
                    <tr><td colspan="10" class="text-center py-4">Belum ada data tindak lanjut.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-body-secondary" style="font-size: 0.75rem;">Menampilkan {{ $dataTindakLanjut->firstItem() ?? 0 }} sampai {{ $dataTindakLanjut->lastItem() ?? 0 }} dari {{ $dataTindakLanjut->total() }} data</div>
            <div class="mb-0 shadow-sm custom-pagination">
                {{ $dataTindakLanjut->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Bottom Summary Row -->
<div class="row mb-4">
    <!-- Detail Tindak Lanjut -->
    <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Detail Tindak Lanjut Terpilih</h6>
                <div class="p-3 border rounded" style="border-radius: 8px; background-color: var(--cui-tertiary-bg);">
                    <h6 class="fw-bold mb-2">Toilet Lantai 1</h6>
                    <span class="badge bg-warning text-dark mb-3">Perlu Dibersihkan</span>
                    <div class="small mb-2"><span class="text-body-secondary">Deskripsi:</span><br>Meja dan lantai kotor, terdapat noda di wastafel.</div>
                    <div class="small mb-2"><span class="text-body-secondary">Ditemukan Pada:</span><br>22 Mei 2025 09:30</div>
                    <div class="small mb-2"><span class="text-body-secondary">Target Penyelesaian:</span><br>24 Mei 2025</div>
                    <div class="small mb-2"><span class="text-body-secondary">Penanggung Jawab:</span><br>Budi Santoso</div>
                    <div class="small mb-2"><span class="text-body-secondary">Status:</span><br><span class="badge bg-primary">Dalam Proses</span> <span class="badge bg-warning text-dark">Sedang</span></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Progres Penyelesaian -->
    <div class="col-lg-4 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Progres Penyelesaian</h6>
                <div class="d-flex justify-content-between mb-4" style="position: relative;">
                    <div class="text-center position-relative" style="z-index: 1;">
                        <div class="rounded-circle bg-success d-flex align-items-center justify-content-center mx-auto mb-1" style="width: 28px; height: 28px;">
                            <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm108.25 138.29-134.4 160a16 16 0 0 1-23.35 1.14l-80-80a16 16 0 0 1 22.62-22.62l67.24 67.24 123.36-146.85a16 16 0 0 1 24.53 21.09Z"/></svg>
                        </div>
                        <div class="small fw-bold">Dibuat</div>
                        <div class="text-body-secondary" style="font-size: 0.7rem;">22 Mei 2025</div>
                    </div>
                    <div class="text-center position-relative" style="z-index: 1;">
                        <div class="rounded-circle bg-success d-flex align-items-center justify-content-center mx-auto mb-1" style="width: 28px; height: 28px;">
                            <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm108.25 138.29-134.4 160a16 16 0 0 1-23.35 1.14l-80-80a16 16 0 0 1 22.62-22.62l67.24 67.24 123.36-146.85a16 16 0 0 1 24.53 21.09Z"/></svg>
                        </div>
                        <div class="small fw-bold">Proses</div>
                        <div class="text-body-secondary" style="font-size: 0.7rem;">22 Mei 2025</div>
                    </div>
                    <div class="text-center position-relative" style="z-index: 1;">
                        <div class="rounded-circle border border-2 d-flex align-items-center justify-content-center mx-auto mb-1" style="width: 28px; height: 28px;"></div>
                        <div class="small fw-bold">Verifikasi</div>
                        <div class="text-body-secondary" style="font-size: 0.7rem;">-</div>
                    </div>
                    <div class="text-center position-relative" style="z-index: 1;">
                        <div class="rounded-circle border border-2 d-flex align-items-center justify-content-center mx-auto mb-1" style="width: 28px; height: 28px;"></div>
                        <div class="small fw-bold">Selesai</div>
                        <div class="text-body-secondary" style="font-size: 0.7rem;">-</div>
                    </div>
                </div>
                <div class="p-2 border rounded" style="border-radius: 8px; background-color: var(--cui-tertiary-bg);">
                    <div class="small fw-bold text-success mb-1">Catatan</div>
                    <div class="text-body-secondary small">Tim kebersihan sudah ditugaskan untuk membersihkan area ini. (22 Mei 2025 - 10:15)</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan Tindak Lanjut -->
    <div class="col-lg-4">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-3">Ringkasan Tindak Lanjut</h6>
                <div style="position: relative; height: 160px;">
                    <canvas id="summaryDoughnut"></canvas>
                </div>
                <div class="mt-3">
                    @foreach([
                        ['Selesai', $selesai, $selesaiP.'%', 'success'],
                        ['Dalam Proses', $dalamProses, $dalamProsesP.'%', 'primary'],
                        ['Belum Dikerjakan / Menunggu', $belumDikerjakan, $belumDikerjakanP.'%', 'warning'],
                    ] as $item)
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center">
                            <span class="rounded-circle d-inline-block me-2" style="width: 10px; height: 10px; background-color: var(--bs-{{ $item[3] }});"></span>
                            <span class="small text-body-secondary">{{ $item[0] }}</span>
                        </div>
                        <span class="small fw-semibold">{{ $item[1] }} ({{ $item[2] }})</span>
                    </div>
                    @endforeach
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
        return { textColor: isDarkMode ? 'rgba(255, 255, 255, 0.87)' : '#333' };
    }
    const colors = getThemeColors();

    new Chart(document.getElementById('summaryDoughnut').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Dalam Proses', 'Belum Dikerjakan / Menunggu'],
            datasets: [{ data: [{{ $selesai }}, {{ $dalamProses }}, {{ $belumDikerjakan }}], backgroundColor: ['#28a745', '#0d6efd', '#ffc107'], borderWidth: 0 }]
        },
        options: {
            responsive: true, maintainAspectRatio: false, cutout: '70%',
            plugins: { legend: { display: false } }
        },
        plugins: [{
            id: 'centerText',
            beforeDraw: function(chart) {
                const ctx = chart.ctx;
                ctx.restore();
                ctx.font = "bold 2em sans-serif";
                ctx.textBaseline = "middle";
                ctx.fillStyle = colors.textColor;
                const text = "{{ $total }}", textX = Math.round((chart.chartArea.left + chart.chartArea.right - ctx.measureText(text).width) / 2), textY = (chart.chartArea.top + chart.chartArea.bottom) / 2;
                ctx.fillText(text, textX, textY);
                ctx.save();
            }
        }]
    });
});
</script>
@endpush
