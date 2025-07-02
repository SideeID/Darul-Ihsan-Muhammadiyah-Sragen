{{-- hero --}}
<style>
    #hero {
        height: 100vh;
    }

    .carousel-inner,
    .carousel-item,
    .carousel-item img {
        height: 100%;
        object-fit: cover;
        filter: brightness(90%)
    }
</style>
<section id="hero">
    <!-- slider hero -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"
        style="position: relative; width: 100%; height: 100%; z-index: 1;">
        {{-- <div>
            <div class="carousel-indicators m-0 d-flex flex-column align-items-end justify-content-center">
                <div class="numbering text-white fw-semibold">01</div>
                <div type="button" data-bs-target="carouselExampleIndicators" data-bs-slide-to="0"
                    class="active page page1" aria-current="true" aria-label="Slide 1">
                </div>
                <div type="button" data-bs-target="carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"
                    class="page page2">
                </div>
                <div type="button" data-bs-target="carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
                    class="page page3">
                </div>
                <div class="numbering text-secondary fw-semibold">03</div>
            </div>
        </div> --}}
        <div class="container text-white"
            style="z-index: 999; position: absolute !important; top: 50%;">
            <h1>Beriman, Unggul dalam Prestasi,</h1>
            <h1>dan Berakhlaqul Karimah</h1>
        </div>
        <style>
            .social-media-icon-mobile-container {
                gap: 16px;
                margin: 0;
                display: none;
            }

            @media only screen and (max-width: 768px) {
                .social-media-icon-mobile-container {
                    display: flex;
                }
            }
        </style>
        <div class="container"
            style="z-index: 999; position: absolute !important; top: 75%; color: rgba(208, 213, 221, 1);">
            <div class="social-media-icon-mobile-container col-lg-6 col-md-12">
                <a href="https://facebook.com">
                    <img src="{{ asset('template3/amba/facebook.svg') }}" alt="">
                </a>
                <a href="https://www.instagram.com/smpdarulihsan?igsh=MW1waW9oaWJ3MTk5OQ==">
                    <img src="{{ asset('template3/amba/instagram.svg') }}" alt="">
                </a>
                <a href="https://youtube.com/@dimsatv?si=_LUIgR0dTrhkxSTz">
                    <img src="{{ asset('template3/amba/youtube.svg') }}" alt="">
                </a>
                <a href="https://tiktok.com">
                    <img src="{{ asset('template3/amba/tiktok.svg') }}" alt="">
                </a>
                <a href="https://x.com">
                    <img src="{{ asset('template3/amba/x.svg') }}" alt="">
                </a>
            </div>
        </div>

        <div class="carousel-inner ">
            <div class="carousel-item hero-slide active">
                <img src="{{ asset('template3/assets/image/hero.png') }}" class="d-block w-100" alt="Slide 1">
            </div>
            <div class="carousel-item hero-slide">
                <img src="{{ asset('template3/assets/image/hero.png') }}" class="d-block w-100" alt="Slide 2">
            </div>
            <div class="carousel-item hero-slide">
                <img src="{{ asset('template3/assets/image/hero.png') }}" class="d-block w-100" alt="Slide 3">
            </div>
        </div>
    </div>

    <div class="container hero-content d-flex align-self-end justify-content-between"
        style="position:absolute; z-index: 1;">
        <div class="row g-5 hero-content-wrapper w-100">
            <div class="col-lg-6 col-md-12 hero-content-bottom align-self-end pe-lg-5 pe-md-4 mt-5 mt-md-3">
                <div class="cards-wrapper">
                    <div class="cards py-3">
                        <div class="card d-flex flex-row gap-3 align-items-center"
                            style="border:none; background: none;">
                            <img src="{{ asset('template3/image/landing-kabar.png') }}" alt=""
                                style="height: 160px; width: 200px; border-radius: 16px; object-fit: cover; flex-shrink: 0;">
                            <div class="div-2 gap-3 d-flex flex-column">
                                <div class="div-3 gap-1 d-flex flex-column">
                                    <p class="m-0"
                                        style="padding: 4px 8px; background-color: rgba(230, 240, 255, 1); border-radius: 8px; width: fit-content; color: rgba(0, 62, 156, 1);">
                                        Kabar
                                        Dimsa</p>
                                    <p class="position-relative m-0" style="color: rgba(252, 252, 253, 1);">MA DIMSA
                                        Mengirim 15 Santri
                                        untuk Program Mobi...
                                    </p>
                                </div>
                                <a href="/"
                                    class="" style="text-decoration: none;">
                                    <p class="m-0" style="color: rgba(249, 250, 251, 1); ">
                                        Lihat Detail ></p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6 col-md-12">
                <div class="card card-kabar bg-transparent" style="border:none; ">
                    <div class="row g-0 flex-nowrap hero-top-card">
                        <div class="col-lg-6 col-md-12 hero-top-card-text"
                            style="background-color:#3C7B46; border-radius: 8px 0px 0px 8px;">
                            <div class="d-flex flex-column card-body p-3 pt-4 mt-1">
                                <p class="card-text fw-500 mb-2">Kabar Darun Najah</p>
                                <h5 class="card-title lh-base fw-700" style="color: #ffff">Kegiatan Penutupan Masa
                                    Pengenalan
                                    Lingkungan Sekolah (MPLS)
                                    dengan&nbsp;&nbsp;...</h5>

                                <p class="card-text fw-400 mt-lg-4 mt-md-0 pt-lg-3 pt-md-0 ">
                                    <a href="" style="color:#ffff; text-decoration: none;">
                                        Lihat selengkapnya
                                    </a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <img src="{{ asset('template2/assets/image/berita-besar.png') }}"
                                class="img-fluid object-fit-cover h-100 w-100 hero-top-card-img" alt="..."
                                style=" border-radius: 0px 8px 8px 0px;">
                        </div>
                    </div>
                </div>
            </div> --}}
            <style>
                .social-media-icon-container {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    align-items: flex-end;
                    margin: 0;
                    gap: 16px;
                }
            </style>
            <div class="social-media-icon-container col-lg-6 col-md-12">
                <a href="https://facebook.com">
                    <img src="{{ asset('template3/amba/facebook.svg') }}" alt="">
                </a>
                <a href="https://www.instagram.com/smpdarulihsan?igsh=MW1waW9oaWJ3MTk5OQ==">
                    <img src="{{ asset('template3/amba/instagram.svg') }}" alt="">
                </a>
                <a href="https://youtube.com/@dimsatv?si=_LUIgR0dTrhkxSTz">
                    <img src="{{ asset('template3/amba/youtube.svg') }}" alt="">
                </a>
                <a href="https://tiktok.com">
                    <img src="{{ asset('template3/amba/tiktok.svg') }}" alt="">
                </a>
                <a href="https://x.com">
                    <img src="{{ asset('template3/amba/x.svg') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</section>

