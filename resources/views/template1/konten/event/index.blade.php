<x-app-layout>
    <div class="container-lg berita">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Event</h5>
            </div>
            <div class="table-data card-body overflow-auto p-4">

                <div class="table-wrapper mb-4">
                    <table class="table table-scrollable mb-0" id="table">
                        <tbody>
                            <tr>
                                <td style="width: 5%;" scope="col">
                                    <img src="{{ asset('image/icon/icon-youtube.svg') }}" alt="youtube">
                                </td>
                                <td class="align-middle" scope="col"><b>Youtube Video</b></td>
                                <td class="align-middle" style="width: 15%;" scope="col">
                                    <form action="">
                                        @csrf

                                        <div class="form-check form-switch d-flex flex-row-reverse p-0">
                                            <input class="form-check-input" type="checkbox" role="switch" disabled id="publishYoutube">
                                        </div>
                                    </form>
                                </td>
                                <td style="width: 15%;" scope="col">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" id="editYoutube" class="btn btn-outline-warning me-2" data-type="youtube" onclick="editRow(null, 'youtube')" data-bs-toggle="tooltip" data-bs-title="Ubah Data"><img src="{{ asset('image/icon/icon-edit.svg') }}" alt="ubah"></button>
                                        <button type="button" id="deleteYoutube" disabled class="btn btn-outline-danger" onclick="deleteRow(14)" data-bs-toggle="tooltip" data-bs-title="Hapus Data"><img src="{{ asset('image/icon/icon-delete.svg') }}" class="" alt="delete"></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 5%;" scope="col">
                                    <img src="{{ asset('image/icon/icon-instagram.svg') }}" alt="instagram">
                                </td>
                                <td class="align-middle" scope="col"><b>Instagram post</b></td>
                                <td class="align-middle" style="width: 15%;" scope="col">
                                    <form action="">
                                        @csrf

                                        <div class="form-check form-switch d-flex flex-row-reverse p-0">
                                            <input class="form-check-input" type="checkbox" role="switch" disabled id="publishInstagram1">
                                        </div>
                                    </form>
                                </td>
                                <td style="width: 15%;" scope="col">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" id="editInstagram1" class="btn btn-outline-warning me-2" data-type="instagram" onclick="editRow(null, 'instagram atas')" data-bs-toggle="tooltip" data-bs-title="Ubah Data"><img src="{{ asset('image/icon/icon-edit.svg') }}" alt="ubah"></button>
                                        <button type="button" id="deleteInstagram1" disabled class="btn btn-outline-danger" onclick="deleteRow(14)" data-bs-toggle="tooltip" data-bs-title="Hapus Data"><img src="{{ asset('image/icon/icon-delete.svg') }}" class="" alt="delete"></button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 5%;" scope="col">
                                    <img src="{{ asset('image/icon/icon-instagram.svg') }}" alt="instagram">
                                </td>
                                <td class="align-middle" scope="col"><b>Instagram post</b></td>
                                <td class="align-middle" style="width: 15%;" scope="col">
                                    <form action="">
                                        @csrf

                                        <div class="form-check form-switch d-flex flex-row-reverse p-0">
                                            <input class="form-check-input" type="checkbox" role="switch" disabled id="publishInstagram2">
                                        </div>
                                    </form>
                                </td>
                                <td style="width: 15%;" scope="col">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" id="editInstagram2" class="btn btn-outline-warning me-2" data-type="instagram" onclick="editRow(null, 'instagram bawah')" data-bs-toggle="tooltip" data-bs-title="Ubah Data"><img src="{{ asset('image/icon/icon-edit.svg') }}" alt="ubah"></button>
                                        <button type="button" id="deleteInstagram2" disabled class="btn btn-outline-danger" onclick="deleteRow(14)" data-bs-toggle="tooltip" data-bs-title="Hapus Data"><img src="{{ asset('image/icon/icon-delete.svg') }}" class="" alt="delete"></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4 pb-0 border-0 flex-column align-items-start">
                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalEditLabel">Tambah dan sematkan ke halaman Anda</h1>
                    <p class="text-black mb-4">Sematkan video youtube, instagram post, dan lainnya.</p>
                </div>
                <div class="modal-body p-4">
                    <form action="">
                        @csrf

                        <div id="foto_post">
                            <p class="text-black fw-700 mb-4">Gambar Post</p>
                            <div class="img-preview mb-4 mb-md-5">
                                <input type="file" hidden name="foto" id="foto" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#foto', '#img_preview');">
                                <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="foto" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="form-group position-relative mb-3 mb-md-4">
                            <label for="type" class="form-label">Pilih tipe penyematan</label>
                            <select class="form-select" name="type" id="type" style="width: 100%" disabled>
                                <option value="" selected class="d-none">Pilih tipe penyematan</option>
                                <option value="youtube">Youtube</option>
                                <option value="instagram atas">Instagram</option>
                                <option value="instagram bawah">Instagram</option>
                            </select>
                        </div>
                        <div class="form-group position-relative mb-3 mb-md-4">
                            <label for="judul" class="form-label">Nama Event</label>
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Nama Event" aria-label="Nama Event">
                        </div>
                        <div class="form-group position-relative mb-3 mb-md-4">
                            <label for="tanggal" class="form-label">Tanggal Event</label>
                            <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal Event" aria-label="Tanggal Event">
                        </div>
                        <div class="form-group position-relative mb-3 mb-md-4">
                            <label for="url" class="form-label">URL</label>
                            <input type="text" id="url" name="url" class="form-control" placeholder="http://www." aria-label="URL">
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <input type="hidden" id="d_id">
                            <button type="button" class="btn btn-outline-secondary text-black d-flex align-items-center fw-700 me-3" onclick="closeModalEdit('modalEdit')">
                                <img src="{{ asset('image/icon/arrow-kembali.svg') }}" class="me-2" alt=""> Kembali
                            </button>
                            <a href="" class="btn btn-success fw-700 p-2" id="submitForm">Simpan Perubahan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var dataEvent = null
        var idYoutube
        var idInstagram1
        var idInstagram2
        var dataInstagramStatus
        var dataYoutubeStatus
        var publishYoutube
        var publishInstagram1
        var publishInstagram2

        function closeModalEdit(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        function editRow(id, type) {
            if (id === null) {
                $("#judul, #tanggal, #url").val("")
                $(`#foto`).hide()
                $(`#img_preview`).attr("src", "");
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            }

            $('#d_id').val(id)
            $("#modalEdit").modal('show');
            if (type === "youtube") {
                $("#foto_post").hide()
                $("#type").val("youtube")

                if (id === null) {
                    dataYoutubeStatus = false
                } else {
                    dataYoutubeStatus = true
                }
            } else if (type === "instagram atas") {
                $("#foto_post").show()
                $("#type").val("instagram atas")

                if (id === null) {
                    dataInstagramStatus = false
                } else {
                    dataInstagramStatus = true
                }
            } else {
                $("#foto_post").show()
                $("#type").val("instagram bawah")

                if (id === null) {
                    dataInstagramStatus = false
                } else {
                    dataInstagramStatus = true
                }
            }
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/event/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    window.location.href = "{{ route('event.index') }}";
                }
            })
        })

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
                            <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
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
                        <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            }
        }

        function getDetailYoutube() {
            var event_youtube = dataEvent.filter(v => v.type === "youtube");

            $("#type").val(event_youtube[0].type)
            $("#judul").val(event_youtube[0].judul)
            $("#tanggal").val(moment(event_youtube[0].tanggal, "DD MMM YYYY").format("YYYY-MM-DD"))
            $("#url").val(event_youtube[0].url)
            idYoutube = event_youtube[0].id
            $("#d_id").val(idYoutube)

            $("#publishYoutube").attr("onchange", `publishEvent('#publishYoutube', ${idYoutube})`);

            if (event_youtube[0].status === "deactive") {
                publishYoutube = false
                $("#publishYoutube").prop("checked", false);
            } else {
                publishYoutube = true
                $("#publishYoutube").prop("checked", true);
            }
        }

        function getDetailInstagramAtas() {
            var event_instagram = dataEvent.filter(v => v.type === "instagram atas");

            $("#type").val(event_instagram[0].type)
            $("#judul").val(event_instagram[0].judul)
            $("#tanggal").val(moment(event_instagram[0].tanggal, "DD MMM YYYY").format("YYYY-MM-DD"))
            $("#url").val(event_instagram[0].url)
            idInstagram1 = event_instagram[0].id
            $("#d_id").val(idInstagram1)

            $("#publishInstagram1").attr("onchange", `publishEvent('#publishInstagram1', ${idInstagram1})`);

            if (event_instagram[0].status === "deactive") {
                publishInstagram1 = false
                $("#publishInstagram1").prop("checked", false);
            } else {
                publishInstagram1 = true
                $("#publishInstagram1").prop("checked", true);
            }

            if (event_instagram[0].image === "" || event_instagram[0].image === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            } else {
                $("#img_preview").attr("src", path + event_instagram[0].image)
                $(".img-preview label").empty()
                $("#img_preview").show()
            }
        }

        function getDetailInstagramBawah() {
            var event_instagram = dataEvent.filter(v => v.type === "instagram bawah");

            $("#type").val(event_instagram[0].type)
            $("#judul").val(event_instagram[0].judul)
            $("#tanggal").val(moment(event_instagram[0].tanggal, "DD MMM YYYY").format("YYYY-MM-DD"))
            $("#url").val(event_instagram[0].url)
            idInstagram2 = event_instagram[0].id
            $("#d_id").val(idInstagram2)

            $("#publishInstagram2").attr("onchange", `publishEvent('#publishInstagram2', ${idInstagram2})`);

            if (event_instagram[0].status === null) {
                publishInstagram2 = false
                $("#publishInstagram2").prop("checked", false);
            } else {
                publishInstagram2 = true
                $("#publishInstagram2").prop("checked", true);
            }

            if (event_instagram[0].image === "" || event_instagram[0].image === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            } else {
                $("#img_preview").attr("src", path + event_instagram[0].image)
                $(".img-preview label").empty()
                $("#img_preview").show()
            }
        }

        //get event
        req({
            url: `${path}/api/event/list-all`,
            type: "GET",
            success: function(response) {
                var data = response.data
                dataEvent = data

                if (dataEvent !== null) {
                    var event_instagram_atas = dataEvent.filter(v => v.type === "instagram atas");
                    var event_instagram_bawah = dataEvent.filter(v => v.type === "instagram bawah");
                    var event_youtube = dataEvent.filter(v => v.type === "youtube");

                    console.log(event_instagram_atas.length, "event_instagram_atas")

                    if (event_instagram_atas.length === 0) {
                        $("#editInstagram1").attr("onclick", `editRow(null, 'instagram atas')`)
                    } else {
                        getDetailInstagramAtas()
                        $("#editInstagram1").attr("onclick", `getDetailInstagramAtas(), editRow(${idInstagram1}, 'instagram atas')`)
                        $("#deleteInstagram1").attr("onclick", `deleteRow(${idInstagram1})`)
                        $("#publishInstagram1").attr("disabled", false)
                        $("#deleteInstagram1").attr("disabled", false)
                    }

                    if (event_instagram_bawah.length === 0) {
                        $("#editInstagram2").attr("onclick", `editRow(null, 'instagram bawah')`)
                    } else {
                        getDetailInstagramBawah()
                        $("#editInstagram2").attr("onclick", `getDetailInstagramBawah(), editRow(${idInstagram2}, 'instagram bawah')`)
                        $("#deleteInstagram2").attr("onclick", `deleteRow(${idInstagram2})`)
                        $("#publishInstagram2").attr("disabled", false)
                        $("#deleteInstagram2").attr("disabled", false)
                    }

                    if (event_youtube.length !== 0) {
                        getDetailYoutube()
                        $("#editYoutube").attr("onclick", `getDetailYoutube(), editRow(${idYoutube}, 'youtube')`)
                        $("#deleteYoutube").attr("onclick", `deleteRow(${idYoutube})`)
                        $("#publishYoutube").attr("disabled", false)
                        $("#deleteYoutube").attr("disabled", false)
                    }

                }
            }
        })

        function tambahEvent() {
            var form = new FormData();
            form.append("judul", $("#judul").val());
            form.append("type", $("#type").val());
            form.append("url", $("#url").val());
            form.append("tanggal", $("#tanggal").val());
            form.append("status", "active");
            if ($("#type").val() === "instagram bawah" || $("#type").val() === "instagram atas") {
                form.append("image", $("#foto")[0].files[0]);
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/event/store`,
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
                var id = res.data.id.toString();

                if (res.status === "success") {
                    closeLoading();
                    window.location.href = "{{ route('event.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        }

        function editEvent() {
            var form = new FormData();
            form.append("judul", $("#judul").val());
            form.append("type", $("#type").val());
            form.append("url", $("#url").val());
            form.append("tanggal", $("#tanggal").val());
            if ($("#type").val() === "instagram bawah" || $("#type").val() === "instagram atas") {
                if ($("#foto").val() !== "") {
                    form.append("image", $("#foto")[0].files[0]);
                }
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/event/update/${$("#d_id").val()}`,
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
                var id = res.data.id.toString();

                if (res.status === "success") {
                    closeLoading();
                    window.location.href = "{{ route('event.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        }

        function publishEvent(idElement, idData) {
            var form = new FormData();
            if ($(`${idElement}`).is(':checked')) {
                form.append("status", "active");
            } else {
                form.append("status", "deactive");
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/event/update/${idData}`,
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
                var id = res.data.id.toString();

                if (res.status === "success") {
                    closeLoading();
                    window.location.href = "{{ route('event.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        }

        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            if (dataYoutubeStatus === true || dataInstagramStatus === true) {
                editEvent()
            } else {
                tambahEvent();
            }
        })
    </script>

</x-app-layout>