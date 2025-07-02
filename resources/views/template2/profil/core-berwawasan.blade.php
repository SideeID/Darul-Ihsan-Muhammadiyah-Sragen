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
                <h4 class="fw-bold">Berwawasan Global</h4>
                <p>SMP Darun Najah 2 Karangploso berkomitmen membekali santri dengan Wawasan Global, agar mereka siap menghadapi
                    tantangan era modern tanpa kehilangan jati diri keislaman mereka. Melalui program bilingual dan pengenalan terhadap
                    isu-isu global, kami memberikan santri kesempatan untuk memperluas perspektif mereka tentang dunia luar. Santri
                    didorong untuk berpikir kritis, inovatif, dan terbuka terhadap berbagai budaya, sembari tetap kokoh dengan nilai-nilai
                    Islam yang menjadi landasan kehidupan mereka.</p>
                <p>Kami berharap santri dapat menjadi individu yang tidak hanya cerdas secara akademis, tetapi juga mampu beradaptasi dengan
                    perkembangan zaman di tingkat internasional. Mereka diharapkan mampu membawa nilai-nilai positif dan wawasan yang luas ke
                    dalam setiap kontribusi mereka, baik di lingkungan lokal maupun global, dengan tetap memegang teguh prinsip Islam.</p>
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
