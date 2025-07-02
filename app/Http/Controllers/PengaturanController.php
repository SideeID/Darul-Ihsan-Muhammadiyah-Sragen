<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Narasumber;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PPDB;
use App\Models\BannerPPDB as Banner;
use App\Models\Slideshow;
use Spatie\Permission\Models\Role;

class PengaturanController extends Controller
{
    public function partner_store(Request $req)
    {
        $data = $req->all();

        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/partners/';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/partners/' . $namafile;
        }
        $res = Partner::create($data);

        return apiSuccess($res);
    }

    public function partner_update(Request $req, $id)
    {
        $data = Partner::find($id);
        $input = $req->all();
        if ($req->image) {
            $namafile = $req->image->getClientOriginalName();
            $path = public_path() . '/storage/path/partners/';
            $req->image->move($path, $namafile);
            $input['image'] = '/storage/path/partners/' . $namafile;
        }
        $data->update($input);

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function partner_detail($id)
    {
        $data = Partner::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }

        return apiSuccess($data, ' Data berhasil diambil.');
    }

    public function partner_delete($id)
    {
        $data = Partner::find($id);

        if (!$data) {
            return apiFailed(null, 'Data kosong');
        }

        $data->delete();

        return apiSuccess(null, 'Data berhasil dihapus');
    }

    public function partner_list(Request $req)
    {
        $query = Partner::select('*');

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('nama', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
        } else {
            $data = $query->get();
        }
        ;

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function narasumber_store(Request $req)
    {
        $data = $req->all();
        $res = Narasumber::create($data);

        return apiSuccess($res);
    }

    public function narasumber_update(Request $req, $id)
    {
        $data = Narasumber::find($id);
        $input = $req->all();
        $data->update($input);

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function narasumber_detail($id)
    {
        $data = Narasumber::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function narasumber_delete($id)
    {
        $data = Narasumber::find($id);

        if (!$data) {
            return apiFailed(null, 'Data kosong');
        }

        $data->delete();

        return apiSuccess(null, 'Data berhasil dihapus');
    }

    public function narasumber_list(Request $req)
    {
        $query = Narasumber::select('*');

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('nama', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();

            foreach ($data as $d => $v) {
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<button type='button' class='btn btn-outline-warning me-2' data-id='" . $v->id . "' onclick='getData(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Ubah Data'><img src='" . asset('image/icon/icon-edit.svg') . "' alt='ediit'></button>" .
                    "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                    "</div>";
            }
        } else {
            $data = $query->get();
        }
        ;

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function profile(Request $req)
    {
        $user = User::find($req->user()->id);
        if ($req->password) {
            $validated = $req->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', 'confirmed'],
            ]);

            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        $data = $req->except('password');
        if ($req->foto) {
            $namafile = $req->foto->getClientOriginalName();
            $path = public_path() . '/storage/path/user/';
            $req->foto->move($path, $namafile);
            $data['image'] = '/storage/path/user/' . $namafile;
        }
        $res = $user->update($data);

        return apiSuccess($req->user(), 'Data user berhasil diupdate.');
    }

    public function user_list(Request $req)
    {
        $query = User::with('roles')->select('*');

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('name', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
        } else {
            $data = $query->get();
        }
        ;

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function user_detail($id)
    {
        $data = User::with('roles')->find($id);

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function user_store(Request $req)
    {
        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ]);

        if ($req->role) {
            $role = Role::find($req->role);
            $user->assignRole($role);
        }

        return apiSuccess($user, 'Data berhasil dibuat.');
    }

    public function user_update(Request $req, $id)
    {
        $data = User::find($id);

        $input = $req->all();

        if ($req->new_password) {
            $input['password'] = Hash::make($req->new_password);
        }

        if ($req->role) {
            $role = Role::find($req->role);
            $data->syncRoles([]);
            $data->assignRole($role);
        }

        $data->update($input);

        return apiSuccess($data);
    }

    public function user_delete($id)
    {
        $data = User::find($id);
        $data->syncRoles([]);
        $data->delete();

        return apiSuccess($data, 'Data berhasil dihapus.');
    }

    public function role_update(Request $req, $id)
    {
        $data = User::find($id);
        $role = Role::find($req->role);
        $data->syncRoles([]);
        $data->assignRole($role);

        return apiSuccess($data, 'Role pengguna berhasil diubah.');
    }

    public function role_list(Request $req)
    {
        $data = Role::all();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function ppdb_store(Request $req)
    {
        $data = $req->all();
        $res = PPDB::create($data);

        return apiSuccess($res);
    }

    public function ppdb_update(Request $req, $id)
    {
        $data = PPDB::find($id);
        $input = $req->all();
        $data->update($input);

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function ppdb_detail($id)
    {
        $data = PPDB::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function ppdb_delete($id)
    {
        $data = PPDB::find($id);

        if (!$data) {
            return apiFailed(null, 'Data kosong');
        }

        $data->delete();

        return apiSuccess(null, 'Data berhasil dihapus');
    }

    public function ppdb_list(Request $req)
    {
        $query = PPDB::select('*');

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('deskripsi', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();

            foreach ($data as $d => $v) {
                $v->is_action = "";
            }
        } else {
            $data = $query->get();
        }
        ;

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function ppdb_landing(Request $req)
    {
        $data = PPDB::all();

        return apiSuccess($data);
    }

    public function ppdb_banner_store(Request $req)
    {
        $data = $req->all();
        if ($req->file) {
            $namafile = $req->file->getClientOriginalName();
            $path = public_path() . '/storage/path/banner/';
            $req->file->move($path, $namafile);
            $data['file'] = '/storage/path/banner/' . $namafile;
        }
        $res = Banner::create($data);

        return apiSuccess($res);
    }

    public function ppdb_banner_update(Request $req, $id)
    {
        $data = Banner::find($id);
        $input = $req->all();
        if ($req->file) {
            $namafile = $req->file->getClientOriginalName();
            $path = public_path() . '/storage/path/banner/';
            $req->file->move($path, $namafile);
            $input['file'] = '/storage/path/banner/' . $namafile;
        }
        $data->update($input);

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function ppdb_banner_detail($id)
    {
        $data = Banner::find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function ppdb_banner_delete($id)
    {
        $data = Banner::find($id);

        if (!$data) {
            return apiFailed(null, 'Data kosong');
        }

        $data->delete();

        return apiSuccess(null, 'Data berhasil dihapus');
    }

    public function ppdb_banner_list(Request $req)
    {
        $query = Banner::select('*');

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('text', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();

            foreach ($data as $d => $v) {
                $v->is_action = "";
            }
        } else {
            $data = $query->get();
        }
        ;

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function ppdb_banner_landing(Request $req)
    {
        $data = Banner::all();

        return apiSuccess($data);
    }


    public function slides_store(Request $req)
    {
        $arr = [];
        if ($req->files) {
            $files = $req->file('files');
            $headlines = $req->headline;

            if ($req->hasFile('files')) {
                foreach ($files as $key => $file) {
                    $namafile = $file->getClientOriginalName();
                    $path = public_path() . '/storage/path/slides';
                    $file->move($path, $namafile);

                    array_push($arr, Slideshow::create([
                        'file' => '/storage/path/slides/' . $namafile,
                        'original' => $namafile,
                        'headline' => $headlines[$key] ?? null
                    ]));
                }
            }
        }
        return apiSuccess($arr);
    }

    public function slides_update(Request $req)
    {
        $ids = $req->ids;
        $headlines = $req->headline;
        $arr = [];

        // Proses update untuk data yang sudah ada
        if (!empty($ids)) {
            for ($i = 0; $i < count($ids); $i++) {
                $model = Slideshow::find($ids[$i]);
                if ($model) {
                    $model->headline = $headlines[$i] ?? $model->headline;

                    // Jika file baru diunggah untuk item yang ada
                    if ($req->file('files') && isset($req->file('files')[$i])) {
                        $file = $req->file('files')[$i];
                        $namafile = $file->getClientOriginalName();
                        $path = public_path() . '/storage/path/slides';
                        $file->move($path, $namafile);

                        $model->file = '/storage/path/slides/' . $namafile;
                        $model->original = $namafile;
                    }

                    $model->save();
                    array_push($arr, $model);
                }
            }
        }

        // Proses penambahan data baru
        if ($req->file('new')) {
            $newFiles = $req->file('new');
            $newHeadlines = array_slice($headlines, count($ids) ?? 0);

            foreach ($newFiles as $key => $file) {
                $namafile = $file->getClientOriginalName();
                $path = public_path() . '/storage/path/slides';
                $file->move($path, $namafile);

                Slideshow::create([
                    'file' => '/storage/path/slides/' . $namafile,
                    'original' => $namafile,
                    'headline' => $newHeadlines[$key] ?? null
                ]);
            }
        }

        return apiSuccess(Slideshow::all(), 'Data berhasil diupdate.');

    }

    public function slides_detail($id)
    {
        $model = Slideshow::find($id);

        return apiSuccess($model, 'Data berhasil diambil.');
    }

    public function slides_delete($id)
    {
        $model = Slideshow::find($id);
        $model->delete();

        return apiSuccess($model, 'Data berhasil dihapus.');
    }

    public function slides_landing(Request $req)
    {
        $data = Slideshow::all();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function slides_list(Request $req)
    {
        $query = Slideshow::select('*');


        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
            foreach ($data as $d => $v) {
                $v->is_action = "";
            }
        } else {
            $data = $query->get();
        }
        ;

        foreach ($data as $d => $v) {
            $v->is_action = "";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }
}
