<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use App\Models\Berita;

class BeritaDNController extends Controller
{
    public function index()
    {
        $jmlHeadline = 3;
        $offsiteBerita = $jmlHeadline;
        $headline = Berita::latestPublish($jmlHeadline)->with('kategoriBerita')->get();
        $berita = Berita::latestPublish(20)->offset($offsiteBerita)->with('kategoriBerita')->get();
        return view('berita.berita', compact('headline','berita'));
    }

    public function kabarSekolah()
    {
        $berita = Berita::where('kategori', 'Kabar Sekolah')
            ->latestPublish(20)
            ->get();
        return view('berita.kabarsekolah', compact('berita'));
    }

    public function artikel()
    {
        $berita = Berita::where('kategori', 'Artikel')
            ->latestPublish(20)
            ->get();
        return view('berita.artikel', compact('berita'));
    }

    public function prestasi()
    {
        $berita = Berita::where('kategori', 'Prestasi')
            ->latestPublish(20)
            ->get();
        return view('berita.prestasi', compact('berita'));
    }

    public function detail($id)
    {
        $berita= Berita::bySlugPublish(dekripString($id))->first();
        if (!$berita) return abort(404);

        $keywords = setKeyword($berita->judul);
        $pageData = [
            'title' => $berita->judul,
            'description' => strip_tags(html_entity_decode($berita->summary)),
            'url' => route('darun_najah.berita.detail', ['id' => enkripString($id), 'slug' => toSlug($berita->judul)]),
            'image_url' => asset($berita->image),
            'author_name' => $berita->sumber,
            'keyword' => "{$berita->kategori}, {$keywords}"
        ];
        return view('berita.detail', compact('berita', 'pageData'));
    }
}
