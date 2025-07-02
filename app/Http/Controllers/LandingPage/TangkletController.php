<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;

class TangkletController extends Controller
{
    public function index()
    {
        return view('landing_page/tangklet/index');
    }

    public function tanya()
    {
        return view('landing_page/tangklet/tanya');
    }

    public function detail($id)
    {
        return view('landing_page/tangklet/detail', ['data' => $id]);
    }
}
