<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'status' => 'nullable|string',
                'search' => 'nullable|string',
            ]);

            $query = Testimoni::orderBy('created_at', 'desc');

            if ($req->status) {
                $query->where('status', $req->status);
            }

            if ($req->search) {
                $query->where('nama', 'like', "%$req->search%");
            }

            if ($req->table) {
                $data = $query->paginate($req->limit)->withQueryString();
            } else {
                $data = $query->get();
            }

            foreach ($data as $d => $v) {
                if ($v->status === "waiting") {
                    $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
                } else {
                    $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
                }
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<a href='" . route('informasi.testimoni.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
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
            $data = Testimoni::find($id);
            return apiSuccess($data, 'Data berhasil diambil.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function store(Request $req)
    {
        try {
            $req->validate([
                'nama' => 'required|string',
                'wali' => 'required|string',
                'keterangan' => 'required|string',
                'file' => 'required|image|mimes:png,jpg,jpeg',
                'status' => 'required|string',
            ]);

            $input = $req->all();

            if ($req->file) {
                $namaFile = $req->file->getClientOriginalName();
                $path = public_path() . '/storage/path/testimoni';
                $req->file->move($path, $namaFile);
                $input['file'] = 'storage/path/testimoni/' . $namaFile;
            }

            $data = Testimoni::create($input);

            return apiSuccess($data, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'nama' => 'required|string',
                'wali' => 'required|string',
                'keterangan' => 'required|string',
                'file' => 'nullable|image|mimes:png,jpg,jpeg',
                'status' => 'required|string',
            ]);

            $data = Testimoni::find($id);
            $input = $req->all();

            if ($req->file) {
                $namaFile = $req->file->getClientOriginalName();
                $path = public_path() . '/storage/path/testimoni';
                $req->file->move($path, $namaFile);
                $input['file'] = 'storage/path/testimoni/' . $namaFile;
            }

            $data->update($input);
            return apiSuccess($data, 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
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

            $data = Testimoni::find($id);
            $data->update(['status' => $req->status]);
            return apiSuccess($data, 'Data berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = Testimoni::find($id);
            if (file_exists(public_path($data->file))) {
                unlink(public_path($data->file));
            }
            $data->delete();
            return apiSuccess($data, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
