@extends('layouts.admin')

@section('title', 'Inspeksi Sanitasi')

@section('content')
<!-- Header Padat & Minimalis -->
<div class="mb-3 d-flex justify-content-between align-items-center border-bottom pb-2">
    <div>
        <h4 class="fw-bold mb-0" style="color: #1b5e3a;">Inspeksi Sanitasi</h4>
        <p class="text-body-secondary mb-0 small">Data ITSK RS dr. Soepraoen Kesdam V/BRW Malang</p>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ url('/riwayat-tindak-lanjut') }}" class="btn btn-outline-success fw-bold btn-sm shadow-sm px-3" style="border-radius: 6px; border-color: #1b5e3a; color: #1b5e3a;">
            <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M494 198.671a40.54 40.54 0 0 0-32.174-27.592l-115.909-18.837-53.732-104.414a40.7 40.7 0 0 0-72.37 0l-53.732 104.414-115.907 18.837a40.7 40.7 0 0 0-22.364 68.827l82.7 83.368-17.9 116.055a40.672 40.672 0 0 0 58.548 42.538L256 428.977l104.843 52.89a40.69 40.69 0 0 0 58.548-42.538l-17.9-116.055 82.7-83.368A40.54 40.54 0 0 0 494 198.671m-32.53 18.7L367.4 312.2l20.364 132.01a8.671 8.671 0 0 1-12.509 9.088L256 393.136 136.744 453.3a8.671 8.671 0 0 1-12.509-9.088L144.6 312.2l-94.069-94.83a8.7 8.7 0 0 1 4.778-14.706l131.841-21.426 61.119-118.767a8.694 8.694 0 0 1 15.462 0l61.119 118.767 131.841 21.426a8.7 8.7 0 0 1 4.778 14.706Z"/></svg>
            Riwayat Tindak Lanjut
        </a>
        <button class="btn btn-success text-white fw-bold btn-sm shadow-sm px-3" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a;">
            + Tambah Inspeksi
        </button>
    </div>
</div>

<!-- Filter & Search Row Minimalis -->
<div class="row g-2 mb-3 align-items-end">
    <div class="col-md-4">
        <div class="input-group input-group-sm shadow-sm border rounded" style="overflow: hidden;">
            <!-- bg-body & text-body otomatis adaptasi tema -->
            <input type="text" class="form-control border-0 bg-body text-body" placeholder="Cari petugas, lokasi...">
            <span class="input-group-text bg-body border-0 text-body-secondary">
                <svg class="icon" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.72 113.6-13.67 10.33 85.08 20.35 204.3c8.11 96.53 87.57 173.3 184.2 178.6 44.59 2.45 86.82-10.42 121.7-33.82l119.5 119.5c15.6 15.6 40.9 15.6 56.5 0l-1.95-24.9zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z"/>
                </svg>
            </span>
        </div>
    </div>
    
    <div class="col-md-8 d-flex gap-2 justify-content-md-end justify-content-start flex-wrap">
        <div>
            <label class="form-label text-success fw-bold mb-1 extra-small">Status Inspeksi</label>
            <select class="form-select form-select-sm shadow-sm bg-body text-body border" style="border-radius: 6px; min-width: 130px;">
                <option selected>Semua Status</option>
                <option value="1">Selesai</option>
                <option value="2">Dalam Proses</option>
            </select>
        </div>
        <div>
            <button class="btn btn-sm btn-outline-success d-flex align-items-center fw-bold shadow-sm" style="border-radius: 6px; border-color: #1b5e3a; color: #1b5e3a; background-color: transparent;">
                <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 48A208 208 0 1 0 464 256 208 208 0 0 0 256 48zm0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432z" />
                    <path fill="currentColor" d="M344.4 167.6a16 16 0 0 0-22.6 0l-91.8 91.8L190.6 220a16 16 0 1 0-22.6 22.6l50.6 50.6a16 16 0 0 0 22.6 0l103.2-103.2a16 16 0 0 0 0-22.4z" />
                </svg>
                TAMPILKAN
            </button>
        </div>
    </div>
</div>

