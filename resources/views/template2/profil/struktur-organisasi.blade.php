@extends('profil.main')

@section('content')
    <div class="container-fluid">
        <main class="container">
            <div class="content-profil">
                <!-- START DATA -->
                <div class="struktur">
                    <div class="row align-items-end mt-4">
                        <h2 class="fw-bold text-dark mb-5 profil-struktur-title" style="font-size: 36px;">
                            Struktur Organisasi
                        </h2>
                        <img src="{{ asset('template2/img/organisasi.png') }}" />
                    </div>
                </div>
                <div class="pagination">
                    <div class="container mt-2">
                        <div class="row">
                            <hr>
                            <div class="col-md-6 col-12">
                                <a href="{{ route('dewan-guru') }}" class="text-start text-decoration-none w-100 d-flex">
                                    <img src="{{ asset('template2/img/arrow-left.svg') }}" alt=""><span
                                        class="text-dark">Sebelumnya</span>
                                </a>
                                <h3 class="fw-bold fs-4 mt-2">Dewan Guru</h3>
                            </div>
                            <div class="col-md-6 col-12 mt-5 mt-md-0">
                                <a href="{{ route('logo') }}" class="text-start text-decoration-none w-100 d-flex">
                                    <span class="text-dark">Berikutnya</span>
                                    <img src="{{ asset('template2/img/arrow-right.svg') }}" alt="">
                                </a>
                                <h3 class="fw-bold fs-4 mt-2">Logo</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <style>
        @media (min-width: 320px) and (max-width: 767px) {
            .profil-struktur-title {
                font-size: 28px !important;
            }
        }
    </style>
@endsection
