<?php

namespace App\Http\Controllers\Template2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Ekstrakurikuler;
use App\Models\Event;
use App\Models\Fasilitas;
use App\Models\FasilitasFiles;
use App\Models\Gallery;
use App\Models\GalleryFiles;
use App\Models\GuruStaff;
use App\Models\PartnerLembaga;
use App\Models\Slideshow;
use App\Models\Testimoni;

class DarunNajahController extends Controller
{
    public function landPage()
    {
        $berita = Berita::latestPublish(5)->get();
        $fasilitas = Fasilitas::with(['files' => function ($query) {
                $query->latest();
            }])
            ->where('status', 'published')
            ->latest()
            ->take(10)
            ->get();
        $ekskul = Ekstrakurikuler::all()->sortByDesc('created_at')->where('status', 'published');
        $slideShow = Slideshow::all();
        $youtube = Event::where('type', 'Youtube')->where('status', 'active')->where('sorotan', 1)->orderBy('created_at', 'desc')->take(1)->get();
        $youtubeShort = Event::where('type', 'Youtube Short')->where('status', 'active')->where('sorotan', 1)->orderBy('created_at', 'desc')->take(1)->get();
        $instagram = Event::where('type', 'Instagram')->where('status', 'active')->orderBy('created_at', 'desc')->take(4)->get();
        $testimoni = Testimoni::where('status', 'published')->orderBy('created_at', 'desc')->take(2)->get();
        $partners = PartnerLembaga::where('status', 'active')->orderBy('nama', 'asc')->get();

        $template = config('app.template');
        return view('landingpage.main', compact('berita', 'fasilitas', 'ekskul', 'slideShow', 'youtube', 'youtubeShort', 'instagram', 'testimoni', 'partners'));
    }

    public function index()
    {
        $template = config('app.template');
        return view('berita.berita');
    }

    public function fasilitas(Request $request)
    {
        $fasilitas = Fasilitas::with(['files' => function ($query) {
                $query->latest();
            }])
            ->where('status', 'published')
            ->latest()
            ->paginate(6);

        if ($request->ajax()) {
            $view = view('fasilitas.fasilitas-files', compact('fasilitas'))->render();
            return response()->json(['html' => $view]);
        }

        $template = config('app.template');
        return view('fasilitas.index', compact('fasilitas'));
    }


    public function galeri(Request $request)
    {
        $galleryFiles = GalleryFiles::with('gallery')
            ->whereHas('gallery', function ($query) {
                $query->where('status', 'published');
            })
            ->latest()
            ->paginate(8);

        if ($request->ajax()) {
            $view = view('galeri.gallery-files', compact('galleryFiles'))->render();
            return response()->json(['html' => $view]);
        }

        $template = config('app.template');
        return view('galeri.index', compact('galleryFiles'));
    }

    public function sosmed()
    {
        $instagram = Event::where('type', 'Instagram')->where('status', 'active')->latest()->take(8)->get();
        $youtube = Event::where('type', 'Youtube')->where('status', 'active')->latest()->take(4)->get();
        $youtubeShort = Event::where('type', 'Youtube Short')->where('status', 'active')->latest()->take(4)->get();
        $template = config('app.template');
        return view('sosmed.index', compact('instagram', 'youtube', 'youtubeShort'));
    }

    public function tentangKami()
    {
        $template = config('app.template');
        return view('profil.tentangkami');
    }

    public function coreValue()
    {
        $template = config('app.template');
        return view('profil.core-qudwah');
    }

    public function coreInovatif()
    {
        $template = config('app.template');
        return view('profil.core-inovatif');
    }

    public function coreSemangat()
    {
        $template = config('app.template');
        return view('profil.core-semangat');
    }

    public function coreBermartabat()
    {
        $template = config('app.template');
        return view('profil.core-bermartabat');
    }

    public function coreBerwawasan()
    {
        $template = config('app.template');
        return view('profil.core-berwawasan');
    }

    public function dewanGuru()
    {
        $guru = GuruStaff::where('status', 'published')->get();
        $template = config('app.template');
        return view('profil.dewan-guru', compact('guru'));
    }

    public function detaildewanGuru($id)
    {
        $guru = GuruStaff::findOrFail($id);
        $template = config('app.template');
        return view('profil.detail-dewan-guru', compact('guru'));
    }

    public function strukturOrganisasi()
    {
        $template = config('app.template');
        return view('profil.struktur-organisasi');
    }


    public function logo()
    {
        $template = config('app.template');
        return view('profil.logo'); // pastikan ada view dengan nama ini
    }


    //Dashboard Menu Ekstrakurikuler
    public function dashboardEkskul()
    {
        $template = config('app.template');
        return view('dmin.ekstrakurikuler.index'); // pastikan ada view dengan nama ini
    }

}
