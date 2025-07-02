<x-landing-page-layout>
    <!-- Hero -->
    <section class="hero w-100 px-2 px-lg-0 m-0 overflow-hidden" style="background-color: #edf6f0">
        <div class="container position-relative">
            <img src="{{ asset('landingpage/assets/images/hero-pattern.png') }}" alt="pattern" class="hero-pattern position-absolute top-0 end-0" />
            <div class="hero-content position-relative w-100 m-0 py-5 d-flex flex-column align-items-start gap-3">
                <div class="selamat-datang d-flex bg-white text-black rounded-5 px-3 px-lg-4 py-2 gap-3 align-items-center fw-medium mb-lg-3">
                    👋 Selamat datang di situs resmi PCNU Kota Batu
                </div>
                <div class="d-flex flex-column flex-md-row align-items-end justify-content-between gap-3 gap-md-0 mb-lg-4">
                    <h1 class="hero-heading text-black fw-bold">
                        Meneguhkan Peran Khidmah dan Aktualisasi Visi
                        Multilateral An-Nahdliyyah
                    </h1>
                    <div class="hero-misi p-0 m-0 d-flex flex-column align-items-start gap-4">
                        <img src="{{ asset('landingpage/assets/images/“.png') }}" alt="simbol" />
                        <p class="fw-normal text-black">
                            Mempersiapkan Kader-Kader Yang Bertaqwa, Interaktif,
                            Dan Terampil Guna Terwujudnya Masyarakat Yang
                            Menjunjung Tinggi Keadilan, Toleransi, Dan
                            Kebersamaan
                        </p>
                    </div>
                </div>

                <div class="d-none d-md-block swiper mySwiper" id="swiperHero">
                    <div class="swiper-wrapper">

                    </div>

                    <!-- If we need navigation buttons -->
                    <!-- <div class="swiper-button-prev"></div> -->
                    <!-- <div class="swiper-button-next"></div> -->
                </div>

                <div class="d-md-none swiper mySwiper h-auto" id="swiperHeroMobile">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide d-flex flex-column align-items-center justify-content-between position-relative w-100">
                            <div class="box2 w-100 position-relative" style="height: 250px">
                                <img src="{{ asset('landingpage/assets/images/hero-foto-nu.png') }}" alt="hero-foto" class="w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="box1 bg-success d-flex flex-column w-100 align-items-start justify-content-between text-white px-3 py-4 gap-3">
                                <h4 class="fw-medium" style="font-size: 14px">
                                    Februari, 15 • 2023
                                </h4>
                                <h2 class="fw-bold" style="font-size: 24px">
                                    Ini Program Ketua PCNU Kota Batu yang Baru
                                </h2>
                                <a href="#" class="btn btn-white px-4 fw-medium" style="color: #09a64d">Read more</a>
                            </div>
                        </div>
                        <div class="swiper-slide d-flex flex-column align-items-center justify-content-between position-relative w-100">
                            <div class="box2 w-100 position-relative" style="height: 250px">
                                <img src="{{ asset('landingpage/assets/images/hero2-foto-nu.png') }}" alt="hero-foto" class="w-100 h-100 object-fit-cover" />
                            </div>
                            <div class="box1 bg-success d-flex flex-column w-100 align-items-start justify-content-between text-white px-3 py-4 gap-3">
                                <h4 class="fw-medium" style="font-size: 14px">
                                    Juni, 25 • 2023
                                </h4>
                                <h2 class="fw-bold" style="font-size: 24px">
                                    Ketum PBNU Resmi Lantik PCNU Kota Batu 2023-2028
                                </h2>
                                <a href="#" class="btn btn-white px-4 fw-medium" style="color: #09a64d">Read more</a>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="swiper-button-prev"></div> -->
                    <!-- <div class="swiper-button-next"></div> -->
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="about w-100 px-2 px-lg-0 m-0 bg-white overflow-hidden">
        <div class="container h-auto position-relative py-5">
            <div class="w-100 h-100 d-flex flex-column justify-content-between gap-5">
                <div class="w-100 row row1 m-0 p-0 g-0 gap-4 gap-md-4">
                    <div class="col-12 col-md m-0 p-0 d-flex flex-row justify-content-start">
                        <div class="box-green bg-white rounded-4 p-3 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('landingpage/assets/images/profile pcnu.jpg') }}" class="w-100 h-100" alt="logo-combined" />
                        </div>
                    </div>
                    <div class="col-12 col-md m-0 p-0 d-flex align-items-end text-black">
                        <div class="d-flex flex-column align-content-start gap-3">
                            <h3 class="fw-bold">
                                PCNU Kota Batu, mendigdayakan NU menjemput abad
                                kedua menuju kebangkitan baru.
                            </h3>
                            <p class="fw-normal">
                                Bertempat di Jl. Agus Salim No.21 Sisir, kec.
                                Batu, Kota Batu, PCNU Batu memiliki tugas utama
                                yaitu mengatur dan mengelola roda organisasi di
                                tingkat cabang, agar roda organisasi dapat
                                berjalan dengan terarah dan dinamis sesuai dengan
                                keberadaan dan kebutuhan NU yang ada di kota batu
                                secara khusus. Sama halnya dengan PCNU cabang
                                lainnya, PCNU Kota batu juga memiliki struktur
                                pengurus, badan-badan otonom, serta program kerja.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-100 row2 d-flex flex-column align-items-start gap-3 m-0 p-0">
                    <h3 class="text-black fw-bold">Program Kerja</h3>
                    <div class="w-100 row gap-4 g-0 px-0 py-3 py-md-5 m-0 border-top border-bottom" style="border-color: #e9e9e9">
                        <div class="col col-koin pb-3 pb-md-0 m-0 d-flex align-items-center justify-content-start gap-4">
                            <div class="icon-container d-flex justify-content-center align-items-center rounded-3 p-3" style="background-color: #edf6f0">
                                <img src="{{ asset('landingpage/assets/icons/coin.svg') }}" alt="coin" />
                            </div>
                            <h4 class="text-black fw-bold">
                                Koin<br />NUsantara
                            </h4>
                        </div>
                        <div class="col col-people pb-3 pb-md-0 m-0 d-flex align-items-center justify-content-start gap-4">
                            <div class="icon-container d-flex justify-content-center align-items-center rounded-3 p-3" style="background-color: #edf6f0">
                                <img src="{{ asset('landingpage/assets/icons/people.svg') }}" alt="people" />
                            </div>
                            <h4 class="text-black fw-bold">
                                Lailatul<br />Ijtima'
                            </h4>
                        </div>
                        <div class="col p-0 m-0 d-flex align-items-center justify-content-start gap-4">
                            <div class="icon-container d-flex justify-content-center align-items-center rounded-3 p-3" style="background-color: #edf6f0">
                                <img src="{{ asset('landingpage/assets/icons/shop.svg') }}" alt="shop" />
                            </div>
                            <h4 class="text-black fw-bold">
                                NUsantara<br />Mart
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Ads -->
    <section class="ads w-100 p-0 m-0 overflow-hidden">
        <div class="swiper mySwiper2" id="adsSlider">
            <div class="swiper-wrapper">

            </div>
            <div class="swiper-pagination"></div>
            <!-- <div class="swiper-button-next"></div> -->
            <!-- <div class="swiper-button-prev"></div> -->
        </div>
    </section>

    <!-- MEMBER -->
    <section class="member w-100 px-2 pt-5 pb-3 px-lg-0 m-0 overflow-hidden" style="background-color: #111111">
        <div class="container">
            <div class="w-100 d-flex flex-column align-items-start gap-4">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <div class="d-flex flex-column align-items-start gap-2 mb-4">
                        <h3 class="text-white">Pengurus PCNU Kota Batu</h3>
                        <p class="text-white mb-0">Periode 2023-2028</p>
                    </div>
                    <a href="{{ url('/pengurus') }}" class="d-flex py-3 rounded-pill text-decoration-none btn-lainnya bg-white text-black d-none d-sm-block">Lihat Lainnya</a>
                </div>
                <div class="w-100">
                    <div class="mySwiper3 d-none d-sm-block" id="swiperPengurus">
                        <div class="swiper-wrapper">

                        </div>
                    </div>

                    <!-- swiper mobile -->
                    <div class="mySwiper3-mobile d-none" id="swiperPengurusMobile">
                        <div class="row row-cols-2">

                        </div>
                        <div class="text-center my-3">
                            <a href="{{ url('/pengurus') }}" class="d-block py-3 btn-more text-decoration-none fs-5 text-white rounded-4">
                                Selengkapnya 👉
                            </a>
                        </div>
                    </div>
                    <!-- swiper mobile -->
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <!-- <section class="cta w-100 p-0 m-0 mx-auto overflow-hidden">
      <div class="w-100 d-flex flex-column flex-md-row justify-content-between">
        <div class="box1 px-2 px-md-0 py-0 py-md-5 order-1 order-md-0" style="background-color: #09a64d">
          <div class="w-100 h-100 px-3 px-md-5 py-5 d-flex flex-column align-items-start justify-content-between gap-3">
            <h1 class="text-white mb-0">
              Bersama Wujudkan Mandiri Ekonomi, Mandiri Organisasi!
            </h1>
            <div class="d-flex justify-content-start gap-2 align-items-start">
              <div class="d-flex justify-content-center align-items-center bg-black rounded-circle p-3">
                <img src="{{ asset('landingpage/assets/icons/chart-square.svg') }}" alt="chart-square" />
              </div>
              <div class="d-flex flex-column align-items-start gap-1">
                <h1 class="lh-1" style="color: #ffe81e">2.306+</h1>
                <p class="text-white">
                  Dermawan yang telah menjadi bagian dari program
                  ini.
                </p>
              </div>
            </div>
            <a href="/koin-nusantara/" class="w-100">
              <div class="bg-white text-success w-100 text-center py-3" style="border-radius: 100px">
                <h3>Urunan Yuk :)</h3>
              </div>
            </a>
          </div>
        </div>
        <div
          class="box2 position-relative overflow-hidden d-flex flex-column justify-content-end align-items-center gap-5 pb-5 px-4 order-0 order-md-1">
          <img src="{{ asset('landingpage/assets/images/cta-background-right.png') }}" alt="background"
            class="position-absolute top-0 start-0 w-100 h-100 object-fit-cover" />
          <img class="coin mb-0 mb-md-3" src="{{ asset('landingpage/assets/images/cta-KOIN.png') }}" alt="koin" />
          <div
            class="desc w-100 d-flex align-items-start justify-content-between gap-3 py-2 px-3 bg-white rounded-4 mb-3"
            style="--bs-bg-opacity: 0.7">
            <img src="{{ asset('landingpage/assets/icons/info-circle.svg') }}" alt="info-circle" />
            <p class="text-black mb-0">
              Program koin NU sepenuhnya akan di alokasikan sebagai
              sumber dana utama oprasional organisasi, pengembangan
              bidang sosial, pendidikan dan kesehatan.
            </p>
          </div>
        </div>
      </div>
    </section> -->

    <!-- Nderek Tangklet -->
    <section class="tangklet w-100 px-2 px-lg-0 m-0 overflow-hidden" style="background-color: #edf6f0">
        <div class="w-100">
            <div class="container py-5">
                <div class="w-100 box-container d-flex flex-column flex-md-row g-0 py-5 m-0 gap-5 gap-md-0">
                    <div class="box1 m-0 pe-0 pe-md-5 d-flex flex-column justify-content-between align-items-start gap-4 gap-md-0">
                        <h3 class="fw-bold mb-3 mb-lg-5" style="color: #18ab54">
                            Nderek Tangklet
                        </h3>
                        <h1 class="fw-bold text-black mb-0">
                            Anda bertanya,<br />Ulama' Menjawab
                        </h1>
                        <div class="py-0 py-lg-5 my-0 my-lg-3" style="content: '';"></div>
                        <a href="/nderek-tangklet/tanya" class="w-100 mb-3" style="text-decoration: none">
                            <div class="d-flex justify-content-center align-items-center py-3 rounded-4 border border-success bg-success">
                            <img src="{{ asset('landingpage/assets/icons/edit-2.svg') }}" alt="" class="me-2">
                                <h4 class="text-white" style="text-decoration: none">
                                    Buat Pertanyaan
                                </h4>
                            </div>
                        </a>
                        <a href="/nderek-tangklet/" class="w-100" style="text-decoration: none">
                            <div class="d-flex justify-content-center align-items-center py-3 rounded-4 border border-black">
                                <h4 class="text-black" style="text-decoration: none">
                                    Lihat Diskusi Lainnya
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="box2 m-0 ps-0 ps-md-5 d-flex position-relative">
                        <div class="swiper mySwiper4">
                            <div class="swiper-wrapper" id="swiperTanglet">

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pojok Berita -->
    <section class="media w-100 p-0 m-0 overflow-hidden">
        <div class="w-100">
            <div class="container py-5">
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <h3 class="py-5 pojok-title">
                        Pojok Berita
                    </h3>
                    <a href="{{ url('/berita') }}" class="d-flex py-3 rounded-pill text-decoration-none btn-lainnya">Lihat Lainnya</a>
                </div>
                <div class="row row-cols-md-2 row-cols-1 gx-5">
                    <div class="col order-md-2 overflow-hidden media-big-card rounded-5 px-0 bg-dark">
                        <a href="" class="position-relative text-white" id="mainBeritaLink">
                            <img src="{{ asset('landingpage/assets/images/berita.png') }}" alt="" class="w-100 h-100 object-fit-cover z-0" id="mainBeritaImage">
                            <div class="black-overlay position-absolute z-1">
                                <div class="media-big-card-text position-absolute">
                                    <div class="d-inline-flex align-items-center gap-2 mb-4">
                                        <span class="" id="mainBeritaDate">
                                            Jun, 22
                                        </span>
                                        <img src="{{ asset('landingpage/assets/images/dot-white.svg') }}" alt="" class="">
                                        <span class="" id="mainBeritaYear">
                                            2022
                                        </span>
                                    </div>
                                    <h3 class="media-title line-clamp-3" id="mainBeritaTitle">
                                        KH Yahya Cholil Staquf; NU Batu sudah saatnya bertrasformasi ...
                                    </h3>
                                    <div class="media-btn d-none fw-bold mt-4 text-black px-4 py-1 rounded-3" id="mainBeritaSumber">
                                        PCNU Kota Batu
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col order-md-1" id="beritaLainnya">
                        <div class="row media-small-container row-cols-1 row-cols-md-2 gy-5 pe-3">

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- Event -->
    <section class="event w-100 p-0 m-0 overflow-hidden">
        <div class="w-100">
            <div class="container py-5">
                <h3 class="py-5">
                    Event
                </h3>
                <div class="row mb-3 row-cols-1 row-cols-md-2">
                    <div class="col col-lg-9 col-md-8 event-big-card">
                        <iframe class="w-100 rounded-top-4" src="" type="text/html" style="height: 428px;" id="eventYoutubeIframe"></iframe>
                        <a href="" class="event-title-container p-4 rounded-bottom-4 d-block text-decoration-none" target="_blank" id="eventYoutubeLink">
                            <div class="event-date-container d-flex align-items-center gap-3 mb-3">
                                <div>
                                    <img src="{{ asset('landingpage/assets/images/logo pcnu small.png') }}" alt="" width="28" class="event-logo">
                                </div>
                                <p class="fw-bold m-0">
                                    PCNU KOTA BATU
                                </p>
                                <div>
                                    <img src="{{ asset('landingpage/assets/images/dot-white.svg') }}" alt="" class="event-dot">
                                </div>
                                <p class="fw-thin m-0" id="eventYoutubeTanggal"></p>
                            </div>
                            <h3 class="event-title mb-2" id="eventYoutubeJudul"></h3>
                        </a>
                    </div>
                    <div class="col col-lg-3 col-md-4" id="eventInstagramAll">
                        <div class="row row-cols-1 gy-4">
                            <div class="col event-small-card" id="instagramAtas">

                            </div>
                            <div class="col event-small-card" id="instagramBawah">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('landingpage/assets/images/ads2.png') }}" alt="" class="rounded-4 h-100 w-100 event-ads2" id="eventAdsImage">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Article -->
    <section class="article w-100 p-0 m-0 overflow-hidden">
        <div class="w-100">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-between mt-5">
                            <h3 class="artikel-berita">Artikel</h3>
                            <a href="{{ url('/artikel') }}" class="d-block rounded-pill btn-lainnya text-decoration-none">Lihat Lainnya</a>
                        </div>
                    </div>

                    <div class="col col-md-8 col-12">
                        <div class="d-flex flex-column justify-content-between" id="artikelContent">

                        </div>
                    </div>

                    <div class="col col-md-4 col-12">
                        <div class="d-flex flex-column justify-content-between">
                            <h3 class="d-md-none artikel-berita-mobile">Berita Lainnya</h3>
                            <div class="artikel-opini-container mb-4 pt-2" id="artikelLainnya">

                            </div>
                            <div class="article-ads1 mb-4">
                                <img src="{{ asset('landingpage/assets/images/articleads2.png') }}" alt="" class="w-100 h-100 object-fit-cover rounded-4" id="artikelImage">
                            </div>
                            <div class="">
                                <a href="https://www.inagata.com/" class="">
                                    <img src="{{ asset('landingpage/assets/images/articleads1.png') }}" alt="" class="w-100">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        //get berita
        req({
            url: `${path}/landing/berita`,
            type: "GET",
            success: function(response) {
                var data = response.data
                var data_hero = data.slice(0, 3)
                var data_main_berita = data[0]
                var data_berita_lainnya = data.slice(1, 5)

                //hero
                $("#swiperHero .swiper-wrapper").html(
                    data_hero.map((item) => {
                        return `
                            <div class="swiper-slide d-flex flex-row align-items-end justify-content-between position-relative">
                                <div class="box1 bg-success d-flex flex-column align-items-start justify-content-between text-white p-5">
                                    <h4 class="fw-medium">${moment(item.tanggal).format("MMMM")}, ${moment(item.tanggal).format("DD")} • ${moment(item.tanggal).format("YYYY")}</h4>
                                    <h2 class="fw-bold">
                                        ${item.judul}
                                    </h2>
                                    <a href="${path}/berita/${item.id}" class="btn btn-white px-4 fw-medium" style="color: #09a64d">Lihat Detail</a>
                                </div>
                                <div class="box2">
                                    <img src="${path + item.image}" alt="hero-foto" />
                                </div>
                            </div>

                        `
                    })
                )

                $("#swiperHeroMobile .swiper-wrapper").html(
                    data_hero.map((item) => {
                        return `
                            <div class="swiper-slide d-flex flex-column align-items-center justify-content-between position-relative w-100">
                                <div class="box2 w-100 position-relative" style="height: 250px">
                                    <img src="${path + item.image}" alt="hero-foto" class="w-100 h-100 object-fit-cover" />
                                </div>
                                <div class="box1 bg-success d-flex flex-column w-100 align-items-start justify-content-between text-white px-3 py-4 gap-3">
                                    <h4 class="fw-medium" style="font-size: 14px">
                                        ${moment(item.tanggal).format("MMMM")}, ${moment(item.tanggal).format("DD")} • ${moment(item.tanggal).format("YYYY")}
                                    </h4>
                                    <h2 class="fw-bold" style="font-size: 24px">
                                        ${item.judul}
                                    </h2>
                                    <a href="${path}/berita/${item.id}" class="btn btn-white px-4 fw-medium" style="color: #09a64d">Read more</a>
                                </div>
                            </div>

                        `
                    })
                )

                const swiper = new Swiper('.mySwiper', {
                    spaceBetween: 0,
                    centeredSlides: true,
                    loop: true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                });

                //main berita
                $("#mainBeritaImage").attr("src", `${path + data_main_berita.image}`)
                $("#mainBeritaDate").html(`${moment(data_main_berita.tanggal).format("MMM")}, ${moment(data_main_berita.tanggal).format("DD")}`)
                $("#mainBeritaYear").html(`${moment(data_main_berita.tanggal).format("YYYY")}`)
                $("#mainBeritaTitle").html(data_main_berita.judul)
                $("#mainBeritaSumber").html(data_main_berita.sumber)
                $("#mainBeritaLink").attr("href", `${path}/berita/${data_main_berita.id}`)

                //berita lainnya
                $("#beritaLainnya .media-small-container").html(
                    data_berita_lainnya.map((item) => {
                        return `
                            <div class="col media-small-card">
                                <a href="${path}/berita/${item.id}" class="text-decoration-none text-black">
                                    <img src="${path + item.image}" alt="" class="w-100 media-img mb-2">
                                    <div class="text-secondary d-inline-flex align-items-center gap-2 mb-3 media-small-date">
                                        <span class="fw-bold">
                                            ${moment(item.tanggal).format("MMM")}, ${moment(item.tanggal).format("DD")}
                                        </span>
                                        <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="" class="">
                                        <span class="">
                                            ${moment(item.tanggal).format("YYYY")}
                                        </span>
                                    </div>
                                    <h4 class="mb-3 media-title">
                                        ${item.judul}
                                    </h4>
                                    <div class="d-inline-flex align-items-center">
                                        <img src="{{ asset('landingpage/assets/images/logo pcnu small.png') }}" alt="" class="me-2">
                                        <p class="m-0 fw-semibold media-sumber">${item.sumber}</p>
                                    </div>
                                </a>
                            </div>
                        `
                    })
                )
            }
        })

        //get pengurus
        req({
            url: `${path}/landing/pengurus`,
            type: "GET",
            success: function(response) {
                var data = response.data

                // $("#swiperPengurus .row").html(
                //     data.map((item) => {
                //         return `
                //             <div class="col">
                //                 <div class="overflow-hidden position-relative rounded-4 w-100 mb-3" style="background-color: #d9d9d9">
                //                     <img src="${path + item.image}" alt="siluet" class="object-fit-cover w-100 h-100" />
                //                 </div>
                //                 <div class="d-flex flex-column gap-2 align-items-start">
                //                     <h4 class="text-white">${item.nama}</h4>
                //                     <p class="text-white">${item.jabatan}</p>
                //                 </div>
                //             </div>
                //         `
                //     })
                // )

                $("#swiperPengurus .swiper-wrapper").html(
                    data.map((item) => {
                        return `
                        <div class="swiper-slide d-flex flex-column align-items-start gap-3">
                            <div class="overflow-hidden position-relative rounded-4 w-100" style="background-color: #d9d9d9">
                                <img src="${path + item.image}" alt="siluet" class="object-fit-cover w-100" style="height: 464.433px" />
                            </div>
                            <div class="d-flex flex-column gap-2 align-items-start">
                                <h4 class="text-white">${item.nama}H</h4>
                                <p class="text-white">${item.jabatan}</p>
                            </div>
                        </div>
                        `
                    })
                )

                const swiper3 = new Swiper('.mySwiper3', {
                    loop: false,
                    spaceBetween: 16,
                    slidesPerView: 2,
                    breakpoints: {
                        768: {
                            slidesPerView: 4,
                        },
                    },
                });

                $("#swiperPengurusMobile .row").html(
                    data.map((item) => {
                        return `
                            <div class="col">
                                <div class="overflow-hidden position-relative rounded-4 w-100 mb-3" style="background-color: #d9d9d9">
                                    <img src="${path + item.image}" alt="siluet" class="object-fit-cover w-100" style="height: 320px" />
                                </div>
                                <div class="d-flex flex-column gap-2 align-items-start">
                                    <h4 class="text-white">${item.nama}</h4>
                                    <p class="text-white">${item.jabatan}</p>
                                </div>
                            </div>
                        `
                    })
                )
            }
        })

        //get ads
        req({
            url: `${path}/landing/ads`,
            type: "GET",
            success: function(response) {
                var data = response.data
                var data_slider = data.slider
                var data_non_slider = data.non_slider

                $("#adsSlider .swiper-wrapper").html(
                    data_slider.map((item) => {
                        return `
                        <a href="${item.sumber}" class="swiper-slide d-flex flex-row align-items-end justify-content-between position-relative">
                            <img src="${path + item.image}" class="d-none d-md-block object-fit-cover" alt="ads-2" width="100%" />
                            <img src="${path + item.image_mobile}" class="d-md-none object-fit-cover" alt="ads-2" width="100%" />
                        </a>
                        `
                    })
                )

                function getObjectWithLokasi(array, lokasiValue) {
                    for (var i = 0; i < array.length; i++) {
                        if (array[i].lokasi === lokasiValue) {
                            return array[i];
                        }
                    }
                    return null;
                }

                var beranda_event = getObjectWithLokasi(data_non_slider, "beranda_event");
                var beranda_artikel = getObjectWithLokasi(data_non_slider, "beranda_artikel");

                //ads event
                if (beranda_event.status === "waiting") {
                    $("#eventAdsImage").hide()
                } else {
                    $("#eventAdsImage").attr("src", beranda_event.image)
                }

                //ads artikel
                if (beranda_artikel.status === "waiting") {
                    $("#artikelImage").hide()
                } else {
                    $("#artikelImage").attr("src", beranda_artikel.image)
                }
            }
        })

        //get artikel
        req({
            url: `${path}/landing/artikel`,
            type: "GET",
            success: function(response) {
                var data = response.data
                var data_artikel = data.slice(0, 4)
                var data_artikel_lainnya = data.slice(5, 8)

                //artikel
                $("#artikelContent").html(
                    data_artikel.map((item) => {
                        return `
                            <div class="article-card-berita" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="0">
                                <a href="${path}/artikel/${item.id}" class="row row-cols-1 row-cols-md-2 text-decoration-none text-black">
                                    <div class="col col-md-6 order-md-2 artikel-berita-img">
                                        <img src="${path + item.image}" alt="" class="w-100 img-berita">
                                    </div>
                                    <div class="col col-md-6 order-md-1">
                                        <div class="d-flex align-items-center gap-2 text-secondary mb-3 artikel-berita-tanggal">
                                            <p class="fw-bold m-0">
                                                ${moment(item.tanggal).format("MMM")}, ${moment(item.tanggal).format("DD")}
                                            </p>
                                            <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="">
                                            <p class="m-0">
                                                ${moment(item.tanggal).format("YYYY")}
                                            </p>
                                        </div>
                                        <h4 class="mb-3 artikel-berita-title">
                                            ${item.judul}
                                        </h4>
                                        <div class="artikel-berita-sub" id="isi_berita">
                                            ${item.summary}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        `
                    })
                )

                //artikel lainnya
                $("#artikelLainnya").html(
                    data_artikel_lainnya.map((item) => {
                        return `
                            <div class="artikel-opini-card">
                                <a href="${path}/artikel/${item.id}" class="text-decoration-none text-black">
                                    <div class="d-flex align-items-center gap-2 text-secondary mb-3 artikel-opini-date">
                                        <p class="fw-bold m-0">
                                            ${moment(item.tanggal).format("MMM")}, ${moment(item.tanggal).format("DD")}
                                        </p>
                                        <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="">
                                        <p class="m-0">
                                            ${moment(item.tanggal).format("YYYY")}
                                        </p>
                                    </div>
                                    <h4 class="artikel-opini-title">
                                        ${item.judul}
                                    </h4>
                                </a>
                            </div>
                        `
                    })
                )
            }
        })

        //get tangklet
        req({
            url: `${path}/landing/nderek?status=answered`,
            type: "GET",
            success: function(response) {
                var data = response.data

                function convertToStars(inputString) {
                    var words = inputString.split(' ');
                    var starredWords = words.map(function(word) {
                        if (word.length > 2) {
                            return word[0] + '*'.repeat(word.length - 2) + word.slice(-1);
                        } else {
                            return word;
                        }
                    });

                    var resultString = starredWords.join(' ');

                    return resultString;
                }

                $("#swiperTanglet").html(
                    data.slice(0, 3).map((item) => {
                        return `
                            <a href="${path}/nderek-tangklet/${item.id}" class="swiper-slide bg-white text-black text-decoration-none rounded-4 p-4 d-flex flex-column justify-content-start align-items-start gap-0">
                                <p class="fw-bold mb-3 line-clamp-2">
                                    ${item.judul}
                                </p>
                                <p class="fw-medium mb-3 line-clamp-2">
                                    ${item.pertanyaan}
                                </p>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="img-container rounded-3 d-flex justify-content-center align-items-center bg-warning gap-2">
                                        <h4 class="fw-normal text-uppercase">${item.nama.charAt(0)}</h4>
                                    </div>
                                    <div class="d-flex flex-column align-items-start gap-0">
                                        <p class="fw-bold mb-0">${convertToStars(item.nama)}</p>
                                        <p class="text-secondary fw-medium mb-0">
                                            ${moment(item.tanggal).format("DD MMMM YYYY")}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        `
                    })
                )

                const swiper4 = new Swiper('.mySwiper4', {
                    spaceBetween: 8,
                    slidesPerView: 1,
                    loop: true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });

                console.log(data, "nderek")
            }
        })

        //get event
        req({
            url: `${path}/landing/event`,
            type: "GET",
            success: function(response) {
                var data = response.data

                function getObjectWithType(array, typeValue) {
                    for (var i = 0; i < array.length; i++) {
                        if (array[i].type === typeValue) {
                            return array[i];
                        }
                    }
                    return null;
                }

                var event_youtube = getObjectWithType(data, "youtube");
                var event_instagram_atas = getObjectWithType(data, "instagram atas");
                var event_instagram_bawah = getObjectWithType(data, "instagram bawah");
                var event_instagram = data.filter(v => v.type = "instagram");

                function getYouTubeVideoId(url) {
                    var match = url.match(/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/);
                    return match && match[1];
                }

                if (event_youtube) {
                    $("#eventYoutubeIframe").attr("src", `https://www.youtube.com/embed/${getYouTubeVideoId(event_youtube.url)}`)
                    $("#eventYoutubeTanggal").html(`${moment(event_youtube.tanggal).format("DD MMMM YYYY")}`)
                    $("#eventYoutubeJudul").html(event_youtube.judul)
                    $("#eventYoutubeLink").attr("href", event_youtube.url)
                }

                if (event_instagram.length === 0) {
                    $("#eventInstagramAll").hide()
                } else {
                    if (event_instagram_atas) {
                        $("#instagramAtas").html(
                            `
                                <a href="${event_instagram_atas.url}" class="text-decoration-none text-black" target="_blank">
                                    <img src="${path + event_instagram_atas.image}" alt="" class="w-100 mb-3 img-event">
                                    <div class="text-secondary d-inline-flex align-items-center gap-2 mb-3">
                                        <div>
                                            <img src="{{ asset('landingpage/assets/images/logo pcnu small.png') }}" alt="">
                                        </div>
                                        <p class="m-0 fw-bold">
                                            pcnu_batu
                                        </p>
                                        <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="">
                                        <p class="m-0">
                                            ${moment(event_instagram_atas.tanggal).format("DD MMMM")}
                                        </p>
                                    </div>
                                </a>
                            `
                        )
                    } else {
                        $("#instagramAtas").hide()
                    }

                    if (event_instagram_bawah) {
                        $("#instagramBawah").html(
                            `
                                <a href="${event_instagram_bawah.url}" class="text-decoration-none text-black" target="_blank">
                                    <img src="${path + event_instagram_bawah.image}" alt="" class="w-100 mb-3 img-event">
                                    <div class="text-secondary d-inline-flex align-items-center gap-2 mb-3">
                                        <div>
                                            <img src="{{ asset('landingpage/assets/images/logo pcnu small.png') }}" alt="">
                                        </div>
                                        <p class="m-0 fw-bold">
                                            pcnu_batu
                                        </p>
                                        <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="">
                                        <p class="m-0">
                                            ${moment(event_instagram_bawah.tanggal).format("DD MMMM")}
                                        </p>
                                    </div>
                                </a>
                            `
                        )
                    } else {
                        $("#instagramBawah").hide()
                    }
                }
            }
        })
    </script>
</x-landing-page-layout>