<?php

namespace App\Http\Controllers\TentangKami;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil.index');
    }

    public function create()
    {
        return view('admin.profil.tambah');
    }

    public function detail($id)
    {
        return view('admin.profil.detail', ['data' => $id]);
    }

    public function edit($id)
    {
        return view('admin.profil.edit', ['data' => $id]);
    }
}
