<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PCNU Batu</title>

    <link href="{{ asset('css/satoshi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base/typography.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/form.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landingpage/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('landingpage/assets/css/custom.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="shortcut icon" type="image/png" href="{{ url('/image/logo-login-nubatu.svg') }}" />
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Moment JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <!-- animation on scroll -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('landingpage/src/bootstrap.bundle.min.js') }}"></script>
    <!-- Swiper -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <style>
        #loading_screen {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: #ffffff;
            z-index: 1100;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bars {
            width: 50.4px;
            height: 67.2px;
            --c: linear-gradient(#00923F 0 0);
            background: var(--c) 0% 50%,
                var(--c) 50% 50%,
                var(--c) 100% 50%;
            background-size: 10.1px 50%;
            background-repeat: no-repeat;
            animation: bars-7s9ul0md 1s infinite linear alternate;
        }

        @keyframes bars-7s9ul0md {
            20% {
                background-size: 10.1px 20%, 10.1px 50%, 10.1px 50%;
            }

            40% {
                background-size: 10.1px 100%, 10.1px 20%, 10.1px 50%;
            }

            60% {
                background-size: 10.1px 50%, 10.1px 100%, 10.1px 20%;
            }

            80% {
                background-size: 10.1px 50%, 10.1px 50%, 10.1px 100%;
            }
        }
    </style>

    <script>
        var path = "{{ url('/') }}";

        AOS.init({
            once: true
        });

        function req(opt = null) {
            $.ajax({
                dataType: 'json',
                xhrFields: {
                    withCredentials: true
                },
                beforeSend: (xhr) => {
                    // showAlert(msg = "Loading...", type = 'info', false);
                    showLoading();
                    return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                error: function(x, status, error) {
                    if (x.status == 401) {
                        console.log("Sorry, your session has expired. Please login again to continue");
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showAlert(msg = "Request tidak sesuai", type = 'danger');
                        closeLoading();
                    }
                },
                ...opt
            }).done(function() {
                // closeAlert();
                var urlChecking = window.location.pathname.split('/')
                var checking = urlChecking.pop();
                if (urlChecking[2] == 'monitoring' && (urlChecking[3] == 'pendapatan' || urlChecking[3] == 'potongan')) {
                    if (opt.url.pathname == '/api/review/gaji-pegawai' || opt.url.pathname == '/api/monitoring/status') {
                        closeLoading();
                    }
                } else {
                    closeLoading();
                }
            });
        }

        function showAlert(msg = "Proses berhasil", type = 'success', autoclose = true) {
            if (typeof msg === 'object') {
                if ((msg.data).hasOwnProperty('errors')) {
                    const errors = msg.data.errors;
                    let message = '';
                    let inc = 0;
                    for (const i in errors) {
                        if (inc > 0) message += ' ';
                        inc++;
                        message += inc + '. ' + errors[i].join(' ');
                    }
                    showAlert(message, 'danger');
                } else {
                    showAlert(msg.message, 'danger');
                }
                return true;
            }

            $('#set_alert').attr('class', 'alert fw-500 alert-dismissible alert-' + type);
            $('#set_alert div').html(msg);

            if (autoclose) {
                setTimeout(function() {
                    $('#set_alert').attr('class', 'alert fw-500 alert-dismissible d-none alert-success');
                    $('#set_alert div').html(msg);
                }, 5000);
            }
            return true;
        }

        function closeAlert() {
            $('#set_alert').attr('class', 'alert fw-500 alert-dismissible d-none alert-success');
        }

        function showLoading() {
            $('#loading_screen').show();
        }

        function closeLoading() {
            $('#loading_screen').hide();
        }
    </script>
</head>

<body>
    <section id="loading_screen">
        <div class="bars"></div>
    </section>
    <div class="w-100 m-0 p-0 font-satoshi">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg px-2 px-lg-0" style="background-color: #edf6f0">
            <div class="container justify-content-between">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('landingpage/assets/icons/header-logo.svg') }}" alt="header-logo" />
                </a>
                <button class="navbar-toggler border-0 shadow-none p-0 rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="outline: none">
                    <img src="{{ asset('landingpage/assets/icons/menu.svg') }}" alt="menu" />
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-0 gap-lg-3 pt-3 pt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('/')) ? 'active fw-bold' : '' }}" href="{{ url('/') }}">Beranda</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/koin-nusantara') }}">Koin NUsantara</a>
                        </li> -->
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('nderek-tangklet*')) ? 'active fw-bold' : '' }}" href="{{ url('/nderek-tangklet') }}">Nderek Tangklet</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('berita*')) ? 'active fw-bold' : '' }}" href="{{ url('/berita') }}">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('artikel*')) ? 'active fw-bold' : '' }}" href="{{ url('/artikel') }}">Artikel</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('pengurus*')) ? 'active fw-bold' : '' }}" href="{{ url('/pengurus') }}">Pengurus</a>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-lg-flex align-items-center gap-3">
                    <a href="#">
                        <img src="{{ asset('landingpage/assets/icons/sms.svg') }}" alt="sms" />
                    </a>
                    <a href="#">
                        <img src="{{ asset('landingpage/assets/icons/instagram.svg') }}" alt="instagram" />
                    </a>
                    <a href="#">
                        <img src="{{ asset('landingpage/assets/icons/whatsapp.svg') }}" alt="whatsapp" />
                    </a>
                </div>
            </div>
        </nav>

        {{ $slot }}

        <!-- footer -->
        <footer class="w-100 p-0 m-0 text-white">
            <div class="container py-5 pb-4">
                <div class="d-flex justify-content-between my-5 footer-content-container">

                    <div class="d-flex footer-left">
                        <div class="footer-title">
                            <img src="{{ asset('landingpage/assets/images/footer-logo.svg') }}" alt="" class="mb-4">
                            <p class="footer-sub">
                                Official Website Pengurus Cabang Nahdlatul Ulama Kota Batu
                            </p>
                        </div>

                        <div class="footer-menu d-flex align-self-end  gap-5">
                            <div class="footer-menu-content">
                                <p class="fw-semibold mb-3">
                                    Menu
                                </p>
                                <a href="{{ url('/') }}" class="text-decoration-none pb-3 text-white">
                                    Beranda
                                </a>
                                <br>
                                <a href="/nderek-tangklet/" class="text-decoration-none mb-3 text-white">
                                    Nderek Tanglet
                                </a>
                                <br>
                                <a href="{{ url('/berita') }}" class="text-decoration-none mb-3 text-white">
                                    Berita
                                </a>
                                <br>
                                <a href="{{ url('/artikel') }}" class="text-decoration-none mb-3 text-white">
                                    Artikel
                                </a>
                                <br>
                                <a href="{{ url('/pengurus') }}" class="text-decoration-none mb-3 text-white">
                                    Pengurus
                                </a>
                            </div>
                            <div class="">
                                <p class="fw-semibold mb-3">
                                    Office
                                </p>
                                <p class="m-0">
                                    Jl. Agus Salim No.21 - 23, <br> Sisir, Kec. Batu, Kota Batu, <br> Jawa Timur 65314
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3">
                        <a href="#" class="">
                            <img src="{{ asset('landingpage/assets/icons/Facebook-footer.svg') }}" alt="">
                        </a>
                        <a href="#" class="">
                            <img src="{{ asset('landingpage/assets/icons/Instagram-footer.svg') }}" alt="">
                        </a>
                        <a href="#" class="">
                            <img src="{{ asset('landingpage/assets/icons/WhatsApp-footer.svg') }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="footer-copy-container d-flex justify-content-center align-items-center mt-4 p-3">
                    <p class="copy m-0">
                        PCNU Kota Batu. All Right Reserved
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <script>
        AOS.init({
            once: true
        });
    </script>

    <script>
    </script>
    <script>
        const swiper2 = new Swiper('.mySwiper2', {
            spaceBetween: 0,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</body>

</html>