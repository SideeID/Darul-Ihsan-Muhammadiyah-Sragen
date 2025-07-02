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
                <h4 class="fw-bold">Qudwah</h4>
                <p>Qudwah adalah istilah dalam bahasa Arab yang berarti contoh, teladan, atau panutan. Dalam konteks
                    Islam, Qudwah sering digunakan untuk merujuk kepada individu atau kelompok yang dijadikan model
                    perilaku karena kebaikan, akhlak mulia, dan integritas mereka.</p>
                <p class="qudwah">Qudwah mempunyai beberapa aspek penting:</p>
                <ol class="qudwahlist">
                    <li>Akhlak: Sifat-sifat dan perilaku yang menunjukkan kebaikan dan moralitas tinggi.</li>
                    <li>Integritas: Konsistensi dalam ucapan dan tindakan yang mencerminkan nilai-nilai yang dianut.
                    </li>
                    <li>Kepemimpinan: Kemampuan untuk mempengaruhi dan memimpin orang lain melalui contoh yang baik.
                    </li>
                </ol>
                <p>Sehingga SMP Darun Najah 2 Karangploso senantiasa membudayakan sifat Qudwah untuk menjadi Teladan
                    dalam Aqidah dan Iman (Keyakinan), Teladan dalam berperilaku (Akhlak), Teladan dalam Ilmu, Teladan
                    dalam Amal dan Ibadah berlandaskan Ahlussunnah Wal Jamaah An-Nahdliyah, serta Keteladanan dalam
                    Berkeluarga</p>
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
