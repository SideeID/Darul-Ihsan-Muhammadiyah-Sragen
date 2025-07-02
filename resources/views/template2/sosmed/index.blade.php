@extends('components.navbar')

@section('style1_content')
<style>
    #instagram {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 32px;
        margin-bottom: 64px;
    }

    .instagram {
        width: 100%;
        height: 296px;
        border-radius: 8px;
        object-fit: cover;
    }

    #youtube {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 32px;
        margin-bottom: 64px;
    }

    .youtube {
        width: 100%;
        height: 360px;
        border-radius: 8px;
        object-fit: cover;
    }

    #wa {
        display: grid;
        grid-template-columns: repeat(4, minmax(0, 1fr));
        gap: 32px;
        margin-bottom: 64px;
    }

    .wa {
        width: 100%;
        height: 520px;
        border-radius: 8px;
    }

    @media only screen and (max-width:1440px) {
        #instagram {
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }
    }

    @media only screen and (max-width:768px) {
        #instagram {
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 24px;
        }

        #youtube {
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 32px;
        }

        #wa {
            grid-template-columns: repeat(1, minmax(0, 1fr));
            gap: 32px;
        }
    }
</style>
<section id="galeri-page">
    <div class="container mt-4 overflow-hidden">
        <div class="mt-5 mb-5 header-galeri d-flex justify-content-between align-items-center">
            <h3 class="m-0 fw-bold galeri-page-title">Sosial Media</h3>
        </div>

        <h5 class="mb-4">Instagram</h5>

        <div id="instagram">
            @include('sosmed.card', ['items' => $instagram])
        </div>

        <h5 class="mb-4">Youtube</h5>

        <div id="youtube">
            @include('sosmed.card', ['items' => $youtube])
        </div>

        <h5 class="mb-4">Youtube Short</h5>

        <div id="wa">
            @include('sosmed.card', ['items' => $youtubeShort])
        </div>
    </div>

</section>
@endsection
