@extends('components.navbar')

@section('style1_content')
<section class="program-hero mt-0 mb-3 pt-5 pb-5" style="background-color: #080E1E;">
    <div class="container-fluid pt-5 text-center" style="heigh: 1000vh;">
        <img class="img-fluid" src="{{ asset('template2/img/tahfidz hero.svg') }}" alt="" style="width: 1300px; height: auto;">
    </div>
</section>

<section class="first-text my-0 px-5 pt-5 pb-2 mx-2">
    <div class="container-fluid">
        <h2>Program Tahfidz Qur’an</h2>
        <p class="teks1 mt-3" style="font-size: 22px;">Program Tahfidz Qur’an di SMP Darun Najah 2 Karangploso merupakan salah satu pilar utama dalam membentuk karakter
            santri yang berpegang teguh pada ajaran Islam. Program ini dirancang secara khusus untuk membantu siswa menghafal
            Al-Qur'an dengan baik, di bawah bimbingan para ustadz dan ustadzah yang berpengalaman dalam tahfidz. Setiap hari,
            santri diberikan waktu khusus untuk menghafal ayat-ayat Al-Qur'an secara intensif, dengan penekanan pada
            pengulangan (muraja'ah) dan penyetoran hafalan kepada pembimbing.</p>
    </div>
</section>

<section class="second-text my-4 px-5 py-2 mx-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-12 pt-1 d-flex flex-column justify-content-between gap-3">
                <img src="{{ asset('template2/img/tahfidz1.svg') }}" alt="" style="width: 330px; height: auto;">
                <img src="{{ asset('template2/img/tahfidz2.svg') }}" alt="" style="width: 330px; height: auto;">
            </div>
            <div class="col-md-8 col-12 pl-md-4 py-0 my-0">
                <p class="teks2" style="font-size: 19px;">Selain menghafal, program ini juga menekankan pemahaman yang mendalam terhadap makna ayat-ayat Al-Qur'an, sehingga santri tidak hanya
                    hafal secara tekstual, tetapi juga mampu memahami dan mengaplikasikan nilai-nilai Al-Qur'an dalam kehidupan sehari-hari. Program Tahfidz Qur'an di SMP
                    Darun Najah 2 Karangploso memberikan manfaat besar bagi siswa, termasuk peningkatan kecerdasan spiritual, kedisiplinan, dan kemampuan fokus yang terlatih.
                    Setiap santri didorong untuk mencapai kualitas hafalan terbaik dengan metode yang efektif dan personalisasi bimbingan sesuai dengan kemampuan masing-masing.
                </p>
                <div class="container-teks3 mt-3" style="background-color: #F9BF39; border-radius: 10px; padding: 20px 30px;">
                    <p class="teks3 my-0 mx-0" style="font-size: 17px;">Melalui program ini, SMP Darun Najah 2 Karangploso bertujuan mencetak generasi muda yang cinta Al-Qur'an dan siap mengemban amanah sebagai pemimpin di
                        masa depan. Kegiatan tahfidz dilakukan sepanjang masa pendidikan di pondok, dengan target mulai dari menghafal juz 30 hingga hafalan keseluruhan Al-Qur’an.
                        Program ini tidak hanya fokus pada kuantitas hafalan, tetapi juga membangun akhlak dan karakter islami yang kuat.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="kegiatan-pembelajaran mt-5 py-5 px-5 mx-0" style="background-color: #F2F3F4">
    <div class="container-fluid mt-2 mx-2 px-2">
        <h3 class="text-left mb-5">Kegiatan Pembelajaran</h3>
        <div class="row g-4 d-flex">
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">01</h1>
                    <hr>
                    <h5 class="my-4">Hafalan Al-Qur'an</h5>
                    <p>Dalam kegiatan ini, santri dibimbing untuk menghafal Al-Qur'an secara bertahap, dimulai dari juz 30 hingga keseluruhan Al-Qur'an.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">02</h1>
                    <hr>
                    <h5 class="my-4">Latihan Muraja’ah</h5>
                    <p>Latihan muraja’ah merupakan kegiatan pengulangan hafalan yang dilakukan secara rutin untuk memastikan santri tetap mengingat hafalan yang telah dipelajari sebelumnya.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">03</h1>
                    <hr>
                    <h5 class="my-4">Setoran Hafalan Mingguan</h5>
                    <p>Santri diwajibkan untuk menyetor hafalan mereka setiap minggu kepada ustadz atau ustadzah.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">04</h1>
                    <hr>
                    <h5 class="my-4">Kegiatan Tilawah</h5>
                    <p>Kegiatan tilawah bertujuan untuk meningkatkan kemampuan membaca Al-Qur'an dengan benar dan sesuai dengan kaidah tajwid.</p>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="text-left">
                    <h1 class="text-secondary mb-2" style="font-size: 70px;">05</h1>
                    <hr>
                    <h5 class="my-4">Kegiatan Pemahaman Makna Ayat</h5>
                    <p>Kegiatan ini bertujuan untuk membantu santri memahami makna dan konteks ayat-ayat yang mereka hafal.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="PPDB">
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

@media (max-width: 390px) {
    .program-hero img {
        margin-top: 40px;
        margin-inline: 0px;
        width: 100%;
        height: auto;
    }

    h2{
        font-size: 35px !important;
        font-weight: 700 !important;
        margin-bottom: 30px;
    }

    .second-text p.teks2{
        margin-block: 20px !important;
    }

    .first-text, .second-text{
        padding-inline: 5px !important;
        margin-inline: 0 !important;
    }

    .second-text{
        margin-top: 5px !important;
    }

    .second-text img {
        width: 100% !important;
        max-width: 100%;
        height: auto;
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
