<x-landing-page-layout>
    <!-- koin-detail-content -->
    <section class="koin-detail-content">
        <div class="container py-5 mb-5">
            <div class="mb-5">
                <a href="{{ url('/koin-nusantara') }}" class="btn py-2 px-4 rounded-pill border border-secondary">
                    <img src="{{ asset('landingpage/assets/images/arrow-left.svg') }}" alt="" class="">
                </a>
            </div>
            <div class="row row-cols-1 row-cols-lg-2 gx-5">
                <div class="col col-lg-6 koin-detail-left-content">
                    <div class="w-100 mb-3 mb-lg-5">
                        <div id="carouselExampleIndicators" class="carousel slide" data-aos="zoom-in" data-aos-duration="400" data-aos-delay="100">

                            <div class="carousel-inner rounded-4">
                                <div class="carousel-item active">
                                    <img src="{{ asset('landingpage/assets/images/koin-donasi5.png') }}" class="d-block w-100 rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('landingpage/assets/images/koin-detail-img1.png') }}" class="d-block w-100 rounded-4" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('landingpage/assets/images/koin-detail-img2.png') }}" class="d-block w-100 rounded-4" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                            <div class="carousel-indicators justify-content-start m-0">
                                <img src="{{ asset('landingpage/assets/images/koin-donasi5.png') }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                </img>
                                <img src="{{ asset('landingpage/assets/images/koin-detail-img1.png') }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></img>
                                <img src="{{ asset('landingpage/assets/images/koin-detail-img2.png') }}" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></img>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h5 class="fw-bold mb-3">
                            Cerita Penggalangan
                        </h5>
                        <p class="pe-lg-4 pe-0">
                            Namanya Alkha Widiana, Tak ada yang menyangka bahwa gadis ini sebetulnya sudah berusia
                            16 tahun. Namun karena menderita kelainan sejak lahir membuat kondisinya seperti anak
                            kecil. Kini masa depan Alkha terancam hilang. Selama 16 tahun harus menderita dan
                            menerima kenyataan pahit bahwa penyakitnya belum bisa diobati.
                        </p>
                    </div>
                </div>
                <div class="col col-lg-6">
                    <h2 class="">
                        16 Tahun Idap Kelainan Penyakit,Alkha Ingin Sembuh
                    </h2>

                    <div class="d-inline-flex align-items-center gap-3 my-5">
                        <div class="rounded-circle">
                            <img src="{{ asset('landingpage/assets/images/koin-detail-profil.png') }}" alt="" class="">
                        </div>
                        <div class="">
                            <h5 class="">
                                Rahayu Putri Anjani
                            </h5>
                            <p class="bg-tertiary rounded-pill px-2 py-1 text-secondary m-0">
                                <span>
                                    Indentitas terverifikasi
                                </span>
                                <img src="{{ asset('landingpage/assets/images/verify.svg') }}" alt="">
                            </p>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 mb-5 mb-lg-4 justify-content-between" data-aos="zoom-in" data-aos-duration="400" data-aos-delay="400">
                        <a href="" class="text-decoration-none text-center text-dark text-center py-3 px-4 col col-md-4 rounded-pill border border-secondary text-center mb-3 mb-lg-0">
                            <img src="{{ asset('landingpage/assets/icons/share.svg') }}" alt="" class="me-1">
                            <span class="fw-bold">
                                Bagikan
                            </span>
                        </a>
                        <a href="" class="col col-md-7 rounded-pill py-3 px-4 text-center koin-detail-urunan-btn text-decoration-none text-center text-white text-center fw-bold">
                            Urunan Sekarang!
                        </a>
                    </div>

                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-top-4 fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <div class="d-inline-flex align=items-center">
                                        <img src="{{ asset('landingpage/assets/icons/empty-wallet.svg') }}" alt="" class="me-3">
                                        <p class="m-0 fw-bold">
                                            Donatur program (65)
                                        </p>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                                <div class="pe-1 pe-lg-3">
                                    <div class="accordion-body mt-4 overflow-y-auto">
                                        <div class="d-flex mb-3">
                                            <div class="rounded-circle me-3 me-lg-4">
                                                <img src="{{ asset('landingpage/assets/images/koin-detail-donatur-profile.png') }}" alt="" class="">
                                            </div>
                                            <div class="nama-donatur-container">
                                                <p class="fw-semibold m-0">
                                                    Zainuddin Harahap
                                                </p>
                                                <p class="donatur-nominal fw-bold">
                                                    Rp.500.000
                                                </p>
                                            </div>
                                            <p class="fw-bold ms-auto tanggal-donasi">
                                                01 Oktober 2023
                                            </p>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="rounded-circle me-3 me-lg-4">
                                                <img src="{{ asset('landingpage/assets/images/koin-detail-donatur-profile.png') }}" alt="" class="">
                                            </div>
                                            <div class="nama-donatur-container">
                                                <p class="fw-semibold m-0">
                                                    Zainuddin Harahap
                                                </p>
                                                <p class="donatur-nominal fw-bold">
                                                    Rp.500.000
                                                </p>
                                            </div>
                                            <p class="fw-bold ms-auto tanggal-donasi">
                                                01 Oktober 2023
                                            </p>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="rounded-circle me-3 me-lg-4">
                                                <img src="{{ asset('landingpage/assets/images/koin-detail-donatur-profile.png') }}" alt="" class="">
                                            </div>
                                            <div class="nama-donatur-container">
                                                <p class="fw-semibold m-0">
                                                    Zainuddin Harahap
                                                </p>
                                                <p class="donatur-nominal fw-bold">
                                                    Rp.500.000
                                                </p>
                                            </div>
                                            <p class="fw-bold ms-auto tanggal-donasi">
                                                01 Oktober 2023
                                            </p>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="rounded-circle me-3 me-lg-4">
                                                <img src="{{ asset('landingpage/assets/images/koin-detail-donatur-profile.png') }}" alt="" class="">
                                            </div>
                                            <div class="nama-donatur-container">
                                                <p class="fw-semibold m-0">
                                                    Zainuddin Harahap
                                                </p>
                                                <p class="donatur-nominal fw-bold">
                                                    Rp.500.000
                                                </p>
                                            </div>
                                            <p class="fw-bold ms-auto tanggal-donasi">
                                                01 Oktober 2023
                                            </p>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="rounded-circle me-3 me-lg-4">
                                                <img src="{{ asset('landingpage/assets/images/koin-detail-donatur-profile.png') }}" alt="" class="">
                                            </div>
                                            <div class="nama-donatur-container">
                                                <p class="fw-semibold m-0">
                                                    Zainuddin Harahap
                                                </p>
                                                <p class="donatur-nominal fw-bold">
                                                    Rp.500.000
                                                </p>
                                            </div>
                                            <p class="fw-bold ms-auto tanggal-donasi">
                                                01 Oktober 2023
                                            </p>
                                        </div>
                                        <div class="d-flex mb-3">
                                            <div class="rounded-circle me-3 me-lg-4">
                                                <img src="{{ asset('landingpage/assets/images/koin-detail-donatur-profile.png') }}" alt="" class="">
                                            </div>
                                            <div class="nama-donatur-container">
                                                <p class="fw-semibold m-0">
                                                    Zainuddin Harahap
                                                </p>
                                                <p class="donatur-nominal fw-bold">
                                                    Rp.500.000
                                                </p>
                                            </div>
                                            <p class="fw-bold ms-auto tanggal-donasi">
                                                01 Oktober 2023
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-footer d-inline-flex p-3 rounded-bottom-4 mt-3">
                                    <img src="{{ asset('landingpage/assets/icons/warning.svg') }}" alt="" class="align-self-start me-4">
                                    <p class="m-0">
                                        Sisa donasi program 100% akan menjadi tanggunjawab PCNU Batu untuk di
                                        manfaatkan pada program pendanaan lainnya
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- koin-detail-content end-->
</x-landing-page-layout>