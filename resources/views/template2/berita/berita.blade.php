@extends('components.navbar')

@section('style1_content')
<section id="berita">
    <div class="container mt-5 ">

        <!-- navbar page berita -->
        <div class="mb-5 text-center text-md-start d-flex justify-content-between align-items-center" id="header-berita">
            <div class="mb-3 mb-md-0">
                <h1 class="mb-0 fw-bold warta-berita-title">Warta Berita</h1>
            </div>
            <!-- Kategori Filter -->
            <div
                class="flex-wrap p-2 border d-flex flex-column flex-md-row justify-content-center justify-content-md-end rounded-4 px-md-2 berita-nav-container">
                <div class="nav-scroll-container">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active fw-700" id="pills-semua-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-semua" type="button" role="tab" aria-controls="pills-semua"
                                aria-selected="true"><a href="{{ route('darun_najah.berita') }}">Semua</a></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-700 text-dark" id="pills-kabarsekolah-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-kabarsekolah" type="button" role="tab"
                                aria-controls="pills-kabarsekolah" aria-selected="false"><a
                                    href="{{ route('darun_najah.berita.kabarsekolah') }}">Kabar Sekolah</a></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-700 text-dark" id="pills-prestasi-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-prestasi" type="button" role="tab"
                                aria-controls="pills-prestasi" aria-selected="false"><a
                                    href="{{ route('darun_najah.berita.prestasi') }}">Prestasi</a></button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fw-700 text-dark" id="pills-artikel-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-artikel" type="button" role="tab"
                                aria-controls="pills-artikel" aria-selected="false"><a
                                    href="{{ route('darun_najah.berita.artikel') }}">Artikel</a></button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Navbar page berita end -->

        <!-- Banner Berita Utama -->
        @if (count($headline) > 0)
            <div class="mb-5 row">
                <div class="col-12 position-relative">
                    <img src="{{ $headline[0]->image_url }}" alt="{{ $headline[0]->title }}"
                        class="banner-img rounded-3 img-fluid">
                    <!-- Teks di atas gambar -->
                    <div class="p-4 banner-text position-absolute text-dark">
                        {!! $headline[0]->kategoriBerita?->judul
                            ? '<span class="badge bg-kabar">' . $headline[0]->kategoriBerita?->judul . '</span>'
                            : '' !!}
                        <h2 class="my-4 banner-text-title">
                            <a href="{{ route('darun_najah.berita.detail', ['id' => enkripString($headline[0]->id), 'slug' => toSlug($headline[0]->judul)]) }}"
                                class="text-dark text-decoration-none fw-bold">
                                {{ $headline[0]->judul }}
                            </a>
                        </h2>
                        <p class="admin-date">{{ $headline[0]->sumber }} •
                            {{ formatTime($headline[0]->tanggal, 'd F Y') }}</p>
                    </div>
                </div>
            </div>
        @endif


        @if (count($headline) > 1)
            <!-- Berita Terkini -->
            <div class="row">
                @foreach ($headline->skip(1) as $h)
                    <div class="mb-3 col-lg-6 col-md-12 mb-md-4">
                        <a href="{{ route('darun_najah.berita.detail', ['id' => enkripString($h->id), 'slug' => toSlug($h->judul)]) }}"
                            class="card news-card text-decoration-none">
                            <div class="row g-0 d-flex align-items-center">
                                <div class="col-lg-6 col-md-4">
                                    <img src="{{ $h->image_url }}" class="img-fluid news-card-img"
                                        alt="{{ $h->judul }}">
                                </div>
                                <div class="px-3 pb-3 col-lg-6 col-md-8 pb-md-0">
                                    <div class="p-0 card-body">
                                        {!! $h->kategoriBerita?->judul ? '<span class="badge bg-kabar">' . $h->kategoriBerita->judul . '</span>' : '' !!}
                                        <h5 class="mt-2 card-title">
                                            <span
                                                class="berita-title-text text-dark text-decoration-none">{{ $h->judul }}</span>
                                        </h5>
                                        <p class="admin-date ">{{ $h->sumber }} •
                                            {{ formatTime($h->tanggal, 'd F Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif

        @if (count($berita) > 0)
            <hr style="margin-bottom: 40px; font-weight:bold;">

            <!-- Berita Lainnya -->
            <h3 class="mb-4"><strong>Berita Lainnya</strong></h3>
            <div class="row berita-lainnya-container">
                @foreach ($berita as $b)
                    <a href="{{ route('darun_najah.berita.detail', ['id' => enkripString($b->id), 'slug' => toSlug($b->judul)]) }}"
                        class="col-lg-4 col-md-6 col-12 text-decoration-none">
                        <div class="border-0 card news-card">
                            <img src="{{ $b->image_url }}" class="card-img-top" alt="{{ $b->judul }}">
                            <div class="p-3 py-0 d-flex flex-column justify-content-center py-md-3">
                                <div class="px-0 py-0 card-body py-md-2">
                                    {!! $b->kategoriBerita?->judul ? '<span class="badge bg-kabar">' . $b->kategoriBerita->judul . '</span>' : '' !!}
                                    <h5 class="my-3 card-title card-news-lainnya-title text-bold">
                                        {{ $b->judul }}
                                    </h5>
                                    <p class="m-0 admin-date">{{ $b->sumber }} •
                                        {{ formatTime($b->tanggal, 'd F Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</section>
@endsection
