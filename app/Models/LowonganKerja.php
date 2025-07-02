<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowonganKerja extends Model
{
    use HasFactory;
    
    protected $table = 'lowongan_kerjas';
    
    protected $fillable = [
        'posisi',
        'tanggal_dibuka',
        'tanggal_ditutup',
        'status',
        'foto'
    ];
}