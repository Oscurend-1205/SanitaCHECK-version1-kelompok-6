@extends('layouts.admin')

@section('title', 'Petugas')

@section('content')
<div class="mb-3">
    <div class="d-flex align-items-center gap-2 mb-1">
        <h3 class="fw-bold mb-0" style="color: #1b5e3a;">Petugas</h3>
    </div>
    <div class="d-flex align-items-center text-body-secondary small">
        <span>Dashboard</span>
        <span class="mx-2">/</span>
        <span>Petugas</span>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-success text-white me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 48px; height: 48px; background-color: #28a745 !important;">
                    <svg class="icon" style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M136.262 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04A144.3 144.3 0 0 1 93 277.207v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM135 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 135 139.635zM375 250.707a123.635 123.635 0 1 0-82.524 0 178.293 178.293 0 0 0-35.122 36.46 16 16 0 0 0 25.86 18.04 144.3 144.3 0 0 1 48.538-28v186.2a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16v-87.41h10v87.41a16 16 0 0 0 16 16h4a16 16 0 0 0 16-16V277.207a144.3 144.3 0 0 1 48.538 28 16 16 0 0 0 25.86-18.04 178.293 178.293 0 0 0-35.122-36.46zM375 139.635a59.635 59.635 0 1 1-59.635 59.635A59.7 59.7 0 0 1 375 139.635z"/>
                    </svg>
                </div>
                <div>
                    <div class="fw-bold" style="font-size: 0.8rem; color: #333;">Total Petugas</div>
                    <div class="fw-bold" style="font-size: 1.5rem; line-height: 1; color: #333;">12</div>
                    <div class="text-body-secondary" style="font-size: 0.7rem;">Semua petugas terdaftar</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-primary text-white me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 48px; height: 48px; background-color: #0d6efd !important;">
                    <svg class="icon" style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M336 256c-52.938 0-96-43.063-96-96s43.062-96 96-96 96 43.063 96 96-43.062 96-96 96m138.188-9.376c27.57-22.046 45.812-55.828 45.812-93.811C520 68.343 449.656-2 365.188-2 323.96-2 286.555 14.484 259.188 41.094c-19.39 18.78-32.844 43.39-37.375 70.906H192C85.961 112 0 197.961 0 304v160a16 16 0 0 0 16 16h480a16 16 0 0 0 16-16V304c0-38.875-11.688-75.063-31.812-105.376"/>
                    </svg>
                </div>
                <div>
                    <div class="fw-bold" style="font-size: 0.8rem; color: #333;">Petugas Aktif</div>
                    <div class="fw-bold" style="font-size: 1.5rem; line-height: 1; color: #333;">10</div>
                    <div class="text-body-secondary" style="font-size: 0.7rem;">Sedang bertugas</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-warning text-white me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 48px; height: 48px; background-color: #ffc107 !important;">
                    <svg class="icon" style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M400 464H48V104h192V72H16v424h416V272h-32z"/>
                        <path fill="currentColor" d="M304 16v32h137.373L188.687 300.687l22.626 22.626L464 70.627V208h32V16z"/>
                    </svg>
                </div>
                <div>
                    <div class="fw-bold" style="font-size: 0.8rem; color: #333;">Jadwal Hari Ini</div>
                    <div class="fw-bold" style="font-size: 1.5rem; line-height: 1; color: #333;">8</div>
                    <div class="text-body-secondary" style="font-size: 0.7rem;">Petugas dijadwalkan</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="text-white me-3 d-flex justify-content-center align-items-center shadow-sm" style="border-radius: 8px; width: 48px; height: 48px; background-color: #6f42c1 !important;">
                    <svg class="icon text-white" style="width: 24px; height: 24px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z"/>
                        <path fill="currentColor" d="M136 296h224v32H136zm0 80h224v32H136z"/>
                    </svg>
                </div>
                <div>
                    <div class="fw-bold" style="font-size: 0.8rem; color: #333;">Inspeksi Hari Ini</div>
                    <div class="fw-bold" style="font-size: 1.5rem; line-height: 1; color: #333;">6</div>
                    <div class="text-body-secondary" style="font-size: 0.7rem;">Inspeksi telah dilakukan</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Left Column: Data Seluruh Petugas -->
    <div class="col-xl-7 mb-4">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0" style="color: #333; font-size: 1.1rem;">Data Seluruh Petugas</h5>
                    <button class="btn btn-success text-white fw-semibold shadow-sm" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.85rem; padding: 0.4rem 1rem;">
                        + Tambah Petugas
                    </button>
                </div>

                <!-- Search & Filter -->
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-3 gap-2">
                    <div class="flex-grow-1" style="max-width: 300px;">
                        <div class="input-group shadow-sm" style="border-radius: 6px; overflow: hidden; border: 1px solid var(--cui-border-color);">
                            <input type="text" class="form-control border-0" placeholder="Cari nama, email, atau nomor hp..." style="padding: 0.5rem 0.75rem; font-size: 0.85rem; box-shadow: none;">
                            <span class="input-group-text bg-white border-0" style="cursor: pointer; padding: 0.5rem 0.75rem;">
                                <svg class="icon text-body-secondary" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.72 113.6-13.67 10.33 85.08 20.35 204.3c8.11 96.53 87.57 173.3 184.2 178.6 44.59 2.45 86.82-10.42 121.7-33.82l119.5 119.5c15.6 15.6 40.9 15.6 56.5 0l-1.95-24.9zM224 336c-70.7 0-128-57.3-128-128s57.3-128 128-128 128 57.3 128 128-57.3 128-128 128z"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="d-flex gap-2 align-items-center">
                        <div>
                            <select class="form-select shadow-sm" style="border-radius: 6px; min-width: 140px; padding: 0.5rem 0.75rem; font-size: 0.85rem; border-color: var(--cui-border-color);">
                                <option selected>Semua Status</option>
                                <option value="1">Aktif</option>
                                <option value="2">Nonaktif</option>
                            </select>
                        </div>
                        <button class="btn btn-outline-success d-flex align-items-center fw-semibold shadow-sm" style="border-radius: 6px; padding: 0.5rem 1rem; border-color: #1b5e3a; color: #1b5e3a; font-size: 0.85rem; background-color: transparent;">
                            <svg class="icon me-2" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="currentColor" d="M440.667 161.333l-44.373-44.373L256 257.253 115.707 116.96l-44.373 44.373L211.627 301.627 71.333 441.92l44.373 44.373L256 346.002l140.293 140.293 44.373-44.373L300.373 301.627z"/>
                                <path fill="currentColor" d="M256 48A208 208 0 1 0 464 256 208 208 0 0 0 256 48zm0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432z"/>
                            </svg>
                            Reset
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: transparent;">
                            <tr>
                                <th class="text-body-secondary py-3 px-2 fw-semibold" style="font-size: 0.8rem;">No</th>
                                <th class="text-body-secondary py-3 fw-semibold" style="font-size: 0.8rem;">Nama Petugas</th>
                                <th class="text-body-secondary py-3 fw-semibold" style="font-size: 0.8rem;">Email</th>
                                <th class="text-body-secondary py-3 fw-semibold" style="font-size: 0.8rem;">No. HP</th>
                                <th class="text-center text-body-secondary py-3 fw-semibold" style="font-size: 0.8rem;">Status</th>
                                <th class="text-center text-body-secondary py-3 px-2 fw-semibold" style="font-size: 0.8rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Budi Santoso', 'budi.santoso@sanitacheck.id', '0812-3456-7890', 'Aktif', '8.jpg'],
                                ['Siti Aisyah', 'siti.aisyah@sanitacheck.id', '0813-2345-6789', 'Aktif', '9.jpg'],
                                ['Andi Wijaya', 'andi.wijaya@sanitacheck.id', '0821-1111-2222', 'Aktif', '1.jpg'],
                                ['Rina Marlina', 'rina.marlina@sanitacheck.id', '0812-9876-5432', 'Aktif', '2.jpg'],
                                ['Dewi Lestari', 'dewi.lestari@sanitacheck.id', '0822-4567-8901', 'Aktif', '3.jpg'],
                                ['Rahmat Hidayat', 'rahmat.hidayat@sanitacheck.id', '0813-7654-3210', 'Nonaktif', '4.jpg'],
                                ['Maya Putri', 'maya.putri@sanitacheck.id', '0821-2345-5678', 'Aktif', '5.jpg'],
                                ['Fajar Nugroho', 'fajar.nugroho@sanitacheck.id', '0812-6543-2109', 'Aktif', '6.jpg'],
                                ['Agus Setiawan', 'agus.setiawan@sanitacheck.id', '0822-1122-3344', 'Nonaktif', '7.jpg'],
                                ['Lina Wati', 'lina.wati@sanitacheck.id', '0813-9090-1122', 'Aktif', '8.jpg'],
                            ] as $i => $petugas)
                            <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                                <td class="text-center text-body-secondary small py-3 px-2">{{ $i + 1 }}</td>
                                <td class="py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="{{ asset('assets/admin/dist/assets/img/avatars/' . $petugas[4]) }}" alt="user" style="width: 28px; height: 28px; object-fit: cover;">
                                        </div>
                                        <span class="small fw-semibold" style="color: #333;">{{ $petugas[0] }}</span>
                                    </div>
                                </td>
                                <td class="text-body-secondary small py-3">{{ $petugas[1] }}</td>
                                <td class="text-body-secondary small py-3">{{ $petugas[2] }}</td>
                                <td class="text-center py-3">
                                    @if($petugas[3] === 'Aktif')
                                        <span class="badge" style="font-size: 0.7rem; min-width: 60px; background-color: rgba(40, 167, 69, 0.1); color: #28a745; padding: 0.4em 0.6em;">Aktif</span>
                                    @else
                                        <span class="badge" style="font-size: 0.7rem; min-width: 60px; background-color: rgba(108, 117, 125, 0.1); color: #6c757d; padding: 0.4em 0.6em;">Nonaktif</span>
                                    @endif
                                </td>
                                <td class="text-center py-3 px-2">
                                    <div class="d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm p-1" title="Lihat" style="color: #6c757d; background-color: transparent; border: 1px solid #dee2e6; border-radius: 4px;">
                                            <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 112C146.45 112 49.28 182.18 16.37 253.24a16 16 0 0 0 0 13.52C49.28 337.82 146.45 408 256 408s206.72-70.18 239.63-141.24a16 16 0 0 0 0-13.52C462.72 182.18 365.55 112 256 112m0 256a112 112 0 1 1 112-112 112.126 112.126 0 0 1-112 112"/></svg>
                                        </button>
                                        <button class="btn btn-sm p-1" title="Edit" style="color: #28a745; background-color: transparent; border: 1px solid #28a745; border-radius: 4px;">
                                            <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9zM162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                                        </button>
                                        <button class="btn btn-sm p-1" title="Hapus" style="color: #dc3545; background-color: transparent; border: 1px solid #dc3545; border-radius: 4px;">
                                            <svg style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320H112zm280 0v32h24a24 24 0 0 0 0-48H160a24 24 0 0 0 0 48h24v-32H80v-32h352v32z"/></svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <div class="text-body-secondary" style="font-size: 0.8rem;">Menampilkan 1 sampai 10 dari 12 data</div>
                    <ul class="pagination pagination-sm mb-0 shadow-sm gap-1">
                        <li class="page-item disabled"><a class="page-link border-0 text-body-secondary bg-white" href="#" style="border-radius: 4px;">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link border-0 fw-bold" href="#" style="background-color: #1b5e3a; color: white; border-radius: 4px; width: 28px; text-align: center;">1</a></li>
                        <li class="page-item"><a class="page-link border-0 text-body-secondary bg-white" href="#" style="border-radius: 4px; width: 28px; text-align: center;">2</a></li>
                        <li class="page-item"><a class="page-link border-0 text-body-secondary bg-white" href="#" style="border-radius: 4px;">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column: Jadwal Petugas -->
    <div class="col-xl-5 mb-4">
        <div class="card border shadow-sm h-100" style="border-radius: 12px;">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title fw-bold mb-0" style="color: #333; font-size: 1.1rem;">Jadwal Petugas</h5>
                    <div class="d-flex align-items-center gap-1">
                        <div class="btn-group shadow-sm" role="group" style="border-radius: 6px; overflow: hidden; border: 1px solid var(--cui-border-color);">
                            <button type="button" class="btn btn-sm btn-light border-0 bg-white" style="padding: 0.3rem 0.6rem;">
                                <svg style="width: 12px; height: 12px; color: #6c757d;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M358.626 256 217.966 396.55l-22.626-22.626L313.386 256 195.34 138.076l22.626-22.626z" transform="scale(-1, 1) translate(-512, 0)"/></svg>
                            </button>
                            <div class="d-flex align-items-center px-2 bg-white" style="border-left: 1px solid var(--cui-border-color); border-right: 1px solid var(--cui-border-color);">
                                <svg class="me-1" style="width: 14px; height: 14px; color: #6c757d;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M400 464H48V104h192V72H16v424h416V272h-32z"/><path fill="currentColor" d="M304 16v32h137.373L188.687 300.687l22.626 22.626L464 70.627V208h32V16z"/></svg>
                                <span class="fw-semibold" style="font-size: 0.75rem; color: #333;">22 Mei 2025</span>
                            </div>
                            <button type="button" class="btn btn-sm btn-light border-0 bg-white" style="padding: 0.3rem 0.6rem;">
                                <svg style="width: 12px; height: 12px; color: #6c757d;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M294.034 396.55 153.374 256l140.66-140.55 22.627 22.626L198.614 256l118.046 117.924z" transform="scale(-1, 1) translate(-512, 0)"/></svg>
                            </button>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary fw-semibold shadow-sm ms-1" style="border-radius: 6px; padding: 0.3rem 0.6rem; font-size: 0.75rem; background-color: transparent; color: #333;">Hari ini</button>
                    </div>
                </div>

                <!-- Weekly Day Buttons -->
                <div class="d-flex justify-content-between mb-4 border-bottom pb-3">
                    @foreach([['Min','18',false],['Sen','19',false],['Sel','20',false],['Rab','21',false],['Kam','22',true],['Jum','23',false],['Sab','24',false]] as $day)
                    <div class="text-center" style="cursor: pointer;">
                        <div class="mb-1" style="font-size: 0.75rem; color: {{ $day[2] ? '#1b5e3a' : '#6c757d' }}; font-weight: {{ $day[2] ? 'bold' : 'normal' }};">{{ $day[0] }}</div>
                        <div class="d-flex justify-content-center align-items-center fw-bold" style="width: 32px; height: 32px; border-radius: 6px; font-size: 0.85rem; {{ $day[2] ? 'background-color: #1b5e3a; color: white; box-shadow: 0 2px 4px rgba(27,94,58,0.3);' : 'color: #333;' }}">
                            {{ $day[1] }}
                        </div>
                    </div>
                    @endforeach
                </div>

                <p class="fw-semibold mb-3" style="font-size: 0.85rem; color: #333;">Jadwal untuk Kamis, 22 Mei 2025</p>

                <!-- Schedule Table -->
                <div class="table-responsive">
                    <table class="table table-borderless table-hover align-middle mb-0">
                        <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: transparent;">
                            <tr>
                                <th class="text-body-secondary py-2 px-1 fw-semibold" style="font-size: 0.75rem;">Petugas</th>
                                <th class="text-body-secondary py-2 fw-semibold" style="font-size: 0.75rem;">Fasilitas</th>
                                <th class="text-body-secondary py-2 fw-semibold" style="font-size: 0.75rem;">Waktu</th>
                                <th class="text-body-secondary py-2 fw-semibold" style="font-size: 0.75rem;">Jenis Tugas</th>
                                <th class="text-body-secondary py-2 fw-semibold" style="font-size: 0.75rem;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Budi Santoso', 'Toilet Lantai 2', 'Gedung A', '08:00 - 09:30', 'Inspeksi Rutin', 'Selesai', 'success', 'rgba(40, 167, 69, 0.1)', '#28a745', '8.jpg'],
                                ['Siti Aisyah', 'Kantin Sehat', 'Gedung B', '09:30 - 11:00', 'Inspeksi Rutin', 'Proses', 'primary', 'rgba(13, 110, 253, 0.1)', '#0d6efd', '9.jpg'],
                                ['Andi Wijaya', 'Ruang Tunggu', 'Gedung C', '11:00 - 12:30', 'Inspeksi Rutin', 'Menunggu', 'warning', 'rgba(255, 193, 7, 0.1)', '#ffc107', '1.jpg'],
                                ['Rina Marlina', 'Tempat Cuci Tangan', 'Halaman Depan', '13:00 - 14:30', 'Inspeksi Rutin', 'Menunggu', 'warning', 'rgba(255, 193, 7, 0.1)', '#ffc107', '2.jpg'],
                                ['Dewi Lestari', 'Toilet Perempuan', 'Gedung B', '14:30 - 16:00', 'Inspeksi Rutin', 'Menunggu', 'warning', 'rgba(255, 193, 7, 0.1)', '#ffc107', '3.jpg'],
                                ['Maya Putri', 'Ruang Kelas 1', 'Gedung D', '16:00 - 17:30', 'Inspeksi Rutin', 'Menunggu', 'warning', 'rgba(255, 193, 7, 0.1)', '#ffc107', '5.jpg'],
                                ['Fajar Nugroho', 'Tempat Cuci Tangan Belakang', '', '18:00 - 19:00', 'Inspeksi Tambahan', 'Menunggu', 'warning', 'rgba(255, 193, 7, 0.1)', '#ffc107', '6.jpg'],
                                ['Rahmat Hidayat', 'Ruang Tunggu VIP', 'Gedung A', '19:00 - 20:30', 'Inspeksi Malam', 'Menunggu', 'warning', 'rgba(255, 193, 7, 0.1)', '#ffc107', '4.jpg'],
                            ] as $schedule)
                            <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                                <td class="py-3 px-1">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-2">
                                            <img class="avatar-img" src="{{ asset('assets/admin/dist/assets/img/avatars/' . $schedule[9]) }}" alt="user" style="width: 24px; height: 24px; object-fit: cover;">
                                        </div>
                                        <span class="small fw-semibold" style="color: #333; font-size: 0.75rem;">{{ $schedule[0] }}</span>
                                    </div>
                                </td>
                                <td class="py-3">
                                    <div class="small" style="color: #333; font-size: 0.75rem;">{{ $schedule[1] }}</div>
                                    @if($schedule[2])
                                        <div class="text-body-secondary" style="font-size: 0.7rem;">{{ $schedule[2] }}</div>
                                    @endif
                                </td>
                                <td class="text-body-secondary py-3" style="font-size: 0.75rem;">{{ $schedule[3] }}</td>
                                <td class="text-body-secondary py-3" style="font-size: 0.75rem;">{{ $schedule[4] }}</td>
                                <td class="py-3">
                                    <span class="badge" style="font-size: 0.65rem; min-width: 60px; background-color: {{ $schedule[7] }}; color: {{ $schedule[8] }}; padding: 0.4em 0.6em;">{{ $schedule[5] }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4 text-start">
                    <a href="{{ url('/jadwal-petugas') }}" class="btn fw-semibold px-4" style="border-radius: 6px; font-size: 0.85rem; border: 1px solid #1b5e3a; color: #1b5e3a; background-color: transparent;">Lihat Jadwal Bulan Ini</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection