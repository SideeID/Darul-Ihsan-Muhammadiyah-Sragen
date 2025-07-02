<?php

namespace App\Http\Controllers\Template3;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AlumniController extends Controller
{

    public function index()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.alumni.index');
    }
    public function tambah()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.alumni.tambah');
    }
    public function detail($id)
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.alumni.detail', ['data' => $id]);
    }

}
