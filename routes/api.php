<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\ArtikelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KaryaIlmiahController;
use App\Http\Controllers\MajalahController;
use App\Http\Controllers\DashboardAPIController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\NderekTangletController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\EventController as ControllersEventController;
use App\Http\Controllers\GuruStaffController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\LowonganKerjaController;
use App\Http\Controllers\PartnerLembagaController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProgramUnggulanController;
use App\Http\Controllers\QnaController;
use App\Http\Controllers\TatatertibController;
use App\Http\Controllers\TestimoniController;
use App\Models\Majalah;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| API Stats Dashboard
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'dashboard', 'controller' => DashboardAPIController::class], function () {
    Route::get('/', 'index')->name('dashboard.stats');
});

/*
|--------------------------------------------------------------------------
| API Berita
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'berita', 'controller' => BeritaController::class], function () {
    Route::get('/list-all', 'list')->name('berita.all');
    Route::get('/detail/{id}', 'detail')->name('berita.detail');
    Route::get('/publish-one/{id}', 'publish_one')->name('berita.publish_one');
    Route::get('/sorotan/{id}', 'sorotan')->name('berita.sorotan');
    Route::get('/delete/{id}', 'delete')->name('berita.delete');
    Route::post('/store', 'store')->name('berita.store');
    Route::post('/update/{id}', 'update')->name('berita.update');
    Route::post('/publish', 'publish')->name('berita.publish');
    Route::post('/upload-image', 'uploadImage')->name('berita.upload_image');

    // Kategori Berita
    Route::get('/kategori/list-all', 'kategori_list')->name('berita.kategori.all');
    Route::get('/kategori/detail/{id}', 'kategori_detail')->name('berita.kategori.detail');
    Route::get('/kategori/delete/{id}', 'kategori_delete')->name('berita.kategori.delete');
    Route::post('/kategori/store', 'kategori_store')->name('berita.kategori.store');
    Route::post('/kategori/update/{id}', 'kategori_update')->name('berita.kategori.update');
    Route::post('/kategori/publish/{id}', 'kategori_publish')->name('berita.kategori.publish');
    Route::get('/kategori/list-published', 'kategori_list_published')->name('berita.kategori.published');
});



/*
|--------------------------------------------------------------------------
| API Karya-Ilmiah
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'karya-ilmiah', 'controller' => KaryaIlmiahController::class], function () {
    Route::get('/list-all', 'list')->name('karya-ilmiah.all');
    Route::get('/detail/{id}', 'detail')->name('karya-ilmiah.detail');
    Route::put('/publish-one/{id}', 'publish_one')->name('karya-ilmiah.publish_one');
    Route::delete('/delete/{id}', 'delete')->name('karya-ilmiah.delete');
    Route::post('/store', 'store')->name('karya-ilmiah.store');
    Route::post('/update/{id}', 'update')->name('karya-ilmiah.update');
    Route::put('/publish', 'publish')->name('karya-ilmiah.publish');
});

/*
|--------------------------------------------------------------------------
| API Majalah
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'majalah', 'controller' => MajalahController::class], function () {
    Route::get('/list-all', 'list')->name('majalah.all');
    Route::get('/detail/{id}', 'detail')->name('majalah.detail');
    Route::put('/publish-one/{id}', 'publish_one')->name('majalah.publish_one');
    Route::delete('/delete/{id}', 'delete')->name('majalah.delete');
    Route::post('/store', 'store')->name('majalah.store');
    Route::put('/update/{id}', 'update')->name('majalah.update');
    Route::put('/publish', 'publish')->name('majalah.publish');
});

/*
|--------------------------------------------------------------------------
| API Guru dan Staff
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'guru-staff', 'controller' => GuruStaffController::class], function () {
    Route::get('/list-all', 'list')->name('guru-staff.all');
    Route::get('/detail/{id}', 'detail')->name('guru-staff.detail');
    Route::put('/publish-one/{id}', 'publish_one')->name('guru-staff.publish_one');
    Route::delete('/delete/{id}', 'delete')->name('guru-staff.delete');
    Route::post('/store', 'store')->name('guru-staff.store');
    Route::post('/update/{id}', 'update')->name('guru-staff.update');
    Route::put('/publish', 'publish')->name('guru-staff.publish');
});

/*
|--------------------------------------------------------------------------
| API Partner Lembaga
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'partner-lembaga', 'controller' => PartnerLembagaController::class], function () {
    Route::get('/list-all', 'list')->name('partner-lembaga.all');
    Route::get('/detail/{id}', 'detail')->name('partner-lembaga.detail');
    Route::post('/store', 'store')->name('partner-lembaga.store');
    Route::put('/publish/{id}', 'publish')->name('partner-lembaga.publish');
    Route::post('/update/{id}', 'update')->name('partner-lembaga.update');
    Route::delete('/delete/{id}', 'delete')->name('partner-lembaga.delete');
});

/*
|--------------------------------------------------------------------------
| API Program Unggulan
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'program-unggulan', 'controller' => ProgramUnggulanController::class], function () {
    Route::get('/list-all', 'list')->name('program-unggulan.all');
    Route::get('/detail/{id}', 'detail')->name('program-unggulan.detail');
    Route::post('/store', 'store')->name('program-unggulan.store');
    Route::post('/update/{id}', 'update')->name('program-unggulan.update');
    Route::put('/publish/{id}', 'publish')->name('program-unggulan.publish');
    Route::delete('/delete/{id}', 'delete')->name('program-unggulan.delete');
});

/*
|--------------------------------------------------------------------------
| API Fasilitas
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'fasilitas', 'controller' => FasilitasController::class], function () {
    Route::get('/list-all', 'list')->name('fasilitas.all');
    Route::get('/detail/{id}', 'detail')->name('fasilitas.detail');
    Route::post('/publish-one/{id}', 'publish_one')->name('fasilitas.publish_one');
    Route::delete('/delete/{id}', 'delete')->name('fasilitas.delete');
    Route::post('/store', 'store')->name('fasilitas.store');
    Route::post('/update/{id}', 'update')->name('fasilitas.update');
    Route::post('/publish', 'publish')->name('fasilitas.publish');
    Route::delete('/delete-file/{id}', 'delete_file')->name('fasilitas.file.delete');
});

/*
|--------------------------------------------------------------------------
| API Galeri
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'gallery', 'controller' => GalleryController::class], function () {
    Route::get('/list-all', 'list')->name('gallery.all');
    Route::get('/detail/{id}', 'detail')->name('gallery.detail');
    Route::post('/publish-one/{id}', 'publish_one')->name('gallery.publish_one');
    Route::delete('/delete/{id}', 'delete')->name('gallery.delete');
    Route::post('/store', 'store')->name('gallery.store');
    Route::post('/update/{id}', 'update')->name('gallery.update');
    Route::post('/publish', 'publish')->name('gallery.publish');
    Route::delete('/delete-file/{id}', 'delete_file')->name('gallery.file.delete');
});

/*
|--------------------------------------------------------------------------
| API Profil Sekolah
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'profil', 'controller' => ProfilController::class], function () {
    Route::get('/list-all', 'list')->name('profil.all');
    Route::get('/publish-one/{id}', 'publish_one')->name('profil.publish_one');
    Route::get('/detail/{id}', 'detail')->name('profil.detail');
    Route::post('/store', 'store')->name('profil.store');
    Route::post('/update/{id}', 'update')->name('profil.update');
    Route::get('/delete/{id}', 'delete')->name('profil.delete');
    Route::get('/delete/file/{id}', 'delete_file')->name('profil.file.delete');
});

/*
|--------------------------------------------------------------------------
| API Gallery
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'gallery', 'controller' => GalleryController::class], function () {
    Route::get('/list-all', 'list')->name('gallery.all');
    Route::get('/detail/{id}', 'detail')->name('gallery.detail');
    Route::get('/publish/{id}', 'publish_one')->name('gallery.publish');
    Route::get('/delete/{id}', 'delete')->name('gallery.delete');
    Route::get('/delete-file/{id}', 'delete_file')->name('gallery.file.delete');
    Route::post('/store', 'store')->name('gallery.store');
    Route::post('/update/{id}', 'update')->name('gallery.update');
    Route::post('/upload-image', 'uploadImage')->name('gallery.upload_image');
});

/*
|--------------------------------------------------------------------------
| API Pengumuman
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'pengumuman', 'controller' => PengumumanController::class], function () {
    Route::get('/list-all', 'list')->name('pengumuman.all');
    Route::get('/detail/{id}', 'detail')->name('pengumuman.detail');
    Route::put('/publish/{id}', 'publish')->name('pengumuman.publish');
    Route::delete('/delete/{id}', 'delete')->name('pengumuman.delete');
    Route::post('/store', 'store')->name('pengumuman.store');
    Route::put('/update/{id}', 'update')->name('pengumuman.update');
});

/*
|--------------------------------------------------------------------------
| API QNA
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'qna', 'controller' => QnaController::class], function () {
    Route::get('/list-all', 'list')->name('qna.all');
    Route::get('/detail/{id}', 'detail')->name('qna.detail');
    Route::put('/publish/{id}', 'publish')->name('qna.publish');
    Route::delete('/delete/{id}', 'delete')->name('qna.delete');
    Route::post('/store', 'store')->name('qna.store');
    Route::put('/update/{id}', 'update')->name('qna.update');
});

/*
|--------------------------------------------------------------------------
| API Lowongan Kerja
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'lowongan-kerja', 'controller' => LowonganKerjaController::class], function () {
    Route::get('/list-all', 'list')->name('lowongan-kerja.all');
    Route::get('/detail/{id}', 'detail')->name('lowongan-kerja.detail');
    Route::delete('/delete/{id}', 'delete')->name('lowongan-kerja.delete');
    Route::post('/store', 'store')->name('lowongan-kerja.store');
    Route::put('/update/{id}', 'update')->name('lowongan-kerja.update');
    Route::put('/publish/{id}', 'publish')->name('lowongan-kerja.publish');
});

/*
|--------------------------------------------------------------------------
| API Testimoni
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'testimoni', 'controller' => TestimoniController::class], function () {
    Route::get('/list-all', 'list')->name('testimoni.all');
    Route::get('/detail/{id}', 'detail')->name('testimoni.detail');
    Route::put('/publish/{id}', 'publish')->name('testimoni.publish');
    Route::delete('/delete/{id}', 'delete')->name('testimoni.delete');
    Route::post('/store', 'store')->name('testimoni.store');
    Route::post('/update/{id}', 'update')->name('testimoni.update');
});

/*
|--------------------------------------------------------------------------
| API Tata Tertib
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'tata-tertib', 'controller' => TatatertibController::class], function () {
    Route::put('/update-or-create', 'updateOrCreate')->name('tata-tertib.updateOrCreate');
    Route::get('/list', 'list')->name('tata-tertib.list');
});

/*
|--------------------------------------------------------------------------
| API Ekskul
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'ekskul', 'controller' => EkskulController::class], function () {
    Route::get('/list-all', 'list')->name('ekskul.all');
    Route::get('/detail/{id}', 'detail')->name('ekskul.detail');
    Route::get('/delete/{id}', 'delete')->name('ekskul.delete');
    Route::post('/store', 'store')->name('ekskul.store');
    Route::post('/update/{id}', 'update')->name('ekskul.update');
});

/*
|--------------------------------------------------------------------------
| API Nderek Tanglet
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'nderek', 'controller' => NderekTangletController::class], function () {
    Route::get('/list-all', 'list')->name('nderek.all');
    Route::get('/detail/{id}', 'detail')->name('nderek.detail');
    Route::get('/delete/{id}', 'delete')->name('nderek.delete');
    Route::post('/update/{id}', 'update')->name('nderek.update');
});

/*
|--------------------------------------------------------------------------
| API Artikel
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'artikel', 'controller' => ArtikelController::class], function () {
    Route::get('/list-all', 'list')->name('artikel.all');
    Route::get('/detail/{id}', 'detail')->name('artikel.detail');
    Route::get('/publish-one/{id}', 'publish_one')->name('artikel.publish_one');
    Route::get('/delete/{id}', 'delete')->name('artikel.delete');
    Route::post('/store', 'store')->name('artikel.store');
    Route::post('/update/{id}', 'update')->name('artikel.update');
    Route::post('/publish', 'publish')->name('artikel.publish');
});

/*
|--------------------------------------------------------------------------
| API Sosmed
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'sosmed', 'controller' => ControllersEventController::class], function () {
    Route::get('/list-all', 'list')->name('sosmed.all');
    Route::get('/detail/{id}', 'detail')->name('sosmed.detail');
    Route::get('/publish-one/{id}', 'publish_one')->name('sosmed.publish_one');
    Route::get('/delete/{id}', 'delete')->name('sosmed.delete');
    Route::post('/store', 'store')->name('sosmed.store');
    Route::post('/update/{id}', 'update')->name('sosmed.update');
    Route::post('/publish', 'publish')->name('sosmed.publish');
});

/*
|--------------------------------------------------------------------------
| API Alumni
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'alumni', 'controller' => AlumniController::class], function () {
    Route::get('/export', 'exportAlumniTemplate')->name('alumni.export');
    Route::post('/import', 'importAlumni')->name('alumni.import');
    Route::get('/list-all', 'list')->name('alumni.all');
    Route::get('/detail/{id}', 'detail')->name('alumni.detail');
    Route::delete('/delete/{id}', 'delete')->name('alumni.delete');
    Route::post('/store', 'store')->name('alumni.store');
    Route::post('/update/{id}', 'update')->name('alumni.update');
});

/*
|--------------------------------------------------------------------------
| API Pengaturan Admin
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'pengaturan', 'controller' => PengaturanController::class], function () {
    Route::group(['prefix' => 'partner'], function () {
        Route::get('/list', 'partner_list')->name('partner.all');
        Route::get('/detail/{id}', 'partner_detail')->name('partner.detail');
        Route::get('/delete/{id}', 'partner_delete')->name('partner.delete');
        Route::post('/store', 'partner_store')->name('partner.store');
        Route::post('/update/{id}', 'partner_update')->name('partner.update');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', 'user_list')->name('user.all');
        Route::get('/role/list', 'role_list')->name('user.role.all');
        Route::get('/detail/{id}', 'user_detail')->name('user.detail');
        Route::get('/delete/{id}', 'user_delete')->name('user.delete');
        Route::post('/store', 'user_store')->name('user.store');
        Route::post('/update/{id}', 'user_update')->name('user.update');
        Route::post('/update/role/{id}', 'role_update')->name('user.role.update');
    });

    Route::group(['prefix' => 'slides'], function () {
        Route::get('/list-all', 'slides_list')->name('slides.all');
        Route::post('/store', 'slides_store')->name('slides.store');
        Route::post('/update', 'slides_update')->name('slides.update');
        Route::get('/delete/{id}', 'slides_delete')->name('slides.delete');
    });

    Route::group(['prefix' => 'ppdb_banner'], function () {
        Route::get('/list', 'ppdb_banner_list')->name('ppdb_banner.all');
        Route::get('/detail/{id}', 'ppdb_banner_detail')->name('ppdb_banner.detail');
        Route::get('/delete/{id}', 'ppdb_banner_delete')->name('ppdb_banner.delete');
        Route::post('/store', 'ppdb_banner_store')->name('ppdb_banner.store');
        Route::post('/update/{id}', 'ppdb_banner_update')->name('ppdb_banner.update');
    });

    Route::group(['prefix' => 'ppdb'], function () {
        Route::get('/list', 'ppdb_list')->name('ppdb.all');
        Route::get('/detail/{id}', 'ppdb_detail')->name('ppdb.detail');
        Route::get('/delete/{id}', 'ppdb_delete')->name('ppdb.delete');
        Route::post('/store', 'ppdb_store')->name('ppdb.store');
        Route::post('/update/{id}', 'ppdb_update')->name('ppdb.update');
    });

    Route::post('/profile-update', 'profile')->name('admin.update');

    // Route::group(['prefix' => 'narasumber'], function () {
    //     Route::get('/list', 'narasumber_list')->name('narasumber.all');
    //     Route::get('/detail/{id}', 'narasumber_detail')->name('narasumber.detail');
    //     Route::get('/delete/{id}', 'narasumber_delete')->name('narasumber.delete');
    //     Route::post('/store', 'narasumber_store')->name('narasumber.store');
    //     Route::post('/update/{id}', 'narasumber_update')->name('narasumber.update');
    // });
});


/*
|--------------------------------------------------------------------------
| UNUSED API
|--------------------------------------------------------------------------
*/
// Route API Ads
// Route::group(['prefix' => 'ads', 'controller' => AdsController::class], function () {
//     Route::get('/list-all', 'list')->name('ads.all');
//     Route::get('/detail/{id}', 'detail')->name('ads.detail');
//     Route::get('/delete/{id}', 'delete')->name('ads.delete');
//     Route::get('/non-slider', 'detail_nonslider')->name('ads.nonslider');
//     Route::get('/delete/non-slider/{id}', 'delete_nonslider')->name('ads.nonslider.delete');
//     Route::post('/store', 'store')->name('ads.store');
//     Route::post('/update/{id}', 'update')->name('ads.update');
//     Route::post('/publish', 'publish')->name('ads.publish');
//     Route::get('/publish-one/{id}', 'publish_one')->name('ads.publish_one');
// });
// Route API Testimoni
// Route::group(['prefix' => 'testimoni', 'controller' => TestimoniController::class], function () {
//     Route::get('/list-all', 'list')->name('testimoni.all');
//     Route::get('/detail/{id}', 'detail')->name('testimoni.detail');
//     Route::get('/delete/{id}', 'delete')->name('testimoni.delete');
//     Route::post('/store', 'store')->name('testimoni.store');
//     Route::post('/update/{id}', 'update')->name('testimoni.update');
//     Route::get('/publish-one/{id}', 'publish_one')->name('testimoni.publish_one');
// });
// // Route API Event
// Route::group(['prefix' => 'event', 'controller' => ControllersEventController::class], function () {
//     Route::get('/list-all', 'list')->name('event.all');
//     Route::get('/detail/{id}', 'detail')->name('event.detail');
//     Route::get('/publish-one/{id}', 'publish_one')->name('event.publish_one');
//     Route::get('/delete/{id}', 'delete')->name('event.delete');
//     Route::post('/store', 'store')->name('event.store');
//     Route::post('/update/{id}', 'update')->name('event.update');
//     Route::post('/publish', 'publish')->name('event.publish');
// });
// Route API Anggota
// Route::group(['prefix' => 'anggota', 'controller' => AnggotaController::class], function () {
//     Route::get('/list', 'list')->name('anggota.all');
//     Route::get('/detail/{id}', 'detail')->name('anggota.detail');
//     Route::get('/delete/{id}', 'delete')->name('anggota.delete');
//     Route::post('/store', 'store')->name('anggota.store');
//     Route::post('/update/{id}', 'update')->name('anggota.update');
//     Route::post('/import', 'import')->name('anggota.import');
//     Route::get('/export', 'export')->name('anggota.export');
//     Route::get('/template', 'template')->name('anggota.template');
// });
// Route API Pengurus
// Route::group(['prefix' => 'pengurus', 'controller' => PengurusController::class], function () {
//     Route::get('/list', 'list')->name('pengurus.all');
//     Route::get('/detail/{id}', 'detail')->name('pengurus.detail');
//     Route::get('/delete/{id}', 'delete')->name('pengurus.delete');
//     Route::post('/store', 'store')->name('pengurus.store');
//     Route::post('/update/{id}', 'update')->name('pengurus.update');
// });
// Route API Koin Nusantara
// Route::group(['prefix' => 'koin', 'controller' => KoinBerbagiController::class], function () {
//     Route::group(['prefix' => 'campaign'], function () {
//         Route::get('/list', 'list_campaign')->name('koin.campaign.all');
//         Route::get('/detail/{id}', 'detail_campaign')->name('koin.campaign.detail');
//         Route::get('/approve/{id}', 'approve_campaign')->name('koin.campaign.approve');
//         Route::post('/store', 'create_campaign')->name('koin.campaign.store');
//         Route::get('/delete/{id}', 'delete_campaign')->name('koin.campaign.delete');
//         Route::post('/update/{id}', 'update_campaign')->name('koin.campaign.update');
//     });

