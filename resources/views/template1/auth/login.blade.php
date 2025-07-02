<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PCNU Batu</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('/image/pcnu.svg') }}" />
    <!-- Fonts -->
    <link href="{{ asset('css/satoshi.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- vendor/coreui/vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendor/coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/vendors/simplebar.css') }}">
    <!-- Main styles for this application-->

    {{-- Cookie --}}
    <script src="https://cdn.jsdelivr.net/npm/js-cookie/dist/js.cookie.min.js"></script>

    {{-- Axios --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/style.css') }}">
    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendor/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    <!-- Custom CSS-->
    <!-- CSS Base -->
    <link href="{{ asset('css/base/reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base/background.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base/typography.css') }}" rel="stylesheet">
    <!-- CSS Component -->
    <link href="{{ asset('css/components/button.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/badge.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/topmenu.css') }}" rel="stylesheet">
    <!-- CSS Layout -->
    <link href="{{ asset('css/layout/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/body.css') }}" rel="stylesheet">
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
            color: #000;
        }

        .text-success {
            color: #00923F !important;
        }

        .wrappers {
            width: 100%;
            margin: 0 auto;
            background: #009B4C;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
        }

        .wrappers .left .logo img {
            width: 90%;
            margin: auto;
            display: block;
        }

        .wrappers .left {
            display: flex;
            justify-content: center;
            align-items: center;
            float: left;
            width: 25%;
            height: 100vh;
            background: #EFF3F8;
            padding: 20px;
            background-image: url(./../../image/left1.png);
            background-repeat: no-repeat;
            background-position: bottom center;
            background-size: contain;
        }

        .wrappers .right {
            display: flex;
            float: right;
            width: 75%;
            height: 100vh;
            justify-content: center;
            background-image: url(./../../image/left2.png), url(./../../image/right.png);
            background-repeat: no-repeat;
            background-position: bottom left, top right;
            background-size: 40%;
        }

        .wrappers .right .login-card {
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
        }

        .wrappers .right .login-card .card {
            width: 470px;
            border-radius: 12px;
        }

        .wrappers .right .login-card .card .card-body .logo-mobile {
            display: none;
        }

        .wrappers .right .login-card .card .card-body h3 {
            color: #000000;
            font-size: 24px;
            line-height: 28px;
            font-weight: 700;
        }

        .wrappers .right .login-card .card .card-body h6 {
            font-size: 16px;
            line-height: 24px;
            color: #667085;
            font-weight: 500;
        }

        .wrappers .right .login-card .card .card-body .input-group {
            margin-bottom: 20px;
        }

        .wrappers .right .login-card .card .card-body .text p {
            color: #000000;
            font-size: 12px;
            line-height: 16px;
            font-weight: 400;
            margin-bottom: 40px;
        }

        .btn-success {
            border-color: #00923F !important;
            background: #00923F !important;
            color: #ffffff !important;
            border-radius: 12px !important;
        }

        #login-btn {
            margin-top: 64px;
        }

        @media(max-width: 767px) {
            .wrappers {
                flex-direction: column;
            }

            .wrappers .left {
                width: 100%;
                height: 100px;
                padding-top: 100px;
                background: #009B4C;
            }

            .wrappers .left .logo h4 {
                padding: 0 0 0 10px;
                color: #ffffff;
                font-size: 24px;
                line-height: 28px;
                font-weight: 700;
                text-align: center;
            }

            .wrappers .left .logo p {
                color: #ffffff;
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                text-align: center;
            }

            .wrappers .left .logo img {
                display: none;
            }

            .wrappers .right {
                background-image: none;
                height: 500px;
            }

            .wrappers .right .login-card .card {
                width: 18rem;
            }

            .wrappers .right .login-card .card .card-body .logo-mobile {
                display: flex;
                justify-content: center;
            }

            .wrappers .right .login-card .card .card-body .card-title {
                display: none;
            }

            .wrappers .right .login-card .card .card-body .card-subtitle {
                display: none;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .wrappers {
                flex-direction: column;
                background-image: url(./../../image/left2.png);
                background-repeat: no-repeat;
                background-position: bottom left;
                background-size: 30%;
            }

            .wrappers .left {
                width: 100%;
                height: 100px;
                padding-top: 100px;
                background: #009B4C;
                background-image: url(./../../image/right.png);
                background-repeat: no-repeat;
                background-position: top right;
                background-size: 20%;
            }

            .wrappers .left .logo img {
                display: none;
            }

            .wrappers .left .logo h4 {
                padding: 0 0 0 10px;
                color: #ffffff;
                font-size: 24px;
                line-height: 28px;
                font-weight: 700;
                text-align: center
            }

            .wrappers .left .logo p {
                color: #ffffff;
                font-size: 16px;
                line-height: 24px;
                font-weight: 400;
                text-align: center
            }

            .wrappers .right {
                background-image: none;
                height: 500px;
            }

            .wrappers .right .login-card .card {
                width: 24rem;
            }

            .wrappers .right .login-card .card .card-body .logo-mobile {
                display: flex;
                justify-content: center;
            }

            .wrappers .right .login-card .card .card-body .card-title {
                display: none;
            }

            .wrappers .right .login-card .card .card-body .card-subtitle {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="wrappers min-vh-100">
        <div class="left">
            <div class="logo">
                <img src="{{ asset('image/logo-login-nubatu.svg') }}" class="login-logo" alt="">
            </div>
        </div>
        <div class="right">
            <div class="login-card">
                <div class="card p-2">
                    <div class="card-body">
                        <div class="logo-mobile">
                            <img src="{{ asset('image/logo-login-nubatu.svg') }}" class="login-logo" alt="" style="height: 60px;">
                        </div>
                        <h3 class="card-title">Selamat Datang di PCNU Batu 👋</h3>
                        <h6 class="card-subtitle mb-3">Meneguhkan Peran Khidmah dan Aktualisasi Visi Multilateral An-Nahdliyyah</h6>
                        <hr>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group pt-3">
                                <input type="email" name="email" class="form-control" placeholder="Email" id="email" aria-label="Email" aria-describedby="Email">
                            </div>
                            <div class="input-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showPassword">
                                <span class="input-group-text" id="showPassword"><img src="{{ asset('image/icon/password.svg') }}" alt=""></span>
                            </div>
                            <div class="col-12">
                                <button id="login-btn" class="btn btn-success mb-1 col-12"> LOGIN</button>
                                <a href="" class="btn btn-outline-success border-0 col-12">DAFTAR AKUN</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let base_path = `{{ URL::to('/') }}`;

        $('#showPassword').click(function() {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            if (passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
            } else {
                passwordField.attr('type', 'password');
            }
        });
    </script>
</body>

</html>