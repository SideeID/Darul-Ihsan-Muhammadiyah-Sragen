<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NderekTanglet;
use Illuminate\Support\Carbon;

class NderekTangletController extends Controller
{
    public function list(Request $req)
    {
        $query = NderekTanglet::select('*')->with('narasumber');

        if ($req->status == "answered") {
            $query->where('status', 'answered');
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('nama', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
        } else {
            $data = $query->get();
        };

        foreach ($data as $d => $v) {
            if ($v->status === "answered") {
                $v->status = "<div class='status status-warning'> <div class='indicator'></div> Sudah Dibalas</div>";
            } else {
                $v->status = "<div class='status status-danger'> <div class='indicator'></div> Arsip</div>";
            }

            $v->nama_narasumber = $v->narasumber->nama ?? '-';
            $v->pertanyaan = "<div class='line-clamp-3'>" . $v->pertanyaan . "</div>";

            $v->tanggal = Carbon::parse($v->created_at)->format('d M Y');

            $v->is_action = "<div class='d-flex justify-content-center'>" .
            "<a href='" . route('tanglet.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
            "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
            "</div>";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function submit(Request $req)
    {
        $input = $req->validate([
            'judul' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'pertanyaan' => 'required'
        ]);

        $input['status'] = 'waiting';

        $data = NderekTanglet::create($input);

        return apiSuccess($data, 'Pertanyaan berhasil dibuat.');
    }

    public function detail($id)
    {
        $data = NderekTanglet::find($id);

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function update($id, Request $req)
    {
        $data = NderekTanglet::find($id);

        $data->jawaban = $req->jawaban;
        $data->id_narasumber = $req->id_narasumber;
        $data->status = 'answered';

        $data->save();

        return apiSuccess($data, 'Pertanyaan berhasil dijawab.');
    }

    public function delete($id)
    {
        $data = NderekTanglet::find($id);

        $data->delete();

        return apiSuccess(null, 'Data berhasil dihapus.');
    }

    public function landing()
    {
        $data = NderekTanglet::where('status', 'answered')->orderBy('created_at', 'desc')->with('narasumber')->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate(Request $req)
    {
        $query = NderekTanglet::select('*')->orderBy('created_at', 'desc')->with('narasumber');

        if ($req->status == "answered") {
            $query->where('status', 'answered');
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        $data = $query->paginate(4)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail_landing($id)
    {
        $data = NderekTanglet::with('narasumber')->find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
