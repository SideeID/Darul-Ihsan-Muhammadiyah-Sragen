@extends('components.navbar')

@section('style1_content')
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
            <h3 class="mt-5 mb-4 fw-bold">Fasilitas Kami</h3>
        </div>

        <div id="fasilitas-container">
            @include('fasilitas.fasilitas-files')
        </div>
    </div>
</section>

@include('components.button-muat')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
@endsection
