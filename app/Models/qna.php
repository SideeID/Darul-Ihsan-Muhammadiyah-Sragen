<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class qna extends Model
{
    use HasFactory;
    protected $table = 'qnas';
    protected $fillable = ['question', 'answer', 'status'];

    function scopeLatestPublish($query, $limit = 5) {
        return $query->where('status', 'published')->orderByDesc('created_at')->limit($limit);
    }
}
