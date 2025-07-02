<?php

namespace App\Http\Controllers\TentangKami;

use App\Http\Controllers\Controller;
use App\Models\DewanYayasan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DewanYayasanController extends Controller
{
    public function indexPimpinan()
    {
        return view('admin.tentang_kami.dewan.pimpinan.index');
    }

    public function tambahPimpinan()
    {
        return view('admin.tentang_kami.dewan.pimpinan.tambah');
    }


    public function detailPimpinan($id)
    {
        $template = config('app.template');
        return view($template . 'admin.tentang_kami.dewan.pimpinan.detail', ['data' => $id]);
    }


    public function indexPengasuh()
    {
        return view('admin.tentang_kami.dewan.pengasuh.index');
    }

    public function tambahPengasuh()
    {
        return view('admin.tentang_kami.dewan.pengasuh.tambah');
    }

    public function detailPengasuh($id)
    {
        $template = config('app.template');
        return view($template . 'admin.tentang_kami.dewan.pengasuh.detail', ['data' => $id]);
    }

   
}