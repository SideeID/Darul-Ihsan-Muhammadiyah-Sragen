@extends('components.navbar')

@section('style1_content')
<section class="program-hero mt-0 mb-0 pt-5 pb-5" style="background-color: #F9BF39;">
    <div class="container-fluid pt-5 text-center" style="heigh: 1000vh;">
        <img class="img-fluid" src="{{ asset('template2/img/p5 hero.svg') }}" alt="" style="width: 1300px; height: auto;">
    </div>
</section>

<section class="first-text my-0 px-5">
    <div class="container-fluid">
        <h2>Program P5</h2>
        <p class="teks1 mt-3 mb-0">Projek Penguatan Profil Pelajar Pancasila (P5) di SMP Darun Najah 2 Karangploso merupakan program inovatif yang dirancang untuk membentuk karakter santri berdasarkan
            nilai-nilai Pancasila. Program ini menggabungkan kegiatan belajar dengan projek kreatif yang berfokus pada pengembangan keterampilan hidup, kemandirian, dan kepemimpinan. Santri dilibatkan secara aktif dalam
            berbagai projek yang tidak hanya bertujuan akademis, tetapi juga mendorong mereka untuk terlibat dalam kegiatan sosial dan kewirausahaan.</p>
    </div>
</section>

<section class="second-text px-5 mx-0" style="background-color: #080E1E; padding-block: 70px;">
    <div class="container-fluid d-flex flex-column">
        <div class="row">
            <p class="mb-3 text-white" style="font-size: 18px;">Santri tidak hanya belajar teori, tetapi juga langsung menerapkan nilai-ilai Pancasila dalam kehidupan nyata melalui kegiatan-kegiatan yang bermanfaat bagi masyarakat. Misalnya, santri diajak
                untuk terlibat dalam projek lingkungan, kewirausahaan, atau kegiatan sosial yang berhubungan dengan kebutuhan masyarakat setempat. Hal ini membantu santri mengembangkan rasa kepedulian dan tanggung jawab, serta meningkatkan keterampilan kerja
                sama tim
            </p>
            <p class="text-white" style="font-size: 18px;">Program P5 di SMP Darun Najah 2 Karangploso dirancang untuk membantu santri yang berakhlak mulia dan memiliki jiwa kepemimpinan yang kuat. Melalui kegiatan projek ini, santri diajarkan untuk menjadi pelajar
                yang inovatif, kreatif, dan produktif. Kegiatan ini juga membekali santri untuk menghadapi tantangan global dengan tegap menjunjung tinggi nilai-nilai kebangsaan dan agama.
            </p>
        </div>
        <div class="row d-flex justify-content-between mt-3">
            <div class="col-md-6 col-12"><img src="{{ asset('template2/img/p5-1.svg') }}" style="width: 100%; max-width: 100%; height: auto;" class="img1" alt=""></div>
            <div class="col-md-6 col-12"><img src="{{ asset('template2/img/p5-2.svg') }}" style="width: 100%; max-width: 100%; height: auto;" alt=""></div>
        </div>
    </div>
</section>

<section class="kegiatan-pembelajaran my-0 px-5 mx-0" style="background-color: #F2F3F4; padding-block: 50px;">
    <div class="container-fluid mt-2 mx-2 px-2">
        <h3 class="text-left mb-5">Kegiatan Pembelajaran</h3>
        <div class="row g-4 d-flex">
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">01</h1>
                    <hr>
                    <h5 class="my-4">Kegiatan Wirausaha</h5>
                    <p>Santri dilibatkan dalam proyek kewirausahaan di mana mereka merencanakan, menjalankan, dan mengevaluasi usaha kecil. Kegiatan ini mengajarkan mereka tentang manajemen bisnis, pengelolaan keuangan, serta keterampilan pemasaran.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">02</h1>
                    <hr>
                    <h5 class="my-4">Diskusi tentang Nilai-nilai Pancasila</h5>
                    <p>Diskusi ini melibatkan santri untuk membahas dan menganalisis nilai-nilai Pancasila serta bagaimana cara mengimplementasikannya dalam kehidupan sehari-hari.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">03</h1>
                    <hr>
                    <h5 class="my-4">Presentasi Proyek di Depan Kelas</h5>
                    <p>Setelah menyelesaikan proyek, santri diharuskan untuk mempresentasikan hasil kerja mereka di depan kelas. Kegiatan ini bertujuan untuk melatih keterampilan komunikasi, presentasi, dan kepercayaan diri santri.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="PPDB my-0" id="PPDB">
    <div class="container-fluid">
        <div class="py-2 my-0 ppdb-conten row align-items-center"
            style="background-color: #3C7B46; border-radius:20px; overflow: hidden; margin-inline: 50px; padding: 0px;">
            <div class="col-lg-6 col-md-8 col-sm-12 ppdb-text-col">
                <div class="p-5 content-isi px-md-0" style="transform: translateX(50px);">
                    <p class="mt-3 text-light mini-title-ppdb" style="font-size:16px;">PPDB</p>
                    <h2 class="judul-ppdb text-light">Ayok Masuk SMP <br> Darun Najah 2
                    </h2>
                    <a href="https://psbdarunnajah2.framer.website/" target="_blank" type="button"
                        class="px-4 py-2 my-3 btn btn-warning fw-bold ppdb-button"
                        style="font-size:16px; color:#080E1E;">Daftar Sekarang!
                    </a>
                </div>
            </div>
            <div
                class="px-5 col-lg-6 col-md-4 col-sm-12 d-flex justify-content-center position-relative ppdb-image-col">
                <div class="conten-banner position-absolute">
                    <img src="{{ asset('template2/img/banner-ijo.png') }}" style="" class="ppdb-img">
                </div>
            </div>
        </div>
    </div>
