<?php

namespace App\Http\Controllers\TentangKami;

use App\Http\Controllers\Controller;
use App\Models\GuruStaff;
use Illuminate\Http\Request;

class GuruStaffController extends Controller
{
    public function index()
    {
        return view('admin.tentang_kami.staf.index');
    }
    public function tambah()
    {
        return view('admin.tentang_kami.staf.addstaf');
    }
    public function detail($id)
    {
        return view('admin.tentang_kami.staf.detail', ['data' => $id]);
    }
}
