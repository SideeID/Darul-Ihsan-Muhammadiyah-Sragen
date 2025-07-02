<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PrimaryController extends Controller
{
    public function landing_index()
    {
        return view('landing_page.index');
    }

    public function landing_pengurus()
    {
        return view('landing_page.pengurus');
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }
}
