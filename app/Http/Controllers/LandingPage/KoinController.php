<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;

class KoinController extends Controller
{
    public function index()
    {
        return view('landing_page/koin/index');
    }

    public function detail($id)
    {
        return view('landing_page/koin/detail', ['data' => $id]);
    }
}
