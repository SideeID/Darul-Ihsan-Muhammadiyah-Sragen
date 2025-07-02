<x-app-layout>
    <div class="container-lg majalah">
        <a href="{{ route('admin.informasi.pengumuman.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Edit Data</h5>
            </div>
            <div class="p-4 pt-0 overflow-auto card-body">
                <form class="form-berita" id='form_berita' action="" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row gap-5">
                        <div class="col-md-12 d-flex gap-3">
                            <div class=" form-group position-relative col-md-8">
                                <div class="d-flex justify-content-between">
                                    <label for="judul" class="form-label fw-500 small">Judul Pengumuman</label>
                                    <span class="text-danger">*</span>
                                </div>
                                <textarea id="judul" name="judul" class="form-control" placeholder="Judul Pengumuman"
                                    aria-label="Judul Pengumuman"></textarea>
                                <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                            </div>

                            <div class=" form-group position-relative col-md-4 ">
                                <label for="tanggal" class="form-label fw-500 small">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control bg-light"
                                    placeholder="Tanggal Berita" aria-label="Tanggal Berita">
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="mb-3">
                                <div class="d-flex justify-content-between ">
                                    <label for="url" class="form-label fw-500 small">Link Dokumen</label>
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

                        <div class="col-md-3 d-flex flex-column align-items-end ms-5">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group position-relative mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk publish data ke website!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 d-flex justify-content-end align-items-end">
                            <button class="btn btn-warning mt-auto fw-500 mb-2 w-100" type="button"
                                data-bs-toggle="modal" data-bs-target="#modalEdit">Simpan Perubahan</button>
                        </div>
                    </div>


                    <!-- Modal Konfirmasi edit -->
                    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5" id="modalEditLabel">
                                        Konfirmasi Edit Data
                                    </h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin mengubah data ini?
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-warning fw-700 py-2 px-4"
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
                                    <p class="mb-4 text-center text-black">
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
        var id_pengumuman = {!! json_encode($data) !!};
        let foto_value
        var publish_sekarang = 'waiting';
        var list_file

        var settingsGetDetail = {
            "url": `${path}/api/pengumuman/detail/${id_pengumuman}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#judul').val(data_detail.judul);
            $('#tanggal').val(data_detail.tanggal);
            $('#url').val(data_detail.url);
            $('#publishSekarang').prop('checked', data_detail.status === "published" ? true : false);


            if (data_detail.status === "published") {
                $("#checkboxPublish").hide();
            }
        });

        // Checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = 'published'
            } else {
                publish_sekarang = 'waiting'
            }
        });

        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            // Ambil data dari form
            var data = {
                judul: $('#judul').val(),
                tanggal: $('#tanggal').val(),
                url: $('#url').val(),
                status: publish_sekarang
            };

            // Konfigurasi AJAX untuk update data
            var settings = {
                url: `${path}/api/pengumuman/update/${id_pengumuman}`,
                method: "PUT",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify(data),
                timeout: 0,
                beforeSend: function(xhr) {
                    showLoading();
                    xhr.setRequestHeader("url_page", '{{ url()->full() }}');
                },
                error: function(xhr, status, error) {
                    handleError(xhr);
                }
            };

            // Kirim data update
            $.ajax(settings).done(function(response) {
                if (response.status === "success") {
                    closeLoading();
                    showAlert("Done!", "Data berhasil diperbarui!", "success");
                    window.location.href = "{{ route('admin.informasi.pengumuman.index') }}";
                } else {
                    closeLoading();
                    showAlert("Error!", "Permintaan tidak sesuai. Periksa kembali data Anda!", "danger");
                }
            });
        });

        // Fungsi untuk handle error
        function handleError(xhr) {
            if (xhr.status === 401) {
                console.log("Session expired. Redirecting to login.");
                window.location.href = "{{ route('login') }}";
            } else {
                showAlert("Error!", "Request tidak sesuai atau server error.", "danger");
                closeLoading();
            }
        }

        // Fungsi untuk publish data
        function publishData(id) {
            var publishSettings = {
                url: `${path}/api/pengumuman/publish/${id}`,
                method: "PUT",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json'
                },
                data: JSON.stringify({
                    id: id,
                    status: true
                }), // Sesuaikan payload jika perlu
                timeout: 0,
                beforeSend: showLoading,
                error: function(xhr) {
                    handleError(xhr);
                }
            };

            $.ajax(publishSettings).done(function(response) {
                console.log("Publish Response: ", response);
                if (response.status === "success") {
                    closeLoading();
                    showAlert("Done!", "Data berhasil dipublish!", "success");
                    window.location.href = "{{ route('admin.informasi.pengumuman.index') }}";
                } else {
                    closeLoading();
                    showAlert("Error!", "Gagal publish data.", "danger");
                }
            });

            console.log("Payload Publish: ", JSON.stringify({
                id: id,
                status: true
            }));
        }

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
