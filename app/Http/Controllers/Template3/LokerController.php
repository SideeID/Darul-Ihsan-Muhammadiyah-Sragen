<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;


class LokerController extends Controller
{
    public function index()
    {

        return view('admin.informasi.loker.index');
    }

    public function tambah()
    {

        return view('admin.informasi.loker.tambah');
    }

    public function detail($id)
    {
        $template = config('app.template');
        return view('admin.informasi.loker.detail', ['data' => $id]);
    }

}
