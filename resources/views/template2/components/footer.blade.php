<!-- Footer -->
<footer style="background-color: #080E1E;">
    <div class="container footer-container-wrapper">
        <div class="py-4 d-flex justify-content-between align-items-center footer-container">
            <div class="footer-brand">
                <img src="{{ asset('template2/assets/image/brand-darunnajah.svg') }}" alt="" style="width: 5rem;">
            </div>
            <div class="footer-copyright" style="font-size: 18px; color: #5A5F6D; font-weight:400;">
                Copyright&#169; 2024 | SMP Darun Najah 2
            </div>
            <a class="btn-kontak btn btn-light py-3 px-4 text-dark d-flex align-items-center justify-content-center fw-bold"
                href="https://wa.me/6281222774006" target="_blank">
                <img src="{{ asset('template2/assets/image/whatsapp.svg') }}" alt="">Kontak Kami
            </a>
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
