<?php

namespace App\Http\Controllers\Template3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function showPartner()
    {
        $template = config('app.template');
        return view($template . '.admin.tentang_kami.partner.index');
    }

    // public function list(Request $req)
    // {
    //     try {
    //         $req->validate([
    //             'tanggal' => 'nullable|date',
    //             'status' => 'nullable|string',
    //             'search' => 'nullable|string'
    //         ]);

    //         $query = Partner::select('*');

    //         if ($req->search) {
    //             $query->where(function ($search) use ($req) {
    //                 $search->where('nama', 'LIKE', '%' . $req->search . '%');
    //             });
    //         }

    //         if ($req->tanggal) {
    //             $query->whereDate('created_at', $req->tanggal);
    //         }

    //         if ($req->status) {
    //             $query->where('status', $req->status);
    //         }

    //         if ($req->table) {
    //             $data = $query->orderBy('nama', 'asc')->paginate($req->limit)->withQueryString();
    //         } else {
    //             $data = $query->orderBy('nama', 'asc')->get();
    //         };

    //         foreach ($data as $d => $v) {
    //             if (strlen($v->url) > 35) {
    //                 $v->url = substr($v->url, 0, 35) . '...';
    //             }
    //             if ($v->status === "waiting" || $v->status === NULL) {
    //                 $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
    //             } else {
    //                 $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
    //             }
    //             $v->banner = "<img src='" . asset($v->thumbnail) . "' class='banner' alt=''>";
    //             $v->is_action = "<div class='d-flex justify-content-center'>" .
    //                 "<button type='button' id='buttonEdit' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='openEditModal(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Edit Data' data-bs-toggle='modal' data-bs-target='#modal-edit-media'><img src='" . asset('image/icon/icon-detail-black.svg') . "' class='' alt='edit'></button>" .
    //                 "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
    //                 "</div>";
    //         }

    //         return apiSuccess($data, 'Data berhasil diambil.');
    //     } catch (\Exception $e) {
    //         return apiFailed(null, $e->getMessage());
    //     }
    // }
}
