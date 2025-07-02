<x-app-layout>


    <style>
        .card-equal {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 300px;
            position: relative;
            border: 2px solid blue;
            border-radius: 10px;
        }

        .card-equal img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Efek garis putus-putus */
        .border-dashed {
            border: 2px dashed #ccc;
            border-radius: 10px;
        }

        .img-fluid {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .new-img {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .card-slides {
            margin-bottom: 15px;
        }

        .row {
            margin: 0;
        }

        .card {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .new-img img {
            width: 40px;
            height: 40px;
        }

        .new-img .detail-new {
            margin-top: 5px;
            font-size: 11px;
            color: #808080;
        }

        .new-img {
            padding: 20px;
        }

        .img-icon {
            width: 50px;
            height: 50px;
        }

        .upload-text {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .browse-link {
            color: #007bff;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
        }

        .card-equal .overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0));
            opacity: 0;
            height: 50%;
            transition: all ease-in-out 0.3s;
            border-radius: 8px;
        }

        .card-equal .overlay:hover {
            background-color: rgba(0, 0, 0, 0.6);
            opacity: 1;
            height: 300px;
        }
    </style>



    <div class="container-fluid p-3">
        <br>
        <div class="row">
            <div class="col-12">
                <h4 class="tentangkami-judul">Slideshow</h4>
            </div>
            <div class="col-auto">
                <span class="text-breadcumbs mr-2" style="font-size:14px;">Tentang Kami</span>
                <span class="text-breadcumbs-active">/</span>
                <span class="text-breadcumbs-ml-2" style="font-size:14px;">Slideshow</span>
                <span class="text-breadcumbs-active">/</span>
                <span class="text-breadcumbs-active ml-2" style="font-size:14px;">Slidesshow</span>
            </div>
        </div>
        <br>

        <div class="col-12">
            <div class="card tentangkami-card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="tentangkami-subjudul">Slideshow</h5>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end mb-4">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-setuju">Simpan
                                Perubahan</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 card-slides">
                            <div class="card card-equal">
                                <img src="{{ asset('template2/img/slideshow-1.png') }}" class="card-img-top img-fluid"
                                    alt="card-img-top">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute top-0 end-0 p-3">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-gambar"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 card-slides">
                            <div class="card card-equal">
                                <img src="{{ asset('template2/img/slideshow-2.png') }}" class="card-img-top img-fluid"
                                    alt="card-img-top">
                                <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 h-100">
                                    <div class="position-absolute top-0 end-0 p-3">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modal-hapus-gambar"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt=""></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 card-slides mt-3">
                            <div class="card card-equal border-dashed">
                                <div class="new-img text-center py-5">
                                    <img src="{{ asset('template2/img/gallery.svg') }}" class="img-icon" alt="Upload Icon">
                                    <p class="upload-text mt-3">Upload image, or <span class="browse-link"
                                            id="browse-btn">browse</span></p>
                                    <p class="detail-new">1920x1080px size required in PNG or JPG format only</p>
                                    <!-- Input for selecting file -->
                                    <input type="file" id="upload-input" accept="image/png, image/jpeg"
                                        style="display:none;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert -->
    <div id="alertGagal" class="alert alert-danger custom-alert">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/assets/image/Admin/info-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #D32246;">Permintaan Gagal</strong>
                <p class="m-0 text-secondary">Mohon maaf, file anda tidak memenuhi kriteria.</p>
            </div>
            <button type="button" id="confirmBtnError" class="btn-close" data-bs-dismiss="alert"
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

    <div id="alertDone" class="alert alert-success custom-alert">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #3C7B46;">Done</strong>
                <p class="m-0 text-secondary">Data berhasil dihapus</p>
            </div>
            <button type="button" id="confirmBtnSuccess" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>


    <!-- Include Modal Components -->
    @include('admin.components.modal-simpan-data')
    @include('admin.components.modal-hapus-gambar')


    <script>
        // Fungsi Upload gambar
        const browseBtn = document.getElementById('browse-btn');
        const uploadInput = document.getElementById('upload-input');

        // Fungsi menampilkan custom alert sukses
        function showAlertBerhasil() {
            const alertBerhasil = document.getElementById('alertBerhasil');
            alertBerhasil.style.display = 'block'; // Tampilkan alert

            // Event listener untuk tombol OK
            document.getElementById('confirmBtnSuccess').addEventListener('click', function() {
                alertBerhasil.style.display = 'none';
            });
        }

        // Fungsi menampilkan custom alert gagal
        function showAlertGagal() {
            const alertGagal = document.getElementById('alertGagal');
            alertGagal.style.display = 'block';

            document.getElementById('confirmBtnError').addEventListener('click', function() {
                alertGagal.style.display = 'none';
            });
        }

        //Fungsi memilih file
        browseBtn.addEventListener('click', function() {
            uploadInput.click();
        });

        //validasi ukuran dan format
        uploadInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const img = new Image();
                const reader = new FileReader();

                // Membaca file sebagai URL data
                reader.readAsDataURL(file);

                reader.onload = function(e) {
                    img.src = e.target.result;

                    // validasi ukuran dan format
                    img.onload = function() {
                        // Validasi ukuran gambar (1920x1080px)
                        const isCorrectSize = img.width === 1920 && img.height === 1080;

                        // Validasi format file PNG atau JPG
                        const isCorrectFormat = file.type === 'image/png' || file.type === 'image/jpeg';

                        if (isCorrectSize && isCorrectFormat) {
                            // Jika sesuai
                            const imgElement = document.querySelector('.new-img img');
                            imgElement.src = e.target.result;
                            imgElement.classList.remove(
                                'img-icon');

                            //Fungsi agar sesuai card
                            imgElement.style.width = 'auto';
                            imgElement.style.height = 'auto';
                            imgElement.style.maxWidth = '100%';
                            imgElement.style.maxHeight = '100%';

                            // hide keterangan upload setelah gambar di-upload
                            document.querySelector('.upload-text').style.display = 'none';
                            document.querySelector('.detail-new').style.display = 'none';
                            // Jika format sesuai
                            showAlertBerhasil();
                        } else {
                            // Jika format tidak sesuai
                            showAlertGagal();
                        }
                    };
                };
            }
        });

        // Js alert Done hapus img
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.querySelector('#modal-hapus-gambar .btn-outline-secondary');
            const alertDone = document.getElementById('alertDone');

            deleteButton.addEventListener('click', function() {
                // Tampilkan alertDone
                alertDone.style.display = 'block';

                // modal konfirmasi hapus
                const modal = document.getElementById('modal-hapus-gambar');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                setTimeout(function() {
                    alertDone.style.display = 'none';
                }, 3000);
            });
        });

        // Js alert Berhasil simpan perubahan
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.querySelector('#modal-setuju .btn-modal-primary');
            const alertDone = document.getElementById('alertBerhasil');

            deleteButton.addEventListener('click', function() {
                // Tampilkan alertDone
                alertDone.style.display = 'block';

                // modal konfirmasi simpan perubahan
                const modal = document.getElementById('modal-setuju');
                const modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide();

                setTimeout(function() {
                    alertDone.style.display = 'none';
                }, 3000);
            });
        });
    </script>
</x-app-layout>
