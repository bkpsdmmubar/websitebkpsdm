<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagberita extends Model
{
    use HasFactory;

    protected $table = "tag_beritas";
    protected $guarded = ['id'];
    
}
