@extends('components.navbar')

@section('style1_content')
<style>
    .hijau {
        background-color: rgba(60, 123, 70, 1) !important;
        color: #fff !important;
    }
</style>

<section id="detail-berita">
    <div class="container">
        <!-- Kembali Button -->
        <a href="{{ url()->previous() }}"
            class="text-decoration-none mb-4 d-flex align-items-center kembali-btn text-dark"
            style="font-weight: 600; font-size: 18px;">
            <span class="me-2 pb-2">👈</span>Kembali
        </a>

        <!-- Gambar dan Arsip -->

        <div class="row d-flex justify-content-between">
            <div class="col-lg-8 col-md-9 mb-4 mb-md-0">
                <h1 class="detail-berita-title mb-3">{{ $berita->judul }}</h1>
                <p class="detail-berita-admin-date mb-4">{{ $berita->sumber }} • {{ formatTime($berita->date, 'd F Y') }}</p>
                <img src="{{ $berita->image_url }}" class="detail-berita-img img-fluid rounded-3 mb-4" alt="{{ $berita->judul }}">
                <p class="detail-berita-text">{!! $berita->isi !!}</p>
            </div>

            <!-- Arsip Section -->
            <div class="col-lg-3 col-md-3 arsip-section">
                <h4 class="fw-bold mb-3">Arsip</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none" style="color : #182856;">
                            2023
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="text-decoration-none" style="color : #182856;">
                            2024
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection
