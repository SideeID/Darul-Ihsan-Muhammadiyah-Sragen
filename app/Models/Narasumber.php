<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Narasumber extends Model
{
    use HasFactory;
    protected $table = "narasumber";
    protected $fillable = [
        'nama'
    ];
}
