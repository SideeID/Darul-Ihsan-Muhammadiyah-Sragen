<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="px-2 pt-4 pb-3 sidebar-brand d-flex d-md-flex justify-content-start">
         <!-- Logo besar -->
         <img src="{{ asset('template3/image/icon/logo-cms.svg') }}"
         class="px-2 sidebar-brand-large ms-4"
         alt="Logo besar"
         style="width: 75px; height: auto;">

    <!-- Logo kecil, disembunyikan secara default -->
    <img src="{{ asset('template3/image/icon/logo-cms.svg') }}"
         class="px-2 sidebar-brand-small d-none"
         alt="Logo kecil"
         style="width: 30px; height: auto;">
    </div>

    <ul class="pt-3 sidebar-nav" data-coreui="navigation" data-simplebar="">
        <li class="nav-item">
            <a id="sidebar-slideshow"
                class="nav-link {{ request()->is('tentang_kami.slideshow.index*') ? 'active' : '' }}"
                href="{{ route('tentang_kami.slideshow.index') }}">
                @if (request()->is('admin/ekstrakurikuler*'))
                    <img src="{{ asset('template3/image/icon/icon-slideshow-off.svg') }}" class="nav-icon"
                        alt="">
                @else
                    <img src="{{ asset('template3/image/icon/icon-slideshow.svg') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Slideshow</span>
            </a>
        </li>

        <li id="sidebar-tentang-kami" class="nav-group {{ request()->is('admin/tentang*') ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle" href="#">
                @if (request()->is('admin/tentang*'))
                    <img src="{{ asset('template2/images/aboutus.png') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template2/images/aboutus.png') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Tentang Sekolah</span>
            </a>
            <ul class="nav-group-items">
                <li class="p-0 nav-item">
                    <a id="sidebar-slideshow"
                        class="nav-link {{ request()->is('admin/tentang-kami/dewan*') ? 'active' : '' }}"
                        href="{{ route('admin.tentang_kami.dewan.pimpinan.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Dewan Yayasan</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-gurustaff"
                        class="nav-link {{ request()->is('admin/tentang/gurustaff*') ? 'active' : '' }}"
                        href="{{ route('tentang_kami.staf.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Guru & Staff</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-partner"
                        class="nav-link {{ request()->is('admin/tentang-sekolah/partner*') ? 'active' : '' }}"
                        href="{{ route('tentang_sekolah.partner') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Partner Lembaga</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-program-unggulan"
                        class="nav-link {{ request()->routeIs('tentang_sekolah.program_unggulan', 'tentang_sekolah.add_program', 'tentang_sekolah.edit_program') ? 'active' : '' }}"
                        href="{{ route('tentang_sekolah.program_unggulan') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Program Unggulan</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-fasilitas"
                        class="nav-link {{ request()->is('admin/tentang-sekolah/tata-tertib*') ? 'active' : '' }}"
                        href="{{ route('tentang_sekolah.tata_tertib') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Tata Tertib</span>
                    </a>
                </li>
            </ul>
        </li>


        <li id="sidebar-informasi" class="nav-group {{ request()->is('admin/informasi*') ? 'show' : '' }}">
            <a class="nav-link nav-group-toggle" href="#">
                @if (request()->is('admin/informasi*'))
                    <img src="{{ asset('template2/images/info.png') }}" class="nav-icon" alt="">
                @else
                    <img src="{{ asset('template3/image/icon/icon-informasi.svg') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Informasi</span>
            </a>
            <ul class="nav-group-items" style="list-style-type: none; padding-left: 0; margin-left: 0;">
                <li class="p-0 nav-item">
                    <a id="sidebar-berita"
                        class="nav-link {{ request()->is('admin/informasi/berita*') ? 'active' : '' }}"
                        href="{{ route('informasi.berita.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Berita</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/karya-ilmiah*') ? 'active' : '' }}"
                        href="{{ route('informasi.karyaIlmiah') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Karya Ilmiah</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/majalah*') ? 'active' : '' }}"
                        href="{{ route('informasi.majalah') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Majalah</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-galeri"
                        class="nav-link {{ request()->is('admin/informasi/galeri*') ? 'active' : '' }}"
                        href="{{ route('admin.informasi.galeri.foto.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Galeri</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/pengumuman*') ? 'active' : '' }}"
                        href="{{ route('admin.informasi.pengumuman.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Pengumuman</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/qna*') ? 'active' : '' }}"
                        href="{{ route('admin.informasi.qna.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> QnA</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/alumni*') ? 'active' : '' }}"
                        href="{{ route('informasi.alumni') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Alumni</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/loker*') ? 'active' : '' }}"
                        href="{{ route('admin.informasi.loker.index') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Lowongan kerja</span>
                    </a>
                </li>
                <li class="p-0 nav-item">
                    <a id="sidebar-sosmed"
                        class="nav-link {{ request()->is('admin/informasi/testimoni*') ? 'active' : '' }}"
                        href="{{ route('informasi.testimoni') }}">
                        <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                        <span> Testimoni</span>
                    </a>
                </li>
            </ul>
        </li>


        <li class="nav-item">
            <a id="sidebar-ekstrakurikuler"
                class="nav-link {{ request()->is('admin/ekstrakurikuler*') ? 'active' : '' }}"
                href="{{ route('ekstrakurikuler.index') }}">
                @if (request()->is('admin/ekstrakurikuler*'))
                    <img src="{{ asset('template3/image/icon/icon-ekskul-aktif.svg') }}" class="nav-icon"
                        alt="">
                @else
                    <img src="{{ asset('template2/images/bintang.png') }}" class="nav-icon" alt="">
                @endif
                <span class="sidebar-text">Ektrakurikuler</span>
            </a>
        </li>

        <li class="nav-item">
            <a id="sidebar-fasilitas"
                class="nav-link {{ request()->is('/admin/tentang/fasilitas*') ? 'active' : '' }}"
                href="{{ route('tentang_kami.fasilitas.index') }}">
                @if (request()->is('/admin/tentang/fasilitas*'))
                    <img src="{{ asset('template3/image/icon/icon-fas-aktif.svg') }}" class="nav-icon"
                        alt="">
                @else
                    <img src="{{ asset('template3/image/icon/icon-fasilitas.svg') }}" class="nav-icon"
                        alt="">
                @endif
                <span class="sidebar-text">Fasilitas</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a id="sidebar-fasilitas"
                class="nav-link {{ request()->is('admin/tentang/fasilitas*') ? 'active' : '' }}"
                href="{{ route('tentang_kami.fasilitas.index') }}">
                <img src="{{ asset('template2/images/drop.png') }}" class="nav-sub" alt="">
                <span>Fasilitas</span>
            </a>
        </li> --}}
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
        <div class="p-2 dropdown w-100 dropend">
            <a class="p-0 bg-transparent text-decoration-none dropdown-toggle d-flex align-items-center"
                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img id="user-foto" src="{{ asset('image/avatar.png') }}" class="admin-avatar" alt="avatar">
                <div>
                    <div class="text-white admin-title fw-700"><span
                            id="user-nama">{{ auth()->user()->name ?? '-' }}</span></div>
                    {{-- <span class="text-secondary admin-subtitle">{{ucfirst(auth()->user()->roles[0]->name ?? 'Pengguna belum memiliki role.')}}</span> --}}
                    <span class="text-secondary admin-subtitle">Administrator</span>
                </div>
                <img src="{{ asset('template3/image/icon/admin-arrow-right.svg') }}" class="" alt="avatar">
            </a>
            <ul class="dropdown-menu ">
                {{-- @include('layouts.level') --}}
                <li><a class="dropdown-item" href="{{ route('pengaturan.profile') }}"><img src="{{ asset('template3/image/icon/profil-black-cms.svg') }}" class="me-3" alt="">Profil</a></li>
                <li><a class="dropdown-item" href="#" id="logout-user"><img src="{{ asset('template3/image/icon/logout-cms.svg') }}" class="me-3" alt="">Logout</a></li>
            </ul>
        </div>
    </ul>
</div>
