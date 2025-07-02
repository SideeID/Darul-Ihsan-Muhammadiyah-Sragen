<?php

namespace App\Http\Controllers\Template3;

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

    public function bahasa()
    {
        $template = config('app.template');
        return view($template.'.program.bahasa');
    }

    public function kurikulum()
    {
        $template = config('app.template');
        return view($template.'.program.kurikulum');
    }
    public function unggulan()
    {
        $template = config('app.template');
        return view($template.'.program.unggulan');
    }

    public function ekstrakurikuler()
    {
        $ekskul = Ekstrakurikuler::where('status', 'published')->orderByDesc('created_at')->paginate(6);
        $template = config('app.template');
        return view($template.'.program.ekstrakurikuler', compact('ekskul'));
    }
}
