<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartnerLembaga extends Model
{
    use HasFactory;
    protected $table = 'partner_lembagas';
    protected $fillable = [
        'nama',
        'logo',
        'status',
    ];

    protected $appends = ['logo_url'];

    public function getLogoUrlAttribute()
    {
        return url($this->logo);
    }

}
