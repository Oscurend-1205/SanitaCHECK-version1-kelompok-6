<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = \App\Models\Laporan::with('fasilitas')->orderBy('created_at', 'desc')->get();
        return view('admin.laporan', compact('laporans'));
    }

    public function apiStore(\Illuminate\Http\Request $request)
    {
        $validated = $request->validate([
            'fasilitas_id' => 'required|exists:fasilitas,id',
            'nama_pelapor' => 'nullable|string',
            'catatan' => 'required|string',
        ]);

        $laporan = \App\Models\Laporan::create([
            'fasilitas_id' => $validated['fasilitas_id'],
            'nama_pelapor' => $validated['nama_pelapor'] ?? 'Anonim',
            'catatan' => $validated['catatan'],
            'status' => 'Menunggu'
        ]);

        return response()->json(['status' => 'success', 'data' => $laporan]);
    }
}
