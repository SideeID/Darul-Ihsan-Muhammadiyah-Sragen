<?php

namespace App\Http\Controllers;

use App\Models\PartnerLembaga;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\FileExists;

class PartnerLembagaController extends Controller
{
    public function list(Request $req)
    {
        $req->validate([
            'search' => 'string|nullable',
            'status' => 'string|nullable',
        ]);

        $query = PartnerLembaga::orderBy('created_at', 'desc');

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

            $v->logo = "<img src='" . $v->logo_url . "' class='logo' alt=''>";

            $v->is_action = "<div class='p-0 d-flex justify-content-center'>" .
                "<button type='button' id='buttonEdit' class='btn btn-outline-black me-2' style='border-radius: 8px; padding: 7px 7px;' data-id='" . $v->id . "' onclick='openForm(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Edit Data' data-bs-toggle='modal' data-bs-target='#modal-edit-media'><img src='" . asset('image/icon/icon-detail-black.svg') . "' class='' alt='edit'></button>" .
                "<button type='button' class='btn btn-outline-danger' style='border-radius: 8px; padding: 7px 7px;' data-id='" . $v->id . "' onclick='deleteRow(" . $v->id . ")' data-bs-toggle='tooltip' data-bs-title='Hapus Data'><img src='" . asset('image/icon/icon-delete.svg') . "' class='' alt='delete'></button>" .
                "</div>";
        }

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function detail ($id)
    {
        $data = PartnerLembaga::find($id);

        return apiSuccess($data, 'Data berhasil diambil.');
    }

    public function store (Request $req)
    {
        $req->validate([
            'nama' => 'required|string',
            'logo' => 'required|image|mimes:png,jpg,jpeg',
            'status' => 'required|string',
        ]);

        $input = $req->all();

        if ($req->logo) {
            $namafile = $req->logo->getClientOriginalName();
            $path = public_path() . '/storage/path/partner';
            $req->logo->move($path, $namafile);
            $input['logo'] = '/storage/path/partner/' . $namafile;
        }

        $data = PartnerLembaga::create($input);

        return apiSuccess($data, 'Data berhasil ditambahkan.');
    }

    public function publish(Request $req, $id)
    {
        $req->validate([
            'status' => 'required|string',
        ]);

        $data = PartnerLembaga::find($id);
        $data->update(['status' => $req->status]);

        return apiSuccess($data, 'Data berhasil diubah.');
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama' => 'required|string',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg',
            'status' => 'nullable|string',
        ]);

        $input = $req->all();

        $data = PartnerLembaga::find($id);

        if ($req->logo) {
            $namafile = $req->logo->getClientOriginalName();
            $path = public_path() . '/storage/path/partner';
            $req->logo->move($path, $namafile);
            $input['logo'] = '/storage/path/partner/' . $namafile;
        }

        $data->update($input);

        return apiSuccess($data, 'Data berhasil diubah.');
    }

    public function delete($id)
    {
        $data = PartnerLembaga::find($id);

        if (file_exists(public_path($data->logo))) {
            unlink(public_path($data->logo));
        }

        $data->delete();

        return apiSuccess($data, 'Data berhasil dihapus.');
    }
}
