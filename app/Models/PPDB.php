<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PPDB extends Model
{
    use HasFactory;
    protected $table = "ppdb";
    protected $fillable = [
        'deskripsi',
        'link'
    ];
}
