@extends('layouts.admin')

@section('title', 'Jadwal Petugas')

@section('content')
<div class="mb-3">
    <div class="d-flex align-items-center gap-2 mb-1">
        <h3 class="fw-bold mb-0" style="color: #1b5e3a;">Jadwal Petugas</h3>
    </div>
    <div class="d-flex align-items-center text-body-secondary small">
        <span>Dashboard</span>
        <span class="mx-2">/</span>
        <span>Jadwal Petugas</span>
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
                        <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm-80-224c0-17.67 14.33-32 32-32s32 14.33 32 32-14.33 32-32 32-32-14.33-32-32zm96 0c0-17.67 14.33-32 32-32s32 14.33 32 32-14.33 32-32 32-32-14.33-32-32z"/>
                    </svg>
                </div>
                <div>
                    <div class="fw-bold" style="font-size: 0.8rem; color: #333;">Total Shift Minggu Ini</div>
                    <div class="fw-bold" style="font-size: 1.5rem; line-height: 1; color: #333;">56</div>
                    <div class="text-body-secondary" style="font-size: 0.7rem;">Seluruh shift terjadwal</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Filters Row -->
<div class="d-flex flex-column flex-md-row gap-3 mb-4 align-items-end">
    <div class="flex-grow-1">
        <label class="form-label text-body-secondary small fw-semibold mb-1">Tanggal</label>
        <div class="input-group shadow-sm" style="border-radius: 6px; overflow: hidden; border: 1px solid var(--cui-border-color);">
            <input type="text" class="form-control border-0" value="19/05/2025 - 25/05/2025" style="padding: 0.5rem 0.75rem; font-size: 0.85rem; box-shadow: none;">
            <span class="input-group-text bg-white border-0" style="padding: 0.5rem 0.75rem;">
                <svg class="icon text-body-secondary" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M400 464H48V104h192V72H16v424h416V272h-32z"/><path fill="currentColor" d="M304 16v32h137.373L188.687 300.687l22.626 22.626L464 70.627V208h32V16z"/></svg>
            </span>
        </div>
    </div>
    <div class="flex-grow-1">
        <label class="form-label text-body-secondary small fw-semibold mb-1">Fasilitas</label>
        <select class="form-select shadow-sm" style="border-radius: 6px; padding: 0.5rem 0.75rem; font-size: 0.85rem; border-color: var(--cui-border-color);">
            <option selected>Semua Fasilitas</option>
            <option value="1">Toilet</option>
            <option value="2">Kantin</option>
        </select>
    </div>
    <div class="flex-grow-1">
        <label class="form-label text-body-secondary small fw-semibold mb-1">Petugas</label>
        <select class="form-select shadow-sm" style="border-radius: 6px; padding: 0.5rem 0.75rem; font-size: 0.85rem; border-color: var(--cui-border-color);">
            <option selected>Semua Petugas</option>
            <option value="1">Budi Santoso</option>
            <option value="2">Siti Aisyah</option>
        </select>
    </div>
    <div class="flex-grow-1">
        <label class="form-label text-body-secondary small fw-semibold mb-1">Shift</label>
        <select class="form-select shadow-sm" style="border-radius: 6px; padding: 0.5rem 0.75rem; font-size: 0.85rem; border-color: var(--cui-border-color);">
            <option selected>Semua Shift</option>
            <option value="1">Pagi</option>
            <option value="2">Siang</option>
            <option value="3">Malam</option>
        </select>
    </div>
    <div class="d-flex gap-2">
        <button class="btn btn-success text-white fw-semibold shadow-sm d-flex align-items-center" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.85rem; padding: 0.5rem 1rem;">
            + Tambah Jadwal
        </button>
        <button class="btn btn-outline-success fw-semibold shadow-sm d-flex align-items-center" style="border-radius: 6px; color: #1b5e3a; border-color: #1b5e3a; background-color: transparent; font-size: 0.85rem; padding: 0.5rem 1rem;">
            <svg class="icon me-2" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M384 272v176H128V272H64v208a16 16 0 0 0 16 16h352a16 16 0 0 0 16-16V272z"/><path fill="currentColor" d="M240 330.686L135.059 225.745 157.686 203.118 240 285.431V16h32v269.431l82.314-82.313 22.627 22.627L272 330.686a22.627 22.627 0 0 1-32 0z"/></svg>
            Export
        </button>
    </div>
