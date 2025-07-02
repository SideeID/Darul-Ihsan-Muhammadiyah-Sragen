<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;


class TatatertibController extends Controller
{
    public function index()
    {
        $template = config('app.template');
        return view($template . '.admin.tentang_kami.tata-tertib.index', ['data' => 1]);
    }

}
