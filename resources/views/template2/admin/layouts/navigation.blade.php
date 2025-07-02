<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="px-2 pt-4 pb-3 sidebar-brand d-flex d-md-flex justify-content-start">
        <img src="{{ asset('template2/images/logo.png') }}" class="px-2 sidebar-brand d-flex d-md-flex" alt="" style="width: 20px; height: auto;">
        <img src="{{ asset('template2/images/logo.png') }}" class="px-2 sidebar-brand-narrow bg-primary" alt="" style="width: 20px; height: auto;">
        <span class="px-2 fw-bold sidebar-text" style="font-size: 13px;">SMP DARUN NAJAH <br> 2 KARANGPLOSO</span>
    </div>
    <ul class="pt-3 sidebar-nav" data-coreui="navigation" data-simplebar="">
        {{-- <li class="nav-item">
            <a id="sidebar-dashboard" class="nav-link" href="{{ route('dashboard') }}">
                @if (request()->is('dashboard'))
                    <img src="{{ asset('image/icon/sidebar/beranda-active.svg') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template2/images/home.png') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Beranda</span>
            </a>
        </li> --}}
        <li id="sidebar-tentang-kami" class="nav-group {{ request()->is('admin/tentang*') ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle" href="#">
                @if (request()->is('admin/tentang*'))
                    <img src="{{ asset('template2/images/aboutus.png') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template2/images/aboutus.png') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Tentang Kami</span>
            </a>
            <ul class="nav-group-items">
                <li class="p-0 nav-item">
                    <a id="sidebar-slideshow" class="nav-link {{ request()->is('admin/tentang/slideshow*') ? 'active' : '' }}" href="{{ route('tentang_kami.slideshow.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Slideshow</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-gurustaff" class="nav-link {{ request()->is('admin/tentang/gurustaff*') ? 'active' : '' }}" href="{{ route('tentang_kami.staf.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Guru/Staff</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-fasilitas" class="nav-link {{ request()->is('admin/tentang/fasilitas*') ? 'active' : '' }}" href="{{ route('tentang_kami.fasilitas.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Fasilitas</span>
                    </a>
                </li>
            </ul>
        </li>


        <li id="sidebar-informasi" class="nav-group {{ request()->is('admin/informasi*') ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle" href="#">
                @if (request()->is('admin/informasi*'))
                    <img src="{{ asset('template2/images/info.png') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template2/images/info.png') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Informasi</span>
            </a>
            <ul class="nav-group-items" style="list-style-type: none; padding-left: 0; margin-left: 0;">
                <li class="p-0 nav-item">
                    <a id="sidebar-berita" class="nav-link {{ request()->is('admin/informasi/berita*') ? 'active' : '' }}" href="{{ route('informasi.berita.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Berita</span>
                    </a>
                </li>
                {{-- <li class="p-0 nav-item">
                    <a id="sidebar-artikel" class="nav-link {{ request()->is('admin/informasi/artikel*') ? 'active' : '' }}" href="{{ route('artikel.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Artikel</span>
                    </a>
                </li> --}}
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed" class="nav-link {{ request()->is('admin/informasi/sosmed') ? 'active' : '' }}" href="{{ route('sosmed.youtube') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Sosial Media</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-galeri" class="nav-link {{ request()->is('admin/informasi/galeri*') ? 'active' : '' }}" href="{{ route('galeri.foto.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Galeri</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a id="sidebar-ekstrakurikuler"
                class="nav-link {{ request()->is('admin/ekstrakurikuler*') ? 'active' : '' }}"
                href="{{ route('ekstrakurikuler.index') }}">
                @if (request()->is('admin/ekstrakurikuler*'))
                    <img src="{{ asset('template2/images/bintang.png') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template2/images/bintang.png') }}" class="nav-icon" alt="">
                @endif
                 <span class="sidebar-text">Ektrakurikuler</span>
            </a>
        </li>
        <li class="nav-item">
            <a id="sidebar-ekstrakurikuler" class="nav-link {{ request()->is('pengaturan*') ? 'active' : '' }}"
                href="{{ route('pengaturan.profile') }}">
                @if (request()->is('pengaturan*'))
                    <img src="{{ asset('template2/images/setting.png') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template2/images/setting.png') }}" class="nav-icon" alt="">
                @endif
              <span class="sidebar-text">Pengaturan</span>
            </a>
        </li>
        {{-- <li id="sidebar-pengaturan" class="nav-group {{ (request()->is('admin/pengaturan*')) ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle" href="#">
                @if (request()->is('admin/pengaturan*'))
                <img src="{{ asset('image/icon/sidebar/pengaturan-active.svg') }}" class="nav-icon" alt="">
                @else
                <img src="{{ asset('image/icon/sidebar/pengaturan.svg') }}" class="nav-icon" alt="">
                @endif
                Pengaturan
            </a>
            <ul class="nav-group-items">
                <li class="p-0 nav-item"><a id="sidebar-profile" class="nav-link {{ (request()->is('pengaturan/profile*')) ? 'active' : '' }}" href="{{route('pengaturan.profile')}}"><span class="nav-icon"></span> Profile</a></li>
                <li class="p-0 nav-item"><a id="sidebar-artikel" class="nav-link {{ (request()->is('pengaturan/narasumber*')) ? 'active' : '' }}" href="{{route('pengaturan.narasumber')}}"><span class="nav-icon"></span> Narasumber</a></li>
            </ul>
        </li>  --}}
    </ul>

    <ul class="px-3 py-0 d-flex justify-content-center sidebar-footer">
        <div class="p-2 dropdown w-100">
            <a class="p-0 bg-transparent text-decoration-none dropdown-toggle d-flex align-items-center" href="#"
                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img id="user-foto" src="{{ asset('image/avatar.png') }}" class="admin-avatar" alt="avatar">
                <div>
                    <div class="text-white admin-title fw-700"><span
                            id="user-nama">{{ auth()->user()->name ?? '-' }}</span></div>
                    {{-- <span class="text-secondary admin-subtitle">{{ucfirst(auth()->user()->roles[0]->name ?? 'Pengguna belum memiliki role.')}}</span> --}}
                    <span class="text-secondary admin-subtitle">Administrator</span>
                </div>
            </a>
            <ul class="dropdown-menu">
                {{-- @include('layouts.level') --}}
                <li><a class="dropdown-item" href="#" id="logout-user">Logout</a></li>
            </ul>
        </div>
    </ul>
</div>

