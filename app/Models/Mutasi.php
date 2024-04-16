<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;
    protected $table = "master_mutasi";
    protected $fillable = [
        'kode_mutasi',
        'nip',
        'kode_riwayat_jabatan',
        'keterangan',
        'status_approve',
    ];
}
