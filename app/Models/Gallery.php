<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = "gallery";
    protected $fillable = [
        'file',
        'keterangan',
        'judul',
        'type',
        'tanggal',
        'status',
        'guru',
        'video_link'
    ];

    function scopeLatestPublish($query, $limit = 5) {
        return $query->where('status', 'published')->orderByDesc('tanggal')->limit($limit);
    }

    public function files()
    {
        return $this->hasMany(GalleryFiles::class, 'gallery_id');
    }

    public function getYouTubeThumbnailAttribute()
    {
        if (preg_match('/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $this->video_link, $matches)) {
            $videoId = $matches[1];
            return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg"; // URL thumbnail
        }

        return null;
    }
}
