<x-app-layout>
    <style>
        body {
            background-color: #F5F6FA;
        }

        .setting .card {
            border: none;
            border-radius: 12px;
        }

        .form-label {
            padding: 4px;
            color: #000000;
            font-weight: 500;
            font-size: 12px;
            line-height: 12px;
        }

        .form-control,
        .form-select,
        html:not([dir="rtl"]) .form-select {
            border: 1px solid #e6e6e6;
            background-color: #ffffff;
            border-radius: 4px;
            padding: 12px;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #757575;
        }

        .form-control:focus {
            border: 1.5px solid #3C7B46;
        }

        .form-control::placeholder {
            color: #9EA3A9;
        }

        .form-control:disabled {
            border: 1px solid #e6e6e6;
            background: #ffffff;
            color: #757575;
        }

        .input-group-text {
            background-color: #ffffff;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            font-size: 14px;
            line-height: 20px;
            color: #212122;
        }

        html:not([dir="rtl"]) .input-group:not(.has-validation)> :not(:last-child):not(.dropdown-toggle):not(.dropdown-menu):not(.form-floating),
        html:not([dir="rtl"]) .input-group:not(.has-validation)>.dropdown-toggle:nth-last-child(n + 3),
        html:not([dir="rtl"]) .input-group:not(.has-validation)>.form-floating:not(:last-child)>.form-control,
        html:not([dir="rtl"]) .input-group:not(.has-validation)>.form-floating:not(:last-child)>.form-select {
            border-right: none;
        }

        .setting .input-group-text {
            background-color: #ffffff;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            font-size: 14px;
            line-height: 20px;
            color: #212122;
        }

        .setting .input-wrap .input-key input {
            border-right: none;
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .setting .input-key span {
            border-left: none !important;
            border-top-left-radius: 0px !important;
            border-bottom-left-radius: 0px !important;
            border-radius: 8px;
            border: 1.5px solid #D6D8DB;
        }

        .custom-close {
            background: none;
            border: none;
            margin-left: auto;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 2;
            padding: 1.25rem 1rem;
        }

        #alert-yeah, #alertErrorData, #alertErrorKey {
            position: absolute;
            top: 5%;
            right: 2.6%;
            z-index: 100;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            color: #5A5F6D;
            font-weight: bold;
        }

        .form-control,
        .input-wrap span {
            border: 1.5px solid #D6D8DB;
            border-radius: 8px;
        }

        .profile-container {
            position: relative;
            width: 100%;
            height: 100%;
            aspect-ratio: 1/1;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #ddd;
            cursor: pointer;
        }

        .profile-pic {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
            border-radius: 50%;
        }

        .notif {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            position: relative;
            padding: 10px;
            background-color: #;
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
        }

        .notification-text{
            flex-direction: column;
        }

        #notif-done-edit{
            background-color: #DFECFF;
        }

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

<div id="notif-done-edit" class="notif" style="display: none">
    <span class="notif-done-icon">
        <img src="{{asset('template3/image/info-circle.svg')}}" alt="">
    </span>
    <span id="notification-message" class="notification-text d-flex px-2">
        <h6 class="m-0" style="font-weight: 600; color: #2B67E9;">Done</h6>
        <p style="margin: 0; color: #666; font-size: 12px;">Data berhasil diperbarui!</p>
    </span>
    <button id="close-notif-done" class="close-btn">✖</button>
