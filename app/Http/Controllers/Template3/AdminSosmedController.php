<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSosmedController extends Controller


{
    public function adminsosmed()
    {
        return view('admin.konten.sosmed.index');
    }
   
}
