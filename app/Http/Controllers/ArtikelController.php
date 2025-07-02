<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ArtikelController extends Controller
{
    // Get artikel dengan status published.
    public function list(Request $req)
    {
        $query = Artikel::select('*');

        if ($req->status == "published") {
            $query->where('status', 'published');
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
        } else {
            $data = $query->get();
        };

        foreach ($data as $d => $v) {
            $v->banner = "<img src='" . asset($v->image) . "' class='banner' alt=''>";
            if ($v->status === "waiting") {
                $v->status = "<div class='status status-warning'> <div class='indicator'></div> Draft</div>";
            } else {
                $v->status = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
            }

            $v->tanggal = $v->tanggal ? Carbon::parse($v->tanggal)->format('d M Y') : '-';

            $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('informasi.artikel.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }


    // Tambah artikel baru
    public function store(Request $req)
    {
        $input = $req->all();

        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/artikel';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/artikel/' . $namafile;
        }

        $input['status'] = 'waiting';

        $data = Artikel::create($input);

        return apiSuccess($data);
    }
    // Edit artikel.
    public function update(Request $req, $id)
    {
        $input = $req->all();
        $data = Artikel::find($id);
        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/artikel';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/artikel/' . $namafile;
        }
        $data->update($input);

        return apiSuccess($data);
    }
    // Publish lebih dari satu artikel.
    public function publish(Request $req)
    {
        $data = Artikel::whereIn('id', $req->ids)->update(['status' => 'published']);

        return apiSuccess($data);
    }

    // Publish satu artikel.
    public function publish_one($id)
    {
        $data = Artikel::find($id);
        $data->status = "published";
        $data->save();
        return apiSuccess($data);
    }
    // Detail artikel.
    public function detail($id)
    {
        $data = Artikel::find($id);

        return apiSuccess($data);
    }

    // Hapus artikel.
    public function delete($id)
    {
        $data = Artikel::find($id);
        $data->delete();

        return apiSuccess(null, 'Artikel berhasil dihapus');
    }

    public function landing()
    {
        $data = Artikel::where('status', 'published')->orderBy('tanggal', 'desc')->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate()
    {
        $query = Artikel::select('*')->orderBy('tanggal', 'desc');
        $data = $query->paginate(4)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail_landing($id)
    {
        $data = Artikel::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
