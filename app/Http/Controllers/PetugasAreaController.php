<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Inspeksi; // Pastikan model ini sudah ada
use App\Models\Fasilitas; // Pastikan model ini sudah ada

class PetugasAreaController extends Controller
{
    /**
     * 1. Menampilkan ringkasan data milik petugas yang sedang login
     */
    public function dashboard()
    {
        // Misal ID petugas: "Wawan Galon" atau "Yanto 24 Jam"
        $petugasId = Auth::id(); 
        
        // Contoh: Mengambil jumlah jadwal hari ini (jika ada model/tabel Jadwal)
        // $jadwalHariIni = Jadwal::where('petugas_id', $petugasId)->whereDate('tanggal', today())->count();
        $jadwalHariIni = 0; // Dummy sementara sampai tabel Jadwal dibuat

        // Total inspeksi yang sudah diselesaikan oleh Wawan Galon
        $inspeksiSelesai = Inspeksi::where('petugas_id', $petugasId)->count();

        return view('petugas.dashboard', compact('jadwalHariIni', 'inspeksiSelesai'));
    }

    /**
     * 2. Menampilkan daftar fasilitas umum yang ditugaskan kepada petugas tersebut
     */
    public function jadwal()
    {
        $petugasId = Auth::id();
        
        // Contoh query ke tabel jadwal: 
        // $fasilitasDitugaskan = Jadwal::with('fasilitas')->where('petugas_id', $petugasId)->get();
        $fasilitasDitugaskan = collect([]); // Dummy collection sementara

        return view('petugas.jadwal', compact('fasilitasDitugaskan'));
    }

    /**
     * 3. Menampilkan halaman form input untuk fasilitas yang dipilih
     */
    public function create($fasilitas_id)
    {
        // Menggunakan Eloquent ORM: akan otomatis throw 404 jika fasilitas tidak ada
        $fasilitas = Fasilitas::findOrFail($fasilitas_id);
        
        return view('petugas.inspeksi.create', compact('fasilitas'));
    }

    /**
     * 4. Memproses simpan data ke tabel 'inspeksi_sanitasi'
     */
    public function store(Request $request)
    {
        // Validasi input yang ketat dan aman dari injeksi
        $validated = $request->validate([
            'fasilitas_id'         => 'required|exists:fasilitas,id',
            'kondisi_kebersihan'   => 'required|in:baik,cukup,buruk',
            'ketersediaan_air'     => 'required|boolean', // 1/0
            'ketersediaan_sabun'   => 'required|boolean', // 1/0
            'bau_tidak_sedap'      => 'required|boolean', // 1/0
            'catatan'              => 'nullable|string|max:1000',
            'status_tindak_lanjut' => 'required|in:aman,perlu dibersihkan,perlu perbaikan',
        ]);

        try {
            // Proses simpan data (Aman dari SQL Injection karena menggunakan Eloquent)
            $inspeksi = new Inspeksi();
            $inspeksi->petugas_id = Auth::id(); // Mengambil ID user yg sedang login
            $inspeksi->fasilitas_id = $validated['fasilitas_id'];
            $inspeksi->kondisi_kebersihan = $validated['kondisi_kebersihan'];
            $inspeksi->ketersediaan_air = $validated['ketersediaan_air'];
            $inspeksi->ketersediaan_sabun = $validated['ketersediaan_sabun'];
            $inspeksi->bau_tidak_sedap = $validated['bau_tidak_sedap'];
            $inspeksi->catatan = $validated['catatan'];
            $inspeksi->status_tindak_lanjut = $validated['status_tindak_lanjut'];
            $inspeksi->save();

            // Flash message sukses
            return redirect()->route('petugas.riwayat')->with('success', 'Data inspeksi berhasil disimpan. Mantap, kerja bagus!');
        } catch (\Exception $e) {
            // Flash message error
            return back()->withInput()->with('error', 'Gagal menyimpan data inspeksi: ' . $e->getMessage());
        }
    }

    /**
     * 5. Menampilkan riwayat semua inspeksi yang pernah dikirim oleh petugas
     */
    public function riwayat()
    {
        $petugasId = Auth::id();
        
        // Urut dari yang paling baru menggunakan latest()
        $riwayatInspeksi = Inspeksi::with('fasilitas')
            ->where('petugas_id', $petugasId)
            ->latest()
            ->get();

        return view('petugas.inspeksi.riwayat', compact('riwayatInspeksi'));
    }

    /**
     * 6. Menampilkan data diri profil petugas
     */
    public function profil()
    {
        // Mengambil data user saat ini (Misal: Yanto 24 Jam)
        $petugas = Auth::user(); 
        
        return view('petugas.profil', compact('petugas'));
    }

    /**
     * 7. Memproses perubahan password petugas
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|min:8|confirmed', // otomatis butuh input password_baru_confirmation
        ]);

        $user = Auth::user();

        // Pengecekan password lama
        if (!Hash::check($request->password_lama, $user->password)) {
            return back()->with('error', 'Password lama tidak sesuai, bro!');
        }

        // Update password baru yang sudah di-hash
        $user->update([
            'password' => Hash::make($request->password_baru)
        ]);

        return back()->with('success', 'Password berhasil diperbarui dengan aman.');
    }
}
