<?php

namespace App\Http\Controllers\Konten;

use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index()
    {
        return view('konten/event/index');
    }
}
