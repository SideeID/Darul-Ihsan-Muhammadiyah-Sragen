<x-app-layout>
    <div class="container-lg karya-ilmiah">
        <a href="{{ route('informasi.karyaIlmiah') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Data</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-karya-ilmiah" id='form_karya-ilmiah' action="" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="gap-5 row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative">
                                <div class="d-flex justify-content-between">
                                    <label for="judul" class="form-label fw-500 small">Judul Karya Ilmiah</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <textarea id="judul" name="judul" class="form-control" placeholder="Judul Karya Ilmiah"
                                    aria-label="Judul Karya-ilmiah"></textarea>
                                <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3 form-group position-relative">
                                        <div class="d-flex justify-content-between">
                                            <label for="penulis" class="form-label fw-500 small">Penulis</label>
                                            <span class="text-danger">*</span>
                                        </div>
                                        <input type="text" id="penulis" name="penulis" class="form-control"
                                            placeholder="Tulis Nama Penulis" aria-label="Nama jurnalis">
                                        <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi
                                            yah.</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3 form-group position-relative">
                                        <label for="tanggal" class="form-label fw-500 small">Tanggal</label>
                                        <input type="date" id="tanggal" name="tanggal" class="form-control"
                                            placeholder="Tanggal Berita" aria-label="Tanggal Berita">
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex justify-content-between ">
                                    <label for="url" class="form-label fw-500 small">Link Dokumen</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                                    <input type="text" class="form-control rounded-end" id="url"
                                        placeholder="Tulis link" aria-label="Link Dokumen" style="color: #adb5bd;">
                                    <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column align-items-end ms-5">
                            <div class="mb-4 img-preview" style="width: 240px; overflow:hidden;">
                                <input type="file" hidden name="foto" id="foto"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto', '#img_preview');" required>
                                <img src="" id="img_preview" class="preview" onerror="this.style.display='none'"
                                    alt="foto karya-ilmiah">
                                <label for="foto" id="input_foto"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('template3/image/gallery-add.svg') }}" class="mx-auto mb-3"
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

                    <div class="row">
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
                            <button class="mt-auto mb-2 btn btn-warning fw-500 w-100" type="button"
                                data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan Data</button>
                        </div>
                    </div>



                    <!-- Modal simpan Data-->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
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
                                    <p class="mb-4 text-center text-black">
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

    <script>
        var id_karya_ilmiah = {!! json_encode($data) !!};
        let foto_value
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
                `);
            }
        }

        //Menampilkan data database
        var settingsGetDetail = {
            "url": `${path}/api/karya-ilmiah/detail/${id_karya_ilmiah}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#judul').val(data_detail.judul);
            $('#penulis').val(data_detail.penulis);
            $('#tanggal').val(data_detail.tanggal);
            $('#url').val(data_detail.url);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);

            if (data_detail.image === "" || data_detail.image === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `);
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
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'waiting'
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
            let id = $('#d_id').val();

            req({
                url: `${path}/api/karya-ilmiah/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide'); // Sembunyikan modal setelah penghapusan
                    window.location.href = `${path}/admin/informasi/karya-ilmiah/`; // Redirect
                }
            });
        });


        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            // var form = {
            //     judul: $('#judul').val(),
            //     penulis: $('#penulis').val(),
            //     tanggal: $('#tanggal').val(),
            //     url: $('#url').val(),
            //     status: publish_sekarang
            // };
            // if ($("#foto").val() !== "") {
            //     form.image = $("#foto")[0].files[0];
            // }

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("penulis", $('#penulis').val());
            form.append("tanggal", $('#tanggal').val());
            form.append("url", $('#url').val());
            form.append("status", publish_sekarang);
            if ($("#foto").val() !== "") {
                form.append("image", $("#foto")[0].files[0]);
            }

            // var settings = {
            //     "headers": {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            //         'Content-Type': 'application/json',
            //         'Accept': 'application/json'
            //     },
            //     "url": `${path}/api/karya-ilmiah/update/${id_karya_ilmiah}`,
            //     "method": "PUT",
            //     "timeout": 0,
            //     "timeout": 0,
            //     "mimeType": "multipart/form-data",
            //     "processData": false,
            //     "contentType": false,
            //     "data": JSON.stringify(form),
            //     beforeSend: (xhr) => {
            //         showLoading();
            //         return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
            //     },
            //     error: function(x, status, error) {
            //         if (x.status == 401) {
            //             console.log("Sorry, your session has expired. Please login again to continue");
            //             window.location.href = "{{ route('login') }}";
            //         } else {
            //             showAlert(msg = "Error!", sub_msg = "Request tidak sesuai", type = 'danger');
            //             closeLoading();
            //         }
            //     }
            // };

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/karya-ilmiah/update/${id_karya_ilmiah}`,
                "method": "POST",
                "timeout": 0,
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
                        //publish karya ilmiah
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/karya-ilmiah/publish-one/${id}`,
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
                                window.location.href = "{{ route('informasi.karyaIlmiah') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('informasi.karyaIlmiah') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                        type = 'danger');
                }
            });
        })

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
