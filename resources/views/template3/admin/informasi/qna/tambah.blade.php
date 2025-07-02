<x-app-layout>
    <div class="container-lg staf">
        <a href="{{ route('admin.informasi.qna.index') }}"
            class="d-flex align-items-center text-dark text-decoration-none text-subdued mb-3">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column p-4">
                <h6 class="fw-bold text-dark mb-3 mb-sm-0 ">Tambah Data</h6>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-staf" id='form_staf' enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row justify-content-between">
                        <div class="col-md-6 text-dark">
                            <div class="form-group position-relative mb-3 mb-md-3 fw-medium">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="question" class="form-label">Question</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <textarea type="text" rows="5" id="question" name="question" class="form-control"
                                    placeholder="question" aria-label="question"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-3 fw-medium">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="answer" class="form-label">Answer</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <textarea type="text" rows="5" id="answer" name="answer" class="form-control"
                                    placeholder="tulis jawaban" aria-label="answer"></textarea>
                            </div>
                            {{-- <div class="img-preview mb-4 mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview"
                                    onerror="this.style.display='none'" alt="Foto Staf">
                                <label for="foto"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Unggah gambar, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-secondary text-center d-block">Ukuran 1920x1080px diperlukan
                                            dalam format
                                            PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mengaktifkan staf!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-end align-items-end">
                                <button class="btn btn-primary mt-auto fw-500 mb-2 w-100" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan Data</button>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5"
                                        id="modalConfirmLabel">
                                        Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menambahkan staf
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success fw-700 py-2 px-4"
                                            id="submitForm">Ya,
                                            Simpan!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi Hapus -->
                    <div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5" id="modalHapusLabel">
                                        Konfirmasi Hapus Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menghapus data ini?</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-danger fw-700 py-2 px-4" onclick="hapusFormGroup()">Ya, Hapus!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi publish -->
                    <div class="modal fade" id="modalPublish" tabindex="-1" aria-labelledby="modalPublishLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5"
                                        id="modalPublishLabel">
                                        Konfirmasi Publish Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin mempublish data ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3" id="btnTidakPublish"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-primary fw-700 py-2 px-4"
                                        id="btnYaPublish">Ya, Publish</button>
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
        var publish_sekarang = 'waiting';

        // Image preview
        // function onchangeImgPreview(imageInput, imagePreview) {
        //     var selectedFile = $(`${imageInput}`)[0].files[0];

        //     if (selectedFile) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $(`${imagePreview}`).show()
        //             $(`${imagePreview}`).attr("src", e.target.result);
        //             $(`${imageInput}`).siblings("label").empty();
        //         };

        //         reader.readAsDataURL(selectedFile);
        //     } else {
        //         $(`${imagePreview}`).hide()
        //         $(`${imagePreview}`).attr("src", "");
        //         $(".img-preview label").html(`
        //             <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
        //             <div class="label-content">
        //                 <p class="fw-700 text-black text-center mb-2">Upload image, or <span class="text-primary">browse</span></p>
        //                 <small class="text-secondary text-center d-block">1920x1080px size required in PNG or JPG format only.</small>
        //             </div>
        //         `)
        //     }
        // }

        // Checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'draft'
            }
        });

        // submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("question", $('#question').val());
            form.append("answer", $('#answer').val());
            // form.append("riwayat_pendidikan", $('#pendidikan').val());
            // form.append("pengalaman", $('#pengalaman').val());
            // form.append("prestasi", $('#prestasi').val());
            // form.append("image", $("#foto")[0].files[0]);
            form.append("status", publish_sekarang);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{ route('qna.store') }}`,
                "method": "POST",
                "timeout": 0,
                "mimeType": "multipart/form-data",
                "processData": false,
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
                        //publish guru
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/qna/publish-one/${id}`,
                            "method": "POST",
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
                                window.location.href = "{{ route('admin.informasi.qna.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('admin.informasi.qna.index') }}";
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
