<?php

namespace App\Http\Controllers\Konten;

use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        return view('konten/berita/index');
    }
    public function tambah()
    {
        return view('konten/berita/tambah');
    }
    public function detail($id)
    {
        return view('konten/berita/detail', ['data' => $id]);
    }
}
