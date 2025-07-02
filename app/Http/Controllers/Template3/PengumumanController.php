<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;


class PengumumanController extends Controller
{
    public function index()
    {

        return view('admin.informasi.pengumuman.index');
    }

    public function tambah()
    {

        return view('admin.informasi.pengumuman.tambah');
    }

    // public function detail()
    // {
     
    //     return view($template . 'admin.informasi.pengumuman.detail');
    // }

    public function detail($id)
    {
        $template = config('app.template');
        return view('admin.informasi.pengumuman.detail', ['data' => $id]);
    }


   
}
