<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryFiles;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\AutoEncoder;

class GalleryController extends Controller
{
    public function list(Request $req)
    {
        $query = Gallery::with('files')->select('*');

        if (!$req->type) {
            if (request()->routeIs('admin.informasi.galeri.foto.index')) {
                $query->where('type', 'foto');
            } elseif (request()->routeIs('admin.informasi.galeri.video.index')) {
                $query->where('type', 'video');
            }
        }
        
        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->type) {
            $query->where('type', $req->type);
        }

        if ($req->status) {
            $query->where('status', $req->status);
        }

        if ($req->tanggal) {
            $query->whereDate('tanggal', $req->tanggal);
        }

        if ($req->table) {
            $data = $query
                ->orderBy('judul', 'desc')
                ->paginate($req->limit)
                ->withQueryString();
        } else {
            $data = $query->orderBy('judul', 'desc')->get();
        }

        foreach ($data as $d => $v) {
            if ($v->status === 'waiting') {
                $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
            } else {
                $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
            }

            // Jumlah Foto
            $v->foto = count($v->files);
            $v->is_actionFoto = "<div class='d-flex justify-content-center'>" . "<a href='" . route('admin.informasi.galeri.foto.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" . "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" . '</div>';
            $v->is_actionVideo = "<div class='d-flex justify-content-center'>" . "<a href='" . route('admin.informasi.galeri.video.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" . "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" . '</div>';
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    // upload image CKEditor
    public function uploadImage(Request $req)
    {
        try {
            $req->validate([
                'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $uploadedFile = $req->file('upload');
            $namafile = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();
            $path = public_path('storage/path/gallery');

            $manager = new ImageManager(new Driver());
            $image = $manager->read($uploadedFile);

            $fullPath = $path . '/' . $namafile;
            $image->scale(width: 800)->encode(new AutoEncoder(quality: 75))->save($fullPath);

            $url = '/storage/path/gallery/' . $namafile;

            return response()->json([
                'filename' => $namafile,
                'uploaded' => 1,
                'url' => $url,
            ]);
        } catch (\Exception $e) {
            return apiFailed(null, 'Gagal mengupload gambar: ' . $e->getMessage());
        }
    }

    public function store(Request $req)
    {
        // Validasi tipe gallery
        $req->validate([
            'type' => 'required|in:foto,video', // Pastikan hanya ada dua tipe
            'judul' => 'required',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
    
        // Untuk video, tambahkan validasi link video
        if ($req->type === 'video') {
            $req->validate([
                'video_link' => 'required|url'
            ]);
        }
    
        $input = $req->except('guru');
        
        // Set default guru
        if ($req->guru != null && $req->guru != '') {
            $input['guru'] = $req->guru;
        } else {
            $input['guru'] = false;
        }
        
        $input['status'] = 'waiting';
    
        // Untuk video, pastikan hanya menyimpan video link
        if ($req->type === 'video') {
            $input['video_link'] = $req->video_link;
            // Pastikan tidak ada file yang disimpan untuk video
            $input['files'] = null;
        }
    
        $data = Gallery::create($input);
    
        // Hanya proses upload file jika tipe adalah foto
        if ($req->type === 'foto' && $req->hasFile('files')) {
            $files = $req->file('files');
            foreach ($files as $file) {
                $namafile = $file->getClientOriginalName();
                $path = public_path() . '/storage/path/gallery';
                $size = $file->getSize();
                $file->move($path, $namafile);
                GalleryFiles::create([
                    'gallery_id' => $data->id,
                    'file' => '/storage/path/gallery/' . $namafile,
                    'original' => $namafile,
                    'size' => $size
                ]);
            }
        }
    
        return apiSuccess(Gallery::with('files')->find($data->id));
    }

    public function detail($id)
    {
        $data = Gallery::with('files')->find($id);

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function update(Request $req, $id)
    {
        $input = $req->except(['ids', 'files', 'new', 'guru']);
        $arr = [];
        $model = Gallery::with('files')->find($id);

        // Tambahkan logika khusus untuk video
        if ($model->type === 'video') {
            $req->validate([
                'video_link' => 'required|url',
            ]);
            $input['video_link'] = $req->video_link;
        }

        $model->update($input);
        $ids = $req->ids;

        if ($req->file('files')) {
            $files = $req->file('files');
            for ($i = 0; $i < count($ids); $i++) {
                $fileModel = GalleryFiles::find($ids[$i]);
                $size = $files[$i]->getSize();
                $namafile = $files[$i]->getClientOriginalName();
                $path = public_path() . '/storage/path/gallery';
                $files[$i]->move($path, $namafile);
                $fileModel->file = '/storage/path/gallery/' . $namafile;
                $fileModel->original = $namafile;
                $fileModel->size = $size;
                $fileModel->save();
                array_push($arr, $fileModel);
            }
        }

        $model->guru = $req->has('guru') ? $req->guru : false;
        $model->save();

        if ($req->file('new')) {
            foreach ($req->file('new') as $file) {
                $namafile = $file->getClientOriginalName();
                $size = $file->getSize();
                $path = public_path() . '/storage/path/slides';
                $file->move($path, $namafile);
                GalleryFiles::create([
                    'file' => '/storage/path/slides/' . $namafile,
                    'gallery_id' => $id,
                    'original' => $namafile,
                    'size' => $size,
                ]);
            }
        }

        return apiSuccess(Gallery::with('files')->find($id), 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $model = Gallery::find($id);
        $model->delete();

        return apiSuccess(null, 'Data berhasil dihapus.');
    }

    public function landing(Request $req)
    {
        $data = Gallery::with('files')->select('*')->where('status', 'published');

        if ($req->type) {
            $data->where('type', $req->type);
        }

        if ($req->guru) {
            $data->where('guru', $req->guru);
        }

        $data = $data->get();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function landing_detail($id)
    {
        $data = Gallery::with('files')->find($id);

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function landing_paginate(Request $req)
    {
        $query = Gallery::with('files')->select('*')->where('status', 'published');
        if ($req->type) {
            $query->where('type', $req->type);
        }

        if ($req->guru) {
            $query->where('guru', $req->guru);
        }

        if ($req->search) {
            $query->where(function ($search) use ($req) {
                $search->where('judul', 'LIKE', '%' . $req->search . '%');
            });
        }

        if ($req->periode) {
            $vars = explode('-', $req->periode);
            $query->whereYear('tanggal', $vars[1]);
            $query->whereMonth('tanggal', $vars[0]);
        }

        $data = $query->paginate($req->limit)->withQueryString();

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    // Publish satu berita.
    public function publish_one($id)
    {
        $data = Gallery::find($id);
        $data->status = 'published';
        $data->save();
        return apiSuccess($data);
    }

    public function delete_file($id)
    {
        $data = GalleryFiles::find($id);
        $data->delete();
        return apiSuccess($data, 'Data file berhasil dihapus.');
    }
}
