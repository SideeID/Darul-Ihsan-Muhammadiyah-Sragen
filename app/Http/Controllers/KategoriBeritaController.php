<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Carbon\Carbon;

class KategoriBeritaController extends Controller
{
    // Get berita dengan status published.
    public function list(Request $req)
    {
        $query = KategoriBerita::with('berita')->select('*')->orderBy('created_at', 'desc');

        if ($req->status) {
            $query->where('status', $req->status);
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->tanggal) {
            $query->where('tanggal', $req->tanggal);
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
        } else {
            $data = $query->get();
        };

        foreach ($data as $d => $v) {
            $v->banner = "<img src='" . asset($v->image) . "' class='banner' alt=''>";
            if ($v->status === "active") {
                $v->switch = "<div class='form-check form-switch'>" .
                    '<input class="form-check-input" type="checkbox" role="switch" id="switch-' . $v->id . '" onchange="changeStatus(' . $v->id . ', \'inactive\')" checked>' .
                    "<label class='form-check-label' for='switch-" . $v->id . "'>Aktif</label>" .
                    "</div>";
            } else {
                $v->switch = "<div class='form-check form-switch'>" .
                    '<input class="form-check-input" type="checkbox" role="switch" id="switch-' . $v->id . '" onchange="changeStatus(' . $v->id . ', \'active\')">' .
                    "<label class='form-check-label' for='switch-" . $v->id . "'>Tidak Aktif</label>" .
                    "</div>";
            }

            $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<button type='button' class='btn btn-outline-warning me-2' data-id='" . $v->id . "' onclick='openForm(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Edit Data'><img src='" . asset('image/icon/icon-edit.svg') . "' class='' alt='detail'></button>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }


    public function store(Request $req)
    {
        $input = $req->all();

        $input['status'] = 'inactive';

        $data = KategoriBerita::create($input);

        return apiSuccess($data);
    }
    // Edit berita.
    public function update(Request $req, $id)
    {
        $data = KategoriBerita::find($id);
        $input = $req->all();
        $data->update($input);

        return apiSuccess($data);
    }
    // Publish lebih dari satu berita.
    public function publish(Request $req)
    {
        $data = Berita::whereIn('id', $req->ids)->update(['status' => 'published']);

        return apiSuccess($data);
    }

    public function set_status($id, Request $req)
    {
        $data = KategoriBerita::find($id);
        $data->status = $req->status;
        $data->save();
        return apiSuccess($data);
    }

    public function detail($id)
    {
        $data = KategoriBerita::with('berita')->find($id);

        return apiSuccess($data);
    }

    // Hapus berita.
    public function delete($id)
    {
        $data = KategoriBerita::find($id);
        $data->delete();

        return apiSuccess(null, 'Kategori Berita berhasil dihapus');
    }

    public function landing()
    {
        $data = KategoriBerita::where('status', 'active')->get();
        return apiSuccess($data, 'Data berhasi diambil.');
    }

    public function detail_landing($id)
    {
        $data = KategoriBerita::with('berita')->find($id);

        return apiSuccess($data, 'Data berhasil diambil,');
    }
}
