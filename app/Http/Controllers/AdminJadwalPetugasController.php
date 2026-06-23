<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use App\Models\User;

class AdminJadwalPetugasController extends Controller
{
    public function index()
    {
        // Mocking jadwal data using Fasilitas since we don't have a specific Jadwal model
        $fasilitas = Fasilitas::all();
        $petugas = User::where('role', 'petugas')->get();
        $totalPetugas = User::where('role', 'petugas')->count();
        $aktifPetugas = $totalPetugas; // Mock
        $jadwalHariIni = $fasilitas->count(); // Mock
        $totalShift = $fasilitas->count() * 7; // Mock
        
        return view('admin.jadwal-petugas', compact('fasilitas', 'petugas', 'totalPetugas', 'aktifPetugas', 'jadwalHariIni', 'totalShift'));
    }
}
