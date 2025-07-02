<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class EkskulViewController extends Controller
{
    public function index()
    {
        return view('admin.ekstrakurikuler.index');
    }

    public function tambah()
    {
        return view('admin.ekstrakurikuler.tambah');
    }
    public function detail($id)
    {
        return view('admin.ekstrakurikuler.detail', ['data' => $id]);
    }
}
