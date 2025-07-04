<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $fillable = [
        'judul',
        'tanggal',
        'status',
    ];

    public function files()
    {
        return $this->hasMany(FasilitasFiles::class, 'fasilitas_id');
    }
}
