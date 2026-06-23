@extends('layouts.petugas')

@section('title', 'Form Inspeksi | SanitaCheck')

@push('styles')
<style>
    .card-form {
        border-radius: 15px;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        background: white;
    }
    
    .section-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: var(--sanita-green);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 1rem;
        border-bottom: 2px solid var(--sanita-green-light);
        padding-bottom: 0.5rem;
    }

    /* Custom Radio Cards untuk jempol besar (Mobile Friendly) */
    .radio-card-input {
        display: none;
    }
    
    .radio-card-label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 1rem 0.5rem;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.2s ease;
        height: 100%;
        background-color: white;
        text-align: center;
        font-weight: 600;
        font-size: 0.85rem;
        color: #6c757d;
    }
    
    .radio-card-label i {
        font-size: 1.8rem;
        margin-bottom: 8px;
    }

    .radio-card-input:checked + .radio-card-label.kondisi-baik {
        border-color: #198754;
        background-color: #e8f5e9;
        color: #198754;
    }
    
    .radio-card-input:checked + .radio-card-label.kondisi-cukup {
        border-color: #ffc107;
        background-color: #fff8e1;
        color: #ffc107;
    }
    
    .radio-card-input:checked + .radio-card-label.kondisi-buruk {
        border-color: #dc3545;
        background-color: #ffebee;
        color: #dc3545;
    }

    /* Custom Switch Toggle Besar */
    .form-switch .form-check-input {
        width: 3.5rem;
        height: 1.75rem;
        cursor: pointer;
    }
    .form-switch .form-check-input:checked {
        background-color: var(--sanita-green);
        border-color: var(--sanita-green);
    }
    .form-switch .form-check-label {
        padding-left: 0.5rem;
        padding-top: 0.2rem;
        font-weight: 600;
        font-size: 0.95rem;
        cursor: pointer;
    }

    /* Button Utama */
    .btn-submit {
        background-color: var(--sanita-green);
        color: white;
        font-weight: 700;
        padding: 0.8rem;
        border-radius: 10px;
        font-size: 1rem;
        width: 100%;
        box-shadow: 0 4px 6px rgba(27, 94, 58, 0.2);
    }
    
    .btn-submit:hover, .btn-submit:active {
        background-color: var(--sanita-green-hover);
        color: white;
    }
</style>
@endpush

@section('content')
<div class="d-flex align-items-center mb-3">
    <a href="{{ url()->previous() }}" class="text-decoration-none text-secondary me-2">
        <i class="bi bi-arrow-left-circle-fill fs-3"></i>
    </a>
    <h5 class="mb-0 fw-bold text-dark">Form Inspeksi Sanitasi</h5>
</div>

