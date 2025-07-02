<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Font Awesome-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/base/typography.css') }}" rel="stylesheet">
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    {{-- Components Style --}}
    <link rel="stylesheet" href="{{ asset('template2/css/tentangkami.css') }}">
    <link href="{{ asset('template2/css/Admin/components/form.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/Admin/components/button.css') }}" rel="stylesheet">


    @yield('style')
    <style>
        .sidebar {
            background-color: #0d1727;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            color: white;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            z-index: 1030;
        }

        .sidebar.shrink {
            width: 80px;
        }

        .sidebar-nav {
            padding: 2rem 0;
            flex: 1 1 auto;
        }

        .sidebar.shrink .nav-link {
            justify-content: center;
        }

        .sidebar.shrink .nav-link .nav-icon {
            margin-right: 0;
        }

        .sidebar .sidebar-header {
            padding: 20px;
            align-items: center;
        }

        .sidebar .sidebar-header h5 {
            font-size: 14px;
            color: #F2F3F4;
            font-weight: 700;
        }

        .sidebar .sidebar-header img {
            width: 33px;
            height: 32px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .sidebar.shrink .sidebar-header h5 {
            display: none;
        }

        .sidebar .nav-link {
            color: #b1bccb;
            display: flex;
            align-items: center;
            padding: 15px 20px;
            text-decoration: none;
            transition: background 0.3s ease;
            margin: 0 5px;
        }

        .sidebar .nav-link.active {
            background-color: #3C7B46;
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover {
            background-color: #28a745;
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-icon {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }

        .sidebar .nav-link.active-parent {
            color: #FFFFFF;
        }

        /* Warna untuk item dropdown aktif */
        .sidebar .nav-link.active {
            background-color: #3C7B46;
            color: white;
            border-radius: 8px;
        }

        /* Warna hover */
        .sidebar .nav-link:hover {
            background-color: #28a745;
            color: white;
            border-radius: 8px;
        }

        /* Agar dropdown toggle tidak terkena latar hijau */
        .sidebar .nav-link.dropdown-induk {
            background-color: transparent;
            color: white;
        }

        .sidebar .nav-link.dropdown-induk.active-parent {
            background-color: transparent;
            color: #FFFFFF;
        }

        /* Warna hijau hanya untuk item di dalam dropdown yang aktif */
        .sidebar .collapse .nav-link.active {
            background-color: #3C7B46;
            color: white;
            border-radius: 8px;
        }

        .sidebar.shrink .nav-link span {
            display: none;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-footer {
            padding: 20px;
        }

        .sidebar-footer .admin-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
            background-color: #FFFFFF0D;
            cursor: pointer;

        }

        .sidebar-footer .admin-info img {
            margin-right: 20px;
        }

        .sidebar.shrink .sidebar-footer {
            justify-content: center;
        }

        .sidebar.shrink .admin-info .admin-text {
            display: none;
        }

        .navbar-custom {
            background-color: white;
            border-bottom: 1px solid #e9ecef;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            transition: all 0.3s ease;
        }

        .navbar-custom.shrink {
            left: 80px;
        }

        .navbar-custom .navbar-toggler {
            display: block;
            border: none;
            background: none;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 60px;
            transition: all 0.3s ease;
        }

        .main-content.shrink {
            margin-left: 80px;
        }
    </style>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar">
            <div class="sidebar-header d-flex">
                <img src="{{ asset('template2/images/logo.png') }}" alt="Logo">
                <h5>SMP DARUN NAJAH 2 KARANGPLOSO</h5>
            </div>
            <!-- Sidebar -->
            <ul class="nav sidebar-nav flex-column">
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}">
                        <img src="{{ request()->routeis('#') ? asset('template2/img/icon-beranda.svg') : asset('template2/img/icon-beranda.svg') }}"
                            alt="Beranda" class="nav-icon">
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link dropdown-induk {{ Route::is('tentangkami.*') ? 'active-parent' : '' }}"
                        data-bs-toggle="collapse" href="#tentangKamiMenu" role="button" aria-expanded="false"
                        aria-controls="tentangKamiMenu">
                        <img src="{{ request()->routeis('tentangkami.slides*') ? asset('template2/img/icon-tentangkamiAct.svg') : asset('template2/img/icon-tentangkami.svg') }}"
                            alt="Tentang Kami" class="nav-icon">
                        <span>Tentang Kami</span>
                        <span class="chevron ms-auto bi bi-chevron-down"></span>
                    </a>
                    <ul class="collapse {{ Route::is('tentangkami.*') ? 'show' : '' }}" id="tentangKamiMenu">
                        <li>
                            <a href=""
                                class="nav-link {{ request()->routeIs('tentangkami.slideshow') ? 'active' : '' }}">
                                <img src="{{ request()->routeis('tentangkami.slideshow*') ? asset('template2/img/icon-itemmenuAct.svg') : asset('template2/img/icon-itemmenu.svg') }}"
                                    alt="Slideshow" class="nav-icon">
                                <span>Slideshow</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                                class="nav-link {{ Route::is('tentangkami.stafGuru')|| Route::is('tentangkami.stafGuru.new')|| Route::is('tentangkami.stafGuru.detail') ? 'active' : '' }}">
                                <img src="{{ request()->routeis('tentangkami.stafGuru*') ? asset('template2/img/icon-itemmenuAct.svg') : asset('template2/img/icon-itemmenu.svg') }}"
                                    alt="Guru/Staf" class="nav-icon">
                                <span>Guru/Staf</span>
                            </a>
                        </li>
                        <li>
                            <a href=""
                                class="nav-link {{ Route::is('tentangkami.fasilitas') || Route::is('tentangkami.fasilitas.new') || Route::is('tentangkami.fasilitas.detail') ? 'active' : '' }}">
                                <img src="{{ request()->routeis('tentangkami.fasilitas*') ? asset('template2/img/icon-itemmenuAct.svg') : asset('template2/img/icon-itemmenu.svg') }}"
                                    alt="Fasilitas" class="nav-icon">
                                <span>Fasilitas</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#informasiMenu" role="button"
                        aria-expanded="false" aria-controls="informasiMenu">
                        <img src="{{ asset('template2/img/icon-informasi.svg') }}" alt="Informasi" class="nav-icon">
                        <span>Informasi</span>
                        <span class="chevron ms-auto bi bi-chevron-down"></span>
                    </a>
                    <ul class="collapse" id="informasiMenu">
                        <li>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('template2/img/icon-itemmenu.svg') }}" alt="Berita"
                                    class="nav-icon">
                                <span>Berita</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('template2/img/icon-itemmenu.svg') }}" alt="Artikel"
                                    class="nav-icon">
                                <span>Artikel</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('template2/img/icon-itemmenu.svg') }}" alt="Sosial Media"
                                    class="nav-icon">
                                <span>Sosial Media</span>
                            </a>
                        </li>
                        <li>
                            <a class="nav-link" href="#">
                                <img src="{{ asset('template2/img/icon-itemmenu.svg') }}" alt="Galeri"
                                    class="nav-icon">
                                <span>Galeri</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <img src="{{ asset('template2/img/icon-extrakurikuler.svg') }}" alt="Ekstrakurikuler"
                            class="nav-icon">
                        <span>Ekstrakurikuler</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('setting') ? 'active' : '' }}" href="{{ route('setting') }}">
                        <img src="{{ asset('template2/img/icon-pengaturan.svg') }}" alt="Setting" class="nav-icon">
                        <span>Setting</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-footer">
                <div class="admin-info">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('template2/img/icon-profil.svg') }}" alt="Admin Avatar">
                            <div class="admin-text ms-2">
                                <div class="admin-title">Admin</div>
                                <div class="admin-subtitle small">Administrator</div>
                            </div>
                        </div>
                        <a href="#" class="ms-auto">
                            <img src="{{ asset('template2/img/icon-arrow.svg') }}" alt="Arrow Icon">
                        </a>
                    </div>
                </div>
            </div>
        </aside>


        <!-- Navbar -->
        <nav class="navbar-custom" id="navbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="toggle-btn navbar-toggler" type="button">
                        <img src="{{ asset('template2/img/icon-menu.svg') }}" alt="Menu"
                            style="width: 24px; height: 24px;">
                    </button>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#" role="button"><img
                            src="{{ asset('template2/img/icon-notif.svg') }}" alt="menu-icon" class="mt-2"><span
                            class="badge bg-danger rounded-pill me-4">4</span></a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="main-content" id="main-content">
            @yield('content')
        </div>


        <!-- JavaScript Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            // Controll sidebar
            const toggleBtn = document.querySelector(".toggle-btn");
            const sidebar = document.querySelector("#sidebar");
            const navbar = document.querySelector("#navbar");
            const mainContent = document.querySelector("#main-content");

            toggleBtn.addEventListener("click", function() {
                sidebar.classList.toggle("shrink");
                navbar.classList.toggle("shrink");
                mainContent.classList.toggle("shrink");
            });

            // Handle dropdown chevrons
            const dropdownToggles = document.querySelectorAll('[data-bs-toggle="collapse"]');
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const chevron = this.querySelector('.chevron');
                    chevron.classList.toggle('rotate');
                });
            });
        </script>
        @yield('script')
</body>

</html>
