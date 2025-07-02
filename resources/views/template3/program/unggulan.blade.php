@include('components.navbar')

<style>
    #hero-unggulan {
        height: 700px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("../template3/image/hd-unggulan.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
    }
</style>

<setion id="hero-unggulan" class="program-hero-section pt-0" style="height:100vh;">
    {{-- <div class="layer position-absolute"
        style="background-color: rgba(0, 0, 0, 0.6); z-index:1; width: 100%; height:100%;"></div> --}}
    <div class="container d-flex align-items-end" style="padding: 50px 20px;">
        <div class="col-lg-6 col-sm-12">
            <h2 class="program-page-title mb-2 text-white">Pemrograman Unggulan IT</h2>
            <p class="program-page-subtitle text-white" style="text-align:justify;">
                Program Unggulan IT di Pondok Pesantren Darul Ihsan Muhammadiyah Sragen adalah salah satu program
                inovatif yang dirancang untuk memberikan keterampilan teknologi informasi kepada santri di era digital.
                Program ini meliputi pengenalan komputer dasar, pemrograman, desain grafis, dan pengembangan web, serta
                keterampilan digital lain yang relevan dengan kebutuhan industri saat ini.
            </p>
        </div>
    </div>
</setion>

<section class="program-page-section" id="program-unggulan">
    <div class="container mt-3 align-items-center">
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
