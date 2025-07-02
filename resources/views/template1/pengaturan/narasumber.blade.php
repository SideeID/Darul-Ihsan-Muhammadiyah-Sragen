<x-app-layout>
    <style>
        .banner {
            width: auto !important;
        }
    </style>

    <div class="container-lg berita">
        <div class="card card-main mb-4">
            <div class="card-header border-0 bg-white d-flex align-items-start align-items-sm-center justify-content-between flex-column flex-sm-row pt-4 px-4 pb-0">
                <h5 class="fw-700 text-dark mb-3 mb-sm-0">Narasumber</h5>
                <div class="d-flex">
                    <button type="button" class="btn btn-success fw-700 btn-tambah me-2" onclick="tambahData()"><img src="{{ asset('image/icon/icon-tambah-circle.svg') }}" class="me-2" alt=""> Tambah Narasumber</button>
                </div>
            </div>
            <div class="table-data card-body overflow-auto p-4">
                <div class="row mb-4">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text table-btn-search" id="addon-wrapping"><img src="{{ asset('image/icon/search.svg') }}" alt=""></span>
                        <input type="text" id="search" class="table-pagination-search form-control" placeholder="Cari..." aria-label="search" aria-describedby="addon-wrapping">
                    </div>
                </div>

                <div class="d-flex align-items-center justify-content-between">
                    <div class="table-length d-flex align-items-center text-black mb-4">
                        Menampilkan
                        <select class="table-length-select mx-2" id="table-length-select">
                            <option value="10">10</option>
                            <option value="20">20</option>
                        </select>
                        data
                    </div>
                </div>

                <div class="table-wrapper mb-4">
                    <table class="table table-scrollable mb-0" id="table">
                        <thead>
                            <tr>
                                <th class="align-middle py-3 py-md-4" style="width: 5%;" scope="col">No</th>
                                <th class="align-middle py-3 py-md-4" scope="col">Nama</th>
                                <th class="align-middle text-center py-3 py-md-4" style="width: 15%;" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="table-footer d-flex align-items-center justify-content-between flex-column flex-sm-row">
                    <p class="table-info text-black mb-0">Menampilkan <span class="table-show">-</span> data dari <span class="table-total">-</span> data</p>

                    <div class="table-pagination d-flex align-items-center text-black">
                        Halaman
                        <button class="btn btn-prev ms-2" type="button" id="button-addon2"><img src="{{ asset('image/icon/prev-black.svg') }}" class="" alt="next"></button>
                        <select class="table-pagination-select me-2" id="table-pagination-select"></select>
                        dari
                        <b class="mx-2 table-last">-</b>
                        halaman
                        <button class="btn btn-next ms-2" type="button" id="button-addon2"><img src="{{ asset('image/icon/next-danger.svg') }}" class="" alt="next"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="modalData" tabindex="-1" aria-labelledby="modalDataLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header px-4 pt-4 pb-0 border-0">
                    <h1 class="modal-title fw-700 text-dark fs-5" id="modalDataLabel">Tambah Data Narasumber</h1>
                </div>
                <div class="modal-body p-4">
                    <form id="form_data" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group position-relative mb-4 mb-md-4">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" aria-label="Nama">
                        </div>

                        <div class="d-flex align-items-center">
                            <input type="hidden" id="d_id">
                            <button type="button" class="btn btn-secondary fw-700 p-2 me-3 w-100" onclick="closeModalData()">Batal</button>
                            <button type="button" class="btn btn-success fw-700 p-2 w-100" id="buttonSubmit">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <x-modal></x-modal>

    <script>
        var url_form = null

        setTableData = {
            'table-data': ['_increment', 'nama', 'is_action']
        }

        $(function() {
            setTable(`{{route('narasumber.all')}}?class=table-data&table=true`)
        });

        function deleteRow(id) {
            $('#d_id').val(id)
            $("#modalDelete").modal('show');
        }

        function closeModalData() {
            $("#modalData").modal('hide');
            $("#nama").val("")
        }

        function tambahData() {
            $("#modalData").modal('show');
            $("#modalDataLabel").html("Tambah Data Narasumber")
            $("#buttonSubmit").html("Tambah Data")
            $("#nama").val("")
            url_form = `{{route('narasumber.store')}}`
        }

        function getData(id) {
            $('#d_id').val(id)
            $("#modalData").modal('show');
            $("#modalDataLabel").html("Ubah Data Narasumber")
            $("#buttonSubmit").html("Ubah Data")
            url_form = `${path}/api/pengaturan/narasumber/update/${id}`

            //get data
            req({
                url: `${path}/api/pengaturan/narasumber/detail/${id}`,
                type: "GET",
                success: function(response) {
                    var data = response.data

                    $("#nama").val(data.nama)
                }
            })
        }

        $('#buttonSubmit').click(function(e) {
            e.preventDefault();
            var form = new FormData();
            form.append("nama", $('#nama').val());

            var settings = {
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "url": `${url_form}`,
                // "url": `{{route('narasumber.store')}}`,
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
                        $("#modalData").modal('hide');
                    }
                }
            };

            $.ajax(settings).done(function(response) {
                var res = JSON.parse(response);
                var id = res.data.id.toString()

                if (res.status === "success") {
                    closeLoading();
                    $("#modalData").modal('hide');
                    setTable(`{{route('narasumber.all')}}?class=table-data&table=true`)
                } else {
                    closeLoading();
                    $("#modalData").modal('hide');
                    showAlert(msg = "Silahkan isi form dengan lengkap", type = 'danger');
                }
            });
        })

        $('#buttonDelete').click(function(e) {
            e.preventDefault();
            let id = $('#d_id').val()

            req({
                url: `${path}/api/pengaturan/narasumber/delete/${id}`,
                type: "GET",
                success: function(data) {
                    $('#modalDelete').modal('hide');
                    setTable(`{{route('narasumber.all')}}?class=table-data&table=true`)
                }
            })
        })
    </script>

</x-app-layout>