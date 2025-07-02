@include('components.navbar')

<style>
    #hero-tahfidz {
        height: 700px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("../template3/image/hd-tahfidz.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
    }
</style>

<setion id="hero-tahfidz" class="program-hero-section pt-0" style="height:100vh;">
    <div class="container d-flex align-items-end" style=" padding: 50px 20px;">
        <div class="col-lg-6 col-sm-12">
            <h2 class="program-page-title mb-2 text-white">Tahfidz Qur'an</h2>
            <p class="program-page-subtitle text-white" style="text-align:justify;">
                Program Tahfidz dan Tahsin DIMSA dilaksanakan secara bertahap mulai dari kelas 7 hingga kelas 12, dengan tahsin sebagai pondasi dan tahfidz sebagai tujuan utama. Di kelas 7, santri fokus pada pembinaan tahsin melalui halaqah malam untuk menyempurnakan bacaan Al-Qur'an, dilengkapi dengan ujian reguler untuk mengukur kemajuan. Setelah tahsin selesai, santri melanjutkan ke tahfidz secara bertahap, dimulai dengan Juz 30 dan terus berlanjut hingga mencapai target hafalan di setiap jenjang kelas. Melalui rangkaian kegiatan ini, santri dibimbing untuk memiliki hafalan yang kuat, dengan struktur pembinaan yang mendorong kedisiplinan dan ketepatan dalam menghafal Al-Qur’an.
            </p>
        </div>
    </div>
</setion>

<section class="program-page-section" id="program-tahfidz">
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
