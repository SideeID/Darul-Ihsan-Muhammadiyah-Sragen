<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SMP Darun Najah 2</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('template2/assets/image/logo-smp.png') }}" />
    <!-- Fonts -->
    <link href="{{ asset('css/satoshi.css') }}" rel="stylesheet">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script defer src="{{ asset('template2/js/form.js') }}"></script>
    <script defer src="{{ asset('template2/js/alert.js') }}"></script>
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
    {{-- <link href="{{ asset('css/base/reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base/background.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/base/typography.css') }}" rel="stylesheet">
    <!-- CSS Component -->
    <link href="{{ asset('template2/css/Admin/components/form.css') }}" rel="stylesheet">
    <link href="{{ asset('template2/css/Admin/components/button.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/components/badge.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/topmenu.css') }}" rel="stylesheet"> --}}
    <!-- CSS Layout -->
    {{-- <link href="{{ asset('css/layout/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/body.css') }}" rel="stylesheet"> --}}
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

        #alert-username, #alert-password, #alert-daftar {
            position: absolute;
            top: 0%;
            right: 1.5%;
            z-index: 100;
        }

        .wrappers {
            width: 100%;
            margin: 0 auto;
            background-image: url("../../template2/assets/image/Admin/bg-login.svg");
            background-repeat: no-repeat;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            align-content: center;
            object-fit: cover;
        }

        .wrappers .left .logo img {
            width: 20%;
            margin: auto;
            display: block;
        }

        .wrappers .left {
            display: flex;
            justify-content: center;
            align-items: center;
            float: left;
            width: 50%;
            height: 100vh;
            padding: 20px;
        }

        .wrappers .right {
            display: flex;
            float: right;
            width: 50%;
            height: 100vh;
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
            }

            .wrappers .left .logo h4 {
                padding: 0 0 0 10px;
                color: #ffffff;
                font-size: 24px;
                line-height: 28px;
                font-weight: 700;
                text-align: center;
            }

            .wrappers .left .logo img {
                display: none;
            }

            .wrappers .left .logo-text {
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
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .wrappers .right .login-card .card .card-body .logo-mobile .logo-text h3 {
                font-size: 16px;
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
            }

            .wrappers .left {
                width: 100%;
                height: 100px;
                padding-top: 100px;
                background: #009B4C;
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
        @include('admin.components.alert-daftar-akun')
        @include('admin.components.alert-username')
        @include('admin.components.alert-password')

        <div class="left d-flex flex-column">
            <div class="logo mb-3">
                <img src="{{ asset('template2/assets/image/logo-smp.png') }}" class="login-logo" alt="">
            </div>
            <div class="logo-text text-center">
                <h3 class="text-white fw-bold">SMP DARUN NAJAH 2 <br>KARANGPLOSO</h3>
            </div>
        </div>
        <div class="right justify-content-center">
            <div class="login-card">
                <div class="card p-2">
                    <div class="card-body">
                        <div class="logo-mobile">
                            <img src="{{ asset('template2/assets/image/logo-smp.png') }}" class="login-logo"
                                alt="" style="width: 60px;">
                            <div class="logo-text text-center mt-3">
                                <h3>SMP DARUN NAJAH 2 <br>KARANGPLOSO</h3>
                            </div>
                        </div>
                        <h2 class="card-title fw-bold">Selamat Datang di SMP Darun Najah 2👋</h2>
                        @if ($errors->any())
                            <div>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form id="form" class="form" method="POST" action="{{ route('login.store') }}">
                            @csrf
                            <div class="input-wrap mb-3 pt-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" name="email" id="username" placeholder="Username">
                                <div class="error"></div>
                            </div>
                            <div class="input-wrap mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input input-key d-flex">
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" aria-label="Password" aria-describedby="showPassword">
                                    <span class="input-group-text" id="showPassword"><img
                                            src="{{ asset('template2/assets/image/Admin/eye-slash.svg') }}"
                                            alt="">
                                    </span>
                                    <div class="error"></div>
                                </div>
                            </div>

                            <div class="col-12">
                                <button id="login-btn" type="submit" class="btn btn-primary mb-1 col-12">Login</button>
                                <a href="" class="btn btn-outline-primary border-0 col-12">Daftar Akun</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
