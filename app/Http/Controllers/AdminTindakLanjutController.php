<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeksi;

class AdminTindakLanjutController extends Controller
{
    public function index()
    {
        // Inspeksi yang kondisinya perlu ditindaklanjuti
        $tindakLanjutQuery = Inspeksi::with(['fasilitas', 'petugas'])
            ->where(function($q) {
                $q->where('kondisi_kebersihan', '!=', 'Baik')
                  ->orWhere('ketersediaan_air', 'Tidak Ada')
                  ->orWhere('ketersediaan_sabun', 'Tidak Ada')
                  ->orWhere('bau_tidak_sedap', 'Ya');
            });
            
        $dataTindakLanjut = $tindakLanjutQuery->latest('tanggal_inspeksi')->paginate(10);
        
        $total = $tindakLanjutQuery->count();
        $selesai = (clone $tindakLanjutQuery)->where('status_tindak_lanjut', 'Selesai')->count();
        $dalamProses = (clone $tindakLanjutQuery)->where('status_tindak_lanjut', 'Dalam Proses')->count();
        $belumDikerjakan = (clone $tindakLanjutQuery)->whereNotIn('status_tindak_lanjut', ['Selesai', 'Dalam Proses'])->count();
        
        $perluDibersihkan = (clone $tindakLanjutQuery)->where('kondisi_kebersihan', 'Cukup')->count();
        $perluPerbaikan = (clone $tindakLanjutQuery)->where('kondisi_kebersihan', 'Buruk')->count();
        
        $selesaiP = $total > 0 ? round(($selesai / $total) * 100, 1) : 0;
        $dalamProsesP = $total > 0 ? round(($dalamProses / $total) * 100, 1) : 0;
        $belumDikerjakanP = $total > 0 ? round(($belumDikerjakan / $total) * 100, 1) : 0;
        
        $kpis = [
            ['Perlu Tindak Lanjut', $total, 'Inspeksi', 'warning'],
            ['Perlu Dibersihkan', $perluDibersihkan, 'Fasilitas', 'warning'],
            ['Perlu Perbaikan', $perluPerbaikan, 'Fasilitas', 'danger'],
            ['Selesai', $selesai, 'Tindak Lanjut', 'success'],
            ['Dalam Proses', $dalamProses, 'Tindak Lanjut', 'primary'],
        ];

        return view('admin.tindak-lanjut', compact(
            'dataTindakLanjut', 'kpis',
            'selesai', 'dalamProses', 'belumDikerjakan', 'total',
            'selesaiP', 'dalamProsesP', 'belumDikerjakanP'
        ));
    }
    
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_tindak_lanjut' => 'required|string'
        ]);
        
        $inspeksi = Inspeksi::findOrFail($id);
        $inspeksi->update([
            'status_tindak_lanjut' => $request->status_tindak_lanjut
        ]);
        
        return redirect()->back()->with('success', 'Status tindak lanjut berhasil diperbarui.');
    }
}
