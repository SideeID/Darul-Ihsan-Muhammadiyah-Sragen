<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;
    protected $table = 'pengumuman';
    protected $fillable = ['judul', 'tanggal', 'url', 'status'];

    function scopeLatestPublish($query, $limit = 24) {
        return $query->where('status', 'publish')->orderByDesc('tanggal')->limit($limit);
    }

    function scopeBySlugPublish($query, $slug) {
        return $query->where('id', $slug)->where('status', 'published');
    }
}
