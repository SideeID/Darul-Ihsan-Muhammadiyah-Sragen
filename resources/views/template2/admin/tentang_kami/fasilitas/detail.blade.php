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
    </style>

    <div class="container-lg fasilitas">
        <a href="{{ route('tentang_kami.fasilitas.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Fasilitas</h5>
                <form id="uploadForm">
                    <div class="row">
                        <!-- Input Form Section (col-md-9) -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="inputjudul" class="form-label form-judul">Judul</label>
                                <input type="text" class="form-control" id="judul" placeholder="Judul"
                                    aria-label="Judul">
                                <div class="invalid-feedback">Kolom judul wajib diisin!</div>
                            </div>
                            {{-- <div class="mb-3">
                                <label for="inputtanggal" class="form-label form-judul">Tanggal</label>
                                <!-- Date Picker Dropdown -->
                                <div class="input-group">
                                    <input type="date" id="datepicker" class="form-control" placeholder="Tanggal"
                                        aria-label="Tanggal" style="cursor: pointer;" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="datepicker-button"
                                        style="border-left: none;">
                                        <img src="{{ asset('template2/img/icon-calendar.svg') }}" alt="Dropdown Icon"
                                            style="width: 16px; height: 16px;">
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                        <!-- Image Upload Section (col-md-3) -->
                        <div class="col-md-6 ">
                            {{-- <div class="card card-data-detail">
                                <img src="{{ asset('template2/assets/image/img-fasilitas1.jpeg') }}"
                                    class="card-img-top img-fluid " alt="card-img-top">
                                <div class="top-0 bottom-0 overlay position-absolute start-0 end-0 h-100">
                                    <div class="top-0 p-3 position-absolute end-0">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_1" id="foto_1"
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
                                        <small class="text-center text-secondary d-block">1920x1080px size required
                                            in PNG or JPG format only.</small>
                                    </div>
                                </label>
                                {{-- <div class="top-0 bottom-0 overlay position-absolute start-0 end-0 h-100">
                                    <div class="top-0 p-3 position-absolute end-0">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <p class="tentangkami-subtext">Gambar lainnya</p>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_2" id="foto_2"
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
                                {{-- <div class="top-0 bottom-0 overlay position-absolute start-0 end-0 h-100">
                                    <div class="top-0 p-3 position-absolute end-0">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                        </button>
                                    </div>
                                </div> --}}
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
                                {{-- <div class="top-0 bottom-0 overlay position-absolute start-0 end-0 h-100">
                                    <div class="top-0 p-3 position-absolute end-0">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_4" id="foto_4"
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
                                {{-- <div class="top-0 bottom-0 overlay position-absolute start-0 end-0 h-100">
                                    <div class="top-0 p-3 position-absolute end-0">
                                        <button class="btn btn-outline-light">Ganti</button>
                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#modalDelete"><img
                                                src="{{ asset('template2/img/icon-trash.svg') }}" alt="">
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="mt-4 d-md-flex justify-content-between align-items-center">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="publishSekarang">
                                <label class="form-check-label" for="exampleCheck1">*Centang box untuk publish data
                                    ke website</label>
                            </div>
                            <div>
                                <!-- Submit Button -->
                                <button type="submit" id="submitForm"
                                    class="mt-auto btn btn-warning btn-simpan-fas">Simpan
                                    Data</button>
                            </div>
                        </div>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="pb-0 border-0 modal-header">
                                        <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                            id="modalDeleteLabel">Konfirmasi
                                            Hapus Gambar</h1>
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
                                                id="buttonDelete">Ya,
                                                Hapus!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>

        <!-- Alert -->
        <div id="alertBatal" class="alert alert-danger custom-alert">
            <div class="d-flex">
                <div class="alert-img me-2">
                    <img src="{{ asset('template2/assets/image/Admin/info-circle.svg') }}" alt="">
                </div>
                <div class="alert-text">
                    <strong style="color: #D32246;">Permintaan Tidak Sesuai</strong>
                    <p class="m-0 text-secondary">Silahkan periksa kembali data anda!.
                    </p>
                </div>
                <button type="button" id="confirmBtnError" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        </div>

        <div id="alertDone-data" class="alert alert-success custom-alert">
            <div class="d-flex">
                <div class="alert-img me-2">
                    <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
                </div>
                <div class="alert-text">
                    <strong style="color: #3C7B46;">Done</strong>
                    <p class="m-0 text-secondary">Data berhasil ditambahkan</p>
                </div>
                <button type="button" id="confirmBtnSuccess" class="btn-close" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        </div>

        <div id="alertBerhasil" class="alert alert-success custom-alert">
            <div class="d-flex">
                <div class="alert-img me-2">
                    <img src="{{ asset('template2/img/icon-sukses-circle.svg') }}" alt="">
                </div>
                <div class="alert-text">
                    <strong style="color: #3C7B46;">Yeah</strong>
                    <p class="m-0 text-secondary">Perubahan data berhasil!</p>
                </div>
                <button type="button" id="confirmBtnSuccess" class="btn-close" data-bs-dismiss="alert"
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
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="mb-2 text-center text-black fw-700">Upload image, or <span class="text-primary">browse</span></p>
                        <small class="text-center text-secondary d-block">960x960px size required in PNG or JPG format only.</small>
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
                $('#judul').val(data_detail.judul);
                // $('#datepicker').val(data_detail.tanggal);
                $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);

                list_file = data_detail.files

                data_detail.files.map((item, index) => {
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

            function closeModalDelete(id) {
                $(`#${id}`).modal('hide');
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
            $("#submitForm").on("click", function(event) {
                event.preventDefault();

                var form = new FormData();
                form.append("judul", $('#judul').val());
                form.append("status", publish_sekarang = 'published' ? 'published' : 'waiting');
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

            // JS Setting Date
            document.addEventListener("DOMContentLoaded", function() {
                flatpickr("#datepicker", {
                    dateFormat: "Y-m-d",
                    defaultDate: "{{ date('Y-m-d') }}",
                    showMonths: 1,
                    locale: {
                        firstDayOfWeek: 1,
                        weekdays: {
                            shorthand: ['Mg', 'Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa'],
                            longhand: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
                                'Saturday'
                            ],
                        },
                        months: {
                            shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
                                'Nov', 'Des'
                            ],
                            longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
                                'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            ],
                        }
                    },
                    onChange: function(selectedDates, dateStr, instance) {
                        document.getElementById('datepicker').value = dateStr;
                    },
                    onReady: function(selectedDates, dateStr, instance) {
                        document.querySelector('.flatpickr-current-month .cur-year').style.display = 'none';
                    }
                });

                // Trigger datepicker on button click
                document.getElementById('datepicker-button').addEventListener('click', function() {
                    document.getElementById('datepicker').click();
                });
            });
        </script>

</x-app-layout>
