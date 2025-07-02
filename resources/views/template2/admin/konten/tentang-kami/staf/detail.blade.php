@extends('admin.layouts.main')

@section('style')
    <style>
        .form-judul {
            font-size: 12px;
            font-weight: 500;
        }

        .form-control::placeholder {
            font-size: 14px;
            color: #151619;
        }

        /* Efek garis putus-putus */

        .upload-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .tentangkami-subtext {
            text-decoration: none;
            color: inherit;
        }

        .custom-alert {
            display: none;
        }

        .custom-alert.show {
            display: block;
        }

        .card-data-detail .img {
            object-fit: cover;
        }
        .card-data-detail .overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0));
            opacity: 0;
            height: 50%;
            transition: all ease-in-out 0.3s;
            border-radius: 8px;
        }

        .card-data-detail .overlay:hover {
            background-color: rgba(0, 0, 0, 0.6);
            opacity: 1;
            height: 300px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid p-3">
        <div class="row">
            <a href="{{ route('tentangkami.stafGuru') }}" class="tentangkami-subtext mb-4">
                <img src="{{ asset('template2/img/row-left.svg') }}" class="me-2" alt="">Kembali
            </a>
        </div>
        <div class="col-12">
            <div class="card tentangkami-card">
                <div class="card-body">
                    <div class="row">
                        <h5 class="tentangkami-subjudul">Tambah Data Guru/Staff</h5>
                        <form id="uploadForm">
                            <div class="row">
                                <!-- Input Form Section (col-md-9) -->
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label for="inputnama" class="form-label form-judul">Nama Guru</label>
                                        <input type="text" class="form-control" id="inputnama"
                                            placeholder="Ahmad Maulana Ishak">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputjabatan" class="form-label form-judul">Jabatan</label>
                                        <input type="text" class="form-control" id="inputjabatan"
                                            placeholder="Guru Bahasa Arab">
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputpendidikan" class="form-label form-judul">Riwayat
                                            Pendidikan</label>
                                        <textarea class="form-control" id="inputpendidikan"
                                            placeholder="SMA ponpes Tahfidzul Qur'an Daarul Fithrah S1 Universitas Al-Azhar, KairoS2 UIN Maliki, Malang"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputpengalaman" class="form-label form-judul">Pengalaman</label>
                                        <textarea class="form-control" id="inputpengalaman" placeholder="Pengalaman" rows="3"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputprestasi" class="form-label form-judul">Prestasi</label>
                                        <textarea class="form-control" id="inputprestasi" placeholder="Prestasi" rows="3"></textarea>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">*Centang box untuk
                                            publish data
                                            ke website</label>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex flex-column">
                                    <div class="card card-data-detail">
                                        <img src="{{ asset('template2/img/Guru-detail.png') }}"
                                            class="card-img-top img-fluid" alt="card-img-top">
                                        <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                            <div class="position-absolute top-0 end-0 p-3">
                                                <button class="btn btn-outline-light">Ganti</button>
                                                <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                                    data-bs-target="#modal-hapus-gambar"><img
                                                        src="{{ asset('template2/img/icon-trash.svg') }}"
                                                        alt=""></button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-warning mt-auto">Simpan Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <div id="alertBatal" class="alert alert-danger custom-alert">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/assets/image/Admin/info-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #D32246;">Permintaan Tidak Sesuai</strong>
                <p class="m-0 text-secondary">Silahkan periksa kembali data anda!.
                </p>
            </div>
            <button type="button" id="confirmBtnError" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>

    <div id="alertDone-data" class="alert alert-success custom-alert">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #3C7B46;">Done</strong>
                <p class="m-0 text-secondary">Data berhasil ditambahkan</p>
            </div>
            <button type="button" id="confirmBtnSuccess" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>

    <div id="alertBerhasil" class="alert alert-success custom-alert">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #3C7B46;">Yeah</strong>
                <p class="m-0 text-secondary">Perubahan data berhasil!</p>
            </div>
            <button type="button" id="confirmBtnSuccess" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>

    <!-- Include Modal Components -->
    @include('admin.components.modal-simpan-publish')
    @include('admin.components.modal-tambah-data')
    @include('admin.components.modal-hapus-gambar')
@endsection

@section('script')
    <script>
        // Js form
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('uploadForm');
            const inputNama = document.getElementById('inputnama');
            const inputJabatan = document.getElementById('inputjabatan');
            const pendidikan = document.getElementById('inputpendidikan');
            const pengalaman = document.getElementById('inputpengalaman');
            const prestasi = document.getElementById('inputprestasi');
            const checkBox = document.getElementById('exampleCheck1');
            const uploadInput = document.getElementById('upload-input');
            const previewContainer = document.getElementById('previewContainer');

            const alertBatal = document.getElementById('alertBatal');
            const alertDone = document.getElementById('alertDone-data');
            const alertBerhasil = document.getElementById('alertBerhasil');

            const modalSimpanPublish = new bootstrap.Modal(document.getElementById('modal-simpanPublish'));
            const modalTambahData = new bootstrap.Modal(document.getElementById('modal-tambahData'));

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                let valid = true;

                // Validasi input nama
                if (inputNama.value.trim() === '') {
                    inputNama.classList.add('is-invalid');
                    valid = false;
                } else {
                    inputNama.classList.remove('is-invalid');
                }

                // Validasi input jabatan
                if (inputJabatan.value.trim() === '') {
                    inputJabatan.classList.add('is-invalid');
                    valid = false;
                } else {
                    inputJabatan.classList.remove('is-invalid');
                }

                // Validasi input pendidikan
                if (pendidikan.value.trim() === '') {
                    pendidikan.classList.add('is-invalid');
                    valid = false;
                } else {
                    pendidikan.classList.remove('is-invalid');
                }

                // Validasi input pengalaman
                if (pengalaman.value.trim() === '') {
                    pengalaman.classList.add('is-invalid');
                    valid = false;
                } else {
                    pengalaman.classList.remove('is-invalid');
                }

                // Validasi input prestasi
                if (prestasi.value.trim() === '') {
                    prestasi.classList.add('is-invalid');
                    valid = false;
                } else {
                    prestasi.classList.remove('is-invalid');
                }

                // Jika data tidak valid, tampilkan alert
                if (!valid) {
                    alertBatal.classList.add('show');
                    return;
                }

                // Tampilkan modal yang sesuai berdasarkan checkbox
                if (checkBox.checked) {
                    modalSimpanPublish.show();
                } else {
                    modalTambahData.show();
                }
            });

            // Preview Gambar
            document.getElementById('browse-btn').addEventListener('click', function() {
                uploadInput.click();
            });

            uploadInput.addEventListener('change', function() {
                const file = uploadInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewContainer.innerHTML = '<img src="' + e.target.result +
                            '" class="img-fluid" alt="Preview">';
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

    </script>
@endsection
