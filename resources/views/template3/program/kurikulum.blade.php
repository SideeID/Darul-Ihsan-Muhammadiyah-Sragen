@include('components.navbar')

<style>
    #hero-kurikulum {
        height: 700px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("../template3/image/hd-kurikulum.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
    }
</style>

<setion id="hero-kurikulum" class="program-hero-section pt-0" style="height:100vh;">
    {{-- <div class="layer position-absolute"
        style="background-color: rgba(0, 0, 0, 0.6); z-index:1; width: 100%; height:100%;"></div> --}}
    <div class="container d-flex align-items-end" style="padding: 50px 20px;">
        <div class="col-lg-6 col-sm-12">
            <h2 class="program-page-title mb-2 text-white">Kurikulum Pondok</h2>
            <p class="program-page-subtitle text-white" style="text-align:justify;">
                Kurikulum pondok memakai kitab Ta’lim al-Muta’allim (Kitab ini ditulis syaikh Al-Zarnuji dengan tujuan menjelaskan cara mencari ilmu kepada para pelajar sehingga kitab ini cocok untuk dipelajari para santri) , kitab Himpunan Putusan Tarjih (HPT) Muhammadiyah ( Kitab HPT adalah hasil muktamar tarjih yang membahas berbagai isu, seperti keimanan, ibadah, isu-isu keumatan dan agama islam)  dan Hadits Arba’in An –Nawawi ( Kumpulan hadits shahih yang berisi tentang pokok-pokok ajaran islam).
            </p>
        </div>
    </div>
</setion>

<section class="program-page-section" id="program-p5">
    <div class="container mt-3">
        <div
            style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; height: auto; border-radius:16px;">
            <iframe src="https://www.youtube.com/embed/U25Nbeyfn8A"
                style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0;" allowfullscreen=""
                loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

@include('components.footer')
