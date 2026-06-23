<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Fasilitas;
use App\Models\Inspeksi;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API Endpoint untuk daftar fasilitas beserta status terakhir
Route::get('/fasilitas', function () {
    $fasilitas = Fasilitas::with(['inspeksis' => function($q) {
        $q->latest('tanggal_inspeksi')->limit(1);
    }])->where('status_aktif', true)->get();

    $data = $fasilitas->map(function ($item) {
        $lastInspeksi = $item->inspeksis->first();
        
        $status = 'Belum Diinspeksi';
        if ($lastInspeksi) {
            $kebersihan = strtolower($lastInspeksi->kondisi_kebersihan);
            if ($kebersihan == 'baik' && $lastInspeksi->ketersediaan_air == 'Ada' && $lastInspeksi->ketersediaan_sabun == 'Ada' && $lastInspeksi->bau_tidak_sedap == 'Tidak') {
                $status = 'Bersih';
            } elseif ($kebersihan == 'buruk' || $lastInspeksi->ketersediaan_air == 'Tidak Ada' || $lastInspeksi->bau_tidak_sedap == 'Ya') {
                $status = 'Buruk';
            } else {
                $status = 'Perlu Perhatian';
            }
        }

        return [
            'id' => $item->id,
            'nama_fasilitas' => $item->nama_fasilitas,
            'jenis_fasilitas' => $item->jenis_fasilitas,
            'lokasi' => $item->lokasi,
            'status_sanitasi' => $status,
            'penanggung_jawab' => $item->penanggung_jawab
        ];
    });

    return response()->json(['data' => $data]);
});

// API Endpoint untuk detail fasilitas dan riwayat
Route::get('/fasilitas/{id}/inspeksi', function ($id) {
    $item = Fasilitas::find($id);
    if (!$item) {
        return response()->json(['error' => 'Not Found'], 404);
    }

    $riwayat = $item->inspeksis()->with('petugas')->latest('tanggal_inspeksi')->get();
    
    $lastInspeksi = $riwayat->first();
    
    $statusFasilitas = 'Belum Diinspeksi';
    if ($lastInspeksi) {
        $kebersihan = strtolower($lastInspeksi->kondisi_kebersihan);
        if ($kebersihan == 'baik' && $lastInspeksi->ketersediaan_air == 'Ada' && $lastInspeksi->ketersediaan_sabun == 'Ada' && $lastInspeksi->bau_tidak_sedap == 'Tidak') {
            $statusFasilitas = 'Bersih';
        } elseif ($kebersihan == 'buruk' || $lastInspeksi->ketersediaan_air == 'Tidak Ada' || $lastInspeksi->bau_tidak_sedap == 'Ya') {
            $statusFasilitas = 'Buruk';
        } else {
            $statusFasilitas = 'Perlu Perhatian';
        }
    }

    $inspeksiTerakhirData = [];
    if ($lastInspeksi) {
        $rekomendasi = 'Pertahankan kebersihan fasilitas.';
        if ($statusFasilitas == 'Buruk') $rekomendasi = 'Segera lakukan pembersihan menyeluruh dan perbaikan fasilitas.';
        elseif ($statusFasilitas == 'Perlu Perhatian') $rekomendasi = 'Perlu tindakan ringan seperti isi ulang sabun/tisu atau pel lantai.';

        $inspeksiTerakhirData = [
            'kebersihan' => $lastInspeksi->kondisi_kebersihan,
            'air' => $lastInspeksi->ketersediaan_air,
            'sabun' => $lastInspeksi->ketersediaan_sabun,
            'bau' => $lastInspeksi->bau_tidak_sedap == 'Ya' ? 'Bau' : 'Tidak Bau',
            'rekomendasi' => $rekomendasi
        ];
    } else {
        $inspeksiTerakhirData = [
            'kebersihan' => 'Belum Diinspeksi',
            'air' => 'Belum Diinspeksi',
            'sabun' => 'Belum Diinspeksi',
            'bau' => 'Belum Diinspeksi',
            'rekomendasi' => 'Segera lakukan inspeksi.'
        ];
    }

    $riwayatList = $riwayat->map(function ($r) {
        $kebersihan = strtolower($r->kondisi_kebersihan);
        $s = 'Perlu Perhatian';
        if ($kebersihan == 'baik' && $r->ketersediaan_air == 'Ada' && $r->ketersediaan_sabun == 'Ada' && $r->bau_tidak_sedap == 'Tidak') $s = 'Bersih';
        elseif ($kebersihan == 'buruk' || $r->ketersediaan_air == 'Tidak Ada' || $r->bau_tidak_sedap == 'Ya') $s = 'Buruk';

        return [
            'tanggal' => date('Y-m-d H:i', strtotime($r->tanggal_inspeksi)),
            'petugas' => $r->petugas ? $r->petugas->name : 'Anonim',
            'status' => $s,
            'catatan' => $r->catatan ?: '-'
        ];
    });

    return response()->json([
        'data' => [
            'fasilitas' => [
                'id' => $item->id,
                'nama_fasilitas' => $item->nama_fasilitas,
                'lokasi' => $item->lokasi,
                'status_sanitasi' => $statusFasilitas,
                'penanggung_jawab' => $item->penanggung_jawab
            ],
            'inspeksi_terakhir' => $inspeksiTerakhirData,
            'riwayat_inspeksi' => $riwayatList
        ]
    ]);
});
