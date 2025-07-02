<x-app-layout>
    <div class="container-lg galeri">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-700">Tata Tertib</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Tentang Sekolah</li>
                        <li class="breadcrumb-item">Tata Tertib</li>
                        <li class="breadcrumb-item active" aria-current="page">Atur Data</li>
                    </ol>
                </nav>
            </div>
        </header>

        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Tata Tertib</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-berita" id='form_berita' action="" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between ">
                                    <label for="url" class="form-label fw-500 small">Link Data</label>
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
                        <div class="col-md-2">
                            <button class="mt-4 btn btn-primary fw-500 w-100" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirm">Simpan Data</button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3 form-group position-relative">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label small fw-500" for="publishSekarang">
                                        *Centang box disamping untuk publish data ke website!
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Modal simpan data-->
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
                                        <button type="button" class="btn btn-outline-black fw-700" id="btnTidakPublish">
                                            Tidak
                                        </button>
                                        <button type="button" class="btn btn-primary fw-700" id="btnYaPublish">
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

    @include('admin.components.alert-sukses')
    @include('admin.components.alert-gagal')
    @include('admin.components.alert-hapus')

    <script>
        var id_tatib = {!! json_encode($data) !!};
        var publish_sekarang = false;


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

        var settingsGetDetail = {
            "url": `${path}/api/tata-tertib/list`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;

            $('#url').val(data_detail.url);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);

            if (data_detail.status === "published") {
                $("#checkboxPublish").hide();
            }
        });


        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var data = {
                url: $('#url').val(),
                status: publish_sekarang || 'waiting'
            };

            // console.log(data);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                "url": `{{ route('tata-tertib.updateOrCreate') }}`,
                "method": "PUT",
                "timeout": 0,
                "data": JSON.stringify(data),  // Kirim data sebagai JSON string
                beforeSend: (xhr) => {
                    showLoading();
                    return xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                error: function(xhr, status, error) {
                    console.log("Error full response:", xhr.responseText);
                    if (xhr.status == 401) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        let errorMessage = "";
                        try {
                            let errorResponse = JSON.parse(xhr.responseText);
                            errorMessage = errorResponse.message;
                        } catch(e) {
                            errorMessage = "Terjadi kesalahan pada server";
                        }
                        showAlert(msg = "Error!", sub_msg = errorMessage, type = 'danger');
                        closeLoading();
                    }
                },
                success: function(response) {
                    console.log("Success response:", response);
                    if (response.status === "success") {
                        closeLoading();
                        showdoneAlert();
                        window.location.href = "{{ route('tentang_sekolah.tata_tertib') }}";
                    } else {
                        closeLoading();
                        showerorAlert();
                    }
                }
            };

            $.ajax(settings);

            var modal = document.querySelector('#modalConfirm');
            var modalInstance = bootstrap.Modal.getInstance(modal);
            modalInstance.hide();
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

        function showedeleteAlert() {
            var alert = document.getElementById("alert-hapus");
            alert.classList.remove("d-none");

            setTimeout(function() {
                alert.classList.add("d-none");
            }, 8000);
        }
    </script>

</x-app-layout>
