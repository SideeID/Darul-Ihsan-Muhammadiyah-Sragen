<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Testimoni extends Model
{
    use HasFactory;
    protected $table = "testimoni";
    protected $fillable = [
        'nama',
        'isi',
        'file',
        'status',
        'keterangan',
        'wali'
    ];

    protected $appends = ['file_url'];

    protected function fileUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => url($attributes['file']),
        );
    }
}
