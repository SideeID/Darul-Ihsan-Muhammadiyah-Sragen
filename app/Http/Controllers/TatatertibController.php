<?php

namespace App\Http\Controllers;

use App\Models\Tatatertib;
use Illuminate\Http\Request;

class TatatertibController extends Controller
{
    public function updateOrCreate(Request $req)
    {
        try {
            $req->validate([
                'url' => 'required|string',
                'status' => 'required|string'
            ]);

            $tataTertib = Tatatertib::updateOrCreate(
                ['id' => 1],
                [
                    'url' => $req->url,
                    'status' => $req->status
                ]
            );

            return apiSuccess($tataTertib, 'Tata tertib berhasil');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function list()
    {
        try {
            $tataTertib = Tatatertib::first();

            return apiSuccess($tataTertib, 'Tata tertib berhasil');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
