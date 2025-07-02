{{-- @include('components.navbar')

<style>
    @media (min-width: 320px) and (max-width: 767px) {

        #fasilitas-page .content-1 .fasilitas-grid-container,
        #fasilitas-page .content-2 .fasilitas-grid-container {
            grid-template-columns: 1fr !important;
            gap: 0 !important;
        }

        #fasilitas-page .fasilitas-img-big-container img,
        #fasilitas-page .fasilitas-img-small-container img {
            height: 256px !important;
        }

        #fasilitas-page {
            padding-top: 80px !important;
            padding-bottom: 0px !important;
            padding-left: 5px !important;
            padding-right: 5px !important;
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        #fasilitas-page .fasilitas-img-small-container img {
            height: 150px !important;
        }

        #fasilitas-page .fasilitas-img-big-container img {
            height: 353px !important;
        }
    }

    #fasilitas-page {
        padding-bottom: 40px !important;
    }

    #fasilitas-page .content-1 .card-body {
        padding: 20px 0 !important;
        text-align: start !important;
    }

    #fasilitas-page .content-1 .fasilitas-grid-container {
        grid-template-columns: 3fr 1fr;
    }

    #fasilitas-page .content-2 .fasilitas-grid-container {
        grid-template-columns: 1fr 3fr;
    }


    #fasilitas-page img {
        object-fit: cover !important;
        width: 100% !important;
    }

    #fasilitas-page .fasilitas-grid-container p {
        object-fit: cover !important;
        width: 100% !important;
    }
</style>

<section id="fasilitas-page" style="padding: 100px 0px">
    <div class="container">
        <div class="header-fas">
            <h3 class="mt-5 mb-4 fw-bold">Sarana Prasarana</h3>
        </div>

        <div id="fasilitas-container">
            @include('fasilitas.fasilitas-files')
        </div>
    </div>
</section>

@include('components.button-muat')

@include('components.footer')

<script>
    $(document).ready(function() {
        var page = 1;

        $('#load-more').click(function() {
            page++;
            loadMoreData(page);
        });

        function loadMoreData(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function() {
                    $('#load-more').html('Muat Lebih Banyak');
                }
            })
            .done(function(data) {
                if(data.html === "") {
                    $('#load-more').addClass('d-none');
                    return;
                }
                $('#load-more').html('Muat Lebih Banyak');
                $('#fasilitas-container').append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('Server not responding...');
            });
        }
    });
</script> --}}


@include('components.navbar')

<section id="fasilitas-page">
    <div class="container">
        <div class="col-md-12">
            <h3 class="fw-bold mt-5 mb-4">Sarana Prasarana</h3>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="card border-0">
                    <a href="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" data-fancybox="asrama"
                        data-caption="Asrama Santri">
                        <img src="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" class="card-img-top"
                            alt="Asrama Santri" style="border-radius: 8px; width: 100%; height:574px;" />
                        <a href="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" data-fancybox="asrama"
                            class="w-100" data-caption="Asrama Santri 1"></a>
                        <a href="{{ asset('template2/assets/image/asrama3.svg') }}" data-fancybox="asrama"
                            data-caption="Asrama Santri 2"></a>
                        <a href="{{ asset('template2/assets/image/asrama4.svg') }}" data-fancybox="asrama"
                            data-caption="Asrama Santri 3"></a>
                    </a>
                    <div class="card-body px-0 text-start d-inline-block">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">Asrama Santri</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-0">
                    <a href="{{ asset('template2/assets/image/img-fasilitas2.jpeg') }}" data-fancybox="madrasah"
                        data-caption="Gedung Madrasah">
                        <img src="{{ asset('template2/assets/image/img-fasilitas2.jpeg') }}" class="card-img-top"
                            alt="Gedung Madrasah" style="border-radius: 8px; width: 100%; height: 16rem;" />
                    </a>
                    <div class="card-body px-0 text-start">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">Gedung
                            Madrasah</p>
                    </div>
                </div>
                <div class="card border-0">
                    <a href="{{ asset('template2/assets/image/img-fasilitas2.jpeg') }}" data-fancybox="madrasah"
                        data-caption="Gedung Madrasah">
                        <img src="{{ asset('template2/assets/image/img-fasilitas2.jpeg') }}" class="card-img-top"
                            alt="Gedung Madrasah" style="border-radius: 8px; width: 100%; height: 16rem;" />
                    </a>
                    <div class="card-body px-0 text-start">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">Gedung
                            Madrasah</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card border-0">
                    <a href="{{ asset('template2/assets/image/img-fasilitas4.png') }}"
                        data-fancybox="gallery labsains" data-caption="Laboratorium Sains">
                        <img src="{{ asset('template2/assets/image/img-fasilitas4.png') }}" class="card-img-top"
                            alt="Laboratorium Sains" style="border-radius: 8px; width: 100%; height: 16rem;" />
                    </a>
                    <div class="card-body px-0 text-start">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">Laboratorium
                            Sains</p>
                    </div>
                </div>
                <div class="card border-0">
                    <a href="{{ asset('template2/assets/image/img-fasilitas6.png') }}"
                        data-fancybox="gallery perpus" data-caption="Perpustakaan">
                        <img src="{{ asset('template2/assets/image/img-fasilitas6.png') }}" class="card-img-top"
                            alt="Perpustakaan" style="border-radius: 8px; width: 100%; height: 16rem;" />
                    </a>
                    <div class="card-body px-0 text-start">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">Perpustakaan
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card border-0">
                    <a href="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" data-fancybox="asrama"
                        data-caption="Asrama Santri">
                        <img src="{{ asset('template2/assets/image/img-fasilitas5.jpeg') }}"  class="card-img-top"
                            alt="Asrama Santri" style="border-radius: 8px; width: 100%; height:574px;" />
                        <a href="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}" data-fancybox="asrama"
                            class="w-100" data-caption="Asrama Santri 1"></a>
                        <a href="{{ asset('template2/assets/image/asrama3.svg') }}" data-fancybox="asrama"
                            data-caption="Asrama Santri 2"></a>
                        <a href="{{ asset('template2/assets/image/asrama4.svg') }}" data-fancybox="asrama"
                            data-caption="Asrama Santri 3"></a>
                    </a>
                    <div class="card-body px-0 text-start d-inline-block">
                        <p class="card-text" style="font-size: 14px; color: #080E1E; font-weight:400;">Masjid</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('components.button-muat')

@include('components.footer')

<script>
    $(document).ready(function() {
        var page = 1;

        $('#load-more').click(function() {
            page++;
            loadMoreData(page);
        });

        function loadMoreData(page) {
            $.ajax({
                url: '?page=' + page,
                type: 'get',
                beforeSend: function() {
                    $('#load-more').html('Muat Lebih Banyak');
                }
            })
            .done(function(data) {
                if(data.html === "") {
                    $('#load-more').addClass('d-none');
                    return;
                }
                $('#load-more').html('Muat Lebih Banyak');
                $('#fasilitas-container').append(data.html);
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                alert('Server not responding...');
            });
        }
    });
</script>
