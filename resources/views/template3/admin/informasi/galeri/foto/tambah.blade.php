<x-app-layout>
    <style>
        .img-preview {
            position: relative;
        }

        .label-upload{
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
        }
    </style>

    <div class="container-lg gallery">
        <a href="{{ route('admin.informasi.galeri.foto.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-700 text-dark mb-sm-0 h6">Tambah Data</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-gallery" id='form_gallery' action="" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="judul" class="form-label fw-500 small">Judul Galeri</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="judul" name="judul" class="form-control"
                                    placeholder="Nama Galeri" aria-label="Nama Galeri">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_1" id="foto_1"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_1', '#img_preview_1');">
                                <img src="" id="img_preview_1" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_1" id="label_foto_1"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center label-upload">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_2" id="foto_2"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_2', '#img_preview_2');">
                                <img src="" id="img_preview_2" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_2" id="label_foto_2"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center label-upload">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_3" id="foto_3"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_3', '#img_preview_3');">
                                <img src="" id="img_preview_3" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_3" id="label_foto_3"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center label-upload">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_4" id="foto_4"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_4', '#img_preview_4');">
                                <img src="" id="img_preview_4" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_4" id="label_foto_4"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center label-upload">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_5" id="foto_5"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_5', '#img_preview_5');">
                                <img src="" id="img_preview_5" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_5" id="label_foto_5"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center label-upload">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_6" id="foto_6"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_6', '#img_preview_6');">
                                <img src="" id="img_preview_6" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_6" id="label_foto_6"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center label-upload">
                                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}"
                                        class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish galeri!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-primary w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirmGallery">Simpan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirmGallery" tabindex="-1"
                        aria-labelledby="modalConfirmGalleryLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmGalleryLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan
                                        galeri
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700"
                                            id="submitGalleryForm">Ya, Simpan!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Publish -->
                    <div class="modal fade" id="modalPublish" tabindex="-1" aria-labelledby="modalPublishLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="border-0 modal-header">
                                    <h5 class="text-center modal-title fw-bold w-100" id="modalPublishLabel">
                                        Konfirmasi Publish Data
                                    </h5>
                                </div>
                                <div class="text-center modal-body">
                                    <p class="mb-4">
                                        Apakah anda yakin ingin mempublish data ini ke website?
                                    </p>
                                    <div class="gap-2 d-flex justify-content-center">
                                        <button type="button" class="btn btn-outline-black" id="btnTidakPublish">
                                            Tidak
                                        </button>
                                        <button type="button" class="btn btn-primary" id="btnYaPublish">
                                            Ya, Publish!
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <div id="alert-sukses" class="alert alert-success custom-alert d-flex d-none">
        <div class="d-flex">
            <div class="alert-img me-2">
                <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
            </div>
            <div class="alert-text">
                <strong style="color: #3C7B46;">Yeah</strong>
                <p class="m-0 text-secondary">Perubahan Data Berhasil</p>
            </div>
            <button type="button" id="confirmBtnError" class="btn-close" data-bs-dismiss="alert"
                aria-label="Close"></button>
        </div>
    </div>

    <script>
        // image preview
        var publish_sekarang_gallery = false;


       

        function onchangeImgPreview(imageInput, imagePreview) {
            var selectedFile = $(`${imageInput}`)[0].files[0];

            if (selectedFile) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(`${imagePreview}`).show()
                    $(`${imagePreview}`).attr("src", e.target.result);
                    $(`${imageInput}`).siblings("label").empty();
                };

                reader.readAsDataURL(selectedFile);
            } else if ($(`${imageInput}`).attr('data-id')) {
                $(".img-preview label").html("")
            } else {
                $(`${imagePreview}`).hide()
                $(`${imagePreview}`).attr("src", "");
                $(".img-preview label").html(`
                    <img src="{{ asset('template3/image/icon/icon-add-image.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Unggah gambar, atau <span class="text-primary">telusuri</span></p>
                        <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan
                            dalam format PNG atau JPG saja.
                        </small>
                    </div>
                `)
            }
        }

        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang_gallery = true;
            } else {
                publish_sekarang_gallery = false;
            }
        });
        //Alert
        function showerorAlert() {
            var alert = document.getElementById("alert-gagal");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }

        function showdoneAlert() {
            var alert = document.getElementById("alert-sukses");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }
        //submit form
        $("#submitGalleryForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append('type', 'foto');
            form.append("judul", $('#judul').val());
            form.append("publish", publish_sekarang_gallery);

            if ($('#foto_1')[0].files.length > 0) {
                form.append("files[]", $('#foto_1')[0].files[0])
            }
            if ($('#foto_2')[0].files.length > 0) {
                form.append("files[]", $('#foto_2')[0].files[0])
            }
            if ($('#foto_3')[0].files.length > 0) {
                form.append("files[]", $('#foto_3')[0].files[0])
            }
            if ($('#foto_4')[0].files.length > 0) {
                
                form.append("files[]", $('#foto_4')[0].files[0])
            }
            if ($('#foto_5')[0].files.length > 0) {
                form.append("files[]", $('#foto_5')[0].files[0])
            }
            if ($('#foto_6')[0].files.length > 0) {
                form.append("files[]", $('#foto_6')[0].files[0])
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{ route('gallery.store') }}`,
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
                        showAlert("Error!", "Silahkan periksa kembali data anda!", 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString();

                if (res.status === "success") {

                    if (publish_sekarang_gallery === true) {
                        //publish 
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/gallery/publish-one/${id}`,
                            "method": "POST",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": form
                        };

                        $.ajax(settings).done(function(response) {
                            var res_publish = JSON.parse(response);

                            if (res_publish.status === "success") {
                                closeLoading();
                                showAlert(msg = "success!", sub_msg = "Data Berhasil Ditambahkan",
                                    type = 'success');
                                window.location.href =
                                    "{{ route('admin.informasi.galeri.foto.index') }}";
                            } else {
                                closeLoading();
                                showAlert("Error!", "Silahkan periksa kembali data anda!",
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "success!", sub_msg = "Data Berhasil Ditambahkan", type =
                            'success');
                        window.location.href = "{{ route('admin.informasi.galeri.foto.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert("Error!", "Silahkan periksa kembali data anda!", 'danger');
                }
            });
        });

        $(document).ready(function() {
            $('#publishSekarang').change(function() {
                if ($(this).is(':checked')) {
                    $('#modalPublish').modal('show');
                }
            });

            $('#btnTidakPublish').click(function() {
                $('#publishSekarang').prop('checked', false);
                $('#modalPublish').modal('hide');
            });

            $('#btnYaPublish').click(function() {
                $('#modalPublish').modal('hide');

            });
        });
    </script>

</x-app-layout>
