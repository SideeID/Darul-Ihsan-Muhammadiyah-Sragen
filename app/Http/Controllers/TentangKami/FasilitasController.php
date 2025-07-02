<?php

namespace App\Http\Controllers\TentangKami;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        return view('admin.tentang_kami.fasilitas.index');
    }
    public function tambah()
    {
        return view('admin.tentang_kami.fasilitas.addfasilitas');
    }
    public function detail($id)
    {
        return view('admin.tentang_kami.fasilitas.detail', ['data' => $id]);
    }
}
