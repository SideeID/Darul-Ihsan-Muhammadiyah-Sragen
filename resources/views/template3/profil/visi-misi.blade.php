@extends(config('app.template') . '.profil.main')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="content-profil">
            <div class="row align-items-end">
                <h2 class="fw-bold text-dark profil-struktur-title" style="font-size: 36px;">
                    Visi & Misi
                </h2>
            </div>
            <div class="row mt-4">
                <h4 class="mb-4 fw-bold text-dark">Visi Sekolah</h4>
                <p>Terbentuknya kader Muhammadiyah yang Islami, Berprestasi, dan Terampil</p>
            </div>
            <div class="row mt-4">
                <h4 class="mb-4 fw-bold text-dark">Misi Sekolah</h4>
                <div class="row row-visi2 d-flex align-items-start">
                    <div class="col-1">
                        <p class="subjudul fw-bold">01</p>
                    </div>
                    <div class="col-11">
                        <p>Menumbuhkan dan membiasakan pola hidup Islami dalam setiap aspek kehidupan sehari-hari.</p>
                    </div>
                </div>
                <div class="row row-visi2">
                    <div class="col-1">
                        <p class="subjudul">02</p>
                    </div>
                    <div class="col-11">
                        <p>Mewujudkan pembelajaran yang aktif, inovatif, kreatif, edukatif, menyenangkan serta integratif.</p>
                    </div>
                </div>
                <div class="row row-visi2">
                    <div class="col-1">
                        <p class="subjudul">03</p>
                    </div>
                    <div class="col-11">
                        <p>Membina dan memperdalam bidang akademik dan keagamaan sehingga berilmu pengetahuan luas dan berprestasi unggul.</p>
                    </div>
                </div>
                <div class="row row-visi2">
                    <div class="col-1">
                        <p class="subjudul">04</p>
                    </div>
                    <div class="col-11">
                        <p>Mengembangkan keterampilan dalam Teknologi Informasi, Komputer, Seni Baca Al-Qur’an, Seni berpidato dan Berorganisasi.</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-12">
                    <a href="{{ route('sejarah-pondok') }}" class="text-start text-decoration-none w-100 d-flex">
                        <img src="{{ asset('template2/img/arrow-left.svg') }}" alt=""><span
                            class="text-dark">Sebelumnya</span>
                    </a>
                    <h3 class="fw-bold fs-4 mt-2">Sejarah Pondok</h3>
                </div>
                <div class="col-md-6 col-12 mt-5 mt-md-0">
                    <a href="{{ route('struktur-organisasi') }}" class="text-start text-decoration-none w-100 d-flex">
                        <span class="text-dark">Berikutnya</span>
                        <img src="{{ asset('template2/img/arrow-right.svg') }}" alt="">
                    </a>
                    <h3 class="fw-bold fs-4 mt-2">Struktur Organisasi</h3>
                </div>
            </div>
        </div>
    </main>
@endsection
