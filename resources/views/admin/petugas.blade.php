@extends('layouts.admin')

@section('title', 'Petugas')

@section('content')
<style>
    /* Global Wrapper - Mengecilkan ukuran font dasar agar padat */
    .sanita-wrapper { 
        font-size: 0.85rem; 
    }
    
    /* Penyesuaian Komponen Card & Sudut (10px agar senada dashboard) */
    .sanita-card { 
        border-radius: 10px; 
        border: 1px solid var(--cui-border-color, var(--bs-border-color)); 
        background-color: var(--cui-card-bg, var(--bs-card-bg));
    }
    
    /* Box Ikon Statistik (Diperkecil dari 46px ke 38px) */
    .sanita-icon-box { 
        border-radius: 8px; 
        width: 38px; 
        height: 38px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
    }
    
    /* Pewarnaan Teks Adaptif untuk Judul Bagian */
    .sanita-text-green { 
        color: #1b5e3a !important; 
    }
    /* Di tema gelap, jika hijau terlalu gelap, gunakan warna yang sedikit lebih terang agar kontras */
    [data-coreui-theme="dark"] .sanita-text-green,
    [data-bs-theme="dark"] .sanita-text-green {
        color: #2ea365 !important;
    }
    
    /* Gaya Tombol Hijau Utama (Radius diperkecil) */
    .sanita-btn-green { 
        background-color: #1b5e3a; 
        color: white !important; 
        border-radius: 6px; 
        font-size: 0.8rem;
        border: none;
    }
    .sanita-btn-green:hover { 
        background-color: #14492d; 
    }
    
    /* Gaya Tombol Outline Hijau (Radius diperkecil) */
    .sanita-btn-outline-green { 
        border: 1px solid #1b5e3a; 
        color: #1b5e3a !important; 
        background-color: transparent; 
        border-radius: 6px; 
        font-size: 0.8rem;
    }
    .sanita-btn-outline-green:hover { 
        background-color: #1b5e3a; 
        color: white !important; 
    }
    [data-coreui-theme="dark"] .sanita-btn-outline-green,
    [data-bs-theme="dark"] .sanita-btn-outline-green {
        border-color: #2ea365;
        color: #2ea365 !important;
    }
    [data-coreui-theme="dark"] .sanita-btn-outline-green:hover,
    [data-bs-theme="dark"] .sanita-btn-outline-green:hover {
        background-color: #2ea365;
        color: #121212 !important;
    }
    
    /* Penataan Tabel Lebih Rapat (Padding diperkecil) */
    .sanita-table th { 
        font-size: 0.75rem; 
        font-weight: 600; 
        color: var(--cui-body-color, var(--bs-body-color)); 
        background-color: var(--cui-tertiary-bg, var(--bs-tertiary-bg)); 
        border-bottom: 1px solid var(--cui-border-color, var(--bs-border-color)); 
    }
    .sanita-table td { 
        font-size: 0.8rem; 
        vertical-align: middle; 
        border-bottom: 1px solid var(--cui-border-color, var(--bs-border-color)); 
        color: var(--cui-body-color, var(--bs-body-color));
        padding-top: 0.3rem !important;
        padding-bottom: 0.3rem !important;
    }
    
    /* Ukuran Avatar Petugas di Tabel (Diperkecil sedikit) */
    .sanita-avatar { 
        width: 28px; 
        height: 28px; 
        object-fit: cover; 
    }
    
    /* Lencana Status di Tabel */
    .sanita-badge { 
        font-size: 0.65rem; 
        font-weight: 600; 
        padding: 0.25em 0.7em; 
        border-radius: 4px; 
    }
    
    /* Widget Kalender Mingguan (Ukuran Box & Jarak diperkecil) */
    .sanita-day-box { 
        width: 32px; 
        height: 32px; 
        border-radius: 8px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 0.8rem; 
        color: var(--cui-body-color, var(--bs-body-color));
    }
    .sanita-day-active { 
        background-color: #1b5e3a !important; 
        color: white !important; 
        box-shadow: 0 4px 6px rgba(27, 94, 58, 0.2); 
    }
    [data-coreui-theme="dark"] .sanita-day-active,
    [data-bs-theme="dark"] .sanita-day-active {
        background-color: #2ea365 !important;
        color: #121212 !important;
    }
    
    /* Pagination Padat (Ukuran link & tombol diperkecil) */
    .sanita-pagination .page-link { 
        border: 1px solid var(--cui-border-color, var(--bs-border-color)); 
        color: var(--cui-body-color, var(--bs-body-color)); 
        border-radius: 6px; 
        margin: 0 2px; 
        width: 28px; 
        height: 28px; 
        display: flex; 
        align-items: center; 
        justify-content: center; 
        font-size: 0.75rem; 
        font-weight: 600;
        background-color: var(--cui-card-bg, var(--bs-card-bg));
    }
    .sanita-pagination .page-item.active .page-link { 
        background-color: #1b5e3a; 
        border-color: #1b5e3a;
        color: white !important; 
    }
    [data-coreui-theme="dark"] .sanita-pagination .page-item.active .page-link,
    [data-bs-theme="dark"] .sanita-pagination .page-item.active .page-link {
        background-color: #2ea365;
        border-color: #2ea365;
        color: #121212 !important;
    }

    /* Penyesuaian Khusus Spacing Vertical (Padat Vertical) */
    .lh-1 { line-height: 1 !important; }
    .extra-small-desc { font-size: 0.7rem; color: var(--cui-body-color-secondary, var(--bs-body-secondary-color)) !important; }
    .p-1d5 { padding: 0.35rem !important; }
    .py-1d5 { padding-top: 0.35rem !important; padding-bottom: 0.35rem !important; }
    
    /* Bar Input & Select Adaptif */
    .bg-adaptive-input {
        background-color: var(--cui-body-bg, var(--bs-body-bg)) !important;
        border: 1px solid var(--cui-border-color, var(--bs-border-color)) !important;
        color: var(--cui-body-color, var(--bs-body-color)) !important;
    }
    
    /* Mengubah warna fill ikon bawaan agar mengikuti warna text tema */
    .adaptive-icon {
        color: var(--cui-body-color, var(--bs-body-color));
    }
    .adaptive-icon-secondary {
        color: var(--cui-body-color-secondary, var(--bs-body-secondary-color));
    }
