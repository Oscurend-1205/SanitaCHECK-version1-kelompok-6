@extends('layouts.petugas')

@section('title', 'Dashboard Petugas | SanitaCheck')

@section('content')
<div class="text-center py-4">
    <div class="mb-3">
        <i class="bi bi-shield-check text-success" style="font-size: 3rem;"></i>
    </div>
    <h4 class="fw-bold text-dark">Selamat Datang, {{ Auth::user()->name }}!</h4>
    <p class="text-secondary">Panel monitoring inspeksi sanitasi kamu.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-6">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-body text-center p-3">
                <div class="d-flex justify-content-center align-items-center rounded-circle bg-success bg-opacity-10 mx-auto mb-2" style="width: 50px; height: 50px;">
                    <i class="bi bi-calendar2-check text-success fs-4"></i>
                </div>
                <div class="fw-bold fs-3 text-dark">{{ $jadwalHariIni }}</div>
                <div class="text-secondary small">Jadwal Hari Ini</div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card border-0 shadow-sm" style="border-radius: 15px;">
            <div class="card-body text-center p-3">
                <div class="d-flex justify-content-center align-items-center rounded-circle bg-primary bg-opacity-10 mx-auto mb-2" style="width: 50px; height: 50px;">
                    <i class="bi bi-clipboard-check text-primary fs-4"></i>
                </div>
                <div class="fw-bold fs-3 text-dark">{{ $inspeksiSelesai }}</div>
                <div class="text-secondary small">Total Inspeksi</div>
            </div>
        </div>
    </div>
</div>

<div class="card border-0 shadow-sm" style="border-radius: 15px;">
    <div class="card-body p-3 text-center">
        <p class="text-secondary mb-0 small">
            <i class="bi bi-info-circle me-1"></i> Pilih menu <strong>Jadwal</strong> di bawah untuk mulai inspeksi.
        </p>
    </div>
</div>
@endsection
