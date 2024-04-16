<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;
    protected $table = "pengadaan";
    protected $fillable = [
        'kode_pengadaan',
        'jenis_pengadaan',
        'kode_jabatan',
        'kode_unitkerja',
        'kode_skpd',
        
    ];
}

