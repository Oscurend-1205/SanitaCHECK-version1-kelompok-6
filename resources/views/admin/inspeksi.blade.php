@extends('layouts.admin')

@section('title', 'Inspeksi Sanitasi')

@section('content')
<div class="mb-3">
    <h3 class="fw-bold mb-1" style="color: #1b5e3a;">Inspeksi Sanitasi</h3>
    <p class="text-body-secondary" style="font-size: 0.9rem;">Data Inspeksi Sanitasi ITSK RS dr. Soepraoen Kesdam V/BRW Malang</p>
</div>

<!-- Header Actions -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <button class="btn btn-success text-white fw-bold shadow-sm" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.85rem; padding: 0.5rem 1rem;">
        + Tambah Inspeksi
    </button>
</div>

<!-- Filter & Search Row -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-3 gap-2">
    <div class="flex-grow-1" style="max-width: 400px;">
        <div class="input-group shadow-sm" style="border-radius: 6px; overflow: hidden;">
            <input type="text" class="form-control border-end-0" placeholder="Cari nama petugas, lokasi..." style="padding: 0.5rem 0.75rem; font-size: 0.85rem;">
            <span class="input-group-text bg-white border-start-0" style="cursor: pointer; padding: 0.5rem 0.75rem;">
                <svg class="icon text-body-secondary" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.72 113.6-13.67 10.33 85.08 20.35 204.3c8.11 96.53 87.57 173.3 184.2 178.6 44.59 2.45 86.82-10.42 121.7-33.82l119.5 119.5c15.6 15.6 40.9 15.6 56.5 0l-1.95-24.9zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z"/>
                </svg>
            </span>
        </div>
    </div>
    
    <div class="d-flex gap-2 align-items-end flex-wrap">
        <div>
            <label class="form-label text-success fw-bold mb-1" style="font-size: 0.75rem;">Status Inspeksi</label>
            <select class="form-select shadow-sm" style="border-radius: 6px; min-width: 130px; padding: 0.5rem 0.75rem; font-size: 0.85rem;">
                <option selected>Semua Status</option>
                <option value="1">Selesai</option>
                <option value="2">Dalam Proses</option>
            </select>
        </div>
        <div>
            <button class="btn btn-outline-success d-flex align-items-center fw-bold shadow-sm" style="border-radius: 6px; padding: 0.5rem 1rem; border-color: #1b5e3a; color: #1b5e3a; background-color: transparent; font-size: 0.85rem;">
                <svg class="icon me-2" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 48A208 208 0 1 0 464 256 208 208 0 0 0 256 48zm0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432z" />
                    <path fill="currentColor" d="M344.4 167.6a16 16 0 0 0-22.6 0l-91.8 91.8L190.6 220a16 16 0 1 0-22.6 22.6l50.6 50.6a16 16 0 0 0 22.6 0l103.2-103.2a16 16 0 0 0 0-22.4z" />
                </svg>
                TAMPILKAN
            </button>
        </div>
    </div>
</div>

<!-- Data Table -->
<div class="card border shadow-sm" style="border-radius: 10px; min-height: 350px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-borderless table-hover align-middle mb-0">
                <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: var(--cui-tertiary-bg);">
                    <tr>
                        <th class="text-center text-success py-2 px-3" style="font-size: 0.8rem;">No</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Tanggal</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Petugas</th>
                        <th class="text-success py-2" style="font-size: 0.8rem;">Lokasi Inspeksi</th>
                        <th class="text-center text-success py-2" style="font-size: 0.8rem;">Skor Total</th>
                        <th class="text-center text-success py-2" style="font-size: 0.8rem;">Status</th>
                        <th class="text-center text-success py-2 px-3" style="font-size: 0.8rem;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Empty state -->
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <div class="d-flex flex-column align-items-center justify-content-center py-4">
                                <p class="text-body-secondary mb-0" style="font-size: 0.9rem;">Belum ada data inspeksi yang ditambahkan</p>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mt-2">
    <div class="text-body-secondary" style="font-size: 0.75rem;">Menampilkan 0 sampai 0 dari 0 Data</div>
    <ul class="pagination pagination-sm mb-0 shadow-sm">
        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item active"><a class="page-link bg-success border-success" href="#">1</a></li>
        <li class="page-item"><a class="page-link text-success" href="#">2</a></li>
        <li class="page-item"><a class="page-link text-success" href="#">3</a></li>
        <li class="page-item"><a class="page-link text-success" href="#">&raquo;</a></li>
    </ul>
</div>
@endsection
