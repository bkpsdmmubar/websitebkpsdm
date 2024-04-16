<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $table = "daftar";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $fillable = [
    'id',
    'judul',
    'subjudul',
    'desc',
    'image',
    'link',
    ];

}
