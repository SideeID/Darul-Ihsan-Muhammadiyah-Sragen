@if ($guruStaffs->count())
    @foreach ($guruStaffs as $guruStaff)
        <div class="mb-4 col-md-4 d-flex">
            <div class="card w-100 h-75 ">
                <img src="{{ $guruStaff->image_url }}" class="card-img-top" alt="Guru Staff"
                    style="height: 450px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $guruStaff->nama }}</h5>
                    <p class="card-text">{{ $guruStaff->jabatan }}</p>
                </div>
            </div>
        </div>
    @endforeach
@else
    <p class="mt-5 text-center">Belum ada pimpinan yang tersedia.</p>
@endif
