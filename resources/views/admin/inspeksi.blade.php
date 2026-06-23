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
        <button type="button" class="btn btn-success text-white fw-bold btn-sm shadow-sm px-3" data-coreui-toggle="modal" data-coreui-target="#addInspeksiModal" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a;">
            + Tambah Inspeksi
        </button>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 8px;">
    {{ session('success') }}
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert" style="border-radius: 8px;">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-coreui-dismiss="alert" aria-label="Close"></button>
</div>
@endif

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
                    @forelse($inspeksi as $index => $item)
                    @php
                        $kebersihan = strtolower($item->kondisi_kebersihan);
                        $status = 'Perlu Perhatian';
                        $badgeClass = 'bg-warning-subtle text-warning';
                        
                        if ($kebersihan == 'baik' && $item->ketersediaan_air == 'Ada' && $item->ketersediaan_sabun == 'Ada' && $item->bau_tidak_sedap == 'Tidak') {
                            $status = 'Aman';
                            $badgeClass = 'bg-success-subtle text-success';
                        } elseif ($kebersihan == 'buruk' || $item->ketersediaan_air == 'Tidak Ada' || $item->bau_tidak_sedap == 'Ya') {
                            $status = 'Perlu Perbaikan';
                            $badgeClass = 'bg-danger-subtle text-danger';
                        }
                    @endphp
                    <tr class="border-bottom border-light-subtle">
                        <td class="text-center text-body py-2">{{ $inspeksi->firstItem() + $index }}</td>
                        <td class="text-body py-2">{{ \Carbon\Carbon::parse($item->tanggal_inspeksi)->format('d M Y H:i') }}</td>
                        <td class="text-body py-2">{{ $item->petugas->name ?? 'Admin' }}</td>
                        <td class="text-body py-2">{{ $item->fasilitas->nama_fasilitas ?? '-' }}</td>
                        <td class="text-center fw-bold py-2">{{ $item->kondisi_kebersihan }}</td>
                        <td class="text-center py-2">
                            <span class="badge {{ $badgeClass }}" style="font-size: 0.65rem;">
                                {{ $status }}
                            </span>
                        </td>
                        <td class="text-center py-2">
                            <div class="d-flex justify-content-center gap-1">
                                <button type="button" class="btn btn-sm p-1 btn-outline-primary border-0" data-coreui-toggle="modal" data-coreui-target="#editInspeksiModal{{ $item->id }}" title="Edit">
                                    <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9M162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                                </button>
                                <form action="{{ route('inspeksi.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data inspeksi ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm p-1 btn-outline-danger border-0" title="Hapus">
                                        <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320H112zm280 0v32h24a24 24 0 0 0 0-48H160a24 24 0 0 0 0 48h24v-32H80v-32h352v32z"/></svg>
                                    </button>
                                </form>
                                @if($status !== 'Aman')
                                <a href="{{ url('/tindak-lanjut') }}" class="btn btn-sm btn-warning text-dark p-1 fw-bold" title="Tindak Lanjut" style="border-radius: 4px; font-size: 0.7rem;">
                                    TL
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>

                    <!-- Modal Edit Inspeksi -->
                    <div class="modal fade" id="editInspeksiModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                          <div class="modal-header border-bottom-0 pb-0">
                            <h5 class="modal-title text-success fw-bold" style="color: #1b5e3a !important;">Edit Inspeksi</h5>
                            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('inspeksi.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-success mb-1">Fasilitas</label>
                                    <select name="fasilitas_id" class="form-select form-select-sm" required style="border-radius: 6px;">
                                        @foreach($fasilitasList ?? [] as $f)
                                            <option value="{{ $f->id }}" {{ $item->fasilitas_id == $f->id ? 'selected' : '' }}>{{ $f->nama_fasilitas }} ({{ $f->lokasi }})</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-success mb-1">Kondisi Kebersihan</label>
                                        <select name="kondisi_kebersihan" class="form-select form-select-sm" required>
                                            <option value="Baik" {{ $item->kondisi_kebersihan == 'Baik' ? 'selected' : '' }}>Baik</option>
                                            <option value="Cukup" {{ $item->kondisi_kebersihan == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                                            <option value="Buruk" {{ $item->kondisi_kebersihan == 'Buruk' ? 'selected' : '' }}>Buruk</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-success mb-1">Ketersediaan Air</label>
                                        <select name="ketersediaan_air" class="form-select form-select-sm" required>
                                            <option value="Ada" {{ $item->ketersediaan_air == 'Ada' ? 'selected' : '' }}>Ada / Lancar</option>
                                            <option value="Tidak Ada" {{ $item->ketersediaan_air == 'Tidak Ada' ? 'selected' : '' }}>Tidak Ada / Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-2 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-success mb-1">Ketersediaan Sabun/Tisu</label>
                                        <select name="ketersediaan_sabun" class="form-select form-select-sm" required>
                                            <option value="Ada" {{ $item->ketersediaan_sabun == 'Ada' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="Tidak Ada" {{ $item->ketersediaan_sabun == 'Tidak Ada' ? 'selected' : '' }}>Habis / Tidak Ada</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold text-success mb-1">Bau Tidak Sedap</label>
                                        <select name="bau_tidak_sedap" class="form-select form-select-sm" required>
                                            <option value="Tidak" {{ $item->bau_tidak_sedap == 'Tidak' ? 'selected' : '' }}>Tidak (Aman)</option>
                                            <option value="Ya" {{ $item->bau_tidak_sedap == 'Ya' ? 'selected' : '' }}>Ya (Bau)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-success mb-1">Catatan</label>
                                    <textarea name="catatan" class="form-control form-control-sm" rows="2">{{ $item->catatan }}</textarea>
                                </div>
                                <div class="modal-footer border-top-0 pt-0 px-0 pb-0">
                                    <button type="button" class="btn btn-outline-secondary btn-sm fw-bold" data-coreui-dismiss="modal" style="border-radius: 6px; padding: 0.4rem 1rem;">Batal</button>
                                    <button type="submit" class="btn btn-success text-white btn-sm fw-bold shadow-sm" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; padding: 0.4rem 1rem;">Simpan Perubahan</button>
                                </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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
    <div class="text-body-secondary" style="font-size: 0.7rem;">Menampilkan {{ $inspeksi->firstItem() ?? 0 }} sampai {{ $inspeksi->lastItem() ?? 0 }} dari {{ $inspeksi->total() }} Data</div>
    <div class="mb-0 shadow-sm custom-pagination">
        {{ $inspeksi->links('pagination::bootstrap-5') }}
    </div>
</div>

<!-- Modal Tambah Inspeksi -->
<div class="modal fade" id="addInspeksiModal" tabindex="-1" aria-labelledby="addInspeksiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title text-success fw-bold" id="addInspeksiModalLabel" style="color: #1b5e3a !important;">Tambah Data Inspeksi</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('inspeksi.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-bold text-success mb-1">Pilih Fasilitas</label>
                <select name="fasilitas_id" class="form-select form-select-sm bg-adaptive-input" required style="border-radius: 6px; padding: 0.4rem 2rem 0.4rem 0.75rem;">
                    <option selected disabled value="">-- Pilih Fasilitas --</option>
                    @foreach($fasilitasList ?? [] as $f)
                        <option value="{{ $f->id }}">{{ $f->nama_fasilitas }} ({{ $f->lokasi }})</option>
                    @endforeach
                </select>
            </div>
            
            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-success mb-1">Kondisi Kebersihan</label>
                    <select name="kondisi_kebersihan" class="form-select form-select-sm bg-adaptive-input" required>
                        <option value="Baik">Baik</option>
                        <option value="Cukup">Cukup</option>
                        <option value="Buruk">Buruk</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-success mb-1">Ketersediaan Air</label>
                    <select name="ketersediaan_air" class="form-select form-select-sm bg-adaptive-input" required>
                        <option value="Ada">Ada / Lancar</option>
                        <option value="Tidak Ada">Tidak Ada / Mati</option>
                    </select>
                </div>
            </div>

            <div class="row g-2 mb-3">
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-success mb-1">Ketersediaan Sabun/Tisu</label>
                    <select name="ketersediaan_sabun" class="form-select form-select-sm bg-adaptive-input" required>
                        <option value="Ada">Tersedia</option>
                        <option value="Tidak Ada">Habis / Tidak Ada</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label small fw-bold text-success mb-1">Bau Tidak Sedap</label>
                    <select name="bau_tidak_sedap" class="form-select form-select-sm bg-adaptive-input" required>
                        <option value="Tidak">Tidak (Aman)</option>
                        <option value="Ya">Ya (Bau)</option>
                    </select>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label small fw-bold text-success mb-1">Catatan Tambahan</label>
                <textarea name="catatan" class="form-control form-control-sm bg-adaptive-input" rows="3" placeholder="Masukkan catatan jika ada temuan (opsional)"></textarea>
            </div>
            
            <div class="modal-footer border-top-0 pt-0 px-0 pb-0">
                <button type="button" class="btn btn-outline-secondary btn-sm fw-bold" data-coreui-dismiss="modal" style="border-radius: 6px; padding: 0.4rem 1rem;">Batal</button>
                <button type="submit" class="btn btn-success text-white btn-sm fw-bold shadow-sm" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; padding: 0.4rem 1rem;">Simpan Inspeksi</button>
            </div>
        </form>
      </div>
    </div>
  </div>
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