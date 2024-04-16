<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $table = "jabatan";
    protected $fillable = [
        'kode_jabatan',
        'kode_skpd',
        'kode_unitkerja',
        'nama_jabatan',
        'eselon',
        'kode_jenis_jabatan',
        'kelas_jabatan',
    ];
}
