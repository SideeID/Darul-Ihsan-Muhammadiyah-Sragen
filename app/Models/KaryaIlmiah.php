<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class KaryaIlmiah extends Model
{

    use HasFactory;
    protected $table = 'karya_ilmiahs';
    protected $fillable = [
        'judul',
        'penulis',
        'image',
        'url',
        'tanggal',
        'status',
        'sorotan'
    ];
    protected $appends = ['image_url'];

    // public function getTanggalAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d M Y');
    // }

    function scopeLatestPublish($query, $limit = 5) {
        return $query->where('status', 'published')->orderByDesc('tanggal')->limit($limit);
    }

    function scopeBySlugPublish($query, $slug) {
        return $query->where('id', $slug)->where('status', 'published');
    }

        /**
     * Get the user's first name.
     */
    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => url($attributes['image']),
        );
    }
}
