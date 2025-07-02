<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('admin.informasi.artikel.index');
    }
    public function tambah()
    {
        return view('admin.informasi.artikel.tambah');
    }
    public function kategori()
    {
        return view('admin.informasi.artikel.kategori');
    }
    public function detail($id)
    {
        return view('admin.informasi.artikel.detail', ['data' => $id]);
    }
}
