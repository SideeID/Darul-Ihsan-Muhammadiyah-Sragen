@include('components.navbar')


<section class="text-white bg-dark d-flex align-items-center"
    style="background-image:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.6)), url('{{ asset('template3/image/bg-majalah.png') }}'); background-size: cover; background-position: center; height: 500px;">
    <div class="container">
        <h1 class="mt-5 display-6 fw-bold">Majalah</h1>
    </div>
</section>


<section id="majalah">
    <div class="container">
        <div class="row">

            @if ($majalah->count())
                @foreach ($majalah as $value)
                    <div class="mb-4 col-lg-3 col-md-6 col-12 text-decoration-none">
                        <div class="border-0 card majalah-card">
                            <img src="{{ $value->image_url }}" alt="" class="majalah-img">
                            <div class="px-0 py-0 card-body py-md-3">
                                <h6 class="my-0 card-title text-bold">{{ $value->judul }}</h6>
                                <p class="m-0 admin-date ">
                                    {{ \Carbon\Carbon::parse($value->tanggal)->format('d F Y') }}
                                </p>
                                <div class="flex rounded download"
                                    style="border:solid 0.5px #12B76A; background-color:#E7F8F0; width:118px; padding: 5px 10px;">
                                    <img src="{{ asset('template3/image/icon/import.svg') }}" alt="Image 8"
                                        class="rounded img-fluid">
                                    <a href="{{ $value->url }}"
                                        class="small text-decoration-none fw-semibold text-success">
                                        Download
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p class="mt-5 text-center">Belum ada majalah yang tersedia.</p>
            @endif

            <hr>
        </div>
        <!-- Pagination -->
        <nav aria-label="Page navigation">
            {{ $majalah->links('pagination::bootstrap-4') }}
        </nav>
    </div>
</section>



@include('components.footer')
