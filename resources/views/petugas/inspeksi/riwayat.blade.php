@extends('layouts.petugas')

@section('title', 'Riwayat Inspeksi | SanitaCheck')

@section('content')
<h5 class="fw-bold mb-3"><i class="bi bi-clock-history text-success me-2"></i>Riwayat Inspeksi</h5>

@if($riwayatInspeksi->isEmpty())
<div class="card border-0 shadow-sm text-center py-5" style="border-radius: 15px;">
    <div class="card-body">
        <i class="bi bi-inbox text-secondary" style="font-size: 3rem;"></i>
        <p class="text-secondary mt-2 mb-0">Belum ada riwayat inspeksi.</p>
    </div>
</div>
@else
<div class="d-flex flex-column gap-2">
    @foreach($riwayatInspeksi as $inspeksi)
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <div class="fw-bold text-dark">{{ $inspeksi->fasilitas->nama_fasilitas ?? '-' }}</div>
                    <div class="text-secondary small"><i class="bi bi-geo-alt me-1"></i>{{ $inspeksi->fasilitas->lokasi ?? '-' }}</div>
                </div>
                <span class="badge 
                    {{ $inspeksi->kondisi_kebersihan === 'baik' ? 'bg-success' : '' }}
                    {{ $inspeksi->kondisi_kebersihan === 'cukup' ? 'bg-warning text-dark' : '' }}
                    {{ $inspeksi->kondisi_kebersihan === 'buruk' ? 'bg-danger' : '' }}
                ">{{ ucfirst($inspeksi->kondisi_kebersihan) }}</span>
            </div>
            <hr class="my-2">
            <div class="d-flex justify-content-between small text-secondary">
                <span><i class="bi bi-calendar3 me-1"></i>{{ $inspeksi->created_at->format('d M Y, H:i') }}</span>
                <span class="fw-semibold text-capitalize">{{ $inspeksi->status_tindak_lanjut }}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
