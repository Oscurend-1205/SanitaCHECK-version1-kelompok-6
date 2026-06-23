@extends('layouts.petugas')

@section('title', 'Jadwal Tugas | SanitaCheck')

@section('content')
<h5 class="fw-bold mb-3"><i class="bi bi-calendar2-check text-success me-2"></i>Jadwal Tugas Inspeksi</h5>

@if($fasilitasDitugaskan->isEmpty())
<div class="card border-0 shadow-sm text-center py-5" style="border-radius: 15px;">
    <div class="card-body">
        <i class="bi bi-calendar-x text-secondary" style="font-size: 3rem;"></i>
        <p class="text-secondary mt-2 mb-0">Belum ada jadwal tugas saat ini.</p>
    </div>
</div>
@else
<div class="d-flex flex-column gap-2">
    @foreach($fasilitasDitugaskan as $jadwal)
    <div class="card border-0 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-3 d-flex justify-content-between align-items-center">
            <div>
                <div class="fw-bold text-dark">{{ $jadwal->fasilitas->nama_fasilitas ?? '-' }}</div>
                <div class="text-secondary small"><i class="bi bi-geo-alt me-1"></i>{{ $jadwal->fasilitas->lokasi ?? '-' }}</div>
            </div>
            <a href="{{ route('petugas.inspeksi.create', $jadwal->fasilitas_id) }}" class="btn btn-success btn-sm fw-semibold" style="border-radius: 8px;">
                <i class="bi bi-pencil-square"></i> Inspeksi
            </a>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
