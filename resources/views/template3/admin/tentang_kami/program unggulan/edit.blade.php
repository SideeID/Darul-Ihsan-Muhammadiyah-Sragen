<x-app-layout>
    <div class="container-lg program">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div class="mb-3">
                <a href="{{ route('tentang_sekolah.program_unggulan') }}"
                    class="text-decoration-none text-dark d-flex flex-direction-row align-items-center">
                    <p class="mt-0 mb-3"><span>&#x2039;</span> Kembali</p>
                </a>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-3 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h4 class="px-0 mb-3 fw-600 text-dark mb-sm-0 h6">Edit Data</h4>
            </div>
            <div class="p-3 py-4 overflow-auto table-data card-body">
                <form class="form-program" id='form_program' action="" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="row d-flex h-100 flex-direction-row">
                        <div class="col">
                            <div class="form-group text-align-left">
                                <label for="nama" class="nama d-flex justify-content-between align-items-center">
                                    <p class="py-0 my-0" style="font-weight: 700; font-size: 14px; padding-bottom-0">
                                        Nama Program</p>
                                    <i class="py-0 my-0 fas fa-asterisk"
                                        style="color: rgb(199, 0, 0); font-size: 10px;"></i>
                                </label>
                                <input type="text" class="form-control"
                                    style="font-size: 14px; color: #9EA3A9; padding-block: 7px;" id="nama"
                                    placeholder="Tulis nama program">
                            </div>
                            <div class="mt-3 form-group text-align-left">
                                <label for="url" class="d-flex justify-content-between align-items-center">
                                    <p class="py-0 my-0" style="font-weight: 700; font-size: 14px;">Link Video</p>
                                    <i class="py-0 my-0 fas fa-asterisk"
                                        style="color: rgb(199, 0, 0); font-size: 10px;"></i>
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                                    <input type="text" class="form-control rounded-end"
                                        style="font-size: 14px; color: #9EA3A9; padding-block: 7px;" id="url"
                                        placeholder="Tulis link" aria-label="Link Dokumen">
                                </div>
                            </div>
                            <div class="mt-3 form-group text-align-left">
                                <label for="deskripsi"
                                    class="deskripsi d-flex justify-content-between align-items-center">
                                    <p class="py-0 my-0" style="font-weight: 700; font-size: 14px; padding-bottom-0">
                                        Deskripsi Program</p>
                                    <i class="py-0 my-0 fas fa-asterisk"
                                        style="color: rgb(199, 0, 0); font-size: 10px;"></i>
                                </label>
                                <textarea type="text" rows="5" class="form-control"
                                    style="font-size: 14px; color: #9EA3A9; padding-block: 7px;" id="deskripsi" placeholder="Tulis deskripsi"></textarea>
                                <small id="error-msg" style="color: red; display: none;">Oops, kolom ini tidak boleh
                                    kosong. Mohon diisi yah!</small>
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
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center"
                                    style="z-index: -999;">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Unggah sampul, atau <span
                                                class="text-primary">telusuri</span></p>
                                        <small class="text-center text-secondary d-block">Ukuran 1920x1080px diperlukan
                                            dalam format PNG atau JPG saja.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-md-9">
                            <div class="mb-3 form-group position-relative">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk publish data ke website!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-items-end">
                            <button class="mt-auto mb-2 btn btn-edit fw-500 w-100" type="button" data-bs-toggle="modal"
                                style="z-index: 999;" data-bs-target="#modalConfirm">Simpan Perubahan</button>
                        </div>
                    </div>
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">Konfirmasi Edit Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin mengubah data
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700" style="background-color: #ffb013 !important; color: #000000 !important; border: none !important;"
                                            id="submitForm">Ya, Ubah!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="notif-warning" class="notif" style="display: none">
        <span class="notif-warning-icon">
            <img src="{{ asset('template3/image/warning.svg') }}" alt="">
        </span>
        <span id="notification-message" class="px-2 notification-text d-flex">
            <h6 class="m-0" style="font-weight: 600; color: #D32246; font-size: 14px;">Maaf, permintaan gagal</h6>
            <p style="margin: 0; color: #666; font-size: 12px;">Silahkan periksa kembali data anda!</p>
        </span>
        <button id="close-notif-warning" class="close-btn">✖</button>
    </div>

    <x-modal></x-modal>

    <script>
        var id_program = {!! json_encode($data) !!};
        let gambar_value
        var publish_sekarang = 'waiting'

        // Function
        function closeModalDelete(modalId) {
            $(`#${modalId}`).modal('hide');
        }

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
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

        //Menampilkan data database
        var settingsGetDetail = {
            "url": `${path}/api/program-unggulan/detail/${id_program}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#nama').val(data_detail.nama);
            $('#deskripsi').val(data_detail.deskripsi);
            $('#url').val(data_detail.url);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);

            if (data_detail.gambar === "" || data_detail.gambar === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `);
                gambar_value = ""
            } else {
                $("#img_preview").attr("src", path + data_detail.gambar)
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

            if (data_detail.status == "published") {
                publish_sekarang = 'published';
                // $('#publishSekarang').parent().hide();
            } else {
                publish_sekarang = 'waiting';
                // $('#publishSekarang').parent().show();
            }
        });

        // Modal Delete
        function openModalDelete(id) {
            $('#d_id').val(id); // Set id gambar yang akan dihapus
            $("#modalDelete").modal('show'); // Tampilkan modal
        }

        function deleteImage() {
            document.getElementById("img_preview").src = "";
            document.getElementById("gambar").value = "";

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
                url: `${path}/api/program-unggulan/delete/${id_program}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide'); // Sembunyikan modal setelah penghapusan
                    window.location.href =
                        `${path}/admin/tentang-sekolah/program-unggulan/`; // Redirect
                }
            });
        });

        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'waiting'
            }
        });

        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            // Buat FormData object untuk handle file upload
            var formData = new FormData();

            // Tambahkan field-field ke FormData
            formData.append('nama', $('#nama').val());
            formData.append('deskripsi', $('#deskripsi').val());
            formData.append('url', $('#url').val());
            formData.append('status', publish_sekarang);

            if ($('#foto')[0].files[0] !== undefined) {
                formData.append('gambar', $('#foto')[0].files[0]);
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                "url": `${path}/api/program-unggulan/update/${id_program}`,
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "contentType": false,
                "data": formData,
                "beforeSend": (xhr) => {
                    showLoading();
                    return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                "error": function(x, status, error) {
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
                var res = response;
                var id = res.data.id.toString()

                if (res.status === "success") {

                    if (publish_sekarang === true) {
                        //publish karya ilmiah
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/program-unggulan/publish/${id}`,
                            "method": "GET",
                            "timeout": 0,
                            "processData": false,
                            "mimeType": "multipart/form-data",
                            "contentType": false,
                            "data": form
                        };

                        $.ajax(settings).done(function(response) {
                            var res_publish = response;

                            if (res_publish.status === "success") {
                                closeLoading();
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!",
                                    type = 'success');
                                window.location.href =
                                    "{{ route('tentang_sekolah.program_unggulan') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('tentang_sekolah.program_unggulan') }}";
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

    <style>
        .h-100 {
            height: 100%;
        }

        .media-upload .upload-box {
            min-height: 100%;
            height: 290px !important;
        }

        .col {
            flex-grow: 1;
        }

        .notif {
            display: flex;
            align-items: flex-start;
            justify-content: flex-start;
            padding: 10px;
            background-color: #FFE1DF;
            border-radius: 5px;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .notification-text {
            flex-direction: column;
        }

        .close-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            color: #666;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #ffb013;
        }

        .btn-edit:hover {
            background-color: #eca414;
        }
    </style>
</x-app-layout>
