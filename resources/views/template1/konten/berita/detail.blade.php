<x-app-layout>
    <div class="container-lg berita">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column pt-4 px-4 pb-0">
                <a href="{{route('berita.index')}}" class="d-flex align-items-center text-dark text-decoration-none mb-3">
                    <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
                    Kembali
                </a>
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Detail Berita</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <hr class="my-4">
                <form class="form-berita" id='form_berita' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <p class="text-black fw-700 mb-4">Gambar Berita</p>
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

                    <p class="text-black fw-700 mb-4">Detail Berita</p>
                    <div class="form-group position-relative mb-3 mb-md-3">
                        <label for="judul" class="form-label">Judul Berita</label>
                        <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Berita" aria-label="Judul Berita">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="tanggal" class="form-label">Tanggal Berita</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal Berita" aria-label="Tanggal Berita">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="sumber" class="form-label">Jurnalis</label>
                                <input type="text" id="sumber" name="sumber" class="form-control" placeholder="Nama jurnalis" aria-label="Nama jurnalis">
                            </div>
                        </div>
                    </div>
                    <div class="form-group position-relative mb-3 mb-md-3">
                        <textarea name="isi" id="isi" class="form-control" placeholder="Isi Berita" aria-label="Isi Berita" style="min-height: 235.336px"></textarea>
                    </div>
                    <div class="form-group position-relative mb-3 mb-md-3" id="checkboxPublish">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="publishSekarang">
                            <label class="form-check-label" for="publishSekarang">
                                Publish sekarang
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-success w-100 fw-500" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm" id="modalConfirmTrigger">SIMPAN DATA BERITA</button>

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
                                        <button type="button" class="btn btn-outline-success fw-700 p-2 w-100" id="submitPublish">Simpan Data</button>
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
        var id_berita = {!!json_encode($data) !!};
        let foto_value
        var isi;
        var publish_sekarang = false;

        //CKEditor
        ClassicEditor
            .create(document.querySelector('#isi'))
            .then(editor => {
                isi = editor;
            })
            .catch(error => {
                console.error(error);
            });

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

        var settingsGetDetail = {
            "url": `${path}/api/berita/detail/${id_berita}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            console.log(response);
            var data = response.data;
            $('#judul').val(data.judul);
            isi.data.set(data.isi);
            $('#sumber').val(data.sumber);
            $('#tanggal').val(data.tanggal);

            if (data.image === "" || data.image === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
                foto_value = ""
            } else {
                $("#img_preview").attr("src", path + data.image)
                $(".img-preview label").empty()
                $("#img_preview").show()
            }

            if (data.status === "published") {
                $("#checkboxPublish").hide();
            }
        });

        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = true
            } else {
                publish_sekarang = false
            }
        });

        //submit publish
        $("#submitPublish").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("isi", `${isi.getData()}`);
            form.append('summary', $(isi.getData()).text())
            form.append("sumber", $('#sumber').val());
            form.append("tanggal", $('#tanggal').val());
            if ($("#foto").val() !== "") {
                form.append("image", $("#foto")[0].files[0]);
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/berita/update/${id_berita}`,
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
                                window.location.href = "{{ route('berita.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Gagal publish", type = 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        window.location.href = "{{ route('berita.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>