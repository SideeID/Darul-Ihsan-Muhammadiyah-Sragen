<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengurus;

class PengurusController extends Controller
{
    public function list(Request $req)
    {
        $query = Pengurus::select('*');

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();

            foreach ($data as $d => $v) {
                $v->banner = "<img src='" . asset($v->image) . "' class='banner object-fit-contain' alt=''>";

                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<a href='" . route('pengurus.edit', $v->id) . "' class='btn btn-outline-warning me-2' data-bs-toggle='tooltip' data-bs-title='Ubah Data'><img src='" . asset('image/icon/icon-edit.svg') . "' alt='ediit'></a>" .
                    "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                    "</div>";
            }
        } else {
            $data = $query->get();
        };

        return apiSuccess($data, 'Data berhasil diambil.');
    }



    // Tambah pengurus baru
    public function store(Request $req)
    {
        $input = $req->all();
        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/pengurus/';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/pengurus/' . $namafile;
        }
        $data = Pengurus::create($input);

        return apiSuccess($data);
    }
    // Edit pengurus.
    public function update(Request $req, $id)
    {
        $input = $req->all();
        $data = Pengurus::find($id);
        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/pengurus/';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/pengurus/' . $namafile;
        }
        $data->update($input);

        return apiSuccess($data);
    }
    // Detail pengurus.
    public function detail($id)
    {
        $data = Pengurus::find($id);

        return apiSuccess($data);
    }

    // Publish lebih dari satu pengurus.
    public function publish(Request $req)
    {
        $data = Pengurus::whereIn('id', $req->ids)->update(['status' => 'published']);

        return apiSuccess($data);
    }

    // Publish satu pengurus.
    public function publish_one($id)
    {
        $data = Pengurus::find($id);
        $data->status = "published";
        $data->save();
        return apiSuccess($data);
    }

    // Hapus pengurus.
    public function delete($id)
    {
        $data = Pengurus::find($id);
        $data->delete();

        return apiSuccess(null, 'Pengurus berhasil dihapus');
    }

    public function landing()
    {
        $data = Pengurus::all();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate()
    {
        $query = Pengurus::select('*');
        $data = $query->paginate(12)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
