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
                <h4 class="fw-bold">Bermartabat</h4>
                <p>Nilai Bermartabat adalah fondasi penting dalam pendidikan di SMP Darun Najah 2 Karangploso.
                    Kami mengajarkan santri untuk selalu menghargai diri sendiri dan orang lain, serta menjalani
                    hidup dengan integritas dan akhlak yang baik. Dalam lingkungan pesantren, santri dibiasakan
                    untuk berperilaku sopan, menjunjung tinggi etika, dan menghormati nilai-nilai sosial yang
                    sesuai dengan ajaran Islam. Hal ini kami yakini sebagai kunci dalam membentuk karakter mereka
                    menjadi individu yang bermartabat.</p>
                <p>Dengan penguatan pendidikan karakter, kami berharap santri tidak hanya cerdas secara akademis
                    tetapi juga dikenal karena sikap dan perilakunya yang terpuji. Mereka diharapkan mampu menjaga
                    martabat diri di tengah masyarakat, menjadi teladan bagi orang lain, serta menjalani hidup dengan
                    penuh tanggung jawab dan kebaikan.</p>
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
