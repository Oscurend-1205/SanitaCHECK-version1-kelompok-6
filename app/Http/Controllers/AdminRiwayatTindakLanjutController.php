<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeksi;

class AdminRiwayatTindakLanjutController extends Controller
{
    public function index()
    {
        // Inspeksi yang kondisinya perlu ditindaklanjuti dan SUDAH selesai
        $dataTindakLanjut = Inspeksi::with(['fasilitas', 'petugas'])
            ->where('status_tindak_lanjut', 'Selesai')
            ->latest('updated_at')
            ->paginate(10);
            
        $totalSelesai = Inspeksi::where('status_tindak_lanjut', 'Selesai')->count();
            
        return view('admin.riwayat-tindak-lanjut', compact('dataTindakLanjut', 'totalSelesai'));
    }
}
