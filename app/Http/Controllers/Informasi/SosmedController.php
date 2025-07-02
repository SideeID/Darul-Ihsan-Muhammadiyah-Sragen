<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;

class SosmedController extends Controller
{
    public function instagram()
    {
        return view('admin.informasi/sosmed/instagram');
    }
    public function whatsapp()
    {
        return view('admin.informasi/sosmed/whatsapp');
    }
    public function youtube()
    {
        return view('admin.informasi/sosmed/youtube');
    }
}
