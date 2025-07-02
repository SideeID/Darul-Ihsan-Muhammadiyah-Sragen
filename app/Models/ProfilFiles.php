<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilFiles extends Model
{
    use HasFactory;
    protected $table = "profil_files";
    protected $fillable = [
        'profil_id',
        'file',
        'original',
        'size',
    ];

    public function profil()
    {
        return $this->belongsTo(Profil::class, 'profil_id');
    }
}
