@extends('profil.main')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="content-profil">
            <div class="row-logojudul">
                <h2 class="judul fw-bold">
                    Logo
                </h2>
            </div>
            <div class="row row-logo">
                <div class="col-md-6 col-12">
                    <h5>Logo Full</h5>
                    <img src="{{ asset('template2/img/Container.png') }}" alt="Logo" class="my-3">
                    <div class="col">
                        <button class="logo-unduh-btn"><img src="{{ asset('template2/img/document-download.png') }}"
                                class="unduh" alt="unduh">Unduh file gambar</button>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-md-0 mt-5">
                    <h5>Logogram</h5>
                    <img src="{{ asset('template2/img/logo-darun.png') }}" alt="Logogram" class="my-3">
                    <div class="col">
                        <button class="logo-unduh-btn"><img src="{{ asset('template2/img/document-download.png') }}"
                                class="unduh" alt="unduh">Unduh
                            file gambar</button>
                    </div>
                </div>
            </div>

            {{-- button next page --}}
            <div class="nextpage2">
                <hr>
                <div class="row-next row">
                    <div class="col-md-6 col-12">
                        <a href="{{ route('struktur-organisasi') }}" class="next-a"><img
                                src="{{ asset('template2/img/arrow-left.png') }}" alt=""> Sebelumnya</a>
                    </div>
                    <div class="col-md-6 col-12 mt-md-0 mt-3">
                        <h3 class="fw-bold">Struktur Organisasi</h3>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
