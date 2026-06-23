@extends('layouts.admin')

@section('title', 'Fasilitas Umum')

@section('content')
<div class="mb-2 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-0" style="color: #1b5e3a;">Fasilitas Umum</h4>
        <p class="text-body-secondary mb-0 small">Fasilitas Umum ITSK RS dr. Soepraoen Kesdam V/BRW Malang</p>
    </div>
</div>

<div class="card mb-2 border shadow-sm" style="border-radius: 10px;">
    <div class="card-body p-2">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
            <div class="d-flex flex-wrap gap-2">
                <div class="d-flex align-items-center p-1d5 border rounded bg-adaptive-stat" style="border-color: var(--cui-border-color, var(--bs-border-color)) !important; border-radius: 8px !important; min-width: 170px;">
                    <div class="bg-success text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 6px; width: 36px; height: 36px; min-width: 36px;">
                        <svg class="icon" style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z"/>
                            <path fill="currentColor" d="M136 296h224v32H136zm0 80h224v32H136z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-success fw-bold lh-sm small">Total Fasilitas</div>
                        <div class="fw-bold text-success" style="font-size: 1.25rem; line-height: 1;">25</div>
                        <div class="text-body-secondary extra-small">Semua fasilitas aktif</div>
                    </div>
                </div>
                
                <div class="d-flex align-items-center p-1d5 border rounded bg-adaptive-stat" style="border-color: var(--cui-border-color, var(--bs-border-color)) !important; border-radius: 8px !important; min-width: 170px;">
                    <div class="bg-primary text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 6px; width: 36px; height: 36px; min-width: 36px;">
                        <svg class="icon" style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm108.25 138.29-134.4 160a16 16 0 0 1-23.35 1.14l-80-80a16 16 0 0 1 22.62-22.62l67.24 67.24 123.36-146.85a16 16 0 0 1 24.53 21.09Z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-success fw-bold lh-sm small">Aktif</div>
                        <div class="fw-bold text-success" style="font-size: 1.25rem; line-height: 1;">23</div>
                        <div class="text-body-secondary extra-small">Fasilitas Aktif</div>
                    </div>
                </div>
                
                <div class="d-flex align-items-center p-1d5 border rounded bg-adaptive-stat" style="border-color: var(--cui-border-color, var(--bs-border-color)) !important; border-radius: 8px !important; min-width: 170px;">
                    <div class="bg-warning text-white me-2 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 6px; width: 36px; height: 36px; min-width: 36px;">
                        <svg class="icon" style="width: 18px; height: 18px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm-32 272a16 16 0 0 1-32 0V192a16 16 0 0 1 32 0Zm96 0a16 16 0 0 1-32 0V192a16 16 0 0 1 32 0Z" />
                        </svg>
                    </div>
                    <div>
                        <div class="text-success fw-bold lh-sm small">Tidak Aktif</div>
                        <div class="fw-bold text-success" style="font-size: 1.25rem; line-height: 1;">2</div>
                        <div class="text-body-secondary extra-small">Fasilitas Tidak Aktif</div>
                    </div>
                </div>
            </div>
            
            <div class="ms-md-auto align-self-center">
                <button class="btn btn-success text-white fw-bold shadow-sm py-1d5 px-3" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.8rem;">
                    + Tambah Jadwal
                </button>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end mb-2 gap-2">
    <div class="flex-grow-1" style="max-width: 350px;">
        <div class="input-group shadow-sm" style="border-radius: 6px; overflow: hidden;">
            <input type="text" class="form-control border-end-0 bg-adaptive-input text-body" placeholder="Cari fasilitas, lokasi, PJ..." style="padding: 0.35rem 0.75rem; font-size: 0.8rem;">
            <span class="input-group-text border-start-0 bg-adaptive-input text-body" style="cursor: pointer; padding: 0.35rem 0.75rem;">
                <svg class="icon text-body-secondary" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.72 113.6-13.67 10.33 85.08 20.35 204.3c8.11 96.53 87.57 173.3 184.2 178.6 44.59 2.45 86.82-10.42 121.7-33.82l119.5 119.5c15.6 15.6 40.9 15.6 56.5 0l-1.95-24.9zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z"/>
                </svg>
            </span>
        </div>
    </div>
    
    <div class="d-flex gap-2 align-items-end flex-wrap w-100 w-md-auto justify-content-md-end">
        <div>
            <label class="form-label text-success fw-bold mb-0" style="font-size: 0.7rem;">Jenis Fasilitas</label>
            <select class="form-select shadow-sm bg-adaptive-input text-body" style="border-radius: 6px; min-width: 110px; padding: 0.35rem 1.5rem 0.35rem 0.5rem; font-size: 0.8rem;">
                <option selected>Semua Jenis</option>
                <option value="1">Toilet</option>
                <option value="2">Kantin</option>
                <option value="3">Wastafel</option>
            </select>
        </div>
        <div>
            <label class="form-label text-success fw-bold mb-0" style="font-size: 0.7rem;">Status</label>
            <select class="form-select shadow-sm bg-adaptive-input text-body" style="border-radius: 6px; min-width: 110px; padding: 0.35rem 1.5rem 0.35rem 0.5rem; font-size: 0.8rem;">
                <option selected>Semua Status</option>
                <option value="1">Aktif</option>
                <option value="2">Tidak Aktif</option>
            </select>
        </div>
        <div>
            <button class="btn btn-outline-success d-flex align-items-center fw-bold shadow-sm" style="border-radius: 6px; padding: 0.35rem 0.75rem; border-color: #1b5e3a; color: #1b5e3a; background-color: transparent; font-size: 0.8rem;">
                <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor" d="M256 48A208 208 0 1 0 464 256 208 208 0 0 0 256 48zm0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432z" />
                    <path fill="currentColor" d="M344.4 167.6a16 16 0 0 0-22.6 0l-91.8 91.8L190.6 220a16 16 0 1 0-22.6 22.6l50.6 50.6a16 16 0 0 0 22.6 0l103.2-103.2a16 16 0 0 0 0-22.4z" />
                </svg>
                RESET
            </button>
        </div>
    </div>
