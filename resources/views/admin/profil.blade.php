@extends('layouts.admin')

@section('title', 'Profil')

@section('content')
<div class="mb-3">
    <h3 class="fw-bold mb-1" style="color: #1b5e3a;">Profil</h3>
    <p class="text-body-secondary" style="font-size: 0.9rem;">Informasi profil dan pengaturan akun Anda</p>
</div>

<!-- Profile Summary Card -->
<div class="card border shadow-sm mb-4" style="border-radius: 12px;">
    <div class="card-body p-4">
        <div class="row align-items-center">
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <div class="mb-3">
                    <div class="rounded-circle overflow-hidden mx-auto border shadow-sm" style="width: 120px; height: 120px; border-width: 3px !important; border-color: #1b5e3a !important;">
                        <img src="{{ asset('assets/admin/dist/assets/img/avatars/8.jpg') }}" alt="Profile" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
                <h5 class="fw-bold mb-1" style="color: #1b5e3a;">Admin SanitaCheck</h5>
                <p class="text-body-secondary small mb-2">Administrator</p>
                <span class="badge bg-success rounded-pill px-3 py-2" style="font-size: 0.75rem;">
                    <span class="rounded-circle d-inline-block me-1" style="width: 8px; height: 8px; background-color: #fff;"></span>
                    Online
                </span>
                <div class="mt-3">
                    <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; border-color: #1b5e3a; color: #1b5e3a; font-size: 0.8rem;">
                        <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9M162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                        Ubah Foto Profil
                    </button>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 border rounded" style="border-radius: 8px;">
                            <div class="text-body-secondary small mb-1">Email</div>
                            <div class="fw-semibold">admin@sanitacheck.id</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded" style="border-radius: 8px;">
                            <div class="text-body-secondary small mb-1">No. Telepon</div>
                            <div class="fw-semibold">0812-3456-7890</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded" style="border-radius: 8px;">
                            <div class="text-body-secondary small mb-1">Lokasi Kerja</div>
                            <div class="fw-semibold">ITSK RS dr. Soepraoen Malang</div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 border rounded" style="border-radius: 8px;">
                            <div class="text-body-secondary small mb-1">Bergabung Sejak</div>
                            <div class="fw-semibold">12 Januari 2024</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Personal Information -->
<div class="card border shadow-sm mb-4" style="border-radius: 12px;">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h6 class="card-title text-success fw-bold mb-0">Informasi Pribadi</h6>
                <p class="text-body-secondary small mb-0">Data pribadi akun Anda</p>
            </div>
            <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 20px; border-color: #1b5e3a; color: #1b5e3a; font-size: 0.8rem;">
                <svg class="icon me-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M410.262 80.912l-29.5-29.5a55.154 55.154 0 0 0-77.95 0L68.25 285.974a24.006 24.006 0 0 0-7.029 16.97L48 416l113.056-13.221a24.006 24.006 0 0 0 16.97-7.029L410.262 158.812a55.154 55.154 0 0 0 0-77.9M162.971 371.029L112 368l3.029-50.971L316.941 115.088 364.912 163.059Z"/></svg>
                Edit Profil
            </button>
        </div>
        <div class="row g-3">
            @foreach([
                ['Nama Lengkap', 'Admin SanitaCheck'],
                ['NIP / ID Petugas', '24102001'],
                ['Jabatan', 'Administrator'],
                ['Tanggal Lahir', 'Jakarta, 15 Juni 1990'],
                ['Jenis Kelamin', 'Laki-laki'],
                ['Alamat', 'Jl. Soepraoen No. 1, Malang, Jawa Timur'],
                ['Email', 'admin@sanitacheck.id'],
                ['No. Telepon', '0812-3456-7890'],
                ['Lokasi Kerja', 'ITSK RS dr. Soepraoen Malang'],
                ['Bergabung Sejak', '12 Januari 2024'],
            ] as $field)
            <div class="col-sm-6">
                <div class="d-flex justify-content-between align-items-center p-2 border-bottom">
                    <span class="text-body-secondary small">{{ $field[0] }}</span>
                    <span class="fw-semibold small">{{ $field[1] }}</span>
                </div>
            </div>
            @endforeach
            <div class="col-sm-6">
                <div class="d-flex justify-content-between align-items-center p-2 border-bottom">
                    <span class="text-body-secondary small">Status Akun</span>
                    <span class="badge bg-success rounded-pill px-2 py-1" style="font-size: 0.7rem;">Aktif</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Account Security -->
