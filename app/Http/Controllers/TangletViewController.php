<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class TangletViewController extends Controller
{
    public function index()
    {
        return view('tanglet/index');
    }
    public function detail($id)
    {
        return view('tanglet/detail', ['data' => $id]);
    }
}
