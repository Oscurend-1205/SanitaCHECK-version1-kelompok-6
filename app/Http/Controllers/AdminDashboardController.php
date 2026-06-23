<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\Inspeksi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalFasilitas = Fasilitas::count();
        $inspeksiHariIni = Inspeksi::whereDate('tanggal_inspeksi', Carbon::today())->count();
        
        // Dapatkan fasilitas dengan status terakhir
        $fasilitas = Fasilitas::with(['inspeksis' => function($q) {
            $q->latest('tanggal_inspeksi')->limit(1);
        }])->get();

        $statusCount = [
            'bersih' => 0,
            'perlu_perhatian' => 0,
            'perlu_dibersihkan' => 0,
            'buruk' => 0
        ];

        $fasilitasBurukCount = 0;
        $fasilitasTindakLanjut = [];

        foreach ($fasilitas as $item) {
            $lastInspeksi = $item->inspeksis->first();
            if ($lastInspeksi) {
                $kebersihan = strtolower($lastInspeksi->kondisi_kebersihan);
                $status = 'perlu_perhatian';

                if ($kebersihan == 'baik' && $lastInspeksi->ketersediaan_air == 'Ada' && $lastInspeksi->ketersediaan_sabun == 'Ada' && $lastInspeksi->bau_tidak_sedap == 'Tidak') {
                    $status = 'bersih';
                } elseif ($kebersihan == 'buruk' || $lastInspeksi->ketersediaan_air == 'Tidak Ada' || $lastInspeksi->bau_tidak_sedap == 'Ya') {
                    $status = 'buruk';
                    $fasilitasBurukCount++;
                } elseif ($kebersihan == 'cukup') {
                    $status = 'perlu_dibersihkan';
                } else {
                    $status = 'perlu_perhatian';
                }

                $statusCount[$status]++;

                if ($status != 'bersih') {
                    $item->status_badge = $status;
                    $fasilitasTindakLanjut[] = $item;
                }
            }
        }

        // Ambil 5 teratas
        $fasilitasTindakLanjut = array_slice($fasilitasTindakLanjut, 0, 5);

        // Grafik Line: 7 hari terakhir
        $last7Days = [];
        $inspeksiCounts = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $last7Days[] = $date->format('d M');
            $inspeksiCounts[] = Inspeksi::whereDate('tanggal_inspeksi', $date)->count();
        }

        // Fasilitas dengan masalah terbanyak (Buruk atau Cukup)
        $masalahTerbanyak = Inspeksi::select('fasilitas_id', DB::raw('count(*) as total'))
            ->whereIn('kondisi_kebersihan', ['Buruk', 'Cukup'])
            ->groupBy('fasilitas_id')
            ->orderBy('total', 'desc')
            ->limit(4)
            ->with('fasilitas')
            ->get();

        return view('admin.dashboard', compact(
            'totalFasilitas',
            'inspeksiHariIni',
            'fasilitasBurukCount',
            'statusCount',
            'fasilitasTindakLanjut',
            'last7Days',
            'inspeksiCounts',
            'masalahTerbanyak'
        ));
    }
}
