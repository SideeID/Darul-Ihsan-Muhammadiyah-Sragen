@include('components.head')

<div class="container">
    <style>
        .navbar-custom-css {
            align-items: flex-start !important;
        }


        @media only screen and (max-width: 575px) {
            .navbar-custom-css {
                align-items: center !important;
            }
        }
    </style>
    <nav class="p-0 pt-0 bg-transparent navbar-custom-css navbar-landing-container navbar navbar-expand-sm fixed-top position-absolute d-flex justify-content-between me-0"
        style="z-index: 3;">
        <a class="navbar-brand py-4 px-5 ms-5" href="{{ route('landing-page') }}">
            <!-- logo biru -->
            @if (in_array(Route::currentRouteName(), ['fasilitas', 'tatatertib','berita.berita','berita.galerifoto','berita.galerivideo','daftar-alumni']))
                <img src="{{ asset('template3/image/icon/logo-dimsa-biru.svg') }}" alt="Logo" style="width: 100px;"
                    class="nav-logo">
            @else
                <!-- Logo putih (default) -->
                <img src="{{ asset('template3/image/logo-dimsa.png') }}" alt="Logo" style="width: 100px;"
                    class="nav-logo">
            @endif
        </a>


        <button class="d-none btn-nav-mobile p-3 rounded-start" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" style="background-color:#101828;">
            <img src="{{ asset('template3/image/icon/icon-menu.svg') }}" alt="" style="width:20px;height:20px;">
        </button>


        <div class="p-0 collapse navbar-collapse me-0" id="navbarNavDropdown">
            <ul class="px-0 text-center navbar-nav d-flex justify-content-end flex-grow-1 align-items-center me-0">
                <li class="nav-item">
                    <a class="text-center btn btn-nav btn-primary rounded-start d-flex align-items-center justify-content-center"
                        target="_blank" href="https://bit.ly/PSB-SMP-MA-DIMSA-25-26">
                        PSB Online
                    </a>
                </li>
                <!-- Button to trigger offcanvas -->
                <li class="nav-item">
                    <button class="btn btn-nav text-light d-flex align-items-center justify-content-center"
                        type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                        aria-controls="offcanvasTop" style="background-color:#101828;">
                        <img src="{{ asset('template3/image/icon/icon-menu.svg') }}" alt="" class="me-2"
                            style="width:20px;height:20px;">
                        Menu
                    </button>
                </li>
            </ul>
        </div>
    </nav>
</div>


