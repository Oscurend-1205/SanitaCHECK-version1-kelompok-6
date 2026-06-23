<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeksi;
use App\Models\Fasilitas;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminLaporanController extends Controller
{
    public function index()
    {
        $totalInspeksi = Inspeksi::count();
        $kondisiBaik = Inspeksi::where('kondisi_kebersihan', 'Baik')->count();
        $kondisiCukup = Inspeksi::where('kondisi_kebersihan', 'Cukup')->count();
        $kondisiBuruk = Inspeksi::where('kondisi_kebersihan', 'Buruk')->count();
        $tindakLanjut = Inspeksi::whereIn('kondisi_kebersihan', ['Buruk', 'Cukup'])->count();
        
        $baikP = $totalInspeksi > 0 ? round(($kondisiBaik / $totalInspeksi) * 100) : 0;
        $cukupP = $totalInspeksi > 0 ? round(($kondisiCukup / $totalInspeksi) * 100) : 0;
        $burukP = $totalInspeksi > 0 ? round(($kondisiBuruk / $totalInspeksi) * 100) : 0;
        $tindakLanjutP = $totalInspeksi > 0 ? round(($tindakLanjut / $totalInspeksi) * 100) : 0;

        $kpis = [
            ['Total Inspeksi', $totalInspeksi, 'Semua inspeksi', 'success', 'M334.627 16H48v480h424V153.373ZM440 166.627V168H320V48h1.373ZM80 464V48h208v152h152v264Z'],
            ['Kondisi Baik', $kondisiBaik, $baikP . '% dari total inspeksi', 'success', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm108.25 138.29-134.4 160a16 16 0 0 1-23.35 1.14l-80-80a16 16 0 0 1 22.62-22.62l67.24 67.24 123.36-146.85a16 16 0 0 1 24.53 21.09Z'],
            ['Kondisi Cukup', $kondisiCukup, $cukupP . '% dari total inspeksi', 'warning', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48Zm96 224H160a16 16 0 0 1 0-32h192a16 16 0 0 1 0 32Z'],
            ['Kondisi Buruk', $kondisiBuruk, $burukP . '% dari total inspeksi', 'danger', 'M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48m0 384A176 176 0 1 1 432 256 176 176 0 0 1 256 432Z'],
            ['Perlu Tindak Lanjut', $tindakLanjut, $tindakLanjutP . '% dari total inspeksi', 'warning', 'M494 198.671a40.54 40.54 0 0 0-32.174-27.592l-115.909-18.837-53.732-104.414a40.7 40.7 0 0 0-72.37 0l-53.732 104.414-115.907 18.837a40.7 40.7 0 0 0-22.364 68.827l82.7 83.368-17.9 116.055a40.672 40.672 0 0 0 58.548 42.538L256 428.977l104.843 52.89a40.69 40.69 0 0 0 58.548-42.538l-17.9-116.055 82.7-83.368A40.54 40.54 0 0 0 494 198.671'],
            ['Rata-rata Skor', '80', '/ 100 (Baik)', 'primary', ''],
        ];

        // Tren Inspeksi (Chart Data) - 6 bulan terakhir
        $trendLabels = [];
        $trendData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i);
            $trendLabels[] = $month->format('M Y');
            $trendData[] = Inspeksi::whereYear('tanggal_inspeksi', $month->year)
                                    ->whereMonth('tanggal_inspeksi', $month->month)
                                    ->count();
        }

        // Data Fasilitas Rekap
        $fasilitasList = Fasilitas::with(['inspeksis'])->get();
        $rekapFasilitas = [];
        foreach ($fasilitasList as $f) {
            $tIns = $f->inspeksis->count();
            if ($tIns > 0) {
                $b = $f->inspeksis->where('kondisi_kebersihan', 'Baik')->count();
                $c = $f->inspeksis->where('kondisi_kebersihan', 'Cukup')->count();
                $bu = $f->inspeksis->where('kondisi_kebersihan', 'Buruk')->count();
                $skor = $tIns > 0 ? round((($b * 100) + ($c * 60) + ($bu * 20)) / $tIns) : 0;
                
                $statusBadge = 'success';
                $statusText = 'Baik';
                if ($skor < 50) { $statusBadge = 'danger'; $statusText = 'Buruk'; }
                elseif ($skor < 80) { $statusBadge = 'warning'; $statusText = 'Cukup'; }

                $rekapFasilitas[] = [
                    $f->nama_fasilitas,
                    $f->lokasi,
                    $tIns,
                    $b,
                    $c,
                    $bu,
                    $skor,
                    $statusBadge,
                    $statusText
                ];
            }
        }

        return view('admin.laporan', compact(
            'kpis',
            'trendLabels',
            'trendData',
            'baikP', 'cukupP', 'burukP', 'tindakLanjutP',
            'kondisiBaik', 'kondisiCukup', 'kondisiBuruk', 'tindakLanjut',
            'rekapFasilitas'
        ));
    }
}
