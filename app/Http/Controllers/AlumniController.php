<?php

namespace App\Http\Controllers;

use App\Imports\AlumniImport;
use App\Exports\AlumniTemplateExport;
use App\Models\Alumni;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AlumniController extends Controller
{
    public function importAlumni(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
        // try {
        //     Excel::import(new AlumniImport, $request->file('file'));
        //     return apiSuccess(null, 'Data berhasil diimport.');
        // } catch (\Exception $e) {
        //     return apiFailed($e->getMessage(), 500);
        // }

        try {
            Excel::import(new AlumniImport, $request->file('file'));
            return response()->json(['success' => true, 'message' => 'Data berhasil diimport.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function exportAlumniTemplate()
    {
        try {
            return Excel::download(new AlumniTemplateExport, 'template_alumni.xlsx');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function list(Request $req)
    {
        try {
            $req->validate([
                'angkatan' => 'nullable|numeric',
                'search' => 'nullable|string',
            ]);

            $query = Alumni::orderBy('created_at', 'desc');

            if ($req->angkatan) {
                $query->where('tahun_lulus', $req->angkatan);
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
                $v->is_action = "<div class='d-flex justify-content-center'>" .
                    "<a href='" . route('informasi.alumni.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
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
            $data = Alumni::find($id);
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
                'tahun_lulus' => 'required|numeric',
                'lembaga_perusahaan' => 'required|string',
            ]);

            $data = Alumni::create($req->all());
            return apiSuccess($data, 'Data berhasil disimpan.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function update(Request $req, $id)
    {
        try {
            $req->validate([
                'nama' => 'required|string',
                'tahun_lulus' => 'required|numeric',
                'lembaga_perusahaan' => 'required|string',
            ]);

            $data = Alumni::find($id);
            $data->update($req->all());
            return apiSuccess($data, 'Data berhasil diupdate.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = Alumni::find($id);
            $data->delete();
            return apiSuccess($data, 'Data berhasil dihapus.');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
