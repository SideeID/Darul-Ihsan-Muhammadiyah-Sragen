@extends('admin.layouts.main')

@section('style')
    <style>
        .form-judul {
            font-size: 12px;
            font-weight: 500;
        }
        .form-control::placeholder {
            font-size: 14px;
            color: #9EA3A9;
        }

        /* Efek garis putus-putus */
        .border-dashed {
            border: 2px dashed #D6D8DB;
            border-radius: 10px;
            background-color: #F7F7F7;
        }

        .new-img {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .img-icon {
            width: 40px;
            height: 40px;
        }

        .upload-text {
            font-size: 12px;
            font-weight: 600;
            color: #333;
        }

        .detail-new {
            font-size: 10px;
            font-weight: 400;
            color: #808080;
            margin-top: -10px;
        }

        .browse-link {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .form-check-label {
            font-size: 14px;
            font-weight: 500;
            color: #666E7A;
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

        .is-invalid {
            border-color: #dc3545 !important;
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
                                            placeholder="e.g; Nama Guru">
                                        <div class="invalid-feedback">Kolom nama wajib diisi!</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputjabatan" class="form-label form-judul">Jabatan</label>
                                        <input type="text" class="form-control" id="inputjabatan"
                                            placeholder="e.g; Jabatan Guru">
                                        <div class="invalid-feedback">Kolom jabatan wajib diisi!</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputpendidikan" class="form-label form-judul">Riwayat
                                            Pendidikan</label>
                                        <textarea class="form-control" id="inputpendidikan" placeholder="Pendidikan" rows="3"></textarea>
                                        <div class="invalid-feedback">Kolom riwayat pendidikan wajib diisi!</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputpengalaman" class="form-label form-judul">Pengalaman</label>
                                        <textarea class="form-control" id="inputpengalaman" placeholder="Pengalaman" rows="3"></textarea>
                                        <div class="invalid-feedback">Kolom pengalaman wajib diisi!</div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputprestasi" class="form-label form-judul">Prestasi</label>
                                        <textarea class="form-control" id="inputprestasi" placeholder="Prestasi" rows="3"></textarea>
                                        <div class="invalid-feedback">Kolom prestasi wajib diisi!</div>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">*Centang box untuk publish data
                                            ke website</label>
                                    </div>
                                </div>

                                <!-- Image Upload Section (col-md-3) -->
                                <div class="col-md-3 d-flex flex-column">
                                    <div class="card border-dashed">
                                        <div class="new-img text-center py-5" id="previewContainer">
                                            <img src="{{ asset('template2/img/gallery.svg') }}" class="img-icon"
                                                alt="Upload Icon">
                                            <p class="upload-text mt-3">Upload image, or <span class="browse-link"
                                                    id="browse-btn">browse</span></p>
                                            <p class="detail-new">1920x1080px size required in PNG or JPG format only</p>
                                            <input type="file" id="upload-input" accept="image/png, image/jpeg"
                                                style="display:none;">
                                        </div>
                                    </div>
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary mt-auto">Simpan Data</button>
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
@endsection

@section('script')
    <script>
         // Js form
        document.addEventListener('DOMContentLoaded', function () {
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

            form.addEventListener('submit', function (e) {
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
            document.getElementById('browse-btn').addEventListener('click', function () {
                uploadInput.click();
            });

            uploadInput.addEventListener('change', function () {
                const file = uploadInput.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewContainer.innerHTML = '<img src="' + e.target.result + '" class="img-fluid" alt="Preview">';
                    };
                    reader.readAsDataURL(file);
                }
            });
        });

         // Js alert Berhasil ditambahkan
         document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.querySelector('#modal-tambahData .btn-modal-success');
            const alertDone = document.getElementById('alertDone-data');

            deleteButton.addEventListener('click', function() {
                // Tampilkan alertDone
                alertDone.style.display = 'block';

                // modal konfirmasi hapus
                const modal = document.getElementById('modal-tambahData');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                setTimeout(function() {
                    alertDone.style.display = 'none';
                }, 3000);
            });
        });

        // Js alert Berhasil dipublish
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.querySelector('#modal-simpanPublish .btn-modal-primary');
            const alertDone = document.getElementById('alertDone-data');

            deleteButton.addEventListener('click', function() {
                // Tampilkan alertDone
                alertDone.style.display = 'block';

                // modal konfirmasi hapus
                const modal = document.getElementById('modal-simpanPublish');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                setTimeout(function() {
                    alertDone.style.display = 'none';
                }, 3000);
            });
        });
    </script>
@endsection
