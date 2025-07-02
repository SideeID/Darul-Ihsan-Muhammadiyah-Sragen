<?php

// use App\Http\Controllers\AdsController;
// use App\Http\Controllers\AdsViewController;
// use App\Http\Controllers\AnggotaController;
// use App\Http\Controllers\Koin\DonaturController;
// use App\Http\Controllers\Koin\ProgramController;
// use App\Http\Controllers\LandingPage\TangkletController;
// use App\Http\Controllers\LandingPage\KoinController;
// use App\Http\Controllers\PengurusController;
// use App\Http\Controllers\AnggotaViewController;
// use App\Http\Controllers\LandingPage\BeritaController as LandingPageBeritaController;
// use App\Http\Controllers\Informasi\TestimoniController as InformasiTestimoniController;
// use App\Http\Controllers\LandingPage\ArtikelController as LandingPageArtikelController;
// use App\Http\Controllers\TestimoniController;
// use App\Http\Controllers\KoinBerbagiController;
// use App\Http\Controllers\BeritaController;
// use App\Http\Controllers\PengaturanController;
// use App\Http\Controllers\ArtikelController;
// use App\Http\Controllers\EventController as ControllersEventController;
// use App\Http\Controllers\NderekTangletController;
// use App\Http\Controllers\DashboardAPIController;
// use App\Http\Controllers\KategoriBeritaController;
// use App\Http\Controllers\ProfilController;
// use App\Http\Controllers\EkskulController;
// use App\Http\Controllers\Konten\BeritaController as KontenBeritaController;
// use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PengurusViewController;
use App\Http\Controllers\Konten\EventController;
use App\Http\Controllers\PengaturanViewController;
use App\Http\Controllers\TangletViewController;
use App\Http\Controllers\PrimaryController;
use App\Http\Controllers\Template2\DarunNajahController;
use App\Http\Controllers\Template2\BeritaDNController;
use App\Http\Controllers\Template3\KaryaIlmiahController;
use App\Http\Controllers\Template3\MajalahController;
use App\Http\Controllers\Template3\ProgramDNController;
use App\Http\Controllers\Template3\AlumniController;
use App\Http\Controllers\Template3\TestimoniController;
use App\Http\Controllers\Konten\ArtikelController as KontenArtikelController;
use App\Http\Controllers\Template2\AdminBeritaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Template2\AdminSosmedController;
use App\Http\Controllers\Template2\AdminGaleriController;
use App\Http\Controllers\Template3\GaleridimsaController as GaleriDIMSAController;
use App\Http\Controllers\Template2\AdminController;
use App\Http\Controllers\Informasi\BeritaController as InformasiBeritaController;
use App\Http\Controllers\Informasi\GaleriController as InformasiGaleriController;
use App\Http\Controllers\Informasi\SosmedController as InformasiSosmedController;
use App\Http\Controllers\Informasi\ArtikelController as InformasiArtikelController;
use App\Http\Controllers\TentangKami\ProfilController as TentangKamiProfilController;
use App\Http\Controllers\TentangKami\SlideshowController;
use App\Http\Controllers\TentangKami\GuruStaffController;
use App\Http\Controllers\TentangKami\FasilitasController;
use App\Http\Controllers\TentangKami\DewanYayasanController as DewanYayasanController;
use App\Http\Controllers\EkskulViewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Template3\PublicController;
use App\Http\Controllers\Template3\PartnerController;
use App\Http\Controllers\Template3\ProgramUnggulanController;
use App\Http\Controllers\Template3\TatatertibController;
use App\Http\Controllers\Template3\QnAController;
use App\Http\Controllers\Template3\PengumumanController;
use App\Http\Controllers\Template3\LokerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for Public application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|--------------------------------------------------------------------------
| Dashboard & Profile Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [PrimaryController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/admin/pengaturan/profile', [ProfileController::class, 'edit'])->name('pengaturan.profile');
    Route::patch('/admin/pengaturan/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/pengaturan/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/admin/konten/event', [EventController::class, 'index'])->name('event.index');

    // Konten - Artikel
    Route::get('/admin/konten/artikel', [KontenArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/admin/konten/artikel/tambah', [KontenArtikelController::class, 'tambah'])->name('artikel.tambah');
    Route::get('/admin/konten/artikel/detail/{id}', [KontenArtikelController::class, 'detail'])->name('artikel.detail');

    // Tanglet
    Route::get('/admin/tanglet', [TangletViewController::class, 'index'])->name('tanglet.index');
    Route::get('/admin/tanglet/detail/{id}', [TangletViewController::class, 'detail'])->name('tanglet.detail');

    // Pengurus
    Route::get('/admin/pengurus', [PengurusViewController::class, 'index'])->name('pengurus.index');
    Route::get('/admin/pengurus/tambah', [PengurusViewController::class, 'tambah'])->name('pengurus.tambah');
    Route::get('/admin/pengurus/edit/{id}', [PengurusViewController::class, 'edit'])->name('pengurus.edit');

    // Pengaturan
    // Route::get('/admin/pengaturan/profile', [PengaturanViewController::class, 'profile'])->name('pengaturan.profile');

    // Slideshow
    Route::get('/admin/tentang/slideshow', [SlideshowController::class, 'index'])->name('tentang_kami.slideshow.index');

    // Informasi - Berita
    Route::get('/admin/informasi/berita', [InformasiBeritaController::class, 'index'])->name('informasi.berita.index');
    Route::get('/admin/informasi/berita/tambah', [InformasiBeritaController::class, 'tambah'])->name('informasi.berita.tambah');
    Route::get('/admin/informasi/berita/kategori', [InformasiBeritaController::class, 'kategori'])->name('informasi.berita.kategori');
    Route::get('/admin/informasi/berita/detail/{id}', [InformasiBeritaController::class, 'detail'])->name('informasi.berita.detail');
    // Route::post('/admin/informasi/berita/upload-image', [InformasiBeritaController::class, 'uploadImage'])->name('berita.upload_image');


    // Informasi - Majalah
    Route::get('/admin/informasi/majalah', [MajalahController::class, 'index'])->name('informasi.majalah');
    Route::get('/admin/informasi/majalah/tambah', [MajalahController::class, 'tambah'])->name('informasi.majalah.tambah');
    Route::get('/admin/informasi/majalah/detail/{id}', [MajalahController::class, 'detail'])->name('informasi.majalah.detail');

    // Route::get('/admin/informasi/galeri/video', [InformasiGaleriController::class, 'index_video'])->name('galeri.video.index');
    // Route::get('/admin/informasi/galeri/video/tambah', [InformasiGaleriController::class, 'tambah_video'])->name('galeri.video.tambah');
    // Route::get('/admin/informasi/galeri/video/detail/{id}', [InformasiGaleriController::class, 'detail_video'])->name('galeri.video.detail');

    // Informasi - Karya Ilmiah
    Route::get('/admin/informasi/karya-ilmiah', [KaryaIlmiahController::class, 'index'])->name('informasi.karyaIlmiah');
    Route::get('/admin/informasi/karya-ilmiah/tambah', [KaryaIlmiahController::class, 'tambah'])->name('informasi.karyaIlmiah.tambah');
    Route::get('/admin/informasi/karya-ilmiah/detail/{id}', [KaryaIlmiahController::class, 'detail'])->name('informasi.karyaIlmiah.detail');

    // Informasi - Alumni
    Route::get('/admin/informasi/alumni', [AlumniController::class, 'index'])->name('informasi.alumni');
    Route::get('/admin/informasi/alumni/tambah', [AlumniController::class, 'tambah'])->name('informasi.alumni.tambah');
    Route::get('/admin/informasi/alumni/detail/{id}', [AlumniController::class, 'detail'])->name('informasi.alumni.detail');

    //Informasi - testimoni
    Route::get('/admin/informasi/testimoni', [TestimoniController::class, 'index'])->name('informasi.testimoni');
    Route::get('/admin/informasi/testimoni/tambah', [TestimoniController::class, 'tambah'])->name('informasi.testimoni.tambah');
    Route::get('/admin/informasi/testimoni/detail/{id}', [TestimoniController::class, 'detail'])->name('informasi.testimoni.detail');

    //TentangKami - tata tertib
    Route::get('/admin/tentang-sekolah/tata-tertib', [TatatertibController::class, 'index'])->name('tentang_sekolah.tata_tertib');

    // ekstrakurikuler
    Route::get('/admin/ekstrakurikuler', [EkskulViewController::class, 'index'])->name('ekstrakurikuler.index');
    Route::get('/admin/ekstrakurikuler/tambah', [EkskulViewController::class, 'tambah'])->name('ekstrakurikuler.tambah');
    Route::get('/admin/ekstrakurikuler/detail/{id}', [EkskulViewController::class, 'detail'])->name('ekstrakurikuler.detail');

    // Tentang Kami
    Route::get('/admin/tentang/profil', [TentangKamiProfilController::class, 'index'])->name('tentang_kami.profil.index');
    Route::get('/admin/tentang/profil/tambah', [TentangKamiProfilController::class, 'create'])->name('tentang_kami.profil.create');
    Route::get('/admin/tentang/profil/detail/{id}', [TentangKamiProfilController::class, 'detail'])->name('tentang_kami.profil.detail');
    Route::get('/admin/tentang/profil/edit/{id}', [TentangKamiProfilController::class, 'edit'])->name('tentang_kami.profil.edit');

    // Guru Staff
    Route::get('/admin/tentang/staff', [GuruStaffController::class, 'index'])->name('tentang_kami.staf.index');
    Route::get('/admin/tentang/staff/tambah', [GuruStaffController::class, 'tambah'])->name('tentang_kami.staf.addstaf');
    Route::get('/admin/tentang/staff/detail/{id}', [GuruStaffController::class, 'detail'])->name('tentang_kami.staf.detail');

    // Fasilitas
    Route::get('/admin/tentang/fasilitas', [FasilitasController::class, 'index'])->name('tentang_kami.fasilitas.index');
    Route::get('/admin/tentang/fasilitas/tambah', [FasilitasController::class, 'tambah'])->name('tentang_kami.fasilitas.addfasilitas');
    Route::get('/admin/tentang/fasilitas/detail/{id}', [FasilitasController::class, 'detail'])->name('tentang_kami.fasilitas.detail');

    // Informasi - Artikel
    Route::get('/admin/informasi/artikel', [InformasiArtikelController::class, 'index'])->name('informasi.artikel.index');
    Route::get('/admin/informasi/artikel/tambah', [InformasiArtikelController::class, 'tambah'])->name('informasi.artikel.tambah');
    Route::get('/admin/informasi/artikel/detail/{id}', [InformasiArtikelController::class, 'detail'])->name('informasi.artikel.detail');

    // Sosmed
    Route::get('/admin/informasi/sosmed/whatsapp', [InformasiSosmedController::class, 'whatsapp'])->name('sosmed.whatsapp');
    Route::get('/admin/informasi/sosmed/instagram', [InformasiSosmedController::class, 'instagram'])->name('sosmed.instagram');
    Route::get('/admin/informasi/sosmed/whatsapp', [InformasiSosmedController::class, 'whatsapp'])->name('sosmed.whatsapp');
    Route::get('/admin/informasi/sosmed/instagram', [InformasiSosmedController::class, 'instagram'])->name('sosmed.instagram');
    Route::get('/admin/informasi/sosmed', [InformasiSosmedController::class, 'youtube'])->name('sosmed.youtube');

    // Galeri - foto
    Route::get('/admin/informasi/galeri/foto', [InformasiGaleriController::class, 'index_foto'])->name('galeri.foto.index');
    Route::get('/admin/informasi/galeri/foto/tambah', [InformasiGaleriController::class, 'tambah_foto'])->name('galeri.foto.tambah');
    Route::get('/admin/informasi/galeri/foto/detail/{id}', [InformasiGaleriController::class, 'detail_foto'])->name('galeri.foto.detail');

    // Galeri - video
    Route::get('/admin/informasi/galeri/video', [InformasiGaleriController::class, 'index_video'])->name('galeri.video.index');
    Route::get('/admin/informasi/galeri/video/tambah', [InformasiGaleriController::class, 'tambah_video'])->name('galeri.video.tambah');
    Route::get('/admin/informasi/galeri/video/detail/{id}', [InformasiGaleriController::class, 'detail_video'])->name('galeri.video.detail');

    // Admin Berita
    Route::get('admin/konten/berita', [AdminBeritaController::class, 'adminberita'])->name('admin.konten.berita.index');
    Route::get('admin/konten/berita/tambah', [AdminBeritaController::class, 'admintambahberita'])->name('admin.konten.berita.tambah');
    Route::get('admin/konten/berita/detail', [AdminBeritaController::class, 'admindetailberita'])->name('admin.konten.berita.detail');

    // Admin Sosmed
    Route::get('admin/konten/sosmed', [AdminSosmedController::class, 'adminsosmed'])->name('admin.konten.sosmed.index');

    // Admin Galeri
    Route::get('admin/konten/galeri', [AdminGaleriController::class, 'admingaleri'])->name('admin.konten.galeri.index');
    Route::get('admin/konten/galeri/tambah', [AdminGaleriController::class, 'admintambahgaleri'])->name('admin.konten.galeri.tambah');
    Route::get('admin/konten/galeri/detail', [AdminGaleriController::class, 'admindetailgaleri'])->name('admin.konten.galeri.detail');

    //Admin Partner Lembaga
    Route::get('/admin/tentang-sekolah/partner', [PartnerController::class, 'showPartner'])->name('tentang_sekolah.partner');

    //Admin Program Unggulan
    Route::get('/admin/tentang-sekolah/program-unggulan', [ProgramUnggulanController::class, 'showProgram'])->name('tentang_sekolah.program_unggulan');
    Route::get('/admin/tentang-sekolah/program-unggulan/tambah-program', [ProgramUnggulanController::class, 'addProgram'])->name('tentang_sekolah.add_program');
    Route::get('/admin/tentang-sekolah/program-unggulan/detail/{id}', [ProgramUnggulanController::class, 'detail'])->name('tentang_sekolah.edit_program');

    //Dewan Yayasan

    Route::group(['prefix' => 'admin/tentang-kami/dewan/pimpinan', 'as' => 'admin.tentang_kami.dewan.pimpinan.'], function () {
        Route::get('/', [DewanYayasanController::class, 'indexPimpinan'])->name('index');
        Route::get('/tambah', [DewanYayasanController::class, 'tambahPimpinan'])->name('tambah');
        Route::get('/detail/{id}', [DewanYayasanController::class, 'detailPimpinan'])->name('detail');
    });
    Route::group(['prefix' => 'admin/tentang-kami/dewan/pengasuh', 'as' => 'admin.tentang_kami.dewan.pengasuh.'], function () {
        Route::get('/', [DewanYayasanController::class, 'indexPengasuh'])->name('index');
        Route::get('/tambah', [DewanYayasanController::class, 'tambahPengasuh'])->name('tambah');
        Route::get('/detail/{id}', [DewanYayasanController::class, 'detailPengasuh'])->name('detail');
    });

    // Galeri - foto
    Route::get('/admin/informasi/galeri/foto', [GaleriDIMSAController::class, 'index_foto'])->name('admin.informasi.galeri.foto.index');
    Route::get('/admin/informasi/galeri/foto/tambah', [GaleriDIMSAController::class, 'tambah_foto'])->name('admin.informasi.galeri.foto.tambah');
    Route::get('/admin/informasi/galeri/foto/detail/{id}', [GaleriDIMSAController::class, 'detail_foto'])->name('admin.informasi.galeri.foto.detail');

    // Galeri - video
    Route::get('/admin/informasi/galeri/video', [GaleriDIMSAController::class, 'index_video'])->name('admin.informasi.galeri.video.index');
    Route::get('/admin/informasi/galeri/video/tambah', [GaleriDIMSAController::class, 'tambah_video'])->name('admin.informasi.galeri.video.tambah');
    Route::get('/admin/informasi/galeri/video/detail/{id}', [GaleriDIMSAController::class, 'detail_video'])->name('admin.informasi.galeri.video.detail');

    // Admin QnA
    Route::get('admin/informasi/qna', [QnAController::class, 'index'])->name('admin.informasi.qna.index');
    Route::get('admin/informasi/qna/tambah', [QnAController::class, 'tambah'])->name('admin.informasi.qna.tambah');
    Route::get('admin/informasi/qna/detail/{id}', [QnAController::class, 'detail'])->name('admin.informasi.qna.detail');


    // Pengumuman
    Route::get('admin/informasi/pengumuman', [PengumumanController::class, 'index'])->name('admin.informasi.pengumuman.index');
    Route::get('admin/informasi/pengumuman/tambah', [PengumumanController::class, 'tambah'])->name('admin.informasi.pengumuman.tambah');
    Route::get('admin/informasi/pengumuman/detail/{id}', [PengumumanController::class, 'detail'])->name('admin.informasi.pengumuman.detail');

    // Lowongan kerja
    Route::get('admin/informasi/loker', [LokerController::class, 'index'])->name('admin.informasi.loker.index');
    Route::get('admin/informasi/loker/tambah', [LokerController::class, 'tambah'])->name('admin.informasi.loker.tambah');
    Route::get('admin/informasi/loker/detail/{id}', [LokerController::class, 'detail'])->name('admin.informasi.loker.detail');
});

/*
|--------------------------------------------------------------------------
| Public Routes (Darunnajah)
|--------------------------------------------------------------------------
*/
// Landing Page
Route::get('/', [DarunNajahController::class, 'landPage'])->name('landing-page');

// About Us Pages
Route::get('/tentang-kami', [DarunNajahController::class, 'tentangKami'])->name('tentang-kami');
Route::get('/core-value-qudwah', [DarunNajahController::class, 'coreValue'])->name('core-value');
Route::get('/core-value-inovatif', [DarunNajahController::class, 'coreInovatif'])->name('core-inovatif');
Route::get('/core-value-berwawasan', [DarunNajahController::class, 'coreBerwawasan'])->name('core-berwawasan');
Route::get('/core-value-semangat', [DarunNajahController::class, 'coreSemangat'])->name('core-semangat');
Route::get('/core-value-bermartabat', [DarunNajahController::class, 'coreBermartabat'])->name('core-bermartabat');

// Profile
Route::get('/dewan-guru', [DarunNajahController::class, 'dewanGuru'])->name('dewan-guru');
Route::get('/dewan-guru/{id}', [DarunNajahController::class, 'detaildewanGuru'])->name('detail-dewan-guru');
Route::get('/struktur-organisasi', [DarunNajahController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
Route::get('/logo', [DarunNajahController::class, 'logo'])->name('logo');

// fasilitas & galeri
Route::get('/fasilitas', [DarunNajahController::class, 'fasilitas'])->name('fasilitas');
Route::get('/galeri', [DarunNajahController::class, 'galeri'])->name('galeri');

// Berita
Route::get('/berita', [BeritaDNController::class, 'index'])->name('darun_najah.berita');
Route::get('/berita/kabarsekolah', [BeritaDNController::class, 'kabarSekolah'])->name('darun_najah.berita.kabarsekolah');
Route::get('/berita/prestasi', [BeritaDNController::class, 'prestasi'])->name('darun_najah.berita.prestasi');
Route::get('/berita/artikel', [BeritaDNController::class, 'artikel'])->name('darun_najah.berita.artikel');
Route::get('/berita/{id}/{slug?}', [BeritaDNController::class, 'detail'])
    ->name('darun_najah.berita.detail');

// Program
Route::get('/program/tahfidzquran', [ProgramDNController::class, 'tahfidzQuran'])->name('program.tahfidzquran');
Route::get('/program/bilingual', [ProgramDNController::class, 'bilingual'])->name('program.bilingual');
Route::get('/program/p5', [ProgramDNController::class, 'p5'])->name('program.p5');
Route::get('/program/bilingual', [ProgramDNController::class, 'bilingual'])->name('program.bilingual');
Route::get('/program/p5', [ProgramDNController::class, 'p5'])->name('program.p5');
Route::get('/program/ekstrakurikuler', [ProgramDNController::class, 'ekstrakurikuler'])->name('program.ekstrakurikuler');

// Tentang-kami
Route::get('/tentangKami/slideshow', [AdminController::class, 'slidesShow'])->name('tentangkami.slideshow');
Route::get('/tentangKami/stafGuru', [AdminController::class, 'stafGuru'])->name('tentangkami.stafGuru');
Route::get('/tentangKami/stafGuru/new', [AdminController::class, 'newstafGuru'])->name('tentangkami.stafGuru.new');
Route::get('/tentangKami/stafGuru/detail', [AdminController::class, 'detailstafGuru'])->name('tentangkami.stafGuru.detail');
Route::get('/tentangKami/fasilitas', [AdminController::class, 'fasilitas'])->name('tentangkami.fasilitas');
Route::get('/tentangKami/fasilitas/new', [AdminController::class, 'newfasilitas'])->name('tentangkami.fasilitas.new');
Route::get('/tentangKami/fasilitas/detail', [AdminController::class, 'detailfasilitas'])->name('tentangkami.fasilitas.detail');

// Sosmed
Route::get('/sosmed', [DarunNajahController::class, 'sosmed'])->name('sosmed');

//setting
// Route::get('/setting', [AdminController::class, 'setting'])->name('setting');



//DIMSA

// Pimpinan dan dewan guru
Route::get('/{section}', [PublicController::class, 'showPage'])->whereIn('section', ['pimpinan', 'dewan-pengasuh', 'guru-staff']);

// Berita
Route::get('/kabar', [PublicController::class, 'showKabar'])->name('berita.kabar');
Route::get('/berita/{id}', [PublicController::class, 'showDetail'])->name('berita.detail');
Route::get('/kabar/berita', [PublicController::class, 'showBerita'])->name('berita.berita');
Route::get('/kabar/karyailmiah', [PublicController::class, 'showKaryaIlmiah'])->name('berita.karyailmiah');
Route::get('/qna', [PublicController::class, 'showQnA'])->name('qna.page');
Route::get('/galerifoto', [PublicController::class, 'showGaleriFoto'])->name('berita.galerifoto');
Route::get('/galerivideo', [PublicController::class, 'showGaleriVideo'])->name('berita.galerivideo');
Route::get('/pengumuman', [PublicController::class, 'showPengumuman'])->name('berita.pengumuman');
Route::get('/majalah', [PublicController::class, 'showMajalah'])->name('berita.majalah');
Route::get('/daftar-alumni', [PublicController::class, 'daftarAlumni'])->name('daftar-alumni');


//Fasilitas
Route::get('/fasilitas/sarana-prasarana', [PublicController::class, 'fasilitas'])->name('fasilitas');
Route::get('/fasilitas/tata-tertib', [PublicController::class, 'tatatertib'])->name('tatatertib');

// Profile
Route::get('/profil/selayang-pandang', [PublicController::class, 'selayangPandang'])->name('selayang-pandang');
Route::get('/profil/sejarah-pondok', [PublicController::class, 'sejarah'])->name('sejarah-pondok');
Route::get('/profil/visi-misi', [PublicController::class, 'visiMisi'])->name('visi-misi');
Route::get('/profil/struktur-organisasi', [PublicController::class, 'strukturOrganisasi'])->name('struktur-organisasi');
Route::get('/profil/akreditasi', [PublicController::class, 'akreditasi'])->name('akreditasi');
Route::get('/profil/logo', [PublicController::class, 'logo'])->name('logo');

// Akademik
Route::get('/akademik/smp', [PublicController::class, 'akademikSmp'])->name('akademik-smp');
Route::get('/akademik/sma', [PublicController::class, 'akademikSma'])->name('akademik-sma');

//Testimoni
Route::get('/testimoni', [PublicController::class, 'showTestimoni'])->name('testimoni');

// Program
Route::get('/program/tahfidzquran', [ProgramDNController::class, 'tahfidzQuran'])->name('program.tahfidzquran');
Route::get('/program/bahasa', [ProgramDNController::class, 'bahasa'])->name('program.bahasa');
Route::get('/program/kurikulum', [ProgramDNController::class, 'kurikulum'])->name('program.kurikulum');
Route::get('/program/unggulan', [ProgramDNController::class, 'unggulan'])->name('program.unggulan');
Route::get('/program/ekstrakurikuler', [ProgramDNController::class, 'ekstrakurikuler'])->name('program.ekstrakurikuler');

require __DIR__ . '/auth.php';