</div>

<!-- Main Table Card -->
<div class="card border shadow-sm mb-4" style="border-radius: 12px;">
    <div class="card-body p-0">
        <div class="p-4 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold mb-0" style="color: #333; font-size: 1.1rem;">Jadwal Petugas</h5>
            <div class="btn-group shadow-sm" role="group" style="border-radius: 6px; overflow: hidden; border: 1px solid var(--cui-border-color);">
                <button type="button" class="btn btn-sm btn-light border-0 bg-white" style="padding: 0.3rem 0.6rem;">
                    <svg style="width: 12px; height: 12px; color: #6c757d;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M358.626 256 217.966 396.55l-22.626-22.626L313.386 256 195.34 138.076l22.626-22.626z" transform="scale(-1, 1) translate(-512, 0)"/></svg>
                </button>
                <div class="d-flex align-items-center px-3 bg-white" style="border-left: 1px solid var(--cui-border-color); border-right: 1px solid var(--cui-border-color);">
                    <span class="fw-semibold" style="font-size: 0.8rem; color: #333;">Minggu Ini</span>
                </div>
                <button type="button" class="btn btn-sm btn-light border-0 bg-white" style="padding: 0.3rem 0.6rem;">
                    <svg style="width: 12px; height: 12px; color: #6c757d;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M294.034 396.55 153.374 256l140.66-140.55 22.627 22.626L198.614 256l118.046 117.924z" transform="scale(-1, 1) translate(-512, 0)"/></svg>
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-borderless table-hover align-middle mb-0">
                <thead style="border-bottom: 1px solid var(--cui-border-color); background-color: transparent;">
                    <tr>
                        <th class="text-body-secondary py-3 px-3 fw-semibold" style="font-size: 0.8rem; width: 40px;">No</th>
                        <th class="text-body-secondary py-3 fw-semibold" style="font-size: 0.8rem; min-width: 150px;">Petugas</th>
                        <th class="text-body-secondary py-3 fw-semibold" style="font-size: 0.8rem; min-width: 150px;">Fasilitas</th>
                        <th class="text-center py-3" style="min-width: 110px;">
                            <div class="fw-semibold" style="color: #333; font-size: 0.85rem;">Sen</div>
                            <div class="small text-body-secondary" style="font-size: 0.75rem;">19 Mei</div>
                        </th>
                        <th class="text-center py-3" style="min-width: 110px;">
                            <div class="fw-semibold" style="color: #333; font-size: 0.85rem;">Sel</div>
                            <div class="small text-body-secondary" style="font-size: 0.75rem;">20 Mei</div>
                        </th>
                        <th class="text-center py-3" style="min-width: 110px;">
                            <div class="fw-semibold" style="color: #333; font-size: 0.85rem;">Rab</div>
                            <div class="small text-body-secondary" style="font-size: 0.75rem;">21 Mei</div>
                        </th>
                        <th class="text-center py-3" style="min-width: 110px; background-color: rgba(40, 167, 69, 0.05); border-left: 1px solid rgba(40, 167, 69, 0.1); border-right: 1px solid rgba(40, 167, 69, 0.1);">
                            <div class="fw-bold" style="color: #1b5e3a; font-size: 0.85rem;">Kam</div>
                            <div class="small" style="color: #1b5e3a; font-size: 0.75rem;">22 Mei</div>
                        </th>
                        <th class="text-center py-3" style="min-width: 110px;">
                            <div class="fw-semibold" style="color: #333; font-size: 0.85rem;">Jum</div>
                            <div class="small text-body-secondary" style="font-size: 0.75rem;">23 Mei</div>
                        </th>
                        <th class="text-center py-3" style="min-width: 110px;">
                            <div class="fw-semibold" style="color: #333; font-size: 0.85rem;">Sab</div>
                            <div class="small text-body-secondary" style="font-size: 0.75rem;">24 Mei</div>
                        </th>
                        <th class="text-center py-3" style="min-width: 110px;">
                            <div class="fw-semibold" style="color: #333; font-size: 0.85rem;">Min</div>
                            <div class="small text-body-secondary" style="font-size: 0.75rem;">25 Mei</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach([
                        ['Budi Santoso', 'Toilet Lantai 2', 'Gedung A', '08:00 - 09:30', 'Inspeksi Rutin', true, true, true, true, true, false, false, '8.jpg'],
                        ['Siti Aisyah', 'Kantin Sehat', 'Gedung B', '09:30 - 11:00', 'Inspeksi Rutin', true, true, true, true, true, false, false, '9.jpg'],
                        ['Andi Wijaya', 'Ruang Tunggu', 'Gedung C', '11:00 - 12:30', 'Inspeksi Rutin', true, true, true, true, true, false, false, '1.jpg'],
                        ['Rina Marlina', 'Tempat Cuci Tangan', 'Halaman Depan', '13:00 - 14:30', 'Inspeksi Rutin', true, true, true, true, true, false, false, '2.jpg'],
                        ['Dewi Lestari', 'Toilet Perempuan', 'Gedung B', '14:30 - 16:00', 'Inspeksi Rutin', true, true, true, true, true, false, false, '3.jpg'],
                        ['Maya Putri', 'Ruang Kelas 1', 'Gedung D', '16:00 - 17:30', 'Inspeksi Rutin', true, true, true, true, true, false, false, '5.jpg'],
                        ['Fajar Nugroho', 'Tempat Cuci Tangan', 'Belakang', '18:00 - 19:00', 'Inspeksi Tambahan', true, true, true, true, true, false, false, '6.jpg'],
                        ['Rahmat Hidayat', 'Ruang Tunggu VIP', 'Gedung A', '19:00 - 20:30', 'Inspeksi Malam', true, true, true, true, true, false, false, '4.jpg'],
                    ] as $i => $row)
                    <tr style="border-bottom: 1px solid rgba(0,0,0,0.05);">
                        <td class="text-center text-body-secondary small py-3 px-3">{{ $i + 1 }}</td>
                        <td class="py-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-sm me-2">
                                    <img class="avatar-img" src="https://ui-avatars.com/api/?name={{ urlencode($row[0] ?? 'User') }}&background=random" alt="user" style="width: 28px; height: 28px; object-fit: cover;">
                                </div>
                                <div>
                                    <div class="small fw-semibold" style="color: #333; font-size: 0.8rem;">{{ $row[0] }}</div>
                                    <div class="text-body-secondary" style="font-size: 0.7rem;">Inspektor</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3">
                            <div class="small" style="color: #333; font-size: 0.8rem;">{{ $row[1] }}</div>
                            <div class="text-body-secondary" style="font-size: 0.7rem;">({{ $row[2] }})</div>
                        </td>
                        
                        <!-- Days -->
                        @for($d = 5; $d <= 11; $d++)
                        @if($d == 8) <!-- Thursday (Active Column) -->
                        <td class="text-center py-3" style="background-color: rgba(40, 167, 69, 0.05); border-left: 1px solid rgba(40, 167, 69, 0.1); border-right: 1px solid rgba(40, 167, 69, 0.1); cursor: pointer;">
                            @if($row[$d])
                            <div class="small" style="color: #1b5e3a; font-size: 0.75rem;">{{ $row[3] }}</div>
                            <div style="color: #28a745; font-size: 0.7rem;">{{ $row[4] }}</div>
                            @else
                            <div class="text-body-secondary">-</div>
                            @endif
                        </td>
                        @else
                        <td class="text-center py-3" style="cursor: pointer;">
                            @if($row[$d])
                            <div class="small" style="color: #333; font-size: 0.75rem;">{{ $row[3] }}</div>
                            <div class="text-body-secondary" style="font-size: 0.7rem;">{{ $row[4] }}</div>
                            @else
                            <div class="text-body-secondary">-</div>
                            @endif
                        </td>
                        @endif
                        @endfor
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="alert alert-info d-flex align-items-center shadow-sm" role="alert" style="border-radius: 8px; background-color: #f8fbff; border-color: #e6f0ff; color: #0056b3; font-size: 0.85rem; padding: 0.75rem 1rem;">
    <svg class="icon me-2 flex-shrink-0" style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path fill="currentColor" d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z"/>
    </svg>
    <div>
        Klik pada sel jadwal untuk mengedit atau melihat detail penugasan.
    </div>
</div>

@endsection