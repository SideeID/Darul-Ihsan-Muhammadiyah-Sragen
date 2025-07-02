@extends('admin.konten.setting.layout')



@section('style')
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

        #alert-yeah {
            position: absolute;
            top: 10%;
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
    </style>
@endsection

@section('content')
    <div class="container setting">
        <h3 class="fw-bold pt-3">Setting</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-semibold">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none"
                        style="color: #898FA0;">Setting</a></li>
                <li class="breadcrumb-item active" aria-current="page" style="color: #3C7B46;">Data Setting</li>
            </ol>
        </nav>

        @include('admin.components.alert-ubah')

        <div class="card p-4" style="width: 100%; height: 100%;">
            <div>
                <div class="row">
                    <div class="col-md-7">
                        <h5 class="fw-bold">Detail Akun</h5>
                    </div>
                    <div class="col-md-5">
                        <div class="pp">
                            <h5 class="fw-bold pb-2">Foto Profil</h5>

                            <div class="d-flex">
                                <div class="profile-container">
                                    <img id="profile-pic" src="{{ asset('template2/assets/image/Admin/avatar.png') }}"
                                        alt="Foto Profil" class="profile-pic">
                                    <input type="file" id="profile-upload" accept="image/png*" style="display: none;"
                                        onchange="previewProfilePic()">
                                </div>
                                <p class="m-3 mt-0" style="font-size: 14px; text-align:justify;">Update your avatar by
                                    clicking the image beside. 288x288 px size recommended in PNG or
                                    JPG format only.</p>
                            </div>
                        </div>
                        <div class="detail-akun pt-3">
                            <h5 class="fw-bold">Detail</h5>
                            <form id="form-setting" class="form-setting" method="POST" action="">
                                @csrf
                                <div class="input-wrap mb-3 pt-2">
                                    <label for="username" class="form-label fw-bold">Username</label>
                                    <input type="text" class="form-control fw-bold" id="username" placeholder="Username"
                                        value="Ahmad Ali">
                                </div>
                                <div class="input-wrap mb-3">
                                    <label for="email" class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control fw-bold" id="email"
                                        placeholder="example@gmail.com" aria-label="Email" value="aliahmad21@gmail.com">
                                </div>
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
                            <h5 class="fw-bold">Reset password</h5>
                            <form id="form-setting" class="form-setting" method="POST" action="">
                                @csrf
                                <div class="input-wrap mb-3 pt-2">
                                    <label for="passwordOld" class="form-label fw-bold">Password lama</label>
                                    <div class="input input-key d-flex">
                                        <input type="password" name="password" class="form-control fw-bold" id="passwordOld"
                                            placeholder="Password" aria-label="Password" aria-describedby="showPassword">
                                        <span class="input-group-text" onclick="togglePassword('passwordOld')">
                                            <img id="toggleOldPass"
                                                src="{{ asset('template2/assets/image/Admin/eye-slash.svg') }}"
                                                alt="Show" style="cursor: pointer;">
                                        </span>
                                    </div>
                                </div>
                                <div class="input-wrap mb-3">
                                    <label for="passwordNew" class="form-label fw-bold">Password baru</label>
                                    <div class="input input-key d-flex">
                                        <input type="password" name="password" class="form-control fw-bold" id="passwordNew"
                                            placeholder="Password" aria-label="Password" aria-describedby="showPassword">
                                        <span class="input-group-text" onclick="togglePassword('passwordNew')">
                                            <img id="toggleNewPass"
                                                src="{{ asset('template2/assets/image/Admin/eye-slash.svg') }}"
                                                alt="Show" style="cursor: pointer;">
                                        </span>
                                    </div>
                                </div>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalSimpan" style="width: 100%; font-weight:600;">
                                    Simpan perubahan
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="modalSimpan" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered text-center">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center border-bottom-0">
                                                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Konfirmasi
                                                    Ubah Data</h1>
                                            </div>
                                            <div class="modal-body" style="color: #666E7A">
                                                Apakah anda yakin ingin mengubah data ini?
                                            </div>
                                            <div class="modal-footer justify-content-center border-top-0">
                                                <button type="button" class="btn px-3 fw-bold" data-bs-dismiss="modal"
                                                    style="border-color: #898FA0;">Batal</button>
                                                <button id="setting-submit" type="submit" class="btn px-3"
                                                    style="background-color:#F9BF39; color: #000000; font-weight:600;">Ya,
                                                    ubah data</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
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


        //snackbar
        function showSuccessAlert() {
            var alert = document.getElementById("alert-yeah");
            alert.classList.remove("d-none");

            // Sembunyikan alert setelah beberapa detik
            setTimeout(function() {
                alert.classList.add("d-none");
            }, 5000);
        }

        // Fungsi untuk menangani submit form
        document.getElementById('setting-submit').addEventListener('click', function(event) {
            event.preventDefault();

            // Simulasi penyimpanan data ke server di sini
            // Misalnya: Mengambil data dari form dan mengirim ke backend via AJAX, dll.

            // Jika penyimpanan berhasil, tampilkan alert
            showSuccessAlert();

            // Tutup modal setelah perubahan data
            var modal = document.querySelector('#modalSimpan');
            var modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();
        });
    </script>
@endsection
