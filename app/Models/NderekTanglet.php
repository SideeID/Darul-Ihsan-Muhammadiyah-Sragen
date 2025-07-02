<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NderekTanglet extends Model
{
    use HasFactory;
    protected $table = 'nderek_tanglet';
    protected $fillable = [
        'nama',
        'judul',
        'email',
        'pertanyaan',
        'jawaban',
        'id_narasumber',
        'status'
    ];

    public function narasumber()
    {
        return $this->belongsTo(Narasumber::class, 'id_narasumber');
    }
}
