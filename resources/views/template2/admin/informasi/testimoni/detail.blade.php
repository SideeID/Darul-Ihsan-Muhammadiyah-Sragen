<x-app-layout>
    <div class="container-lg testimoni">
        <a href="{{route('testimoni.index')}}" class="d-flex align-items-center text-dark text-decoration-none text-subdued mb-3">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column p-4">
                <h5 class="fw-600 text-dark mb-3 mb-sm-0 h6">Ubah Testimoni</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-testimoni" id='form_testimoni' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="img-preview mb-4 mb-md-5">
                                <input type="file" hidden name="foto" id="foto" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto', '#img_preview');">
                                <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">960x960px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" id="keterangan" name="keterangan" class="form-control" placeholder="Keterangan" aria-label="Keterangan">
                            </div>
                        </div>
                    </div>
                    <div class="form-group position-relative mb-3 mb-md-3">
                        <textarea name="isi" id="isi" class="form-control" placeholder="Isi Testimoni" aria-label="Isi Testimoni" style="min-height: 235.336px"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <div class="form-check" id="checkboxPublish">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish gambar!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary w-100 fw-500 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5" id="modalConfirmLabel">Konfirmasi Ubah Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menambahkan data ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success fw-700 py-2 px-4" id="submitForm">Ya, Simpan!</button>
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
        var id_testimoni = {!!json_encode($data) !!};
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
                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

        var settingsGetDetail = {
            "url": `${path}/api/testimoni/detail/${id_testimoni}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data = response.data;
            $('#nama').val(data.nama);
            isi.data.set(data.isi);
            $('#keterangan').val(data.keterangan);

            if (data.file === "" || data.file === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span class="text-primary">browse</span></p>
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
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("nama", $('#nama').val());
            form.append("isi", `${isi.getData()}`);
            form.append("keterangan", $('#keterangan').val());
            if ($("#foto").val() !== "") {
                form.append("file", $("#foto")[0].files[0]);
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/testimoni/update/${id_testimoni}`,
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
                        (msg = "Error!", sub_msg = "Request tidak sesuai", type = 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {

                    if (publish_sekarang === true) {
                        //publish testimoni
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/testimoni/publish-one/${id}`,
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
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!", type = 'success');
                                window.location.href = "{{ route('testimoni.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type = 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                        window.location.href = "{{ route('testimoni.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>