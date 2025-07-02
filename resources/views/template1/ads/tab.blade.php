<div class="top-menu bg-white p-2 mb-4 w-100 d-flex gap-2">
    <a href="{{route('iklan.slider.index')}}" class="btn {{ (request()->is('konten/ads/slider*')) ? 'btn-success fw-700' : '' }}">Iklan Slider</a>
    <a href="{{route('iklan.beranda')}}" class="btn {{ (request()->is('konten/ads/beranda*')) ? 'btn-success fw-700' : '' }}">Iklan Beranda</a>
    <a href="{{route('iklan.halaman')}}" class="btn {{ (request()->is('konten/ads/halaman*')) ? 'btn-success fw-700' : '' }}">Iklan Halaman</a>
</div>