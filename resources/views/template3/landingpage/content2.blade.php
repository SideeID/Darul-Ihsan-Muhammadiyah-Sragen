<!--Berita-->
<section id="berita" style="background-color:#f2f3f4;">
    <div class="container">
        <div class="header-berita d-flex justify-content-between mb-md-3 mb-sm-2 align-items-center">
            <h3 style="font-weight:500; color:#080E1E;">Kabar Darun Najah</h3>
            <a href="{{ route('darun_najah.berita') }}" class="fw-bold text-primary text-decoration-none berita-more-btn"
                style="font-size:14px;">Lihat semua</a>
        </div>
        @if (count($berita) > 0)
            <div class="row py-4">
                <a href="{{ route('darun_najah.berita.detail', ['id' => $berita[0]->id]) }}"
                    class="col-lg-8 mb-lg-0 mb-md-5 text-decoration-none">
                    <img src="{{ $berita[0]->image }}" class="img-fluid mb-3" alt="Gambar Berita Utama"
                        style="border-radius: 8px;">
                    <article class="content-berita">
                        <h4 class="fw-bold mb-3 berita-big-title">{{ $berita[0]->judul }}</h4>
                        <p class="text-secondary m-0 berita-big-date">{{ $berita[0]->sumber }} &#9679;
                            {{ formatTime($berita[0]->tanggal, 'd F, Y') }}</p>
                    </article>
                </a>
                @if (count($berita) > 1)
                    <div class="col-lg-4 d-flex flex-wrap">
                        @foreach ($berita as $b)
                            <a href="{{ route('darun_najah.berita.detail', ['id' => $b->id]) }}"
                                class="d-flex mb-4 align-items-center landing-berita-small-container text-decoration-none">
                                <img src="{{ $b->image_url }}" alt="{{ $b->judul }}" class="me-3 rounded"
                                    style="width: 120px; height: 120px; border-radius: 8px;">
                                <div class="media-body">
                                    <h5 class="berita-small-title">{{ $b->judul }}
                                    </h5>
                                    <p class="text-secondary m-0" style="font-size: 14px;">{{ $b->sumber }} &#9679;
                                        {{ formatTime($b->tanggal, 'd F, Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
        <a href="{{ route('darun_najah.berita') }}"
            class="fw-bold text-center text-primary text-decoration-none berita-more-btn-mobile d-none"
            style="font-size:14px;">Lihat semua</a>

    </div>
</section>
<!--Berita End-->

<!--Ekskul-->
<section id="ekstrakurikuler" class="overflow-hidden" style="background-color:#080e1e;">
    <div class="container">
        <h2 class="fw-bold text-light eksul-program-title">
            Program <br>
            Pembelajaran Kami
        </h2>
        <div class="row eksul-card-wrapper">
            <div class="col-md-4 my-lg-5 my-md-4">
                <div class="card" style="border-radius: 8px; background-color:#ffffff1a;">
                    <a href="{{ route('program.tahfidzquran') }}">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('template2/img/icon-tahfidz.svg') }}" alt=""
                                class="me-4 program-item-img" style="width: 80px; height: 80px;">
                            <h3 class="mb-0 program-item-title" style="color: #ffff; font-weight:600; font-size:24px;">
                                Tahfidz
                                Qur’an
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 my-lg-5 my-md-4">
                <div class="card" style="border-radius: 8px; background-color:#ffffff1a;">
                    <a href="{{ route('program.bahasa') }}">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('template2/img/icon-bilingual.svg') }}" alt=""
                                class="me-4 program-item-img" style="width: 80px; height: 80px;">
                            <h3 class="mb-0 program-item-title" style="color: #ffff; font-weight:600; font-size:24px;">
                                Bilingual
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-4 my-lg-5 my-md-4">
                <div class="card" style="border-radius: 8px; background-color:#ffffff1a;">
                    <a href="{{ route('program.kurikulum') }}">
                        <div class="card-body d-flex align-items-center">
                            <img src="{{ asset('template2/img/icon-P5.svg') }}" alt=""
                                class="me-4 program-item-img" style="width: 80px; height: 80px;">
                            <h3 class="mb-0 program-item-title" style="color: #ffff; font-weight:600; font-size:24px;">
                                P5
                            </h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="header-ekskul d-flex justify-content-between mb-4 pb-2 align-items-center">
            <p class="text-light m-0" style="font-size: 22px; font-weight:500;">
                Extrakurikuler
            </p>
            <a href="{{ route('program.ekstrakurikuler') }}" class="text-success text-decoration-none ekskul-more-btn"
                style="font-size: 14px; font-weight:700;">Lihat semua</a>
        </div>
        <!-- Slider extrakurikuler -->
        <div class="slide-ekskul">
            <div id="carouselExampleControls" class="carousel slide">
                <div class="carousel-inner ekskul">
                    <div class="carousel-item detail-ekskul active">
                        <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                            data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                            <div class="card-program me-4 position-relative">
                                <img src="{{ asset('template2/img/ekskul1.jpeg') }}" class="img-fluid" alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Menjahit</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul2.jpeg') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul3.png') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul1.jpeg') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul2.jpeg') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul3.png') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul1.jpeg') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul3.png') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item detail-ekskul ">
                        <div class="card-program me-4 position-relative">
                            <a class="jenis-ekstra" href="https://www.youtube.com/watch?v=RP9jhatZvjA"
                                data-fancybox="ekstrakulikuler" data-caption="Menjahit" data-type="iframe">
                                <img src="{{ asset('template2/img/ekskul2.jpeg') }}" class="img-fluid"
                                    alt="">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute bottom-0 start-0 p-3">
                                        <h6 class="fs-5 text-light">Ekstrakurikuler</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- Slider button --}}
                <div class="carousel-controls">
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">
                        <img src="{{ asset('template2/img/icon-prev.svg') }}" alt="">
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">
                        <img src="{{ asset('template2/img/icon-next.svg') }}" alt="">
                    </button>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('program.ekstrakurikuler') }}"
        class="text-success text-decoration-none ekskul-more-btn-mobile d-none text-center"
        style="font-size: 14px; font-weight:700;">Lihat semua
    </a>
