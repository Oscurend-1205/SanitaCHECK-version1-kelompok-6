@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<div class="mb-3">
    <h3 class="fw-bold mb-1" style="color: #1b5e3a;">Pengaturan</h3>
    <p class="text-body-secondary" style="font-size: 0.9rem;">Konfigurasi aplikasi dan pengaturan sistem</p>
</div>

<div class="row">
    <!-- Left Column -->
    <div class="col-lg-6">
        <!-- Informasi Instansi -->
        <div class="card border shadow-sm mb-4" style="border-radius: 12px;">
            <div class="card-body p-4">
                <h6 class="card-title text-success fw-bold mb-3">Informasi Instansi</h6>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-body-secondary mb-1">Nama Instansi</label>
                    <input type="text" class="form-control" value="Dinas Kebersihan dan Lingkungan Hidup" style="border-radius: 8px; font-size: 0.875rem;">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-body-secondary mb-1">Alamat</label>
                    <textarea class="form-control" rows="2" style="border-radius: 8px; font-size: 0.875rem;">JL. Kebersihan No. 45, Kota Sejahtera, Provinsi Jawa Barat, 40123</textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label small fw-semibold text-body-secondary mb-1">Telepon</label>
                        <input type="text" class="form-control" value="(022) 1234 5678" style="border-radius: 8px; font-size: 0.875rem;">
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold text-body-secondary mb-1">Email</label>
                        <input type="email" class="form-control" value="info@dklh.go.id" style="border-radius: 8px; font-size: 0.875rem;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-body-secondary mb-1">Website</label>
                    <input type="url" class="form-control" value="https://dklh.go.id" style="border-radius: 8px; font-size: 0.875rem;">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-body-secondary mb-1">Logo Instansi</label>
                    <div class="d-flex align-items-center p-3 border rounded" style="border-radius: 8px; border-style: dashed !important; background-color: var(--cui-tertiary-bg); cursor: pointer;">
                        <div class="bg-light d-flex justify-content-center align-items-center me-3" style="width: 60px; height: 60px; border-radius: 8px;">
                            <svg style="width: 30px; height: 30px;" class="text-body-secondary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432Z"/></svg>
                        </div>
                        <div>
                            <div class="fw-semibold small">Klik untuk mengganti logo</div>
                            <div class="text-body-secondary" style="font-size: 0.75rem;">Format: PNG, JPG (max. 2MB)</div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success text-white fw-bold" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a;">Simpan Perubahan</button>
            </div>
        </div>

        <!-- Pengaturan Notifikasi -->
        <div class="card border shadow-sm mb-4" style="border-radius: 12px;">
            <div class="card-body p-4">
                <h6 class="card-title text-success fw-bold mb-3">Pengaturan Notifikasi</h6>
                @foreach([
                    ['Notifikasi Inspeksi', 'Dapatkan notifikasi untuk inspeksi baru', true],
                    ['Notifikasi Tindak Lanjut', 'Pengingat untuk tindak lanjut yang perlu dilakukan', true],
                    ['Notifikasi Jadwal', 'Pengingat jadwal petugas dan inspeksi', true],
                    ['Notifikasi Laporan', 'Notifikasi saat laporan bulanan tersedia', true],
                    ['Notifikasi Sistem', 'Informasi penting dari sistem', true],
                ] as $notif)
                <div class="d-flex justify-content-between align-items-center py-3 {{ !$loop->last ? 'border-bottom' : '' }}">
                    <div>
                        <div class="fw-semibold small">{{ $notif[0] }}</div>
                        <div class="text-body-secondary" style="font-size: 0.75rem;">{{ $notif[1] }}</div>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" {{ $notif[2] ? 'checked' : '' }} style="cursor: pointer;">
                    </div>
                </div>
                @endforeach
                <div class="mt-3">
                    <button class="btn btn-success text-white fw-bold" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a;">Simpan Preferensi</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-lg-6">
        <!-- Pengaturan Aplikasi -->
        <div class="card border shadow-sm mb-4" style="border-radius: 12px;">
            <div class="card-body p-4">
                <h6 class="card-title text-success fw-bold mb-3">Pengaturan Aplikasi</h6>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-body-secondary mb-1">Nama Aplikasi</label>
                    <input type="text" class="form-control" value="SanitaCheck" style="border-radius: 8px; font-size: 0.875rem;">
                </div>
                <div class="mb-3">
                    <label class="form-label small fw-semibold text-body-secondary mb-1">Deskripsi Aplikasi</label>
                    <textarea class="form-control" rows="2" style="border-radius: 8px; font-size: 0.875rem;">Sistem Monitoring Sanitasi dan Kebersihan Fasilitas Umum</textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label small fw-semibold text-body-secondary mb-1">Tahun Anggaran</label>
                        <select class="form-select" style="border-radius: 8px; font-size: 0.875rem;">
                            <option selected>2025</option>
                            <option>2026</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold text-body-secondary mb-1">Zona Waktu</label>
                        <select class="form-select" style="border-radius: 8px; font-size: 0.875rem;">
                            <option selected>Asia/Jakarta (WIB)</option>
                            <option>Asia/Makassar (WITA)</option>
                            <option>Asia/Jayapura (WIT)</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label class="form-label small fw-semibold text-body-secondary mb-1">Format Tanggal</label>
                        <select class="form-select" style="border-radius: 8px; font-size: 0.875rem;">
                            <option selected>DD/MM/YYYY</option>
                            <option>MM/DD/YYYY</option>
                            <option>YYYY-MM-DD</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label class="form-label small fw-semibold text-body-secondary mb-1">Bahasa</label>
                        <select class="form-select" style="border-radius: 8px; font-size: 0.875rem;">
                            <option selected>Bahasa Indonesia</option>
                            <option>English</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success text-white fw-bold" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a;">Simpan Perubahan</button>
            </div>
        </div>

        <!-- Batas Waktu Tindak Lanjut -->
        <div class="card border shadow-sm mb-4" style="border-radius: 12px;">
            <div class="card-body p-4">
                <h6 class="card-title text-success fw-bold mb-3">Pengaturan Batas Waktu Tindak Lanjut</h6>
                <div class="table-responsive">
                    <table class="table table-borderless align-middle mb-0">
                        <thead style="border-bottom: 1px solid var(--cui-border-color);">
                            <tr>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Jenis Tindak Lanjut</th>
                                <th class="text-success py-2" style="font-size: 0.8rem;">Deskripsi</th>
                                <th class="text-center text-success py-2" style="font-size: 0.8rem;">Batas Waktu (Hari)</th>
                                <th class="text-center text-success py-2" style="font-size: 0.8rem;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach([
                                ['Perlu Dibersihkan', 'Fasilitas perlu dibersihkan', 3],
                                ['Perlu Perbaikan', 'Fasilitas perlu diperbaiki', 7],
                                ['Perlu Penggantian', 'Fasilitas perlu diganti', 14],
                                ['Lainnya', 'Tindak lanjut lainnya', 7],
                            ] as $item)
                            <tr>
                                <td class="small fw-semibold">{{ $item[0] }}</td>
                                <td class="text-body-secondary small">{{ $item[1] }}</td>
                                <td class="text-center">
                                    <input type="number" class="form-control form-control-sm text-center" value="{{ $item[2] }}" style="border-radius: 6px; width: 60px; margin: 0 auto;">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success text-white fw-bold" style="border-radius: 6px; background-color: #1b5e3a; border-color: #1b5e3a; font-size: 0.75rem;">Simpan</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <p class="text-body-secondary small mt-2 mb-0" style="font-size: 0.75rem;">Batas waktu dihitung sejak tanggal temuan inspeksi dibuat.</p>
            </div>
        </div>

        <!-- Tentang Aplikasi -->
        <div class="card border shadow-sm mb-4" style="border-radius: 12px;">
            <div class="card-body p-4">
                <h6 class="card-title text-success fw-bold mb-3">Tentang Aplikasi</h6>
                @foreach([
                    ['Versi Aplikasi', '1.0.0'],
                    ['Versi Database', '1.0.0'],
                    ['Dikembangkan oleh', 'Tim IT SanitaCheck'],
                    ['Kontak Support', 'support@sanitacheck.id'],
                    ['Hak Cipta', '© 2025 SanitaCheck. Semua hak dilindungi.'],
                ] as $info)
                <div class="d-flex justify-content-between align-items-center py-2 {{ !$loop->last ? 'border-bottom' : '' }}">
                    <span class="text-body-secondary small">{{ $info[0] }}</span>
                    <span class="fw-semibold small">{{ $info[1] }}</span>
                </div>
                @endforeach
                <div class="mt-3">
                    <button class="btn btn-outline-success fw-bold" style="border-radius: 6px; border-color: #1b5e3a; color: #1b5e3a;">Periksa Pembaruan</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
