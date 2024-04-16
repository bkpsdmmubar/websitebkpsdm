<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuanizin extends Model
{
    use HasFactory;
    protected $table = "pengajuan_izin";
    protected $fillable = [
        'kode_izin',
        'nip',
        'tgl_izin_dari',
        'tgl_izin_sampai',
        'status',
        'kode_cuti',
        'keterangan',
        'file_dokumen',
        'status_approved',
        'status',
    ];
}
