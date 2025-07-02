<?php

namespace App\Http\Controllers;

use App\Models\GuruStaff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruStaffController extends Controller
{
    public function list(Request $req)
    {
        try {
            $req->validate([
                'search' => 'string|nullable',
                'tanggal' => 'date|nullable',
                'status' => 'string|nullable',
                'type' => 'string|nullable',
            ]);

            $query = GuruStaff::orderBy('created_at', 'desc');

            if ($req->search) {
                $query->where('nama', 'like', '%' . $req->search . '%');
            }

            if ($req->type) {
                $query->where('type', $req->type);
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
                if ($v->status === "waiting") {
                    $v->badge = "<div class='status status-warning'> <div class='indicator'></div> Draf</div>";
                } else {
                    $v->badge = "<div class='status status-success'> <div class='indicator'></div> Dipublish</div>";
                }
                $v->is_actionStaff = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('tentang_kami.staf.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
                $v->is_actionPimpinan = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('admin.tentang_kami.dewan.pimpinan.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
                "<button type='button' class='btn btn-outline-danger' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
                $v->is_actionPengasuh = "<div class='d-flex justify-content-center'>" .
                "<a href='" . route('admin.tentang_kami.dewan.pengasuh.detail', $v->id) . "' class='btn btn-outline-black me-2' data-bs-toggle='tooltip' data-bs-title='Detail'><img src='" . asset('image/icon/icon-detail-black.svg') . "' alt='detail'></a>" .
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
                'nama' => 'required|string',
                'jabatan' => 'required|string',
                'riwayat_pendidikan.*' => 'nullable|string',
                'sekolah.*' => 'nullable|string',
                'kota_pendidikan.*' => 'nullable|string',
                'tahun_mulai_pendidikan.*' => 'nullable|string',
                'tahun_berakhir_pendidikan.*' => 'nullable|string',
                'pengalaman.*' => 'nullable|string',
                'pemberi_kerja.*' => 'nullable|string',
                'kota_kerja.*' => 'nullable|string',
                'tahun_mulai_kerja.*' => 'nullable|string',
                'tahun_berakhir_kerja.*' => 'nullable|string',
                'prestasi.*' => 'nullable|string',
                'penyelenggara.*' => 'nullable|string',
                'juara.*' => 'nullable|string',
                'tingkat.*' => 'nullable|string',
                'tahun_prestasi.*' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg',
                'status' => 'nullable|string',
                'type' => 'nullable|string',
            ]);

            if ($req->hasFile('image')) {
                $namafile = $req->image->getClientOriginalName();
                $path = public_path() . '/storage/path/guru_staff';
                $req->image->move($path, $namafile);
                $imagePath = '/storage/path/guru_staff/' . $namafile;
            }

            $riwayatPendidikan = [];
            $sekolah = [];
            $kotaPendidikan = [];
            $tahunMulaiPendidikan = [];
            $tahunBerakhirPendidikan = [];

            if ($req->has('riwayat_pendidikan')) {
                for ($i = 0; $i < count($req->riwayat_pendidikan); $i++) {
                    $riwayatPendidikan[] = $req->riwayat_pendidikan[$i];
                    $sekolah[] = $req->sekolah[$i];
                    $kotaPendidikan[] = $req->kota_pendidikan[$i];
                    $tahunMulaiPendidikan[] = $req->tahun_mulai_pendidikan[$i];
                    $tahunBerakhirPendidikan[] = $req->tahun_berakhir_pendidikan[$i];
                }
            }

            $pengalaman = [];
            $pemberiKerja = [];
            $kotaKerja = [];
            $tahunMulaiKerja = [];
            $tahunBerakhirKerja = [];

            if ($req->has('pengalaman')) {
                for ($i = 0; $i < count($req->pengalaman); $i++) {
                    $pengalaman[] = $req->pengalaman[$i];
                    $pemberiKerja[] = $req->pemberi_kerja[$i];
                    $kotaKerja[] = $req->kota_kerja[$i];
                    $tahunMulaiKerja[] = $req->tahun_mulai_kerja[$i];
                    $tahunBerakhirKerja[] = $req->tahun_berakhir_kerja[$i];
                }
            }

            $prestasi = [];
            $penyelenggara = [];
            $juara = [];
            $tingkat = [];
            $tahunPrestasi = [];

            if ($req->has('prestasi')) {
                for ($i = 0; $i < count($req->prestasi); $i++) {
                    $prestasi[] = $req->prestasi[$i];
                    $penyelenggara[] = $req->penyelenggara[$i];
                    $juara[] = $req->juara[$i];
                    $tingkat[] = $req->tingkat[$i];
                    $tahunPrestasi[] = $req->tahun_prestasi[$i];
                }
            }

            $data = GuruStaff::create([
                'nama' => $req->nama,
                'jabatan' => $req->jabatan,
                'riwayat_pendidikan' => implode('|', $riwayatPendidikan),
                'sekolah' => implode('|', $sekolah),
                'kota_pendidikan' => implode('|', $kotaPendidikan),
                'tahun_mulai_pendidikan' => implode('|', $tahunMulaiPendidikan),
                'tahun_berakhir_pendidikan' => implode('|', $tahunBerakhirPendidikan),
                'pengalaman' => implode('|', $pengalaman),
                'pemberi_kerja' => implode('|', $pemberiKerja),
                'kota_kerja' => implode('|', $kotaKerja),
                'tahun_mulai_kerja' => implode('|', $tahunMulaiKerja),
                'tahun_berakhir_kerja' => implode('|', $tahunBerakhirKerja),
                'prestasi' => implode('|', $prestasi),
                'penyelenggara' => implode('|', $penyelenggara),
                'juara' => implode('|', $juara),
                'tingkat' => implode('|', $tingkat),
                'tahun_prestasi' => implode('|', $tahunPrestasi),
                'image' => $imagePath ?? null,
                'status' => $req->status ?? 'waiting',
                'type' => $req->type ?? 'guru',
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
                'nama' => 'required|string',
                'jabatan' => 'required|string',
                'riwayat_pendidikan.*' => 'nullable|string',
                'sekolah.*' => 'nullable|string',
                'kota_pendidikan.*' => 'nullable|string',
                'tahun_mulai_pendidikan.*' => 'nullable|string',
                'tahun_berakhir_pendidikan.*' => 'nullable|string',
                'pengalaman.*' => 'nullable|string',
                'pemberi_kerja.*' => 'nullable|string',
                'kota_kerja.*' => 'nullable|string',
                'tahun_mulai_kerja.*' => 'nullable|string',
                'tahun_berakhir_kerja.*' => 'nullable|string',
                'prestasi.*' => 'nullable|string',
                'penyelenggara.*' => 'nullable|string',
                'juara.*' => 'nullable|string',
                'tingkat.*' => 'nullable|string',
                'tahun_prestasi.*' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg',
                'status' => 'nullable|string',
                'type' => 'nullable|string',
            ]);

            $guruStaff = GuruStaff::find($id);

            if ($req->hasFile('image')) {
                if (file_exists(public_path($guruStaff->image))) {
                    unlink(public_path($guruStaff->image));
                }

                $namafile = $req->image->getClientOriginalName();
                $path = public_path() . '/storage/path/guru_staff';
                $req->image->move($path, $namafile);
                $imagePath = '/storage/path/guru_staff/' . $namafile;
            }

            $riwayatPendidikan = [];
            $sekolah = [];
            $kotaPendidikan = [];
            $tahunMulaiPendidikan = [];
            $tahunBerakhirPendidikan = [];

            if ($req->has('riwayat_pendidikan')) {
                for ($i = 0; $i < count($req->riwayat_pendidikan); $i++) {
                    $riwayatPendidikan[] = $req->riwayat_pendidikan[$i];
                    $sekolah[] = $req->sekolah[$i];
                    $kotaPendidikan[] = $req->kota_pendidikan[$i];
                    $tahunMulaiPendidikan[] = $req->tahun_mulai_pendidikan[$i];
                    $tahunBerakhirPendidikan[] = $req->tahun_berakhir_pendidikan[$i];
                }
            }

            $pengalaman = [];
            $pemberiKerja = [];
            $kotaKerja = [];
            $tahunMulaiKerja = [];
            $tahunBerakhirKerja = [];

            if ($req->has('pengalaman')) {
                for ($i = 0; $i < count($req->pengalaman); $i++) {
                    $pengalaman[] = $req->pengalaman[$i];
                    $pemberiKerja[] = $req->pemberi_kerja[$i];
                    $kotaKerja[] = $req->kota_kerja[$i];
                    $tahunMulaiKerja[] = $req->tahun_mulai_kerja[$i];
                    $tahunBerakhirKerja[] = $req->tahun_berakhir_kerja[$i];
                }
            }

            $prestasi = [];
            $penyelenggara = [];
            $juara = [];
            $tingkat = [];
            $tahunPrestasi = [];

            if ($req->has('prestasi')) {
                for ($i = 0; $i < count($req->prestasi); $i++) {
                    $prestasi[] = $req->prestasi[$i];
                    $penyelenggara[] = $req->penyelenggara[$i];
                    $juara[] = $req->juara[$i];
                    $tingkat[] = $req->tingkat[$i];
                    $tahunPrestasi[] = $req->tahun_prestasi[$i];
                }
            }

            $guruStaff->update([
                'nama' => $req->nama,
                'jabatan' => $req->jabatan,
                'riwayat_pendidikan' => implode('|', $riwayatPendidikan),
                'sekolah' => implode('|', $sekolah),
                'kota_pendidikan' => implode('|', $kotaPendidikan),
                'tahun_mulai_pendidikan' => implode('|', $tahunMulaiPendidikan),
                'tahun_berakhir_pendidikan' => implode('|', $tahunBerakhirPendidikan),
                'pengalaman' => implode('|', $pengalaman),
                'pemberi_kerja' => implode('|', $pemberiKerja),
                'kota_kerja' => implode('|', $kotaKerja),
                'tahun_mulai_kerja' => implode('|', $tahunMulaiKerja),
                'tahun_berakhir_kerja' => implode('|', $tahunBerakhirKerja),
                'prestasi' => implode('|', $prestasi),
                'penyelenggara' => implode('|', $penyelenggara),
                'juara' => implode('|', $juara),
                'tingkat' => implode('|', $tingkat),
                'tahun_prestasi' => implode('|', $tahunPrestasi),
                'image' => $imagePath ?? $guruStaff->image,
                'status' => $req->status ?? 'waiting',
                'type' => $req->type ?? 'guru',
            ]);

            return apiSuccess($guruStaff, 'Data berhasil diupdate');
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

            $data = GuruStaff::whereIn('id', $req->ids)->update(['status' => 'published']);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function publish_one($id)
    {
        try {
            $data = GuruStaff::find($id);
            $data->status = "published";
            $data->save();

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function detail($id)
    {
        try {
            $data = GuruStaff::findOrfail($id);

            return apiSuccess($data);
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }

    public function delete($id)
    {
        try {
            $data = GuruStaff::findOrfail($id);
            $data->delete();
            return apiSuccess($data, 'Data berhasil dihapus');
        } catch (\Exception $e) {
            return apiFailed($e->getMessage(), 500);
        }
    }
}
