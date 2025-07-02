<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Models\ProfilFiles;
use App\Models\Slideshow;
use Carbon\Carbon;

class ProfilController extends Controller
{
    public function list(Request $req)
    {
        $query = Profil::select('*');

        if ($req->status) {
            $query->where('status', $req->status);
        }

        if ($req->tanggal) {
            $query->whereDate('created_at', $req->tanggal);
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
            if ($v->status === "waiting") {
                $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
            } else {
                $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
            }

            $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('tentang_kami.profil.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";;
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function list_slides(Request $req)
    {
        $query = Slideshow::select('*');


        $data = $query->get();

        foreach ($data as $d => $v) {
            $v->is_action = "";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }


    public function store(Request $req)
    {
        $input = $req->all();
        $input['status'] = 'waiting';

        $data = Profil::create($input);
        if ($req->files) {
            $files = $req->file('files');
            if ($req->hasFile('files')) {
                foreach ($files as $file) {
                    $namafile = $file->getClientOriginalName();
                    $path = public_path() . '/storage/path/profil';
                    $size = $file->getSize();
                    $file->move($path, $namafile);
                    ProfilFiles::create([
                        'profil_id' => $data->id,
                        'file' => '/storage/path/profil/' . $namafile,
                        'original' => $namafile,
                        'size' => $size,
                    ]);
                }
            }
        }


        return apiSuccess(Profil::with('files')->find($data->id));
    }

    // Edit Profil.
    public function update(Request $req, $id)
    {
        $input = $req->except(['ids', 'files', 'new']);
        $arr = [];
        $model = Profil::with('files')->find($id);
        $model->update($input);
        $ids = $req->ids;
        if ($req->file('files')) {
            $files = $req->file('files');
            for ($i = 0; $i < count($ids); $i++) {
                $model = ProfilFiles::find($ids[$i]);
                $size = $files[$i]->getSize();
                $namafile = $files[$i]->getClientOriginalName();
                $path = public_path() . '/storage/path/profil';
                $files[$i]->move($path, $namafile);
                $model->file = '/storage/path/profil/' . $namafile;
                $model->original = $namafile;
                $model->size = $size;
                $model->save();
                array_push($arr, $model);
            }
        }

        if ($req->file('new')) {
            foreach ($req->file('new') as $file) {
                $namafile = $file->getClientOriginalName();
                $size = $file->getSize();
                $path = public_path() . '/storage/path/profil';
                $file->move($path, $namafile);
                ProfilFiles::create([
                    'file' => '/storage/path/profil/' . $namafile,
                    'profil_id' => $id,
                    'original' => $namafile,
                    'size' => $size,
                ]);
            }
        }

        return apiSuccess(Profil::with('files')->find($id), 'Data berhasil diupdate');
    }
    public function publish(Request $req)
    {
        $data = Profil::whereIn('id', $req->ids)->update(['status' => 'published']);

        return apiSuccess($data);
    }

    public function publish_one($id)
    {
        $data = Profil::find($id);
        $data->status = "published";
        $data->save();
        return apiSuccess($data);
    }
    public function detail($id)
    {
        $data = Profil::with('files')->find($id);

        return apiSuccess($data);
    }

    public function delete($id)
    {
        $data = Profil::find($id);
        $data->delete();

        return apiSuccess(null, 'Berita berhasil dihapus');
    }

    public function landing()
    {
        $data = Profil::with('files')->where('status', 'published')->orderBy('created_at', 'desc')->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function landing_detail($id)
    {
        $data = Profil::with('files')->find($id);

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate()
    {
        $query = Profil::select('*')->orderBy('tanggal', 'desc');
        $data = $query->paginate(4)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail_landing($id)
    {
        $data = Profil::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function delete_file($id)
    {
        $data = ProfilFiles::find($id);
        $data->delete();

        return apiSuccess($data, 'Data berhasil dihapus.');
    }
}
