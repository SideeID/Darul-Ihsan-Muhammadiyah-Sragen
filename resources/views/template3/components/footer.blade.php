<!-- Footer -->
@yield('content')

<footer style="background-color: #080E1E;">
    <div class="container footer-container-wrapper">
        <div class="pt-4 align-items-center footer-container">
            <div class="row">
                <div class="col-lg-9 col-md-9">
                    <div class="footer-brand">
                        <img src="{{ asset('template3/image/logo-dimsa.png') }}" alt="" class="py-3 mb-4"
                            style="width: 5rem;">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4 mb-4">
                                <h5 class="text-white">Informasi kontak</h5>
                                <p class="align-items-end" style="color: #98A2B3">
                                    <img src="{{ asset('template3/image/icon/phone.svg') }}" alt="">
                                    081 234 567 890
                                </p>
                                <p style="color: #98A2B3">
                                    <img src="{{ asset('template3/image/icon/mail.svg') }}" alt="">
                                    dimsa@gmail.com
                                </p>
                            </div>
                            <div class="col-12 col-md-8 mb-4">
                                <h5 class="text-white">Alamat</h5>
                                <p style="color: #98A2B3">
                                    <img src="{{ asset('template3/image/icon/location.svg') }}" alt="">
                                    Karang Tengah, Kabupaten Sragen, Jawa Tengah
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <h5 class="text-white pt-3">Sosial media</h5>
                    <div class="d-flex gap-4 my-4 mb-5">
                        <a class="footer-link icon p-0" target="_blank" href="https://www.facebook.com/">
                            <div class="rounded-circle border border-white p-2 d-flex align-items-center justify-content-center"
                                style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('template3/image/icon/Facebook.svg') }}" alt="Facebook">
                            </div>
                        </a>
                        <a class="footer-link icon p-0" target="_blank" href="https://www.instagram.com/">
                            <div class="rounded-circle border border-white p-2 d-flex align-items-center justify-content-center"
                                style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('template3/image/icon/Instagram.svg') }}" alt="Instagram">
                            </div>
                        </a>
                        <a class="footer-link icon p-0" target="_blank" href="https://www.youtube.com/">
                            <div class="rounded-circle border border-white p-2 d-flex align-items-center justify-content-center"
                                style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('template3/image/icon/YouTube.svg') }}" alt="YouTube">
                            </div>
                        </a>
                        <a class="footer-link icon p-0" target="_blank" href="https://www.tiktok.com/">
                            <div class="rounded-circle border border-white p-2 d-flex align-items-center justify-content-center"
                                style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('template3/amba/tiktok-without-border.svg') }}" alt="tiktok">
                            </div>
                        </a>
                        <a class="footer-link icon p-0" target="_blank" href="https://www.x.com/">
                            <div class="rounded-circle border border-white p-2 d-flex align-items-center justify-content-center"
                                style="box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);">
                                <img src="{{ asset('template3/amba/x-without-border.svg') }}" alt="x">
                            </div>
                        </a>
                    </div>
                    <a class="btn-kontak btn btn-light py-3 px-4 text-dark d-flex align-items-center justify-content-center fw-bold"
                        href="" target="_blank">
                        <img src="{{ asset('template2/assets/image/whatsapp.svg') }}" alt="">Kontak Kami
                    </a>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-start text-md-center mt-4 border-top py-3"
            style="color: #667085; font-weight:500;">
            <p class="mb-0">Copyright &copy; 2024 | Ponpes Muhammadiyah 1 Sragen</p>
        </div>
    </div>
</footer>

<style>
    .btn-kontak img {
        width: 20px;
        margin-right: 10px;
    }

    @media (min-width: 320px) and (max-width: 767px) {
        .footer-container {
            flex-direction: column !important;
            justify-content: flex-start !important;
            align-items: flex-start !important;
            gap: 20px !important;
        }

        .footer-container-wrapper {
            padding-bottom: 25px !important;
            padding-left: 15px !important;
            padding-right: 15px !important;
        }

        .btn-kontak {
            width: 100% !important;
        }
    }
</style>
