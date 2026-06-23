<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama_fasilitas',
        'jenis_fasilitas',
        'lokasi',
        'penanggung_jawab',
        'status_aktif'
    ];

    public function inspeksis()
    {
        return $this->hasMany(Inspeksi::class);
    }
}
