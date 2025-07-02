<x-landing-page-layout>
    <style>
        .btn {
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            padding: 8px;
            border-radius: 12px;
            letter-spacing: 0.01em;
        }
    </style>
    <!-- tanglet-diskusi -->
    <section class="tanglet-diskusi detail">
        <div class="container">

            <div class="row row-cols-1 row-cols-md-2">

                <div class="col col-md-8 tanglet-diskusi-container pe-md-5">
                    <a href="{{ url('/nderek-tangklet') }}" class="btn py-2 px-4 rounded-pill border border-secondary btn-kembali">
                        <img src="{{ asset('landingpage/assets/images/arrow-left.svg') }}" alt="" class="">
                    </a>

                    <form class="form-tanglet" id='form_tanglet' action="" enctype="multipart/form-data" method="post">
                        @csrf
                        <h2 class="form-tanglet-judul">Silahkan isi form untuk bertanya</h2>

                        <div class="form-group position-relative mb-4 mb-md-4">
                            <label for="judul" class="form-label">Judul Pertanyaan</label>
                            <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul Pertanyaan" aria-label="Judul Pertanyaan" onchange="checkFormStep1()" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group position-relative mb-4 mb-md-4">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama Lengkap" aria-label="Nama Lengkap" onchange="checkFormStep1()" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group position-relative mb-4 mb-md-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Email" aria-label="Email" onchange="checkFormStep1()" required>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group position-relative mb-4 mb-md-4">
                            <label for="pertanyaan" class="form-label">Pertanyaan</label>
                            <textarea name="pertanyaan" id="pertanyaan" class="form-control" placeholder="Pertanyaan" aria-label="Pertanyaan" style="min-height: 235.336px" onchange="checkFormStep1()" required></textarea>
                            <div class="invalid-feedback"></div>
                        </div>

                        <button class="btn btn-success w-100 fw-500" type="button" id="btnModalConfirm" onclick="validateForm1()">SUBMIT PERTANYAAN</button>

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
                                            <button class="btn btn-outline-success fw-700 p-2 w-100" id="buttonSubmit">Simpan Data</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modalStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalStatusLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header px-4 pt-4 pb-0 border-0">
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body p-4">
                                        <h3 class="text-black text-center mb-4 fw-700">Pertanyaan Berhasil Dikirim!</h3>
                                        <img src="{{ asset('landingpage/assets/images/icon-success.svg') }}" alt="" class="mx-auto my-5 d-block">
                                        <p class="text-center">Anda akan dialihkan ke Nderek Tangklet dalam 5 detik atau klik di bawah.</p>
                                        <a href="{{ url('/nderek-tangklet') }}" class="btn btn-outline-black fw-500 w-100">Kembali Ke Nderek Tangklet</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="col col-md-4">
                    <h4 class="mb-5 side-article-header mt-5 mt-md-0">Kolom Artikel</h4>

                    <div id="list_artikel">

                    </div>

                    <div class="rounded-5 mt-5">
                        <img src="" alt="" class="w-100 h-100 object-fit-cover rounded-4" id="adsImage">
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- tanglet-diskusi end-->

    <script>
        function openModalConfirm() {
            $("#modalConfirm").modal('show');
        }

        function hideErrorMessage(element) {
            element.siblings(".invalid-feedback").hide();
            element.siblings(".invalid-feedback").html("");
        }

        function showErrorMessage(element, errorMessage) {
            element.siblings(".invalid-feedback").show();
            element.siblings(".invalid-feedback").html(errorMessage);
        }

        function isFieldEmpty(fieldValue) {
            return fieldValue === "";
        }

        function validateField(field, errorMessage) {
            let element = $(`[name='${field}']`);

            var fieldValue = element.val();
            if (isFieldEmpty(fieldValue)) {
                showErrorMessage(element, errorMessage);
                return true;
            }

            hideErrorMessage(element);
            return false;
        }

        function validateForm1() {
            const validationRules = {
                "judul": "Judul harus diisi.",
                "nama": "Nama lengkap harus diisi.",
                "email": "Email harus diisi.",
                "pertanyaan": "Pertanyaan harus diisi."
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
            $("#form_tanglet .form-control").each(function() {
                if ($(this).val() === '') {
                    allFilled = false;
                } else {
                    hideErrorMessage($(this))
                }
            });
            if (allFilled) {
                $("#btnModalConfirm").attr("onclick", 'openModalConfirm()')
            } else {
                $("#btnModalConfirm").attr("onclick", '')
            }
        }

        //submit
        $("#buttonSubmit").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("nama", $('#nama').val());
            form.append("email", $('#email').val());
            form.append("pertanyaan", $('#pertanyaan').val());

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{route('landing.nderek.ask')}}`,
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
                var id = res.data.id.toString()

                if (res.status === "success") {
                    closeLoading();
                    $("#modalConfirm").modal('hide');
                    $("#modalStatus").modal('show');
                    setTimeout(function() {
                        window.location.href = `${path}/`;
                    }, 5000);
                } else {
                    closeLoading();
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })

        //get artikel
        req({
            url: `${path}/landing/artikel`,
            type: "GET",
            success: function(response) {
                var data = response.data.slice(0, 3)

                $("#list_artikel").html(data.map((item) => {
                    return `
                        <div class="w-100 side-article-card p-4">
                            <a href="${path}/artikel/${item.id}" class="text-decoration-none text-dark">
                                <div class="d-flex align-items-center gap-2 text-secondary mb-3 side-article-tanggal">
                                    <p class="fw-bold m-0">
                                        ${moment(item.tanggal).format("MMM")}, ${moment(item.tanggal).format("DD")}
                                    </p>
                                    <img src="{{ asset('landingpage/assets/images/dot.svg') }}" alt="">
                                    <p class="m-0">
                                        ${moment(item.tanggal).format("YYYY")}
                                    </p>
                                </div>
                                <h5 class="side-article-title fw-bold line-clamp-2">
                                    ${item.judul}
                                </h5>
                            </a>
                        </div>
                    `
                }))
            }
        })

        //get ads
        req({
            url: `${path}/landing/ads`,
            type: "GET",
            success: function(response) {
                var data = response.data.non_slider

                function getObjectWithLokasi(array, lokasiValue) {
                    for (var i = 0; i < array.length; i++) {
                        if (array[i].lokasi === lokasiValue) {
                            return array[i];
                        }
                    }
                    return null;
                }

                var halaman_vertical = getObjectWithLokasi(data, "halaman_vertical");

                //ads
                if (halaman_vertical.status === "waiting") {
                    $("#adsImage").hide()
                } else {
                    $("#adsImage").attr("src", halaman_vertical.image)
                }
            }
        })
    </script>
</x-landing-page-layout>