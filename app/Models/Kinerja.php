<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kinerja extends Model
{
    use HasFactory;
    protected $table = "kinerja_mingguan";
    protected $fillable = [
        'kode_kinerja_mingguan',
        'nip',
        'bulan',
        'tahun',
        'periode',

    ];
}
