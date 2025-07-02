@extends('components.navbar')

@section('style1_content')
<section id="kabar-sekolah">
    <div class="container mt-5">

        <!-- navbar page berita -->
        <div class="mb-5 text-center text-md-start d-flex justify-content-between align-items-center" id="header-berita">
            <div class="mb-3 mb-md-0">
                <h1 class="mb-0 fw-bold warta-berita-title">Artikel</h1>
            </div>
            <!-- Kategori Filter -->
            <div
                class="flex-wrap p-2 border d-flex flex-column flex-md-row justify-content-center justify-content-md-end rounded-4 px-md-2 berita-nav-container">
                <div class="nav-scroll-container">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-700" id="pills-semua-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-semua" type="button" role="tab" aria-controls="pills-semua"
                                aria-selected="true">
                                <a href="{{ route('darun_najah.berita') }}">Semua</a>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-700 text-dark" id="pills-kabarsekolah-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-kabarsekolah" type="button" role="tab"
                                aria-controls="pills-kabarsekolah" aria-selected="false">
                                <a href="{{ route('darun_najah.berita.kabarsekolah') }}">Kabar Sekolah</a>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-700 text-dark" id="pills-prestasi-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-prestasi" type="button" role="tab"
                                aria-controls="pills-prestasi" aria-selected="false">
                                <a href="{{ route('darun_najah.berita.prestasi') }}">Prestasi</a>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-700 text-dark" id="pills-artikel-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-artikel" type="button" role="tab"
                                aria-controls="pills-artikel" aria-selected="false">
                                <a href="{{ route('darun_najah.berita.artikel') }}">Artikel</a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Navbar page berita end -->

        <!-- Daftar Berita dan Arsip Section -->
        <div class="pt-3 row justify-content-between kabar-arsip-container">
            <!-- Daftar Berita -->
            <div class="col-lg-8 col-md-9 kabar-berita-news-card-container">
                @if (count($berita) > 0)
                    @foreach ($berita as $b)
                        <div class="mb-4 news-card">
                            <div class="row g-0 d-flex align-items-center">
                                <div class="col-md-4 ">
                                    <img src="{{ $b->image_url }}" class="rounded img-fluid" alt="{{ $b->judul }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <p class="admin-date"></p>{{ $b->sumber }} •
                                        {{ formatTime($b->tanggal, 'd F Y') }}</p>
                                        <h5 class="kabar-sekolah-card-title fw-bold">{{ $b->judul }}</h5>
                                        <p class="kabar-sekolah-card-excerpt">{{ Str::limit($b->konten, 100) }}</p>
                                        <a href="{{ route('darun_najah.berita.detail', ['id' => enkripString($b->id), 'slug' => toSlug($b->judul)]) }}"
                                            class="btn kabar-btn-lanjutbaca"
                                            style="outline-color: rgba(24, 40, 86, 1);">
                                            Lanjut Membaca
                                            <img src="{{ asset('template2/assets/image/icon-arrow-right-kabar.svg') }}"
                                                alt="" style="width: 24px; height: 24px; margin-left: 15px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Tidak ada berita terkait Artikel.</p>
                @endif
            </div>

            <!-- Arsip Section -->
            <div class="col-lg-3 col-md-3 arsip-section">
                <h4 class="mb-3 fw-bold">Arsip</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none" style="color : #182856;">
                            2022
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none" style="color : #182856;">
                            2023
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
