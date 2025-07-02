{{-- @extends('components.navbar')

@section('title', 'Galeri DIMSA')

@section('content')

<div class="container mt-5 pt-5">
    <h3 class="fw-bold mb-4 mt-5 ">Galeri</h3>
    <ul class="nav justify-content-start mb-5">
        <li class="nav-item">
            <a class="nav-link text-secondary fw-medium" href="{{ route('berita.galerifoto') }}">Foto Kegiatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active text-black fw-bold" href="{{ route('berita.galerivideo') }}">Video</a>
        </li>
    </ul>
    <div class="row gallery justify-content-center mb-2">
        <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex align-items-stretch">
            <a href="https://youtu.be/U25Nbeyfn8A?si=bMTTribff3faW8D9" data-fancybox="video-gallery" data-caption="Video 1" style="width: 100%; overflow: hidden; height: 250px;">
                <img src="{{ asset('template3/images/thumbnail.jpeg') }}" alt="Video 1" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex align-items-stretch">
            <a href="https://youtu.be/K3IqwvX2-Dk" data-fancybox="video-gallery" data-caption="Video 2" style="width: 100%; overflow: hidden; height: 250px;">
                <img src="{{ asset('template3/images/thumbnail1.png') }}" alt="Video 2" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
            </a>
        </div>
        <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex align-items-stretch">
            <a href="https://youtu.be/K3IqwvX2-Dk" data-fancybox="video-gallery" data-caption="Video 3" style="width: 100%; overflow: hidden; height: 250px;">
                <img src="{{ asset('template3/images/thumbnail.jpeg') }}" alt="Video 3" class="img-fluid rounded" style="width: 100%; height: 100%; object-fit: cover;">
            </a>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination mb-5">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous" style="border: none; background-color: transparent;">
                    <span aria-hidden="true" style="border: 1px solid black; font-size: 14px; padding: 1px 7px; border-radius: 50px;">&lt;</span>
                </a>
            </li>
            <li class="page-item active">
                <a class="page-link" href="#" style="background-color: #0065FF; border-color: #0065FF; color: white; border-radius: 8px;">1</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: black; border: none; margin: 0 2px;">2</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: black; border: none; margin: 0 2px;">3</a>
            </li>
            <li class="page-item disabled">
                <span class="page-link" style="background-color: transparent; color: #999; border: none; pointer-events: none;">...</span>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" style="color: black; border: none; margin: 0 2px;">10</a>
            </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next" style="border: none; background-color: transparent;">
                    <span aria-hidden="true" style="border: 1px solid black; font-size: 14px; padding: 1px 7px; border-radius: 50px;">&gt;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>

@include('components.footer')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        Fancybox.bind('[data-fancybox="video-gallery"]', {
            Toolbar: {
                display: [
                    "close",
                ],
            },
            Carousel: {
                infinite: false,
            },
            Video: {
                autoplay: true
            }
        });
    });
</script>

@endsection --}}

@extends('components.navbar')

@section('title', 'Galeri DIMSA')

@section('content')

    <div class="container mt-5 pt-5">
        <h3 class="fw-bold mb-4 mt-5">Galeri</h3>
        <ul class="nav justify-content-start mb-5">
            <li class="nav-item">
                <a class="nav-link text-secondary fw-medium" href="{{ route('berita.galerifoto') }}">Foto Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-black fw-bold" href="{{ route('berita.galerivideo') }}">Video</a>
            </li>
        </ul>
        <div class="row gallery justify-content-center mb-2">
            @foreach ($galeryVideo as $video)
                <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex align-items-stretch">
                    <a href="{{ $video->video_link }}" data-fancybox="video-gallery" data-caption="{{ $video->judul }}"
                        style="width: 100%; overflow: hidden; height: 250px;">
                        <img src="{{ asset($video->youtubeThumbnail ?? 'template3/images/thumbnail.jpeg') }}"
                            alt="{{ $video->judul }}" class="img-fluid rounded"
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </a>
                </div>
            @endforeach
        </div>

        <nav aria-label="Page navigation">
            <ul class="pagination mb-5">
                {{ $galeryVideo->links() }}
            </ul>
        </nav>
    </div>

    @include('components.footer')

    <!-- Fancybox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Fancybox.bind('[data-fancybox="video-gallery"]', {
                Toolbar: {
                    display: [
                        "close",
                    ],
                },
                Carousel: {
                    infinite: false,
                },
                Video: {
                    autoplay: true
                }
            });
        });
    </script>

@endsection
