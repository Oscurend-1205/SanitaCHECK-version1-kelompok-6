<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inspeksi extends Model
{
    protected $fillable = [
        'fasilitas_id',
        'petugas_id',
        'tanggal_inspeksi',
        'kondisi_kebersihan',
        'ketersediaan_air',
        'ketersediaan_sabun',
        'bau_tidak_sedap',
        'catatan',
        'status_tindak_lanjut'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id');
    }
}
