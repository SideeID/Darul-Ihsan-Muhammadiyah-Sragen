<?php

namespace Database\Seeders;

use App\Models\KategoriBerita;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = ['BERITA SMA LAB UM', 'PRESTASI', 'ARTIKEL MENARIK', 'ORGANISASI SISWA'];

        foreach ($kategori as $k) {
            KategoriBerita::firstOrCreate([
                'judul' => $k,
                'status' => 'active',
            ]);
        }
    }
}
