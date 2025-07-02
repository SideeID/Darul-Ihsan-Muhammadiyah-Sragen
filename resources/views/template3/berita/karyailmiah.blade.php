@include('components.navbar')

@section('title', 'Karya Ilmiah DIMSA')

<section class="text-white bg-dark d-flex align-items-center"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('{{ asset('template3/image/karyaIlmiahBG.jpg') }}'); background-size: cover; background-position: center; height: 500px;">
    <div class="container">
        <h1 class="mt-5 display-6 fw-bold">Karya Ilmiah</h1>
    </div>
</section>


<section id="majalah">
    <div class="container">
        <div class="row">

            @if ($karyaIlmiah->count())
                @foreach ($karyaIlmiah as $karya)
                    <div class="mb-4 col-lg-3 col-md-6 col-12 text-decoration-none">
                        <div class="border-0 card majalah-card">
                            <img src="{{ $karya->image_url }}" alt="" class="majalah-img">
                            <div class="px-0 py-0 card-body py-md-3">
                                <h6 class="my-0 card-title text-bold">{{ $karya->judul }}</h6>
                                <p class="m-0 admin-date ">
                                    {{ $karya->penulis }} • {{ \Carbon\Carbon::parse($karya->tanggal)->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center rounded download"
                            style="border:solid 0.5px #12B76A; background-color:#E6E6E8; width:150px; padding: 10px;">
                            <img src="{{ asset('template3/image/icon/download.svg') }}" alt="Image 8"
                                class="rounded img-fluid me-2">
                            <a href="{{ $karya->url }}"
                                class="small text-decoration-none fw-semibold text-success">
                                Download
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="mt-5 text-center">Belum ada Karya Ilmiah yang tersedia.</p>
            @endif

            <hr>
        </div>
        <nav aria-label="Page navigation">
            {{ $karyaIlmiah->links('pagination::bootstrap-4') }}
        </nav>
    </div>
</section>



@include('components.footer')
