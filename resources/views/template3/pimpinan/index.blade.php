@extends('components.navbar')

@section('title', $section == 'pimpinan' ? 'Pimpinan Pondok' : ($section == 'dewan-pengasuh' ? 'Dewan Pengasuh' : 'Guru & Staff'))

@section('content')

    <!-- Header Section -->
    <section class="d-flex align-items-center text-left text-white bg-dark"
        style="background-image: url('{{ asset('template3/images/bgpimpinan.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
        <div class="container mt-5">
            <h1 class="display-6 fw-bold mt-5">
                {{ $section == 'pimpinan' ? 'Pimpinan Pondok' : ($section == 'dewan-pengasuh' ? 'Dewan Pengasuh' : 'Guru & Staff') }}
            </h1>
        </div>
    </section>

    <!-- Tab Navigation -->
    <div class="container mt-4">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link text-black {{ $section == 'pimpinan' ? 'active fw-bold' : '' }}" href="{{ url('/pimpinan') }}">Pimpinan Pondok</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black {{ $section == 'dewan-pengasuh' ? 'active fw-bold' : '' }}" href="{{ url('/dewan-pengasuh') }}">Dewan Pengasuh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-black {{ $section == 'guru-staff' ? 'active fw-bold' : '' }}" href="{{ url('/guru-staff') }}">Guru & Staff</a>
            </li>
        </ul>
        <hr>
    </div>

    <!-- Main Section -->
    <section class="container" style="margin-top: -50px;">
        <div class="row">
            @if($section == 'pimpinan')
                @include('pimpinan.data-pimpinan')
            @elseif($section == 'dewan-pengasuh')
                @include('pimpinan.data-pengasuh')
            @elseif($section == 'guru-staff')
                @include('pimpinan.data-guru')
            @endif
        </div>
    </section>

@endsection
