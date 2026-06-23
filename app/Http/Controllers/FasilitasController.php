<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::latest()->paginate(10);
        
        $totalFasilitas = Fasilitas::count();
        $aktifFasilitas = Fasilitas::where('status_aktif', true)->count();
        $tidakAktifFasilitas = Fasilitas::where('status_aktif', false)->count();

        return view('admin.fasilitas', compact('fasilitas', 'totalFasilitas', 'aktifFasilitas', 'tidakAktifFasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'jenis_fasilitas' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'status_aktif' => 'required|boolean',
        ]);

        Fasilitas::create([
            'nama_fasilitas' => $request->nama_fasilitas,
            'jenis_fasilitas' => $request->jenis_fasilitas,
            'lokasi' => $request->lokasi,
            'penanggung_jawab' => $request->penanggung_jawab,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect()->back()->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function update(Request $request, Fasilitas $fasilita)
    {
        // the variable name in route is usually singular based on model, but laravel might guess 'fasilita' from 'fasilitas'.
        // Let's explicitly define the parameter or use id. Let's use ID to be safe.
    }
    
    public function updateById(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas' => 'required|string|max:255',
            'jenis_fasilitas' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'status_aktif' => 'required|boolean',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->update([
            'nama_fasilitas' => $request->nama_fasilitas,
            'jenis_fasilitas' => $request->jenis_fasilitas,
            'lokasi' => $request->lokasi,
            'penanggung_jawab' => $request->penanggung_jawab,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $fasilitas->delete();

        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }
}
