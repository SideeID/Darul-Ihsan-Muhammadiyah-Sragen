@include('components.navbar')

<section id="hero-smp" class="d-flex align-items-end" style="height: 100vh;">
    <div class="container text-white">
        <div class="row d-flex justify-content-between">
            <div class="col-md-10">
                <h1 style="font-weight:600;"><span class="d-none d-md-flex mb-0">Gabung di</span>
                    MA Darul Ihsan Muhammadiyah Sragen<br>
                    <span class="d-none d-md-flex mb-0">Sekarang</span>
                </h1>
            </div>
            <div class="col-md-2 d-none d-md-flex flex-column align-items-end gap-3">
                <button class="btn p-0"><img src="{{ asset('template3/image/fb.svg') }}" alt="facebook"></button>
                <button class="btn p-0"><img src="{{ asset('template3/image/ig.svg') }}" alt="instagram"></button>
                <button class="btn p-0"><img src="{{ asset('template3/image/yt.svg') }}" alt="youtube"></button>
            </div>
        </div>
    </div>
</section>

<section id="deskripsi" class="py-5 px-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 mb-4 px-0 mx-0">
                <h4>MA Darul Ihsan<br>Muhammadiyah Sragen</h4>
            </div>
            <div class="col-lg-7 px-0 mx-0">
                <h4 class="title mb-3">Tentang</h4>
                <p class="text mb-2">MA di Pondok Pesantren Darul Ihsan Muhammadiyah Sragen menawarkan program
                    pendidikan lanjutan yang mengintegrasikan pelajaran umum dan agama secara seimbang. Di tingkat MA,
                    siswa dibekali dengan pengetahuan mendalam dan keterampilan berpikir kritis sambil memperkuat
                    fondasi keimanan dan akhlak. Program ini dirancang untuk mempersiapkan siswa menghadapi tantangan
                    masa depan dengan kompetensi akademis yang tinggi, kemampuan berbahasa asing, serta keterampilan
                    tambahan seperti teknologi dan organisasi. Tujuan kami adalah mencetak lulusan yang cerdas,
                    berprestasi, dan siap berkontribusi positif di masyarakat maupun dalam karier profesional mereka
                    Quis aute iure reprehenderit in.
                </p>

                <h4 class="title mt-5 mb-3">Visi Misi</h4>
                <div class="sub-visi">
                    <h4 class="subtitle my-3">Visi Sekolah</h4>
                    <p>Terbentuknya kader Muhammadiyah yang Islami, Berprestasi, dan Terampil</p>
                </div>
                <div class="sub-misi">
                    <h4 class="subtitle my-3">Misi Sekolah</h4>
                    <ol class="ps-3">
                        <li> Membudayakan dan membiasakan hidup Islami kepada Warga Sekolah.</li>
                        <li> Menciptakan lingkungan yang tertib, disiplin, bersih, rapi, indah, dan harmonis guna
                            menunjang suasana belajar yang kondusif.</li>
                        <li> Mewujudkan pembelajaran yang aktif, inovatif, kreatif, edukatif, menyenangkan serta integratif.</li>
                        <li> Membina dan memperdalam bidang akademik dan keagamaan sehingga berilmu pengetahuan luas dan berprestasi unggul.</li>
                        <li>Mengembangkan keterampilan dalam Teknologi Informasi, Komputer, Seni Baca Al-Qur’an, Seni berpidato dan Berorganisasi.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="textbox" class="mt-5 mb-0 p-0" style="align-items: center;  justify-content: center;">
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center gap-4">
            <div class="text-jadwal text-white p-3 d-flex rounded position-relative"
                style="overflow: hidden; transition: background-color 0.3s ease;" onclick="window.location.href='#'">
                <div class="textleft position-absolute d-flex align-items-center gap-3">
                    <p>MA Darul Ihsan Muhammadiyah </p>
                    <img src="{{ asset('template3/image/buliding2.svg') }}" alt="">
                </div>
                <div class="textright position-absolute d-flex align-items-center gap-3">
                    <img src="{{ asset('template3/image/buildings.svg') }}" alt="">
                    <p>MA Darul Ihsan Muhammadiyah</p>
                </div>
                <div class="info position-absolute align-items-left" style="bottom: 50px; left: 35px; right: 0;">
                    <p style="font-size: 20px; font-weight: 400;">Jadwal Penerimaan</p>
                    <h5 style="font-size: 25px; font-weight: 700;">Santri Baru 2024</h5>
                </div>
            </div>
            <div class="text-literasi p-3 d-flex rounded position-relative"
                style="overflow: hidden; transition: background-color 0.3s ease;" onclick="window.location.href='#'">
                <div class="info position-absolute align-items-left"
                    style="top: 40px; bottom: 0px; left: 35px; right: 0;">
                    <h5 style="color: #101828; font-size: 25px; font-weight: 700;">Ruang Literasi</h5>
                    <p style="color: #344054; font-size: 20px; font-weight: 400;">Darul Ihsan Muhammadiyah Sragen</p>
                </div>
                <img class="whitebook position-absolute" src="{{ asset('template3/image/whitebook.svg') }}"
                    alt="" style="transition: all 0.5s ease; position: absolute;">
                <img class="pinkbook position-absolute" src="{{ asset('template3/image/pinkbook.svg') }}" alt=""
                    style="transition: all 0.5s ease; position: absolute;">
                <img class="bluebook position-absolute" src="{{ asset('template3/image/bluebook.svg') }}" alt=""
                    style="transition: all 0.5s ease; position: absolute;">
            </div>
        </div>
    </div>
