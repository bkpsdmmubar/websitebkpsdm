<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugasluar extends Model
{
    use HasFactory;
    protected $table = "master_tugasluar";
    protected $fillable = [
        'kode_tugasluar',
        'nama_tugasluar',
        'jml_hari',

    ];
}
