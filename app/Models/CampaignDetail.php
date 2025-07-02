<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignDetail extends Model
{
    use HasFactory;
    protected $table = 'campaign_detail';
    protected $fillable = [
        'id_campaign',
        'index',
        'url'
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }
}
