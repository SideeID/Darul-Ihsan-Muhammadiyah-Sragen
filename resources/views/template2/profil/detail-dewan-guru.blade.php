@extends('profil.main')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="detail-guru content-profil">
            <div class="mt-4 header-detguru row d-flex justify-content-between align-items-center">
                <div class="col-md-6 col-12">
                    <a href="{{ route('dewan-guru') }}" class="text-start text-decoration-none w-100">
                        <img src="{{ asset('template2/img/left-detail.svg') }}" alt=""><span
                            class="card-guru fw-normal ms-2" style="font-size:14px; color:#182856;">Kembali</span>
                    </a>
                </div>
                <div class="mt-4 col-md-6 col-12 mt-md-0 d-md-flex justify-content-end d-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb d-flex">
                            <li class="breadcrumb-item" style="font-size:14px;"><a href="{{ route('dewan-guru') }}"
                                    style="text-decoration:none; color:#898FA0;">Dewan Guru</a></li>
                            <li class="breadcrumb-item active" style="font-size:14px; color:#3C7B46;" aria-current="page">
                                Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="mt-4 row">
                <div class="col-md-3 col-12">
                    <div class="mb-4 card-guru card-detail-guru position-relative mb-md-0">
                        <img src="{{ $guru->image_url }}" class="card-img-top" alt="{{ $guru->nama }}">
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    <div class="content-isi ms-md-4 ms-0">
                        <h3 class="mb-4 fw-bold">{{ $guru->nama }}</h3>
                    </div>
                    <!-- Setiap row untuk satu label dan satu konten -->
                    <div class="content-isi2 ms-md-4 ms-0">
                        <div class="mb-3 row">
                            <div class="col-md-4 fw-bold" style="color:#182856;">
                                <p class="m-0">Jabatan</p>
                            </div>
                            <div class="col-md-8 ms-0" style="color:#080E1E; line-height:30px;">
                                <p>{{ $guru->jabatan }}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4 fw-bold" style="color:#182856;">
                                <p class="m-0">Riwayat Pendidikan</p>
                            </div>
                            <div class="col-md-8 ms-0" style="color:#080E1E; line-height:30px;">
                                <p>{!! nl2br(e($guru->riwayat_pendidikan)) !!}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4 fw-bold" style="color:#182856;">
                                <p class="m-0">Pengalaman</p>
                            </div>
                            <div class="col-md-8 ms-0" style="color:#080E1E; line-height:30px;">
                                <p>{!! nl2br(e($guru->pengalaman)) !!}</p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-4 fw-bold" style="color:#182856;">
                                <p class="m-0">Prestasi</p>
                            </div>
                            <div class="col-md-8 ms-0" style="color:#080E1E; line-height:30px;">
                                <p>{!! nl2br(e($guru->prestasi)) !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
