<?php

namespace App\Http\Controllers;

use App\Models\LowonganKerja;
use Illuminate\Http\Request;

class LowonganKerjaController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'status' => 'nullable|string',
                'search' => 'nullable|string',
            ]);

            $query = LowonganKerja::orderBy('created_at', 'desc');

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
                    "<a href='" . route('admin.informasi.loker.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
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
            $data = LowonganKerja::find($id);

            if ($data->foto) {
                $data->file_url = asset($data->foto);
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
                'posisi' => 'required|string',
                'tanggal_dibuka' => 'required|date',
                'tanggal_ditutup' => 'required|date',
                'foto' => 'required|image|mimes:png,jpg,jpeg',
                'status' => 'required|string',
            ]);

            $input = $req->all();

            if ($req->hasFile('foto')) {
                $file = $req->file('foto');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $path = 'storage/lowongan-kerja';
                $file->move(public_path($path), $namaFile);
                $input['foto'] = $path . '/' . $namaFile;
            }

            $data = LowonganKerja::create($input);

            return apiSuccess($data, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'posisi' => 'required|string',
                'tanggal_dibuka' => 'required|date',
                'tanggal_ditutup' => 'required|date',
                'foto' => 'nullable|image|mimes:png,jpg,jpeg',
                'status' => 'required|in:draft,published',
            ]);

            $data = LowonganKerja::findOrFail($id);
            $input = $req->except(['foto']); // Exclude foto from input

            // Hapus foto lama dan simpan foto baru jika ada
            if ($req->hasFile('foto')) {
                // Hapus foto lama
                if ($data->foto && file_exists(public_path($data->foto))) {
                    unlink(public_path($data->foto));
                }

                $file = $req->file('foto');
                $namaFile = time() . '_' . $file->getClientOriginalName();
                $path = 'storage/lowongan-kerja';
                $file->move(public_path($path), $namaFile);
                $input['foto'] = $path . '/' . $namaFile;
            }

            $data->update($input);
            return apiSuccess($data, 'Data berhasil diupdate.');
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

            $data = LowonganKerja::find($id);
            $data->update(['status' => $req->status]);
            return apiSuccess($data, 'Data berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = LowonganKerja::find($id);
            $data->delete();
            return apiSuccess($data, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