<style>
    @media only screen and (max-width: 768px) {
        .responsive-news-container {
            background-color: black;
            flex-direction: column !important;
        }

        .responsive-news-image {
            width: 100% !important;
        }

        .hidden-on-mobile {
            display: none;
        }
    }
</style>
<div class="d-none hero-card-bottom-mobile px-1">
    <div class=" hero-card-bottom-mobile-item p-3 py-4 responsive-news-container">
        <div class="card d-flex flex-row gap-3 align-items-center responsive-news-container"
            style="border:none; background: none;">
            <img src="{{ asset('template3/image/landing-kabar.png') }}" alt=""
                class="responsive-news-image"
                style="height: 160px; width: 200px; border-radius: 16px; object-fit: cover; flex-shrink: 0;">
            <div class="div-2 gap-3 d-flex flex-column">
                <div class="div-3 gap-1 d-flex flex-column">
                    <p class="m-0 hidden-on-mobile"
                        style="padding: 4px 8px; background-color: rgba(230, 240, 255, 1); border-radius: 8px; width: fit-content; color: rgba(0, 62, 156, 1);">
                        Kabar
                        Dimsa</p>
                    <p class="position-relative m-0 " style="color: rgba(252, 252, 253, 1);">MA
                        DIMSA
                        Mengirim 15 Santri
                        untuk Program Mobi...
                    </p>
                </div>
                <a href="https://framerusercontent.com/assets/gymX87C5Jo5LkoYxmvnmTe3JqvU.pdf" class=""
                    style="text-decoration: none;">
                    <p class="m-0 " style="color: rgba(249, 250, 251, 1); ">
                        Lihat Detail ></p>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- tentang --}}
