@include('components.navbar')

<section id="hero-testi" class="d-flex align-items-end">
    <div class="container text-white">
        <div class="row d-flex justify-content-between">
            <div class="col-md-7">
                <h1 class="m-0">Testimoni</h1>
            </div>
        </div>
    </div>
</section>

<section id="testi-section" class="p-5">
    <div class="container-fluid p-5">
        <h3>Cerita mereka tentang Dimsa</h3>

        @foreach ($testimoni as $key => $item)
        <div class="testi-content" style="display: {{ $key === 0 ? 'block' : 'none' }};">
            <p id="testi-text" class="my-4">{{ $item->keterangan }}</p>
            <div class="profil d-flex align-items-center gap-10 m-0 p-0">
                <img src="{{ $item->file_url ?? asset('default-profile.svg') }}" alt="Profile Picture" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" class="profile-img m-0">
                <div class="profile-info d-flex flex-column m-0 px-2 py-1">
                    <h5 class="profile-name m-0">{{ $item->nama }}</h5>
                    <p class="profile-role m-0" style="color: #777; font-size: 14px;">{{ $item->wali }}</p>
                </div>
            </div>
            <hr class="my-4">
            <div class="row page d-flex align-items-center">
                <div class="d-flex justify-content-between">
                    @if ($key > 0)
                    <a class="decoration-none text-black" href="javascript:void(0)" onclick="showPrevTesti()"><i class="fas fa-arrow-left"></i></a>
                    <h5 class="font-bold m-0">Sebelumnya</h5>
                    @endif

                    @if ($key < count($testimoni) - 1)
                    <h5 class="font-bold m-0">Selanjutnya</h5>
                    <a class="decoration-none text-black" href="javascript:void(0)" onclick="showNextTesti()"><i class="fas fa-arrow-right"></i></a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@include('components.footer')

<style>
#hero-testi {
    background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7)),url("../../template3/image/testi-hero.svg");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 100vh;
    padding-block: 100px;
}

h1{
    font-size: 50px;
    font-weight: 700
}

@media(max-width: 414px){
    #hero-testi {
        background-image: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.7)),url("../../template3/image/testi-hero.svg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 345px;
        padding-block: 50px !important;
    }

    #hero-testi .container{
        padding-inline: 20px !important;
    }

    h1{
        font-size: 40px !important;
    }

    #testi-section{
        padding-inline: 20px !important;
        margin-inline: 0px !important;
    }

    #testi-section .container-fluid{
        padding: 0px !important;
        margin: 0px !important;
    }
}
</style>

<script>
    let currentTesti = 0;
    const testiContents = document.querySelectorAll('.testi-content');

    function showNextTesti() {
        testiContents[currentTesti].style.display = 'none';
        currentTesti = (currentTesti + 1) % testiContents.length;
        testiContents[currentTesti].style.display = 'block';
    }

    function showPrevTesti() {
        testiContents[currentTesti].style.display = 'none';
        currentTesti = (currentTesti - 1 + testiContents.length) % testiContents.length;
        testiContents[currentTesti].style.display = 'block';
    }
</script>
