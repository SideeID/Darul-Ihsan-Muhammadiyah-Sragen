<x-app-layout>
    <div class="container-lg galeri">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Slideshow</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Tentang Kami</li>
                        <li class="breadcrumb-item active" aria-current="page">Slideshow</li>
                    </ol>
                </nav>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div class="row">
                <div class="col-md-8">
                    <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                        <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Setting Slideshow</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end">
                        <button class="m-3 btn btn-primary mb-sm-0 w-100" type="button" data-bs-toggle="modal"
                            data-bs-target="#modalConfirm">Simpan Perubahan</button>
                    </div>
                </div>
            </div>
            <!-- Card img -->
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-galeri" id='form_galeri' action="" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_1" id="foto_1" data-id=""
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_1', '#img_preview_1');">
                                <img src="" id="img_preview_1" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_1" id="label_foto_1"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_2" id="foto_2" data-id=""
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_2', '#img_preview_2');">
                                <img src="" id="img_preview_2" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_2" id="label_foto_2"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_3" id="foto_3" data-id=""
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_3', '#img_preview_3');">
                                <img src="" id="img_preview_3" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_3" id="label_foto_3"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="mb-3 img-preview mb-md-4">
                                <input type="file" hidden name="foto_4" id="foto_4" data-id=""
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_4', '#img_preview_4');">
                                <img src="" id="img_preview_4" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_4" id="label_foto_4"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-center text-secondary d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Modal -->
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
                                        <button type="button" class="px-4 py-2 btn btn-primary fw-700"
                                            id="submitForm">Ya, Simpan!</button>
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
                </form>
            </div>
        </div>
    </div>

    @include('admin.components.alert-sukses')
    @include('admin.components.alert-gagal')
    @include('admin.components.alert-hapus')

    <script>
        var id_galeri = {!! json_encode($data) !!};
        let foto_value
        var keterangan;
        var publish_sekarang = false;
        var list_file

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
            "url": `${path}/api/pengaturan/slides/list-all`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;

            data_detail.map((item, index) => {
                $(`#foto_${index + 1}`).attr("data-id", item.id)
                $(`#img_preview_${index + 1}`).attr("src", path + item.file).show()
                // $(`#label_foto_${index + 1}`).empty().addClass("active")

                $(`#label_foto_${index + 1}`).attr("class",
                    "h-100 w-100 d-flex flex-column align-items-end justify-content-start detail-overlay"
                ).html(`
                    <div class="d-flex align-items-center justify-content-end">
                        <label for="foto_${index + 1}" class="px-5 btn btn-outline-white me-2" style="z-index: 1;">Ubah</label>
                        <button type="button" class="btn btn-outline-danger" style="z-index: 2;" onclick="openModalDelete('${item.id}')">
                            <img src="{{ asset('image/icon/icon-delete.svg') }}" alt="">
                        </button>
                    </div>
                `)
            })
        });


        //trigger modal delete
        function openModalDelete(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        //Alert
        function showerorAlert() {
            var alert = document.getElementById("alert-gagal");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }

        function showdoneAlert() {
            var alert = document.getElementById("alert-sukses");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }

        function showedeleteAlert() {
            var alert = document.getElementById("alert-hapus");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }


        //delete gambar
        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/pengaturan/slides/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    // setTable(`{{ route('gallery.all') }}?class=table-data&table=true&type=gambar`)
                    showedeleteAlert();
                    window.location.href = `${path}/admin/tentang/slideshow/`;
                }
            })
        })


        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
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
            // if ($('#foto_4').val() !== "") {
            //     if ($('#foto_4').attr('data-id')) {
            //         form.append("ids[]", $('#foto_4').attr('data-id'))
            //         form.append("files[]", $('#foto_4')[0].files[0])
            //     } else {
            //         form.append("new[]", $('#foto_4')[0].files[0])
            //     }
            // }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/pengaturan/slides/update`,
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
                        showerorAlert();
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                if (res.status === "success") {
                    closeLoading();
                    showdoneAlert();
                    window.location.href = "{{ route('tentang_kami.slideshow.index') }}";
                } else {
                    closeLoading();
                    showerorAlert();
                }
            });
            var modal = document.querySelector('#modalConfirm');
            var modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();
        });
    </script>

</x-app-layout>
