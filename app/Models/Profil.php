<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    protected $table = "profil";
    protected $fillable = [
        'judul',
        'status',
        'isi'
    ];

    public function files()
    {
        return $this->hasMany(ProfilFiles::class, 'profil_id');
    }
}