<!-- Data Table Adaptif Tema -->
<div class="card border shadow-sm adaptive-card" style="border-radius: 10px; min-height: 300px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-sm table-borderless table-hover align-middle mb-0 current-theme-table">
                <!-- Header tabel menggunakan warna tema terintegrasi -->
                <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: var(--cui-tertiary-bg);">
                    <tr>
                        <th class="text-center text-success py-1 px-3" style="font-size: 0.75rem;">No</th>
                        <th class="text-success py-1" style="font-size: 0.75rem;">Tanggal</th>
                        <th class="text-success py-1" style="font-size: 0.75rem;">Petugas</th>
                        <th class="text-success py-1" style="font-size: 0.75rem;">Lokasi Inspeksi</th>
                        <th class="text-center text-success py-1" style="font-size: 0.75rem;">Skor Total</th>
                        <th class="text-center text-success py-1" style="font-size: 0.75rem;">Status</th>
                        <th class="text-center text-success py-1 px-3" style="font-size: 0.75rem; width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody style="font-size: 0.8rem;">
                    @php
                        $dataInspeksi = [
                            ['22 Mei 2025', 'Budi Santoso', 'Toilet Lantai 2 Gedung A', '95', 'Aman', 'bg-success-subtle text-success'],
                            ['22 Mei 2025', 'Siti Aisyah', 'Kantin Sehat Gedung B', '80', 'Perlu Dibersihkan', 'bg-warning-subtle text-warning'],
                            ['21 Mei 2025', 'Andi Wijaya', 'Ruang Tunggu Gedung C', '70', 'Perlu Perbaikan', 'bg-danger-subtle text-danger'],
                            ['21 Mei 2025', 'Rina Marlina', 'Tempat Cuci Tangan Halaman', '100', 'Aman', 'bg-success-subtle text-success'],
                            ['20 Mei 2025', 'Dewi Lestari', 'Toilet Perempuan Gedung B', '65', 'Perlu Perbaikan', 'bg-danger-subtle text-danger']
                        ];
                    @endphp
                    @forelse($dataInspeksi as $key => $item)
                    <tr class="border-bottom border-light-subtle">
                        <td class="text-center text-body py-2">{{ $key + 1 }}</td>
                        <td class="text-body py-2">{{ $item[0] }}</td>
                        <td class="text-body py-2">{{ $item[1] }}</td>
                        <td class="text-body py-2">{{ $item[2] }}</td>
                        <td class="text-center fw-bold py-2">{{ $item[3] }}</td>
                        <td class="text-center py-2">
                            <span class="badge {{ $item[5] }}" style="font-size: 0.65rem;">
                                {{ $item[4] }}
                            </span>
                        </td>
                        <td class="text-center py-2">
                            <div class="d-flex justify-content-center gap-1">
                                <a href="#" class="btn btn-sm p-1 btn-outline-secondary" title="Lihat">
                                    <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 112C146.45 112 49.28 182.18 16.37 253.24a16 16 0 0 0 0 13.52C49.28 337.82 146.45 408 256 408s206.72-70.18 239.63-141.24a16 16 0 0 0 0-13.52C462.72 182.18 365.55 112 256 112m0 256a112 112 0 1 1 112-112 112.126 112.126 0 0 1-112 112"/></svg>
                                </a>
                                @if($item[4] !== 'Aman')
                                <a href="#" class="btn btn-sm btn-warning text-dark p-1 fw-bold" title="Tindak Lanjut" style="border-radius: 4px; font-size: 0.7rem;">
                                    Tindak Lanjut
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center py-4">
                                <p class="text-body-secondary mb-0" style="font-size: 0.85rem;">Belum ada data inspeksi yang ditambahkan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mt-2 pb-3">
    <div class="text-body-secondary" style="font-size: 0.7rem;">Menampilkan 1 sampai 5 dari 5 Data</div>
    <ul class="pagination pagination-sm mb-0 shadow-sm">
        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item active"><a class="page-link bg-success border-success" href="#">1</a></li>
        <li class="page-item disabled"><a class="page-link text-success" href="#">&raquo;</a></li>
    </ul>
</div>

<!-- Tambahan CSS Khusus Tema & Ukuran Minimalis -->
<style>
    .extra-small {
        font-size: 0.65rem !important;
    }

    /* Default Mode Terang (untuk form inputs) */
    .input-group .form-control::placeholder {
        color: #adb5bd;
    }

    /* Aturan Mode Gelap CoreUI */
    html[data-coreui-theme="dark"] .bg-body {
        background-color: var(--cui-body-bg) !important;
    }
    
    html[data-coreui-theme="dark"] .bg-white {
        background-color: var(--cui-body-bg) !important;
    }

    html[data-coreui-theme="dark"] .adaptive-card {
        background-color: var(--cui-card-bg) !important;
        border-color: var(--cui-border-color) !important;
    }

    html[data-coreui-theme="dark"] .current-theme-table thead tr th {
        color: var(--cui-tertiary-color) !important;
    }

    /* Bootstrap 5 Adaptive Badge */
    .bg-success-subtle {
        background-color: rgba(25, 135, 84, 0.2);
    }
    .text-success {
        color: #198754 !important;
    }

    .bg-warning-subtle {
        background-color: rgba(255, 193, 7, 0.2);
    }
    .text-warning {
        color: #ffc107 !important;
    }

    .bg-danger-subtle {
        background-color: rgba(220, 53, 69, 0.2);
    }
    .text-danger {
        color: #dc3545 !important;
    }
</style>
@endsection