@include('components.navbar')

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

    #hero-ekskul {
        height: 700px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("../template3/image/hd-ekskul.jpg");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        display: flex;
    }

    .page-link {
        border: none;
        color: black;
    }

    .active>.page-link,
    .page-link.active {
        border-radius: 8px;
    }
</style>

<setion id="hero-ekskul" class="program-hero-section pt-0" style="height:100vh;">
    {{-- <div class="layer position-absolute"
        style="background-color: rgba(0, 0, 0, 0.6); z-index:1; width: 100%; height:100%;"></div> --}}
    <div class="container d-flex align-items-end" style=" padding: 50px 20px;">
        <div class="col-lg-6 col-sm-12">
            <h2 class="program-page-title mb-2 text-white">Ekstrakurikuler</h2>
            <p class="program-page-subtitle text-white" style="text-align:justify;">
                Kegiatan ekstrakurikuler di Pondok Pesantren Darul Ihsan Muhammadiyah Sragen menawarkan berbagai pilihan
                untuk mengembangkan potensi santri. Kegiatan seperti seni baca Al-Qur'an, pidato, debat, olahraga, dan
                organisasi membantu santri menyalurkan bakat dan minat mereka. Ekstrakurikuler ini bertujuan membangun
                keterampilan sosial, kepemimpinan, dan karakter santri agar siap berkontribusi positif di masyarakat.
            </p>
        </div>
    </div>
</setion>

<section id="program-ekstrakulikuler">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($ekskul as $item)
                <div class="col-lg-4 col-md-6 col-12 mb-4 d-flex justify-content-center">
                    <a class="jenis-ekstra" href="{{ $item->url }}" data-fancybox="ekstrakulikuler"
                        data-caption="{{ $item->nama }}" data-type="iframe">
                        <div class="position-relative">
                            <img src="{{ asset($item->thumbnail) }}" class="img-fluid rounded"
                                alt="{{ $item->nama }}">
                            <div class="overlay ease-in-out">
                                <div class="text-container">
                                    <h5 class="text-decoration-none font-weight-normal text-white">{{ $item->nama }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <hr>
        @if ($ekskul->isNotEmpty())
            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                <ul class="pagination">
                    <li class="page-item {{ $ekskul->onFirstPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $ekskul->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    @for ($i = 1; $i <= $ekskul->lastPage(); $i++)
                        <li class="page-item {{ $ekskul->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $ekskul->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="page-item {{ $ekskul->currentPage() == $ekskul->lastPage() ? 'disabled' : '' }}">
                        <a class="page-link" href="{{ $ekskul->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif
    </div>
</section>

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
                        <div class="caption-custom-container text-center text-white p-5 d-flex justify-content-between align-items-center">
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


@include('components.footer')
