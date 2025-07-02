<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;


class TestimoniController extends Controller
{
    public function index()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.testimoni.index');
    }

    public function tambah()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.testimoni.tambah');
    }

    public function detail($id)
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.testimoni.detail' , ['data' => $id]);
    }

}