</section>
<!--Ekskul End-->

<!--Script slide carousel-->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const carouselInner = document.querySelector(".ekskul");
        const carouselItems = document.querySelectorAll(".detail-ekskul");
        const carouselWidth = carouselInner.scrollWidth;
        const cardWidth = carouselItems[0].offsetWidth;
        const visibleItems = 3; // Jumlah item yang ingin ditampilkan sekaligus
        let scrollPosition = 0;

        document.querySelector(".carousel-control-next").addEventListener("click", function() {
            const maxScrollPosition = carouselWidth - (cardWidth * visibleItems);
            if (scrollPosition < maxScrollPosition) {
                scrollPosition += cardWidth;
                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: "smooth"
                });
            }
        });

        document.querySelector(".carousel-control-prev").addEventListener("click", function() {
            if (scrollPosition > 0) {
                scrollPosition -= cardWidth;
                carouselInner.scrollTo({
                    left: scrollPosition,
                    behavior: "smooth"
                });
            }
        });
    });
</script>
<!--Ekskul End-->

<!--PPDb-->
<section id="PPDB">
    <div class="container">
        <div class="ppdb-conten row align-items-center py-2"
            style="background-color: #3C7B46; border-radius:20px; overflow: hidden;">
            <div class="col-lg-6 col-md-8 col-sm-12 ppdb-text-col">
                <div class="content-isi p-5 px-md-0" style="transform: translateX(50px);">
                    <p class="text-light mini-title-ppdb mt-3" style="font-size:16px;">PPDB</p>
                    <h2 class="judul-ppdb text-light">Ayok Masuk SMP <br> Darun Najah 2
                    </h2>
                    <a href="https://psbdarunnajah2.framer.website/" target="_blank" type="button"
                        class="btn btn-warning fw-bold my-3 py-2 px-4 ppdb-button"
                        style="font-size:16px; color:#080E1E;">Daftar Sekarang!
                    </a>
                </div>
            </div>
            <div
                class="col-lg-6 col-md-4 col-sm-12 d-flex justify-content-center px-5 position-relative ppdb-image-col">
                <div class="conten-banner position-absolute">
                    <img src="{{ asset('template2/img/banner-ijo.png') }}" style="" class="ppdb-img">
                </div>
            </div>
        </div>
    </div>
</section>
<!--PPDb End-->