<form action="{{ route('petugas.inspeksi.store') }}" method="POST">
    @csrf
    <input type="hidden" name="fasilitas_id" value="{{ $fasilitas->id }}">

    <!-- Info Fasilitas (Readonly) -->
    <div class="card card-form p-3 mb-3">
        <div class="section-title">Informasi Fasilitas</div>
        
        <div class="mb-2">
            <label class="form-label small text-secondary fw-semibold mb-1">Nama Fasilitas</label>
            <input type="text" class="form-control bg-light" value="{{ $fasilitas->nama_fasilitas }}" readonly>
        </div>
        <div>
            <label class="form-label small text-secondary fw-semibold mb-1">Lokasi</label>
            <input type="text" class="form-control bg-light" value="{{ $fasilitas->lokasi }}" readonly>
        </div>
    </div>

    <!-- Parameter Penilaian -->
    <div class="card card-form p-3 mb-3">
        <div class="section-title">Parameter Penilaian</div>

        <!-- 1. Kondisi Kebersihan -->
        <div class="mb-4">
            <label class="form-label fw-bold d-block mb-2">Kondisi Kebersihan <span class="text-danger">*</span></label>
            <div class="row g-2">
                <div class="col-4">
                    <input type="radio" name="kondisi_kebersihan" id="kondisi_baik" value="baik" class="radio-card-input" {{ old('kondisi_kebersihan') == 'baik' ? 'checked' : '' }}>
                    <label class="radio-card-label kondisi-baik" for="kondisi_baik">
                        <i class="bi bi-emoji-smile"></i>
                        Baik
                    </label>
                </div>
                <div class="col-4">
                    <input type="radio" name="kondisi_kebersihan" id="kondisi_cukup" value="cukup" class="radio-card-input" {{ old('kondisi_kebersihan') == 'cukup' ? 'checked' : '' }}>
                    <label class="radio-card-label kondisi-cukup" for="kondisi_cukup">
                        <i class="bi bi-emoji-neutral"></i>
                        Cukup
                    </label>
                </div>
                <div class="col-4">
                    <input type="radio" name="kondisi_kebersihan" id="kondisi_buruk" value="buruk" class="radio-card-input" {{ old('kondisi_kebersihan') == 'buruk' ? 'checked' : '' }}>
                    <label class="radio-card-label kondisi-buruk" for="kondisi_buruk">
                        <i class="bi bi-emoji-frown"></i>
                        Buruk
                    </label>
                </div>
            </div>
            @error('kondisi_kebersihan')
                <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <!-- 2. Ketersediaan Air -->
        <div class="mb-4 d-flex justify-content-between align-items-center bg-light p-3 rounded-3">
            <div>
                <label class="fw-bold mb-0 d-block">Ketersediaan Air <span class="text-danger">*</span></label>
                <small class="text-secondary">Apakah air menyala normal?</small>
            </div>
            <div class="form-check form-switch mb-0">
                <input type="hidden" name="ketersediaan_air" value="0">
                <input class="form-check-input" type="checkbox" role="switch" id="ketersediaan_air" name="ketersediaan_air" value="1" {{ old('ketersediaan_air', '0') == '1' ? 'checked' : '' }}>
            </div>
        </div>
        @error('ketersediaan_air')
            <div class="text-danger small mt-1" style="margin-top:-15px; margin-bottom:15px;"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
        @enderror

        <!-- 3. Ketersediaan Sabun -->
        <div class="mb-4 d-flex justify-content-between align-items-center bg-light p-3 rounded-3">
            <div>
                <label class="fw-bold mb-0 d-block">Ketersediaan Sabun <span class="text-danger">*</span></label>
                <small class="text-secondary">Apakah sabun cuci tangan terisi?</small>
            </div>
            <div class="form-check form-switch mb-0">
                <input type="hidden" name="ketersediaan_sabun" value="0">
                <input class="form-check-input" type="checkbox" role="switch" id="ketersediaan_sabun" name="ketersediaan_sabun" value="1" {{ old('ketersediaan_sabun', '0') == '1' ? 'checked' : '' }}>
            </div>
        </div>
        @error('ketersediaan_sabun')
            <div class="text-danger small mt-1" style="margin-top:-15px; margin-bottom:15px;"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
        @enderror

        <!-- 4. Bau Tidak Sedap -->
        <div class="mb-2">
            <label class="form-label fw-bold d-block mb-2">Tercium Bau Tidak Sedap? <span class="text-danger">*</span></label>
            <div class="d-flex gap-3">
                <div class="form-check p-0 flex-fill">
                    <input type="radio" class="btn-check" name="bau_tidak_sedap" id="bau_ya" value="1" {{ old('bau_tidak_sedap') == '1' ? 'checked' : '' }}>
                    <label class="btn btn-outline-danger w-100 fw-semibold" for="bau_ya">Ya, Berbau</label>
                </div>
                <div class="form-check p-0 flex-fill">
                    <input type="radio" class="btn-check" name="bau_tidak_sedap" id="bau_tidak" value="0" {{ old('bau_tidak_sedap') == '0' ? 'checked' : '' }}>
                    <label class="btn btn-outline-success w-100 fw-semibold" for="bau_tidak">Tidak</label>
                </div>
            </div>
            @error('bau_tidak_sedap')
                <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Catatan & Tindak Lanjut -->
    <div class="card card-form p-3 mb-4">
        <div class="section-title">Kesimpulan</div>

        <div class="mb-3">
            <label class="form-label fw-bold">Catatan Temuan</label>
            <textarea name="catatan" class="form-control" rows="3" placeholder="Tuliskan temuan atau kerusakan jika ada..." style="border-radius: 8px;">{{ old('catatan') }}</textarea>
            @error('catatan')
                <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label fw-bold">Rekomendasi Tindak Lanjut <span class="text-danger">*</span></label>
            <select name="status_tindak_lanjut" class="form-select form-select-lg" style="font-size: 0.95rem; border-radius: 8px;">
                <option value="" selected disabled>-- Pilih Status --</option>
                <option value="aman" {{ old('status_tindak_lanjut') == 'aman' ? 'selected' : '' }}>Aman (Tidak perlu tindakan)</option>
                <option value="perlu dibersihkan" {{ old('status_tindak_lanjut') == 'perlu dibersihkan' ? 'selected' : '' }}>Perlu Dibersihkan Segera</option>
                <option value="perlu perbaikan" {{ old('status_tindak_lanjut') == 'perlu perbaikan' ? 'selected' : '' }}>Perlu Perbaikan Sarana</option>
            </select>
            @error('status_tindak_lanjut')
                <div class="text-danger small mt-1"><i class="bi bi-exclamation-circle"></i> {{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-submit">
            <i class="bi bi-send-check-fill me-1"></i> Kirim Laporan Inspeksi
        </button>
    </div>
</form>
@endsection
