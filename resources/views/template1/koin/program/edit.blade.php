<x-app-layout>
    <div class="container-lg jamaah haji">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column pt-4 px-4 pb-0">
                <a href="{{route('koin.program.index')}}" class="d-flex align-items-center text-dark text-decoration-none mb-3">
                    <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
                    Kembali
                </a>
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Pengajuan Program</h5>
            </div>
            <div class="card-body overflow-auto p-4">
                <form class="form-haji" id='form_haji' action="" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="stepper">
                        <hr class="visited">
                        <div class="stepper-item active" id="stepper_item_1" onclick="">
                            <div class="number mb-md-3">1</div>
                            <p class="mb-0 text-center">Informasi Umum</p>
                        </div>
                        <hr>
                        <div class="stepper-item" id="stepper_item_2" onclick="">
                            <div class="number mb-md-3">2</div>
                            <p class="mb-0 text-center">Foto Detail</p>
                        </div>
                        <hr>
                    </div>
                    <hr class="my-4">

                    <!-- step 1 -->
                    <section id="step_1">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <p class="text-black fw-700 mb-3">Detail Program</p>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <label for="nama_program" class="form-label">Nama Program<span class="text-danger">*</span></label>
                                    <input type="text" id="nama_program" name="nama_program" class="form-control" placeholder="Nama Program" aria-label="Nama Program" onchange="checkFormStep1()" required>
                                    <div class="invalid-feedback"></div>
                                </div>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <label for="deskripsi_program" class="form-label">Deskripsi Program<span class="text-danger">*</span></label>
                                    <textarea name="deskripsi_program" id="deskripsi_program" class="form-control " placeholder="Deskripsi Program" aria-label="Deskripsi Program" style="height: 235.336px" onchange="checkFormStep1()" required></textarea>
                                    <div class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="text-black fw-700 mb-3">Detail Program</p>
                                <div class="img-preview mb-3 mb-md-4">
                                    <input type="file" hidden name="foto" id="foto" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#foto', '#img_preview'); checkFormStep1()" required>
                                    <img src="" id="img_preview" class="preview" onerror="this.style.display='none'" alt="">
                                    <label for="foto" id="img_preview_label" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                        <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                        <div class="label-content">
                                            <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload,
                                                or <span class="text-primary">browse</span></p>
                                            <small class="text-secondary text-center d-block">Gunakan dimensi
                                                <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                                dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                        </div>
                                    </label>
                                    <div class="invalid-feedback text-center"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="text-black fw-700 mb-3">Dana yang diajukan<span class="text-danger">*</span>
                                </p>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <label for="nominal_anggaran" class="form-label">Dana</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="nominal_anggaran">Rp.</span>
                                        <input type="text" id="dana" name="dana" class="form-control text-end" placeholder="0" aria-label="Dana" onkeyup="inputRupiah(this)" onchange="checkFormStep1()" required>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <p class="text-black fw-700 mb-3">Inisiator</p>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <div class="bg-transparent text-decoration-none d-flex align-items-center p-0">
                                        <img id="user-foto" src="{{ asset('image/avatar.png') }}" class="admin-avatar" alt="avatar">
                                        <div>
                                            <div class="text-dark admin-title fw-700"><span id="user-nama">{{
                                                    auth()->user()->name ?? '-' }}</span></div>
                                            <span class="text-secondary admin-subtitle">{{ucfirst(auth()->user()->roles[0]->name
                                                ?? 'Pengguna belum memiliki role.')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success w-100 fw-500" type="button" onclick="changeStep(2)">SELANJUTNYA</button>
                    </section>

                    <!-- step 2 -->
                    <section id="step_2">
                        <div class="row">
                            <div class="col-md-6 col-lg-12">
                                <p class="text-black fw-700 mb-3">Inisiator</p>
                                <div class="form-group position-relative mb-3 mb-md-4">
                                    <div class="bg-transparent text-decoration-none d-flex align-items-center p-0">
                                        <img id="user-foto" src="{{ asset('image/avatar.png') }}" class="admin-avatar" alt="avatar">
                                        <div>
                                            <div class="text-dark admin-title fw-700"><span id="user-nama">{{
                                                    auth()->user()->name ?? '-' }}</span></div>
                                            <span class="text-secondary admin-subtitle">{{ucfirst(auth()->user()->roles[0]->name
                                                ?? 'Pengguna belum memiliki role.')}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-12">
                                <p class="text-black fw-700 mb-3">Detail Foto</p>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6">
                                        <div class="img-preview mb-3">
                                            <input type="file" hidden name="detail_foto_1" id="detail_foto_1" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#detail_foto_1', '#detail_foto_1_preview'); checkFormStep2()" required>
                                            <img src="" id="detail_foto_1_preview" class="preview" onerror="this.style.display='none'" alt="">
                                            <label for="detail_foto_1" id="detail_foto_1_label" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                                <div class="label-content">
                                                    <p class="fw-700 text-black text-center mb-2">Drag & drop image to
                                                        upload, or <span class="text-primary">browse</span></p>
                                                    <small class="text-secondary text-center d-block">Gunakan dimensi
                                                        <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                                        dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                                </div>
                                            </label>
                                            <div class="invalid-feedback text-center"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="img-preview mb-3">
                                            <input type="file" hidden name="detail_foto_2" id="detail_foto_2" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#detail_foto_2', '#detail_foto_2_preview'); checkFormStep2()" required>
                                            <img src="" id="detail_foto_2_preview" class="preview" onerror="this.style.display='none'" alt="">
                                            <label for="detail_foto_2" id="detail_foto_2_label" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                                <div class="label-content">
                                                    <p class="fw-700 text-black text-center mb-2">Drag & drop image to
                                                        upload, or <span class="text-primary">browse</span></p>
                                                    <small class="text-secondary text-center d-block">Gunakan dimensi
                                                        <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                                        dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                                </div>
                                            </label>
                                            <div class="invalid-feedback text-center"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="img-preview mb-3">
                                            <input type="file" hidden name="detail_foto_3" id="detail_foto_3" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#detail_foto_3', '#detail_foto_3_preview'); checkFormStep2()" required>
                                            <img src="" id="detail_foto_3_preview" class="preview" onerror="this.style.display='none'" alt="">
                                            <label for="detail_foto_3" id="detail_foto_3_label" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                                <div class="label-content">
                                                    <p class="fw-700 text-black text-center mb-2">Drag & drop image to
                                                        upload, or <span class="text-primary">browse</span></p>
                                                    <small class="text-secondary text-center d-block">Gunakan dimensi
                                                        <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                                        dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                                </div>
                                            </label>
                                            <div class="invalid-feedback text-center"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="img-preview mb-3">
                                            <input type="file" hidden name="detail_foto_4" id="detail_foto_4" accept="image/png, image/jpg, image/jpeg" onchange="onchangeImgPreview('#detail_foto_4', '#detail_foto_4_preview'); checkFormStep2()" required>
                                            <img src="" id="detail_foto_4_preview" class="preview" onerror="this.style.display='none'" alt="">
                                            <label for="detail_foto_4" id="detail_foto_4_label" class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                                                <div class="label-content">
                                                    <p class="fw-700 text-black text-center mb-2">Drag & drop image to
                                                        upload, or <span class="text-primary">browse</span></p>
                                                    <small class="text-secondary text-center d-block">Gunakan dimensi
                                                        <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                                                        dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                                                </div>
                                            </label>
                                            <div class="invalid-feedback text-center"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success w-100 fw-500" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">AJUKAN PROGRAM</button>
                    </section>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header px-4 pt-4 pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalConfirmLabel">Konfirmasi
                                        Input Data</h1>
                                </div>
                                <div class="modal-body p-4">
                                    <p class="text-black mb-4">Apakah data yang anda masukkan sudah benar?, Anda bisa
                                        cek kembali jika belum yakin</p>
                                    <div class="d-flex align-items-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-danger fw-700 p-2 me-3 w-100" data-bs-dismiss="modal">Batal</button>
                                        <button class="btn btn-outline-success fw-700 p-2 w-100" id="buttonSubmit">Simpan Data</button>
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
        var id_campaign = {!!json_encode($data) !!};
        var settingsGetDetail = {
            "url": `${path}/api/koin/campaign/detail/${id_campaign}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data = response.data;
            $('#nama_program').val(data.nama);
            $('#deskripsi_program').val(data.deskripsi);
            $('#dana').val(rupiah(data.dana.split('.')[0], "angka"));
            if (data.poster === "" || data.poster === null) {
                $(".img-preview label").html(`
                    <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
                    <div class="label-content">
                        <p class="fw-700 text-black text-center mb-2">Drag & drop image to upload, or <span class="text-primary">browse</span></p>
                        <small class="text-secondary text-center d-block">Gunakan dimensi <b>800x600px</b> dengan ukuran maksimal <b>2MB</b>
                            dengan ekstensi file <b>PNG</b> atau <b>JPG</b>.</small>
                    </div>
                `)
            } else {
                $("#img_preview").attr("src", data.poster).show()
                $("#img_preview_label").empty()
            }

            data.details.map((item) => {
                $(`#detail_foto_${item.index}_preview`).attr("src", path + item.url).show()
                $(`#detail_foto_${item.index}_label`).empty().addClass("active")
            })
        });

        $("#buttonSubmit").on("click", function(event) {
            event.preventDefault();

            let form = new FormData()
            const dana = $("#dana").val();
            form.append("nama", $('#nama_program').val())
            form.append("deskripsi", $('#deskripsi_program').val())
            form.append("dana", derupiah($('#dana').val().replace(/\./g, ""), "angka"))
            if ($('#foto')[0].files.length > 0) {
                form.append("image", $('#foto')[0].files[0])
            }

            // if ($('#detail_foto_1')[0].files.length > 0) {
            //     form.append("detail_1", $('#detail_foto_1')[0].files[0])
            // }
            // if ($('#detail_foto_2')[0].files.length > 0) {
            //     form.append("detail_2", $('#detail_foto_2')[0].files[0])
            // }
            // if ($('#detail_foto_3')[0].files.length > 0) {
            //     form.append("detail_3", $('#detail_foto_3')[0].files[0])
            // }
            // if ($('#detail_foto_4')[0].files.length > 0) {
            //     form.append("detail_4", $('#detail_foto_4')[0].files[0])
            // }
            
            if ($("#detail_foto_1").val() !== "") {
                form.append("detail_1", $("#detail_foto_1")[0].files[0]);
            }
            if ($("#detail_foto_2").val() !== "") {
                form.append("detail_2", $("#detail_foto_2")[0].files[0]);
            }
            if ($("#detail_foto_3").val() !== "") {
                form.append("detail_3", $("#detail_foto_3")[0].files[0]);
            }
            if ($("#detail_foto_4").val() !== "") {
                form.append("detail_4", $("#detail_foto_4")[0].files[0]);
            }
            const settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/koin/campaign/update/${id_campaign}`,
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
            }

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {
                    window.location.href = "{{ route('koin.program.index') }}";
                    closeLoading();
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');

                }
            });
        })
        $("#step_2").hide()
        $("#step_3").hide()

        function handleFileInputChange(element) {
            var id = $(element).data("id");
            var label_id = "#id-file_" + id;
            var labelElement = $(label_id);
            var fileName = $(element).val().split('\\').pop();
            if (fileName) {
                labelElement.html(fileName);
            } else {
                labelElement.html(`
                        <img src="{{ asset('image/icon/upload-outline-success.svg') }}" class="me-2" alt="icon upload">
                        UNGGAH BERKAS
                    `);
            }
        }

        function hideErrorMessage(element) {
            element.siblings(".invalid-feedback").hide();
            element.siblings(".invalid-feedback").html("");
        }

        function showErrorMessage(element, errorMessage) {
            element.siblings(".invalid-feedback").show();
            element.siblings(".invalid-feedback").html(errorMessage);
        }

        function showErrorMessageForRadioGroup(formGroup, errorMessage) {
            formGroup.find(".invalid-feedback").show();
            formGroup.find(".invalid-feedback").html(errorMessage);
        }

        function hideErrorMessageForRadioGroup(formGroup) {
            formGroup.find(".invalid-feedback").hide();
            formGroup.find(".invalid-feedback").html("");
        }

        // function isFileInputEmpty(fileInput) {
        //     return fileInput.files.length === 0;
        // }

        function isFieldEmpty(fieldValue) {
            return fieldValue === "";
        }

        function validateField(field, errorMessage) {
            // let element = $("#" + field);
            let element = $(`[name='${field}']`);



            var fieldValue = element.val();
            if (isFieldEmpty(fieldValue)) {
                showErrorMessage(element, errorMessage);
                return true;

            }

            hideErrorMessage(element);
            return false;
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
                        // $(".img-preview label").empty()
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

        //stepper
        function changeStep(step) {
            $("#step_1, #step_2, #step_3").hide();

            if (step >= 1) {
                $("#step_" + step).show();
            }
        }

        function validateForm1() {
            const validationRules = {
                "nama_program": "Nama program harus dipilih.",
                "deskripsi_program": "Deskripsi program harus dipilih.",
                "dana": "Dana harus dipilih.",
                "foto": "Foto harus dipilih."
            };

            let hasErrors = false;
            $.each(validationRules, function(field, errorMessage) {
                const fieldHasErrors = validateField(field, errorMessage);
                if (fieldHasErrors) {
                    hasErrors = true;
                }
            });
        }

        function checkFormStep1(field) {
            var allFilled = true;
            $("#step_1 input[type='text'], #step_1 textarea").each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                } else {
                    hideErrorMessage($(this))
                }
            });
            if (allFilled) {
                $(".stepper .stepper-item:first").removeClass("active").addClass("visited")
                $(".stepper hr:first").removeClass("active").addClass("visited")
                $("#stepper_item_1").attr("onclick", "changeStep(1)")
                $("#step_1 button").attr("onclick", "changeStep(2)")
                $("#stepper_item_2").attr("onclick", "changeStep(2)")
            } else {
                $(".stepper .stepper-item:first").removeClass("visited").addClass("active")
                $(".stepper hr:first").removeClass("visited").addClass("active")
                $("#stepper_item_1").attr("onclick", 'validateForm1()')
                $("#step_1 button").attr("onclick", 'validateForm1()')
                $("#stepper_item_2").attr("onclick", '')
            }
        }

        function validateForm2() {
            const validationRules = {
                "provinsi": "Provinsi harus dipilih.",
                "kota": "Kota harus dipilih.",
                "kecamatan": "Kecamatan harus dipilih.",
                "kelurahan": "Kelurahan harus dipilih.",
                "kode_pos": "Kode pos harus diisi.",
                "alamat": "Alamat harus diisi."
            };

            let hasErrors = false;
            $.each(validationRules, function(field, errorMessage) {
                const fieldHasErrors = validateField(field, errorMessage);
                if (fieldHasErrors) {
                    hasErrors = true;
                }
            });
        }

        function checkFormStep2() {
            var allFilled = true;
            $("#step_2 input[type='text'], #step_2 textarea, #step_2 select").each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                } else {
                    hideErrorMessage($(this))
                }
            });
            if (allFilled) {
                $(".stepper .stepper-item:nth(1)").removeClass("active").addClass("visited")
                $(".stepper hr:nth(1)").removeClass("active").addClass("visited")
                $("#stepper_item_2").attr("onclick", "changeStep(2)")
                $("#step_2 button").attr("onclick", "changeStep(3)")
                $("#stepper_item_3").attr("onclick", "changeStep(3)")
            } else {
                $(".stepper .stepper-item:nth(1)").removeClass("visited").addClass("active")
                $(".stepper hr:nth(1)").removeClass("visited").addClass("active")
                $("#stepper_item_2").attr("onclick", 'validateForm2()')
                $("#step_2 button").attr("onclick", 'validateForm2()')
                $("#stepper_item_3").attr("onclick", '')
            }
        }
    </script>

</x-app-layout>