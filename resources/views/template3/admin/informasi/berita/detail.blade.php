<x-app-layout>
    <div class="container-lg berita">
        <a href="{{ route('informasi.berita.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Detail Berita</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-berita" id='form_berita' action="" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="d-flex justify-content-between">
                                    <label for="judul" class="form-label fw-500 small">Judul Berita</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="position-relative">
                                    <textarea id="judul" name="judul" class="form-control" placeholder="Judul Berita" aria-label="Judul Berita"></textarea>
                                </div>
                                <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                            </div>

                            <div class="mb-3 form-group position-relative">
                                <div class="d-flex justify-content-between">
                                    <label for="sumber" class="form-label fw-500 small">Penulis</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="position-relative">
                                    <input type="text" id="sumber" name="sumber" class="form-control"
                                        placeholder="Nama jurnalis" aria-label="Nama jurnalis">
                                </div>
                                <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group position-relative">
                                        <label for="tanggal" class="form-label fw-500 small">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            placeholder="Tanggal Berita" aria-label="Tanggal Berita">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group position-relative">
                                        <div class="d-flex justify-content-between">
                                            <label for="kategori" class="form-label fw-500 small">Kategori</label>
                                            <span class="text-danger">*</span>
                                        </div>
                                        <select name="kategori" id="kategori" class="form-select">
                                            <option value="kabar-dimsa">Kabar Dimsa</option>
                                            <option value="prestasi">Prestasi</option>
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
                                <label for="foto" id="input_foto"
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
                                <div class="form-check" id="checkboxPublish">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish berita!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-warning w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirm">Edit</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">Konfirmasi Ubah Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan data
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-warning fw-700"
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
        var id_berita = {!! json_encode($data) !!};
        let foto_value
        var isi;
        var publish_sekarang = false;

        //CKEditor
        ClassicEditor
            .create(document.querySelector('#isi'), {
                ckfinder: {
                    uploadUrl: "{{ route('berita.upload_image', ['_token' => csrf_token()]) }}"
                },
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

        //Menampilkan data database
        var settingsGetDetail = {
            "url": `${path}/api/berita/detail/${id_berita}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#judul').val(data_detail.judul);
            isi.data.set(data_detail.isi);
            $('#sumber').val(data_detail.sumber);
            $('#tanggal').val(data_detail.tanggal);

            req({
                url: `${path}/api/berita/kategori/list-published`,
                type: "GET",
                success: function(data) {
                    $(`#kategori`).html(
                        "<option value='' selected hidden disabled>Pilih Kategori</option>");

                    data.data.forEach((item) => {
                        $('#kategori').append(
                            `<option value="${item.judul}">${item.judul}</option>`);
                    });

                    $('#kategori').val(data_detail.kategori);
                }
            });

            if (data_detail.image === "" || data_detail.image === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `)
                foto_value = ""
            } else {
                $("#img_preview").attr("src", path + data_detail.image)
                $(".img-preview label").empty()
                $("#img_preview").show()
                $(".img-preview").append(`
                <div class="mt-3 d-flex align-items-center justify-content-end" style="position: absolute; top: 0px; right: 15px; display: flex; gap: 10px;">
                    <button type="button" class="btn btn-outline-light me-2" onclick="changeImage()">Ganti</button>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteImage()">
                        <img src="{{ asset('image/icon/icon-delete.svg') }}" alt="">
                    </button>
                </div>
            `);
            }

            if (data_detail.status === "published") {
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

        // Modal Delete
        function openModalDelete(id) {
            $('#d_id').val(id); // Set id gambar yang akan dihapus
            $("#modalDelete").modal('show'); // Tampilkan modal
        }

        function deleteImage() {
            document.getElementById("img_preview").src = "";
            document.getElementById("foto").value = "";

            $(".img-preview label").html(`
                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                <div class="label-content">
                    <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                    <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                </div>
            `);
        }

        function changeImage() {
            document.getElementById("foto").value = "";
            document.getElementById("img_preview").src = "";
            document.getElementById("input_foto").click();

            $(".img-preview label").html(`
                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                <div class="label-content">
                    <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                    <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                </div>
            `);
        }

        // Hapus gambar
        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val(); // Dapatkan id gambar

            req({
                url: `${path}/api/majalah/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide'); // Sembunyikan modal setelah penghapusan
                    window.location.href = `${path}/admin/tentang/majalah/`; // Redirect
                }
            });
        });

        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("isi", `${isi.getData()}`);
            form.append('summary', $(isi.getData()).text())
            form.append("sumber", $('#sumber').val());
            form.append("tanggal", $('#tanggal').val());
            form.append("kategori", $('#kategori').val());
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
                        showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
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
