@if ($pimpinans->count())
    @foreach ($pimpinans as $pimpinan)
        <div class="mb-4 col-md-4 d-flex">
            <div class="card w-100 h-75 ">
                <img src="{{ $pimpinan->image_url }}" class="card-img-top" alt="pimpinan1"
                    style="height: 450px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $pimpinan->nama }}</h5>
                    <p class="card-text">{{ $pimpinan->jabatan }}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="mt-5 text-center">Belum ada pimpinan yang tersedia.</p>
@endif
