<section id="sosmed" class="sosmed">
    <div class="container">
        <div class="mb-4 d-flex justify-content-between align-items-center">
            <h3 class="fw-bold">Sosial Media</h3>
            <a href="/sosmed" class="more-btn-sosmed" style="font-size: 14px;">Lihat semua</a>
        </div>

        <!-- Instagram Section -->
        <div class="mb-2 container-gambar d-flex justify-content-between">
            @foreach($instagram as $ig)
                <div class="card">
                    <img src="{{ asset($ig->image) }}" class="img-sosmed">
                    <div class="card-body">
                        <a href="{{ $ig->url }}"><img src="{{ asset('template2/img/ig.png') }}" alt="sosmed">{{ $ig->judul }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="#" class="py-4 text-center more-btn-sosmed-mobile d-none" style="font-size: 14px;">Lihat semua</a>

        <!-- Video Section -->
        <div class="content2">
            <div class="video-wrapper">
                <div class="row">
                    <!-- YouTube Video -->
                    @if($youtube->isNotEmpty())
                        <div class="col-lg-9 col-md-8">
                            <div class="vid-card card">
                                <img src="{{ asset($youtube->first()->image) }}" class="img-fluid ytvideo">
                                <div class="card-body">
                                    <a href="{{ $youtube->first()->url }}">
                                        <img src="{{ asset('template2/img/youtube.png') }}" alt="sosmed">{{ $youtube->first()->judul }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- YouTube Short Video -->
                    @if($youtubeShort->isNotEmpty())
                        <div class="col-lg-3 col-md-4">
                            <div class="vid-card card">
                                <img src="{{ asset($youtubeShort->first()->image) }}" class="img-fluid ytshort">
                                <div class="card-body">
                                    <a href="{{ $youtubeShort->first()->url }}">
                                        <img src="{{ asset('template2/img/youtube.png') }}" alt="sosmed">{{ $youtubeShort->first()->judul }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Map-->
<section id="map">
    <div class="container position-relative">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.058088245581!2d112.60546242048332!3d-7.888991942554719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78816d9efb752d%3A0x950d9b0de497135a!2sPPAI%20Darun%20Najah%202!5e0!3m2!1sid!2sid!4v1725242316443!5m2!1sid!2sid"
            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
            class="peta w-100"></iframe>
        <div class="card card-map">
            <div class="card-body">
                <h4 class="card-title fw-bold">PPAI Darun Najah 2</h5>
                    <p class="my-4 card-text" style="font-size:16px !important;">Unnamed Road, Bumi Perkasa, Ngenep,
                        Kec. Karang Ploso, Kabupaten Malang,
                        Jawa
                        Timur 65152</p>
                    <a href="https://maps.app.goo.gl/YFSVMMViRUdfab766" target="_blank"
                        class="py-3 m-0 btn btn-map d-flex align-items-center justify-content-center"><img
                            src="{{ asset('template2/assets/image/icon-location.svg') }}" alt="map"
                            class="map-icon me-2">Kunjungi
                        Darun Najah 2</a>
            </div>
        </div>
    </div>
</section>
<!-- Map-->
