<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;

class AdminController extends Controller {
    public function login() {
        return view('admin.auth.login');
    }
    
    public function setting() {
        return view('admin.konten.setting.index');
    }
    public function slidesShow()
    {
        return view('admin.konten.tentang-kami.slideshow.index');
    }
    public function stafGuru()
    {
        return view('admin.konten.tentang-kami.staf.index');
    }
    public function newstafGuru()
    {
        return view('admin.konten.tentang-kami.staf.addstaf');
    }
    public function detailstafGuru()
    {
        return view('admin.konten.tentang-kami.staf.detail');
    }
    public function fasilitas()
    {
        return view('admin.konten.tentang-kami.fasilitas.index');
    }
    public function newfasilitas()
    {
        return view('admin.konten.tentang-kami.fasilitas.addfasilitas');
    }
    public function detailfasilitas()
    {
        return view('admin.konten.tentang-kami.fasilitas.detail');
    }



    public function tambahGuru()
    {
        return view('admin.konten.tentang-kami.tambahGuru');
    }
    public function dataGuru()
    {
        return view('admin.konten.tentang-kami.dataGuru');
    }
    public function tentangFasilitas()
    {
        return view('admin.konten.tentang-kami.fasilitas');
    }
}
