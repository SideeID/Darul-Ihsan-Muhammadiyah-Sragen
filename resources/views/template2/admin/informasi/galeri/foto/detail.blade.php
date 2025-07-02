<x-app-layout>
    <div class="container-lg galeri">
        <a href="{{route('galeri.foto.index')}}" class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Galeri</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-galeri" id='form_galeri' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group position-relative mb-md-4">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul" aria-label="Judul">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 form-group position-relative mb-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" aria-label="Tanggal">
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="mb-3 form-group position-relative mb-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gambarGuru">
                                    <label class="form-check-label" for="gambarGuru">
                                        Gambar termasuk foto guru & karyawan.
                                    </label>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="mb-3 form-group position-relative mb-md-4">
                                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Deskripsi" aria-label="Deskripsi" style="min-height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_1" id="foto_1" data-id="" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto_1', '#img_preview_1');">
                                <img src="" id="img_preview_1" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto_1" id="label_foto_1" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_2" id="foto_2" data-id="" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto_2', '#img_preview_2');">
                                <img src="" id="img_preview_2" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto_2" id="label_foto_2" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_3" id="foto_3" data-id="" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto_3', '#img_preview_3');">
                                <img src="" id="img_preview_3" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto_3" id="label_foto_3" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_4" id="foto_4" data-id="" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto_4', '#img_preview_4');">
                                <img src="" id="img_preview_4" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto_4" id="label_foto_4" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_5" id="foto_5" data-id="" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto_5', '#img_preview_5');">
                                <img src="" id="img_preview_5" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto_5" id="label_foto_5" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3 img-preview mb-md-3">
                                <input type="file" hidden name="foto_6" id="foto_6" data-id="" accept="image/png, image/jpeg" onchange="onchangeImgPreview('#foto_6', '#img_preview_6');">
                                <img src="" id="img_preview_6" class="preview" onerror="this.style.display='none'" alt="">
                                <!-- <label for="foto_6" id="label_foto_6" class="h-100 w-100 d-flex flex-column align-items-end justify-content-start detail-overlay">
                                    <div class="d-flex align-items-center justify-content-end">
                                        <label for="foto_6" class="btn btn-outline-white me-2">Ubah</label>
                                        <button type="button" class="btn btn-outline-danger" onclick="openModalDelete('6')">
                                            <img src="{{ asset('image/icon/icon-delete.svg') }}" alt="">
                                        </button>
                                    </div>
                                </label> -->
                                <label for="foto_6" id="label_foto_6" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form-check" id="checkboxPublish">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish galeri!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-primary w-100 fw-500" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5" id="modalConfirmLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan data ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-success fw-700" id="submitForm">Ya, Simpan!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5" id="modalDeleteLabel">Konfirmasi Hapus File</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menghapus file ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-danger fw-700 me-3" data-bs-dismiss="modal" onclick="closeModalDelete('modalDelete')">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700" id="buttonDelete">Ya, Hapus!</button>
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
        var id_galeri = {!!json_encode($data) !!};
        let foto_value
        var keterangan;
        var publish_sekarang = false;
        var list_file
        var gambar_guru

        //CKEditor
        ClassicEditor
            .create(document.querySelector('#keterangan'))
            .then(editor => {
                keterangan = editor;
            })
            .catch(error => {
                console.error(error);
            });

        function closeModalDelete(modalId) {
            $(`#${modalId}`).modal('hide');
        }

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
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
                    </div>
                `)
            }
        }

        var settingsGetDetail = {
            "url": `${path}/api/gallery/detail/${id_galeri}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#judul').val(data_detail.judul);
            $('#sumber').val(data_detail.sumber);
            $('#tanggal').val(data_detail.tanggal);

            if (data_detail.guru === "true") {
                $("#gambarGuru").prop('checked', true);
            } else if (data_detail.guru === "1") {
                $("#gambarGuru").prop('checked', true);
            } else {
                $("#gambarGuru").prop('checked', false);
            }

            if (data_detail.keterangan) {
                keterangan.data.set(data_detail.keterangan);
            }
            list_file = data_detail.files

            data_detail.files.map((item, index) => {
                $(`#foto_${index + 1}`).attr("data-id", item.id)
                $(`#img_preview_${index + 1}`).attr("src", path + item.file).show()
                // $(`#label_foto_${index + 1}`).empty().addClass("active")

                $(`#label_foto_${index + 1}`).attr("class", "h-100 w-100 d-flex flex-column align-items-end justify-content-start detail-overlay").html(`
                    <div class="gap-2 d-flex align-items-center justify-content-end">
                        <label for="foto_${index + 1}" class="px-5 btn btn-outline-white me-2" style="z-index: 1;">Ubah</label>
                        <button type="button" class="btn btn-outline-danger" style="z-index: 2;" onclick="openModalDelete('${item.id}')">
                            <img src="{{ asset('image/icon/icon-delete.svg') }}" alt="">
                        </button>
                    </div>
                `)
            })

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

        //checkbox guru
        $("#gambarGuru").change(function() {
            if ($(this).prop("checked")) {
                gambar_guru = "true"
            } else {
                gambar_guru = "false"
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
                url: `${path}/api/gallery/delete-file/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    // setTable(`{{route('gallery.all')}}?class=table-data&table=true&type=gambar`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    window.location.href = `${path}/admin/informasi/galeri/foto/detail/${id_galeri}`;
                }
            })
        })

        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("keterangan", `${keterangan.getData()}`);
            form.append("tanggal", $('#tanggal').val());
            form.append("guru", gambar_guru);
            form.append("type", "gambar");
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
            if ($('#foto_4').val() !== "") {
                if ($('#foto_4').attr('data-id')) {
                    form.append("ids[]", $('#foto_4').attr('data-id'))
                    form.append("files[]", $('#foto_4')[0].files[0])
                } else {
                    form.append("new[]", $('#foto_4')[0].files[0])
                }
            }
            if ($('#foto_5').val() !== "") {
                if ($('#foto_5').attr('data-id')) {
                    form.append("ids[]", $('#foto_5').attr('data-id'))
                    form.append("files[]", $('#foto_5')[0].files[0])
                } else {
                    form.append("new[]", $('#foto_5')[0].files[0])
                }
            }
            if ($('#foto_6').val() !== "") {
                if ($('#foto_6').attr('data-id')) {
                    form.append("ids[]", $('#foto_6').attr('data-id'))
                    form.append("files[]", $('#foto_6')[0].files[0])
                } else {
                    form.append("new[]", $('#foto_6')[0].files[0])
                }
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/gallery/update/${id_galeri}`,
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
                        //publish galeri
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/gallery/publish/${id}`,
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
                                window.location.href = "{{ route('galeri.foto.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type = 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                        window.location.href = "{{ route('galeri.foto.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>
