@extends('components.navbar')

@section('title', 'Pengumuman')

@section('content')
    <section class="text-white bg-dark d-flex align-items-center"
        style="background-image: url('{{ asset('template3/images/bgpengumuman.jpeg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container">
            <h1 class="mt-5 display-6 fw-bold">Pengumuman</h1>
        </div>
    </section>
    <div class="container mt-5 mb-5">
        <div class="row">

            @if ($pengumumans->count())
                @foreach ($pengumumans as $pengumuman)
                    <div class="mb-4 col-md-4">
                        <div class="border-0 card h-100">
                            <div class="card-body">
                                <p class="mb-2 text-black">
                                    {{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d F • Y') }}
                                <h5 class="card-title fw-bold">{{ $pengumuman->judul }}</h5>
                                <div class="flex download">
                                    <a href="{{ $pengumuman->url }}"
                                        class="mt-3 text-decoration-none fw-semibold text-success">
                                        Unduh Dokumen
                                    </a>
                                    <img src="{{ asset('template3/images/download.svg') }}" alt="Image 8"
                                        class="m-2 rounded img-fluid">
                                    <img src="{{ asset('template3/images/share.svg') }}" alt="Image 8"
                                        class="m-2 rounded img-fluid btn btn-white" style="border:solid 0.5px #12B76A;">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="mt-5 text-center">Belum ada pengumuman yang tersedia.</p>
            @endif
        </div>
        <nav aria-label="Page navigation">
            {{ $pengumumans->links('pagination::bootstrap-4') }}
        </nav>
    </div>
    @include('components.footer')

@endsection
