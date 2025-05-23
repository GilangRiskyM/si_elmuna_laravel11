<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    protected $fillable = [
        'nama',
        'jabatan',
        'waktu_presensi',
        'status'
    ];

    protected $casts = [
        'waktu_presensi'=> 'datetime',
    ];
}
