<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasFiles;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'tanggal' => 'nullable|date',
                'status' => 'nullable|string',
                'search' => 'nullable|string'
            ]);

            $query = Fasilitas::with('files')->select('*');

            if ($req->tanggal) {
                $query->whereDate('tanggal', $req->tanggal);
            }

            if ($req->status) {
                $query->where('status', $req->status);
            }

            if ($req->search) {
                $query->where('judul', 'like', "%$req->search%");
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
                $v->foto = count($v->files);
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<a href='" . route('tentang_kami.fasilitas.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
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
                'judul' => 'required|string|max:255',
                'tanggal' => 'nullable|string',
                'status' => 'nullable|string',
                'files' => 'nullable|array',
                'files.*' => 'nullable|file|mimes:jpg,jpeg,png'
            ]);

            $input = $req->except('files');
            $input['status'] = 'waiting';
            $input['tanggal'] = date('Y-m-d');

            $fasilitas = Fasilitas::create($input);

            if ($req->has('files')) {
                $files = $req->file('files');

                if ($req->hasFile('files')) {
                    foreach ($files as $file) {
                        $namaFile = $file->getClientOriginalName();
                        $path = public_path() . '/storage/path/fasilitas';
                        $file->move($path, $namaFile);

                        FasilitasFiles::create([
                            'fasilitas_id' => $fasilitas->id,
                            'file' => '/storage/path/fasilitas/' . $namaFile,
                            'original' => $namaFile,
                        ]);
                    }
                }
            }

            return apiSuccess(Fasilitas::with('files')->find($fasilitas->id), 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'judul' => 'required|string|max:255',
                'tanggal' => 'nullable|date',
                'status' => 'required|string',
                'files' => 'nullable|array',
                'files.*' => 'nullable|file|mimes:jpg,jpeg,png',
                'ids' => 'nullable|array',
                'new' => 'nullable|array',
                'new.*' => 'nullable|file|mimes:jpg,jpeg,png'
            ]);

            $fasilitas = Fasilitas::findOrFail($id);

            $input = $req->except(['ids', 'files', 'new']);
            $fasilitas->update($input);

            $path = public_path('/storage/path/fasilitas');

            if ($req->has('files') && $req->has('ids')) {
                $files = $req->file('files');
                $ids = $req->input('ids');

                foreach ($files as $index => $file) {
                    if (isset($ids[$index])) {
                        $fasilitasFile = FasilitasFiles::find($ids[$index]);

                        if ($fasilitasFile) {
                            if (file_exists(public_path($fasilitasFile->file))) {
                                unlink(public_path($fasilitasFile->file));
                            }

                            $namaFile = $file->getClientOriginalName();
                            $file->move($path, $namaFile);

                            $fasilitasFile->update([
                                'file' => '/storage/path/fasilitas/' . $namaFile,
                                'original' => $namaFile,
                            ]);
                        }
                    }
                }
            }

            if ($req->has('new')) {
                $newFiles = $req->file('new');

                foreach ($newFiles as $newFile) {
                    $namaFile = $newFile->getClientOriginalName();
                    $newFile->move($path, $namaFile);

                    FasilitasFiles::create([
                        'fasilitas_id' => $fasilitas->id,
                        'file' => '/storage/path/fasilitas/' . $namaFile,
                        'original' => $namaFile,
                    ]);
                }
            }

            return apiSuccess(Fasilitas::with('files')->find($fasilitas->id), 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function detail($id)
    {
        try {
            $fasilitas = Fasilitas::with('files')->findOrFail($id);

            return apiSuccess($fasilitas, 'Data berhasil diambil.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $fasilitas = Fasilitas::findOrFail($id);

            $fasilitas->delete();

            return apiSuccess(null, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete_file($id)
    {
        try {
            $file = FasilitasFiles::findOrFail($id);

            if (file_exists(public_path($file->file))) {
                unlink(public_path($file->file));
            }

            $file->delete();

            return apiSuccess(null, 'File berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function publish_one($id)
    {
        try {
            $fasilitas = Fasilitas::findOrFail($id);

            $fasilitas->update([
                'status' => 'published'
            ]);

            return apiSuccess($fasilitas, 'Data berhasil dipublish.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function publish(Request $req)
    {
        try {
            $req->validate([
                'ids' => 'required|array'
            ]);

            $fasilitas = Fasilitas::whereIn('id', $req->ids)->update([
                'status' => 'published'
            ]);

            return apiSuccess($fasilitas, 'Data berhasil dipublish.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
