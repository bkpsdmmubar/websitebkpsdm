<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Asn extends Authenticatable
{


    protected $table = "asn";
    protected $primaryKey = "nip";
    public $incrementing = false;
    protected $guarded = ['nip'];
    protected $fillable = [
        'nip',
        'id_asn',
        'nip_lama',
        'nama_lengkap',
        'gelar_depan',
        'gelar_belakang',
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
        'password',
        'alamat',
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
