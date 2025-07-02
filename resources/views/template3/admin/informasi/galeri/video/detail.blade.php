<x-app-layout>
    <div class="container-lg galeri">
        <a href="{{ route('admin.informasi.galeri.video.index') }}"
            class="mb-3 text-black d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0">Edit Data</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-galeri" id='form_galeri' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 form-group position-relative mb-md-4">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="judul" class="form-label fw-500 small">Judul Galeri</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <input type="text" id="judul" name="judul" class="form-control"
                                    placeholder="Nama Galeri" aria-label="Nama Galeri" required>
                                <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group position-relative mb-md-4">
                                <div class="d-flex justify-content-between align-items-end">
                                    <label for="video_link" class="form-label fw-500 small">Link Video</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-link-45deg"></i></span>
                                    <input type="url" id="video_link" name="video_link"
                                        class="form-control rounded-end" placeholder="Tulis link video"
                                        aria-label="Link Video" required>
                                    <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 form-group position-relative mb-md-3">
                                <div class="form -check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish galeri!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="mb-2 btn btn-warning w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirm">Simpan Perubahan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">Konfirmasi Edit Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin mengubah data ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="px-4 py-2 btn btn-warning fw-700"
                                            id="submitForm">Ya, Ubah!</button>
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
                                    <p class="mb-4 text-black">
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

                </form>
            </div>
        </div>
    </div>

   
    <script>
        // Variabel Global
        var path = "{{ url('/') }}";
        var id_gallery = {!! json_encode($id) !!};
        var publish_sekarang = 'waiting';
        var list_file = [];

        var settingsGetDetail = {
            "url": `${path}/api/gallery/detail/${id_gallery}`,
            "method": "GET",
            "timeout": 0,
        };

        var settingsGetDetail = {
    "url": `${path}/api/gallery/detail/${id_gallery}`,
    "method": "GET",
    "timeout": 0,
};

$.ajax(settingsGetDetail).done(function(response) {
    var data_detail = response.data;
    $('#judul').val(data_detail.judul); // Mengisi field judul
    $('#video_link').val(data_detail.video_link); // Mengisi field link video
    $('#publishSekarang').prop('checked', data_detail.status === "published"); // Mengatur status publish

    // Mengatur status publish
    publish_sekarang = data_detail.status === "published" ? 'published' : 'waiting';
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
                url: `${path}/api/gallery/delete-file/${id}`,
                type: "DELETE",
                success: function(data) {
                    $('#modalDelete').modal('hide');

                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    window.location.href = `${path}/admin/informasi/galeri/video/detail/${id_gallery}`;
                }
            })
        })

        //submit publish
        $("#submitGalleryForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("video_link", $('#video_link').val());
            form.append("status", publish_sekarang);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/gallery/update/${id_gallery}`,
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
                            "url": `${path}/api/gallery/publish-one/${id}`,
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
                                    "{{ route('admin.informasi.galeri.video.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                    'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                        window.location.href = "{{ route('admin.informasi.galeri.video.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                        type = 'danger');
                }
            });
        });

        //submit publish
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("video_link", $('#video_link').val());
            form.append("status", publish_sekarang);

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/gallery/update/${id_gallery}`,
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
                var id = res.data.id.toString();

                if (res.status === "success") {
                    if (publish_sekarang === 'published') {
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/gallery/publish-one/${id}`,
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
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!", type = 'success');
                                window.location.href = "{{ route('admin.informasi.galeri.video.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type = 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                        window.location.href = "{{ route('admin.informasi.galeri.video.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
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
