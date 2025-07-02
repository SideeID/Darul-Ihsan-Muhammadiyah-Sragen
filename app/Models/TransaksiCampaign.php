<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiCampaign extends Model
{
    use HasFactory;
    protected $table = 'campaign_transaksi';

    protected $fillable = [
        'id_campaign',
        'nama_donatur',
        'tanggal',
        'bank',
        'nomor_rekening',
        'nominal',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'id_campaign');
    }
}
