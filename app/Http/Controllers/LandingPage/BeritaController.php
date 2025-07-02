<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        return view('landing_page/berita/index');
    }

    public function detail($id)
    {
        return view('landing_page/berita/detail', ['data' => $id]);
    }
}
