<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengurusSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama' => 'KH. Hazim Sirojudin, S.H',
                'jabatan' => 'Rais Syuriyah PCNU Kota Batu',
                'image' => '/image/pengurus/pengurus-1.png',
                'status' => 'published',
            ], [
                'nama' => 'K. Imam Mahfudzi, M.Pd.I.',
                'jabatan' => 'Katib PCNU Kota Batu',
                'image' => '/image/pengurus/pengurus-2.png',
                'status' => 'published',
            ], [
                'nama' => 'K. Takim, S.Pd., M.Pd.',
                'jabatan' => 'Ketua Tanfidziyah PCNU Kota Batu',
                'image' => '/image/pengurus/pengurus-3.png',
                'status' => 'published',
            ], [
                'nama' => 'K. Fathul Yasin, S.Sos.I.',
                'jabatan' => 'Sekretaris PCNU Kota Batu',
                'image' => '/image/pengurus/pengurus-4.png',
                'status' => 'published',
            ]
        ];

        Pengurus::insert($data);
    }
}
