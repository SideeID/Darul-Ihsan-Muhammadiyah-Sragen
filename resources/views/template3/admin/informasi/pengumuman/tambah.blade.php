<x-app-layout>
    <div class="container-lg majalah">
        <a href="{{ route('admin.informasi.pengumuman.index') }}"
            class="mb-3 d-flex align-items-center text-dark text-decoration-none text-subdued">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="mb-4 card card-main">
            <div class="p-4 bg-white border-0 card-header d-flex flex-column">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Tambah Data</h5>
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
                                <textarea id="judul" name="judul" class="form-control" placeholder="Judul Pengumuman" aria-label="Judul Pengumuman"></textarea>
                                <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                            </div>
                            
                            <div class=" form-group position-relative col-md-4 ">
                                <label for="tanggal" class="form-label fw-500 small">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control bg-light" placeholder="Tanggal Berita" aria-label="Tanggal Berita">
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
                                    <input type="text" class="form-control rounded-end" id="url" placeholder="Tulis link" aria-label="Link Dokumen" style="color: #adb5bd;">
                                    <div class="invalid-feedback">Oops, kolom ini tidak boleh kosong. Mohon disi yah.</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 d-flex flex-column align-items-end ms-5">
                            
                               
                         
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mengaktifkan staf!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="d-flex justify-content-end align-items-end">
                                <button class="btn btn-primary mt-auto fw-500 mb-2 w-100" type="button"
                                    data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan Data</button>
                            </div>
                        </div>
                    </div>


                    <!-- Modal -->
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
    var publish_sekarang = 'waiting';

    // Image preview
    // function onchangeImgPreview(imageInput, imagePreview) {
    //     var selectedFile = $(`${imageInput}`)[0].files[0];

    //     if (selectedFile) {
    //         var reader = new FileReader();

    //         reader.onload = function(e) {
    //             $(`${imagePreview}`).show()
    //             $(`${imagePreview}`).attr("src", e.target.result);
    //             $(`${imageInput}`).siblings("label").empty();
    //         };

    //         reader.readAsDataURL(selectedFile);
    //     } else {
    //         $(`${imagePreview}`).hide()
    //         $(`${imagePreview}`).attr("src", "");
    //         $(".img-preview label").html(`
    //             <img src="{{ asset('image/icon/icon-upload-foto.svg') }}" class="mx-auto mb-3" alt="icon upload foto">
    //             <div class="label-content">
    //                 <p class="fw-700 text-black text-center mb-2">Upload image, or <span class="text-primary">browse</span></p>
    //                 <small class="text-secondary text-center d-block">1920x1080px size required in PNG or JPG format only.</small>
    //             </div>
    //         `)
    //     }
    // }

    // Checkbox publish sekarang
    $("#publishSekarang").change(function() {
        if ($(this).prop("checked")) {
            publish_sekarang = 'published'
        } else {
            publish_sekarang = 'draft'
        }
    });

    // submit form
    $("#submitForm").on("click", function(event) {
        event.preventDefault();

        var form = new FormData();
        form.append("judul", $('#judul').val());
        form.append("tanggal", $('#tanggal').val());
        form.append("url", $('#url').val());
        // form.append("riwayat_pendidikan", $('#pendidikan').val());
        // form.append("pengalaman", $('#pengalaman').val());
        // form.append("prestasi", $('#prestasi').val());
        // form.append("image", $("#foto")[0].files[0]);
        form.append("status", publish_sekarang);

        var settings = {
            "headers": {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            "url": `{{ route('pengumuman.store') }}`,
            "method": "POST",
            "timeout": 0,
            "mimeType": "multipart/form-data",
            "processData": false,
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

                if (publish_sekarang === true) {
                    //publish guru
                    var settings = {
                        "headers": {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        "url": `${path}/pengumuman/publish-one/${id}`,
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
                            window.location.href = "{{ route('admin.informasi.pengumuman.index') }}";
                        } else {
                            closeLoading();
                            showAlert(msg = "Error!", sub_msg = "Gagal publish", type =
                                'danger');
                        }
                    });
                } else {
                    closeLoading();
                    showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                    window.location.href = "{{ route('admin.informasi.pengumuman.index') }}";
                }
            } else {
                closeLoading();
                showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                    "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)",
                    type = 'danger');
            }
        });
    })

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
