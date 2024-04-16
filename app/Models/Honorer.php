<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Honorer extends Authenticatable
{
    protected $table = "honorer";
    protected $primaryKey = "nik";
    public $incrementing = false;
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'temapt_lahir',
        'tanggal_lahir',
        'nokk',
        'photo',
        'password',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kode_agama',
        'kode_jenis_kawin',
        'nik',
        'nomor_hp',
        'photo',
        'kode_jabatan',
        'jenis_kepegawaian',
        'kode_skpd',
        'kode_unitkerja',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}