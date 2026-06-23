@extends('layouts.admin')

@section('title', 'Riwayat Tindak Lanjut')

@section('content')
<div class="mb-3">
    <h3 class="fw-bold mb-1" style="color: #1b5e3a;">Riwayat Tindak Lanjut</h3>
    <p class="text-body-secondary" style="font-size: 0.9rem;">Arsip riwayat tindak lanjut inspeksi sanitasi yang telah selesai</p>
</div>

<!-- KPI Cards -->
<div class="row mb-3">
    @foreach([
        ['Total Riwayat', $totalSelesai, 'Semua data', 'success', 'M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z'],
        ['Selesai', $totalSelesai, 'Tindak lanjut selesai', 'success', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm108.25 138.29-134.4 160a16 16 0 0 1-23.35 1.14l-80-80a16 16 0 0 1 22.62-22.62l67.24 67.24 123.36-146.85a16 16 0 0 1 24.53 21.09Z'],
        ['Dibatalkan', '0', 'Tidak dilanjutkan', 'secondary', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm96 224H160a16 16 0 0 1 0-32h192a16 16 0 0 1 0 32Z'],
    ] as $i => $kpi)
    <div class="col-sm-6 col-lg mb-2">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-2 d-flex align-items-center">
                <div class="bg-{{ $kpi[3] }} text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                    @if($i === 3)
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 56A200 200 0 1 0 456 256 200.22 200.22 0 0 0 256 56Zm0 368A168 168 0 1 1 424 256 168.19 168.19 0 0 1 256 424Z"/><path fill="currentColor" d="M272 128h-32v128.008l96 55.4 16-27.71-80-46.17V128Z"/></svg>
                    @elseif($i === 4)
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 368a160 160 0 1 1 160-160 160.182 160.182 0 0 1-160 160"/></svg>
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
                    <option>Selesai</option>
                    <option>Dibatalkan</option>
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
                    <option selected>Semua Petugas</option>
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
            <h6 class="card-title text-success fw-bold mb-0">Daftar Riwayat Tindak Lanjut</h6>
            <button class="btn btn-success text-white fw-bold shadow-sm" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.85rem; padding: 0.4rem 0.8rem;">
                <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z"/></svg>
                Export Riwayat
            </button>
        </div>
        <div class="table-responsive">
            <table class="table table-borderless table-hover align-middle mb-0">
                <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: var(--cui-tertiary-bg);">
                    <tr>
                        <th class="text-center text-success py-2 px-2" style="font-size: 0.8rem;">No</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Fasilitas</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Jenis</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Ditemukan</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Selesai</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Durasi</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Petugas</th>
                        <th class="text-center text-success py-2" style="font-size: 0.8rem;">Skor</th>
                        <th class="text-center text-success py-2" style="font-size: 0.8rem;">Status</th>
                        <th class="text-center text-success py-2 px-2" style="font-size: 0.8rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dataTindakLanjut as $index => $item)
                    @php
                        $jenis = 'Perlu Dibersihkan';
                        if ($item->kondisi_kebersihan == 'Buruk') {
                            $jenis = 'Perlu Perbaikan';
                        }
                    @endphp
                    <tr>
                        <td class="text-center text-body-secondary small py-2">{{ $dataTindakLanjut->firstItem() + $index }}</td>
                        <td class="small py-2 fw-semibold">{{ $item->fasilitas->nama_fasilitas ?? '-' }}</td>
                        <td class="text-body-secondary small py-2">{{ $jenis }}</td>
                        <td class="text-body-secondary small py-2" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($item->tanggal_inspeksi)->format('d M Y') }}</td>
                        <td class="text-body-secondary small py-2" style="font-size: 0.75rem;">{{ \Carbon\Carbon::parse($item->updated_at)->format('d M Y') }}</td>
                        <td class="text-body-secondary small py-2">{{ \Carbon\Carbon::parse($item->tanggal_inspeksi)->diffInDays($item->updated_at) }} Hari</td>
                        <td class="text-body-secondary small py-2">{{ $item->petugas->name ?? 'Admin' }}</td>
                        <td class="text-center py-2">
                            <span class="text-body-secondary small">-</span>
                        </td>
                        <td class="text-center py-2">
                            <span class="badge bg-success" style="font-size: 0.7rem; min-width: 70px;">Selesai</span>
                        </td>
                        <td class="text-center py-2">
                            <div class="d-flex justify-content-center gap-1">
                                <button class="btn btn-sm btn-outline-primary border-0 p-1" title="Detail">
                                    <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 112C146.45 112 49.28 182.18 16.37 253.24a16 16 0 0 0 0 13.52C49.28 337.82 146.45 408 256 408s206.72-70.18 239.63-141.24a16 16 0 0 0 0-13.52C462.72 182.18 365.55 112 256 112m0 256a112 112 0 1 1 112-112 112.126 112.126 0 0 1-112 112"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="10" class="text-center py-4 text-muted">Belum ada riwayat tindak lanjut yang selesai.</td></tr>
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

@endsection
