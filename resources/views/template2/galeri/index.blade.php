@extends('components.navbar')

@section('style1_content')
<section id="galeri-page">
    <div class="container mt-4 overflow-hidden">
        <div class="mt-5 mb-4 header-galeri d-flex justify-content-between align-items-center">
            <h3 class="m-0 fw-bold galeri-page-title">Galeri</h3>
        </div>

        <div class="row gallery" id="gallery-files-container">
            @include('galeri.gallery-files', ['galleryFiles' => $galleryFiles])
        </div>

        <div class="py-5 d-flex justify-content-center">
            <button id="load-more" class="p-2 btn d-flex align-items-center" data-page="2"
                style="background-color:#E6E6E8; color:#182856; font-weight:500;">
                <img src="{{ asset('template2/assets/image/icon-refresh.svg') }}" alt="" class="me-2">
                Muat Lebih Banyak
            </button>
        </div>
    </div>

</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#load-more').click(function () {
            var page = $(this).data('page');

            $.ajax({
                url: '?page=' + page,
                type: "GET",
                beforeSend: function() {
                    $('#load-more').html('<img src="{{ asset('template2/assets/image/icon-refresh.svg') }}" alt="Loading..."> Muat Lebih Banyak');
                }
            })
            .done(function(data) {
                if (data.html === "") {
                    $('#load-more').addClass('d-none');
                } else {
                    $('#gallery-files-container').append(data.html);
                    $('#load-more').data('page', page + 1);
                    $('#load-more').html('<img src="{{ asset('template2/assets/image/icon-refresh.svg') }}" alt="" class="me-2"> Muat Lebih Banyak');
                }
            })
            .fail(function() {
                alert('Data gagal dimuat, silakan coba lagi.');
            });
        });
    });
</script>
@endsection
