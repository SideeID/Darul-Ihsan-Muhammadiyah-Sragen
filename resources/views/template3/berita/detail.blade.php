@extends('components.navbar')

@section('title', $berita['title'])

@section('content')

    <div class="container mb-5" style="margin-top: 150px;">
        <a href="{{ url()->previous() }}" class="text-decoration-none fw-semibold" style="color: #153B86;"><img src="{{ asset('template3/images/back.png') }}" > Kembali</a>

        <div class="my-4">
            <img src="{{ asset($berita['image']) }}" class="img-fluid w-100 rounded" alt="Detail News">
        </div>
        <div class="isi mx-5 mt-5">
        <h2 class="fw-bold mx-5">{{ $berita['title'] }}</h2>
        <p class="text-muted mx-5">{{ $berita['author'] }} • {{ $berita['date'] }}</p>


        <div class="mb-4 mx-5">
            <span>Bagikan ini</span> <br>
            <a href="#" class="text-decoration-none"><img src="{{ asset('template3/images/fb.png') }}" alt="Facebook"></a>
            <a href="#" class="text-decoration-none"><img src="{{ asset('template3/images/ig.png') }}" alt="Instagram"></a>
            <a href="#" class="text-decoration-none"><img src="{{ asset('template3/images/wa.png') }}" alt="WhatsApp"></a>
        </div>

        <div class="content mx-5">
            <p>{{ $berita['content'] }}</p>
        </div>
    </div>
    </div>

    @include('components.footer')

@endsection
