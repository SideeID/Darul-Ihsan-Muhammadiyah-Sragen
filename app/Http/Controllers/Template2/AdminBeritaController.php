<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBeritaController extends Controller


{
    public function adminberita()
    {
        return view('admin.konten.berita.index');
    }
    public function admintambahberita()
    {
        return view('admin.konten.berita.tambah');
    }
     public function admindetailberita()
    {
        return view('admin.konten.berita.detail');
    }
}