</div>

    <div class="container setting">
        <h3 class="fw-bold">Profil</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-semibold">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                        style="color: #898FA0;">Profil</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #050963;">Atur Profil</li>
            </ol>
        </nav>

        {{-- @include('admin.components.alert-ubah') --}}

        <div class="p-4 card" style="width: 100%; height: 100%;">
            <div>
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="fw-bold">Detail Akun</h5>
                    </div>
                    <div class="col-md-5">
                        <div class="pt-3 detail-akun">
                            <form id="form-detail" class="form-setting" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <h5 class="pb-2 fw-bold">Foto Profil</h5>
                                <div class="d-flex">
                                    <div class="profile-container">
                                        {{-- <img id="profile-pic" src="{{ asset($user->image ?? 'template2/assets/image/Admin/avatar.png') }}" alt="Foto Profil" class="profile-pic"> --}}
                                        <img id="profile-pic" src="{{ asset('template2/assets/image/Admin/avatar.png') }}" alt="Foto Profil" class="profile-pic">
                                        <input type="file" id="profile-upload" name="image" accept="image/png, image/jpeg" style="display: none;" onchange="previewProfilePic()">
                                    </div>
                                    <p class="m-3 mt-0" style="font-size: 14px; text-align:justify;">
                                        Update your avatar by clicking the image beside. 288x288 px size recommended in PNG or JPG format only.
                                    </p>
                                </div>

                                <h5 class="pt-3 fw-bold">Detail</h5>
                                <div class="pt-2 mb-3 input-wrap">
                                    <label for="name" class="form-label fw-bold">Nama Akun</label>
                                    <input type="text" class="form-control fw-bold" id="name" name="name"required autofocus autocomplete="name">
                                    {{-- <input type="text" class="form-control fw-bold" id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                                    @if ($errors->has('name'))
                                        <div class="mt-2 text-danger">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif --}}
                                </div>

                                <div class="mb-3 input-wrap">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control fw-bold" id="email" required autocomplete="username">
                                    {{-- <input type="email" name="email" class="form-control fw-bold" id="email" value="{{ old('email', $user->email) }}" required autocomplete="username">
                                    @if ($errors->has('email'))
                                        <div class="mt-2 text-danger">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif --}}
                                </div>

                                {{-- <div class="flex items-center gap-4">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

                                    @if (session('status') === 'profile-updated')
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Saved.') }}
                                        </p>
                                    @endif
                                </div> --}}
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="fw-bold">Keamanan</h5>
                    </div>
                    <div class="col-md-5">
                        <div class="detail-akun">
                           <form id="form-password" class="form-setting" method="POST" action="{{ route('password.update') }}">
                                @csrf
                                @method('put')

                                <h5 class="pt-3 fw-bold">Reset Password</h5>

                                <div class="pt-2 mb-3 input-wrap">
                                    <label for="current_password" class="form-label fw-bold">Password Lama</label>
                                    <div class="input input-key d-flex">
                                        <input type="password" name="current_password" id="current_password" class="form-control fw-bold" required autocomplete="current-password">
                                        <span class="input-group-text" onclick="togglePassword('current_password')">
                                            <img id="toggleOldPass" src="{{ asset('template2/assets/image/Admin/eye-slash.svg') }}" alt="Show" style="cursor: pointer;">
                                        </span>
                                    </div>
                                    @if ($errors->has('current_password'))
                                        <div class="mt-2 text-danger">
                                            {{ $errors->first('current_password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3 input-wrap">
                                    <label for="password" class="form-label fw-bold">Password Baru</label>
                                    <div class="input input-key d-flex">
                                        <input type="password" name="password" id="password" class="form-control fw-bold" required autocomplete="new-password">
                                        <span class="input-group-text" onclick="togglePassword('password')">
                                            <img id="toggleNewPass" src="{{ asset('template2/assets/image/Admin/eye-slash.svg') }}" alt="Show" style="cursor: pointer;">
                                        </span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <div class="mt-2 text-danger">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3 input-wrap">
                                    <label for="password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control fw-bold" required autocomplete="new-password">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="mt-2 text-danger">
                                            {{ $errors->first('password_confirmation') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="flex items-center gap-4">
                                    <button type="submit" class="btn btn-primary" style="width: 100%" data-bs-toggle="modal" data-bs-target="#modal-edit">Simpan Perubahan</button>

                                    @if (session('status') === 'password-updated')
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            {{ __('Saved.') }}
                                        </p>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (session('status') == 'profile-updated' || session('status') == 'password-updated')
        <script>
            window.onload = function() {
                showSuccessAlert();
            }
        </script>
    @elseif (str_contains(session('status'), 'profile-update-failed' || str_contains(session('status'), 'password-update-failed')))
        <script>
            window.onload = function() {
                showErrorAlert();
            }
        </script>
    @endif
    {{-- alert --}}
    <div id="alertErrorData"
        class="alert alert-danger alert-dismissible fade show d-none d-flex position-absolute rounded-2"
        role="alert" style="z-index: 100; width: 35%;">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/assets/image/Admin/info-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #D32246;">Permintaan Tidak Sesuai</strong>
                <p class="m-0" style="color:#5A5F6D;">Silahkan periksa kembali data anda!
                </p>
            </div>
            <button type="button" class="custom-close" data-bs-dismiss="alert" aria-label="Close">
                <img src="{{ asset('template2/assets/image/Admin/close.svg') }}" alt="">
            </button>
        </div>
    </div>

    <div id="alertErrorKey"
        class="alert alert-danger alert-dismissible fade show d-none d-flex position-absolute rounded-2"
        role="alert" style="z-index: 100; width: 30%;">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/assets/image/Admin/info-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #D32246;">Permintaan Tidak Sesuai</strong>
                <p class="m-0" style="color:#5A5F6D;">Gagal menyimpan data password!
                </p>
            </div>
            <button type="button" class="custom-close" data-bs-dismiss="alert" aria-label="Close">
                <img src="{{ asset('template2/assets/image/Admin/close.svg') }}" alt="">
            </button>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const usn = document.getElementById('username');
            const mail = document.getElementById('email');
            const oldPass = document.getElementById('passwordOld');
            const newPass = document.getElementById('passwordNew');

            // Atur warna awal ketika halaman dimuat
            usn.style.color = '#151619';
            mail.style.color = '#151619';
            oldPass.style.color = '#151619';
            newPass.style.color = '#151619';

            // Perbarui warna value ketika pengguna mengetik
            usn.addEventListener('usn', function() {
                if (usn.value) {
                    usn.style.color = '#151619';
                } else {
                    usn.style.color = '';
                }
            });
            mail.addEventListener('mail', function() {
                if (mail.value) {
                    mail.style.color = '#151619';
                } else {
                    mail.style.color = '';
                }
            });
            oldPass.addEventListener('oldPass', function() {
                if (oldPass.value) {
                    oldPass.style.color = '#151619';
                } else {
                    oldPass.style.color = '';
                }
            });
            newPass.addEventListener('newPass', function() {
                if (newPass.value) {
                    newPass.style.color = '#151619';
                } else {
                    newPass.style.color = '';
                }
            });
        });

        //show password
        function togglePassword(inputId) {
            // Ambil elemen input dan ikon
            var passwordField = document.getElementById(inputId);

            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        //preview profil
        function previewProfilePic() {
            const fileInput = document.getElementById('profile-upload');
            const profilePic = document.getElementById('profile-pic');

            // Cek apakah ada file yang diupload
            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profilePic.src = e.target.result;
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        document.querySelector('.profile-container').addEventListener('click', function() {
            document.getElementById('profile-upload').click();
        });

        function showSuccessAlert() {
            var alert = document.getElementById("alert-yeah");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }
        function showErrorAlert() {
            var alert = document.getElementById("alertErrorData");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }
        function showErrorPassword() {
            var alert = document.getElementById("alertErrorKey");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }
    </script>

</x-app-layout>

@include(config('app.template') . 'admin.profil.modal-confirmedit')