<section id="tentang">
    <div class="container tentang-container">
        <div class="row row-gap-5">
            <div class="col-md-12 col-lg-4 mb-md-4 mb-lg-0" style="position: relative;">
                <p>Selayang Pandang</p>
                <img src="{{ asset('template3/image/landing-selayang.png') }}" alt="" class="w-100"
                    style="position: sticky; top: 25%; transform-origin: center; height: 280px; object-fit: cover; border-radius: 16px;">
            </div>
            <div class="col-md-12 col-lg-8 row-gap-5 d-flex flex-column">
                <h1>Utlubil Ilma Minal Mahdi Ilallahdi</h1>
                <p class="tentang-text">
                    Selamat datang di Pondok Pesantren Darul Ihsan Muhammadiyah Sragen, tempat di mana pendidikan dan
                    pengembangan karakter santri menjadi prioritas utama. Kami percaya bahwa pendidikan adalah fondasi yang
                    membentuk masa depan individu dan masyarakat. Di Pondok Pesantren Darul Ihsan, kami berkomitmen untuk
                    menciptakan lingkungan belajar yang positif dan inspiratif, di mana setiap santri dapat mengembangkan
                    potensi diri mereka secara maksimal.
                </p>
                <a href="{{route('selayang-pandang')}}" style="text-decoration: none;" class="btn btn-outline-dark w-50" >Selengkapnya ></a>

                {{-- <div class="mt-5">
                    <p class="fw-bold py-4 fs-5" style="color: #080E1E;">Core Value</p>
                    <ul class="list-tentang list-unstyled fw-bold" style="color: #182856;">
                        <li class="d-flex align-items-center">
                            <a href="{{ route('core-value') }}">
                                <img src="{{ asset('template2/assets/image/profile.svg') }}" alt="icon">
                                <span class="ms-3">Qudwah</span>
                            </a>
                        </li>
                        <hr>
                        <li class="d-flex align-items-center">
                            <a href="{{ route('core-inovatif') }}">
                                <img src="{{ asset('template2/assets/image/lamp-charge.svg') }}" alt="icon">
                                <span class="ms-3">Inovatif, Kreatif & Produktif</span>
                            </a>
                        </li>
                        <hr>
                        <li class="d-flex align-items-center">
                            <a href="{{ route('core-semangat') }}">
                                <img src="{{ asset('template2/assets/image/ranking.svg') }}" alt="icon">
                                <span class="ms-3">Semangat Prestasi</span>
                            </a>
                        </li>
                        <hr>
                        <li class="d-flex align-items-center">
                            <a href="{{ route('core-bermartabat') }}">
                                <img src="{{ asset('template2/assets/image/medal-star.svg') }}" alt="icon">
                                <span class="ms-3">Bermartabat</span>
                            </a>
                        </li>
                        <hr>
                        <li class="d-flex align-items-center">
                            <a href="{{ route('core-berwawasan') }}">
                                <img src="{{ asset('template2/assets/image/teacher.svg') }}" alt="icon">
                                <span class="ms-3">Berwawasan Global</span>
                            </a>
                        </li>
                        <hr>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
</section>

{{-- fasilitas --}}
<section class="container" style="overflow-x: hidden;">
    <iframe src="https://www.youtube.com/embed/U25Nbeyfn8A" title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen class="w-100"
        style="height: 640px; border-radius: 16px;"></iframe>
    {{-- <div class="container position-relative">
        <div class="header-fas d-flex justify-content-between align-items-center py-4 mb-4">
            <h3 class="fw-semibold">Fasilitas Kami</h3>
            <p class=" fasilitas-more-btn">
                <a href="{{ route('fasilitas') }}" class="text-decoration-none" style="font-weight: 500;">
                    Lihat semua
                </a>
            </p>
        </div>
        <div class="fasilitas-slider-container slider">
            <div class="slide-track d-flex gap-4">
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Asrama Santri</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas2.jpeg') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Gedung Madrasah</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas3.png') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Laboratorium Komputer</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas4.png') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Laboratorium Sains</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas5.jpeg') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Masjid</p>
                        </div>
                    </div>
                </div>

                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Asrama Santri</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas2.jpeg') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Gedung Madrasah</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas3.png') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Laboratorium Komputer</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas4.png') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Laboratorium Sains</p>
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="card border-0 py-1" style="width: 18rem; border-radius: 8px;">
                        <img src="{{ asset('template2/assets/image/img-fasilitas5.jpeg') }}" class="card-img"
                            alt="..." style="width: 18rem; height: 18rem;">
                        <div class="card-body px-0 py-3">
                            <p class="card-text">Masjid</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <p class="fasilitas-more-btn-mobile d-none text-center">
            <a href="{{ route('fasilitas') }}" class="text-decoration-none" style="font-weight: 700;">
                Lihat semua
            </a>
        </p>
    </div> --}}