<div class="card border shadow-sm mb-4" style="border-radius: 12px;">
    <div class="card-body p-4">
        <h6 class="card-title text-success fw-bold mb-1">Keamanan Akun</h6>
        <p class="text-body-secondary small mb-4">Kelola keamanan akun Anda</p>

        <div class="d-flex flex-column gap-3">
            <!-- Ubah Password -->
            <div class="d-flex justify-content-between align-items-center p-3 border rounded" style="border-radius: 8px;">
                <div class="d-flex align-items-center">
                    <div class="bg-success bg-opacity-10 text-success d-flex justify-content-center align-items-center me-3" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432Zm96-112a16 16 0 0 0-16-16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16Zm16-128a32 32 0 0 0-32-32H176a32 32 0 0 0-32 32v32a32 32 0 0 0 32 32h160a32 32 0 0 0 32-32Z"/></svg>
                    </div>
                    <div>
                        <div class="fw-semibold">Ubah Password</div>
                        <div class="text-body-secondary small">Perbarui password akun Anda secara berkala</div>
                    </div>
                </div>
                <button class="btn btn-outline-success btn-sm fw-bold" style="border-radius: 6px; border-color: #1b5e3a; color: #1b5e3a;">
                    Ubah Password
                    <svg class="icon ms-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M294.034 396.55 153.374 256l140.66-140.55 22.626 22.626L198.614 256l118.046 117.924z"/></svg>
                </button>
            </div>

            <!-- Perangkat Terdaftar -->
            <div class="d-flex justify-content-between align-items-center p-3 border rounded" style="border-radius: 8px;">
                <div class="d-flex align-items-center">
                    <div class="bg-primary bg-opacity-10 text-primary d-flex justify-content-center align-items-center me-3" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472 40H40a24.03 24.03 0 0 0-24 24v384a24.03 24.03 0 0 0 24 24h432a24.03 24.03 0 0 0 24-24V64a24.03 24.03 0 0 0-24-24m-8 400H48V72h416Z"/></svg>
                    </div>
                    <div>
                        <div class="fw-semibold">Perangkat Terdaftar</div>
                        <div class="text-body-secondary small">Kelola perangkat yang terhubung dengan akun Anda</div>
                    </div>
                </div>
                <button class="btn btn-outline-primary btn-sm fw-bold" style="border-radius: 6px;">
                    Lihat Perangkat
                    <svg class="icon ms-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M294.034 396.55 153.374 256l140.66-140.55 22.626 22.626L198.614 256l118.046 117.924z"/></svg>
                </button>
            </div>

            <!-- Aktivitas Terakhir -->
            <div class="d-flex justify-content-between align-items-center p-3 border rounded" style="border-radius: 8px;">
                <div class="d-flex align-items-center">
                    <div class="bg-warning bg-opacity-10 text-warning d-flex justify-content-center align-items-center me-3" style="border-radius: 8px; width: 42px; height: 42px; min-width: 42px;">
                        <svg class="icon" style="width: 20px; height: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 56A200 200 0 1 0 456 256 200.22 200.22 0 0 0 256 56Zm0 368A168 168 0 1 1 424 256 168.19 168.19 0 0 1 256 424Z"/><path fill="currentColor" d="M272 128h-32v128.008l96 55.4 16-27.71-80-46.17V128Z"/></svg>
                    </div>
                    <div>
                        <div class="fw-semibold">Aktivitas Terakhir</div>
                        <div class="text-body-secondary small">Lihat aktivitas terakhir pada akun Anda</div>
                    </div>
                </div>
                <button class="btn btn-outline-warning btn-sm fw-bold" style="border-radius: 6px;">
                    Lihat Aktivitas
                    <svg class="icon ms-1" style="width: 14px; height: 14px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M294.034 396.55 153.374 256l140.66-140.55 22.626 22.626L198.614 256l118.046 117.924z"/></svg>
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
