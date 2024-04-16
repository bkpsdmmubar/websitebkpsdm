<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Honorer extends Model
{
    use HasFactory;

    // protected $table = "honorer";
    // protected $guarded = ['nik'];
    protected $table = "honorer";
    protected $primaryKey = "nik";
    public $incrementing = false;
    protected $fillable = [
    'nik',
    'no_kk',
    'no_k2',
    'status_k2',
    'nama',
    'tgl_lhr',
    'tempat_lahir',
    'jenis_kelamin',
    'agama',
    'no_registrasi',
    'jenjang_pendidikan_daftar',
    'jenjang_pendidikan_sekarang',
    'pendidikan',
    'no_ijazah',
    'nama_sekolah',
    'tgl_lulus',
    'unit_kerja',
    'jabatan',
    'image',
    'status_keaktifan',
    'no_hp',
    'password',
    ];

/**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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
