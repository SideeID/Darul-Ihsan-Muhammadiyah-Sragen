<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasFiles extends Model
{
    use HasFactory;
    protected $table = 'fasilitas_files';
    protected $fillable = [
        'fasilitas_id',
        'file',
        'original',
    ];

    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
}
