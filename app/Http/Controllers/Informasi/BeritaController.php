<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        return view('admin.informasi.berita.index');
    }
    public function tambah()
    {
        return view('admin.informasi.berita.tambah');
    }
    public function kategori()
    {
        return view('admin.informasi.berita.kategori');
    }
    public function detail($id)
    {
        return view('admin.informasi.berita.detail', ['data' => $id]);
    }
}
