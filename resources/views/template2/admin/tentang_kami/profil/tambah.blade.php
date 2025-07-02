<x-app-layout>
    <div class="container-lg profil">
        <a href="{{route('tentang_kami.profil.index')}}" class="d-flex align-items-center text-dark text-decoration-none text-subdued mb-3">
            <img src="{{ asset('image/icon/kembali.svg') }}" class="me-1" alt="icon kembali">
            Kembali
        </a>
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex flex-column p-4">
                <h5 class="fw-600 text-dark mb-3 mb-sm-0 h6">Tambah Data</h5>
            </div>
            <div class="card-body overflow-auto p-4 pt-0">
                <form class="form-galeri" id='form_profil' action="" enctype="multipart/form-data" method="post">
                    @csrf

                    <div class="row">
                            <div class="form-group position-relative mb-3 mb-md-4">
                                <label for="judul" class="form-label">Judul Konten</label>
                                <input type="text" id="judul" name="judul" class="form-control rounded" placeholder="e.g; Judul Konten" aria-label="Judul">
                            </div>

                            <input type="file" hidden name="files" id="files" onchange="doStuff()" accept="image/*">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <textarea name="isi" id="isi" class="form-control" placeholder="E.g Deskripsi detail" aria-label="E.g Deskripsi detail" style="min-height: 235.336px"></textarea>
                            </div>

                            <div class="form-group position-relative mb-3 my-3 mb-md-4">
                                <div class="row">
                                    <label for="judul" class="form-label">Upload File</label>
                                    <div class="col">
                                    <button id="files-upload" type="button"class="w-100 btn btn-outline-secondary" style="height: 70px"><span class="text-primary" style="font-size: 16px; font-weight: bold">Click to upload file</span>
                                    <br><span style="font-size: 12px">(file size limit is 10 MB)</span></button>
                                    </div>
                                    <div class="col" id="files-container">
                                        <div class="d-flex justify-content-center" id="no-data">
                                             <span class="m-4 text-muted self-align-center" style="font-size: 12px">Tidak Ada Data</span>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                            </div>

                    <div class="row my-3">
                        <div class="col-md-8">
                            <div class="form-group position-relative mb-3 mb-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="publishSekarang">
                                    <label class="form-check-label" for="publishSekarang">
                                        *Centang box disamping untuk mempublish profil sekolah!
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-primary w-100 h-100 fw-500 mb-2" type="button" data-bs-toggle="modal" data-bs-target="#modalConfirm">Simpan</button>
                        </div>
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

                </form>
            </div>
        </div>
    </div>

    <script>
        var keterangan;
        var publish_sekarang = false;
        var isi;
        var files = [];
        var form = new FormData();
        //CKEditor
        ClassicEditor
            .create(document.querySelector('#isi'))
            .then(editor => {
                isi = editor;
            })
            .catch(error => {
                console.error(error);
            });
        //checkbox publish sekarang
        $("#publishSekarang").change(function() {
            if ($(this).prop("checked")) {
                publish_sekarang = true
            } else {
                publish_sekarang = false
            }
        });
        $("#files-upload").on('click', function() {
            $("#files").click();
        });

        function doStuff() {
            let file = $("#files")[0].files[0];
            if (file.size > 1000000) {
                let size = file.size * 0.000001 + "MB";
            } else {
                let size = file.size / 1000 + "KB";
            }
            files.push(file);
            $("#no-data").addClass('d-none');
            $("#files-container").append(`<div class="row w-100 mb-3">
                                        <div class="btn w-100" style="height: 70px; background: #F7F7F7">
                                            <div class="row h-100">
                                            <div class="col-sm-2 h-100">
                                                <div class="btn h-100 text-white d-flex justify-content-center" style="background: blue;">
                                                <span class="justify-content-center align-self-center">${file.name.split('.').pop()}</span></div>
                                            </div>

                                            <div class="col h-100" style="text-align: left">
                                                    {{-- <div class="row my-1" style="text-align: left; background: green"><span>Halo</span></div>
                                                    <div class="row my-1">Cool 2</div> --}}
                                                    <div class="row my-1" style="font-size: 12px">
                                                        <span style="font-weight: bold">${file.name}</span>
                                                        <br>
                                                        <span>${file.size > 1000000 ? Math.ceil(file.size * 0.000001) + " MB" : Math.ceil(file.size / 1000) + " KB"}</span>
                                                    </div>
                                            </div>

                                            </div>
                                            </div>
                                            
                                        </div>`)
        }

        //submit form
        $("#submitForm").on("click", function(event) {
            event.preventDefault()
            if (files.length != 0) {
                for (let file of files) {
                    form.append("files[]", file);
                }
            }

            form.append("judul", $("#judul").val());
            form.append("isi", `${isi.getData()}`);
            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `{{route('profil.store')}}`,
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
                        var settings = {
                            "headers": {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            "url": `${path}/api/profil/publish-one/${id}`,
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
                                window.location.href = "{{ route('tentang_kami.profil.index') }}";
                            } else {
                                closeLoading();
                                showAlert(msg = "Error!", sub_msg = "Gagal publish", type = 'danger');
                            }
                        });
                    } else {
                        closeLoading();
                        showAlert(msg = "Done!", sub_msg = "Data berhasil ditambah!", type = 'success');
                        window.location.href = "{{ route('tentang_kami.profil.index') }}";
                    }
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg = "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type = 'danger');
                }
            });
            

        })
    </script>

</x-app-layout>