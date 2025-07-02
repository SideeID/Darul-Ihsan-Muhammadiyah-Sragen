<x-app-layout>
    <div class="container-lg ads">
        @include('ads.tab')

        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column pt-4 px-4 pb-0">
                <a href="{{route('iklan.slider.index')}}" class="d-flex align-items-center text-dark text-decoration-none mb-3">
                    <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
                    Kembali
                </a>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-artikel mt-4" id='form_artikel' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="d-flex flex-column flex-md-row justify-content-between mb-3 mb-md-0">
                        <h5 class="text-black fw-700 mb-4">Ubah Iklan</h5>
                        <div class="form-check form-switch d-flex flex-row-reverse p-0">
                            <input class="form-check-input" type="checkbox" role="switch" id="publishAds">
                            <label class="form-check-label" for="publishAds">Aktifkan tombol swich untuk memunculkan iklan</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <p class="text-black fw-700 mb-1">Desktop</p>
                            <div class="img-preview ads-desktop" style="height: 420px;">
                                <input type="file" hidden name="ads_desktop" id="ads_desktop" accept="image/png, image/jpeg, image/jpg" onchange="onchangeImgPreview('#ads_desktop', '#ads_desktop_preview');" required>
                                <img src="" id="ads_desktop_preview" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="ads_desktop" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">Gunakan file dengan ukuran maksimal <b>2MB</b>
                                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <p class="text-black fw-700 mb-1">Mobile</p>
                            <div class="img-preview ads-mobile" style="height: 420px;">
                                <input type="file" hidden name="ads_mobile" id="ads_mobile" accept="image/png, image/jpeg, image/jpg" onchange="onchangeImgPreview('#ads_mobile', '#ads_mobile_preview');" required>
                                <img src="" id="ads_mobile_preview" class="preview" onerror="this.style.display='none'" alt="">
                                <label for="ads_mobile" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                    <div class="label-content">
                                        <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
                                        <small class="text-secondary text-center d-block">Gunakan file dengan ukuran maksimal <b>2MB</b>
                                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <label for="sumber" class="form-label">Link</label>
                                <input type="text" id="sumber" name="sumber" class="form-control" placeholder="Link" aria-label="Link" required>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex">
                        <button class="btn btn-success w-25 fw-500 mb-2 me-2" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">SIMPAN</button>
                        <button class="btn btn-tertiary d-flex justify-content-center align-items-center fw-500 mb-2 px-4" type="button" onclick="setData()">
                            <img src="{{ asset('image/icon/refresh.svg') }}" class="me-2" alt="">
                            RESET DATA
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header px-4 pt-4 pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalConfirmLabel">Konfirmasi Input Data</h1>
                                </div>
                                <div class="modal-body p-4">
                                    <p class="text-black mb-4">Apakah data yang anda masukkan sudah benar?, Anda bisa cek kembali jika belum yakin</p>
                                    <div class="d-flex align-items-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-danger fw-700 p-2 me-3 w-100" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-outline-success fw-700 p-2 w-100" id="submitForm">Simpan Data</button>
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
        var id_iklan = {!!json_encode($data) !!};
        var publish_ads;
        let ads_desktop
        let ads_mobile

        function setData() {
            req({
                url: `${path}/api/ads/detail/${id_iklan}`,
                type: "GET",
                success: function(response) {
                    var data = response.data

                    $("#sumber").val(data.sumber)
                    if (data.status === "waiting") {
                        publish_ads = false
                        $("#publishAds").prop("checked", false);
                    } else {
                        publish_ads = true
                        $("#publishAds").prop("checked", true);
                    }

                    function conditionalImage(main_class, variable_data, variable_value) {
                        if (variable_data.image === "" || variable_data.image === null) {
                            $(`${main_class} label`).html(`
                            <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                            <div class="label-content">
                                <p class="fw-700 text-black text-center mb-2">Upload or <span class="text-primary">browse</span></p>
                                <small class="text-secondary text-center d-block">Gunakan file dengan ukuran maksimal <b>2MB</b>
                                    dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                            </div>
                        `)
                            variable_value = ""
                        } else {
                            $(`${main_class} .preview`).attr("src", path + variable_data.image)
                            $(`${main_class} label`).empty()
                            $(`${main_class} .preview`).show()
                        }
                    }

                    conditionalImage(".ads-desktop", data, ads_desktop)
                    conditionalImage(".ads-mobile", data, ads_mobile)
                }
            })
        }

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
                            <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
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
                        <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            }
        }

        //checkbox publish sekarang
        $("#publishAds").change(function() {
            if ($(this).prop("checked")) {
                publish_ads = true
            } else {
                publish_ads = false
            }
        });


        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            if ($(`#ads_desktop`).val() !== "") {
                form.append("image", $(`#ads_desktop`)[0].files[0]);
            }
            if ($(`#ads_mobile`).val() !== "") {
                form.append("image_mobile", $(`#ads_mobile`)[0].files[0]);
            }
            form.append("sumber", $(`#sumber`).val());
            form.append("lokasi", "slider");
            form.append("judul", "iklan slider");
            form.append("isi", "iklan slider");
            if (publish_ads === true) {
                form.append("status", "published");
            } else {
                form.append("status", "waiting");
            }

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/ads/update/${id_iklan}`,
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
                    window.location.href = "{{ route('iklan.slider.index') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })

        $(function() {
            setData()
        });
    </script>

</x-app-layout>