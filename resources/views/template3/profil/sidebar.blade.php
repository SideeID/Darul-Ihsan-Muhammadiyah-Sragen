@include(config('app.template') . '.components.head')

<!-- Toggle Button -->
<div id="sidebar-toggle-mobile" class="mb-3 sidebar-toggle-mobile d-none d-flex justify-content-between align-items-center">
    <img src="{{ asset('template2/assets/image/buger-icon.svg') }}" alt="" class="">
    <img src="{{ asset('template3/image/icon/logo-sidebar.svg') }}" alt="" class="">
</div>
<div id="sidebar" class="overflow-hidden d-flex position-fixed flex-column">
    <div id="sidebar-toggle" class="mb-3 sidebar-toggle d-flex justify-content-between align-items-center">
        <img src="{{ asset('template2/assets/image/buger-icon.svg') }}" alt="" class="me-2">
        <img src="{{ asset('template3/image/icon/logo-sidebar.svg') }}" alt="" class="ms-2">
    </div>

    <div class="p-3 sidebar-nav-container container-fluid position-relative">
        <div class="mx-4 mb-4 mb-lg-5">
            <a href="{{ route('landing-page') }}" class="subjudul text-decoration-none d-flex align-items-center">
                <span style="font-size: 16px;" class="pb-1 me-3">👈</span>
                <span style="color: #182856; font-size: 16px;">Kembali ke beranda</span>
            </a>
        </div>
        <ul class="mx-4 list-unstyled flex-grow-1">
            <li class="mb-2">
                <a href="{{ route('selayang-pandang') }}"
                    class="sidebar-link p-2 {{ request()->routeIs('selayang-pandang') ? 'active' : '' }}">
                    <span>Selayang Pandang</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('sejarah-pondok') }}"
                    class="sidebar-link p-2 {{ Route::is('sejarah-pondok') ? 'active' : '' }}">
                    <span>Sejarah Pondok</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('visi-misi') }}"
                    class="sidebar-link p-2 {{ Route::is('visi-misi') ? 'active' : '' }}">
                    <span>Visi & Misi</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('struktur-organisasi') }}"
                    class="sidebar-link p-2 {{ request()->routeIs('struktur-organisasi') ? 'active' : '' }}">
                    <span>Struktur Organisasi</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('akreditasi') }}"
                    class="sidebar-link p-2 {{ request()->routeIs('akreditasi') ? 'active' : '' }}">
                    <span>Akreditas</span>
                </a>
            </li>
            <li class="mb-2">
                <a href="{{ route('logo') }}"
                    class="sidebar-link p-2 {{ request()->routeIs('logo') ? 'active' : '' }}">
                    <span>Logo & Brand</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    @media (min-width: 1400px) {
        #sidebar {
            width: 360px !important;
        }

        #sidebar.collapsed>.sidebar-toggle {
            transform: translateX(260px) !important;
        }
    }

    #sidebar {
        width: 320px;
        height: 100%;
        z-index: 1000;
        transition: all .25s ease-in-out;
        background: #F9FAFB;
    }

    .sidebar .container-fluid {
        display: flex;
        align-content: center;
    }

    .sidebar-link {
        font-size: 16px;
        color: #5A5F6D;
        display: block;
        border-left: 3px solid transparent;
        text-decoration: none;
    }

    .sidebar-link:hover {
        background-color: rgba(255, 255, 255, .075);
    }

    .sidebar-link span {
        transition: color 0.3s ease-in-out, font-weight 0.3s ease-in-out;
    }

    .sidebar-link:hover span,
    .subjudul:hover span {
        color: #080e1e;
        font-weight: bold;
    }

    .active span {
        color: #080e1e;
        font-weight: bold;
    }

    #sidebar.collapsed {
        transform: translateX(-80%);

    }

    #sidebar.collapsed>.sidebar-toggle {
        transform: translateX(225px);
    }

    .sidebar-toggle,
    .sidebar-toggle-mobile {
        left: 10px;
        z-index: 1001;
        padding: 25px 50px;
        cursor: pointer;
        font-size: 14px;
        border-bottom: 1px solid #898FA0;
        transition: all .25s ease-in-out;
    }

    @media (min-width: 320px) and (max-width: 1024px) {

        #sidebar {
            transform: translateY(-100%);
            width: 100% !important;
        }

        #sidebar .sidebar-nav-container {
            padding-top: 130px !important;
            padding-left: 0px !important;
            padding-right: 0px !important;
        }

        #sidebar.collapsed {
            transform: translateX(0);
        }

        .sidebar-toggle-mobile {
            position: fixed !important;
            top: 0px !important;
            left: 0px !important;
            display: flex !important;
            width: 100vw !important;
            background: #F9FAFB;
            padding: 20px;
        }

        .sidebar-toggle {
            display: none !important;
        }

        .body-wrapper {
            margin-left: 0 !important;
            padding: 10px;
        }
    }

    @media (max-width: 390px) {
        #sidebar {
            transform: translateX(-100%); /* Hidden by default */
        }

        #sidebar.collapsed {
            transform: translateX(0); /* Sidebar shown */
        }

        .sidebar-toggle {
            display: block; /* Show toggle button on small screens */
        }

        .body-wrapper {
            margin-left: 0 !important;
            padding: 10px;
        }
    }
</style>

<script>
    document.getElementById('sidebar-toggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
    document.getElementById('sidebar-toggle-mobile').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>
