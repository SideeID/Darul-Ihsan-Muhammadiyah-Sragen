<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil.index');
    }
}
