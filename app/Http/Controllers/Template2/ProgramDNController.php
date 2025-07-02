<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class ProgramDNController extends Controller
{
    public function tahfidzQuran()
    {
        $template = config('app.template');
        return view($template.'.program.tahfidzquran');
    }

    public function bilingual()
    {
        $template = config('app.template');
        return view($template.'.program.bilingual');
    }

    public function p5()
    {

        $template = config('app.template');
        return view($template.'.program.p5');
    }
    public function ekstrakurikuler()
    {
        $ekskul = Ekstrakurikuler::all()->sortByDesc('created_at')->where('status', 'published');
        $template = config('app.template');
        return view($template.'.program.ekstrakurikuler', compact('ekskul'));
    }
}
