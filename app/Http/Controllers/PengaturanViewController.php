<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PengaturanViewController extends Controller
{
    public function profile()
    {
        return view('admin.setting.index');
    }
}
