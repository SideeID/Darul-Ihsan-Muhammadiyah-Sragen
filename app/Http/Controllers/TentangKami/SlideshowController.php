<?php

namespace App\Http\Controllers\TentangKami;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SlideshowController extends Controller
{
    public function index()
    {
        return view('admin.tentang_kami.slideshow.index', ['data' => 20]);
    }
}
