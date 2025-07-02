<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-flex d-md-flex pt-4 pb-3 justify-content-start px-4">
        <img src="{{ asset('image/logo.svg') }}" class="sidebar-brand d-flex d-md-flex" alt="">
        <img src="{{ asset('image/logo.svg') }}" class="sidebar-brand-narrow bg-primary" alt="">
    </div>
    <ul class="sidebar-nav pt-3" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a id="sidebar-dashboard" class="nav-link" href="{{route('dashboard')}}">
                @if (request()->is('dashboard'))
                <img src="{{ asset('image/icon/sidebar/beranda-active.svg') }}" class="nav-icon" alt="">
                @else
                <img src="{{ asset('image/icon/sidebar/beranda.svg') }}" class="nav-icon" alt="">
                @endif
                Beranda
            </a>
        </li>
        {{-- <li id="sidebar-koin-nusantara" class="nav-group {{ (request()->is('koin*')) ? 'show' : '' }}"><a class="nav-link nav-group-toggle" href="#"><img src="{{ asset('image/icon/sidebar/koin-nusantara.svg') }}" class="nav-icon" alt=""> Koin NUsantara</a>
            <ul class="nav-group-items">
                <li class="nav-item p-0"><a id="sidebar-pengajuan" class="nav-link {{ (request()->is('koin/pengajuan*')) ? 'active' : '' }}" href="{{route('koin.program.index')}}"><span class="nav-icon"></span> Pengajuan Program</a></li>
                <li class="nav-item p-0"><a id="sidebar-donatur" class="nav-link {{ (request()->is('koin/donatur*')) ? 'active' : '' }}" href="{{route('koin.donatur')}}"><span class="nav-icon"></span> Donatur</a></li>
            </ul>
        </li> --}}
        <li class="nav-item">
            <a id="sidebar-tanglet" class="nav-link" href="{{route('tanglet.index')}}">
                @if (request()->is('tanglet*'))
                <img src="{{ asset('image/icon/sidebar/tanglet-active.svg') }}" class="nav-icon" alt="">
                @else
                <img src="{{ asset('image/icon/sidebar/tanglet.svg') }}" class="nav-icon" alt="">
                @endif
                Nderek Tanglet
            </a>
        </li>
        <li id="sidebar-konten" class="nav-group {{ (request()->is('konten*')) ? 'show' : '' }}"><a class="nav-link nav-group-toggle" href="#"><img src="{{ asset('image/icon/sidebar/konten.svg') }}" class="nav-icon" alt=""> Konten</a>
            <ul class="nav-group-items">
                <li class="nav-item p-0"><a id="sidebar-berita" class="nav-link {{ (request()->is('konten/berita*')) ? 'active' : '' }}" href="{{route('berita.index')}}"><span class="nav-icon"></span> Berita</a></li>
                <li class="nav-item p-0"><a id="sidebar-artikel" class="nav-link {{ (request()->is('konten/artikel*')) ? 'active' : '' }}" href="{{route('artikel.index')}}"><span class="nav-icon"></span> Artikel</a></li>
                <li class="nav-item p-0"><a id="sidebar-event" class="nav-link {{ (request()->is('konten/event*')) ? 'active' : '' }}" href="{{route('event.index')}}"><span class="nav-icon"></span> Event</a></li>
                <li class="nav-item p-0"><a id="sidebar-ads" class="nav-link {{ (request()->is('konten/ads*')) ? 'active' : '' }}" href="{{route('iklan.slider.index')}}"><span class="nav-icon"></span> Partnership/Ads</a></li>
            </ul>
        </li>
        {{--<li class="nav-item">
            <a id="sidebar-anggota" class="nav-link {{ (request()->is('anggota*')) ? 'active' : '' }}" href="{{route('anggota.index')}}">
                @if (request()->is('anggota*'))
                <img src="{{ asset('image/icon/sidebar/anggota-active.svg') }}" class="nav-icon" alt="">
                @else
                <img src="{{ asset('image/icon/sidebar/anggota.svg') }}" class="nav-icon" alt="">
                @endif
                Anggota
            </a>
        </li>--}}
        <li class="nav-item">
            <a id="sidebar-pengurus" class="nav-link {{ (request()->is('pengurus*')) ? 'active' : '' }}" href="{{route('pengurus.index')}}">
                @if (request()->is('pengurus*'))
                <img src="{{ asset('image/icon/sidebar/pengurus-active.svg') }}" class="nav-icon" alt="">
                @else
                <img src="{{ asset('image/icon/sidebar/pengurus.svg') }}" class="nav-icon" alt="">
                @endif
                Pengurus
            </a>
        </li>
        <li id="sidebar-pengaturan" class="nav-group {{ (request()->is('pengaturan*')) ? 'show' : '' }}"><a class="nav-link nav-group-toggle" href="#"><img src="{{ asset('image/icon/sidebar/pengaturan.svg') }}" class="nav-icon" alt=""> Pengaturan</a>
            <ul class="nav-group-items">
                <li class="nav-item p-0"><a id="sidebar-profile" class="nav-link {{ (request()->is('pengaturan/profile*')) ? 'active' : '' }}" href="{{route('pengaturan.profile')}}"><span class="nav-icon"></span> Profile</a></li>
                <li class="nav-item p-0"><a id="sidebar-artikel" class="nav-link {{ (request()->is('pengaturan/narasumber*')) ? 'active' : '' }}" href="{{route('pengaturan.narasumber')}}"><span class="nav-icon"></span> Narasumber</a></li>
            </ul>
        </li>
    </ul>

    <ul class="d-flex justify-content-center p-0">
        <div class="dropdown">
            <a class="bg-transparent text-decoration-none dropdown-toggle d-flex align-items-center p-0" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img id="user-foto" src="{{ asset('image/avatar.png') }}" class="admin-avatar" alt="avatar">
                <div>
                    <div class="text-white admin-title fw-700"><span id="user-nama">{{ auth()->user()->name ?? '-'
                            }}</span></div>
                    <span class="text-secondary admin-subtitle">{{ucfirst(auth()->user()->roles[0]->name ?? 'Pengguna
                        belum memiliki role.')}}</span>
                </div>
            </a>
            <ul class="dropdown-menu">
                {{-- @include('layouts.level') --}}
                <li><a class="dropdown-item" href="#" id="logout-user">Logout</a></li>
            </ul>
        </div>
    </ul>
</div>
