<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::latest()->paginate(7);
        $totalPetugas = Petugas::count();
        $aktifPetugas = Petugas::where('status_aktif', true)->count();
        $jadwalHariIni = \App\Models\Fasilitas::whereNotNull('penanggung_jawab')->count();
        $inspeksiHariIni = \App\Models\Inspeksi::whereDate('tanggal_inspeksi', \Carbon\Carbon::today())->count();

        // Mock schedule data for the view
        $schedules = [
            ['Budi Santoso', 'Petugas Area', 'Toilet Lantai 2', '08:00 - 09:30', 'Selesai', 'bg-success-subtle', 'text-success'],
            ['Siti Aisyah', 'Petugas Area', 'Kantin Sehat', '09:30 - 11:00', 'Berlangsung', 'bg-primary-subtle', 'text-primary'],
            ['Andi Wijaya', 'Petugas Area', 'Ruang Tunggu', '11:00 - 12:30', 'Menunggu', 'bg-warning-subtle', 'text-warning'],
        ];

        return view('admin.petugas', compact('petugas', 'totalPetugas', 'aktifPetugas', 'jadwalHariIni', 'inspeksiHariIni', 'schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email',
            'no_hp' => 'required|string|max:20',
            'status_aktif' => 'required|boolean',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect()->back()->with('success', 'Data petugas berhasil ditambahkan.');
    }

    public function updateById(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email' => 'required|email|unique:petugas,email,' . $id,
            'no_hp' => 'required|string|max:20',
            'status_aktif' => 'required|boolean',
        ]);

        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect()->back()->with('success', 'Data petugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->back()->with('success', 'Data petugas berhasil dihapus.');
    }
}
