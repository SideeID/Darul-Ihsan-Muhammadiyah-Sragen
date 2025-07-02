@extends('profil.main')

@section('content')
    <div class="container-fluid">
        <main class="container">
            <div class="content-profil">
                <div class="dewan-guru">
                    <div class="mt-4 row align-items-end">
                        <h2 class="fw-bold text-dark" style="font-size: 36px;">
                            Dewan Guru
                        </h2>

                        @foreach ($guru as $item)
                            <div class="my-3 col-md-4 col-6 col-guru">
                                <div class="card-guru position-relative">
                                    <a href="{{ route('detail-dewan-guru', $item->id) }}">
                                        <img src="{{ $item->image_url }}" class="card-img-top" alt="card-grid-image">
                                        <div class="bottom-0 overlay position-absolute start-0 end-0 w-100">
                                            <div class="bottom-0 p-2 position-absolute start-0">
                                                <h5 class="mb-0 fw-bolder text-light" style="font-size:12px">{{ $item->nama }}</h5>
                                                <p class="mt-0 small text-light">{{ $item->jabatan }}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="pagination">
                        <div class="container mt-2">
                            <div class="row">
                                <hr>
                                <div class="col-md-6 col-12">
                                    <a href="{{ route('core-value') }}" class="text-start text-decoration-none w-100 d-flex">
                                        <img src="{{ asset('template2/img/arrow-left.svg') }}" alt=""><span class="text-dark">Sebelumnya</span>
                                    </a>
                                    <h3 class="mt-2 fw-bold fs-4">Core Value</h3>
                                </div>
                                <div class="mt-5 col-md-6 col-12 mt-md-0">
                                    <a href="{{ route('struktur-organisasi') }}" class="text-start text-decoration-none w-100 d-flex">
                                        <span class="text-dark">Berikutnya</span>
                                        <img src="{{ asset('template2/img/arrow-right.svg') }}" alt="">
                                    </a>
                                    <h3 class="mt-2 fw-bold fs-4">Struktur Organisasi</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <style>
        .col-guru .card-guru:hover {
            transition: transform 0.5s ease;
            transform: translateY(-2px);
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }

        .col-guru .overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0));
            opacity: 0;
            transition: opacity 0.4s ease;
            height: 50%;
            bottom: 0;
            width: 100%;
        }

        .col-guru .card-guru:hover .overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
            opacity: 1;
            border-radius: 8px;
        }
    </style>
@endsection
