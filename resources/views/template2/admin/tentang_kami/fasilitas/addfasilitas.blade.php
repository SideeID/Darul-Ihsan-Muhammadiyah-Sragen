<x-app-layout>
    <div class="container-lg fasilitas">

        <a href="{{ route('tentang_kami.fasilitas.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Fasilitas</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-fasilitas" id='form_fasilitas' action="" enctype="multipart/form-data"
                    method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <label for="nama_fasilitas" class="form-label">Judul</label>
                                <input type="text" id="nama_fasilitas" name="nama_fasilitas" class="form-control"
                                    placeholder="Nama Fasilitas" aria-label="Nama Fasilitas">
                            </div>
                            {{-- <div class="mb-3 form-group position-relative mb-md-3">
                                <label for="keterangan" class="form-label">Tanggal</label>
                                <!-- Date Picker Dropdown -->
                                <div class="input-group">
                                    <input type="text" id="datepicker" class="form-control" placeholder="Hari ini"
                                        style="cursor: pointer;" readonly>
                                    <button class="btn btn-outline-secondary" type="button" id="datepicker-button"
                                        style="border-left: none;">
                                        <img src="{{ asset('template2/img/icon-calendar.svg') }}" alt="Dropdown Icon"
                                            style="width: 16px; height: 16px;">
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="col-md-6">
                            <div class="mb-4 img-preview mb-md-5">
                                <div class="img-preview mb-3 mb-md-4">
                                    <input type="file" hidden name="foto_1" id="foto_1"
                                        accept="image/png, image/jpeg"
                                        onchange="onchangeImgPreview('#foto_1', '#img_preview_1');">
                                    <img src="" id="img_preview_1" class="preview"
                                        onerror="this.style.display='none'" alt="">
                                    <label for="foto_1"
                                        class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                            alt="icon upload foto">
                                        <div class="label-content">
                                            <p class="fw-700 text-black text-center mb-2">Upload image, or <span
                                                    class="text-primary">browse</span></p>
                                            <small class="text-secondary text-center d-block">1920x1080px size required
                                                in PNG or JPG format only.</small>
                                        </div>
                                    </label>
                                </div>
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
                                <label for="foto_2"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
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
                                <label for="foto_3"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-4 img-preview mb-md-5">
                                <input type="file" hidden name="foto_4" id="foto_4"
                                    accept="image/png, image/jpeg"
                                    onchange="onchangeImgPreview('#foto_4', '#img_preview_4');">
                                <img src="" id="img_preview_4" class="preview"
                                    onerror="this.style.display='none'" alt="">
                                <label for="foto_4"
                                    class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3"
                                        alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload image, or <span
                                                class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">1920x1080px size required in
                                            PNG or JPG format only.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishFasilitas">
                                    <label class="form-check-label" for="publishFasilitas">
                                        *Centang box disamping untuk mempublish fasilitas!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-primary w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirmFasilitas">Simpan</button>
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
                                            id="submitFasilitasForm">Ya, Simpan!</button>
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
        // image preview
        var publish_sekarang_fasilitas = false;


        function onchangeImgPreview(imageInput, imagePreview) {
            var selectedFile = $(`${imageInput}`)[0].files[0];

            if (selectedFile) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(`${imagePreview}`).show();
                    $(`${imagePreview}`).attr("src", e.target.result);
                    $(`${imageInput}`).siblings("label").empty();
                };

                reader.readAsDataURL(selectedFile);
            } else {
                $(`${imagePreview}`).hide();
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

        //checkbox publish sekarang
        $("#publishFasilitas").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang_fasilitas = true;
            } else {
                publish_sekarang_fasilitas = false;
            }
        });
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
        //submit form
        $("#submitFasilitasForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#nama_fasilitas').val());
            // form.append("keterangan", $('#keterangan').val());
            // form.append("tanggal", $('#datepicker').val());
            form.append("publish", publish_sekarang_fasilitas);
            // form.append("image", $("#foto_fasilitas")[0].files[0]);

            if ($('#foto_1')[0].files.length > 0) {
                form.append("files[]", $('#foto_1')[0].files[0])
            }
            if ($('#foto_2')[0].files.length > 0) {
                form.append("files[]", $('#foto_2')[0].files[0])
            }
            if ($('#foto_3')[0].files.length > 0) {
                form.append("files[]", $('#foto_3')[0].files[0])
            }
            if ($('#foto_4')[0].files.length > 0) {
                form.append("files[]", $('#foto_4')[0].files[0])
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{ route('fasilitas.store') }}`,
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
                        showAlert("Error!", "Silahkan periksa kembali data anda!", 'danger');
                        closeLoading();
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString();

                if (res.status === "success") {

                    if (publish_sekarang_fasilitas === true) {
                        //publish fasilitas
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
                            var res_publish = JSON.parse(response);

                            if (res_publish.status === "success") {
                                closeLoading();
                                showAlert(msg = "success!", sub_msg = "Data Berhasil Ditambahkan", type = 'success');
                                window.location.href =
                                    "{{ route('tentang_kami.fasilitas.index') }}";
                            } else {
                                closeLoading();
                                showAlert("Error!", "Silahkan periksa kembali data anda!", 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "success!", sub_msg = "Data Berhasil Ditambahkan", type = 'success');
                        window.location.href = "{{ route('tentang_kami.fasilitas.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert("Error!", "Silahkan periksa kembali data anda!", 'danger');
                }
            });
        });

        // JS Setting Date
        // document.addEventListener("DOMContentLoaded", function() {
        //     flatpickr("#datepicker", {
        //         dateFormat: "Y-m-d",
        //         defaultDate: "{{ date('Y-m-d') }}",
        //         showMonths: 1,
        //         locale: {
        //             firstDayOfWeek: 1,
        //             weekdays: {
        //                 shorthand: ['Mg', 'Sn', 'Sl', 'Ra', 'Ka', 'Ju', 'Sa'],
        //                 longhand: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday',
        //                     'Saturday'
        //                 ],
        //             },
        //             months: {
        //                 shorthand: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt',
        //                     'Nov', 'Des'
        //                 ],
        //                 longhand: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli',
        //                     'Agustus', 'September', 'Oktober', 'November', 'Desember'
        //                 ],
        //             }
        //         },
        //         onChange: function(selectedDates, dateStr, instance) {
        //             document.getElementById('datepicker').value = dateStr;
        //         },
        //         onReady: function(selectedDates, dateStr, instance) {
        //             document.querySelector('.flatpickr-current-month .cur-year').style.display = 'none';
        //         }
        //     });

        //     // Trigger datepicker on button click
        //     document.getElementById('datepicker-button').addEventListener('click', function() {
        //         document.getElementById('datepicker').click();
        //     });
        // });
    </script>

</x-app-layout>
