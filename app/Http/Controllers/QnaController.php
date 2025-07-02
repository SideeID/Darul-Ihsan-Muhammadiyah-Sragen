<?php

namespace App\Http\Controllers;

use App\Models\qna;
use Illuminate\Http\Request;

class QnaController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'search' => 'string|nullable',
                'status' => 'string|nullable',
            ]);

            $query = qna::orderBy('created_at', 'desc');

            if ($req->search) {
                $query->where('pertanyaan', 'like', "%$req->search%");
            }

            if ($req->status) {
                $query->where('status', $req->status);
            }

            if ($req->table) {
                $data = $query->paginate($req->limit)->withQueryString();
            } else {
                $data = $query->get();
            }

            foreach ($data as $d => $v) {
                if ($v->status === "draft") {
                $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
                } else {
                    $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
                }
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<a href='" . route('admin.informasi.qna.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                    "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                    "</div>";
            }

            return apiSuccess($data, 'Data berhasil diambil.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function detail($id)
    {
        try {
            $data = qna::find($id);
            return apiSuccess($data, 'Data berhasil diambil.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'question' => 'required|string',
                'answer' => 'required|string',
                'status' => 'required|string',
            ]);

            $data = qna::create([
                'question' => $req->question,
                'answer' => $req->answer,
                'status' => $req->status ?? 'waiting',
            ]);

            return apiSuccess($data, 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'question' => 'required|string',
                'answer' => 'required|string',
                'status' => 'required|string',
            ]);

            $data = qna::find($id);

            $data->update([
                'question' => $req->question,
                'answer' => $req->answer,
                'status' => $req->status,
            ]);

            return apiSuccess($data, 'Data berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function publish(Request $req, $id)
    {
        try {
            $req->validate([
                'status' => 'required|string',
            ]);

            $data = qna::find($id);

            $data->update([
                'status' => $req->status,
            ]);

            return apiSuccess($data, 'Data berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = qna::find($id);
            $data->delete();

            return apiSuccess($data, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