</div>

<div class="card border shadow-sm" style="border-radius: 10px; min-height: 200px;">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-borderless table-hover align-middle mb-0" style="font-size: 0.825rem;">
                <thead style="border-bottom: 1px solid var(--cui-border-color, var(--bs-border-color)); background-color: var(--cui-tertiary-bg, var(--bs-tertiary-bg));">
                    <tr>
                        <th class="text-center text-success py-1d5 px-2" style="width: 50px;">No</th>
                        <th class="text-success py-1d5">Nama Fasilitas</th>
                        <th class="text-success py-1d5">Jenis Fasilitas</th>
                        <th class="text-success py-1d5">Lokasi</th>
                        <th class="text-success py-1d5">Penanggung Jawab</th>
                        <th class="text-center text-success py-1d5" style="width: 100px;">Status</th>
                        <th class="text-center text-success py-1d5 px-2" style="width: 90px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($fasilitas as $i => $item)
                    <tr>
                        <td class="text-center text-body-secondary small py-2">{{ $i + 1 }}</td>
                        <td class="small py-2 fw-semibold">{{ $item->nama_fasilitas }}</td>
                        <td class="text-body-secondary small py-2">{{ ucfirst($item->jenis_fasilitas) }}</td>
                        <td class="text-body-secondary small py-2">{{ $item->lokasi }}</td>
                        <td class="text-body-secondary small py-2">{{ $item->penanggung_jawab }}</td>
                        <td class="text-center py-2">
                            <span class="badge {{ $item->status_aktif ? 'bg-success' : 'bg-warning text-dark' }}">{{ $item->status_aktif ? 'Aktif' : 'Tidak Aktif' }}</span>
                        </td>
                        <td class="text-center py-2">
                            <div class="d-flex justify-content-center gap-1">
                                <button class="btn btn-sm btn-outline-warning border-0 p-1" title="Edit">
                                    <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9M162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                                </button>
                                <button class="btn btn-sm btn-outline-danger border-0 p-1" title="Hapus">
                                    <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320H112zm280 0v32h24a24 24 0 0 0 0-48H160a24 24 0 0 0 0 48h24v-32H80v-32h352v32z"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            <div class="d-flex flex-column align-items-center justify-content-center py-3">
                                <p class="text-body-secondary mb-0" style="font-size: 0.85rem;">Belum ada data fasilitas yang ditambahkan</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center mt-2">
    <div class="text-body-secondary" style="font-size: 0.7rem;">Menampilkan 0 sampai 0 dari 0 Data</div>
    <ul class="pagination pagination-sm mb-0 shadow-sm">
        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item active"><a class="page-link bg-success border-success" href="#">1</a></li>
        <li class="page-item"><a class="page-link text-success" href="#">2</a></li>
        <li class="page-item"><a class="page-link text-success" href="#">&raquo;</a></li>
    </ul>
</div>

<style>
    .py-1d5 {
        padding-top: 0.35rem !important;
        padding-bottom: 0.35rem !important;
    }
    .p-1d5 {
        padding: 0.35rem !important;
    }
    .extra-small {
        font-size: 0.65rem !important;
    }
    
    /* Adaptif Latar Belakang Komponen Statistik */
    .bg-adaptive-stat {
        background-color: var(--cui-card-bg, var(--bs-card-bg, transparent)) !important;
    }

    /* Adaptif Latar Belakang Input / Select Halaman */
    .bg-adaptive-input {
        background-color: var(--cui-body-bg, var(--bs-body-bg, #ffffff)) !important;
        border-color: var(--cui-border-color, var(--bs-border-color)) !important;
    }
    
    /* Force teks pencarian mengikuti tema aktif */
    .bg-adaptive-input::placeholder {
        color: var(--cui-body-color, var(--bs-body-color)) !important;
        opacity: 0.6;
    }
</style>
@endsection