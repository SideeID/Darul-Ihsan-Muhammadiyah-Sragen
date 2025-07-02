<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;
use App\Models\KaryaIlmiah;


class KaryaIlmiahController extends Controller
{
    public function index()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.karyaIlmiah.index');
    }

    public function tambah()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.karyaIlmiah.tambah');
    }

    // public function detail()
    // {
    //     $template = config('app.template');
    //     return view($template . '.admin.informasi.karyaIlmiah.detail');
    // }

    public function detail($id)
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.karyaIlmiah.detail', ['data' => $id]);
    }
}
