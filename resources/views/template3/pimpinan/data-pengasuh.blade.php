@if ($dewanPengasuh->count())
    @foreach ($dewanPengasuh as $dewan)
        <div class="mb-4 col-md-4 d-flex">
            <div class="card w-100 h-75 ">
                <img src="{{ $dewan->image_url }}" class="card-img-top" alt="Pengasuh"
                    style="height: 450px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $dewan->nama }}</h5>
                    <p class="card-text">{{ $dewan->jabatan }}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="mt-5 text-center">Belum ada pimpinan yang tersedia.</p>
@endif
