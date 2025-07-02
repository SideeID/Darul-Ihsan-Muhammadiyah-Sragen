<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class GuruStaff extends Model
{
    use HasFactory;
    protected $table = 'guru_staff';
    protected $fillable = [
        'nama',
        'jabatan',
        'riwayat_pendidikan',
        'sekolah',
        'kota_pendidikan',
        'tahun_mulai_pendidikan',
        'tahun_berakhir_pendidikan',
        'pengalaman',
        'pemberi_kerja',
        'kota_kerja',
        'tahun_mulai_kerja',
        'tahun_berakhir_kerja',
        'prestasi',
        'penyelenggara',
        'juara',
        'tingkat',
        'tahun_prestasi',
        'image',
        'status',
        'type',
    ];

    protected $appends = ['image_url'];

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => url($attributes['image']),
        );
    }
}
