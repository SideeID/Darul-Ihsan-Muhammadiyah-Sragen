<x-app-layout>
    <style>
        .form-control::placeholder {
            font-size: 14px;
            color: #151619;
        }

        .btn-simpan-fas {
            width: 233px;
            height: 40px;

        }

        .card-fasilitas {
            height: 300px;
            width: auto;
        }

        .card-data-detail .overlay {
            background: linear-gradient(to top, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0));
            opacity: 0;
            height: 50%;
            transition: all ease-in-out 0.3s;
            border-radius: 8px;
        }

        .card-data-detail .overlay:hover {
            background-color: rgba(0, 0, 0, 0.6);
            opacity: 1;
            height: 300px;
        }

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

    <div class="container-lg fasilitas">
        <a href="{{ route('tentang_kami.fasilitas.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-700 text-dark mb-sm-0 h6">Edit Data</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-fasilitas" id='form_fasilitas' action="" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="nama_fasilitas" class="form-label fw-500 small">Judul Fasilitas</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control"
                                    placeholder="Nama Fasilitas" aria-label="Nama Fasilitas">
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
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish fasilitas!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-warning w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalEdit">Simpan Perubahan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirmFasilitas" tabindex="-1"
                        aria-labelledby="modalConfirmFasilitasLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmFasilitasLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan
                                        fasilitas
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700"
                                            >Ya, Simpan!</button>
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

                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalDeleteLabel">Konfirmasi Hapus Gambar</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menghapus gambar
                                        ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-danger fw-700 me-3"
                                            data-bs-dismiss="modal"
                                            onclick="closeModalDelete('modalDelete')">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700"
                                            id="buttonDelete">Ya, Hapus!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Konfirmasi edit -->
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalEditLabel">
                                        Konfirmasi Edit Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin mengubah data
                                        ini?</p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-warning fw-700"
                                            id="submitFasilitasForm">Ya, Ubah!</button>
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
        var id_fasilitas = {!! json_encode($data) !!};
        let foto_value
        var publish_sekarang = 'waiting';
        var list_file

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

        var settingsGetDetail = {
            "url": `${path}/api/fasilitas/detail/${id_fasilitas}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#nama_fasilitas').val(data_detail.judul);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);

            publish_sekarang = data_detail.status === "published" ? 'published' : 'waiting';

            list_file = data_detail.files

            data_detail.files.map((item, index) => {
                $(`#foto_${index + 1}`).attr("data-id", item.id)
                $(`#img_preview_${index + 1}`).attr("src", path + item.file).show()
                // $(`#label_foto_${index + 1}`).empty().addClass("active")

                $(`#label_foto_${index + 1}`).attr("class",
                    "h-100 w-100 d-flex flex-column align-items-end justify-content-start detail-overlay position-absolute top-0"
                ).css({
                    "background-color": "rgba(0, 0, 0, 0.3)",
                    "border-radius": "5px",
                    "z-index": "1"
                }).html(`
                <div class="p-3 d-flex align-items-center justify-content-end">
                    <label for="foto_${index + 1}" class="btn btn-outline-light me-2">Ganti</label>
                    <button type="button" class="btn btn-outline-danger" onclick="openModalDelete('${item.id}')">
                        <img src="{{ asset('image/icon/icon-delete.svg') }}" alt="">
                    </button>
                </div>
                `);
            })

            if (data_detail.status === "published") {
                $("#checkboxPublish").hide();
            }
        });

        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published';
            } else {
                publish_sekarang = 'waiting';
            }
        });

        //trigger modal delete
        function openModalDelete(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        function closeModalDelete(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        //delete gambar
        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/fasilitas/delete-file/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    // setTable(`{{ route('gallery.all') }}?class=table-data&table=true&type=gambar`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    window.location.href = `${path}/admin/tentang/fasilitas/detail/${id_fasilitas}`;
                }
            })
        })

        //submit publish
        $("#submitFasilitasForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#nama_fasilitas').val());
            // form.append("tanggal", $('#datepicker').val());
            form.append("status", publish_sekarang);
            if ($('#foto_1').val() !== "") {
                if ($('#foto_1').attr('data-id')) {
                    form.append("ids[]", $('#foto_1').attr('data-id'))
                    form.append("files[]", $('#foto_1')[0].files[0])
                } else {
                    form.append("new[]", $('#foto_1')[0].files[0])
                }
            }
            if ($('#foto_2').val() !== "") {
                if ($('#foto_2').attr('data-id')) {
                    form.append("ids[]", $('#foto_2').attr('data-id'))
                    form.append("files[]", $('#foto_2')[0].files[0])
                } else {
                    form.append("new[]", $('#foto_2')[0].files[0])
                }
            }
            if ($('#foto_3').val() !== "") {
                if ($('#foto_3').attr('data-id')) {
                    form.append("ids[]", $('#foto_3').attr('data-id'))
                    form.append("files[]", $('#foto_3')[0].files[0])
                } else {
                    form.append("new[]", $('#foto_3')[0].files[0])
                }
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/fasilitas/update/${id_fasilitas}`,
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

                    if (publish_sekarang === 'published') {
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/fasilitas/publish-one/${id}`,
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
                                window.location.href =
                                    "{{ route('tentang_kami.fasilitas.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                        window.location.href = "{{ route('tentang_kami.fasilitas.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                        type = 'danger');
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
