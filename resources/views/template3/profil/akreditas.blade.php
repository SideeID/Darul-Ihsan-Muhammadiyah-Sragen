@extends(config('app.template') . '.profil.main')

@section('content')
    <div class="container-fluid">
        <main class="container">
            <div class="content-profil">
                <!-- START DATA -->
                <div class="akreditas">
                    <div class="row align-items-end mt-4">
                        <h2 class="fw-bold text-dark mb-5 profil-struktur-title" style="font-size: 36px;">
                            Akreditasi
                        </h2>
                        <img src="{{ asset('template3/images/sertif.svg') }}" />
                    </div>
                    <div class="row-paragraf">
                        <h3 class="fw-bold text-dark mb-1" style="font-size: 24px;">
                            Peringkat A
                        </h3>
                        <p style="font-size:14px;">NO SK: 1453/BAN-SM/SK/2022</p>
                        <p> Pondok Pesantren Darul Ihsan Muhammadiyah Sragen dengan bangga meraih akreditasi peringkat A (Unggul) dengan nilai 97 berdasarkan Surat Keputusan Badan Akreditasi Nasional Sekolah/Madrasah (BAN-SM) Nomor 1453/BAN-SM/SK/2022. Pencapaian ini menjadi bukti komitmen kami dalam menyediakan pendidikan berkualitas tinggi di SMP Darul Ihsan Muhammadiyah yang mendukung pertumbuhan akademik dan spiritual para siswa.</p>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <a href="{{ route('visi-misi') }}" class="text-start text-decoration-none w-100 d-flex">
                                <img src="{{ asset('template2/img/arrow-left.svg') }}" alt=""><span
                                    class="text-dark">Sebelumnya</span>
                            </a>
                            <h3 class="fw-bold fs-4 mt-2">Visi & Misi</h3>
                        </div>
                        <div class="col-md-6 col-12 mt-5 mt-md-0">
                            <a href="{{ route('logo') }}" class="text-start text-decoration-none w-100 d-flex">
                                <span class="text-dark">Berikutnya</span>
                                <img src="{{ asset('template2/img/arrow-right.svg') }}" alt="">
                            </a>
                            <h3 class="fw-bold fs-4 mt-2">Logo & Brand</h3>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection


<style>
    @media (min-width: 320px) and (max-width: 767px) {
        .profil-struktur-title {
            font-size: 28px !important;
        }
    }
</style>
