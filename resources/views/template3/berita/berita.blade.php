@extends('components.navbar')

@section('title', 'Berita DIMSA')

@section('content')

    <div class="container d-flex justify-content-between align-items-center">
        <h1 class="pt-5 mt-5 display-6 fw-bold">Indeks Berita</h1>

        <div class="pt-5 mt-5 d-flex">
            <img src="{{ asset('template2/images/filter.svg') }}" alt="Filter Icon"
                style="border: solid 0.5px #D6D8DB; padding: 8.5px; border-radius: 5px 0 0 5px;">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownFilter"
                    data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 0 5px 5px 0;">
                    Semua Tanggal
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-5 mb-10 d-flex justify-content-between align-items-center">
        <ul class="nav">
            <li class="nav-item">
                <a class="border-2 nav-link active fw-bold text-dark border-bottom border-primary"
                    href="{{ route('berita.berita') }}">Berita</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-muted" href="{{ route('berita.karyailmiah') }}">Karya Ilmiah</a>
            </li>
        </ul>
    </div>

    <hr style="width: 85%; margin: 0 auto; border: 1px solid #000; ">

    <div class="container mt-5 mb-8">
        <div class="row">
            <div class="mr-5 col-md-9">
                @if ($berita->count())
                    @foreach ($berita as $news)
                        <div class="mb-4">
                            <a href="{{ route('berita.detail', ['id' => $news->id]) }}"
                                class="text-black text-decoration-none">
                                <div class="mb-3 d-flex">
                                    <img src="{{ $news->image_url ?? asset('template3/images/default-news.png') }}"
                                        alt="{{ $news->title }}" class="rounded"
                                        style="width: 150px; height: 100px; object-fit: cover;">
                                    <div class="ms-3 col-md-8">
                                        <h5 class="mb-1 fw-bold">{{ Str::limit($news->judul, 50) }}</h5>
                                        <p class="mb-0 text-muted" style="font-size: 14px;">
                                            {{ $news->sumber ?? 'Berita' }} •
                                            {{ $news->created_at->format('d F, Y') }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p class="mt-5 text-center">Belum ada berita yang tersedia.</p>
                @endif

                <hr style="width: 100%; margin: 0 auto; border: 1px solid #000; margin-bottom: 20px;">
                <!-- Pagination -->
                <nav aria-label="Page navigation example">
                    {{ $berita->links('pagination::bootstrap-4') }}
                </nav>
            </div>

            <div class="col-md-3 col-sm-12 d-flex flex-column">
                <div class="mb-4">
                    <a href="/majalah" class="text-decoration-none">
                        <div class="p-3 rounded bg-light position-relative"
                            style="height: 230px; display: flex; flex-direction: column; justify-content: center; align-items: start;">
                            <h5 class="text-black fw-bold">Ruang Literasi</h5>
                            <p class="text-black">Darul Ihsan Muhammadiyah Sragen</p>
                            <img src="{{ asset('template3/images/buku.svg') }}" alt="Book" class="position-absolute"
                                style="right: 10px; bottom: 10px; width: 50%; object-fit: contain;">
                        </div>
                    </a>
                </div>

                <div class="mb-4">
                    <div class="p-3 text-white rounded d-flex flex-column justify-content-between"
                        style="background-color: #F9A825; height: 230px;">
                        <img src="{{ asset('template3/images/lazismu.svg') }}" alt="Lazismu Logo"
                            style="width: 25%; margin-bottom: 10px;">
                        <h5 class="text-black fw-bold">Salurkan Harta Terbaikmu, Raih Berkah Ilahi.</h5>
                        <a href="#" class="mt-2 btn btn-dark fw-bold" style="font-size: 15px;">Donasi Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