<!-- Offcanvas -->
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel"
    style="z-index: 2; background-color:#ffffff; height: 85%;">
    <div class="offcanvas-body" style="overflow: hidden;">
        <div class="row">
            <div class="col-3 black-nav" style="height: 100vh; background-color:#02060D; padding: 10rem 6.5rem;">
                <ul class="list-unstyled">
                    <li class="py-2">
                        <!-- Default dropend button -->
                        <div class="btn-group dropend drop-list" style="color: #D9DADD;">
                            <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="true">
                                Profil
                            </div>
                            <ul class="dropdown-menu drop-profil">
                                <!-- button kembali (mobile) -->
                                <li class="d-none btn-back-nav">
                                    <a href="offcanvas-body" class="subjudul text-decoration-none">
                                        <span style="width:10px; height:10px;" class="pb-1 me-1">👈</span>
                                        <span style="color: #182856; font-size: 16px; font-weight:500;">Kembali</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('selayang-pandang') }}"
                                        style="font-size:20px!important;color:#080e1e!important;">Tentang Dimsa</a>
                                    <p>Telusuri lebih dekat DIMSA dalam sejarah,<br> rekam kontribusi untuk negeri dan
                                        beragam informasi lainnya.</p>
                                </li>
                                <li>
                                    <a href="{{ route('selayang-pandang') }}">Selayang Pandang</a>
                                </li>
                                <li>
                                    <a href="{{ route('sejarah-pondok') }}">Sejarah</a>
                                </li>
                                <li>
                                    <a href="{{ route('visi-misi') }}">Visi & Misi</a>
                                </li>
                                <li>
                                    <a href="{{ route('struktur-organisasi') }}">Struktur Organisasi</a>
                                </li>
                                <li>
                                    <a href="{{ route('akreditasi') }}">Akreditasi</a>
                                </li>
                                <li>
                                    <a href="{{ route('logo') }}">Logo & Brand</a>
                                </li>
                                <li>
                                    <a href="{{ url('/pimpinan') }}">Pimpinan & Dewan Guru</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-2">
                        <!-- Default dropend button -->
                        <div class="btn-group dropend drop-list" style="color: #D9DADD;">
                            <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="true">
                                Akademik
                            </div>
                            <ul class="dropdown-menu drop-akademik">
                                <!-- button kembali (mobile) -->
                                <li class="d-none btn-back-nav">
                                    <a href="offcanvas-body" class="subjudul text-decoration-none">
                                        <span style="width:10px; height:10px;" class="pb-1 me-1">👈</span>
                                        <span style="color: #182856; font-size: 16px; font-weight:500;">Kembali</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('akademik-smp') }}"
                                        style="font-size:20px!important;color:#080e1e!important;">Akademik</a>
                                    <p>Ragam informasi akademik lembaga pendidikan di DIMSA </p>
                                </li>
                                <li>
                                    <a href="{{ route('akademik-smp') }}">SMP</a>
                                </li>
                                <li>
                                    <a href="{{ route('akademik-sma') }}">MA</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="btn-group dropend" style="color: #D9DADD;">
                            <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 20px;">
                                Program
                            </div>
                            <ul class="dropdown-menu drop-program">
                                <!-- button kembali (mobile) -->
                                <li class="d-none btn-back-nav">
                                    <a href="offcanvas-body" class="subjudul text-decoration-none">
                                        <span style="width:10px; height:10px;" class="pb-1 me-1">👈</span>
                                        <span style="color: #182856; font-size: 16px; font-weight:500;">Kembali</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('program.tahfidzquran') }}"
                                        style="font-size:20px!important;color:#080e1e!important;">Program</a>
                                    <p>Ragam pembelajaran unggulan DIMSA <br>untuk pengembangan diri Siswa-siswi </p>
                                </li>
                                <li>
                                    <a href="{{ route('program.kurikulum') }}">Kurikulum Pondok</a>
                                </li>
                                <li>
                                    <a href="{{ route('program.tahfidzquran') }}">Program Tahfidz</a>
                                </li>
                                <li>
                                    <a href="{{ route('program.bahasa') }}">Program Bahasa</a>
                                </li>
                                <li>
                                    <a href="{{ route('program.ekstrakurikuler') }}">Ekstrakurikuler</a>
                                </li>
                                <li>
                                    <a href="{{ route('program.unggulan') }}">Program Unggulan IT</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="btn-group dropend" style="color: #D9DADD;">
                            <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 20px;">
                                Fasilitas
                            </div>
                            <ul class="dropdown-menu drop-fasilitas">
                                <!-- button kembali (mobile) -->
                                <li class="d-none btn-back-nav">
                                    <a href="offcanvas-body" class="subjudul text-decoration-none">
                                        <span style="width:10px; height:10px;" class="pb-1 me-1">👈</span>
                                        <span style="color: #182856; font-size: 16px; font-weight:500;">Kembali</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('fasilitas') }}"
                                        style="font-size:20px!important;color:#080e1e!important;">Fasilitas</a>
                                    <p>Pendukung efektifitas proses <br>kegiatan pembelajaran di DIMSA</p>
                                </li>
                                <li>
                                    <a href="{{ route('fasilitas') }}">Sarana Prasarana</a>
                                </li>
                                <li>
                                    <a href="{{ route('tatatertib') }}">Panduan Tata Tertib</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="py-2">
                        <div class="btn-group dropend" style="color: #D9DADD;">
                            <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                style="font-size: 20px;">
                                Berita
                            </div>
                            <ul class="dropdown-menu drop-berita">
                                <!-- button kembali (mobile) -->
                                <li class="d-none btn-back-nav">
                                    <a href="offcanvas-body" class="subjudul text-decoration-none">
                                        <span style="width:10px; height:10px;" class="pb-1 me-1">👈</span>
                                        <span style="color: #182856; font-size: 16px; font-weight:500;">Kembali</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('berita.kabar') }}"
                                        style="font-size:20px!important;color:#080e1e!important;">Berita</a>
                                    <p>Kumpulan informasi uptodate DIMSA </p>
                                </li>
                                <li>
                                    <a href="{{ route('berita.kabar') }}">Dimsa dalam Berita</a>
                                </li>
                                <li>
                                    <a href="{{ route('berita.majalah') }}">Majalah</a>
                                </li>
                                <li>
                                    <a href="{{ route('berita.galerifoto') }}">Galeri</a>
                                </li>
                                <li>
                                    <a href="{{ route('berita.pengumuman') }}">Pengumuman</a>
                                </li>
                                <li>
                                    <a href="{{ route('qna.page') }}">QnA</a>
                                </li>
                                <li>
                                    <a href="{{ route('daftar-alumni') }}">Jejaring Alumni</a>
                                </li>
                                <li>
                                    <a href="{{ route('berita.karyailmiah') }}">Lowongan Kerja</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a class="d-none btn btn-primary btn-psb-mobile" target="_blank"
                            href="https://psbdarunnajah2.framer.website/">
                            PSB Online
                        </a>
                    </li>

                    <li>
                        <div class="gap-4 pt-5 my-4 mb-5 d-flex nav-sosmed">
                            <a class="p-0 footer-link icon" target="_blank" href="https://www.facebook.com/">
                                <div class="p-2 border border-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                    <img src="{{ asset('template3/image/icon/Facebook.svg') }}" alt="Facebook">
                                </div>
                            </a>
                            <a class="p-0 footer-link icon" target="_blank" href="https://www.instagram.com/">
                                <div class="p-2 border border-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                    <img src="{{ asset('template3/image/icon/Instagram.svg') }}" alt="Instagram">
                                </div>
                            </a>
                            <a class="p-0 footer-link icon" target="_blank" href="https://www.youtube.com/">
                                <div class="p-2 border border-white rounded-circle d-flex align-items-center justify-content-center"
                                    style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                    <img src="{{ asset('template3/image/icon/YouTube.svg') }}" alt="YouTube">
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


@yield('content')
