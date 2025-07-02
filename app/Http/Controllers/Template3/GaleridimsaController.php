<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GaleridimsaController extends Controller
{
    public function index_foto()
    {
        return view('admin.informasi.galeri.foto.index');
    }

    public function tambah_foto()
    {
        return view('admin.informasi.galeri.foto.tambah');
    }

    public function detail_foto($id)
    {
        $template = config('app.template');
        return view('admin.informasi.galeri.foto.detail', ['id' => $id]);
    }


    public function index_video()
    {
        return view('admin.informasi.galeri.video.index');
    }

    public function tambah_video()
    {
        return view('admin.informasi.galeri.video.tambah');
    }

    public function detail_video($id)
    {
        $template = config('app.template');
        return view('admin.informasi.galeri.video.detail', ['id' => $id]);
    }
}
