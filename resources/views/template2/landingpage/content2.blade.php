<!--Berita-->
<section id="berita" style="background-color:#f2f3f4;">
    <div class="container">
        <div class="header-berita d-flex justify-content-between mb-md-3 mb-sm-2 align-items-center">
            <h3 style="font-weight:500; color:#080E1E;">Kabar Darun Najah</h3>
            <a href="{{ route('darun_najah.berita') }}" class="fw-bold text-primary text-decoration-none berita-more-btn"
                style="font-size:14px;">Lihat semua</a>
        </div>
        @if (count($berita) > 0)
            <div class="py-4 row">
                <a href="{{ route('darun_najah.berita.detail', ['id' => enkripString($berita[0]->id), 'slug' => toSlug($berita[0]->judul)]) }}"
                    class="col-lg-8 mb-lg-0 mb-md-5 text-decoration-none">
                    <img src="{{ $berita[0]->image }}" class="mb-3 img-fluid" alt="Gambar Berita Utama"
                        style="border-radius: 8px;">
                    <article class="content-berita">
                        <h4 class="mb-3 fw-bold berita-big-title">{{ $berita[0]->judul }}</h4>
                        <p class="m-0 text-secondary berita-big-date">{{ $berita[0]->sumber }} &#9679;
                            {{ formatTime($berita[0]->tanggal, 'd F, Y') }}</p>
                    </article>
                </a>
                @if (count($berita) > 1)
                    <div class="flex-wrap col-lg-4 d-flex">
                        @foreach ($berita as $b)
                            <a href="{{ route('darun_najah.berita.detail', ['id' => enkripString($b->id), 'slug' => toSlug($b->judul)]) }}"
                                class="mb-4 d-flex align-items-center landing-berita-small-container text-decoration-none">
                                <img src="{{ $b->image_url }}" alt="{{ $b->judul }}" class="rounded me-3"
                                    style="width: 120px; height: 120px; border-radius: 8px;">
                                <div class="media-body">
                                    <h5 class="berita-small-title">{{ $b->judul }}
                                    </h5>
                                    <p class="m-0 text-secondary" style="font-size: 14px;">{{ $b->sumber }} &#9679;
                                        {{ formatTime($b->tanggal, 'd F, Y') }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
        <a href="{{ route('darun_najah.berita') }}"
            class="text-center fw-bold text-primary text-decoration-none berita-more-btn-mobile d-none"
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
                    <a href="{{ route('program.bilingual') }}">
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
                    <a href="{{ route('program.p5') }}">
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
        <div class="pb-2 mb-4 header-ekskul d-flex justify-content-between align-items-center">
            <p class="m-0 text-light" style="font-size: 22px; font-weight:500;">
                Extrakurikuler
            </p>
            <a href="{{ route('program.ekstrakurikuler') }}" class="text-success text-decoration-none ekskul-more-btn"
                style="font-size: 14px; font-weight:700;">Lihat semua</a>
        </div>
        <!-- Slider extrakurikuler -->
        <div class="slide-ekskul">
            <div id="carouselExampleControls" class="carousel slide">
                <div class="carousel-inner ekskul">
                    @foreach($ekskul as $item)
                        <div class="carousel-item detail-ekskul">
                            <a class="jenis-ekstra" href="{{ $item->url }}"
                                data-fancybox="ekstrakulikuler" data-caption="{{ $item->nama }}">
                                <div class="card-program me-4 position-relative">
                                    <img src="{{ asset($item->thumbnail) }}" class="img-fluid" alt="">
                                    <div class="top-0 bottom-0 overlay position-absolute start-0 end-0 h-100">
                                        <div class="bottom-0 p-3 position-absolute start-0">
                                            <h6 class="fs-5 text-light">{{ $item->nama }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
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
        class="text-center text-success text-decoration-none ekskul-more-btn-mobile d-none"
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
        <div class="py-2 ppdb-conten row align-items-center"
            style="background-color: #3C7B46; border-radius:20px; overflow: hidden;">
            <div class="col-lg-6 col-md-8 col-sm-12 ppdb-text-col">
                <div class="p-5 content-isi px-md-0" style="transform: translateX(50px);">
                    <p class="mt-3 text-light mini-title-ppdb" style="font-size:16px;">PPDB</p>
                    <h2 class="judul-ppdb text-light">Ayok Masuk SMP <br> Darun Najah 2
                    </h2>
                    <a href="https://psbdarunnajah2.framer.website/" target="_blank" type="button"
                        class="px-4 py-2 my-3 btn btn-warning fw-bold ppdb-button"
                        style="font-size:16px; color:#080E1E;">Daftar Sekarang!
                    </a>
                </div>
            </div>
            <div
                class="px-5 col-lg-6 col-md-4 col-sm-12 d-flex justify-content-center position-relative ppdb-image-col">
                <div class="conten-banner position-absolute">
                    <img src="{{ asset('template2/img/banner-ijo.png') }}" style="" class="ppdb-img">
                </div>
            </div>
        </div>
    </div>
</section>
<!--PPDb End-->
