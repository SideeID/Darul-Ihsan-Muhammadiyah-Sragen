<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ekstrakurikuler;
use Carbon\Carbon;

class EkskulController extends Controller
{
    public function list(Request $req)
    {
        try {
            $query = Ekstrakurikuler::select('*');

            if ($req->search) {
                $query->where(function ($search) use ($req) {
                    $search->where('nama', 'LIKE', '%' . $req->search . '%');
                });
            }

            if ($req->tanggal) {
                $query->whereDate('created_at', $req->tanggal);
            }

            if ($req->status) {
                $query->where('status', $req->status);
            }

            if ($req->table) {
                $data = $query->orderBy('nama', 'asc')->paginate($req->limit)->withQueryString();
            } else {
                $data = $query->orderBy('nama', 'asc')->get();
            };

            foreach ($data as $d => $v) {
                if (strlen($v->url) > 35) {
                    $v->url = substr($v->url, 0, 35) . '...';
                }
                if ($v->status === "waiting" || $v->status === NULL) {
                    $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
                } else {
                    $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
                }
                $v->banner = "<img src='" . asset($v->thumbnail) . "' class='banner' alt=''>";
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<a href='" . route('ekstrakurikuler.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                    "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                    "</div>";
            }

            return apiSuccess($data, 'Data berhasil diambil.');
        } catch (\Exception $e) {
            return apiFailed(null, $e->getMessage());
        }
    }


    public function store(Request $req)
    {
        try {
            $req->validate([
                'nama' => 'required|string|max:255',
                'url' => 'required|string|max:255',
                'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'status' => 'required|string'
            ]);

            $input = $req->all();

            if ($req->thumbnail) {
                $namaThumbnail = rand(000, 999) . '_' . $req->thumbnail->getClientOriginalName();
                $path = public_path() . '/storage/path/ekskul';
                $req->thumbnail->move($path, $namaThumbnail);
                $input['thumbnail'] = '/storage/path/ekskul/' . $namaThumbnail;
            }

            $data = Ekstrakurikuler::create($input);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed(null, $e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        $input = $req->all();
        $data = Ekstrakurikuler::find($id);

        if ($req->thumbnail) {
            $namaThumbnail = rand(000, 999) . '_' . $req->thumbnail->getClientOriginalName();
            $path = public_path() . '/storage/path/ekskul';
            $req->thumbnail->move($path, $namaThumbnail);
            $input['thumbnail'] = '/storage/path/ekskul/' . $namaThumbnail;
        }

        $data->update($input);

        return apiSuccess($data);
    }



    public function detail($id)
    {
        $data = Ekstrakurikuler::findOrfail($id);

        return apiSuccess($data);
    }

    public function delete($id)
    {
        $data = Ekstrakurikuler::find($id);
        $data->delete();

        return apiSuccess(null, 'Ekskul berhasil dihapus');
    }

    public function landing()
    {
        $data = Ekstrakurikuler::orderBy('nama', 'desc')->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate()
    {
        $query = Ekstrakurikuler::select('*')->orderBy('nama', 'desc');
        $data = $query->paginate(4)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail_landing($id)
    {
        $data = Ekstrakurikuler::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
