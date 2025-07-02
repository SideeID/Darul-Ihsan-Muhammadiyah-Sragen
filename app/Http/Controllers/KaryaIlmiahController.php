<?php

namespace App\Http\Controllers;

use App\Models\KaryaIlmiah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryaIlmiahController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'search' => 'string|nullable',
                'tanggal' => 'date|nullable',
                'status' => 'string|nullable',
            ]);

            $query = KaryaIlmiah::orderBy('created_at', 'desc');

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
                $v->banner = "<img src='" . asset($v->image) . "' class='banner' alt=''>";
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('informasi.karyaIlmiah.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
            }

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
                'penulis' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg',
                'url' => 'required|string|max:255|url',
                'tanggal' => 'nullable|string',
                'status' => 'nullable|string',
            ]);

            if ($req->hasFile('image')) {
                $namafile = $req->image->getClientOriginalName();
                $path = public_path() . '/storage/path/karya_ilmiah';
                $req->image->move($path, $namafile);
                $imagePath = '/storage/path/karya_ilmiah/' . $namafile;
            }

            $data = KaryaIlmiah::create([
                'judul' => $req->judul,
                'penulis' => $req->penulis,
                'image' => $imagePath,
                'url' => $req->url,
                'tanggal' => $req->tanggal,
                'status' => $req->status ?? 'waiting',
            ]);

            return apiSuccess($data, 'Data berhasil disimpan', 201);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'judul' => 'required|string',
                'penulis' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'url' => 'required|string|max:255|url',
                'tanggal' => 'nullable|string',
                'status' => 'nullable|string',
            ]);

            $KaryaIlmiah = KaryaIlmiah::findOrFail($id);

            if ($req->hasFile('image')) {
                if (file_exists(public_path($KaryaIlmiah->image))) {
                    unlink(public_path($KaryaIlmiah->image));
                }

                $namafile = $req->image->getClientOriginalName();
                $path = public_path() . '/storage/path/karya_ilmiah';
                $req->image->move($path, $namafile);
                $imagePath = '/storage/path/karya_ilmiah/' . $namafile;

                $KaryaIlmiah->image = $imagePath;
            }

            $KaryaIlmiah->update([
                'judul' => $req->judul,
                'penulis' => $req->penulis,
                'url' => $req->url,
                'image' => $KaryaIlmiah->image ?? $KaryaIlmiah->getOriginal('image'),
                'tanggal' => $req->tanggal,
                'status' => $req->status,
            ]);

            return apiSuccess($KaryaIlmiah, 'Data berhasil diubah');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function publish(Request $req)
    {
        try {
            $req->validate([
                'ids' => 'required|array',
            ]);

            $data = KaryaIlmiah::whereIn('id', $req->ids)->update(['status' => 'published']);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function publish_one(Request $req, $id)
    {
        try {
            $req->validate([
                'status' => 'required|string',
            ]);

            $data = KaryaIlmiah::find($id);

            $data->update(['status' => $req->status]);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function detail($id)
    {
        try {
            $data = KaryaIlmiah::findOrfail($id);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = KaryaIlmiah::findOrfail($id);
            if (file_exists(public_path($data->image))) {
                unlink(public_path($data->image));
            }

            $data->delete();

            return apiSuccess($data, 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
