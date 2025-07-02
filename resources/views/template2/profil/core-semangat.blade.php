@extends('profil.main')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="content-profil">
            <div class="row-core-container">
                <div class="row-core">
                    <h2 class="judul fw-bold core-title">
                        Our Core Value
                    </h2>
                </div>
                <div class="nav-core-container">
                    <div class="navcore">
                        <div class="nav-isi {{ request()->routeIs('core-value') ? 'active' : '' }}">
                            <a href="{{ route('core-value') }}" class="nav-isi-text">Qudwah</a>
                        </div>
                        <div class="nav-isi {{ request()->routeIs('core-inovatif') ? 'active' : '' }}">
                            <a href="{{ route('core-inovatif') }}" class="nav-isi-text">Inovatif, Kreatif & Produktif</a>
                        </div>
                        <div class="nav-isi {{ request()->routeIs('core-semangat') ? 'active' : '' }}">
                            <a href="{{ route('core-semangat') }}" class="nav-isi-text">Semangat Prestasi</a>
                        </div>
                        <div class="nav-isi {{ request()->routeIs('core-bermartabat') ? 'active' : '' }}">
                            <a href="{{ route('core-bermartabat') }}" class="nav-isi-text">Bermartabat</a>
                        </div>
                        <div class="nav-isi {{ request()->routeIs('core-berwawasan') ? 'active' : '' }}">
                            <a href="{{ route('core-berwawasan') }}" class="nav-isi-text">Berwawasan Global</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row-qudwah">
                <h4 class="fw-bold">Semangat Prestasi</h4>
                <p>Di SMP Darun Najah 2 Karangploso, Semangat Prestasi menjadi nilai yang sangat ditekankan kepada
                    setiap santri. Kami percaya bahwa prestasi tidak hanya dinilai dari hasil akademis, tetapi juga
                    dari bagaimana santri mengembangkan diri dan karakternya. Melalui program unggulan seperti Tahfidz
                    Qur'an, pembelajaran bilingual, dan berbagai kegiatan ekstrakurikuler, santri kami didorong untuk
                    terus berusaha meraih prestasi di berbagai bidang. Kompetisi yang sehat dan bimbingan yang berkelanjutan
                    membantu mereka mencapai potensi terbaik, baik di tingkat lokal maupun nasional.</p>
                <p>Kami tidak hanya mengajarkan santri untuk berprestasi secara individu, tetapi juga untuk membawa nama baik
                    sekolah serta berkontribusi positif kepada masyarakat. Dengan semangat ini, santri diharapkan tumbuh
                    menjadi individu yang berdaya saing tinggi, memiliki integritas, dan mampu menjadi pemimpin masa depan
                    yang bermoral baik serta berkontribusi pada pembangunan bangsa.</p>
            </div>

            <div class="nextpage1">
                <hr>
                <div class="row-next1 row">
                    <div class="col-md-6 col-12">
                        <a href="{{ route('tentang-kami') }}" class="next-a">
                            <img src="{{ asset('template2/img/arrow-left.png') }}" alt="">Sebelumnya
                            <h4 class="next-h">Tentang Kami</h4>
                        </a>
                    </div>
                    <div class="col-md-6 col-12 mt-5 mt-sm-0">
                        <a href="{{ route('dewan-guru') }}" class="next-a">
                            Berikutnya <img src="{{ asset('template2/img/arrow-right.png') }}" alt="">
                            <h4 class="next-h">Dewan Guru</h4>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection
