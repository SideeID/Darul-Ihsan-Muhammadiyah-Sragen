<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Anggota;
use App\Models\NderekTanglet;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class DashboardAPIController extends Controller
{
    public function index()
    {
        $data['nderek_all'] = NderekTanglet::all()->count();
        $data['nderek_answered'] = NderekTanglet::where('status', 'answered')->count();
        $data['nderek_waiting'] = NderekTanglet::where('status', '=', 'waiting')->count();

        $data['anggota'] = Pengurus::all()->count();
        $data['active_ads'] = Ads::where('status', 'published')->count();

        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
