@extends('components.head')

@section('style1')
<div class="container">
    <nav class="container navbar-landing-container navbar navbar-expand-sm bg-transparent pt-0 fixed-top position-absolute d-flex justify-content-between"
        style="z-index: 100;">
        <a class="navbar-brand p-4" href="{{ route('landing-page') }}">
            <img src="{{ asset('template2/assets/image/logo-smp.png') }}" alt="Logo" style="width: 50px;"
                class="nav-logo">
            <span class="text-dark fw-bold nav-brand-title m-0  ms-3 lh-sm" style=" letter-spacing: -1px;">
                SMP DARUN NAJAH 2 <br>KARANGPLOSO
            </span>
        </a>
        <button class="btn py-2 d-none btn-nav-mobile" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasTop" aria-controls="offcanvasTop" style="background-color:#182856;">
            <img src="{{ asset('template2/assets/image/setting.svg') }}" alt="">
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav d-flex gap-3 justify-content-end flex-grow-1 align-items-center text-center">
                <a class="nav-link icon p-0" target="_blank"
                    href="https://www.instagram.com/smpdarunnajah2karangploso/">
                    <div class="rounded-circle border border-white"
                        style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('template2/assets/image/ig.svg') }}" alt="Instagram">
                    </div>
                </a>
                <a class="nav-link icon p-0" target="_blank" href="https://www.youtube.com/@smpdarunnajah2karangploso">
                    <div class="rounded-circle border border-white"
                        style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('template2/assets/image/youtube.svg') }}" alt="YouTube">
                    </div>
                </a>
                <a class="btn py-2 px-4 d-flex align-items-center justify-content-center border border-white"
                    href="https://wa.me/6281222774006" target="_blank"
                    style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                    <img src="{{ asset('template2/assets/image/whatsapp.svg') }}" alt="" class="me-2"
                        style="width: 24px;">
                    <span class="text-dark fw-semibold">
                        Kontak Kami
                    </span>
                </a>
                <a class="btn btn-success py-2 px-4" target="_blank" href="https://psbdarunnajah2.framer.website/">PSB
                    Online</a>
                <!-- Button to trigger offcanvas -->
                <button class="btn py-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
                    aria-controls="offcanvasTop" style="background-color:#182856;">
                    <img src="{{ asset('template2/assets/image/setting.svg') }}" alt="">
                </button>
            </ul>
        </div>
    </nav>
</div>

<!-- Offcanvas -->
<div class="offcanvas offcanvas-top overflow-hidden" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel"
    style="z-index: 2; background-color:#080E1E; height: 85%">
    <div class="offcanvas-body">
        <ul class="list-unstyled">
            <li class="py-2">

                <!-- Default dropend button -->
                <div class="btn-group dropend drop-list" style="color: #D9DADD;">
                    <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="true">
                        Profil
                    </div>
                    <ul class="dropdown-menu drop-profil">
                        <li>
                            <a href="{{ route('tentang-kami') }}">Tentang Kami <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('core-value') }}">Core Value <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('dewan-guru') }}">Dewan Guru <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('struktur-organisasi') }}">Organisasi <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('logo') }}">Logo <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                    </ul>
                </div>

            </li>
            <li class="py-2">
                <a href="{{ route('darun_najah.berita') }}">Berita</a>
            </li>
            <li class="py-2">
                <div class="btn-group dropend" style="color: #D9DADD;">
                    <div type="button" class="subdropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        style="font-size: 20px;">
                        Program
                    </div>
                    <ul class="dropdown-menu drop-program">
                        <li>
                            <a href="{{ route('program.tahfidzquran') }}">Tahfizd Qur'an <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('program.bilingual') }}">Bilingual
                                <img src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('program.p5') }}">P5 <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                        <li>
                            <a href="{{ route('program.ekstrakurikuler') }}">Ekstrakurikuler <img
                                    src="{{ asset('template2/assets/image/arrow-right.svg') }}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="py-2">
                <a href="{{ route('fasilitas') }}">Fasilitas</a>
            </li>
            <li class="py-2">
                <a href="{{ route('galeri') }}">Galeri</a>
            </li>

            {{-- mobile button --}}
            <a class="btn d-none btn-nav-mobile btn-success py-2 px-4 my-3" target="_blank"
                href="https://psbdarunnajah2.framer.website/">PSB
                Online</a>
            <a class="btn d-none btn-nav-mobile py-2 px-4 d-flex align-items-center justify-content-center border border-white my-3"
                href="https://wa.me/6281222774006" target="_blank"
                style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                <img src="{{ asset('template2/assets/image/whatsapp.svg') }}" alt="" class="me-2"
                    style="width: 24px;">
                <span class="text-dark fw-semibold">
                    Kontak Kami
                </span>
            </a>
            <div class="d-flex flex-row align-items-center justify-content-start gap-2 d-sm-flex d-md-none w-0">
                <a class="nav-link btn-icon-mobile icon my-2 p-0 w-0" target="_blank"
                    href="https://www.instagram.com/smpdarunnajah2karangploso/">
                    <div class="rounded-circle border border-white d-flex justify-content-center align-items-center"
                        style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('template2/assets/image/ig.svg') }}" alt="Instagram"
                            style="width: 20px; height: 20px;">
                    </div>
                </a>
                <a class="nav-link btn-icon-mobile icon my-2 p-0 w-0" target="_blank"
                    href="https://www.youtube.com/@smpdarunnajah2karangploso">
                    <div class="rounded-circle border border-white d-flex justify-content-center align-items-center"
                        style="width: 40px; height: 40px; background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                        <img src="{{ asset('template2/assets/image/youtube.svg') }}" alt="YouTube"
                            style="width: 20px; height: 20px;">
                    </div>
                </a>
            </div>

        </ul>
    </div>
</div>

@yield('style1_content')

@include('components.footer')

@endsection
