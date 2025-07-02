<x-app-layout>
    <div class="container-lg berita">
        <header class="header-view d-flex align-items-end justify-content-between">
            <div>
                <h3 class="fw-600">Berita</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Informasi</li>
                        <li class="breadcrumb-item">Berita</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Berita</li>
                    </ol>
                </nav>
            </div>
            <div class="mb-3 btn-group">
                <a href="{{ route('informasi.berita.index') }}" class="btn fw-600 " style="padding:20px;"
                    aria-current="page">Data Berita</a>
                <a href="{{ route('informasi.berita.kategori') }}" class="btn fw-600 active"
                    style="padding:20px; background-color:#051244;">Atur Kategori</a>
            </div>
        </header>
        <div class="mb-4 card card-main">
            <div
                class="px-4 pt-4 pb-0 bg-white border-0 card-header d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row">
                <h5 class="mb-3 fw-600 text-dark mb-sm-0 h6">Data Berita</h5>
                <div class="d-flex">
                    <button type="button" class="btn btn-primary fw-600 btn-tambah" onclick="openForm('')"><img
                            src="{{ asset('image/icon/icon-tambah.svg') }}" class="me-2" alt=""> Tambah
                        Kategori</button>
                </div>
            </div>
            <div class="p-4 overflow-auto table-data card-body">
                <div class="mb-4 table-wrapper">
                    <table class="table mb-0 table-scrollable" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle fw-bold" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle fw-bold" scope="col">Kategori</th>
                                <th class="align-middle fw-bold" scope="col">Status</th>
                                <th class="text-center align-middle fw-bold" style="width: 15%;" scope="col">Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="flex-row d-flex align-items-center">
                        <div class="text-black table-length d-flex align-items-center">
                            <select class="mx-2 table-length-select" id="table-length-select">
                                <option value="10">10</option>
                                <option value="20">20</option>
                            </select>
                        </div>
                        <p class="mb-0 text-black table-info">
                            Menampilkan <span class="table-show">-</span> data dari <span class="table-total">-</span>
                            data
                        </p>
                    </div>

                    <div class="text-black table-pagination d-flex align-items-center">
                        <button class="btn btn-prev" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/prev-black.svg') }}" class="" alt="next"></button>
                        <button class="btn btn-next" type="button" id="button-addon2"><img
                                src="{{ asset('image/icon/next-danger.svg') }}" class="" alt="next"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>
    <!-- Modal -->
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="pb-0 border-0 modal-header">
                    <h1 class="modal-title fw-700 text-dark w-100 fs-5" id="modalEditLabel">Tambah Kategori</h1>
                </div>
                <div class="modal-body">
                    <form action="">
                        @csrf
                        <div class="mb-3 form-group position-relative mb-md-4">
                            <div class="d-flex justify-content-between">
                                <label for="judul" class="form-label fw-600 small">Kategori</label>
                                <span style="color: red;">*</span>
                            </div>
                            <input type="text" id="judul" name="judul" class="form-control"
                                placeholder="Judul Kategori" aria-label="Judul Kategori" />
                            <div class="invalid-feedback">
                                Oops, kolom ini tidak boleh kosong. Mohon disi yah.
                            </div>
                        </div>
                        <div class="mt-3 d-flex justify-content-end">
                            <input type="hidden" id="d_id">
                            <button type="button" class="btn btn-outline-black text-black fw-700 py-2 px-4 me-3"
                                onclick="closeModalEdit('modalEdit')">Batal</button>
                            <button type="submit" id="submitForm" class="btn btn-primary fw-700 py-2 px-4">Tambah
                                Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="pb-0 border-0 modal-header">
                    <h1 class="text-center modal-title fw-700 text-dark w-100 fs-5" id="modalConfirmLabel">Konfirmasi
                        Status</h1>
                </div>
                <div class="modal-body">
                    <p class="mb-4 text-center text-black">Apakah anda yakin ingin mengaktifkan data ini ? </p>
                    <div class="d-flex align-items-center justify-content-center">
                        <input type="hidden" id="d_id">
                        <input type="hidden" id="d_status_status">
                        <button type="button" class="px-4 py-2 btn btn-outline-black fw-700 me-3"
                            onclick="closeModalConfirm()">Batal</button>
                        <button type="button" class="px-4 py-2 btn btn-primary fw-700" id="submitStatus">Ya,
                            Setuju!</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var sorotanCount = 0

        function resetFilter() {
            document.getElementById('table-filter-status').value = ''

            setTable(
                `{{ route('berita.kategori.all') }}?class=table-data&table=true`
            )
        }


        function changeFilter() {
            var filterStatus = $('#table-filter-status').val();

            setTable(`{{ route('berita.kategori.all') }}?class=table-data&table=true&status=${filterStatus}`)
        }

        setTableData = {
            'table-data': ['_increment', 'judul', 'switch', 'is_action']
        }


        //Ambil data untuk ditampilkan
        $(function() {
            setTable(`{{ route('berita.kategori.all') }}?class=table-data&table=true`)
        });

        //delete
        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/berita/kategori/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{ route('berita.kategori.all') }}?class=table-data&table=true`)

                    showAlert("Done!", "Data berhasil dihapus!", 'success')
                }
            })
        })

        //edit and tambah
        function closeModalEdit(modalId) {
            $(`#${modalId}`).modal('hide');
        }

        function changeStatus() {
            var status = $("#d_status_status").val();
            var id = $("#d_id").val();

            $.ajax({
                url: `${path}/api/berita/kategori/publish/${id}`,
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: status
                },
                beforeSend: function() {
                    showLoading();
                },
                success: function(response) {
                    closeLoading();
                    $("#modalConfirm").modal('hide');

                    setTable(`{{ route('berita.kategori.all') }}?class=table-data&table=true`);

                    showAlert({
                        msg: "Berhasil!",
                        sub_msg: `Kategori berhasil diubah menjadi ${status}`,
                        type: 'success'
                    });
                },
                error: function(xhr) {
                    closeLoading();

                    if (xhr.status === 401) {
                        window.location.href = "{{ route('login') }}";
                    } else {
                        showAlert({
                            msg: "Error!",
                            sub_msg: "Gagal mengubah status kategori",
                            type: 'danger'
                        });
                    }
                }
            });
        }

        $("#submitStatus").on("click", function(event) {
            event.preventDefault();
            changeStatus();
        });

        function confirmStatusChange(id, status) {
            $('#d_id').val(id);
            $('#d_status_status').val(status);

            if (status === 'active') {
                $("#modalConfirmLabel").text("Konfirmasi Aktivasi");
                $(".modal-body p").text("Apakah Anda yakin ingin mengaktifkan kategori ini?");
            } else {
                $("#modalConfirmLabel").text("Konfirmasi Nonaktifasi");
                $(".modal-body p").text("Apakah Anda yakin ingin menonaktifkan kategori ini?");
            }

            $("#modalConfirm").modal('show');
        }

        function openForm(id) {
            $('#d_id').val(id)
            $("#modalEdit").modal('show');

            if (id) {
                filledForm = true
                $(`#modalEditLabel`).html("Ubah Kategori")
                $(`#submitForm`).attr("class", "btn btn-warning fw-700 py-2 px-4 p-2").html("Simpan Perubahan")

                req({
                    url: `${path}/api/berita/kategori/detail/${id}`,
                    type: "GET",
                    success: function(response) {
                        var data = response.data;
                        $('#judul').val(data.judul);

                        if (data.status === "published") {
                            $("#checkboxPublish").hide();
                        }
                    }
                })
            } else {
                filledForm = false
                $(`#modalEditLabel`).html("Tambah Kategori")
                $(`#submitForm`).attr("class", "btn btn-primary fw-700 py-2 px-4 p-2").html("Tambah Data")

                $("#judul").val("");
            }
        }

        function tambahKategori() {
            var form = new FormData();
            form.append("judul", $("#judul").val());

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/berita/kategori/store`,
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
                    closeLoading();
                    showAlert(msg = "Done!", sub_msg = "Berhasil menambah data!", type = 'success');
                    window.location.href = "{{ route('informasi.berita.kategori') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type =
                        'danger');
                }
            });
        }

        function editKategori() {
            var form = new FormData();
            form.append("judul", $("#judul").val());

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${path}/api/berita/kategori/update/${$("#d_id").val()}`,
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
                    closeLoading();
                    showAlert(msg = "Done!", sub_msg = "Data berhasil diubah!", type = 'success');
                    window.location.href = "{{ route('informasi.berita.kategori') }}";
                } else {
                    closeLoading();
                    showAlert(msg = "Permintaan tidak sesuai", sub_msg =
                        "Silahkan periksa kembali data anda!. Pastikan semua data telah ter-input :)", type =
                        'danger');
                }
            });
        }

        $("#submitForm").on("click", function(event) {
            event.preventDefault();

            if (filledForm) {
                editKategori()
            } else {
                tambahKategori();
            }
        })
    </script>

</x-app-layout>
