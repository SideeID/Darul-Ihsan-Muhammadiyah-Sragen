<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'search' => 'string|nullable',
                'tanggal' => 'date|nullable',
                'status' => 'string|nullable',
            ]);

            $query = Pengumuman::orderBy('created_at', 'desc');

            if ($req->search) {
                $query->where('judul', 'like', '%' . $req->search . '%');
            }

            if ($req->tanggal) {
                $query->whereDate('created_at', $req->tanggal);
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
                if (strlen($v->url) > 35) {
                    $v->url = substr($v->url, 0, 35) . '...';
                }
                if ($v->status === "waiting" || $v->status === NULL) {
                    $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
                } else {
                    $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
                }
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('admin.informasi.pengumuman.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
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
            $data = Pengumuman::find($id);

            return apiSuccess($data, 'Data berhasil diambil.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'judul' => 'required|string',
                'tanggal' => 'required|date',
                'url' => 'required|string',
                'status' => 'required|string',
            ]);

            $data = Pengumuman::create([
                'judul' => $req->judul,
                'tanggal' => $req->tanggal,
                'url' => $req->url,
                'status' => $req->status ?? 'waiting',
            ]);

            return apiSuccess($data, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'judul' => 'required|string',
                'tanggal' => 'required|date',
                'url' => 'required|string',
                'status' => 'required|string',
            ]);

            $data = Pengumuman::find($id);

            $data->update([
                'judul' => $req->judul,
                'tanggal' => $req->tanggal,
                'url' => $req->url,
                'status' => $req->status ?? 'waiting',
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

            $data = Pengumuman::find($id);

            $data->update(['status' => $req->status]);

            return apiSuccess($data, 'Data status berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = Pengumuman::find($id);

            $data->delete();

            return apiSuccess($data, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
