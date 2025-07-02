<x-app-layout>
    <div class="container-lg galeri">
        <a href="{{ route('admin.informasi.galeri.video.index') }}"
            class="mb-3 text-black d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0">Tambah Data</h5>
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
                            <button class="mb-2 btn btn-primary w-100 fw-500" type="button" data-bs-toggle="modal"
                                data-bs-target="#modalConfirm">Simpan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="pb-0 border-0 modal-header">
                                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5"
                                        id="modalConfirmLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin menambahkan data ini?
                                    </p>
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
        var publish_sekarang = false;

$(document).ready(function() {
    // Checkbox publish sekarang
    $("#publishSekarang").change(function() {
        publish_sekarang = $(this).is(':checked');
        if (publish_sekarang) {
            $('#modalPublish').modal('show');
        }
    });

    // Modal publish handling
    $('#btnTidakPublish').click(function() {
        $('#publishSekarang').prop('checked', false);
        publish_sekarang = false;
        $('#modalPublish').modal('hide');
    });

    $('#btnYaPublish').click(function() {
        $('#modalPublish').modal('hide');
    });

    // Submit form
    $("#submitForm").on("click", function(event) {
        event.preventDefault();

        var form = new FormData();
        form.append("type", "video");
        form.append("judul", $('#judul').val());
        form.append("video_link", $('#video_link').val());

        // Tambahkan status publish
        if (publish_sekarang) {
            form.append("status", "publish");
        } else {
            form.append("status", "waiting");
        }

        $.ajax({
            url: "{{ route('gallery.store') }}",
            method: "POST",
            data: form,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.status === "success") {
                    var galleryId = response.data.id;

                    // Jika publish sekarang, lakukan publish
                    if (publish_sekarang) {
                        $.ajax({
                            url: `${path}/api/gallery/publish-one/${galleryId}`,
                            method: "POST",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(publishResponse) {
                                if (publishResponse.status === "success") {
                                    showAlert("Sukses!", "Video berhasil ditambahkan dan dipublish", 'success');
                                    window.location.href = "{{ route('admin.informasi.galeri.video.index') }}";
                                } else {
                                    showAlert("Error!", publishResponse.message, 'danger');
                                }
                            },
                            error: function(xhr) {
                                var errorMessage = xhr.responseJSON.message || "Terjadi kesalahan saat publish";
                                showAlert("Error!", errorMessage, 'danger');
                            }
                        });
                    } else {
                        showAlert("Sukses!", "Video berhasil ditambahkan", 'success');
                        window.location.href = "{{ route('admin.informasi.galeri.video.index') }}";
                    }
                } else {
                    showAlert("Error!", response.message, 'danger');
                }
            },
            error: function(xhr) {
                var errorMessage = xhr.responseJSON.message || "Terjadi kesalahan";
                showAlert("Error!", errorMessage, 'danger');
            }
        });
    });
});
    </script>

</x-app-layout>
