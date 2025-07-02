<x-landing-page-layout>
    <!-- Koin Hero -->
    <section class="koin-hero bg-tertiary">
        <div class="container py-5">
            <div class="hero-container row row-cols-1 row-cols-sm-2 mt-5">
                <div class="col col-12 col-sm-6" data-aos="fade-up" data-aos-duration="500">
                    <h1 class="mb-5 koin-hero-title">
                        Bersama Wujudkan Mandiri Ekonomi, Mandiri Organisasi
                    </h1>
                    <h4 class="pt-4 fw-medium w-75">
                        Lebih dari 2 ribu orang telah terbantu. Ingin menggalang dana?
                    </h4>
                </div>
                <div class="col col-12 col-sm-6 koin-img-container">
                    <div class="d-flex justify-content-center">
                        <img src="{{ asset('landingpage/assets/images/cta-KOIN.png') }}" alt="" class="koin-hero-img">
                    </div>
                    <div class="koin-hero-btn-container d-flex justify-content-center">
                        <a href="" class="text-center btn-galang text-decoration-none text-white fw-bold rounded-pill me-3">
                            Galang Dana Sekarang
                        </a>
                        <a href="" class="d-flex align-items-center justify-content-center btn-urunan text-decoration-none text-black fw-bold rounded-pill">
                            <span class="me-2">
                                Urunan Yuk :)
                            </span>
                            <span>
                                <img src="{{ asset('landingpage/assets/images/coin.svg') }}" alt="" class="">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Koin Hero end -->

    <!-- koin list donasi -->
    <section class="koin-list-donasi">
        <div class="container py-5">
            <div class="d-flex koin-donasi-title-container justify-content-between mt-3 mb-5">
                <h3 class="koin-donasi-title">
                    Mau berbuat baik apa hari ini?
                </h3>
                <div class="d-flex ms-auto">
                    <button class="btn koin-prev-btn rounded-pill border border-secondary-subtle px-4 me-3">
                        <img src="{{ asset('landingpage/assets/images/arrow-left.svg') }}" alt="" class="">
                    </button>
                    <button class="btn koin-prev-btn rounded-pill px-4">
                        <span class="fs-5 fw-semibold me-2">Next</span>
                        <img src="{{ asset('landingpage/assets/images/arrow-right.svg') }}" alt="" class="">
                    </button>
                </div>
            </div>
            <div class="d-flex koin-donasi-filter-container justify-content-between align-items-center mb-4">
                <div class="dropdown">
                    <button class="btn filter-btn rounded-pill btn-lg border border-secondary px-4 py-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('landingpage/assets/images/filter-search.svg') }}" alt="">
                        <span>Filter</span>
                        <img src="{{ asset('landingpage/assets/images/arrow-down.svg') }}" alt="">
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
                <div>
                    <p class="">
                        Tersedia 5 Campaign Program
                    </p>
                </div>
            </div>
            <!-- list card donasi -->
            <div class="row gy-4 row-cols-1 row-cols-sm-3">
                <div class="col">
                    <a href="{{ url('/koin-nusantara/1') }}" class="card w-100 h-100 border-0 shadow-sm" style="width: 18rem;">
                        <img src="{{ asset('landingpage/assets/images/koin-donasi1.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="me-1 verify-text">
                                    PCNU Batu
                                </span>
                                <img src="{{ asset('landingpage/assets/images/verify.svg') }}" alt="" class="">
                            </div>
                            <h5 class="card-text fw-bold">
                                Zakat Untuk Pendidikan Santri Pelosok
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('/koin-nusantara/1') }}" class="card w-100 h-100 border-0 shadow-sm" style="width: 18rem;">
                        <img src="{{ asset('landingpage/assets/images/koin-donasi2.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="me-1 verify-text">
                                    PCNU Batu
                                </span>
                                <img src="{{ asset('landingpage/assets/images/verify.svg') }}" alt="" class="">
                            </div>
                            <h5 class="card-text fw-bold">
                                Hadirkan kebahagiaan melalui sedekah pangan
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('/koin-nusantara/1') }}" class="card w-100 h-100 border-0 shadow-sm" style="width: 18rem;">
                        <img src="{{ asset('landingpage/assets/images/koin-donasi3.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="me-1 verify-text">
                                    PCNU Batu
                                </span>
                                <img src="{{ asset('landingpage/assets/images/verify.svg') }}" alt="" class="">
                            </div>
                            <h5 class="card-text fw-bold">
                                Anak Tukang Sayur Kecelakaan, Otaknya Rusak!
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('/koin-nusantara/1') }}" class="card w-100 h-100 border-0 shadow-sm" style="width: 18rem;">
                        <img src="{{ asset('landingpage/assets/images/koin-donasi4.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="me-1 verify-text">
                                    PCNU Batu
                                </span>
                                <img src="{{ asset('landingpage/assets/images/verify.svg') }}" alt="" class="">
                            </div>
                            <h5 class="card-text fw-bold">
                                Sedekah Bangun Masjid Daur Ulang untuk Santri
                            </h5>
                        </div>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('/koin-nusantara/1') }}" class="card w-100 h-100 border-0 shadow-sm" style="width: 18rem;">
                        <img src="{{ asset('landingpage/assets/images/koin-donasi5.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="mb-3">
                                <span class="me-1 verify-text">
                                    PCNU Batu
                                </span>
                                <img src="{{ asset('landingpage/assets/images/verify.svg') }}" alt="" class="">
                            </div>
                            <h5 class="card-text fw-bold">
                                16 Tahun Idap Kelainan Penyakit,Arka Ingin Sembuh
                            </h5>
                        </div>
                    </a>
                </div>

            </div>
            <!-- ads -->
            <div class="mt-5">
                <img src="{{ asset('landingpage/assets/images/koin-ads.png') }}" alt="" class="w-100">
            </div>

        </div>
    </section>
    <!-- koin list donasi end-->
</x-landing-page-layout>