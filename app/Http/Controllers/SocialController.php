<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Carbon;

class SocialController extends Controller
{
    // Get event dengan status active.
    public function list(Request $req)
    {
        $query = Event::select('*')->orderBy('tanggal', 'desc');

        if ($req->status == "active") {
            $query->where('status', 'active');
        }

        if ($req->type) {
            $query->where('type', $req->type);
        }

        if ($req->tanggal) {
            $query->where('tanggal', $req->tanggal);
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
            if ($v->status === "deactive") {
                $v->status = "deactive";
            } else {
                $v->status = "active";
            }

            $v->tanggal = $v->tanggal ? Carbon::parse($v->tanggal)->format('d M Y') : '-';

            $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<button type='button' class='btn btn-outline-warning me-2' data-id='" . $v->id . "' onclick='openForm(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Edit Data'><img src='" . asset('image/icon/icon-edit.svg') . "' class='' alt='detail'></button>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }


    // Tambah event baru
    public function store(Request $req)
    {
        $input = $req->all();

        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/event';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/event/' . $namafile;
        }

        $input['status'] = 'active';

        $data = Event::create($input);

        return apiSuccess($data);
    }
    // Edit event.
    public function update(Request $req, $id)
    {
        $input = $req->all();
        $data = Event::find($id);
        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/event';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/event/' . $namafile;
        }
        $data->update($input);

        return apiSuccess($data);
    }
    // Publish lebih dari satu event.
    public function publish(Request $req)
    {
        $data = Event::whereIn('id', $req->ids)->update(['status' => 'active']);

        return apiSuccess($data);
    }

    // Publish satu event.
    public function publish_one($id)
    {
        $data = Event::find($id);
        $data->status = "active";
        $data->save();
        return apiSuccess($data);
    }
    // Detail event.
    public function detail($id)
    {
        $data = Event::find($id);

        return apiSuccess($data);
    }

    // Hapus event.
    public function delete($id)
    {
        $data = Event::find($id);
        $data->delete();

        return apiSuccess(null, 'Konten berhasil dihapus');
    }

    public function landing(Request $req)
    {
        $data = Event::where('status', 'active');

        if ($req->type) {
            $data->where('type', $req->type);
        }

        if ($req->search) {
            $data->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->tanggal) {
            $data->where('tanggal', $req->tanggal);
        }

        if ($req->limit) {
            $data->take($req->limit);
        }

        $data = $data->orderBy('tanggal', 'desc')->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate(Request $req)
    {
        $query = Event::select('*')->where('status', 'active')->orderBy('tanggal', 'desc');

        if ($req->type) {
            $query->where('type', $req->type);
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->tanggal) {
            $query->where('tanggal', $req->tanggal);
        }

        if ($req->limit) {
            $query->take($req->limit);
        }

        $data = $query->paginate($req->limit)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail_landing($id)
    {
        $data = Event::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
