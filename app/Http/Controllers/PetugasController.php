<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Fasilitas;
use App\Models\Inspeksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::latest()->paginate(7);
        $totalPetugas = Petugas::count();
        $aktifPetugas = Petugas::where('status_aktif', true)->count();
        $jadwalHariIni = Fasilitas::whereNotNull('penanggung_jawab')->count();
        $inspeksiHariIni = Inspeksi::whereDate('tanggal_inspeksi', Carbon::today())->count();

        // --- Kalender Mingguan Dinamis ---
        $today = Carbon::today();
        $startOfWeek = $today->copy()->startOfWeek(Carbon::SUNDAY); // Minggu s.d. Sabtu
        $weekDays = [];
        for ($i = 0; $i < 7; $i++) {
            $day = $startOfWeek->copy()->addDays($i);
            $weekDays[] = [
                'label'   => $day->translatedFormat('D'), // Min, Sen, Sel, ...
                'date'    => $day->format('d'),
                'isToday' => $day->isToday(),
                'carbon'  => $day,
            ];
        }

        // --- Jadwal Hari Ini (Dinamis dari Inspeksi + Fasilitas + Petugas) ---
        // Ambil inspeksi yang dilakukan hari ini beserta relasinya
        $inspeksiHariIniData = Inspeksi::with(['fasilitas', 'petugas'])
            ->whereDate('tanggal_inspeksi', $today)
            ->orderBy('tanggal_inspeksi')
            ->get();

        $schedules = [];
        if ($inspeksiHariIniData->isNotEmpty()) {
            foreach ($inspeksiHariIniData as $inspeksi) {
                $namaPetugas = $inspeksi->petugas ? $inspeksi->petugas->name : 'Petugas';
                $namaFasilitas = $inspeksi->fasilitas ? $inspeksi->fasilitas->nama_fasilitas : 'Fasilitas';
                $waktu = Carbon::parse($inspeksi->tanggal_inspeksi)->format('H:i');

                // Tentukan badge berdasarkan status_tindak_lanjut
                switch ($inspeksi->status_tindak_lanjut) {
                    case 'aman':
                        $badgeBg = 'bg-success-subtle'; $badgeText = 'text-success'; $label = 'Selesai';
                        break;
                    case 'perlu dibersihkan':
                        $badgeBg = 'bg-warning-subtle'; $badgeText = 'text-warning'; $label = 'Perlu Bersih';
                        break;
                    case 'perlu perbaikan':
                        $badgeBg = 'bg-danger-subtle'; $badgeText = 'text-danger'; $label = 'Perlu Perbaikan';
                        break;
                    default:
                        $badgeBg = 'bg-secondary-subtle'; $badgeText = 'text-secondary'; $label = 'Proses';
                }

                $schedules[] = [
                    $namaPetugas,
                    'Petugas Lapangan',
                    $namaFasilitas,
                    $waktu,
                    $label,
                    $badgeBg,
                    $badgeText,
                ];
            }
        } else {
            // Jika tidak ada inspeksi hari ini, tampilkan jadwal dari petugas + fasilitas aktif secara dinamis
            $petugasAktif = Petugas::where('status_aktif', true)->get();
            $fasilitasAktif = Fasilitas::where('status_aktif', true)->get();

            if ($petugasAktif->isNotEmpty() && $fasilitasAktif->isNotEmpty()) {
                $jam = 8; // Mulai dari jam 08:00
                foreach ($petugasAktif->take(5) as $i => $pt) {
                    $fas = $fasilitasAktif->get($i % $fasilitasAktif->count());
                    $jamMulai = sprintf('%02d:00', $jam);
                    $jamSelesai = sprintf('%02d:30', $jam + 1);
                    $schedules[] = [
                        $pt->nama_petugas,
                        'Petugas Lapangan',
                        $fas ? $fas->nama_fasilitas : 'Fasilitas',
                        "{$jamMulai} - {$jamSelesai}",
                        'Dijadwalkan',
                        'bg-info-subtle',
                        'text-info',
                    ];
                    $jam += 2;
                }
            }
        }

        return view('admin.petugas', compact(
            'petugas', 'totalPetugas', 'aktifPetugas',
            'jadwalHariIni', 'inspeksiHariIni',
            'schedules', 'weekDays', 'today'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email'        => 'required|email|unique:petugas,email',
            'no_hp'        => 'required|string|max:20',
            'status_aktif' => 'required|boolean',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'email'        => $request->email,
            'no_hp'        => $request->no_hp,
            'status_aktif' => $request->status_aktif,
        ]);

        return redirect()->back()->with('success', 'Data petugas berhasil ditambahkan.');
    }

    public function updateById(Request $request, $id)
    {
        $petugas = Petugas::findOrFail($id);

        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'email'        => 'required|email|unique:petugas,email,' . $id,
            'no_hp'        => 'required|string|max:20',
            'status_aktif' => 'required|boolean',
        ]);

        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'email'        => $request->email,
            'no_hp'        => $request->no_hp,
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
