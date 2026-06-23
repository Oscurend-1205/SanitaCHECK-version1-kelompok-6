@extends('layouts.admin')

@section('title', 'Profil')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <div>
        <h4 class="fw-bold mb-0" style="color: #1b5e3a;">Profil</h4>
        <p class="text-body-secondary mb-0 small">Informasi profil dan pengaturan akun Anda</p>
    </div>
</div>

<div class="row g-3">
    <div class="col-md-5">
        <div class="card border shadow-sm mb-3" style="border-radius: 10px;">
            <div class="card-body p-3 text-center">
                <div class="mb-2 position-relative d-inline-block">
                    <div class="rounded-circle overflow-hidden mx-auto border shadow-sm" style="width: 90px; height: 90px; border-width: 3px !important; border-color: #1b5e3a !important;">
                        <img src="https://ui-avatars.com/api/?name=Admin&background=1b5e3a&color=fff" alt="Profile" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
                <h5 class="fw-bold mb-0" style="color: #1b5e3a; font-size: 1.1rem;">Admin SanitaCheck</h5>
                <p class="text-body-secondary small mb-2">Administrator</p>
                
                <div class="d-flex justify-content-center gap-2 align-items-center">
                    <span class="badge bg-success rounded-pill px-2 py-1" style="font-size: 0.7rem;">
                        <span class="rounded-circle d-inline-block me-1" style="width: 6px; height: 6px; background-color: #fff;"></span>
                        Online
                    </span>
                    <button class="btn btn-outline-success btn-sm fw-bold py-1 px-2" style="border-radius: 20px; border-color: #1b5e3a; color: #1b5e3a; font-size: 0.75rem;">
                        Ubah Foto
                    </button>
                </div>
            </div>
        </div>

        <div class="card border shadow-sm" style="border-radius: 10px;">
            <div class="card-body p-3">
                <h6 class="card-title text-success fw-bold mb-2" style="font-size: 0.9rem;">Keamanan Akun</h6>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center p-2 border rounded shadow-sm bg-adaptive-card" style="border-radius: 8px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-success bg-opacity-10 text-success d-flex justify-content-center align-items-center me-2" style="border-radius: 6px; width: 32px; height: 32px; min-width: 32px;">
                                <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432Zm96-112a16 16 0 0 0-16-16H176a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h160a16 16 0 0 0 16-16Zm16-128a32 32 0 0 0-32-32H176a32 32 0 0 0-32 32v32a32 32 0 0 0 32 32h160a32 32 0 0 0 32-32Z"/></svg>
                            </div>
                            <span class="fw-semibold small text-adaptive-body">Ubah Password</span>
                        </div>
                        <button class="btn btn-outline-success btn-sm fw-bold py-0 px-2" style="border-radius: 20px; font-size: 0.7rem; height: 24px;">Ubah</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center p-2 border rounded shadow-sm bg-adaptive-card" style="border-radius: 8px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 text-primary d-flex justify-content-center align-items-center me-2" style="border-radius: 6px; width: 32px; height: 32px; min-width: 32px;">
                                <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M472 40H40a24.03 24.03 0 0 0-24 24v384a24.03 24.03 0 0 0 24 24h432a24.03 24.03 0 0 0 24-24V64a24.03 24.03 0 0 0-24-24m-8 400H48V72h416Z"/></svg>
                            </div>
                            <span class="fw-semibold small text-adaptive-body">Perangkat Terdaftar</span>
                        </div>
                        <button class="btn btn-outline-primary btn-sm fw-bold py-0 px-2" style="border-radius: 20px; font-size: 0.7rem; height: 24px;">Lihat</button>
                    </div>

                    <div class="d-flex justify-content-between align-items-center p-2 border rounded shadow-sm bg-adaptive-card" style="border-radius: 8px;">
                        <div class="d-flex align-items-center">
                            <div class="bg-warning bg-opacity-10 text-warning d-flex justify-content-center align-items-center me-2" style="border-radius: 6px; width: 32px; height: 32px; min-width: 32px;">
                                <svg style="width: 16px; height: 16px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 56A200 200 0 1 0 456 256 200.22 200.22 0 0 0 256 56Zm0 368A168 168 0 1 1 424 256 168.19 168.19 0 0 1 256 424Z"/><path fill="currentColor" d="M272 128h-32v128.008l96 55.4 16-27.71-80-46.17V128Z"/></svg>
                            </div>
                            <span class="fw-semibold small text-adaptive-body">Aktivitas Terakhir</span>
                        </div>
                        <button class="btn btn-outline-warning btn-sm fw-bold py-0 px-2" style="border-radius: 20px; font-size: 0.7rem; height: 24px;">Lihat</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card border shadow-sm h-100" style="border-radius: 10px;">
            <div class="card-body p-3">
                <div class="d-flex justify-content-between align-items-center mb-2 border-bottom pb-2">
                    <div>
                        <h6 class="card-title text-success fw-bold mb-0" style="font-size: 0.9rem;">Informasi Pribadi</h6>
                    </div>
                    <button class="btn btn-outline-success btn-sm fw-bold py-1 px-2" style="border-radius: 20px; border-color: #1b5e3a; color: #1b5e3a; font-size: 0.75rem;">
                        Edit Profil
                    </button>
                </div>
                
                <div class="row g-0">
                    @foreach([
                        ['Nama Lengkap', 'Admin SanitaCheck'],
                        ['NIP / ID Petugas', '24102001'],
                        ['Jabatan', 'Administrator'],
                        ['Tanggal Lahir', 'Jakarta, 15 Juni 1990'],
                        ['Jenis Kelamin', 'Laki-laki'],
                        ['Alamat', 'Jl. Soepraoen No. 1, Malang'],
                        ['Email', 'admin@sanitacheck.id'],
                        ['No. Telepon', '0812-3456-7890'],
                        ['Lokasi Kerja', 'ITSK RS dr. Soepraoen'],
                        ['Bergabung Sejak', '12 Januari 2024'],
                    ] as $field)
                    <div class="col-12 border-bottom py-1d5">
                        <div class="row align-items-center" style="font-size: 0.85rem;">
                            <div class="col-5 text-body-secondary">{{ $field[0] }}</div>
                            <div class="col-7 fw-semibold text-end text-sm-start">{{ $field[1] }}</div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-12 py-1d5">
                        <div class="row align-items-center" style="font-size: 0.85rem;">
                            <div class="col-5 text-body-secondary">Status Akun</div>
                            <div class="col-7 text-end text-sm-start">
                                <span class="badge bg-success rounded-pill px-2 py-0d5" style="font-size: 0.65rem;">Aktif</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .py-1d5 {
        padding-top: 0.35rem !important;
        padding-bottom: 0.35rem !important;
    }
    .py-0d5 {
        padding-top: 0.15rem !important;
        padding-bottom: 0.15rem !important;
    }
    
    /* Memaksa box mengambil warna background & teks asli bawaan komponen card tema */
    .bg-adaptive-card {
        background-color: var(--cui-card-bg, var(--bs-card-bg, rgba(255,255,255,0.05))) !important;
    }
    .text-adaptive-body {
        color: var(--cui-body-color, var(--bs-body-color, #inherit)) !important;
    }
</style>
@endsection