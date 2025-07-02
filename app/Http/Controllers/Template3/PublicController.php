<?php

namespace App\Http\Controllers\Template3;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\Kabar;
use App\Models\Fasilitas;
use App\Models\Tatatertib;
use App\Models\Berita;
use App\Models\Gallery;
use App\Models\GuruStaff;
use App\Models\KaryaIlmiah;
use App\Models\Majalah;
use App\Models\Pengumuman;
use App\Models\qna;
use App\Models\Testimoni;

class PublicController extends Controller
{
    public function showPage($section)
    {
        $pimpinans = GuruStaff::where('type', 'pimpinan')->where('status', 'published')->get();
        $dewanPengasuh = GuruStaff::where('type', 'pengasuh')->where('status', 'published')->get();
        $guruStaffs = GuruStaff::where('type', 'guru')->where('status', 'published')->get();
        if (!in_array($section, ['pimpinan', 'dewan-pengasuh', 'guru-staff'])) {
            abort(404);
        }
        return view('pimpinan.index', compact('section', 'pimpinans', 'dewanPengasuh', 'guruStaffs'));
    }

    public function showKabar()
    {
        $berita = Berita::where('kategori', 'berita')->latestPublish()->paginate(2);
        $recentNews = Berita::where('status', 'published')->latestPublish(5)->get();
        $otherNews = Berita::where('kategori', '!=', 'berita')->latestPublish()->take(5)->get();
        $academicWorks = KaryaIlmiah::latestPublish(20)->paginate(10);
        $template = config('app.template');
        return view($template . '.berita.kabar', compact('berita', 'recentNews', 'otherNews', 'academicWorks'));
    }

    public function showQnA()
    {
        $qnas = qna::latestPublish(20)->paginate(6);
        $template = config('app.template');
        return view('berita.qna', compact('qnas'));
    }

    public function showDonasi()
    {
        return view('berita.donasi');
    }

    public function showGaleriFoto()
    {
        $galeryFoto = Gallery::with(['files' => function ($query) {
            $query->orderBy('id');
        }])
        ->where('type', 'gambar')
        ->latestPublish(20)
        ->paginate(8);

        return view('berita.galerifoto', compact('galeryFoto'));
    }

    public function showGaleriVideo()
    {
        $galeryVideo = Gallery::where('type', 'video')
            ->whereNotNull('video_link')
            ->latestPublish(20)
            ->paginate(8);

        return view('berita.galerivideo', compact('galeryVideo'));
    }

    public function showPengumuman()
    {
        $pengumumans = Pengumuman::where('status', 'published')->paginate(6);
        $template = config('app.template');
        return view('berita.pengumuman', compact('pengumumans'));
    }

    public function showMajalah()
    {
        $majalah = Majalah::latestPublish(20)->paginate(8);
        $template = config('app.template');
        return view('berita.majalah', compact('majalah'));
    }

    public function showBerita()
    {
        $jmlHeadline = 3;
        $offsiteBerita = $jmlHeadline - 1;
        $headline = Berita::latestPublish($jmlHeadline)->with('kategoriBerita')->get();
        $berita = Berita::latestPublish(20)->offset($offsiteBerita)->with('kategoriBerita')->paginate(10);
        $template = config('app.template');
        return view($template . '.berita.berita', compact('headline', 'berita'));
    }

    public function showKaryaIlmiah()
    {
        $karyaIlmiah = KaryaIlmiah::latestPublish(20)->paginate(10);
        $template = config('app.template');
        return view($template . '.berita.karyailmiah', compact('karyaIlmiah'));
    }

    public function showDetail($id)
    {
        $berita = Berita::bySlugPublish($id)->firstOrFail();
        $template = config('app.template');
        return view($template . '.berita.detail', compact('berita'));
    }

    public function daftarAlumni(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $alumnis = Alumni::orderBy('tahun_lulus', 'desc')->paginate($perPage);
        $template = config('app.template');
        return view($template . '.berita.alumni', compact('alumnis'));
    }

    public function showTestimoni()
    {
        $template = config('app.template');
        $testimoni = Testimoni::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();

        return view($template . '.berita.testi', compact('testimoni'));
    }

    //Fasilitas
    public function fasilitas()
    {
        $fasilitas = Fasilitas::all()->sortByDesc('created_at')->where('status', 'published');
        $template = config('app.template');
        return view($template . '.fasilitas.index', compact('fasilitas'));
    }

    public function tatatertib()
    {
        $tatatertib = Tatatertib::where('status', 'published')
            ->orderBy('created_at', 'desc')
            ->get();

        $template = config('app.template');
        return view($template . '.fasilitas.tata-tertib', compact('tatatertib'));
    }

    //Tentang Kami
    public function selayangPandang()
    {
        $template = config('app.template');
        return view($template . '.profil.selayang-pandang');
    }

    public function sejarah()
    {
        $template = config('app.template');
        return view($template . '.profil.sejarah');
    }

    public function visiMisi()
    {
        $template = config('app.template');
        return view($template . '.profil.visi-misi');
    }

    public function strukturOrganisasi()
    {
        $template = config('app.template');
        return view($template . '.profil.struktur-organisasi');
    }


    public function akreditasi()
    {
        $template = config('app.template');
        return view($template . '.profil.akreditas');
    }

    public function logo()
    {
        $template = config('app.template');
        return view($template . '.profil.logo');
    }

    //Akademik
    public function akademikSmp()
    {
        $template = config('app.template');
        return view($template . '.akademik.smp');
    }

    public function akademikSma()
    {
        $template = config('app.template');
        return view($template . '.akademik.sma');
    }
}
