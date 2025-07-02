<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;
use App\Models\Majalah;


class MajalahController extends Controller
{
    public function index()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.majalah.index');
    }

    public function tambah()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.majalah.tambah');
    }

    public function detail($id)
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.majalah.detail', ['data' => $id]);
    }

}
