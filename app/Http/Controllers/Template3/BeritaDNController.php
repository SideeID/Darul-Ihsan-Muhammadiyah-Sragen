<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaDNController extends Controller
{
    public function index()
    {
        $jmlHeadline = 3;
        $offsiteBerita = $jmlHeadline - 1;
        $headline = Berita::latestPublish($jmlHeadline)->with('kategoriBerita')->get();
        $berita = Berita::latestPublish(20)->offset($offsiteBerita)->with('kategoriBerita')->get();
        $template = config('app.template');
        return view($template.'.berita.berita', compact('headline','berita'));
    }

    public function kabarSekolah()
    {
        $berita = Berita::where('kategori', 'Kabar Sekolah')
            ->latestPublish(20)
            ->get();

        $template = config('app.template');
        return view($template.'.berita.kabarsekolah', compact('berita'));
    }

    public function artikel()
    {
        $berita = Berita::where('kategori', 'Artikel')
            ->latestPublish(20)
            ->get();

        $template = config('app.template');
        return view($template.'.berita.artikel', compact('berita'));
    }

    public function prestasi()
    {
        $berita = Berita::where('kategori', 'Prestasi')
            ->latestPublish(20)
            ->get();

        $template = config('app.template');
        return view($template.'.berita.prestasi', compact('berita'));
    }

    public function detail($id)
    {
        $berita= Berita::bySlugPublish($id)->first();
        $template = config('app.template');
        return view($template.'.berita.detail', compact('berita'));
    }
}
