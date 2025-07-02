<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\QnA;

class QnAController extends Controller
{
    public function index()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.qna.index');
    }

    public function tambah()
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.qna.tambah');
    }

    // public function detail()
    // {
    //     $template = config('app.template');
    //     return view($template . '.admin.informasi.qna.detail');
    // }

    public function detail($id)
    {
        $template = config('app.template');
        return view($template . '.admin.informasi.qna.detail', ['data' => $id]);
    }
}
