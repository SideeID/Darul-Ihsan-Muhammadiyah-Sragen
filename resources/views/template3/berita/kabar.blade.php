@extends('components.navbar')

@section('title', 'Kabar DIMSA')

@section('content')

    <section class="bg-dark text-white d-flex align-items-center"
        style="background-image: url('{{ asset('template3/images/jumboberita.jpeg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container">
            <h1 class="display-6 fw-bold mt-5">DIMSA dalam <br> Berita</h1>
        </div>
    </section>

    <div class="container mt-5 mb-5">
        <h2 class="mb-4 fw-bold">Kabar Terkini</h2>
        <div class="row">
            <div class="col-md-8 mb-4">
                @foreach ($berita as $news)
                    <div class="mb-3">
                        <a href="{{ route('berita.detail', ['id' => $news->id]) }}" class="text-decoration-none text-black">
                            <img src="{{ asset($news->image_url) }}" class="card-img-top rounded" alt="News Image"
                                style="width: 100%; height: auto;">
                            <div class="card-body">
                                <p class="mt-3 text-black" style="font-size: 15px;">{{ $news->kategori }} •
                                    {{ \Carbon\Carbon::parse($news->tanggal)->format('d M, Y') }}</p>
                                <h3 class="card-title fw-bold">{{ Str::limit($news->judul, 130) }}</h3>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="col-md-4">
                <div class="list">
                    @foreach ($recentNews as $news)
                        <a href="{{ route('berita.detail', ['id' => $news->id]) }}"
                            class="list-group-item list-group-item-action mb-5">
                            <div class="d-flex w-100">
                                <img src="{{ asset($news->image_url) }}" alt="Recent News" class="me-3"
                                    style="width: 120px; height: 80px; object-fit: cover; border-radius: 5px;">
                                <div>
                                    <p class="mb-1 small text-black">{{ $news->kategori }} •
                                        {{ \Carbon\Carbon::parse($news->tanggal)->format('d M, Y') }}</p>
                                    <h5 class="mb-1 fw-bold" style="font-size: 16px;">{{ Str::limit($news->judul, 50) }}
                                    </h5>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <hr style="width: 85%; margin: 0 auto;">

    <div class="container mt-5 mb-5">
        <h5 class="mb-4 fw-bold">Berita Lainnya</h5>
        <div class="row">
            @foreach ($otherNews as $news)
                <div class="col-md-4">
                    <div class="card mb-4 border-0">
                        <img src="{{ asset($news->image_url) }}" class="card-img-top" alt="Other News"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ Str::limit($news->judul, 100) }}</h5>
                            <p class="text-black">{{ $news->kategori }} •
                                {{ \Carbon\Carbon::parse($news->tanggal)->format('d M, Y') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container text-center mt-5 mb-5">
        <a href="{{ route('berita.berita') }}" class="text-decoration-none">
            <button class="btn fw-semibold" style="background-color: #F2F4F7;">Lihat Semua</button>
        </a>
    </div>

    <hr style="width: 85%; margin: 0 auto;">

    <div class="container mt-5 mb-5">
        <h5 class="mb-4 fw-bold">Karya Ilmiah</h5>
        <div class="row">
            @foreach ($academicWorks as $work)
                <div class="col-md-3">
                    <div class="card mb-4 border-0">
                        <img src="{{ asset($work->image_url) }}" class="card-img-top" alt="Karya Ilmiah"
                            style="height: 300px; object-fit: cover;">
                        <div class="card-body px-0">
                            <h5 class="card-title fw-bold">{{ Str::limit($work->judul, 50) }}</h5>
                            <p class="text-secondary">{{ $work->penulis }} •
                                {{ \Carbon\Carbon::parse($work->tanggal)->format('d M, Y') }}</p>
                            <a href="{{ $work->url }}" class="btn align-items-center justify-content-center"
                                style="color:#182856; background-color:#E6E6E8;">
                                <img src="{{ asset('template3/images/docdownload.svg') }}" alt="Download Icon"
                                    class="img-fluid me-2" style="width: 20px;">
                                Unduh File
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container text-center mt-5 mb-5">
        <a href="{{ route('berita.karyailmiah') }}" class="text-decoration-none"><button class="btn fw-semibold"
                style="background-color: #F2F4F7;">Lihat Semua</button></a>
    </div>

    @include('components.footer')

@endsection
