<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaign';

    protected $fillable = [
        'nama',
        'deskripsi',
        'dana',
        'poster',
        'lembaga',
        'penanggung_jawab',
        'phone',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];

    public function transaksi()
    {
        return $this->hasMany(TransaksiCampaign::class, 'id_campaign', 'id');
    }

    public function details()
    {
        return $this->hasMany(CampaignDetail::class, 'id_campaign', 'id');
    }
}
