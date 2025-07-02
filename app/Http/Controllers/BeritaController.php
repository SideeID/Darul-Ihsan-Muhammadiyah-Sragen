<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    // upload image CKEditor
    public function uploadImage(Request $req)
    {
        try {
            $req->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $uploadedFile = $req->file('upload');
            $namafile = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
            $path = public_path('storage/path/berita');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            // Inisialisasi Image Manager
            $manager = new ImageManager(new Driver());
            $image = $manager->read($uploadedFile);

            // Kompresi dan simpan gambar
            // https://image.intervention.io/v3/basics/image-output#encode-images-with-encoder-objects
            $fullPath = $path . '/' . $namafile;
            $image
                ->scale(width: 800)
                ->encode(new AutoEncoder(quality: 75))
                ->save($fullPath);

            $url = '/storage/path/berita/' . $namafile;

            return response()->json([
                'filename' => $namafile,
                'uploaded' => 1,
                'url' => $url,
            ]);

        } catch (\Exception $e) {
            return apiFailed(null, 'Gagal mengupload gambar: ' . $e->getMessage());
        }
    }

    // Get kategori berita.
    public function kategori_list(Request $req)
    {
        $data = KategoriBerita::all();

        if ($req->table) {
            $data = KategoriBerita::paginate($req->limit)->withQueryString();
        } else {
            $data = KategoriBerita::all();
        }

        foreach ($data as $d => $v) {
            if ($v->status === "active") {
                $v->switch = "<div class='form-check form-switch'>" .
                    "<input class='form-check-input' type='checkbox' role='switch' id='switch-" . $v->id . "' onchange='confirmStatusChange(" . $v->id . ", \" inactive\")' checked>" .
                    "<label class='form-check-label' for='switch-" . $v->id . "'></label>" .
                    "<span class='ms-2'>Active</span>" .
                    "</div>";
            } else {
                $v->switch = "<div class='form-check form-switch'>" .
                    "<input class='form-check-input' type='checkbox' role='switch' id='switch-" . $v->id . "' onchange='confirmStatusChange(" . $v->id . ", \"active\")'>" .
                    "<label class='form-check-label' for='switch-" . $v->id . "'></label>" .
                    "<span class='ms-2'>Inactive</span>" .
                    "</div>";
            }

            $v->is_action = "<div class='d-flex justify-content-center'>" .
            "<button type='button' id='buttonEdit' class='btn btn-outline-black me-2' data-id='" . $v->id . "' onclick='openForm(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Edit Data' data-bs-toggle='modal' data-bs-target='#modal-edit-media'><img src='" . asset('image/icon/icon-detail-black.svg') . "' class='' alt='edit'></button>" .
            "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
            "</div>";
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }

    // list kategori dengan status published.
    public function kategori_list_published(Request $req)
    {
        $data = KategoriBerita::where('status', 'active')->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    // Get berita dengan status published.
    public function list(Request $req)
    {
        $query = Berita::select('*')->orderBy('tanggal', 'desc');

        if ($req->status) {
            $query->where('status', $req->status);
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->tanggal) {
            $query->where('tanggal', $req->tanggal);
        }

        if ($req->kategori) {
            $query->where('kategori', $req->kategori);
        }

        if ($req->table) {
            $data = $query->paginate($req->limit)->withQueryString();
        } else {
            $data = $query->get();
        }
        ;

        foreach ($data as $d => $v) {
            $v->banner = "<img src='" . asset($v->image) . "' class='banner' alt=''>";
            if ($v->status === "waiting") {
                $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
            } else {
                $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
            }

            $v->tanggal = $v->tanggal ? Carbon::parse($v->tanggal)->format('d M Y') : '-';

            if ($v->sorotan === "true") {
                $v->switch = "<div class='form-check form-switch'>" .
                    "<input class='form-check-input' type='checkbox' role='switch' id='switch-" . $v->id . "' onchange='changeSorotan(" . $v->id . ", " . 'false' . ")' checked>" .
                    "<label class='form-check-label' for='switch-" . $v->id . "'></label>" .
                    "</div>";
            } else {
                if ($v->status === "waiting") {
                    $v->switch = '<div class="form-check form-switch" onclick="showAlert(\'Perhatian!\', \'Data ini belum di publish. Silahkan publish terlebih dahulu untuk mengaktifkan sorotan!\', \'warning\')">' .
                        "<input class='form-check-input' type='checkbox' role='switch' id='switch-" . $v->id . "' disabled> " .
                        "<label class='form-check-label' for='switch-" . $v->id . "'></label>" .
                        "</div>";
                } else {
                    $v->switch = "<div class='form-check form-switch'>" .
                        "<input class='form-check-input' type='checkbox' role='switch' id='switch-" . $v->id . "' onchange='changeSorotan(" . $v->id . ", " . 'true' . ")'> " .
                        "<label class='form-check-label' for='switch-" . $v->id . "'></label>" .
                        "</div>";
                }
            }

            $v->is_action = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('informasi.berita.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    // Tambah berita baru
    public function store(Request $req)
    {
        try {
            $req->validate([
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $input = $req->all();

            if ($req->hasFile('image')) {
                $uploadedFile = $req->file('image');
                $namafile = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
                $path = public_path('storage/path/berita');

                // Inisialisasi Image Manager
                $manager = new ImageManager(new Driver());
                $image = $manager->read($uploadedFile);

                // Kompresi dan simpan gambar
                $fullPath = $path . '/' . $namafile;
                $image
                    ->scale(width: 800)
                    ->encode(new AutoEncoder(quality: 75))
                    ->save($fullPath);

                $input['image'] = '/storage/path/berita/' . $namafile;
            }

            if (strlen($req->isi) > 340) {
                $pos = substr($req->isi, 0, 340);
                $input['summary'] = substr($req->isi, 0, strrpos($pos, ' ')) . " ...";
            } else {
                $input['summary'] = $req->isi;
            }

            $input['status'] = 'waiting';

            $data = Berita::create($input);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed(null, 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // Tambah kategori berita.
    public function kategori_store(Request $req)
    {
        try {
            $req->validate([
                'judul' => 'required|string',
                'status' => 'nullable',
            ]);

            $data = KategoriBerita::create([
                'judul' => $req->judul,
                'status' => $req->status ?? 'published'
            ]);

            return apiSuccess($data, 'Data berhasil ditambahkan.');
        } catch (\Exception $e) {
            return apiFailed(null, 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    // Edit berita.
    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $input = $req->all();
            $data = Berita::findOrFail($id);

            if ($req->hasFile('image')) {
                $uploadedFile = $req->file('image');
                $namafile = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
                $path = public_path('storage/path/berita');

                // Inisialisasi Image Manager
                $manager = new ImageManager(new Driver());
                $image = $manager->read($uploadedFile);

                // Kompresi dan simpan gambar
                $fullPath = $path . '/' . $namafile;
                $image
                    ->scale(width: 800)
                    ->encode(new AutoEncoder(quality: 75))
                    ->save($fullPath);

                $input['image'] = '/storage/path/berita/' . $namafile;
            }

            if (strlen($req->isi) > 340) {
                $pos = substr($req->isi, 0, 340);
                $input['summary'] = substr($req->isi, 0, strrpos($pos, ' ')) . " ...";
            } else {
                $input['summary'] = $req->isi;
            }

            $data->update($input);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed(null, 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Edit kategori berita.
    public function kategori_update(Request $req, $id)
    {
        try {
            $req->validate([
                'judul' => 'required|string',
            ]);

            $data = KategoriBerita::find($id);

            $data->update([
                'judul' => $req->judul,
            ]);

            return apiSuccess($data, 'Data berhasil diubah.');
        } catch (\Exception $e) {
            return apiFailed(null, 'Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    // Publish lebih dari satu berita.
    public function publish(Request $req)
    {
        $data = Berita::whereIn('id', $req->ids)->update(['status' => 'published']);

        return apiSuccess($data);
    }

    // Publish satu berita.
    public function publish_one($id)
    {
        $data = Berita::find($id);
        $data->status = "published";
        $data->save();
        return apiSuccess($data);
    }

    // publish kategori berita.
    public function kategori_publish(Request $req, $id)
    {
        $data = KategoriBerita::findOrFail($id);
        $data->status = $req->input('status', 'inactive');
        $data->save();

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    // Detail berita.
    public function detail($id)
    {
        $data = Berita::findOrfail($id);

        return apiSuccess($data);
    }

    // Detail kategori berita.
    public function kategori_detail($id)
    {
        $data = KategoriBerita::findOrfail($id);

        return apiSuccess($data);
    }

    // Hapus berita.
    public function delete($id)
    {
        $data = Berita::find($id);
        $data->delete();

        return apiSuccess(null, 'Berita berhasil dihapus');
    }

    // Hapus kategori berita.
    public function kategori_delete($id)
    {
        $data = KategoriBerita::find($id);
        $data->delete();

        return apiSuccess(null, 'Kategori berhasil dihapus');
    }

    public function sorotan($id, Request $req)
    {
        $data = Berita::find($id);
        $data->sorotan = $req->sorotan;
        $data->save();

        return apiSuccess($data, 'Data berhasil diupdate.');
    }

    public function landing(Request $req)
    {
        $data = Berita::with('kategori')->where('status', 'published')->orderBy('tanggal', 'desc');

        if ($req->kategori) {
            // if ($req->kategori == "Kabar SMALAB") {
            //     $data->whereIn('kategori', ['Kabar SMALAB', 'Jurnalistik Siswa']);
            // } else {
            $data->where('kategori', $req->kategori);
            // }
        }

        if ($req->search) {
            $data->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->tahun) {
            $data->whereYear('tanggal', $req->tahun);
        }

        if ($req->sorotan) {
            $data->where('sorotan', $req->sorotan);
        }

        if ($req->limit) {
            $data->take($req->limit);
        }

        $data = $data->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function paginate(Request $req)
    {
        $query = Berita::with('kategori')->select('*')->where('status', 'published');

        if ($req->kategori) {
            $query->where('kategori', $req->kategori);
        }

        if ($req->tahun) {
            $query->whereYear('tanggal', $req->tahun);
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }
        $data = $query->paginate($req->limit)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail_landing($id)
    {
        $data = Berita::with('kategori')->find($id);

        if (!$data) {
            return apiFailed(null, 'Data tidak ditemukan.');
        }
        return apiSuccess($data, 'Data berhasil diambil.');
    }


    //     public function uploadImage(Request $request)
// {
//     if ($request->hasFile('upload')) {
//         $file = $request->file('upload');
//         $filename = time() . '_' . $file->getClientOriginalName();
//         $path = $file->storeAs('public/uploads', $filename);
//         $url = asset('/storage/path/berita/' . $filename);
//         return response()->json(['uploaded' => true, 'url' => $url]);
//     }

    //     return response()->json(['uploaded' => false, 'error' => ['message' => 'Gagal mengunggah gambar']]);
// }

}
