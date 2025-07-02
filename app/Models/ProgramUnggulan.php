<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramUnggulan extends Model
{
    use HasFactory;
    protected $table = 'program_unggulans';
    protected $fillable = [
        'nama',
        'deskripsi',
        'gambar',
        'url',
        'status',
    ];

    protected $appends = ['gambar_url'];

    public function getGambarUrlAttribute()
    {
        return url($this->gambar);
    }
}