</section>

<style>
    @media only screen and (max-width: 768px) {
        .responsive-lembaga-akademik-container {
            flex-direction: column;
        }
    }
</style>
<section class="container d-flex flex-column">
    <p>Lembaga Akademik</p>
    <div class="d-flex gap-5 responsive-lembaga-akademik-container">
        <div class="d-flex flex-column w-100 gap-3">
            <a href="{{route('akademik-smp')}}" class="text-decoration-none">
                <img src="{{ asset('template3/image/hero-smp.svg') }}" alt="" class="w-100"
                    style="border-radius: 16px; height: 300px; object-fit: cover;">
                <h4 class="m-0 mt-3"
                    style="background-color: rgba(9, 30, 111, 1); color: white; padding: 8px 24px; width: fit-content; border-radius: 16px;">
                    SMP
                </h4>
                <h4 class="pt-2" style="color: black">Darul Ihsan Muhammadiyah Sragen</h4>
            </a>
        </div>
        <div class="d-flex flex-column w-100 gap-3">
            <a href="{{route('akademik-sma')}}" class="text-decoration-none">
                <img src="{{ asset('template3/image/imagema.svg') }}" alt="" class="w-100"
                    style="border-radius: 16px; height: 300px; object-fit: cover;">
                <h4 class="m-0 mt-3"
                    style="background-color: rgba(11, 112, 65, 1); color: white; padding: 8px 24px; width: fit-content; border-radius: 16px;">
                    MA
                </h4>
                <h4 class="pt-2" style="color: black">Darul Ihsan Muhammadiyah Sragen</h4>
            </a>
        </div>
    </div>
</section>

<style>
    #kerja-sama-container {
        width: 100%;
        height: fit-content;
    }

    .kerja-sama {
        animation: 14s infinite linear infinity-slider
    }

    @keyframes infinity-slider {
        from {
            transform: translateX(0px)
        }

        to {
            transform: translateX(calc((-200px + -100px) * 7))
        }
    }
</style>
<section>
    <div class="container">
        <p>Kerja Sama</p>
        <div id="kerja-sama-container" class="d-flex flex-row" style="gap: 100px; overflow: hidden;">
            <div class="d-flex kerja-sama" style="gap: 100px;">
                @foreach ($partners as $partner)
                <img src="{{ $partner->logo_url }}" alt="{{ $partner->nama }}" style="height: 50px; width: 200px; object-fit: contain;">
                @endforeach
            </div>
        </div>
    </div>
