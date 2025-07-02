@extends(config('app.template') . '.profil.main')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="content-profil">
            <div class="row align-items-end mt-4">
                <div class="col">
                    <img src="{{ asset('template3/image/selayang2.jpeg') }}"
                        style="border-radius: 16px; height:300px; width:100%; object-fit:cover;" />
                    <h1 class="fw-bold text-dark mt-4 profil-struktur-title">
                        Selayang Pandang
                    </h1>
                </div>
            </div>
            <div class="row-paragraf mt-3">
                <p>Pondok Darul Ihsan Muhammadiyah Sragen atau biasa disebut Dimsa, adalah pondok pesantren yang memiliki visi mewujudkan kader persyarikatan dan umat, yang Islami, berprestasi, terampil dan berjiwa leadership serta  berwawasan global. Dimsa adalah salah satu wadah Pendidikan yang berada dalam pengawasan Majelis Dikdasmen Pimpinan Daerah Sragen. Dimsa memiliki jenjang Pendidikan Tingkat SMP dan MA, yang mewajibkan semua santrinya berasrama, dengan gedung dan fasilitas yang lengkap dan memadai serta didampingi oleh para asatidz yang loyal dan profesional.</p>
                <p>Untuk mewujudkan visi besar diatas, maka serangkaian program kegiatan telah dirancang untuk menempa para santri, agar menjadi kader persyarikatan, kader umat dan kader bangsa. Seluruh aktivitas yang ada di pesantren ini adalah Pendidikan, mulai dari ibadahnya, sekolahnya, di asramanya dan organisasinya terprogram, terarah dan terbimbing, sehingga akan menjadikan kader yang berkualitas handal dan tangguh.</p>
            </div>
            <hr>
            <div class="row justify-content-between">
                <div class="col-md-6 col-12">
                    <a href="{{ route('sejarah-pondok') }}" class="text-start text-decoration-none w-100 d-flex"><span
                            class="text-dark">Berikutnya <img src="{{ asset('template2/img/arrow-right.png') }}"
                                alt=""></span>
                    </a>
                </div>
                <div class="col-md-6 col-12">
                    <a href="{{ route('sejarah-pondok') }}" class="text-start text-decoration-none w-100 d-flex">
                    </a>
                    <h3 class="fw-bold fs-4 mt-2 ">Sejarah Pondok</h3>
                </div>
            </div>
        </div>
    </main>
@endsection
