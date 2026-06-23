<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    protected $fillable = [
        'nama_petugas',
        'email',
        'no_hp',
        'status_aktif',
        'foto'
    ];
}