</section>

<section id="donasi" class="mt-0 py-4">
    <div class="container mt-0 pl-2">
        <div class="row justify-content-center">
            <div class="row no-gutters align-items-center donation-card"
                style="background: linear-gradient(45deg, #FDB022, #E17911); border-radius: 15px;">
                <div class="col-md-7 col-12 text-left py-5 px-5">
                    <img src="{{ asset('template3/image/logo lazizmu.svg') }}" alt="Logo Lazismu"
                        style="width: 50px; margin-bottom: 15px;">
                    <h2 class="text-black" style="font-size: 23px; font-weight: 700">Salurkan Harta Terbaikmu,<br>Raih
                        Berkah Ilahi.</h2>
                    <button class="donation-btn mt-3 text-white" style="border: none; border-radius: 5px;">Donasi
                        Sekarang</button>
                </div>
                <div class="col-md-5 col-12 d-none d-md-block">
                    <img src="{{ asset('template3/image/donasi.svg') }}" alt="Donation Box"
                        style="width: 100%; height: 280px;">
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.footer')

<style>
    #hero-smp {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7)), url("../../template3/image/imagema.svg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 700px;
    }

    #hero-smp .container-fluid {
        height: 100vh;
        width: 100%;
        max-width: 1200px;
        position: relative;
        margin: 0 50px;
        padding: 0 20px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    #hero-smp .row-hero {
        left: 20px !important;
        right: 50px !important;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        bottom: 10px;
        margin: 0px;
        position: relative;
    }

    #hero-smp h1 {
        color: #ffffff;
        margin: 0;
    }

    #hero-smp .col-button {
        display: flex;
        flex-direction: column;
        gap: 10px;
        z-index: 2;
    }

    #hero-smp button {
        border: none;
        background-color: transparent;
        padding: 0;
        cursor: pointer;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #hero-smp img {
        width: 40px;
        height: 40px;
        border: 1px solid #ffffff;
        border-radius: 50px;
        padding: 8px 8px;
    }

    #textbox .text-jadwal {
        background-color: #0B7041;
        width: 450px;
        height: 550px;
    }

    #textbox .text-jadwal:hover {
        background-color: #062215;
    }

    #textbox .text-jadwal .textleft {
        top: 55px;
        left: -150px;
        flex-direction: row;
        transition: all 0.5s ease
    }

    #textbox .text-jadwal:hover .textleft {
        left: -80px;
    }

    #textbox .text-jadwal .textright {
        top: 125px;
        right: -150px;
        flex-direction: row;
        transition: all 0.5s ease
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

    .donation-card {
        width: 920px;
        height: 280px;
    }

    .donation-btn {
        background-color: black;
        font-size: 10px;
        padding: 10px 20px;
    }

    .donation-btn:hover {
        background-color: #090909;
    }

    @media(max-width: 360px) {
        #hero-smp {
            background-image: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.1),
                    /* Warna lebih terang di bagian atas */
                    rgba(0, 0, 0, 0.5) 50%,
                    /* Lebih gelap di tengah */
                    rgba(0, 0, 0, 0.1)),
                url("/template3/image/hero-smp.svg");
        }

        #hero-smp h1 {
            display: grid;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            padding-top: 100px;
            font-size: 25px;
        }

        #textbox .text-jadwal,
        #textbox .text-literasi {
            width: 345px;
            height: 345px;
        }

        #textbox .text-literasi .bluebook {
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

        .donation-card {
            width: 345px;
        }
    }

    @media(max-width: 414px) {
        #hero-smp {
            background-image: linear-gradient(to bottom,
                    rgba(0, 0, 0, 0.1),
                    /* Warna lebih terang di bagian atas */
                    rgba(0, 0, 0, 0.5) 50%,
                    /* Lebih gelap di tengah */
                    rgba(0, 0, 0, 0.1)),
                url("../../template3/image/hero-smp.svg");
        }

        #hero-smp h1 {
            display: grid;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            padding-top: 100px;
            font-size: 25px;
        }

        #textbox .text-jadwal,
        #textbox .text-literasi {
            width: 345px;
            height: 345px;
        }

        #textbox .text-literasi .bluebook {
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

        .donation-card {
            width: 345px;
            height: 345px;
        }

        .donation-btn {
            font-size: 15px;
            padding: 10px 45px;
        }
    }
</style>
