{{-- @extends('components.navbar')

@section('title', 'Galeri DIMSA')

@section('content')

<div class="container mt-5 pt-5">
    <h3 class="fw-bold mb-4 mt-5">Galeri</h3>
    <ul class="nav justify-content-start mb-5">
        <li class="nav-item">
            <a class="nav-link active text-black fw-bold" href="{{ route('berita.galerifoto') }}">Foto Kegiatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-secondary fw-medium" href="{{ route('berita.galerivideo') }}">Video</a>
        </li>
    </ul>
    <div class="tab-content mb-2">
        <div class="tab-pane fade show active" id="foto">
            <div class="row gallery justify-content-center">
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri1.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri1.svg') }}" alt="Image 1" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri2.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri2.svg') }}" alt="Image 2" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri3.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri3.svg') }}" alt="Image 3" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri4.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri4.svg') }}" alt="Image 4" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri5.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri5.svg') }}" alt="Image 5" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri6.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri6.svg') }}" alt="Image 6" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri7.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri7.svg') }}" alt="Image 7" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
                <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                    <a data-fancybox="gallery" href="{{ asset('template2/assets/image/img-galeri8.svg') }}">
                        <img src="{{ asset('template2/assets/image/img-galeri8.svg') }}" alt="Image 8" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                    </a>
                </div>
            </div>
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
                <a class="page-link" href="#" style="background-color: #007bff; border-color: #007bff; color: white; border-radius: 8px;">1</a>
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

@endsection --}}


@extends('components.navbar')

@section('title', 'Galeri DIMSA')

@section('content')

<div class="container mt-5 pt-5">
    <h3 class="fw-bold mb-4 mt-5">Galeri</h3>
    <ul class="nav justify-content-start mb-5">
        <li class="nav-item">
            <a class="nav-link active text-black fw-bold" href="{{ route('berita.galerifoto') }}">Foto Kegiatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-secondary fw-medium" href="{{ route('berita.galerivideo') }}">Video</a>
        </li>
    </ul>
    <div class="tab-content mb-2">
        <div class="tab-pane fade show active" id="foto">
            <div class="row gallery justify-content-center">
                @foreach($galeryFoto as $gallery)
                    @if($gallery->files->isNotEmpty())
                        <div class="col-md-3 col-sm-6 col-12 mb-4" style="overflow: hidden;">
                            <!-- Thumbnail (gambar index 0) -->
                            <a data-fancybox="gallery-{{ $gallery->id }}" href="{{ asset($gallery->files->first()->file) }}">
                                <img src="{{ asset($gallery->files->first()->file) }}" alt="{{ $gallery->judul }}" style="width: 100%; height: 180px; object-fit: cover; border-radius: 8px;">
                            </a>
                            <!-- Fancybox additional images -->
                            @foreach($gallery->files->skip(1) as $file)
                                <a data-fancybox="gallery-{{ $gallery->id }}" href="{{ asset($file->file) }}" style="display: none;">
                                    <img src="{{ asset($file->file) }}" alt="Additional Image">
                                </a>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination mb-5">
            {{ $galeryFoto->links() }}
        </ul>
    </nav>
</div>

@include('components.footer')

@endsection
