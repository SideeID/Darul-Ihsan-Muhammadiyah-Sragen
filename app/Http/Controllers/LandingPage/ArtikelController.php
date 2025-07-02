<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;

class ArtikelController extends Controller
{
    public function index()
    {
        return view('landing_page/artikel/index');
    }

    public function detail($id)
    {
        return view('landing_page/artikel/detail', ['data' => $id]);
    }
}
