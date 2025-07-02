<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ "CMS - Darun Najah" }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('/template2/images/logo.png') }}" />

    <!-- Fonts -->
    <link href="{{ asset('css/satoshi.css') }}" rel="stylesheet">
    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- vendor/coreui/vendors styles-->
    <link rel="stylesheet" href="{{ asset('vendor/coreui/vendors/simplebar/css/simplebar.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/vendors/simplebar.css') }}">

    <!-- Main styles for this application-->
    <link rel="stylesheet" href="{{ asset('vendor/coreui/css/style.css') }}">

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('vendor/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/coreui/vendors/simplebar/js/simplebar.min.js') }}"></script>
    {{-- JS Cookie --}}
    <script src="https://cdn.jsdelivr.net/npm/js-cookie/dist/js.cookie.min.js"></script>
    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/i18n/id.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Jquery Timepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>

    <!-- Custom CSS-->
    <!-- CSS Vendor -->
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet">
    <!-- CSS Base -->
    <link href="{{ asset('css/base/reboot.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base/background.css') }}" rel="stylesheet">
    <link href="{{ asset('css/base/typography.css') }}" rel="stylesheet">
    <!-- CSS Vendor -->
    <link href="{{ asset('css/vendor/ckeditor.css') }}" rel="stylesheet">
    <!-- CSS Component -->
    <link href="{{ asset('css/components/alert.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/breadcrumb.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/button.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/file-list.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/img-preview.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/indicator.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/stepper.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/components/topmenu.css') }}" rel="stylesheet">
    <!-- CSS Layout -->
    <link href="{{ asset('css/layout/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/notifikasi.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/body.css') }}" rel="stylesheet">
    <link href="{{ asset('css/layout/footer.css') }}" rel="stylesheet">
    <!-- CSS Pages -->
    <link href="{{ asset('css/pages/ads.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/donatur.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/program.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pages/tanglet.css') }}" rel="stylesheet">
     <!-- CSS Pages tentang-kami-->
    <link rel="stylesheet" href="{{ asset('template2/css/tentangkami.css') }}">

    <!-- Flatpickr/setting kalender CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr/setting kalender JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{-- Font Awesome --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        .capitalize {
            text-transform: capitalize;
        }

        #loading_screen {
            position: fixed;
            width: 100%;
            height: 100vh;
            background: rgba(255, 255, 255, 0.75);
            z-index: 1100;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bars {
            width: 50.4px;
            height: 67.2px;
            --c: linear-gradient(#673D94 0 0);
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

        .table-btn-search,
        div.notif-list-item {
            cursor: pointer;
        }

        .btn img {
            vertical-align: top;
        }

        .td-active-red {
            background-color: #EE5E5F !important;
            color: #ffffff !important;
        }

        .btn-outline-info:hover {
            background-color: unset;
        }

        .btn-outline-info {
            border-color: #76D4F5;
        }
    </style>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5F6FA;
        }

        .sidebar {
            background-color: #060313;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            color: white;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.3s ease;
            z-index: 1030;
        }

        .sidebar.shrink {
            width: 80px;
        }

        .sidebar.shrink .nav-link {
            justify-content: center;
        }

        .sidebar.shrink .nav-link .nav-icon {
            margin-right: 0;
        }

        .sidebar .sidebar-header {
            display: flex;
            text-align: left;
            padding: 20px;
            align-items: center;
        }

        .sidebar .sidebar-header img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .sidebar.shrink .sidebar-header h5 {
            display: none;
        }

        html:not([dir="rtl"]) .sidebar-nav .nav-group-items .nav-link {
            padding-left: 30px;
        }

        .sidebar .nav-link {
            color: #b1bccb;
            display: flex;
            align-items: center;
            padding: 15px 30px;
            text-decoration: none;
            transition: background 0.3s ease;
            margin: 0 20px;
        }

        .sidebar-nav .nav-item, .sidebar-nav .nav-group {
            padding: initial;
        }

        .sidebar .nav-link.active {
            background-color: #3C7B46;
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover {
            background-color: #28a745;
            color: white;
            border-radius: 8px;
        }

        .sidebar .nav-icon {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }

        .sidebar .nav-sub {
            margin-right: 10px;
            width: 20px;
            height: 20px;
        }

        .sidebar.shrink .nav-link span {
            display: none;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar-footer {
            padding: 20px;
        }

        .sidebar-footer .admin-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            border-radius: 10px;
            background-color: #FFFFFF0D;
            cursor: pointer;
        }

        .sidebar-footer .admin-info img {
            margin-right: 20px;
        }

        .sidebar.shrink .sidebar-footer {
            justify-content: center;
        }

        .sidebar.shrink .admin-info .admin-text {
            display: none;
        }

        .navbar-custom {
            background-color: white;
            border-bottom: 1px solid #e9ecef;
            padding: 10px 20px;
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 60px;
            transition: all 0.3s ease;
        }

        .navbar-custom .navbar-toggler {
            display: block;
            border: none;
            background: none;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            margin-top: 60px;
            transition: all 0.3s ease;
        }

        .main-content.shrink {
            margin-left: 80px;
        }

        .sidebar-nav .nav-icon {
            flex: initial;
        }

        /* .sidebar .nav-group-items .nav-link .nav-icon, .sidebar .nav-group-items .nav-link.active .nav-icon {
            background-image: url("{{ asset('template2/images/drop.png') }}");
            background-repeat: no-repeat;
            background-position: center;
        } */





        .sidebar {
    transition: all 0.3s ease;
    width: 250px; /* Sesuaikan dengan lebar asli sidebar */
}

.sidebar.hide {
    width: 80px; /* Lebar sidebar saat dikecilkan */
}

.sidebar-brand-full {
    transition: all 0.3s ease;
}

.sidebar-brand-narrow {
    transition: all 0.3s ease;
}

.sidebar.hide .sidebar-brand-full {
    display: none;
}

.sidebar.hide .sidebar-brand-narrow {
    display: block !important;
}

.sidebar-text {
    transition: all 0.3s ease;
    white-space: nowrap;
    overflow: hidden;
}

.sidebar.hide .sidebar-text {
    opacity: 0;
    width: 0;
}

.main-content {
    transition: margin-left 0.3s ease;
    margin-left: 250px; /* Sesuaikan dengan lebar asli sidebar */
}

.main-content.sidebar-hidden {
    margin-left: 60px; /* Sesuaikan dengan lebar sidebar saat dikecilkan */
}
    </style>

<style>
    .sidebar-text {
    transition: opacity 0.3s ease, width 0.3s ease;
    white-space: nowrap;
    overflow: hidden;
}

.sidebar.shrink .sidebar-text {
    opacity: 0;
    width: 0;
    display: none;
}

.admin-subtitle {
    transition: opacity 0.3s ease, width 0.3s ease;
}

.sidebar.shrink .admin-subtitle {
    opacity: 0;
    width: 0;
    display: none;
}
.admin-title {
    transition: opacity 0.3s ease, width 0.3s ease;
}

.sidebar.shrink .admin-title {
    opacity: 0;
    width: 0;
    display: none;
}

.nav-group-items{
    list-style-type: none;
}

.th-content {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    width: 100%;
}

.th-content span {
    margin-right: 4px;
}

.th-content img {
    width: 12px;
    height: auto;
}

.notification-merah {
        display: flex;
        align-items: flex-start;
        /* Supaya icon berada di bagian kiri dan text di kanan */
        justify-content: flex-start;
        position: relative;
        /* Agar tombol close bisa diatur absolut */
        padding: 10px;
        background-color: #FFE1DF;
        border-radius: 5px;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        width: 300px;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        /* Pastikan lebih tinggi dari modal */
    }

    /* Atur ikon di sebelah kiri */
    .notification-merah-icon {
        margin-right: 10px;
    }

    /* Pesan di sebelah kanan icon */
    .notification-text {
        display: flex;
        flex-direction: column;
        /* Susun vertikal antara h6 dan p */
    }

    .notification-merah .notification-text h6 {
        margin: 0;
        font-weight: 600;
        color: #D32246;
    }

    .notification-hijau {
        display: flex;
        align-items: flex-start; /* Supaya icon berada di bagian kiri dan text di kanan */
        justify-content: flex-start;
        position: relative; /* Agar tombol close bisa diatur absolut */
        padding: 10px;
        background-color: #E6F4EA;
        border-radius: 5px;
        color: #333;
        font-family: Arial, sans-serif;
        font-size: 14px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        width: 300px;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050; /* Pastikan lebih tinggi dari modal */
    }

    .notification-hijau-icon {
        margin-right: 10px;
    }

    /* Pesan di sebelah kanan icon */
    .notification-text {
        display: flex;
        flex-direction: column; /* Susun vertikal antara h6 dan p */
    }

    .notification-hijau .notification-text h6 {
        margin: 0;
        font-weight: 600;
        color: #3C7B46;
    }
    .hidden {
    display: none;
    }

    .notification-text p {
        margin: 0;
        color: #666;
        font-size: 12px;
    }

    /* Tombol close di pojok kanan atas */
    .close-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: none;
        border: none;
        color: #666;
        font-size: 16px;
        cursor: pointer;
    }
</style>

    @yield('head')

    <script>
        var path = "{{ url('/') }}";
        var cookie_name = "{{ env('APP_COOKIE_NAME') }}";
        var arrBulan = ['', 'JANUARI', 'FEBRUARI', 'MARET', 'APRIL', 'MEI', 'JUNI', 'JULI', 'AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];
        var setTableData = {};

        function capitalizeString(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // format rupiah
        function rupiah(nominal, type = null) {
            if (nominal === null || nominal === undefined) return 'Rp0,00';

            if (type === "angka") {
                return nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            } else if (type === 'input') {
                let number_string = nominal.replace(/[^,\d]/g, "").toString();
                let split = number_string.split(",");
                split[0] = parseInt(split[0]).toString();
                let sisa = split[0].length % 3;
                let rupiah = split[0].substr(0, sisa);
                let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

                // tambahkan titik jika yang di input sudah menjadi angka ribuan
                if (ribuan) {
                    separator = sisa ? "." : "";
                    rupiah += separator + ribuan.join(".");
                }

                rupiah = split[1] !== undefined ? rupiah + "," + split[1] : rupiah;
                return rupiah ?? "";
            } else {
                return 'Rp' + nominal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ',00';
            }
        }

        //hapus format rupiah
        function derupiah(nominal) {
            return nominal.split('.').join("");
        }

        function removeAmp(url) {
            const convertedUrl = url.replace(/&amp;/g, '&');
            return convertedUrl;
        }

        function transformPhoneNumber(phoneNumber) {
            if (phoneNumber.startsWith('0')) {
                phoneNumber = '62' + phoneNumber.slice(1);
            } else {
                phoneNumber
            }

            return phoneNumber;
        }

        // function showAlert(msg = "Done!", sub_msg = "Proses Berhasil.", type = 'success', autoclose = true) {
        //     if (typeof msg === 'object') {
        //         if ((msg.data).hasOwnProperty('errors')) {
        //             const errors = msg.data.errors;
        //             let message = '';
        //             let inc = 0;
        //             for (const i in errors) {
        //                 if (inc > 0) message += ' ';
        //                 inc++;
        //                 message += inc + '. ' + errors[i].join(' ');
        //             }
        //             showAlert("Error!", message, 'danger');
        //         } else {
        //             showAlert("Error!", msg.message, 'danger');
        //         }
        //         return true;
        //     }

        //     if (type === "danger") {
        //         $("#alert-icon").attr('src', "{{ asset('image/icon/alert-danger.svg') }}")
        //     } else if (type === "success") {
        //         $("#alert-icon").attr('src', "{{ asset('image/icon/alert-success.svg') }}")
        //     } else if (type === "warning") {
        //         $("#alert-icon").attr('src', "{{ asset('image/icon/alert-warning.svg') }}")
        //     }
        //     $('#set_alert').attr('class', 'alert fw-500 alert-dismissible alert-' + type);
        //     $('#set_alert #alert-header').html(msg);
        //     $('#set_alert #alert-footer').html(sub_msg);

        //     if (autoclose) {
        //         setTimeout(function() {
        //             $('#set_alert').attr('class', 'alert fw-500 alert-dismissible d-none alert-success');
        //             $('#set_alert #alert-header').html(msg);
        //             $('#set_alert #alert-footer').html(sub_msg);
        //         }, 5000);
        //     }
        //     return true;
        // }
        function showAlert(msg = "Done!", sub_msg = "Proses Berhasil.", type = 'success', autoclose = true) {
            $('#notification-merah, #notification-hijau').addClass('hidden');

            let notificationElement;
            if (type === 'danger') {
                notificationElement = $('#notification-merah');
                notificationElement.find('h6').html(msg);
                notificationElement.find('p').html(sub_msg);
            } else if (type === 'success') {
                notificationElement = $('#notification-hijau');
                notificationElement.find('h6').html(msg);
                notificationElement.find('p').html(sub_msg);
            }

            notificationElement.removeClass('hidden');

            if (autoclose) {
                setTimeout(function() {
                    notificationElement.addClass('hidden');
                }, 5000);
            }

            $('#close-notification-merah, #close-notification-hijau').on('click', function() {
                $(this).closest('.notification-merah, .notification-hijau').addClass('hidden');
            });

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
                        showAlert(msg = "Error!", sub_msg = "Request tidak sesuai", type = 'danger');
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

        function getDays(year, month) {
            return new Date(year, month, 0).getDate();
        };

        function diff_hours(dt1, dt2) {
            $jam_mulai = new Date("01/01/2007 " + dt1).getHours()
            $jam_selesai = new Date("01/01/2007 " + dt2).getHours()
            return ($jam_selesai - $jam_mulai);
        }
    </script>
</head>

<body>
    <section id="loading_screen">
        <div class="bars"></div>
    </section>

    @include('admin.layouts.navigation')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <div class="alert fw-500 alert-dismissible d-none alert-success" role="alert" id="set_alert" style="z-index: 1056;">
            <div class="gap-2 d-flex align-items-start">
                <img src="" alt="" id="alert-icon">
                <div>
                    <p class="mb-0" id="alert-header"></p>
                    <p class="mb-0"><small class="text-subdued" id="alert-footer"></small></p>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="px-3 body flex-grow-1 position-relative">
            <div class="container-lg">
                <section class="d-flex align-items-sm-center justify-content-between body-header">
                    <button class="p-0 header-toggler" type="button" id="btn_sidebar">
                        <img src="{{ asset('image/icon/menu-hamburger.svg') }}" class="icon icon-lg" alt="icon toggle sidebar">
                    </button>
                    <button class="p-0 bg-transparent border-0 btn position-relative toggle-notifikasi" id="toggle_notifikasi" type="button" data-bs-toggle="offcanvas" data-bs-target="#notifikasi" aria-controls="notifikasi">
                        <img src="{{ asset('image/icon/notification.svg') }}" class="img-notif" alt="icon notif">
                    </button>
                </section>
            </div>
            {{ $slot }}
        </div>
    </div>

    <div id="notification-merah" class="hidden notification-merah">
        <span class="notification-merah-icon">
            <img src="{{asset('template2/assets/image/dashboard-ekskul/warning.svg')}}" alt="">
        </span>
        <span class="notification-text">
            <h6>Permintaan Tidak Sesuai</h6>
            <p>Silahkan periksa kembali data anda!</p>
        </span>
        <button id="close-notification-merah" class="close-btn">✖</button>
    </div>

    <div id="notification-hijau" class="hidden notification-hijau">
        <span class="notification-hijau-icon">
            <img src="{{asset('image/icon/dashboard-ekskul/checklist.svg')}}" alt="">
        </span>
        <span class="notification-text">
            <h6>Done</h6>
            <p>Data berhasil ditambahkan</p>
        </span>
        <button id="close-notification-hijau" class="close-btn">✖</button>
    </div>

    <!-- Notfikasi -->
    <div class="offcanvas offcanvas-end notifikasi" tabindex="-1" id="notifikasi" aria-labelledby="notifikasiLabel">
        <div class="p-0 mb-4 offcanvas-header d-flex align-items-center justify-content-between">
            <h4 class="p-0 mb-0 border-0 header fw-700 text-dark" id="notifikasiLabel">Notifikasi</h4>
            <button type="button" class="p-2 m-0 btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                <img src="{{ asset('image/icon/close.svg') }}" alt="icon close">
            </button>
        </div>
        <button class="p-2 mb-4 btn btn-outline-success btn-read w-100 fw-700" onclick="readNotif('all')" id="read_all">Tandai semua sudah dilihat</button>
        <div class="p-0 offcanvas-body" id="list_notifikasi"></div>
    </div>

    <div class="top-0 pt-3 toast-container position-fixed start-50 translate-middle-x">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header" id="toast_header">
                <strong class="me-auto" id="toast_title"></strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="toast_body"></div>
        </div>
    </div>

    <!-- Modal Logout -->
    <div class="modal fade" id="modalLogout" tabindex="-1" aria-labelledby="modalLogoutLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="px-4 pt-4 pb-0 border-0 modal-header">
                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalLogoutLabel">Konfirmasi Logout</h1>
                </div>
                <div class="p-4 modal-body">
                    <p class="mb-4 text-black">Apakah anda yakin untuk logout?</p>
                    <div class="d-flex align-items-center">
                        <input type="hidden" id="d_id">
                        <button type="button" class="p-2 btn btn-secondary fw-700 me-3 w-50" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('logout') }}" method="post" id="logout-form" class="mb-0 w-50">
                            @csrf
                            <button type="submit" class="p-2 btn btn-outline-danger fw-700 w-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="px-4 pt-4 pb-0 border-0 modal-header">
                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalConfirmTitle">-</h1>
                </div>
                <div class="p-4 modal-body">
                    <p class="mb-4 text-black" id="modalConfirmBody">-</p>
                    <div class="d-flex align-items-center">
                        <button type="button" class="p-2 btn btn-danger fw-700 me-3 w-100" data-bs-dismiss="modal">Batal</button>
                        <button type="button" class="p-2 btn btn-outline-success fw-700 w-100" id="modalConfirmOk">Ya</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // var modalDelete = bootstrap.Modal.getOrCreateInstance(document.querySelector('#modalDelete'));
        var modalLogout = bootstrap.Modal.getOrCreateInstance(document.querySelector('#modalLogout'));
        var modalConfirm = bootstrap.Modal.getOrCreateInstance(document.querySelector('#modalConfirm'));
        var toastLive = document.getElementById('liveToast')
        var toastInstance = new bootstrap.Toast(toastLive)
        $('#loading_screen').hide();
        var roleLogin = "";
        var lembaga_login = "";

        $(function() {
    // Inisialisasi sidebar
    var sidebar = coreui.Sidebar.getInstance(document.querySelector('#sidebar'));

    // Fungsi untuk toggle sidebar
    // function toggleSidebar() {
    //     if (sidebar) {
    //         if (sidebar._element.classList.contains('hide')) {
    //             sidebar._element.classList.remove('hide');
    //             $('.main-content').removeClass('sidebar-hidden');
    //         } else {
    //             sidebar._element.classList.add('hide');
    //             $('.main-content').addClass('sidebar-hidden');
    //         }
    //     }
    // }

    // Event listener untuk tombol sidebar
    // $('#btn_sidebar').on('click', function(e) {
    //     e.preventDefault();
    //     toggleSidebar();
    // });
});

        async function selectPaginate(id, url, opt = {}, ajax_param = {}) {
            $(id).select2({
                width: '100%',
                allowClear: true,
                language: "id",
                ajax: {
                    delay: 500,
                    url: url,
                    dataType: 'json',
                    xhrFields: {
                        withCredentials: true
                    },
                    beforeSend: (xhr) => {
                        return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                    },
                    data: function(params) {
                        return {
                            term: params.term || '',
                            page: params.page || 1,
                            ...ajax_param
                        }
                    },
                    cache: true,
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        let res = [];
                        for (const i of data.data.data) {
                            if (i.hasOwnProperty('text')) {
                                res.push(i);
                            } else {
                                res.push({
                                    ...i,
                                    text: i.nama
                                });
                            }
                        }
                        return {
                            results: res,
                            pagination: {
                                more: (params.page * 15) < data.data.total
                            }
                        };
                    }
                },
                ...opt
            });
        }

        async function selectAll(id, url, opt = {}) {
            req({
                url,
                type: "get",
                success: function(response) {
                    if (response.status === 'failed') return alert(response.message);
                    let set_data = [];
                    if (response.hasOwnProperty('data')) {
                        set_data = response.data;
                    }
                    $(id).select2({
                        data: set_data,
                        allowClear: true,
                        width: '100%',
                        language: "id",
                        ...opt
                    })
                }
            });
        }

        // start datatable
        function setTablePage(class_table, url, page = null, callback = null) {
            url = new URL(url);
            if (page !== null) {
                url.searchParams.set('page', page);
            } else {
                let change = $(`.${class_table} .table-pagination-select`).val();
                url.searchParams.set('page', change);
            }
            setTable(url.toString(), callback);
        }

        function _getData(t, path) {
            return path.split(".").reduce((r, k) => r?.[k] ?? '-', t)
        }

        function _setTableData(class_table, data) {
            if (data.data.length < 1) {
                return `<tr><td colspan="${setTableData[class_table].length}" class="text-center" style="font-size: 1rem;">Tidak ada data</td</tr>`;
            }

            let tr = '';
            for (const d of data.data) {
                tr += '<tr>';
                let td = '';
                for (const key of setTableData[class_table]) {
                    td += '<td>';
                    if (typeof key !== 'object') {
                        if (key === '_increment') {
                            td += (data.from++);
                        } else if (key === '#') {
                            td += '#';
                        } else {
                            td += _getData(d, key);
                        }
                        continue;
                    }

                    if (typeof key.key === 'string') {
                        td += key.func(_getData(d, key.key))
                    } else {
                        var tmpVal = []
                        key.key.forEach(nameKey => {
                            tmpVal.push(_getData(d, nameKey))
                        });
                        td += key.func(tmpVal)
                    }

                    td += '</td>';
                }
                tr += td;
                tr += '</tr>';
            }
            return tr;
        }

        async function setTable(url, callback = null, filtered = null) {

            if (url === '#') return;

            url = new URL(url);
            let class_table = url.searchParams.get('class');
            let show_length = $(`.${class_table} .table-length-select`);
            if (show_length.val() !== '' && show_length.val() != undefined) {
                url.searchParams.set('limit', show_length.val());
            } else {
                url.searchParams.delete('limit');
            }
            if (filtered != null) {
                if (typeof(filtered) == "string") {
                    filtered = JSON.parse(filtered)
                }
                for (const key in filtered) {
                    url.searchParams.set(key, $(filtered[key]).val())
                }
                if (typeof(filtered) == "object") {
                    filtered = JSON.stringify(filtered)
                }
            }
            let page = url.searchParams.get('page') ?? 1;
            url.searchParams.set('page', page);

            let search_input = $(`.${class_table} .table-pagination-search`);
            if (search_input.val() !== '') {
                url.searchParams.set('search', search_input.val());
            } else {
                url.searchParams.delete('search');
            }

            // set select page
            let page_select = $(`.${class_table} .table-pagination-select`);
            var loading = `<tr><td colspan="${setTableData[class_table].length}" class="text-center text-muted" style="font-size: 1rem; background-color: #eff3f8;">.: Mengambil Data :.</td</tr>`;
            $(`.${class_table} table tbody`).html(loading);

            req({
                url,
                type: "get",
                success: function(response) {
                    let data_table = response.data;
                    if (data_table === null) return;
                    // select page
                    let _option = '';
                    for (var i = 1; i <= data_table.last_page; i++) {
                        _option += `<option value="${i}"${(i === data_table.current_page ? ' selected' : '')}>${i}</option>`;
                    }
                    page_select
                        .html(_option)
                        .attr('onchange', `setTablePage("${class_table}", "${data_table.first_page_url}", ${null}, ${callback})`);

                    // button prev and next
                    $(`.${class_table} .btn-prev`).attr('onclick', `setTable("${ (data_table.prev_page_url || '#') }", ${callback}, ${filtered})`);
                    $(`.${class_table} .btn-next`).attr('onclick', `setTable("${ (data_table.next_page_url || '#') }", ${callback}, ${filtered})`);

                    // length data select
                    show_length.attr('onchange', `setTable("${data_table.first_page_url}", ${callback}, ${filtered})`);

                    // input search
                    search_input.attr('onchange', `setTablePage("${class_table}", "${data_table.first_page_url}", 1, ${callback})`);
                    $(`.${class_table} .table-btn-search`).attr('onclick', `setTable("${url}", ${callback}, ${filtered})`);

                    // text content
                    $(`.${class_table} .table-last`).text(data_table.last_page);
                    $(`.${class_table} .table-show`).text(data_table.data.length);
                    $(`.${class_table} .table-total`).text(data_table.total);

                    let tbody = _setTableData(class_table, data_table);
                    $(`.${class_table} table tbody`).html(tbody);
                    if (callback != null) {
                        callback(response)
                    }

                    tooltip()
                }
            });
        }
        // end datatable

        // show modal logout
        $("#logout-user").on('click', function() {
            modalLogout.show()
        })

        function toast(body, title = '', cls = 'default') {
            $('#toast_title').html(title);
            $('#toast_body').html(body);

            if (['primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'].includes(cls)) {
                cls = `toast-header text-bg-${cls}`;
            } else {
                cls = 'toast-header';
            }
            $('#toast_header').attr('class', cls);
            toastInstance.show();
        }

        function errorList(errors) {
            let body = '<ul>';
            for (const i in errors) {
                body += `<li>${errors[i]}</li>`;
            }
            body += '</ul>';
            return body;
        }

        function closeAlert() {
            $('#set_alert').attr('class', 'alert fw-500 alert-dismissible d-none alert-success');
        }

        function tooltip() {
            setTimeout(function() {
                var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                var tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
            }, 300);
        }

        function inputRupiah(el) {
            el.value = rupiah(el.value, 'input');
        }

        @if(env('APP_ENV') !== 'local')
        // function auto logout idle 5 minutes
        let detik = 300;
        const time_interval = 1000 * 60 * 5; // 5 menit
        var timer = window.setInterval(function() {
            detik -= 5
            if (detik <= 0) {
                clearInterval(timer);
                logout();
            }
        }, time_interval);
        @endif

        function mouse_move() {
            detik = 300
        }

        document.addEventListener('keydown', (event) => {
            detik = 300
        }, false);

        function tanggal(tgl) {
            tgl = new Date(tgl);
            const arr_day = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
            const arr_month = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

            const day = arr_day[tgl.getDay()];
            const date = tgl.getDate();
            const month = arr_month[tgl.getMonth()];
            const year = tgl.getFullYear();

            return day + ', ' + date + ' ' + month + ' ' + year;
        }

        function showConfirm(opt = {}) {
            const title = opt.hasOwnProperty('title') ? opt.title : 'Konfirmasi';
            const message = opt.hasOwnProperty('message') ? opt.message : 'Apakah yakin ingin melanjutkan?';
            const ok = opt.hasOwnProperty('ok') ? opt.ok : "console.log('ok')";
            $('#modalConfirmTitle').html(title);
            $('#modalConfirmBody').html(message);
            $('#modalConfirmOk').attr('onclick', ok + '; modalConfirm.hide()');
            modalConfirm.show();
            return true;
        }

        function timeZone(time) {
            const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            return new Date(time).toLocaleString("id-ID", {
                timeZone,
                dateStyle: 'medium',
                timeStyle: 'long'
            }).replace(/\./g, ':').replace(/\,/g, '');
        }
    </script>
    <script>
        document.getElementById('btn_sidebar').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('shrink');
    document.querySelector('.main-content').classList.toggle('shrink');
});

    </script>

</body>

</html>
