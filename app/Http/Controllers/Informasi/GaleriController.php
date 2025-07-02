<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;

class GaleriController extends Controller
{
    // foto
    public function index_foto()
    {
        return view('admin.informasi/galeri/foto/index');
    }
    public function tambah_foto()
    {
        return view('admin.informasi/galeri/foto/tambah');
    }
    public function detail_foto($id)
    {
        return view('admin.informasi/galeri/foto/detail', ['data' => $id]);
    }

    // video
    public function index_video()
    {
        return view('admin.informasi/galeri/video/index');
    }
    public function tambah_video()
    {
        return view('admin.informasi/galeri/video/tambah');
    }
    public function detail_video($id)
    {
        return view('admin.informasi/galeri/video/detail', ['data' => $id]);
    }
}
