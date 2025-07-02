<x-app-layout>
    <div class="container-lg staf">
        <a href="{{ route('tentang_kami.staf.index') }}"
            class="d-flex align-items-center text-dark text-decoration-none text-subdued mb-3">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column p-4">
                <h5 class="fw-600 text-dark mb-3 mb-sm-0 h6">Tambah Data Guru/Staf</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-staf" id='form_staf' enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    placeholder="e.g; Nama" aria-label="Nama Staf">
                            </div>
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="jabatan" class="form-label">Jabatan</label>
                                <input type="text" id="jabatan" name="jabatan" class="form-control"
                                    placeholder="Jabatan Guru" aria-label="Jabatan Staf">
                            </div>
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="pendidikan" class="form-label">Riwayat Pendidikan</label>
                                <textarea id="pendidikan" name="pendidikan" class="form-control" placeholder="Input Pendidikan"
                                    aria-label="pendidikan Staf"></textarea>
                            </div>
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="Pengalaman" class="form-label">Pengalaman</label>
                                <textarea id="pengalaman" name="Pengalaman" class="form-control" placeholder="Input Pengalaman"
                                    aria-label="pengalaman Staf"></textarea>
                            </div>
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="prestasi" class="form-label">Prestasi</label>
                                <textarea id="prestasi" name="prestasi" class="form-control" placeholder="prestasi Staf" aria-label="Prestasi Staf"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="img-preview mb-4 mb-md-5">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview" onerror="this.style.display='none'"
                                    alt="Foto Staf">
                                <label for="foto"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">960x960px size required in PNG
                                            or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
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
                </form>
            </div>
        </div>
    </div>

    <script>
        var publish_sekarang = 'waiting';

        // Image preview
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
                        <small class="text-secondary text-center d-block">1920x1080px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

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
            form.append("nama", $('#nama').val());
            form.append("jabatan", $('#jabatan').val());
            form.append("riwayat_pendidikan", $('#pendidikan').val());
            form.append("pengalaman", $('#pengalaman').val());
            form.append("prestasi", $('#prestasi').val());
            form.append("image", $("#foto")[0].files[0]);
            form.append("status", publish_sekarang);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{ route('guru-staff.store') }}`,
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
                            "url": `${path}/guru-staff/publish-one/${id}`,
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
                                window.location.href = "{{ route('tentang_kami.staf.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('tentang_kami.staf.index') }}";
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
