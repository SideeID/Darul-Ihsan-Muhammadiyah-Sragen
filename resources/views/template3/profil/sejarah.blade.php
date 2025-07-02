@extends(config('app.template') . '.profil.main')

@section('content')
    <main class="container">
        <!-- START DATA -->
        <div class="content-profil">
            <div class="row align-items-end">
                <h2 class="fw-bold text-dark profil-struktur-title" style="font-size: 36px;">
                    Sejarah Pondok
                </h2>
                <div class="row-paragraf mt-2 mb-1">
                    <h3 class="fw-bold text-dark profil-struktur-title mb-3" style="font-size: 24px;">
                        Sejarah singkat pondok pesantren Darul Ihsan Muhammadiyah Sragen
                    </h3>
                    <p>Pondok Pesantren Darul Ihsan Muhammadiyah Sragen (DIMSA) memiliki perjalanan panjang yang dimulai sejak tahun 1989, dengan tujuan mencetak kader persyarikatan Muhammadiyah yang unggul di Kabupaten Sragen. Melalui sejumlah inovasi dan perkembangan yang signifikan, DIMSA telah tumbuh menjadi lembaga pendidikan yang mengintegrasikan ilmu umum dan ilmu agama, dengan berbagai perubahan dan kemajuan fasilitas serta jenjang pendidikan. </p>
                </div>
                <div class="row align-items-end">
                    <div class="col mb-1">
                        <img src="{{ asset('template3/image/sejarah.jpeg') }}"
                            style="border-radius: 16px; height:400px; width:100%; object-fit:cover;" />
                    </div>
                </div>
            </div>
            <div class="row-paragraf mb-2 mt-4">
                <h3 class="fw-bold text-dark profil-struktur-title mb-3" style="font-size: 24px;">
                    Awal Pendirian
                </h3>
                <p>Pada tahun 1989, Pimpinan Daerah Muhammadiyah Kabupaten Sragen di bawah kepemimpinan Ustadz KH Muthiudin, B.Sc, mulai menginisiasi pentingnya penyiapan kader untuk keberlanjutan persyarikatan Muhammadiyah di Sragen. Sebagai langkah awal, direncanakanlah study banding ke beberapa pondok pesantren Muhammadiyah, di antaranya Ponpes Paciran Lamongan, Ponpes Al-Mukmin, dan Ponpes Darul Arqom Garut, dengan Ustadz Drs. KH. Sururi sebagai penanggung jawab. Nama awal yang digunakan adalah Pondok Pesantren Muhammadiyah Sragen (PPMS), yang menerapkan konsep pondok kalong, di mana santri menempuh pendidikan formal di luar pondok pada pagi hari dan belajar agama di pondok pada malam hari. Lokasi pertama PPMS adalah di Jalan Yos Sudarso, yang sekarang menjadi Gedung Dakwah PDM Sragen.</p>
                
            </div>
            <div class="row-paragraf mt-2">
                <h3 class="fw-bold text-dark profil-struktur-title mb-3 mt-2" style="font-size: 24px;">
                    Perkembangan Pendidikan dan Pendirian DIMSA
                </h3>
                <p>Seiring waktu, jumlah santri terus bertambah, meskipun pondok belum memiliki tanah sendiri, sehingga beberapa kali berpindah lokasi. Pada tahun 1997, PDM Sragen mendapatkan wakaf tanah dari Bapak Ihsan Triyono, seorang tokoh Majelis Dikdasmen, di Dusun Pringan, Karangtengah, Sragen, yang menjadi lokasi tetap pondok. Tahun 2001 menjadi momen penting ketika sistem pendidikan pondok berinovasi dari konsep pondok kalong menjadi sistem pendidikan terpadu. Berdirilah Madrasah Tsanawiyah (MTs) dengan nama resmi Ponpes Darul Ihsan Muhammadiyah Sragen (DIMSA), disusul dengan pendirian SMA Darul Ihsan pada tahun 2006 dan Madrasah Aliyah Darul Ihsan pada tahun 2022, menjadikan DIMSA sebagai pondok yang berpengaruh di Kabupaten Sragen dan sekitarnya.</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6 col-12">
                    <a href="{{ route('selayang-pandang') }}" class="text-start text-decoration-none w-100 d-flex">
                        <img src="{{ asset('template2/img/arrow-left.svg') }}" alt=""><span
                            class="text-dark">Sebelumnya</span>
                    </a>
                    <h3 class="fw-bold fs-4 mt-2">Selayang Pandang</h3>
                </div>
                <div class="col-md-6 col-12 mt-5 mt-md-0">
                    <a href="{{ route('visi-misi') }}" class="text-start text-decoration-none w-100 d-flex">
                        <span class="text-dark">Berikutnya</span>
                        <img src="{{ asset('template2/img/arrow-right.svg') }}" alt="">
                    </a>
                    <h3 class="fw-bold fs-4 mt-2">Visi & Misi</h3>
                </div>
            </div>
        </div>
    </main>
@endsection
