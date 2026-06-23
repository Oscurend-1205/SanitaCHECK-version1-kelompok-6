<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fasilitas extends Model
{
    use HasFactory;

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

    public function laporan()
    {
        return $this->hasMany(Laporan::class);
    }
}
