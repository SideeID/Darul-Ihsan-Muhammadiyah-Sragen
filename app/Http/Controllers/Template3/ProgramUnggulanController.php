<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgramUnggulanController extends Controller
{
    public function showProgram()
    {
        $template = config('app.template');
        return view($template . '.admin.tentang_kami.program unggulan.index');
    }

    public function addProgram()
    {
        $template = config('app.template');
        return view($template . '.admin.tentang_kami.program unggulan.tambah');
    }

    public function detail($id)
    {
        $template = config('app.template');
        return view($template . '.admin.tentang_kami.program unggulan.edit', ['data' => $id]);
    }
}
