<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ads;

class AdsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [[
            'judul' => 'beranda_event',
            'isi' => 'beranda_event',
            'sumber' => 'https://google.com',
            'lokasi' => 'beranda_event',
            'image' => '/image/ads-contact.png',
            'status' => 'waiting',
        ], [
            'judul' => 'beranda_artikel',
            'isi' => 'beranda_artikel',
            'sumber' => 'https://facebook.com',
            'lokasi' => 'beranda_artikel',
            'image' => '/image/ads-contact-small.png',
            'status' => 'waiting',
        ], [
            'judul' => 'halaman_horizontal',
            'isi' => 'halaman_horizontal',
            'sumber' => 'https://youtube.com',
            'lokasi' => 'halaman_horizontal',
            'image' => '/image/ads-uix.png',
            'status' => 'waiting',
        ], [
            'judul' => 'halaman_vertical',
            'isi' => 'halaman_vertical',
            'sumber' => 'https://x.com',
            'lokasi' => 'halaman_vertical',
            'image' => '/image/ads-website.png',
            'status' => 'waiting',
        ]];

        Ads::insert($data);
    }
}
