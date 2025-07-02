@extends('components.navbar')

@section('style1_content')
<style>
    @font-face {
        font-family: "SF UI";
        src: url("fonts/SFUIText-Bold.woff") format("woff");
    }

    @font-face {
        font-family: "Dancing Script";
        src: url("fonts/DancingScript-VariableFont_wght.ttf") format("truetype");
    }

    @media screen and (max-width: 768px) {
        h1 {
            font-size: 36px;
            line-height: 1.1;
        }

        .ekskul img {
            margin-left: 30%;
            margin-top: 10px;
            margin-bottom: 10px;
        }


    }


    .ekskul img {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .jenis-ekstra {
        position: relative;
        display: block;
        text-decoration: none;
    }

    .jenis-ekstra .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.5s ease-in-out;
        display: flex;
        border-radius: 0.25rem;
    }

    .jenis-ekstra:hover .overlay {
        opacity: 1;
    }


    .jenis-ekstra .text-container {
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 10px;
        width: 100%;
    }

    .jenis-ekstra h5 {
        color: white;
        text-align: left;
        font-size: 20px
    }
</style>

<section id="program-ekstrakulikuler">
    <div class="container">
        <div class="mt-0 ekskul row col-md-6 col-10 justify-content-end mt-md-4">
            <img src="{{ asset('template2/images/ekstra.png') }}">
        </div>

        <!-- Grid Gambar Ekstrakurikuler -->
        <div class="row justify-content-center">
            @foreach($ekskul as $item)
                <div class="mb-4 col-lg-4 col-md-6 col-12 d-flex justify-content-center">
                    <a class="jenis-ekstra" href="{{ $item->url }}" data-fancybox="ekstrakulikuler"
                        data-caption="{{ $item->nama }}" data-type="iframe">
                        <div class="position-relative">
                            <img src="{{ asset($item->thumbnail) }}" class="rounded img-fluid"
                                alt="{{ $item->nama }}">
                            <div class="ease-in-out overlay">
                                <div class="text-container">
                                    <h5 class="text-white text-decoration-none font-weight-normal">{{ $item->nama }}</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        Fancybox.bind('[data-fancybox="ekstrakulikuler"]', {
            Thumbs: false,
        });

        document.addEventListener("DOMContentLoaded", () => {
            const ekstrakurikulerItems = document.querySelectorAll('.jenis-ekstra');
            ekstrakurikulerItems.forEach((item, index) => {
                const totalItems = ekstrakurikulerItems.length;
                const title = item.getAttribute('data-caption');
                const captionHTML =
                    `<div class="container position-fixed fixed-caption-custom w-100 px-lg-5 px-md-0">
                        <div class="p-5 text-center text-white caption-custom-container d-flex justify-content-between align-items-center">
                            <h3 class="m-0">
                                ${title}
                            </h3>
                            <div class="m-0 fancy-sum">
                                ${index + 1} <span class="text-secondary">of ${totalItems}</span>
                            </div>
                        </div>
                    </div>`;
                item.setAttribute('data-caption', captionHTML);
            });
        });
    </script>
    {{--  fancybox style  --}}
    <style>
        .fixed-caption-custom {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            z-index: 1000;
        }

        @media (min-width: 320px) and (max-width: 767px) {
            .fixed-caption-custom {
                top: 23vh;
            }

            .caption-custom-container {
                padding-left: 8px !important;
                padding-right: 8px !important;
            }

            .fixed-caption-custom h3 {
                font-size: 16px !important;
            }

            .fixed-caption-custom .fancy-sum {
                font-size: 12px !important;
            }

            #program-ekstrakulikuler {
                padding-left: 5px !important;
                padding-right: 5px !important;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {
            .fixed-caption-custom {
                top: 20vh;
            }

            .caption-custom-container {
                padding-left: 0 !important;
                padding-right: 0 !important;
            }
        }

        @media (min-width: 1400px) {
            .fixed-caption-custom {
                max-width: 1100px !important;
            }

            .caption-custom-container {
                padding-top: 20px !important;
            }
        }
    </style>

</section>
@endsection
