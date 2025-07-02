<x-app-layout>
    <style>
        #file-list {
            margin-bottom: 56px;
        }
    </style>

    <div class="container-lg galeri">
        <a href="{{route('galeri.video.index')}}" class="d-flex align-items-center text-dark text-decoration-none text-subdued mb-3">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column p-4">
                <h5 class="fw-600 text-dark mb-3 mb-sm-0 h6">Tambah Galeri</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-galeri" id='form_galeri' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" id="judul" name="judul" class="form-control" placeholder="Judul" aria-label="Judul">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" placeholder="Tanggal" aria-label="Tanggal">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Deskripsi" aria-label="Deskripsi" style="min-height: 100px"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="file" id="file-input" accept="video/mp4, video/webm, video/ogg" hidden multiple>
                            <label for="file-input" class="btn-file-input d-flex align-items-center justify-content-center mb-3 mb-md-0 w-100">Click to upload file</label>
                        </div>
                        <div class="col-md-6">
                            <ul id="file-list" class="p-0">
                                <li class="d-flex align-items-center justify-content-center" id="default_list_item">
                                    Tidak ada data
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <div class="form-check" id="checkboxPublish">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish galeri!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary w-100 fw-500 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan</button>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5" id="modalConfirmLabel">Konfirmasi Simpan Data</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menambahkan data ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4 me-3" data-bs-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success fw-700 py-2 px-4" id="submitForm">Ya, Simpan!</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Delete -->
                    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header pb-0 border-0">
                                    <h1 class="modal-title fw-700 text-dark text-center w-100 fs-5" id="modalDeleteLabel">Konfirmasi Hapus File</h1>
                                </div>
                                <div class="modal-body">
                                    <p class="text-black text-center mb-4">Apakah anda yakin ingin menghapus file ini? </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <input type="hidden" id="d_id">
                                        <button type="button" class="btn btn-danger fw-700 py-2 px-4 me-3" data-bs-dismiss="modal" onclick="closeModalDelete('modalDelete')">Batal</button>
                                        <button type="button" class="btn btn-outline-black fw-700 py-2 px-4" id="buttonDelete">Ya, Hapus!</button>
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
        var id_galeri = {!!json_encode($data) !!};
        var keterangan;
        var publish_sekarang = false;
        var uploaded_files = [];

        //CKEditor
        ClassicEditor
            .create(document.querySelector('#keterangan'))
            .then(editor => {
                keterangan = editor;
            })
            .catch(error => {
                console.error(error);
            });

        function closeModalDelete(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        var settingsGetDetail = {
            "url": `${path}/api/gallery/detail/${id_galeri}`,
            "method": "GET",
            "timeout": 0,
        };

        $.ajax(settingsGetDetail).done(function(response) {
            var data_detail = response.data;
            $('#judul').val(data_detail.judul);
            $('#sumber').val(data_detail.sumber);
            $('#tanggal').val(data_detail.tanggal);
            if (data_detail.keterangan) {
                keterangan.data.set(data_detail.keterangan);
            }
            if (data_detail.files.length > 0) {
                $("#default_list_item").remove()
            }
            data_detail.files.map((item) => {
                $('#file-list').append(`
                    <li class="file-item mb-3">
                        <div class="card-file-list d-flex align-items-center justify-content-between p-2">
                            <div class="d-flex align-items-center">
                                <div class="indicator d-flex align-items-center justify-content-center me-3">VID</div>
                                <div class="file-info">
                                    <p class="file-name fw-500 mb-1">${item.original}</p>
                                    <p class="file-size text-subdued mb-0">${(item.size / 1024 / 1024).toFixed(2)} MB</p>
                                </div>
                            </div>
                            <button type="button" class="btn-delete-list-item p-0 bg-transparent border-0" onclick="openModalDelete('${item.id}')">
                                <img src="{{ asset('image/icon/icon-delete-circle.svg') }}" alt="">
                            </button>
                        </div>
                    </li>
                `)
            })


            if (data_detail.status === "published") {
                $("#checkboxPublish").hide();
            }
        });

        // onchange input file
        $(document).ready(function() {
            $('#file-input').change(function() {
                var files = $(this)[0].files;
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    if (validateFile(file)) {
                        addFileToList(file);
                        uploaded_files.push(file);
                    } else {
                        alert('File "' + file.name + '" tidak valid!');
                    }
                }
            });

            $(document).on('click', '.delete-item', function() {
                var index = $(this).parent().index();
                uploaded_files.splice(index, 1); // Remove file from the array
                $(this).parent().remove();
                if (uploaded_files.length === 0) {
                    $("#file-list").html(`
                        <li class="d-flex align-items-center justify-content-center">
                            Tidak ada data
                        </li>
                    `)
                }
            });

            function validateFile(file) {
                var allowedExtensions = /(\.mp4|\.webm|\.ogg)$/i;
                if (!allowedExtensions.exec(file.name)) {
                    return false;
                }
                return true;
            }

            function addFileToList(file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#default_list_item").remove()
                    var listItem = $('<li class="file-item mb-3"></li>');
                    listItem.html(
                        '<span>' + file.name + ' (' + (file.size / 1024 / 1024).toFixed(2) + ' MB)</span>' +
                        '<button class="file-delete">Delete</button>'
                    );
                    listItem.html(`
                        <div class="card-file-list d-flex align-items-center justify-content-between p-2">
                            <div class="d-flex align-items-center">
                                <div class="indicator d-flex align-items-center justify-content-center me-3">VID</div>
                                <div class="file-info">
                                    <p class="file-name fw-500 mb-1">${file.name}</p>
                                    <p class="file-size text-subdued mb-0">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                                </div>
                            </div>
                            <button type="button" class="btn-delete-list-item p-0 bg-transparent border-0 delete-item">
                                <img src="{{ asset('image/icon/icon-delete-circle.svg') }}" alt="">
                            </button>
                        </div>
                    `)
                    $('#file-list').append(listItem);
                }
                reader.readAsDataURL(file);
            }
        });

        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = true
            } else {
                publish_sekarang = false
            }
        });

        //trigger modal delete
        function openModalDelete(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        //delete gambar
        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/gallery/delete-file/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    showAlert("Done!", "Data berhasil dihapus!", 'success')

                    window.location.href = `${path}/admin/informasi/galeri/video/detail/${id_galeri}`;
                }
            })
        })

        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            var form = new FormData();
            form.append("judul", $('#judul').val());
            form.append("keterangan", `${keterangan.getData()}`);
            form.append("tanggal", $('#tanggal').val());
            form.append("type", "video");

            uploaded_files.map((item) => {
                form.append("new[]", item)
            })

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/gallery/update/${id_galeri}`,
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

                    if (publish_sekarang === true) {
                        //publish gallery
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/gallery/publish/${id}`,
                            "method": "GET",
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
                                showAlert(msg = "Done!", sub_msg = "Data berhasil dipublish!", type = 'success');
                                window.location.href = "{{ route('galeri.video.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type = 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('galeri.video.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
                }
            });
        })
    </script>

</x-app-layout>