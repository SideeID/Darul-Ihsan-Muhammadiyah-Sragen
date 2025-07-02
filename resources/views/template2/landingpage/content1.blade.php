{{-- hero --}}
<section id="hero">
    <!-- slider hero -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"
        style="position: relative; width: 100%; z-index: 1;">
        <div>
            <div class="m-0 carousel-indicators d-flex flex-column align-items-end justify-content-center">
                <div class="text-white numbering fw-semibold">01</div>
                <div type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                    class="active page page1" aria-current="true" aria-label="Slide 1">
                </div>
                <div type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"
                    class="page page2">
                </div>
                <div type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"
                    class="page page3">
                </div>
                <div class="numbering text-secondary fw-semibold">03</div>
            </div>
        </div>

        <div class="carousel-inner">
            @foreach($slideShow as $index => $slide)
                <div class="carousel-item hero-slide {{ $index == 0 ? 'active' : '' }}">
                    <img src="{{ asset($slide->file) }}" class="d-block w-100" alt="Slide {{ $index + 1 }}">
                </div>
            @endforeach
        </div>

    </div>

    <div class="container hero-content d-flex align-self-end justify-content-between"
        style="position:absolute; z-index: 1;">
        <div class="row g-5 hero-content-wrapper">
            <div class="mt-5 col-lg-6 col-md-12 hero-content-bottom align-self-end pe-lg-5 pe-md-4 mt-md-3">
                <div class="cards-wrapper">
                    <div class="py-3 cards">
                        <div class="card" style="border:none; background: none;">
                            <div class="div-2">
                                <div class="div-3">
                                    <div class="mb-2 text-wrapper fw-semibold">Brosur PSB</div>
                                    <p class="position-relative" style="color: #5a5f6d;">Informasi
                                        Penerimaan
                                        Santri baru PPAI Darun Najah 2 Malang
                                    </p>
                                </div>
                                <a href="https://framerusercontent.com/assets/gymX87C5Jo5LkoYxmvnmTe3JqvU.pdf"
                                    class="button-2 pe-3">
                                    <img src="{{ asset('template2/assets/image/icon-download.svg') }}" class="img"
                                        width="24px" />
                                    <div class="text-button position-relative"
                                        style="font-weight: 500; color: #182856;">
                                        Unduh
                                        Brosur
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="vr" style="width: 2px; color: #E6E6E8;"></div>
                        <div class="card" style="border:none; background: none;">
                            <div class="div-2">
                                <div class="div-3">
                                    <div class="mb-2 text-wrapper fw-semibold">Aktifitas/Kegiatan
                                    </div>
                                    <p class="position-relative" style="color: #5a5f6d;">Informasi
                                        Jadwal
                                        rutin
                                        harian santri PPAI Darun Najah 2 Malang</p>
                                </div>
                                <a href="" class="button-2 pe-3">
                                    <img src="{{ asset('template2/assets/image/icon-note.svg') }}" class="img"
                                        width="24px" />
                                    <div class="text-button position-relative"
                                        style="font-weight: 500; color: #182856;">
                                        Lihat Aktifitas
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="bg-transparent card card-kabar" style="border:none; ">
                    <div class="row g-0 flex-nowrap hero-top-card">
                        <div class="col-lg-6 col-md-12 hero-top-card-text"
                            style="background-color:#3C7B46; border-radius: 8px 0px 0px 8px;">
                            <div class="p-3 pt-4 mt-1 d-flex flex-column card-body">
                                <p class="mb-2 card-text fw-500">Kabar Darun Najah</p>
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
            </div>
        </div>
    </div>
</section>

<div class="px-1 d-none hero-card-bottom-mobile">
    <div class="p-3 py-4 hero-card-bottom-mobile-item">
        <div class="div-3">
            <div class="mb-2 fw-semibold fs-4">Brosur PSB</div>
            <p class="position-relative" style="color: #5a5f6d; font-size: 12px;">Informasi
                Penerimaan
                Santri baru PPAI Darun Najah 2 Malang
            </p>
        </div>
        <a href="https://framerusercontent.com/assets/gymX87C5Jo5LkoYxmvnmTe3JqvU.pdf"
            class="p-2 rounded d-inline-flex text-decoration-none align-items-center" style="background-color: #080E1E">
            <img src="{{ asset('template2/assets/image/icon-download-white.svg') }}" class="text-white img"
                width="24px" />
            <div class="text-white position-relative ms-2 me-2 " style="font-weight: 500; font-size: 14px;">
                Unduh
                Brosur
            </div>
        </a>
    </div>
    <div class="p-3 py-4 hero-card-bottom-mobile-item">
        <div class="div-3">
            <div class="mb-2 fw-semibold fs-4">Aktifitas/Kegiatan</div>
            <p class="position-relative" style="color: #5a5f6d; font-size: 12px;">
                Informasi Jadwal rutin harian santri PPAI Darun Najah 2 Malang
            </p>
        </div>
        <a href="" class="p-2 rounded d-inline-flex text-decoration-none align-items-center"
            style="background-color: #080E1E">
            <img src="{{ asset('template2/assets/image/icon-note-white.svg') }}" class="text-white img"
                width="24px" />
            <div class="text-white position-relative ms-2 me-2 " style="font-weight: 500; font-size: 14px;">
                Lihat Aktifitas
            </div>
        </a>
    </div>
</div>

{{-- tentang --}}
<section id="tentang">
    <div class="container tentang-container">
        <div class="row">
            <div class="col-md-12 col-lg-4 mb-md-4 mb-lg-0">
                <h2 class="tentang-title">PPAI Darun Najah 2 <br>Malang</h2>
            </div>
            <div class="col-md-12 col-lg-8">
                <p class="tentang-text">
                    PPAI Darun Najah 2 Malang merupakan lembaga pendidikan yang berada di bawah
                    naungan Yayasan
                    Pondok
                    Pesantren Darun Najah Karangploso Malang, yang didirikan dengan tujuan untuk menjaga moral umat
                    dan
                    mencetak kader-kader dakwah Islam di  masyarakat. Didirikan oleh KH. Achmad Muchtar Ghozali.
                    Hingga
                    kini pesantren ini masih diasuh di bawah bimbingan beliau langsung.
                </p>

                <div class="mt-5">
                    <p class="py-4 fw-bold fs-5" style="color: #080E1E;">Core Value</p>
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
                </div>
            </div>
        </div>
    </div>
</section>

{{-- fasilitas --}}
<section id="sec-fasilitas" style="overflow-x: hidden;">
    <div class="container position-relative">
        <div class="py-4 mb-4 header-fas d-flex justify-content-between align-items-center">
            <h3 class="fw-semibold">Fasilitas Kami</h3>
            <p class=" fasilitas-more-btn">
                <a href="{{ route('fasilitas') }}" class="text-decoration-none" style="font-weight: 500;">
                    Lihat semua
                </a>
            </p>
        </div>
        <div class="fasilitas-slider-container slider">
            <div class="gap-4 slide-track d-flex">
                @foreach($fasilitas as $item)
                    <div class="slide">
                        <div class="py-1 border-0 card" style="width: 18rem; border-radius: 8px;">
                            <img src="{{ asset($item->files->first()->file) }}" class="card-img"
                                alt="..." style="width: 18rem; height: 18rem;">
                            <div class="px-0 py-3 card-body">
                                <p class="card-text">{{ $item->judul }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <p class="text-center fasilitas-more-btn-mobile d-none">
            <a href="{{ route('fasilitas') }}" class="text-decoration-none" style="font-weight: 700;">
                Lihat semua
            </a>
        </p>
    </div>
</section>
