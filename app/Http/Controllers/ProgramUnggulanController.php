<?php

namespace App\Http\Controllers;

use App\Models\ProgramUnggulan;
use Illuminate\Http\Request;

class ProgramUnggulanController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'search' => 'string|nullable',
                'status' => 'string|nullable',
            ]);

            $query = ProgramUnggulan::orderBy('created_at', 'desc');

            if ($req->search) {
                $query->where('nama', 'like', "%$req->search%");
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
                if ($v->status === "waiting") {
                $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
                } else {
                    $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
                }

                $v->gambar = "<img src='" . $v->gambar_url . "' class='gambar' alt=''>";
                if (strlen($v->url) > 35) {
                    $v->url = substr($v->url, 0, 35) . '...';
                }

                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<button type='button' id='buttonEdit' class='btn btn-outline-black me-2' style='border-radius: 8px; padding: 7px 7px;' data-id='" . $v->id . "' onclick='window.location.href=\"" . route('tentang_sekolah.edit_program', $v->id) . "\"' data-bs-toggle='tooltip' data-bs-title='Edit Data' data-bs-toggle='modal' data-bs-target='#modal-edit-media'><img src='" . asset('image/icon/icon-detail-black.svg') . "' class='' alt='edit'></button>" .
                    "<button type='button' class='btn btn-outline-danger' style='border-radius: 8px; padding: 7px 7px;' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
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
            $data = ProgramUnggulan::find($id);

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
                'deskripsi' => 'required|string',
                'gambar' => 'required|image|mimes:png,jpg,jpeg',
                'url' => 'required|string',
                'status' => 'required|string',
            ]);

            $input = $req->all();

            if ($req->gambar) {
                $namafile = $req->gambar->getClientOriginalName();
                $path = public_path() . '/storage/path/program-unggulan';
                $req->gambar->move($path, $namafile);
                $input['gambar'] = '/storage/path/program-unggulan/' . $namafile;
            }

            $data = ProgramUnggulan::create($input);

            return apiSuccess($data, 'Data berhasil ditambahkan.', 201);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'nama' => 'required|string',
                'deskripsi' => 'required|string',
                'gambar' => 'image|mimes:png,jpg,jpeg',
                'url' => 'required|string',
                'status' => 'required|string',
            ]);

            $input = $req->all();
            $data = ProgramUnggulan::find($id);

            if ($req->gambar) {
                $namafile = $req->gambar->getClientOriginalName();
                $path = public_path() . '/storage/path/program-unggulan';
                $req->gambar->move($path, $namafile);
                $input['gambar'] = '/storage/path/program-unggulan/' . $namafile;
            }

            $data->update($input);

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

            $data = ProgramUnggulan::find($id);
            $data->update(['status' => $req->status]);

            return apiSuccess($data, 'Data berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = ProgramUnggulan::find($id);

            if (file_exists(public_path($data->gambar))) {
                unlink(public_path($data->gambar));
            }

            $data->delete();

            return apiSuccess($data, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
