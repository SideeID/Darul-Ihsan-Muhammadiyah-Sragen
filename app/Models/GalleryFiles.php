<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryFiles extends Model
{
    use HasFactory;
    protected $table = 'gallery_files';
    protected $fillable = [
        'gallery_id',
        'file',
        'original',
        'size'
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }
}
