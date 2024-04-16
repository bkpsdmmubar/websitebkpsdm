<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayatgolongan extends Model
{
    use HasFactory;
    protected $table = "riwayat_golongan";
    protected $fillable = [
        'nip',
        'kode_golongan',
        'tmt_golongan',
        'tgl_golongan',
        'file_dokumen',
    ];
}