</style>

<div class="sanita-wrapper">
    <div class="mb-3">
        <div class="d-flex align-items-center gap-2 mb-1 border-bottom pb-2">
            <h4 class="fw-bold mb-0 sanita-text-green">Petugas</h4>
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

    <div class="row g-2 mb-3">
        <div class="col-6 col-sm-6 col-lg-3">
            <div class="card sanita-card shadow-sm h-100">
                <div class="card-body p-2 d-flex align-items-center">
                    <div class="sanita-icon-box bg-success text-white me-2 shadow-sm">
                        <svg style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M136.262 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04A144.3 144.3 0 0 1 93 277.207v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM135 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 135 139.635zM375 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04 144.3 144.3 0 0 1 48.538-28v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM375 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 375 139.635z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-body-secondary fw-semibold small lh-sm" style="font-size: 0.75rem;">Total Petugas</div>
                        <div class="fw-bold fs-5 text-body lh-1 mt-1">{{ $totalPetugas }}</div>
                        <div class="extra-small-desc mt-1">Semua petugas terdaftar</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-3">
            <div class="card sanita-card shadow-sm h-100">
                <div class="card-body p-2 d-flex align-items-center">
                    <div class="sanita-icon-box bg-primary text-white me-2 shadow-sm">
                        <svg style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M336 256c-52.938 0-96-43.063-96-96s43.062-96 96-96 96 43.063 96 96-43.062 96-96 96m138.188-9.376c27.57-22.046 45.812-55.828 45.812-93.811C520 68.343 449.656-2 365.188-2 323.96-2 286.555 14.484 259.188 41.094c-19.39 18.78-32.844 43.39-37.375 70.906H192C85.961 112 0 197.961 0 304v160a16 16 0 0 0 16 16h480a16 16 0 0 0 16-16V304c0-38.875-11.688-75.063-31.812-105.376"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-body-secondary fw-semibold small lh-sm" style="font-size: 0.75rem;">Petugas Aktif</div>
                        <div class="fw-bold fs-5 text-body lh-1 mt-1">{{ $aktifPetugas }}</div>
                        <div class="extra-small-desc mt-1">Sedang bertugas</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-3">
            <div class="card sanita-card shadow-sm h-100">
                <div class="card-body p-2 d-flex align-items-center">
                    <div class="sanita-icon-box bg-warning text-white me-2 shadow-sm">
                        <svg style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M400 464H48V104h192V72H16v424h416V272h-32z"/>
                            <path fill="currentColor" d="M304 16v32h137.373L188.687 300.687l22.626 22.626L464 70.627V208h32V16z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-body-secondary fw-semibold small lh-sm" style="font-size: 0.75rem;">Jadwal Hari Ini</div>
                        <div class="fw-bold fs-5 text-body lh-1 mt-1">{{ $jadwalHariIni }}</div>
                        <div class="extra-small-desc mt-1">Petugas dijadwalkan</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-6 col-lg-3">
            <div class="card sanita-card shadow-sm h-100">
                <div class="card-body p-2 d-flex align-items-center">
                    <div class="sanita-icon-box text-white me-2 shadow-sm" style="background-color: #6f42c1;">
                        <svg style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z"/>
                            <path fill="currentColor" d="M136 296h224v32H136zm0 80h224v32H136z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-body-secondary fw-semibold small lh-sm" style="font-size: 0.75rem;">Inspeksi Hari Ini</div>
                        <div class="fw-bold fs-5 text-body lh-1 mt-1">{{ $inspeksiHariIni }}</div>
                        <div class="extra-small-desc mt-1">Inspeksi dilakukan</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-12 col-xl-7">
            <div class="card sanita-card shadow-sm h-100">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0 text-body" style="font-size: 0.9rem;">Data Seluruh Petugas</h6>
                        <button type="button" class="btn btn-sm sanita-btn-green fw-semibold shadow-sm px-3 py-1" data-coreui-toggle="modal" data-coreui-target="#addPetugasModal">
                            + Tambah Petugas
                        </button>
                    </div>

                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                        <div class="input-group input-group-sm shadow-sm" style="max-width: 320px; border-radius: 6px; overflow: hidden;">
                            <input type="text" class="form-control bg-adaptive-input px-3" placeholder="Cari nama, email, hp..." style="box-shadow: none; font-size: 0.8rem;">
                            <button class="btn bg-adaptive-input text-secondary border-start-0" type="button">
                                <svg class="adaptive-icon-secondary" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.72 113.6-13.67 10.33 85.08 20.35 204.3c8.11 96.53 87.57 173.3 184.2 178.6 44.59 2.45 86.82-10.42 121.7-33.82l119.5 119.5c15.6 15.6 40.9 15.6 56.5 0l-1.95-24.9zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z"/></svg>
                            </button>
                        </div>
                        <div class="d-flex gap-2 align-items-center justify-content-end">
                            <select class="form-select form-select-sm shadow-sm bg-adaptive-input" style="min-width: 110px; border-radius: 6px; font-size: 0.8rem;">
                                <option selected>Semua Status</option>
                                <option value="1">Aktif</option>
                                <option value="2">Nonaktif</option>
                            </select>
                            <button class="btn btn-sm sanita-btn-outline-green d-flex align-items-center fw-semibold shadow-sm px-3 py-1">
                                <svg class="me-1" style="width: 12px; height: 12px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M440.667 161.333l-44.373-44.373L256 257.253 115.707 116.96l-44.373 44.373L211.627 301.627 71.333 441.92l44.373 44.373L256 346.002l140.293 140.293 44.373-44.373L300.373 301.627z"/><path fill="currentColor" d="M256 48A208 208 0 1 0 464 256 208 208 0 0 0 256 48zm0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432z"/></svg>
                                Reset
                            </button>
                        </div>
                    </div>

                    <div class="table-responsive mt-2" style="min-height: 250px;">
                        <table class="table table-sm table-borderless table-hover sanita-table mb-0">
                            <thead class="sticky-top">
                                <tr>
                                    <th class="text-center py-2 px-1" width="5%">No</th>
                                    <th class="py-2">Nama Petugas</th>
                                    <th class="py-2">Email</th>
                                    <th class="py-2">No. HP</th>
                                    <th class="text-center py-2">Status</th>
                                    <th class="text-center py-2 px-1" width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($petugas as $index => $item)
                                <tr>
                                    <td class="text-center py-2 px-1">{{ $petugas->firstItem() + $index }}</td>
                                    <td class="py-2">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 28px; height: 28px; font-size: 0.75rem;">
                                                {{ strtoupper(substr($item->nama_petugas, 0, 1)) }}
                                            </div>
                                            <span class="fw-semibold text-body lh-sm small">{{ $item->nama_petugas }}</span>
                                        </div>
                                    </td>
                                    <td class="py-2 small text-body-secondary">{{ $item->email }}</td>
                                    <td class="py-2 small text-body-secondary">{{ $item->no_hp }}</td>
                                    <td class="text-center py-2 px-1">
                                        @if($item->status_aktif)
                                            <span class="sanita-badge bg-success-subtle text-success">Aktif</span>
                                        @else
                                            <span class="sanita-badge bg-secondary-subtle text-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td class="text-center py-2 px-1">
                                        <div class="d-flex justify-content-center gap-1">
                                            <button type="button" class="btn btn-sm p-1d5 border-0 bg-transparent btn-outline-secondary" data-coreui-toggle="modal" data-coreui-target="#editPetugasModal{{ $item->id }}" title="Edit">
                                                <svg class="adaptive-icon" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9zM162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                                            </button>
                                            <form action="{{ route('petugas.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm p-1d5 border-0 bg-transparent btn-outline-danger" title="Hapus">
                                                    <svg style="width: 14px; height: 14px; color: var(--bs-danger);" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320H112zm280 0v32h24a24 24 0 0 0 0-48H160a24 24 0 0 0 0 48h24v-32H80v-32h352v32z"/></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                
                                <!-- Modal Edit Petugas -->
                                <div class="modal fade" id="editPetugasModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
                                      <div class="modal-header border-bottom-0 pb-0">
                                        <h5 class="modal-title sanita-text-green fw-bold">Edit Petugas</h5>
                                        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="{{ route('petugas.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body text-start">
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold sanita-text-green mb-1">Nama Petugas</label>
                                                <input type="text" name="nama_petugas" class="form-control form-control-sm bg-adaptive-input" value="{{ $item->nama_petugas }}" required style="border-radius: 6px; padding: 0.4rem 0.75rem;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold sanita-text-green mb-1">Email</label>
                                                <input type="email" name="email" class="form-control form-control-sm bg-adaptive-input" value="{{ $item->email }}" required style="border-radius: 6px; padding: 0.4rem 0.75rem;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold sanita-text-green mb-1">No. HP</label>
                                                <input type="text" name="no_hp" class="form-control form-control-sm bg-adaptive-input" value="{{ $item->no_hp }}" required style="border-radius: 6px; padding: 0.4rem 0.75rem;">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-bold sanita-text-green mb-1">Status</label>
                                                <select name="status_aktif" class="form-select form-select-sm bg-adaptive-input" required style="border-radius: 6px; padding: 0.4rem 2rem 0.4rem 0.75rem;">
                                                    <option value="1" {{ $item->status_aktif ? 'selected' : '' }}>Aktif</option>
                                                    <option value="0" {{ !$item->status_aktif ? 'selected' : '' }}>Nonaktif</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-top-0 pt-0">
                                            <button type="button" class="btn btn-outline-secondary btn-sm fw-bold" data-coreui-dismiss="modal" style="border-radius: 6px; padding: 0.4rem 1rem;">Batal</button>
                                            <button type="submit" class="btn sanita-btn-green btn-sm fw-bold shadow-sm" style="padding: 0.4rem 1rem;">Simpan Perubahan</button>
                                        </div>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">
                                        <div class="d-flex flex-column align-items-center justify-content-center py-3">
                                            <p class="text-body-secondary mb-0" style="font-size: 0.85rem;">Belum ada data petugas</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-3 border-top pt-2 pagination-box" style="border-color: var(--cui-border-color, var(--bs-border-color)) !important;">
                        <div class="extra-small-desc">Menampilkan {{ $petugas->firstItem() ?? 0 }}-{{ $petugas->lastItem() ?? 0 }} dari {{ $petugas->total() }} data</div>
                        <div class="mb-0 shadow-sm custom-pagination">
                            {{ $petugas->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            <div class="card sanita-card shadow-sm h-100">
                <div class="card-body p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0 text-body" style="font-size: 0.9rem;">Jadwal Petugas</h6>
                        <div class="d-flex align-items-center gap-2">
                            <div class="btn-group btn-group-sm shadow-sm" style="border-radius: 6px; overflow: hidden;">
                                <button type="button" class="btn bg-adaptive-input px-2">
                                    <svg class="adaptive-icon-secondary" style="width: 10px; height: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M358.626 256 217.966 396.55l-22.626-22.626L313.386 256 195.34 138.076l22.626-22.626z" transform="scale(-1, 1) translate(-512, 0)"/></svg>
                                </button>
                                <div class="d-flex align-items-center px-2 bg-adaptive-input text-body">
                                    <span class="fw-semibold small lh-1">22 Mei 2025</span>
                                </div>
                                <button type="button" class="btn bg-adaptive-input px-2">
                                    <svg class="adaptive-icon-secondary" style="width: 10px; height: 10px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M294.034 396.55 153.374 256l140.66-140.55 22.627 22.626L198.614 256l118.046 117.924z" transform="scale(-1, 1) translate(-512, 0)"/></svg>
                                </button>
                            </div>
                            <button class="btn btn-sm bg-adaptive-input fw-semibold shadow-sm px-3 py-1" style="font-size: 0.75rem;">Hari ini</button>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between mb-3 border-bottom pb-2 px-1 gap-1" style="border-color: var(--cui-border-color, var(--bs-border-color)) !important;">
                        @foreach($weekDays as $day)
                        <div class="text-center flex-fill" style="cursor: pointer;">
                            <div class="mb-1 extra-small-desc" style="color: {{ $day['isToday'] ? 'var(--cui-success, #1b5e3a)' : 'var(--cui-body-color-secondary)' }}; font-weight: {{ $day['isToday'] ? '700' : '500' }};">{{ $day['label'] }}</div>
                            <div class="fw-bold sanita-day-box {{ $day['isToday'] ? 'sanita-day-active' : '' }}">
                                {{ $day['date'] }}
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="extra-small-desc text-body fw-medium mb-3 mt-1">Jadwal {{ $today->translatedFormat('l, d F Y') }}</div>

                    <div class="table-responsive schedule-list-box" style="min-height: 250px;">
                        <table class="table table-sm table-borderless table-hover sanita-table align-middle mb-0">
                            <thead>
                                <tr class="border-bottom" style="border-color: var(--cui-border-color, var(--bs-border-color)) !important;">
                                    <th class="py-2 text-success">Petugas</th>
                                    <th class="py-2 text-success">Waktu / Tugas</th>
                                    <th class="py-2 text-end text-success">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($schedules as $schedule)
                                <tr>
                                    <td class="py-1d5 pe-2" width="40%">
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-2 shadow-sm" style="width: 24px; height: 24px; font-size: 0.65rem;">
                                                {{ strtoupper(substr($schedule[0], 0, 1)) }}
                                            </div>
                                            <div class="lh-sm">
                                                <span class="fw-semibold text-body small">{{ $schedule[0] }}</span>
                                                <div class="extra-small-desc lh-1">{{ $schedule[1] }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-1d5 small">
                                        <div class="fw-medium text-body">{{ $schedule[2] }}</div>
                                        <div class="extra-small-desc lh-1">{{ $schedule[3] }}</div>
                                    </td>
                                    <td class="py-1d5 text-end">
                                        <span class="sanita-badge {{ $schedule[5] }} {{ $schedule[6] }}">{{ $schedule[4] }}</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">
                                        <p class="text-body-secondary mb-0" style="font-size: 0.8rem;">Belum ada jadwal hari ini</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-3 pt-2 text-center">
                        <a href="{{ url('/jadwal-petugas') }}" class="btn sanita-btn-outline-green fw-semibold px-4 py-1d5" style="font-size: 0.8rem;">Lihat Jadwal Bulan Ini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Petugas -->
<div class="modal fade" id="addPetugasModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title sanita-text-green fw-bold">Tambah Petugas</h5>
        <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('petugas.store') }}" method="POST">
        @csrf
        <div class="modal-body text-start">
            <div class="mb-3">
                <label class="form-label small fw-bold sanita-text-green mb-1">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control form-control-sm bg-adaptive-input" placeholder="Nama Lengkap" required style="border-radius: 6px; padding: 0.4rem 0.75rem;">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold sanita-text-green mb-1">Email</label>
                <input type="email" name="email" class="form-control form-control-sm bg-adaptive-input" placeholder="contoh@sanitacheck.id" required style="border-radius: 6px; padding: 0.4rem 0.75rem;">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold sanita-text-green mb-1">No. HP</label>
                <input type="text" name="no_hp" class="form-control form-control-sm bg-adaptive-input" placeholder="08123456789" required style="border-radius: 6px; padding: 0.4rem 0.75rem;">
            </div>
            <div class="mb-3">
                <label class="form-label small fw-bold sanita-text-green mb-1">Status</label>
                <select name="status_aktif" class="form-select form-select-sm bg-adaptive-input" required style="border-radius: 6px; padding: 0.4rem 2rem 0.4rem 0.75rem;">
                    <option value="1" selected>Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>
        </div>
        <div class="modal-footer border-top-0 pt-0">
            <button type="button" class="btn btn-outline-secondary btn-sm fw-bold" data-coreui-dismiss="modal" style="border-radius: 6px; padding: 0.4rem 1rem;">Batal</button>
            <button type="submit" class="btn sanita-btn-green btn-sm fw-bold shadow-sm" style="padding: 0.4rem 1rem;">Simpan Data</button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
    .custom-pagination .pagination {
        margin-bottom: 0;
        --bs-pagination-padding-x: 0.5rem;
        --bs-pagination-padding-y: 0.25rem;
        --bs-pagination-font-size: 0.875rem;
    }
</style>
@endsection