</section>

<style>
    .article-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 80px;
    }

    @media only screen and (max-width: 768px) {
        .responsive-agenda-container {
            flex-direction: column-reverse;
        }

        .responsive-agenda {
            width: 100% !important;
        }
    }
</style>
<section style="background-color: rgba(5, 18, 68, 1); color: white;">
    <article class="container">
        <header class="mb-5">
            <h5 class="m-0">Agenda DIMSA</h5>
        </header>
        <main class="article-container responsive-agenda-container">
            <article class="w-50 responsive-agenda">
                <h2>Dimsa Fantastic Show #4</h2>
                <p>25 Jan 2024 - 09:00 WIB</p>
                <p class="d-flex gap-1"><img src="{{ asset('template3/amba/location.svg') }}" alt="">Hall
                    Umar Bin
                    Khattab</p>
            </article>
            <article class="w-100">
                <img src="{{ asset('template3/image/landing-agenda.jpg') }}" alt="" class="w-100"
                    style="height: 400px; border-radius: 16px; object-fit: cover;">
            </article>
        </main>
    </article>
</section>

<style>
    @media only screen and (max-width: 768px) {
        .responsive-latest-news-container {
            flex-direction: column;
        }

        .responsive-latest-news {
            width: 100% !important;
        }
    }
</style>
<section class="container">
    <header class="d-flex mb-5 justify-content-between align-items-center">
        <h3 class="m-0 fw-bold">Apa yang terjadi di DIMSA</h3>
        <a href="{{route('berita.kabar')}}" class="m-0" style="text-decoration: none;">Selengkapnya</a>
    </header>
    <main class="d-flex gap-5 responsive-latest-news-container">
        <article class="w-100">
            <img src="{{ asset('template3/image/landing-kabar.png') }}" alt="" class="w-100 mb-3"
                style="border-radius: 16px; height: 500px; object-fit: cover;">
            <p>Kabar Dimsa &bull; 05 Jan, 2024</p>
            <h3>MA DIMSA Mengirim 15 Santri untuk Program Mobilitas Pelajar Internasional ke Singapura ...</h3>
        </article>
        <article class="w-50 d-flex flex-column gap-3 responsive-latest-news">
            <div class="d-flex gap-3 w-100">
                <img src="{{ asset('template3/image/landing-prestasi1.png') }}" alt="" class="w-50"
                    style="border-radius: 16px; height: 140px; object-fit: cover;">
                <div class="w-50 d-flex flex-column justify-content-center">
                    <p>Prestasi &bull; 03 Jan, 2024</p>
                    <h6>Gemilang di Ajang FLS2N Sragen, Ananda Berhasil Raih Juara 3 dan Ba...</h6>
                </div>
            </div>
            <div class="d-flex gap-3 w-100">
                <img src="{{ asset('template3/image/landing-prestasi2.png') }}" alt="" class="w-50"
                    style="border-radius: 16px; height: 140px; object-fit: cover;">
                <div class="w-50 d-flex flex-column justify-content-center">
                    <p>Prestasi &bull; 03 Jan, 2024</p>
                    <h6>Prestasi Gemilang! Shufina Nur Aziziyah Juara 2 di Lomba Engli...</h6>
                </div>
            </div>
            <div class="d-flex gap-3 w-100">
                <img src="{{ asset('template3/image/landing-prestasi3.png') }}" alt="" class="w-50"
                    style="border-radius: 16px; height: 140px; object-fit: cover;">
                <div class="w-50 d-flex flex-column justify-content-center">
                    <p>Prestasi &bull; 03 Jan, 2024</p>
                    <h6>DIMSA Bawa Pulang Medali di Turnamen Tapak Suci Nasional Universi...</h6>
                </div>
            </div>
            <div class="d-flex gap-3 w-100">
                <img src="{{ asset('template3/image/landing-kabar2.png') }}" alt="" class="w-50"
                    style="border-radius: 16px; height: 140px; object-fit: cover;">
                <div class="w-50 d-flex flex-column justify-content-center">
                    <p>Kabar Dimsa &bull; 03 Jan, 2024</p>
                    <h6>Selamat Menempuh Asesmen Nasional Berbasis Komputer (AN...</h6>
                </div>
            </div>
        </article>
    </main>
</section>

<style>
    @media only screen and (max-width: 768px) {
        .responsive-testimoni-container {
            flex-direction: column;
        }
    }
</style>
<section class="container d-flex flex-column">
    <header class="d-flex mb-5 justify-content-between align-items-center">
        <h3 class="fw-bold">Testimoni Alumni</h3>
        <a href="{{route('testimoni')}}" class="m-0" style="text-decoration: none;">Selengkapnya</a>
    </header>
    <div class="d-flex gap-5 responsive-testimoni-container">
        @foreach ($testimoni as $item)
            <div class="d-flex flex-column w-100 gap-3 p-5 shadow rounded">
                <h5>{{ Str::limit($item->keterangan, 150) }}</h5>
                <div class="d-flex align-items-center gap-3">
                    <img
                        src="{{ $item->file_url ?? asset('default-image.jpg') }}" alt=""
                        style="width: 72px; height: 72px; object-fit: cover; border-radius: 9999px">

                    <span class="m-0">
                        <h6 class="m-0">{{ $item->nama }}</h6>
                        <p class="m-0">Alumni {{ $item->wali }}</p>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</section>

<style>
    @media only screen and (max-width: 768px) {
        .responsive-poster-container {
            flex-direction: column;
        }

        .responsive-donasi-poster {
            flex-direction: column;
            height: fit-content !important;
        }
    }
</style>

<section id="textbox"  class="mt-5 mb-0 p-0" style="align-items: center;  justify-content: center;">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center gap-4">
            <div class="text-jadwal text-white p-3 d-flex rounded position-relative"
            style="overflow: hidden; transition: background-color 0.3s ease;"
            onclick="window.location.href='#'">
                <div class="textleft position-absolute d-flex align-items-center gap-3">
                    <p>SMP Darul Ihsan Muhammadiyah </p>
                    <img src="{{ asset('template3/image/buliding2.svg') }}" alt="">
                </div>
                <div class="textright position-absolute d-flex align-items-center gap-3">
                    <img src="{{ asset('template3/image/buildings.svg') }}" alt="">
                    <p>SMP Darul Ihsan Muhammadiyah</p>
                </div>
                <div class="info position-absolute align-items-left" style="bottom: 50px; left: 35px; right: 0;">
                    <p style="font-size: 20px; font-weight: 400;">Jadwal Penerimaan</p>
                    <h5 style="font-size: 25px; font-weight: 700;">Santri Baru 2024</h5>
                </div>
            </div>
            <div class="text-literasi p-3 d-flex rounded position-relative"
            style="overflow: hidden; transition: background-color 0.3s ease;"
            onclick="window.location.href='#'">
                <div class="info position-absolute align-items-left" style="top: 40px; bottom: 0px; left: 35px; right: 0;">
                    <h5 style="color: #101828; font-size: 25px; font-weight: 700;">Ruang Literasi</h5>
                    <p style="color: #344054; font-size: 20px; font-weight: 400;">Darul Ihsan Muhammadiyah Sragen</p>
                </div>
                <img class="whitebook position-absolute" src="{{ asset('template3/image/whitebook.svg') }}" alt="" style="transition: all 0.5s ease; position: absolute;">
                <img class="pinkbook position-absolute" src="{{ asset('template3/image/pinkbook.svg') }}" alt="" style="transition: all 0.5s ease; position: absolute;">
                <img class="bluebook position-absolute" src="{{ asset('template3/image/bluebook.svg') }}" alt="" style="transition: all 0.5s ease; position: absolute;">
            </div>
        </div>
    </div>
</section>

<section id="donasi" class="mt-0 py-4">
    <div class="container mt-0 pl-2">
        <div class="row justify-content-center">
            <div class="row no-gutters align-items-center donation-card" style="background: linear-gradient(45deg, #FDB022, #E17911); border-radius: 15px;">
                <div class="col-md-7 col-12 text-left py-5 px-5">
                    <img src="{{ asset('template3/image/logo lazizmu.svg') }}" alt="Logo Lazismu" style="width: 50px; margin-bottom: 15px;">
                    <h2 class="text-black" style="font-size: 23px; font-weight: 700">Salurkan Harta Terbaikmu,<br>Raih Berkah Ilahi.</h2>
                    <button class="donation-btn mt-3 text-white" style="border: none; border-radius: 5px;">Donasi Sekarang</button>
                </div>
                <div class="col-md-5 col-12 d-none d-md-block">
                    <img src="{{ asset('template3/image/donasi.svg') }}" alt="Donation Box" style="width: 100%; height: 280px;">
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    #textbox .text-jadwal{
        background-color: #0B7041;
        width: 450px;
        height: 550px;
    }

    #textbox .text-jadwal:hover {
        background-color: #062215;
    }

    #textbox .text-jadwal .textleft{
        top: 55px; left: -150px; flex-direction: row; transition: all 0.5s ease
    }

    #textbox .text-jadwal:hover .textleft {
        left: -80px;
    }

    #textbox .text-jadwal .textright{
        top: 125px; right: -150px; flex-direction: row; transition: all 0.5s ease
    }

    #textbox .text-jadwal:hover .textright {
        right: -80px;
    }

    #textbox .text-jadwal .textleft p,
    #textbox .text-jadwal .textright p {
        margin-block: 5px;
        font-size: 22px;
        font-weight: 600;
        width: max-content;
        color: #091E6F;
        background-color: #ffffff;
        padding: 10px 12px;
        border-radius: 8px;
        display: inline;
    }

    #textbox .text-jadwal .textleft img,
    #textbox .text-jadwal .textright img {
        width: 50px;
        height: auto;
        padding: 9px 8px;
        border-radius: 8px;
    }

    #textbox .text-jadwal .textleft img {
        background-color: #091E6F;
    }

    #textbox .text-jadwal .textright img {
        background-color: #ffffff;
    }

    #textbox .text-literasi {
        background-color: #F2F4F7;
        width: 450px;
        height: 550px;
    }

    #textbox .text-literasi:hover {
        background-color: #f2f7ff;
    }

    #textbox .text-literasi .bluebook {
        bottom: -160px;
        right: -130px;
        width: 480px;
        z-index: 3;
    }

    #textbox .text-literasi:hover .bluebook {
        bottom: -140px;
        right: -120px;
    }

    #textbox .text-literasi .pinkbook {
        bottom: -60px;
        right: -25px;
        width: 500px;
        z-index: 2;
    }

    #textbox .text-literasi:hover .pinkbook {
        bottom: -40px;
        right: 0px;
    }

    #textbox .text-literasi .whitebook {
        bottom: -150px;
        left: -30px;
        width: 350px;
        z-index: 1;
    }

    #textbox .text-literasi:hover .whitebook {
        bottom: -140px;
        left: -40px;
    }

    .donation-card{
        width: 920px;
        height: 280px;
    }

    .donation-btn{
        background-color: black;
        font-size: 10px;
        padding: 10px 20px;
    }

    .donation-btn:hover {
        background-color: #090909;
    }

    @media(max-width: 414px){
        #textbox .text-jadwal, #textbox .text-literasi{
            width: 345px;
            height: 345px;
        }

        #textbox .text-literasi .bluebook{
            width: 350px;
            height: auto;
            bottom: -130px;
            right: -130px;
        }

        #textbox .text-literasi:hover .bluebook {
            bottom: -110px;
            right: -100px;
        }

        #textbox .text-literasi .pinkbook {
            width: 330px;
            height: auto;
            bottom: -60px;
            right: -25px;
        }

        #textbox .text-literasi:hover .pinkbook {
            bottom: -40px;
            right: 0px;
        }

        #textbox .text-literasi .whitebook {
            width: 250px;
            height: auto;
            bottom: -140px;
            left: 0px;
        }

        #textbox .text-literasi:hover .whitebook {
            bottom: -120px;
            left: -10px;
        }

        .donation-card{
            width: 345px;
            height: 345px;
        }

        .donation-btn{
            font-size: 15px;
            padding: 10px 45px;
        }
    }

