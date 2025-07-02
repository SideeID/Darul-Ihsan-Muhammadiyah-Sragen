<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PengurusViewController extends Controller
{
    public function index()
    {
        return view('pengurus/index');
    }
    public function tambah()
    {
        return view('pengurus/tambah');
    }
    public function edit($id)
    {
        return view('pengurus/edit', ['data' => $id]);
    }
}
