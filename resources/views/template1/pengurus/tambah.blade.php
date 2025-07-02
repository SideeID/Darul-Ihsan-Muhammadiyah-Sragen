<x-app-layout>
    <div class="container-lg pengurus">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column pt-4 px-4 pb-0">
                <a href="{{route('pengurus.index')}}" class="d-flex align-items-center text-dark text-decoration-none mb-3">
                    <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
                    Kembali
                </a>
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Tambah Pengurus</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <hr class="my-4">
                <form class="form-pengurus" id='form_pengurus' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <p class="text-black fw-700 mb-4">Gambar Pengurus</p>
                    <div class="img-preview mb-4 mb-md-5">
                        <input type="file" hidden name="foto" id="foto" accept="image/png, image/jpg" onchange="onchangeImgPreview('#foto', '#img_preview');">
                        <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                        <label for="foto" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                            <div class="label-content">
                                <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                                <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                    dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                            </div>
                        </label>
                    </div>

                    <p class="text-black fw-700 mb-4">Detail Pengurus</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" id="jabatan" name="jabatan" class="form-control" placeholder="Jabatan" aria-label="Jabatan">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-success w-100 fw-500 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">SIMPAN DATA PENGURUS</button>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header px-4 pt-4 pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalConfirmLabel">Konfirmasi Input Data</h1>
                                </div>
                                <div class="modal-body p-4">
                                    <p class="text-black mb-4">Apakah data yang anda masukkan sudah benar?, Anda bisa cek kembali jika belum yakin</p>
                                    <div class="d-flex align-items-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-danger fw-700 p-2 me-3 w-100" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-outline-success fw-700 p-2 w-100" id="submitForm">Simpan Data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        // image preview
        function onchangeImgPreview(imageInput, imagePreview) {
            var selectedFile = $(`${imageInput}`)[0].files[0];

            if (selectedFile) {
                if (selectedFile.size <= 2 * 1024 * 1024) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $(`${imagePreview}`).show()
                        $(`${imagePreview}`).attr("src", e.target.result);
                        $(`${imageInput}`).siblings("label").empty();
                    };

                    reader.readAsDataURL(selectedFile);
                } else {
                    $(`${imagePreview}`).hide()
                    alert("File melebihi ukuran 2MB.");
                    $(`${imageInput}`).val("");
                    $(`${imagePreview}`).attr("src", "");
                    $(".img-preview label").html(`
                        <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                        <div class="label-content">
                            <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                            <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                        </div>
                    `)
                }
            } else {
                $(`${imagePreview}`).hide()
                $(`${imagePreview}`).attr("src", "");
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            }
        }

        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("nama", $('#nama').val());
            form.append("jabatan", $('#jabatan').val());
            form.append("status", "published");
            form.append("image", $("#foto")[0].files[0]);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{route('pengurus.store')}}`,
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "mimeType": "multipart/form-data",
                "contentType": false,
                "data": form,
                beforeSend: (xhr) => {
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
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);

                if (res.status === "success") {
                    closeLoading();
                    window.location.href = "{{ route('pengurus.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>