//     Route::group(['prefix' => 'transaksi'], function () {
//         Route::get('/list', 'list_transaksi')->name('koin.transaksi.all');
//         Route::get('/detail/{id}', 'detail_transaksi')->name('koin.transaksi.detail');
//         Route::post('/store', 'create_transaksi')->name('koin.transaksi.store');
//         Route::post('/update/{id}', 'update_transaksi')->name('koin.transaksi.update');
//         Route::get('/delete/{id}', 'delete_transaksi')->name('koin.transaksi.delete');
//     });
// });
// Route API Ads
// Route::group(['prefix' => 'ads', 'controller' => AdsController::class], function () {
//     Route::get('/list-all', 'list')->name('ads.all');
//     Route::get('/detail/{id}', 'detail')->name('ads.detail');
//     Route::get('/delete/{id}', 'delete')->name('ads.delete');
//     Route::get('/non-slider', 'detail_nonslider')->name('ads.nonslider');
//     Route::get('/delete/non-slider/{id}', 'delete_nonslider')->name('ads.nonslider.delete');
//     Route::post('/store', 'store')->name('ads.store');
//     Route::post('/update/{id}', 'update')->name('ads.update');
//     Route::post('/publish', 'publish')->name('ads.publish');
//     Route::get('/publish-one/{id}', 'publish_one')->name('ads.publish_one');
// });
// Route API Testimoni
// Route::group(['prefix' => 'testimoni', 'controller' => TestimoniController::class], function () {
//     Route::get('/list-all', 'list')->name('testimoni.all');
//     Route::get('/detail/{id}', 'detail')->name('testimoni.detail');
//     Route::get('/delete/{id}', 'delete')->name('testimoni.delete');
//     Route::post('/store', 'store')->name('testimoni.store');
//     Route::post('/update/{id}', 'update')->name('testimoni.update');
//     Route::get('/publish-one/{id}', 'publish_one')->name('testimoni.publish_one');
// });
// // Route API Event
// Route::group(['prefix' => 'event', 'controller' => ControllersEventController::class], function () {
//     Route::get('/list-all', 'list')->name('event.all');
//     Route::get('/detail/{id}', 'detail')->name('event.detail');
//     Route::get('/publish-one/{id}', 'publish_one')->name('event.publish_one');
//     Route::get('/delete/{id}', 'delete')->name('event.delete');
//     Route::post('/store', 'store')->name('event.store');
//     Route::post('/update/{id}', 'update')->name('event.update');
//     Route::post('/publish', 'publish')->name('event.publish');
// });
// Route API Anggota
// Route::group(['prefix' => 'anggota', 'controller' => AnggotaController::class], function () {
//     Route::get('/list', 'list')->name('anggota.all');
//     Route::get('/detail/{id}', 'detail')->name('anggota.detail');
//     Route::get('/delete/{id}', 'delete')->name('anggota.delete');
//     Route::post('/store', 'store')->name('anggota.store');
//     Route::post('/update/{id}', 'update')->name('anggota.update');
//     Route::post('/import', 'import')->name('anggota.import');
//     Route::get('/export', 'export')->name('anggota.export');
//     Route::get('/template', 'template')->name('anggota.template');
// });
// Route API Pengurus
// Route::group(['prefix' => 'pengurus', 'controller' => PengurusController::class], function () {
//     Route::get('/list', 'list')->name('pengurus.all');
//     Route::get('/detail/{id}', 'detail')->name('pengurus.detail');
//     Route::get('/delete/{id}', 'delete')->name('pengurus.delete');
//     Route::post('/store', 'store')->name('pengurus.store');
//     Route::post('/update/{id}', 'update')->name('pengurus.update');
// });
// Route API Koin Nusantara
// Route::group(['prefix' => 'koin', 'controller' => KoinBerbagiController::class], function () {
//     Route::group(['prefix' => 'campaign'], function () {
//         Route::get('/list', 'list_campaign')->name('koin.campaign.all');
//         Route::get('/detail/{id}', 'detail_campaign')->name('koin.campaign.detail');
//         Route::get('/approve/{id}', 'approve_campaign')->name('koin.campaign.approve');
//         Route::post('/store', 'create_campaign')->name('koin.campaign.store');
//         Route::get('/delete/{id}', 'delete_campaign')->name('koin.campaign.delete');
//         Route::post('/update/{id}', 'update_campaign')->name('koin.campaign.update');
//     });

//     Route::group(['prefix' => 'transaksi'], function () {
//         Route::get('/list', 'list_transaksi')->name('koin.transaksi.all');
//         Route::get('/detail/{id}', 'detail_transaksi')->name('koin.transaksi.detail');
//         Route::post('/store', 'create_transaksi')->name('koin.transaksi.store');
//         Route::post('/update/{id}', 'update_transaksi')->name('koin.transaksi.update');
//         Route::get('/delete/{id}', 'delete_transaksi')->name('koin.transaksi.delete');
//     });
// });
/*
|--------------------------------------------------------------------------
| API Kategori Berita
|--------------------------------------------------------------------------
*/
// Route::group(['prefix' => 'kategori-berita', 'controller' => KategoriBeritaController::class], function () {
//     Route::get('/list-all', 'list')->name('kategori-berita.all');
//     Route::get('/detail/{id}', 'detail')->name('kategori-berita.detail');
//     Route::get('/set-status/{id}', 'set_status')->name('kategori-berita.set_status');
//     Route::get('/delete/{id}', 'delete')->name('kategori-berita.delete');
//     Route::post('/store', 'store')->name('kategori-berita.store');
//     Route::post('/update/{id}', 'update')->name('kategori-berita.update');
// });
