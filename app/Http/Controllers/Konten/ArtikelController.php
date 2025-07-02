<?php

namespace App\Http\Controllers\Konten;

use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('konten/artikel/index');
    }
    public function tambah()
    {
        return view('konten/artikel/tambah');
    }
    public function detail($id)
    {
        return view('konten/artikel/detail', ['data' => $id]);
    }
}