</style>

{{--<section class="container d-flex flex-column gap-5">
    <div class="d-flex gap-5 responsive-poster-container">
        <div class="d-flex flex-column w-100 gap-3"
            style=" height: 700px; background-color: rgba(11, 112, 65, 1); border-radius: 16px; color: white;">
            <div class="h-100 d-flex flex-column justify-content-center gap-3"
                style="color: rgba(9, 30, 111, 1); overflow: hidden;">
                <div class="d-flex gap-3" style="transform: translateX(-25%)">
                    <h4 class="m-0"
                        style="background-color: rgba(255, 255, 255, 1); padding: 32px 40px; width: fit-content; border-radius: 12px;">
                        MA
                        Darul
                        Ihsan Muhammadiyah
                    </h4>
                    <img class=""
                        style="background-color: rgba(9, 30, 111, 1);  padding: 0 16px; border-radius: 12px;"
                        src="{{ asset('template3/amba/ma.svg') }}" alt="">
                </div>
                <div class="d-flex gap-3" style="transform: translateX(25%)">
                    <img class=""
                        style="background-color: rgba(9, 30, 111, 1);  padding: 0 16px; border-radius: 12px;"
                        src="{{ asset('template3/amba/ma.svg') }}" alt="">
                    <h4 class="m-0"
                        style="background-color: rgba(255, 255, 255, 1); padding: 32px 40px; width: fit-content; border-radius: 12px;">
                        SMP
                        Darul
                        Ihsan Muhammadiyah
                    </h4>
                </div>
            </div>
            <div class="h-100 d-flex flex-column justify-content-center p-5">
                <p>Jadwal Penerimaan</p>
                <h1>Santri Baru 2024</h1>
            </div>
        </div>
        <div class="d-flex flex-column w-100 gap-3"
            style=" height: 700px; background-color: rgba(242, 244, 247, 1); border-radius: 16px; color: black;">
            <a href="{{route('berita.majalah')}}" class="text-decoration-none text-dark">
                <div class="h-100 d-flex flex-column justify-content-center p-5">
                    <h1>Ruang Literasi</h1>
                    <p>Darul
                        Ihsan Muhammadiyah Sragen</p>
                </div>
            </a>
            <div class="h-100 d-flex flex-column  gap-3" style="color: rgba(9, 30, 111, 1); overflow: hidden;">
                <img src="{{ asset('template3/amba/ruang-literasi.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between w-100 gap-3 p-5 responsive-donasi-poster"
        style="height: 440px; background-image: linear-gradient(to right, rgba(253, 176, 34, 1), rgba(225, 121, 17, 1)); border-radius: 16px; overflow: hidden;">
        <div class="d-flex flex-column justify-content-center gap-5 w-100">
            <img src="{{ asset('template3/amba/lazismu.svg') }}" alt=""
                style="height: fit-content; width: fit-content;">
            <h1>Salurkan Harta Terbaikmu, Raih Berkah Ilahi.</h1>
            <button class="btn btn-dark" style="width: fit-content;">Donasi Sekarang</button>
        </div>
        <div class="d-flex flex-column justify-content-center gap-5 w-100">
            <img src="{{ asset('template3/amba/donasi.png') }}" alt="" class="w-100">
        </div>
    </div>
</section> --}}
