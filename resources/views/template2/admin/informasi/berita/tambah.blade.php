<x-app-layout>
    <div class="container-lg berita">
        <a href="{{ route('informasi.berita.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Berita</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-berita" id='form_berita' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <label for="judul" class="form-label">Judul Berita</label>
                                <input type="text" id="judul" name="judul" class="form-control"
                                    placeholder="Judul Berita" aria-label="Judul Berita">
                            </div>
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <label for="sumber" class="form-label">Jurnalis</label>
                                <input type="text" id="sumber" name="sumber" class="form-control"
                                    placeholder="Nama jurnalis" aria-label="Nama jurnalis">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group position-relative mb-md-4">
                                        <label for="tanggal" class="form-label">Tanggal Berita</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            placeholder="Tanggal Berita" aria-label="Tanggal Berita">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group position-relative mb-md-3">
                                        <label for="kategori" class="form-label">Kategory</label>
                                        <select name="kategori" id="kategori" class="form-select">
                                            <option value="" class="d-none">Pilih Kategori</option>
                                            <option value="Berita">Berita</option>
                                            <option value="Kabar Sekolah">Kabar Sekolah</option>
                                            <option value="Artikel">Artikel</option>
                                            <option value="Prestasi">Prestasi</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');">
                                <img src="" id="img_preview" class="preview" onerror="this.style.display='none'"
                                    alt="">
                                <label for="foto"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">960x960px size required in PNG
                                            or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 form-group position-relative mb-md-3">
                        <textarea name="isi" id="isi" class="form-control" placeholder="Isi Berita" aria-label="Isi Berita"
                            style="min-height: 235.336px"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish berita!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-primary w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirm">Simpan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan data
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700"
                                            id="submitForm">Ya, Simpan!</button>
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
        var isi;
        var publish_sekarang = false;

        //CKEditor
        ClassicEditor
            .create(document.querySelector('#isi'), {
                ckfinder: {
                    uploadUrl: "{{route('berita.upload_image', ['_token' => csrf_token() ])}}"
                }
            })
            .then(editor => {
                isi = editor;
            })
            .catch(error => {
                console.error(error);
            })

        // image preview
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
            } else {
                $(`${imagePreview}`).hide()
                $(`${imagePreview}`).attr("src", "");
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = true
            } else {
                publish_sekarang = false
            }
        });

        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("kategori", $('#kategori').val());
            form.append("judul", $('#judul').val());
            form.append("isi", `${isi.getData()}`);
            form.append('summary', $(isi.getData()).text())
            form.append("sumber", $('#sumber').val());
            form.append("tanggal", $('#tanggal').val());
            form.append("image", $("#foto")[0].files[0]);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{ route('berita.store') }}`,
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
                        showAlert(msg = "Error!", sub_msg = "Request tidak sesuai", type = 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {

                    if (publish_sekarang === true) {
                        //publish berita
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/berita/publish-one/${id}`,
                            "method": "GET",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": form
                        };

                        $.ajax(settings).done(function(response) {
                            var res_publish = JSON.parse(response)

                            if (res_publish.status === "success") {
                                closeLoading();
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!",
                                    type = 'success');
                                window.location.href = "{{ route('informasi.berita.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('informasi.berita.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                        type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>
