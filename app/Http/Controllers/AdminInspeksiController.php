<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeksi;
use App\Models\Fasilitas;
use App\Models\User;

class AdminInspeksiController extends Controller
{
    public function index()
    {
        $inspeksi = Inspeksi::with(['fasilitas', 'petugas'])->latest('tanggal_inspeksi')->paginate(10);
        $fasilitasList = Fasilitas::where('status_aktif', true)->get();
        $petugasList = User::where('role', 'petugas')->get();

        return view('admin.inspeksi', compact('inspeksi', 'fasilitasList', 'petugasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'kondisi_kebersihan' => 'required|string',
            'ketersediaan_air' => 'required|string',
            'ketersediaan_sabun' => 'required|string',
            'bau_tidak_sedap' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        Inspeksi::create([
            'fasilitas_id'         => $request->fasilitas_id,
            'petugas_id'           => auth()->id(),
            'tanggal_inspeksi'     => now(),
            'kondisi_kebersihan'   => strtolower($request->kondisi_kebersihan),
            'ketersediaan_air'     => $request->ketersediaan_air === 'Ada' ? 1 : ($request->ketersediaan_air === 'Tidak Ada' ? 0 : (int)$request->ketersediaan_air),
            'ketersediaan_sabun'   => $request->ketersediaan_sabun === 'Ada' ? 1 : ($request->ketersediaan_sabun === 'Tidak Ada' ? 0 : (int)$request->ketersediaan_sabun),
            'bau_tidak_sedap'      => $request->bau_tidak_sedap === 'Ya' ? 1 : ($request->bau_tidak_sedap === 'Tidak' ? 0 : (int)$request->bau_tidak_sedap),
            'catatan'              => $request->catatan,
            'status_tindak_lanjut' => 'aman',
        ]);

        return redirect()->back()->with('success', 'Inspeksi berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'kondisi_kebersihan' => 'required|string',
            'ketersediaan_air' => 'required|string',
            'ketersediaan_sabun' => 'required|string',
            'bau_tidak_sedap' => 'required|string',
            'catatan' => 'nullable|string',
        ]);

        $inspeksi = Inspeksi::findOrFail($id);
        $inspeksi->update([
            'fasilitas_id'         => $request->fasilitas_id,
            'kondisi_kebersihan'   => strtolower($request->kondisi_kebersihan),
            'ketersediaan_air'     => $request->ketersediaan_air === 'Ada' ? 1 : ($request->ketersediaan_air === 'Tidak Ada' ? 0 : (int)$request->ketersediaan_air),
            'ketersediaan_sabun'   => $request->ketersediaan_sabun === 'Ada' ? 1 : ($request->ketersediaan_sabun === 'Tidak Ada' ? 0 : (int)$request->ketersediaan_sabun),
            'bau_tidak_sedap'      => $request->bau_tidak_sedap === 'Ya' ? 1 : ($request->bau_tidak_sedap === 'Tidak' ? 0 : (int)$request->bau_tidak_sedap),
            'catatan'              => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Data inspeksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $inspeksi = Inspeksi::findOrFail($id);
        $inspeksi->delete();

        return redirect()->back()->with('success', 'Data inspeksi berhasil dihapus.');
    }
}
