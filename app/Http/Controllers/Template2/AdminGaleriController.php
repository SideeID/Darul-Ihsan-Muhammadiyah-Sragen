<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminGaleriController extends Controller


{
    public function admingaleri()
    {
        return view('admin.konten.galeri.index');
    }
    public function admintambahgaleri()
    {
        return view('admin.konten.galeri.tambah');
    }
     public function admindetailgaleri()
    {
        return view('admin.konten.galeri.detail');
    }
}