</section>

<button id="back-to-top" class="btn btn-warning position-fixed" style="display: none; bottom: 20px; right: 20px; z-index: 1000; border: none; background-color: #FFFFFF;
color: #080E1; font-size: 14px; padding: 10px 20px; box-shadow: 0 10px 8px rgba(0, 0, 0, 0.2);">
    Back to top ↑
</button>

<style>
h2{
    font-size: 30px;
    font-weight: 700;
}

.first-text{
    padding-block: 60px;
}

.first-text p{
    font-size: 22px;
}

.second-text .container-fluid{
    padding-left: 45%;
    padding-right: 2%;
}

@media (max-width: 390px) {
    body{
        background-color: #080E1E;
    }

    h2{
        font-size: 35px !important;
        font-weight: 700 !important;
        margin-bottom: 30px;
    }

    .program-hero img {
        margin-top: 40px;
        margin-bottom: 0px;
        margin-inline: 0px;
        width: 100%;
        height: auto;
    }

    .first-text{
        background-color: #080E1E;
        margin-block: 0px !important;
        padding-top: 60px;
        padding-bottom: 5px;
    }

    .first-text h2, .first-text p{
        color: #FFFFFF;
    }

    .first-text p{
        font-size: 18px;
    }

    .second-text{
        margin-block: 0px !important;
        padding-top: 40px !important;
        padding-bottom: 80px !important;
    }

    .second-text .container-fluid{
        padding-inline: 15px;
    }

    .first-text, .second-text{
        padding-inline: 5px !important;
        margin-inline: 0 !important;
    }

    .second-text p{
        margin-bottom: 40px !important;
    }

    .second-text img {
        width: 100% !important;
        max-width: 100%;
        height: auto;
    }

    .second-text .img1{
        margin-bottom: 30px;
    }

    .second-text .img2 {
        margin-bottom: 70px;
    }

    .kegiatan-pembelajaran {
        padding-inline: 5px !important;
        margin-inline: 0 !important;
        max-width: 100% !important;
        box-sizing: border-box;
    }

    .kegiatan-pembelajaran .container-fluid {
        padding-inline: 10px !important;
        margin-inline: 0 !important;
    }

    .kegiatan-pembelajaran .col-md-4 {
        flex: 0 0 100%;
        max-width: 100%;
        padding-inline: 10px !important;
        margin-inline: 0 !important;
        margin-bottom: 20px;
    }

    .kegiatan-pembelajaran .row {
        gap: 0;
    }

    .kegiatan-pembelajaran h1,
    .kegiatan-pembelajaran h5,
    .kegiatan-pembelajaran p {
        max-width: 100%;
        word-wrap: break-word;
    }

    .PPDB{
        background-color: #FFFFFF;
    }

    #PPDB .container-fluid .row{
        padding-left: 0px !important;
        padding-right: 0px !important;
        margin-inline: 10px !important;
    }

    .ppdb-conten {
        margin-inline: 5px;
        padding-inline: 5px !important;
    }

    .col-md-4, .col-md-8 {
        flex: 0 0 100%;
        max-width: 100%;
        margin-bottom: 15px;
    }

    .ppdb-image-col {
        justify-content: center;
    }

    .ppdb-img {
        width: 80%;
        height: auto;
    }
}
</style>

<script>
    window.onscroll = function() {
        var backToTopButton = document.getElementById("back-to-top");
        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            backToTopButton.style.display = "block";
        } else {
            backToTopButton.style.display = "none";
        }
    };
    document.getElementById('back-to-top').addEventListener('click', function(){
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
@endsection
