<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $fillable = [
        'fasilitas_id',
        'nama_pelapor',
        'catatan',
        'foto',
        'status'
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
